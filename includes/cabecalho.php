<?php
// Estrutura compartilhada elaborada com apoio de IA. Ver IA-02 em USO_IA.md.
$tituloPagina = $tituloPagina ?? 'Início';
$paginaAtual = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$paginasMenu = [
    'index.php' => 'Início',
    'oficinas.php' => 'Oficinas',
    'inscricao.php' => 'Inscrição',
    'inscricoes.php' => 'Inscrições',
    'sobre.php' => 'Sobre',
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conheça oficinas fictícias de língua, cultura e artes japonesas no Instituto Sakura.">
    <title><?= htmlspecialchars($tituloPagina, ENT_QUOTES, 'UTF-8') ?> | Instituto Sakura</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <a class="pular-conteudo" href="#conteudo">Pular para o conteúdo</a>

    <header class="cabecalho-site">
        <div class="container">
            <p class="marca"><a href="/index.php">Instituto Sakura</a></p>
            <p class="subtitulo-marca">Língua, cultura e artes do Japão</p>

            <nav aria-label="Navegação principal">
                <ul class="menu-principal">
                    <?php foreach ($paginasMenu as $arquivo => $rotulo): ?>
                        <li>
                            <a href="/<?= $arquivo ?>" <?= $paginaAtual === $arquivo ? 'aria-current="page"' : '' ?>>
                                <?= htmlspecialchars($rotulo, ENT_QUOTES, 'UTF-8') ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </header>
