<?php
// Estrutura inicial com apoio de IA. Ver IA-01 em USO_IA.md.
$tituloPagina = 'Sobre';
require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <div class="container">
        <header class="cabecalho-pagina">
            <h1>Sobre o Instituto Sakura</h1>
            <p>Um portal acadêmico dedicado ao aprendizado da língua e da cultura japonesa.</p>
        </header>

        <section aria-labelledby="titulo-projeto">
            <h2 id="titulo-projeto">Objetivo do projeto</h2>
            <p>
                O Instituto Sakura é uma instituição fictícia criada para um trabalho
                prático de desenvolvimento web. O portal apresenta oficinas de idioma,
                cultura e artes japonesas e permite simular inscrições em ambiente local.
            </p>
        </section>

        <section aria-labelledby="titulo-tecnologias">
            <h2 id="titulo-tecnologias">Tecnologias utilizadas</h2>
            <ul>
                <li>HTML semântico para estruturar o conteúdo e a navegação.</li>
                <li>CSS próprio para identidade visual e adaptação a diferentes telas.</li>
                <li>PHP para montar o catálogo, filtrar oficinas, validar formulários e consultar inscrições.</li>
                <li>JSON para armazenar os registros fictícios de inscrição.</li>
                <li>Git e GitHub para organizar e acompanhar a evolução do código.</li>
            </ul>
        </section>

        <section aria-labelledby="titulo-autoria">
            <h2 id="titulo-autoria">Autoria e transparência</h2>
            <p><strong>Autor:</strong> Leonardo Martins da Silva.</p>
            <p>
                O desenvolvimento contou com apoio de inteligência artificial em etapas
                identificadas no arquivo <code>USO_IA.md</code> do repositório do projeto.
            </p>
        </section>

        <section aria-labelledby="titulo-aviso">
            <h2 id="titulo-aviso">Aviso acadêmico</h2>
            <p>
                Este site é uma simulação acadêmica. A instituição, as oficinas, as datas e os
                registros de participantes são fictícios. Não há cursos ou inscrições reais.
            </p>
        </section>
    </div>
</main>

<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>
