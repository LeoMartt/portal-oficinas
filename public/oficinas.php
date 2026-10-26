<?php
// Filtro de multiplas categorias via GET com apoio de IA.
// Referencia: IA-04 em USO_IA.md. Links de pre-selecao: IA-07.
$tituloPagina = 'Oficinas';
require_once dirname(__DIR__) . '/includes/oficinas.php';

// GET pode receber uma categoria (?categoria=idioma) ou varias
// (?categoria[]=idioma&categoria[]=cultura).
$categoriasRecebidas = $_GET['categoria'] ?? [];
if (is_string($categoriasRecebidas)) {
    $categoriasRecebidas = [$categoriasRecebidas];
}
if (!is_array($categoriasRecebidas)) {
    $categoriasRecebidas = [];
}

$categoriasSelecionadas = [];
foreach ($categoriasRecebidas as $valor) {
    if (is_string($valor)) {
        $valor = strtolower(trim($valor));
        if ($valor !== '' && !in_array($valor, $categoriasSelecionadas, true)) {
            $categoriasSelecionadas[] = $valor;
        }
    }
}

// Sem categoria selecionada = todas as oficinas.
$mostrarTodas = $categoriasSelecionadas === [];
$oficinasFiltradas = array_filter(
    $oficinas,
    static fn (array $oficina): bool =>
        $mostrarTodas || in_array($oficina['categoria'], $categoriasSelecionadas, true)
);

// Quantidade de categorias validas escolhidas para o indicador visual.
$quantidadeFiltros = count(array_intersect($categoriasSelecionadas, array_keys($categorias)));

// Contagem por categoria usada nas opcoes do menu.
$quantidadePorCategoria = array_fill_keys(array_keys($categorias), 0);
foreach ($oficinas as $oficina) {
    $quantidadePorCategoria[$oficina['categoria']]++;
}

require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <div class="container">
        <header class="cabecalho-pagina">
            <h1>Oficinas disponíveis</h1>
            <p>Explore nossas oficinas fictícias sobre língua, cultura e artes do Japão.</p>
        </header>

        <section class="secao-catalogo" aria-labelledby="titulo-catalogo">
            <div class="cabecalho-catalogo">
                <div>
                    <h2 id="titulo-catalogo">Catálogo de oficinas</h2>
                    <p class="resultado-catalogo" role="status">
                        <?= count($oficinasFiltradas) ?> oficina(s) encontrada(s)
                    </p>
                </div>

                <details class="menu-filtros">
                    <summary class="botao-abrir-filtros">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 7h16M7 12h10M10 17h4" />
                        </svg>
                        <span>Filtros</span>
                        <?php if ($quantidadeFiltros > 0): ?>
                            <span class="quantidade-filtros" aria-label="<?= $quantidadeFiltros ?> categorias selecionadas">
                                <?= $quantidadeFiltros ?>
                            </span>
                        <?php endif; ?>
                        <span class="seta-filtros" aria-hidden="true"></span>
                    </summary>

                    <div class="caixa-filtros">
                        <form class="formulario-filtros" method="get" action="/oficinas.php">
                            <div class="topo-caixa-filtros">
                                <strong>Filtrar oficinas</strong>
                                <span>Selecione uma ou mais categorias</span>
                            </div>

                            <fieldset class="opcoes-filtros">
                                <legend>Categorias</legend>

                                <?php foreach ($categorias as $slug => $nomeCategoria): ?>
                                    <label class="opcao-filtro">
                                        <span class="descricao-opcao-filtro">
                                            <input
                                                type="checkbox"
                                                name="categoria[]"
                                                value="<?= htmlspecialchars($slug, ENT_QUOTES, 'UTF-8') ?>"
                                                <?= in_array($slug, $categoriasSelecionadas, true) ? 'checked' : '' ?>
                                            >
                                            <span><?= htmlspecialchars($nomeCategoria, ENT_QUOTES, 'UTF-8') ?></span>
                                        </span>
                                        <span class="total-categoria"><?= $quantidadePorCategoria[$slug] ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </fieldset>

                            <a class="opcao-todas" href="/oficinas.php">
                                <span aria-hidden="true">↗</span> Todas as oficinas (<?= count($oficinas) ?>)
                            </a>

                            <div class="acoes-filtros">
                                <a class="limpar-filtros" href="/oficinas.php">Limpar filtros</a>
                                <button type="submit" class="aplicar-filtros">Aplicar filtros</button>
                            </div>
                        </form>
                    </div>
                </details>
            </div>

            <?php if (!$mostrarTodas): ?>
                <div class="filtros-ativos" aria-label="Categorias selecionadas">
                    <span>Filtros ativos:</span>
                    <?php foreach ($categorias as $slug => $nomeCategoria): ?>
                        <?php if (in_array($slug, $categoriasSelecionadas, true)): ?>
                            <span class="etiqueta-filtro-ativo">
                                <?= htmlspecialchars($nomeCategoria, ENT_QUOTES, 'UTF-8') ?>
                            </span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <a href="/oficinas.php">Ver todas</a>
                </div>
            <?php endif; ?>

            <?php if (count($oficinasFiltradas) === 0): ?>
                <div class="sem-oficinas">
                    <h3>Nenhuma oficina encontrada</h3>
                    <p>Não encontramos oficinas para as categorias selecionadas.</p>
                    <a class="botao" href="/oficinas.php">Mostrar todas as oficinas</a>
                </div>
            <?php else: ?>
                <div class="grade-oficinas">
                    <?php foreach ($oficinasFiltradas as $oficina): ?>
                        <article class="card-oficina" id="<?= htmlspecialchars($oficina['id'], ENT_QUOTES, 'UTF-8') ?>">
                            <p class="categoria">
                                <?= htmlspecialchars($categorias[$oficina['categoria']], ENT_QUOTES, 'UTF-8') ?>
                            </p>
                            <h3><?= htmlspecialchars($oficina['titulo'], ENT_QUOTES, 'UTF-8') ?></h3>
                            <p><?= htmlspecialchars($oficina['descricao'], ENT_QUOTES, 'UTF-8') ?></p>
                            <p><strong>Carga horária:</strong> <?= (int) $oficina['carga_horaria'] ?> horas</p>
                            <p>
                                <strong>Data:</strong>
                                <time datetime="<?= htmlspecialchars($oficina['data'], ENT_QUOTES, 'UTF-8') ?>">
                                    <?= date('d/m/Y', strtotime($oficina['data'])) ?>
                                </time>
                            </p>
                            <a href="/inscricao.php?oficina=<?= rawurlencode($oficina['id']) ?>">Selecionar oficina no formulário</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </div>
</main>

<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>
