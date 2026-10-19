<?php
// Estrutura inicial do catálogo criada com apoio de IA. Ver IA-02 em USO_IA.md.
// Na etapa PHP, os cards serão gerados com um array e um laço e haverá filtro por GET.
$tituloPagina = 'Oficinas';
require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <div class="container">
        <header class="cabecalho-pagina">
            <h1>Oficinas disponíveis</h1>
            <p>Conheça seis oficinas fictícias sobre o Japão, divididas em três categorias.</p>
        </header>

        <section aria-labelledby="titulo-categorias">
            <h2 id="titulo-categorias">Categorias</h2>
            <p>Idioma, Cultura e Artes.</p>
            <p><em>O filtro por categoria será implementado na etapa de programação PHP.</em></p>
        </section>

        <section aria-labelledby="titulo-catalogo">
            <h2 id="titulo-catalogo">Catálogo completo</h2>
            <div class="grade-oficinas">
                <article class="card-oficina" id="idioma-01">
                    <p class="categoria">Idioma</p>
                    <h3>Japonês para Iniciantes</h3>
                    <p>Vocabulário inicial, apresentações pessoais e expressões cotidianas.</p>
                    <p><strong>Carga horária:</strong> 12 horas</p>
                    <p><strong>Data:</strong> <time datetime="2026-12-05">05/12/2026</time></p>
                    <a href="/inscricao.php">Selecionar oficina no formulário</a>
                </article>

                <article class="card-oficina" id="idioma-02">
                    <p class="categoria">Idioma</p>
                    <h3>Hiragana e Katakana</h3>
                    <p>Introdução aos dois sistemas de escrita fonética da língua japonesa.</p>
                    <p><strong>Carga horária:</strong> 8 horas</p>
                    <p><strong>Data:</strong> <time datetime="2026-12-12">12/12/2026</time></p>
                    <a href="/inscricao.php">Selecionar oficina no formulário</a>
                </article>

                <article class="card-oficina" id="cultura-01">
                    <p class="categoria">Cultura</p>
                    <h3>História e Tradições do Japão</h3>
                    <p>Panorama histórico, festivais tradicionais e manifestações culturais.</p>
                    <p><strong>Carga horária:</strong> 10 horas</p>
                    <p><strong>Data:</strong> <time datetime="2026-12-19">19/12/2026</time></p>
                    <a href="/inscricao.php">Selecionar oficina no formulário</a>
                </article>

                <article class="card-oficina" id="cultura-02">
                    <p class="categoria">Cultura</p>
                    <h3>Etiqueta e Costumes Japoneses</h3>
                    <p>Saudações, formas de respeito e costumes de convivência no Japão.</p>
                    <p><strong>Carga horária:</strong> 6 horas</p>
                    <p><strong>Data:</strong> <time datetime="2027-01-09">09/01/2027</time></p>
                    <a href="/inscricao.php">Selecionar oficina no formulário</a>
                </article>

                <article class="card-oficina" id="artes-01">
                    <p class="categoria">Artes</p>
                    <h3>Introdução ao Shodō</h3>
                    <p>Conheça princípios da caligrafia japonesa e seus materiais tradicionais.</p>
                    <p><strong>Carga horária:</strong> 4 horas</p>
                    <p><strong>Data:</strong> <time datetime="2027-01-16">16/01/2027</time></p>
                    <a href="/inscricao.php">Selecionar oficina no formulário</a>
                </article>

                <article class="card-oficina" id="artes-02">
                    <p class="categoria">Artes</p>
                    <h3>Origami e Artes Tradicionais</h3>
                    <p>Dobragem de papel e introdução ao significado cultural do origami.</p>
                    <p><strong>Carga horária:</strong> 5 horas</p>
                    <p><strong>Data:</strong> <time datetime="2027-01-23">23/01/2027</time></p>
                    <a href="/inscricao.php">Selecionar oficina no formulário</a>
                </article>
            </div>
        </section>
    </div>
</main>

<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>
