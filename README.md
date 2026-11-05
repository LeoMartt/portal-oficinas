# Instituto Sakura — Portal de Oficinas e Cursos

Projeto acadêmico individual de desenvolvimento web com **HTML, CSS e PHP**, criado para apresentar oficinas fictícias sobre língua, cultura e artes japonesas e simular inscrições.

**Autor:** Leonardo Martins da Silva  
**Entrega prevista:** 20/11/2026  
**Repositório:** https://github.com/LeoMartt/portal-oficinas

> Todas as oficinas e inscrições são fictícias. O projeto não representa uma instituição real e não deve receber dados pessoais verdadeiros.

## Funcionalidades

- **Início:** apresentação do Instituto Sakura e três oficinas em destaque.
- **Oficinas:** catálogo com seis oficinas de **Idioma, Cultura e Artes**, gerado com um array e um laço PHP; filtros de categoria via `GET`, com checkboxes para selecionar uma ou mais categorias e limpar a seleção.
- **Inscrição:** formulário enviado por `POST`, com nome, e-mail, oficina e aceite obrigatório de ciência da simulação acadêmica. Os links das oficinas permitem pré-selecioná-las.
- **Validação:** o PHP confere os campos, o e-mail, o identificador da oficina e o aceite; informa erros e tenta preservar os dados preenchidos.
- **Armazenamento:** inscrições gravadas em `dados/inscricoes.json`, com identificador único e data/hora; dados existentes são preservados. O sistema impede a repetição do mesmo e-mail na mesma oficina, sem distinguir maiúsculas de minúsculas.
- **Consulta:** lista participantes fictícios, oficina, data/hora e quantidade total de inscrições. Os valores fornecidos pelo usuário são escapados ao exibir HTML.
- **Sobre:** objetivo acadêmico, autoria, tecnologias e aviso de simulação.

## Tecnologias e requisitos

- PHP **8.1 ou superior** (desenvolvimento local com PHP 8.5.11).
- HTML semântico e CSS próprio, com Flexbox, Grid e media queries.
- Git e GitHub para versionamento.
- Armazenamento JSON local, **sem MySQL, JavaScript, frameworks de interface ou hospedagem**.

O projeto foi organizado para ser executado no servidor de desenvolvimento integrado ao PHP. Não é necessário instalar XAMPP ou banco de dados.

## Como executar no Windows (PowerShell do VS Code)

1. Clone o repositório e abra a pasta do projeto:

   ```powershell
   git clone https://github.com/LeoMartt/portal-oficinas.git
   cd portal-oficinas
   code .
   ```

2. Confirme a instalação do PHP:

   ```powershell
   php -v
   ```

3. Na raiz do projeto, inicie o servidor:

   ```powershell
   php -S localhost:8000 -t public
   ```

4. Acesse **http://localhost:8000** no navegador. Para encerrar, pressione `Ctrl + C` no terminal.

A pasta `dados/` deve permitir gravação pelo PHP. O arquivo `dados/inscricoes.json` é **criado automaticamente** na primeira consulta ou inscrição, sem precisar estar no repositório. Se ocorrer erro de permissão, verifique as permissões de gravação dessa pasta. Não coloque `dados/` dentro de `public/`.

## Estrutura do projeto

```text
portal-oficinas/
├── public/
│   ├── index.php
│   ├── oficinas.php
│   ├── inscricao.php
│   ├── salvar-inscricao.php
│   ├── inscricoes.php
│   ├── sobre.php
│   └── assets/css/style.css
├── includes/
│   ├── cabecalho.php
│   ├── rodape.php
│   ├── oficinas.php
│   └── armazenamento-inscricoes.php
├── dados/                 # JSON e arquivos de controle gerados localmente
├── docs/
│   ├── TESTES.md
│   ├── ROTEIRO_VIDEO.md
│   └── evidencias/        # capturas dos testes, quando produzidas
├── README.md
├── USO_IA.md
└── .gitignore
```

## Como ocorre uma inscrição

1. O visitante escolhe uma oficina e abre `inscricao.php`.
2. O formulário envia os dados por `POST` a `salvar-inscricao.php`.
3. O PHP verifica nome, e-mail, oficina cadastrada e aceite obrigatório.
4. `includes/armazenamento-inscricoes.php` lê o JSON, verifica duplicidades e grava a nova inscrição. Um arquivo de bloqueio e um arquivo temporário ajudam a proteger a gravação.
5. O sistema confirma o cadastro **somente depois de salvar**. A página `inscricoes.php` lê os registros e mostra a consulta.

A validação do navegador ajuda na experiência do usuário, mas **não substitui** a validação no servidor. O PHP também rejeita o acesso direto ao processamento por métodos diferentes de `POST`.

## Testes e evidências

Os testes estão organizados em [docs/TESTES.md](docs/TESTES.md), com resultados esperados, resultados observados e espaço para capturas.

Em **05/11/2026**, uma verificação automatizada em uma cópia local isolada do projeto confirmou **21 de 21 cenários**, além da sintaxe dos 10 arquivos PHP. Esses testes não substituem as capturas e as verificações manuais exigidas para a entrega, especialmente em larguras de **360 px e 1280 px**.

A consulta e o total de inscrições também foram conferidos manualmente durante o desenvolvimento. As demais evidências visuais devem ser registradas em `docs/evidencias/` conforme os testes forem executados.

## Vídeo de demonstração

**Link do vídeo (3 a 5 minutos):** PENDENTE — inserir aqui o link acessível ao professor após a gravação.

## Limitações e cuidados

- Uso **exclusivamente acadêmico e local**, sem autenticação, pagamentos ou envio de e-mails.
- Não utilizar nomes ou e-mails reais; a consulta foi preparada apenas para registros fictícios.
- Os dados do JSON não são enviados ao GitHub. Para começar novos testes do zero, interrompa o servidor e remova apenas `dados/inscricoes.json`, se não precisar dos registros atuais; o arquivo será recriado.
- O GitHub é utilizado para publicar **código**, não para executar PHP. GitHub Pages não hospeda o processamento deste sistema.
- Testes de responsividade, acesso por teclado e evidências visuais precisam ser concluídos e documentados antes da entrega.

## Recursos externos e uso de IA

A interface utiliza CSS próprio. **Não foram identificados frameworks, fontes remotas ou imagens externas no código analisado**; caso sejam acrescentados recursos de terceiros, registrar aqui a origem.

Houve apoio do ChatGPT em planejamento, estrutura, design, PHP e documentação. Os principais usos, as decisões, os arquivos relacionados e as verificações estão registrados em [USO_IA.md](USO_IA.md). O autor é responsável por revisar, testar e explicar o código entregue.
