<?php
// Estrutura da página de resultado criada com apoio de IA. Ver IA-02 em USO_IA.md.
// A lógica de validação e gravação será acrescentada na etapa PHP.
$tituloPagina = 'Resultado da inscrição';
$recebidoPorPost = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';

if (!$recebidoPorPost) {
    http_response_code(405);
    header('Allow: POST');
}

require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <div class="container">
        <h1>Resultado da inscrição</h1>

        <?php if (!$recebidoPorPost): ?>
            <p role="alert">A página de processamento só pode ser acessada pelo envio do formulário (POST).</p>
        <?php else: ?>
            <p role="status">Formulário recebido, mas o cadastro ainda não está disponível nesta etapa. Nenhum dado foi salvo.</p>
        <?php endif; ?>

        <a href="/inscricao.php">Voltar ao formulário</a>
    </div>
</main>

<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>
