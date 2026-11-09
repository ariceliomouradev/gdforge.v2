# Revisão de navegação móvel

Bloco concluído localmente em 01/11/2026. Não houve push, deploy ou mudança em produção.

## Correções

- Menu aberto aplica inert ao conteúdo de fundo, rodapé, logo e skip link; fechar ou mudar para desktop remove a restrição. Trata-se de controle de interação, não de uma certificação de leitor de tela.
- Links do menu móvel têm altura mínima de 44 px. O painel possui rolagem e, em telas baixas, começa abaixo do cabeçalho para manter os destinos alcançáveis.
- Selecionar uma âncora na Home fecha o painel e transfere o foco para a seção escolhida.
- Navegação indica a seção Devlog durante a leitura de artigos e Protótipos nos detalhes dos jogos, com aria-current=location; páginas exatas usam aria-current=page.

## Verificações executadas

- Home, Devlog, artigo, Gameplay Studio e Contato conferidos em larguras efetivas de 360 e 390 px: sem overflow horizontal; um H1 por página.
- Home, Devlog e artigo também conferidos com largura efetiva de 768 px: sem overflow horizontal; um H1 no artigo.
- Home → âncora Devlog → índice → artigo → retorno à lista: links funcionaram.
- Tab/Shift+Tab no menu retornam ao conjunto de controles; Escape fecha e retorna o foco ao botão.
- Em 360×360, painel pode rolar e os cinco links medidos têm 44 px de altura. Fundo recebe inert ao abrir e perde o atributo ao fechar.
- Âncora #devlog passou a receber foco após seleção; menu fica fechado e o fundo é liberado.
- A sintaxe JavaScript, o lint PHP do cabeçalho e git diff --check passaram.

Testes realizados no navegador integrado com alteração de viewport, não em aparelhos físicos. Permanecem pendentes testes em outros navegadores, leitor de tela e auditoria completa de acessibilidade. As larguras foram verificadas pelo DOM; dimensões solicitadas que ainda não haviam sido aplicadas não foram contabilizadas como evidência.

Evidência visual local: .runtime/mobile-review-article.png (fora do Git). Viewport restaurado ao final da revisão.

Próximo bloco sugerido: confirmar contato público e levantar os dados reais necessários à página de privacidade.
