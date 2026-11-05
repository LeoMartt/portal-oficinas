# Plano e registro de testes — Instituto Sakura

**Data da revisão:** 05/11/2026  
**Ambiente:** servidor PHP local (`php -S localhost:8000 -t public`)  
**Dados utilizados:** somente nomes e e-mails fictícios

## Resultado já verificado

- **21/21 verificações automatizadas aprovadas** em 05/11/2026, executadas pelo ChatGPT em uma cópia isolada do projeto (sem usar o JSON original): acesso às páginas, catálogo e filtros, pré-seleção, rejeição de método incorreto, inscrição válida, validações, duplicidade, listagem, exibição segura, criação do JSON e tratamento de JSON corrompido.
- **10/10 arquivos PHP sem erros de sintaxe** na mesma revisão.
- **Confirmação do aluno:** a listagem de participantes e o total de inscrições apareceram corretamente após os testes no navegador.

**Atenção:** os resultados automatizados não substituem testes manuais nem capturas de tela. As colunas abaixo registram apenas resultados já sustentados; preencher os pendentes após executar cada teste.

## Casos obrigatórios e evidências

| ID | Teste | Resultado esperado | Resultado observado / situação | Evidência |
|---|---|---|---|---|
| T01 | Catálogo sem filtro | Exibe seis oficinas | Automatizado: aprovado | `evidencias/T01.png` pendente |
| T02 | Filtrar Idioma e selecionar múltiplas categorias; limpar filtros | Exibe 2, depois 4 e volta a todas | Seleção por GET: aprovado; botão limpar: verificar manualmente | `evidencias/T02.png` pendente |
| T03 | Categoria inexistente | Exibe aviso de nenhum resultado | Automatizado: aprovado | `evidencias/T03.png` pendente |
| T04 | Clicar numa oficina | Formulário já seleciona a oficina correta | Automatizado: aprovado; verificar visualmente | `evidencias/T04.png` pendente |
| T05 | Inscrição válida | Salva no JSON e confirma | Automatizado: aprovado | `evidencias/T05.png` pendente |
| T06 | Nome vazio ou menor que 3 caracteres | PHP rejeita com mensagem | Nome curto aprovado; testar nome vazio manualmente | `evidencias/T06.png` pendente |
| T07 | E-mail inválido, oficina inexistente ou falta de aceite | PHP rejeita cada entrada | Automatizado: aprovado | `evidencias/T07.png` pendente |
| T08 | Abrir processamento por GET | Responde método não permitido | Automatizado: aprovado | `evidencias/T08.png` pendente |
| T09 | Mesmo e-mail com maiúsculas diferentes, na mesma oficina | Rejeita duplicidade | Automatizado: aprovado | `evidencias/T09.png` pendente |
| T10 | Mesmo e-mail em outra oficina | Permite nova inscrição | Automatizado: aprovado | `evidencias/T10.png` pendente |
| T11 | Consultar inscrições | Nome, oficina, data/hora e total | Listagem e total confirmados pelo aluno; automatizado: aprovado | `evidencias/T11.png` pendente |
| T12 | Reiniciar servidor e consultar | Registros permanecem | Teste manual pendente | `evidencias/T12.png` pendente |
| T13 | Nome com tags HTML | Mostra texto literal, sem executar tags | Automatizado: aprovado | `evidencias/T13.png` pendente |
| T14 | Visualização em 360 px e 1280 px + navegação por teclado | Sem cortes/rolagem horizontal; interface utilizável | Teste manual pendente | `evidencias/T14.png` pendente |
| T15 | Falha de leitura/gravação do JSON | Não confirma sucesso indevidamente | JSON corrompido: aprovado; falha por permissão: pendente | `evidencias/T15.png` pendente |
| T16 | Executar em clone limpo, sem JSON | Arquivo criado automaticamente | Cópia isolada: aprovado; clone Git: pendente | `evidencias/T16.png` pendente |

## Como registrar os testes manuais

1. Inicie o sistema na raiz do projeto: `php -S localhost:8000 -t public`.
2. Use somente dados fictícios e anote, após cada tentativa, se o resultado esperado aconteceu ou não.
3. Salve capturas reais em `docs/evidencias/`, com os nomes indicados na tabela. Não é necessário fotografar todos os passos se uma captura comprovar mais de um caso; identifique os casos atendidos.
4. Para verificar regras de PHP que o navegador normalmente bloqueia, use um envio `POST` de teste ou desabilite a validação HTML apenas na cópia de testes.
5. **Teste a corrupção e as permissões apenas em uma cópia separada**, para não perder registros que deseja preservar.
6. Verifique em `git status` que `dados/inscricoes.json` e arquivos `.lock` não estão sendo incluídos no commit.

## Pendências de entrega

- [ ] Finalizar testes manuais e registrar os resultados efetivamente observados.
- [ ] Salvar as capturas reais de tela em `docs/evidencias/`.
- [ ] Confirmar o funcionamento com clone limpo do repositório.
- [ ] Gravar e publicar o vídeo de apresentação (3 a 5 minutos).
- [ ] Acrescentar o link acessível do vídeo no `README.md`.
