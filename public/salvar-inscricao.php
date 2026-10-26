<?php
// Validacoes: IA-05. Salvamento JSON e duplicidades: IA-06 (USO_IA.md).
$tituloPagina = 'Resultado da inscrição';

// Impede processar a pagina sem envio do formulario.
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    require_once dirname(__DIR__) . '/includes/cabecalho.php';
    ?>
    <main id="conteudo">
        <div class="container">
            <h1>Método não permitido</h1>
            <p role="alert">Envie o formulário de inscrição para acessar esta página.</p>
            <a href="/inscricao.php">Voltar ao formulário</a>
        </div>
    </main>
    <?php
    require_once dirname(__DIR__) . '/includes/rodape.php';
    exit;
}

require_once dirname(__DIR__) . '/includes/oficinas.php';
require_once dirname(__DIR__) . '/includes/armazenamento-inscricoes.php';

$nome = is_string($_POST['nome'] ?? null) ? trim($_POST['nome']) : '';
$email = is_string($_POST['email'] ?? null) ? trim($_POST['email']) : '';
$idOficina = is_string($_POST['oficina'] ?? null) ? trim($_POST['oficina']) : '';
$aceite = ($_POST['aceite'] ?? null) === '1';

$dadosFormulario = [
    'nome' => $nome,
    'email' => $email,
    'oficina' => $idOficina,
    'aceite' => $aceite,
];
$erros = [];

if ($nome === '') {
    $erros['nome'] = 'Informe seu nome completo.';
} elseif (preg_match('/^.{3,}$/us', $nome) !== 1) {
    $erros['nome'] = 'O nome precisa ter ao menos três caracteres.';
} elseif (strlen($nome) > 120 * 4) {
    $erros['nome'] = 'O nome informado é muito longo.';
}

if ($email === '') {
    $erros['email'] = 'Informe seu e-mail.';
} elseif (strlen($email) > 254 || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $erros['email'] = 'Informe um e-mail válido.';
}

$oficinaSelecionada = null;
foreach ($oficinas as $oficina) {
    if ($oficina['id'] === $idOficina) {
        $oficinaSelecionada = $oficina;
        break;
    }
}
if ($oficinaSelecionada === null) {
    $erros['oficina'] = 'Selecione uma oficina existente.';
}

if (!$aceite) {
    $erros['aceite'] = 'É necessário confirmar que a inscrição é uma simulação acadêmica.';
}

if ($erros !== []) {
    http_response_code(422);
    // Reexibe o formulario, mantendo os dados ja informados.
    require __DIR__ . '/inscricao.php';
    exit;
}

$novoRegistro = [
    'id' => bin2hex(random_bytes(16)),
    'nome' => $nome,
    'email' => $email,
    'oficina_id' => $idOficina,
    'data_hora' => (new DateTimeImmutable('now', new DateTimeZone('America/Sao_Paulo')))
        ->format(DateTimeInterface::ATOM),
];

$resultado = salvarInscricaoJson($novoRegistro);

if ($resultado === 'duplicada') {
    http_response_code(409);
    $erros['email'] = 'Este e-mail já está inscrito nesta oficina.';
    require __DIR__ . '/inscricao.php';
    exit;
}

if ($resultado !== 'sucesso') {
    http_response_code(500);
    require_once dirname(__DIR__) . '/includes/cabecalho.php';
    ?>
    <main id="conteudo">
        <div class="container">
            <header class="cabecalho-pagina">
                <h1>Não foi possível salvar a inscrição</h1>
                <p role="alert">Ocorreu um problema ao acessar o arquivo de inscrições. Nenhum sucesso foi confirmado.</p>
            </header>
            <p>Tente novamente depois de verificar as permissões da pasta de dados.</p>
            <a href="/inscricao.php">Voltar ao formulário</a>
        </div>
    </main>
    <?php
    require_once dirname(__DIR__) . '/includes/rodape.php';
    exit;
}

http_response_code(201);
require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>
<main id="conteudo">
    <div class="container">
        <header class="cabecalho-pagina">
            <h1>Inscrição registrada com sucesso!</h1>
            <p role="status">A inscrição fictícia foi salva no arquivo JSON do projeto.</p>
        </header>
        <section aria-labelledby="resumo-inscricao">
            <h2 id="resumo-inscricao">Resumo da inscrição</h2>
            <p><strong>Nome:</strong> <?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>E-mail:</strong> <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Oficina:</strong> <?= htmlspecialchars($oficinaSelecionada['titulo'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Data e hora:</strong> <?= htmlspecialchars((new DateTimeImmutable($novoRegistro['data_hora']))->format('d/m/Y H:i'), ENT_QUOTES, 'UTF-8') ?></p>
            <p><small>Este é um projeto acadêmico. Não existe inscrição real.</small></p>
        </section>
        <a href="/oficinas.php">Ver outras oficinas</a>
    </div>
</main>
<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>
