<?php
// Estrutura da página Sobre criada com apoio de IA. Ver IA-02 em USO_IA.md.
$tituloPagina = 'Sobre';
require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <div class="container">
        <header class="cabecalho-pagina">
            <h1>Sobre o Instituto Sakura</h1>
            <p>Um portal acadêmico inspirado na aprendizagem da língua e da cultura japonesa.</p>
        </header>

        <section aria-labelledby="titulo-projeto">
            <h2 id="titulo-projeto">Objetivo do projeto</h2>
            <p>
                O Instituto Sakura é uma instituição inteiramente fictícia, criada para um trabalho
                prático de desenvolvimento web. O site apresenta oficinas sobre idioma, cultura e
                artes japonesas e servirá como demonstração de um sistema de inscrições.
            </p>
        </section>

        <section aria-labelledby="titulo-tecnologias">
            <h2 id="titulo-tecnologias">Tecnologias utilizadas</h2>
            <ul>
                <li>HTML semântico para estruturar as páginas.</li>
                <li>CSS próprio para apresentação e responsividade (próxima etapa).</li>
                <li>PHP para reutilização de cabeçalho e rodapé; o processamento será desenvolvido posteriormente.</li>
                <li>JSON para armazenar inscrições fictícias (etapa futura).</li>
                <li>Git e GitHub para registrar a evolução do projeto.</li>
            </ul>
        </section>

        <section aria-labelledby="titulo-autoria">
            <h2 id="titulo-autoria">Autoria e transparência</h2>
            <p><strong>Autor:</strong> [preencher com seu nome].</p>
            <p>O uso de inteligência artificial no planejamento e na implementação está documentado em <code>USO_IA.md</code>, no repositório do projeto.</p>
        </section>

        <section aria-labelledby="titulo-aviso">
            <h2 id="titulo-aviso">Aviso acadêmico</h2>
            <p>Este projeto é uma simulação. Os cursos, datas e inscrições são fictícios. Não existe oferta comercial ou inscrição real.</p>
        </section>
    </div>
</main>

<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>
