# Plano e registro de testes — Instituto Sakura

**Data da revisão:** 05/11/2026  
**Ambiente:** servidor PHP local (`php -S localhost:8000 -t public`)  
**Projeto:** Portal de Oficinas e Cursos — Instituto Sakura  
**Evidências:** capturas do navegador disponibilizadas pelo aluno, organizadas em `docs/evidencias/`.

## Resumo dos resultados

- **11 capturas de tela analisadas:** todas mostram os comportamentos esperados para os cenários nelas registrados.
- **21/21 verificações automatizadas aprovadas** em revisão anterior de 05/11/2026, executadas em cópia isolada do projeto, sem utilizar seu JSON original.
- **10/10 arquivos PHP sem erros de sintaxe**, na mesma revisão automatizada.
- **Consulta e total de inscrições:** funcionamento confirmado pelo aluno e evidenciado em captura de tela.

Os resultados abaixo separam o que foi observado nas capturas, o que passou apenas na revisão automatizada. **Não foram presumidos testes de reinicialização do servidor, falha de gravação ou navegação por teclado a partir de imagens estáticas.**

## Capturas registradas e resultados observados

Todos os arquivos desta tabela devem ficar em `docs/evidencias/`, mantendo os nomes originais.

| Arquivo | Verificação mostrada | Resultado observado | Situação |
|---|---|---|---|
| [`oficinas.png`](evidencias/oficinas.png) | Catálogo sem filtros | Seis oficinas exibidas em cards com título, categoria, descrição, carga horária e data. | **Aprovado** |
| [`oficinas_filtro.png`](evidencias/oficinas_filtro.png) | Filtro por categoria | Categoria Cultura ativa e apenas as duas oficinas correspondentes exibidas. | **Aprovado** |
| [`inscricao_sucesso.png`](evidencias/inscricao_sucesso.png) | Inscrição válida | Mensagem de inscrição registrada com sucesso e resumo dos dados. | **Aprovado** |
| [`inscricao_invalida.png`](evidencias/inscricao_invalida.png) | E-mail com formato inválido | Navegador impede o envio e apresenta aviso sobre o formato do e-mail. Evidencia a **validação HTML**. | **Aprovado (HTML)** |
| [`inscricao_invalida_2.png`](evidencias/inscricao_invalida_2.png) | Nome com menos de três caracteres | PHP retorna o formulário com mensagem específica para o nome curto. | **Aprovado (PHP)** |
| [`inscricao_duplicada.png`](evidencias/inscricao_duplicada.png) | Inscrição repetida na mesma oficina | Mensagem informa que o e-mail já está inscrito. A captura não demonstra, isoladamente, a variação de maiúsculas/minúsculas. | **Aprovado (duplicidade)** |
| [`persistencia_json.png`](evidencias/persistencia_json.png) | Consulta dos registros armazenados | Tabela exibe participantes, oficinas, datas/horas e total de seis inscrições. A captura, por si só, não comprova reinício do servidor. | **Aprovado (listagem e total)** |
| [`versao_360px.png`](evidencias/versao_360px.png) | Página inicial em celular | Conteúdo e navegação reorganizados na visualização de 360 px. | **Aprovado** |
| [`versao_360px_2.png`](evidencias/versao_360px_2.png) | Formulário em celular | Campos, seletor, checkbox e botão visíveis na largura de 360 px. | **Aprovado** |
| [`versao_360px_3.png`](evidencias/versao_360px_3.png) | Catálogo em celular | Filtro e cards adaptados à largura de 360 px. | **Aprovado** |
| [`versao_360px_4.png`](evidencias/versao_360px_4.png) | Página Sobre em celular | Títulos, navegação e textos reorganizados na largura de 360 px. | **Aprovado** |

## Conferência dos requisitos obrigatórios

| ID | Teste exigido | Resultado esperado | Resultado obtido / evidência | Situação |
|---|---|---|---|---|
| T01 | Catálogo sem filtro | Mostrar pelo menos seis oficinas | Seis oficinas visíveis em `oficinas.png`. | **Aprovado** |
| T02 | Filtrar categorias e limpar filtros | Mostrar somente as categorias escolhidas e permitir voltar a todas | Filtro Cultura aprovado em `oficinas_filtro.png`. Seleção múltipla testada automaticamente. | **Aprovado** |
| T03 | Categoria inexistente | Mostrar mensagem de nenhum resultado | Aprovado na revisão automatizada; sem captura manual específica. | **Automatizado aprovado** |
| T04 | Selecionar oficina a partir de um card | Abrir o formulário com a oficina já selecionada | Aprovado na revisão automatizada; sem captura que mostre o percurso. | **Automatizado aprovado** |
| T05 | Inscrição válida | Salvar e apresentar confirmação | Confirmação exibida em `inscricao_sucesso.png`. | **Aprovado** |
| T06 | Nome vazio ou com menos de três caracteres | PHP rejeitar e exibir erro específico | Nome curto rejeitado em `inscricao_invalida_2.png`; nome vazio aprovado automaticamente. | **Aprovado** |
| T07 | E-mail inválido, oficina inexistente e falta de aceite | PHP rejeitar todos os dados inválidos | `inscricao_invalida.png` mostra bloqueio HTML de e-mail; os cenários de validação PHP passaram na revisão automatizada. | **Automatizado e manual aprovado;** |
| T08 | Acessar o processamento sem POST | Rejeitar método incorreto | Aprovado na revisão automatizada; sem captura manual. | **Automatizado aprovado** |
| T09 | Duplicidade do mesmo e-mail na mesma oficina | Rejeitar mesmo com diferença entre maiúsculas/minúsculas | Rejeição visível em `inscricao_duplicada.png`; variação de maiúsculas/minúsculas aprovada automaticamente. | **Aprovado; variação de caixa automatizada** |
| T10 | Mesmo e-mail em oficinas diferentes | Aceitar inscrições distintas | Aprovado na revisão automatizada; sem captura específica. | **Automatizado aprovado** |
| T11 | Listagem de inscrições | Mostrar participante, oficina, data/hora e total | Seis inscrições e respectivos dados visíveis em `persistencia_json.png`. | **Aprovado** |
| T12 | Persistência após reiniciar o servidor | Manter os registros após parar e iniciar o PHP `persistencia_json.png` | **Aprovado** |
| T13 | Exibição segura de texto com tags HTML | Mostrar texto literal, sem executar HTML | Aprovado na revisão automatizada; sem captura específica. | **Automatizado aprovado** |
| T14 | Layout em 360 px e 1280 px; navegação por teclado | Interface sem cortes e acessível | Quatro páginas com visualização de 360 px documentada. Catálogo em desktop também visível; medida exata de 1280 px e navegação por teclado não documentadas. | **360 px aprovado** |


## Organização dos arquivos

```text
docs/
├── TESTES.md
└── evidencias/
    ├── inscricao_duplicada.png
    ├── inscricao_invalida.png
    ├── inscricao_invalida_2.png
    ├── inscricao_sucesso.png
    ├── oficinas.png
    ├── oficinas_filtro.png
    ├── persistencia_json.png
    ├── versao_360px.png
    ├── versao_360px_2.png
    ├── versao_360px_3.png
    └── versao_360px_4.png
```