<?php
// Estrutura inicial: IA-02. Links com oficina preselecionada: IA-07 (USO_IA.md).
$tituloPagina = 'Início';
require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <section class="apresentacao" aria-labelledby="titulo-principal">
        <div class="container">
            <p class="etiqueta">Bem-vindo ao Instituto Sakura</p>
            <h1 id="titulo-principal">Explore o Japão por meio da língua e da cultura</h1>
            <p>
                O Instituto Sakura é uma instituição fictícia que oferece oficinas para quem
                deseja dar os primeiros passos no japonês e conhecer tradições, costumes e artes do Japão.
            </p>
            <a class="botao" href="/oficinas.php">Conhecer todas as oficinas</a>
        </div>
    </section>

    <section class="destaques" aria-labelledby="titulo-destaques">
        <div class="container">
            <h2 id="titulo-destaques">Oficinas em destaque</h2>
            <p>Três opções para começar sua jornada de aprendizagem.</p>

            <div class="grade-oficinas">
                <article class="card-oficina">
                    <p class="categoria">Idioma</p>
                    <h3>Japonês para Iniciantes</h3>
                    <p>Aprenda expressões básicas, apresentações e frases comuns do dia a dia.</p>
                    <p><strong>Carga horária:</strong> 12 horas</p>
                    <a href="/inscricao.php?oficina=idioma-01">Quero me inscrever</a>
                </article>

                <article class="card-oficina">
                    <p class="categoria">Cultura</p>
                    <h3>História e Tradições do Japão</h3>
                    <p>Descubra celebrações, períodos históricos e costumes japoneses.</p>
                    <p><strong>Carga horária:</strong> 10 horas</p>
                    <a href="/inscricao.php?oficina=cultura-01">Quero me inscrever</a>
                </article>

                <article class="card-oficina">
                    <p class="categoria">Artes</p>
                    <h3>Origami e Artes Tradicionais</h3>
                    <p>Conheça a arte da dobradura e suas conexões com a cultura japonesa.</p>
                    <p><strong>Carga horária:</strong> 5 horas</p>
                    <a href="/inscricao.php?oficina=artes-02">Quero me inscrever</a>
                </article>
            </div>
        </div>
    </section>

    <section class="convite" aria-labelledby="titulo-convite">
        <div class="container">
            <h2 id="titulo-convite">Uma experiência para aprender e descobrir</h2>
            <p>Escolha uma das oficinas disponíveis e conheça nosso formulário de inscrição demonstrativo.</p>
            <a href="/inscricao.php">Ir para inscrição</a>
        </div>
    </section>
</main>

<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>
