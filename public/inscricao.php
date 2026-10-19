<?php
// Estrutura do formulário criada com apoio de IA. Ver IA-02 em USO_IA.md.
$tituloPagina = 'Inscrição';
require_once dirname(__DIR__) . '/includes/cabecalho.php';
?>

<main id="conteudo">
    <div class="container">
        <header class="cabecalho-pagina">
            <h1>Inscreva-se em uma oficina</h1>
            <p>Preencha os campos abaixo utilizando apenas dados fictícios para testar o sistema.</p>
        </header>

        <section aria-labelledby="titulo-formulario">
            <h2 id="titulo-formulario">Dados do participante</h2>
            <form action="/salvar-inscricao.php" method="post">
                <div class="campo-formulario">
                    <label for="nome">Nome completo <span aria-hidden="true">*</span></label>
                    <input type="text" id="nome" name="nome" autocomplete="name" minlength="3" required>
                </div>

                <div class="campo-formulario">
                    <label for="email">E-mail <span aria-hidden="true">*</span></label>
                    <input type="email" id="email" name="email" autocomplete="email" required>
                </div>

                <div class="campo-formulario">
                    <label for="oficina">Oficina desejada <span aria-hidden="true">*</span></label>
                    <select id="oficina" name="oficina" required>
                        <option value="">Selecione uma oficina</option>
                        <optgroup label="Idioma">
                            <option value="idioma-01">Japonês para Iniciantes</option>
                            <option value="idioma-02">Hiragana e Katakana</option>
                        </optgroup>
                        <optgroup label="Cultura">
                            <option value="cultura-01">História e Tradições do Japão</option>
                            <option value="cultura-02">Etiqueta e Costumes Japoneses</option>
                        </optgroup>
                        <optgroup label="Artes">
                            <option value="artes-01">Introdução ao Shodō</option>
                            <option value="artes-02">Origami e Artes Tradicionais</option>
                        </optgroup>
                    </select>
                </div>

                <div class="campo-formulario">
                    <input type="checkbox" id="aceite" name="aceite" value="1" required>
                    <label for="aceite">Estou ciente de que este formulário é uma simulação acadêmica, sem inscrição real. <span aria-hidden="true">*</span></label>
                </div>

                <p><small>* Campos obrigatórios.</small></p>
                <button type="submit">Enviar inscrição</button>
            </form>
            <p><em>Nesta primeira etapa, o formulário ainda não grava dados; a validação no servidor e o JSON serão implementados posteriormente.</em></p>
        </section>
    </div>
</main>

<?php require_once dirname(__DIR__) . '/includes/rodape.php'; ?>
