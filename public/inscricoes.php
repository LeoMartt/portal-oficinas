<?php
// Consulta e exibicao de inscricoes com apoio de IA.
// Ver IA-08 em USO_IA.md.

$tituloPagina = 'Inscrições';

require_once dirname(__DIR__) . '/includes/oficinas.php';
require_once dirname(__DIR__) . '/includes/armazenamento-inscricoes.php';

// Carrega os registros salvos no JSON.
$inscricoes = listarInscricoesJson();

$erroLeitura = $inscricoes === null;

if ($erroLeitura) {
    http_response_code(500);
    $inscricoes = [];
}

$totalInscricoes = count($inscricoes);

// Inscricoes mais recentes primeiro.
$inscricoesExibicao = array_reverse($inscricoes);

// Relaciona o ID da oficina ao seu titulo.
$titulosOficinas = array_column(
    $oficinas,
    'titulo',
    'id'
);

// Protege a exibicao de dados em HTML.
$escapar = static fn (string $valor): string =>
    htmlspecialchars(
        $valor,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );

require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <div class="container">

        <header class="cabecalho-pagina">
            <h1>Inscrições registradas</h1>

            <p>
                Consulte os participantes fictícios inscritos
                nas oficinas do Instituto Sakura.
            </p>
        </header>

        <section aria-labelledby="titulo-consulta">

            <div class="resumo-inscricoes">

                <div>
                    <h2 id="titulo-consulta">
                        Consulta de participantes
                    </h2>

                    <p>
                        Os registros são carregados do arquivo JSON
                        sempre que esta página é aberta.
                    </p>
                </div>

                <?php if (!$erroLeitura): ?>
                    <div
                        class="total-inscricoes"
                        aria-label="Total de inscrições: <?= $totalInscricoes ?>"
                    >
                        <strong>
                            <?= $totalInscricoes ?>
                        </strong>

                        <span>Inscrições</span>
                    </div>
                <?php endif; ?>

            </div>

            <?php if ($erroLeitura): ?>

                <p role="alert" class="aviso-consulta">
                    Não foi possível carregar as inscrições.
                    Verifique o arquivo JSON e as permissões
                    da pasta dados. Nenhum registro foi alterado.
                </p>

            <?php elseif ($inscricoes === []): ?>

                <p class="aviso-consulta">
                    Ainda não existem inscrições registradas.
                </p>

                <a class="botao" href="/inscricao.php">
                    Fazer a primeira inscrição
                </a>

            <?php else: ?>

                <div
                    class="rolagem-inscricoes"
                    role="region"
                    aria-label="Tabela de inscrições registradas"
                    tabindex="0"
                >

                    <table class="tabela-inscricoes">

                        <thead>
                            <tr>
                                <th scope="col">Participante</th>
                                <th scope="col">Oficina</th>
                                <th scope="col">Data e hora</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($inscricoesExibicao as $inscricao): ?>

                                <?php
                                $nomeOficina = $titulosOficinas[
                                    $inscricao['oficina_id']
                                ] ?? 'Oficina não cadastrada';

                                try {
                                    $dataFormatada = (
                                        new DateTimeImmutable(
                                            $inscricao['data_hora']
                                        )
                                    )->format('d/m/Y H:i');

                                } catch (Exception $excecao) {
                                    $dataFormatada = 'Data indisponível';
                                }
                                ?>

                                <tr>
                                    <td>
                                        <strong>
                                            <?= $escapar($inscricao['nome']) ?>
                                        </strong>

                                        <span class="email-inscrito">
                                            <?= $escapar($inscricao['email']) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <?= $escapar($nomeOficina) ?>
                                    </td>

                                    <td>
                                        <?= $escapar($dataFormatada) ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

                <p>
                    <small>
                        Dados fictícios utilizados apenas para
                        demonstração acadêmica.
                    </small>
                </p>

                <a class="botao" href="/inscricao.php">
                    Nova inscrição
                </a>

            <?php endif; ?>

        </section>
    </div>
</main>

<?php
require_once dirname(__DIR__) . '/includes/rodape.php';
?>