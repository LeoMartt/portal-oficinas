<?php
// Formulario e preservacao dos campos com apoio de IA. Ver IA-05 em USO_IA.md.
// Integracao com persistencia JSON. Ver IA-06 em USO_IA.md.
// Preselecao de oficinas pela URL. Ver IA-07 em USO_IA.md.

$tituloPagina = 'Inscrição';

require_once dirname(__DIR__) . '/includes/oficinas.php';

// Na volta de uma validacao com erros, o processamento fornece esses dados.
$erros = $erros ?? [];
$dadosFormulario = $dadosFormulario ?? [];

// ============================================================
// PRESELECAO DA OFICINA PELA URL
// Exemplo: /inscricao.php?oficina=idioma-01
// ============================================================

$oficinaDaUrl = $_GET['oficina'] ?? '';

if (!is_string($oficinaDaUrl)) {
    $oficinaDaUrl = '';
}

// Verifica se a oficina recebida realmente existe.
$idsExistentes = array_column($oficinas, 'id');

$oficinaInicial = in_array($oficinaDaUrl, $idsExistentes, true)
    ? $oficinaDaUrl
    : '';

// ============================================================
// PRESERVACAO DOS DADOS DO FORMULARIO
// ============================================================

$nomePreenchido = (string) ($dadosFormulario['nome'] ?? '');

$emailPreenchido = (string) ($dadosFormulario['email'] ?? '');

$oficinaPreenchida = (string) (
    $dadosFormulario['oficina'] ?? $oficinaInicial
);

$aceiteMarcado = ($dadosFormulario['aceite'] ?? false) === true;

// Evita interpretar como HTML valores recebidos pelo formulario.
$escapar = static fn (string $valor): string =>
    htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');

require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <div class="container">

        <header class="cabecalho-pagina">
            <h1>Inscreva-se em uma oficina</h1>
            <p>
                Utilize apenas dados fictícios para testar
                o formulário acadêmico.
            </p>
        </header>

        <section aria-labelledby="titulo-formulario">

            <h2 id="titulo-formulario">
                Dados do participante
            </h2>

            <?php if ($erros !== []): ?>
                <div role="alert" aria-labelledby="titulo-erros">
                    <h3 id="titulo-erros">
                        Confira os dados informados
                    </h3>

                    <p>
                        O formulário não foi aceito.
                        Corrija os campos indicados e tente novamente.
                    </p>
                </div>
            <?php endif; ?>

            <form action="/salvar-inscricao.php" method="post">

                <!-- NOME COMPLETO -->

                <div class="campo-formulario">

                    <label for="nome">
                        Nome completo
                        <span aria-hidden="true">*</span>
                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        autocomplete="name"
                        minlength="3"
                        maxlength="120"
                        required
                        value="<?= $escapar($nomePreenchido) ?>"
                        <?= isset($erros['nome'])
                            ? 'aria-invalid="true" aria-describedby="erro-nome"'
                            : '' ?>
                    >

                    <?php if (isset($erros['nome'])): ?>
                        <p id="erro-nome" role="alert">
                            <?= $escapar($erros['nome']) ?>
                        </p>
                    <?php endif; ?>

                </div>

                <!-- EMAIL -->

                <div class="campo-formulario">

                    <label for="email">
                        E-mail
                        <span aria-hidden="true">*</span>
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        autocomplete="email"
                        maxlength="254"
                        required
                        value="<?= $escapar($emailPreenchido) ?>"
                        <?= isset($erros['email'])
                            ? 'aria-invalid="true" aria-describedby="erro-email"'
                            : '' ?>
                    >

                    <?php if (isset($erros['email'])): ?>
                        <p id="erro-email" role="alert">
                            <?= $escapar($erros['email']) ?>
                        </p>
                    <?php endif; ?>

                </div>

                <!-- SELECAO DA OFICINA -->

                <div class="campo-formulario">

                    <label for="oficina">
                        Oficina desejada
                        <span aria-hidden="true">*</span>
                    </label>

                    <select
                        id="oficina"
                        name="oficina"
                        required
                        <?= isset($erros['oficina'])
                            ? 'aria-invalid="true" aria-describedby="erro-oficina"'
                            : '' ?>
                    >

                        <option value="">
                            Selecione uma oficina
                        </option>

                        <?php foreach ($categorias as $slug => $nomeCategoria): ?>

                            <optgroup label="<?= $escapar($nomeCategoria) ?>">

                                <?php foreach ($oficinas as $oficina): ?>

                                    <?php if ($oficina['categoria'] === $slug): ?>

                                        <option
                                            value="<?= $escapar($oficina['id']) ?>"
                                            <?= $oficinaPreenchida === $oficina['id']
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            <?= $escapar($oficina['titulo']) ?>
                                        </option>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </optgroup>

                        <?php endforeach; ?>

                    </select>

                    <?php if (isset($erros['oficina'])): ?>
                        <p id="erro-oficina" role="alert">
                            <?= $escapar($erros['oficina']) ?>
                        </p>
                    <?php endif; ?>

                </div>

                <!-- ACEITE DA SIMULACAO ACADEMICA -->

                <div class="campo-formulario">

                    <input
                        type="checkbox"
                        id="aceite"
                        name="aceite"
                        value="1"
                        required
                        <?= $aceiteMarcado ? 'checked' : '' ?>
                        <?= isset($erros['aceite'])
                            ? 'aria-invalid="true" aria-describedby="erro-aceite"'
                            : '' ?>
                    >

                    <label for="aceite">
                        Estou ciente de que este formulário é uma
                        simulação acadêmica, sem inscrição real.
                        <span aria-hidden="true">*</span>
                    </label>

                </div>

                <?php if (isset($erros['aceite'])): ?>
                    <p id="erro-aceite" role="alert">
                        <?= $escapar($erros['aceite']) ?>
                    </p>
                <?php endif; ?>

                <!-- ENVIO DO FORMULARIO -->

                <p>
                    <small>* Campos obrigatórios.</small>
                </p>

                <button type="submit">
                    Confirmar inscrição
                </button>

            </form>

        </section>

    </div>
</main>

<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>