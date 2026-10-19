<?php
// Estrutura da consulta de inscrições criada com apoio de IA. Ver IA-02 em USO_IA.md.
$tituloPagina = 'Inscrições';
require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <div class="container">
        <header class="cabecalho-pagina">
            <h1>Inscrições registradas</h1>
            <p>Esta área exibirá somente registros fictícios gerados durante os testes locais.</p>
        </header>

        <section aria-labelledby="titulo-consulta">
            <h2 id="titulo-consulta">Consulta de participantes</h2>
            <p><strong>Total de inscrições:</strong> a calcular quando a consulta em JSON estiver pronta.</p>
            <p>A listagem de inscrições será implementada na etapa PHP. Nenhum dado está sendo consultado nesta versão inicial.</p>
        </section>
    </div>
</main>

<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>
