# Registro de utilização de inteligência artificial

**Projeto:** Instituto Sakura — Portal de Oficinas e Cursos  
**Ferramenta:** ChatGPT (OpenAI), modelo GPT-6  
**Critério de registro:** principais intervenções com impacto no projeto; correções pequenas relacionadas são agrupadas no mesmo registro. Os commits citados correspondem ao histórico disponível no projeto enviado. Os resultados automatizados não são apresentados como testes feitos manualmente pelo aluno.


## IA-01 — Estrutura das páginas (19/10/2026)

- **Pedido:** apoiar a criação das páginas HTML de um portal sobre língua e cultura japonesa.
- **Aplicação:** estrutura inicial das seis páginas em `public/` e partes compartilhadas em `includes/cabecalho.php` e `includes/rodape.php`.
- **Decisão/verificação:** o tema **Instituto Sakura** foi escolhido pelo aluno; as páginas e a navegação foram abertas no servidor local. As funcionalidades de PHP foram acrescentadas depois.
- **Commit relacionado:** `ea04749`.

## IA-02 — Design e CSS (19/10/2026)

- **Pedido:** apresentar opções de design e adaptar o CSS ao estilo escolhido.
- **Aplicação:** `public/assets/css/style.css`.
- **Decisão/verificação:** o aluno escolheu e aprovou o design **Sakura Minimalista**. A conferência formal de 360 px, 1280 px e navegação por teclado permanece na documentação de testes.
- **Commit relacionado:** `c05c4c0`.

## IA-03 — Catálogo e filtros (19/10/2026)

- **Pedido:** gerar as oficinas com PHP, permitir filtros por checkboxes e corrigir o filtro que ultrapassava a tela no celular.
- **Aplicação:** `includes/oficinas.php`, `public/oficinas.php` e trechos de `public/assets/css/style.css`.
- **Decisão/verificação:** a escolha do filtro de múltiplas categorias e a identificação do problema mobile partiram do aluno. Após o ajuste, ele confirmou que o filtro passou a aparecer corretamente no celular.
- **Commits relacionados:** `c712a47` (filtros) e `b6aa017` (responsividade).

## IA-04 — Validação das inscrições (19/10/2026)

- **Pedido:** validar no PHP nome, e-mail, oficina e aceite da simulação, com mensagens de erro e envio por `POST`.
- **Aplicação:** `public/inscricao.php` e `public/salvar-inscricao.php`.
- **Decisão/verificação:** o aceite obrigatório foi mantido após conferir o enunciado. A validação de dados inválidos e de método incorreto passou em testes automatizados em 05/11/2026; registrar evidências manuais em `docs/TESTES.md`.
- **Commit relacionado:** `b8f5b0a` (validação integrada com a persistência).

## IA-05 — Armazenamento JSON e duplicidades (26/10/2026)

- **Pedido:** salvar inscrições em JSON sem perder dados anteriores e rejeitar inscrições repetidas para a mesma oficina e e-mail.
- **Aplicação:** `includes/armazenamento-inscricoes.php`, `public/salvar-inscricao.php` e `public/inscricao.php`.
- **Decisão/verificação:** foram aproveitadas as rotinas de gravação e controle de duplicidade. Testes automatizados em cópia isolada verificaram criação do JSON, duplicidade e tratamento de JSON inválido; os testes manuais e capturas seguem documentados separadamente.
- **Commit relacionado:** `b8f5b0a`.

## IA-06 — Pré-seleção da oficina (26/10/2026)

- **Pedido:** fazer com que o botão de uma oficina abra o formulário com a oficina já selecionada.
- **Aplicação:** `public/index.php`, `public/oficinas.php` e `public/inscricao.php`.
- **Decisão/verificação:** os links passaram a informar o identificador da oficina; o PHP aceita apenas identificadores presentes no catálogo. A pré-seleção foi contemplada nos testes automatizados; conferir também a interação no navegador.
- **Commit relacionado:** `b8f5b0a` (ajustes integrados no fluxo).

## IA-07 — Consulta de inscrições (26/10/2026)

- **Pedido:** ler o JSON e exibir participantes, oficinas, datas e total, de forma segura.
- **Aplicação:** `public/inscricoes.php`, `includes/armazenamento-inscricoes.php` e estilos da consulta em `public/assets/css/style.css`.
- **Decisão/verificação:** o aluno confirmou que a listagem e o total aparecem corretamente; testes automatizados adicionais verificaram exibição segura de texto e erro em JSON corrompido.
- **Commit relacionado:** `eaf0614`.

---

**Observação:** os registros acima descrevem apoio efetivamente utilizado. A revisão final, os testes manuais, as eventuais adaptações e a explicação técnica na apresentação são de responsabilidade do aluno.
