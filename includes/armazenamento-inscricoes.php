<?php
// Persistencia JSON e verificacao de duplicidade com apoio de IA.
// Referencia: IA-06 no arquivo USO_IA.md.

/**
 * Salva uma inscricao, sem apagar as anteriores.
 * Retorna 'sucesso', 'duplicada' ou 'erro'.
 *
 * O bloqueio impede que dois envios simultaneos gravem sobre o mesmo JSON.
 * A escrita em arquivo temporario preserva o JSON anterior se ocorrer falha.
 */
function salvarInscricaoJson(array $novoRegistro): string
{
    $pastaDados = dirname(__DIR__) . '/dados';
    $arquivoJson = $pastaDados . '/inscricoes.json';
    $arquivoBloqueio = $pastaDados . '/inscricoes.lock';

    if (!is_dir($pastaDados) && !@mkdir($pastaDados, 0775, true) && !is_dir($pastaDados)) {
        return 'erro';
    }

    $bloqueio = @fopen($arquivoBloqueio, 'c');
    if ($bloqueio === false) {
        return 'erro';
    }

    try {
        if (!flock($bloqueio, LOCK_EX)) {
            return 'erro';
        }

        // Primeira execucao: cria um array JSON vazio.
        if (!file_exists($arquivoJson)) {
            if (@file_put_contents($arquivoJson, "[]\n") === false) {
                return 'erro';
            }
        }

        $conteudo = @file_get_contents($arquivoJson);
        if ($conteudo === false) {
            return 'erro';
        }

        try {
            $inscricoes = json_decode($conteudo, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $excecao) {
            return 'erro';
        }

        // Nunca substitui registros se o arquivo estiver corrompido ou fora do formato.
        if (!is_array($inscricoes) || !array_is_list($inscricoes)) {
            return 'erro';
        }

        foreach ($inscricoes as $inscricao) {
            if (!is_array($inscricao) ||
                !is_string($inscricao['email'] ?? null) ||
                !is_string($inscricao['oficina_id'] ?? null)) {
                return 'erro';
            }

            // E-mails sao comparados sem diferenciar maiusculas de minusculas.
            if ($inscricao['oficina_id'] === $novoRegistro['oficina_id'] &&
                strcasecmp(trim($inscricao['email']), $novoRegistro['email']) === 0) {
                return 'duplicada';
            }
        }

        $inscricoes[] = $novoRegistro;

        try {
            $json = json_encode(
                $inscricoes,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
            ) . "\n";
        } catch (JsonException $excecao) {
            return 'erro';
        }

        // Arquivo temporario na mesma pasta para trocar o JSON apenas apos a escrita completa.
        $temporario = @tempnam($pastaDados, 'insc_');
        if ($temporario === false) {
            return 'erro';
        }

        try {
            $bytes = @file_put_contents($temporario, $json);
            if ($bytes !== strlen($json) || !@rename($temporario, $arquivoJson)) {
                return 'erro';
            }
            return 'sucesso';
        } finally {
            if (is_file($temporario)) {
                @unlink($temporario);
            }
        }
    } finally {
        flock($bloqueio, LOCK_UN);
        fclose($bloqueio);
    }
}
