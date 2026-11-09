# Progresso de implementação

## WEB-A01 — Catálogo único e componentes compartilhados

Implementada localmente em 01/11/2026; revisão visual final pelo proprietário pendente. Sem commit novo, push ou deploy.

- src/projects.php reúne nome, gênero, descrição, capa/dimensões, URL e ícone de cada jogo.
- Cartões e páginas individuais consomem esse catálogo; não dependem da posição numérica do Root.
- templates/components contém head, header, footer, project-card, project-detail e project-icon. Ícones vêm de opções fixas, sem SVG livre nos dados.
- Layout, âncoras, links itch.io, navegação e galerias preservados. Rótulo de Mimimiau padronizado para Plataforma, conforme catálogo.
- Dimensões das capas também estão disponíveis nos detalhes; height:auto mantém proporção e o limite visual anterior.
- A descrição do Root continua pendente de confirmação editorial; não foi inventado texto de gameplay.

Validação realizada:

- Lint PHP em src e templates, incluindo os seis componentes novos.
- Comparação do HTML renderizado em nove rotas antes/depois, normalizando formatação e as duas mudanças intencionais (rótulo de Mimimiau e dimensões de detalhe): passou.
- HTTP: oito páginas 200 e URL inexistente 404.
- Navegador em 1280×900 e 390×844: três cartões, capas carregadas, sem overflow horizontal; menu móvel abre e fecha por Escape.
- A revisão não é auditoria completa de acessibilidade, contraste ou segurança.

Próxima tarefa do plano: WEB-A02, consolidação dos tokens/componentes e revisão de contraste e leitura. Gameplay Studio e motor de artigos ainda não implementados.

## Evolução local — design system, Gameplay Studio e Devlog

Implementada em 01/11/2026. Sem push, deploy ou alteração em produção.

- WEB-A02: tokens de espaçamento/leitura, texto secundário mais claro, componentes editoriais, seletor CSS de cabeçalho/navegação restrito ao header do site. Menu passa a colapsar em 1050 px para acomodar a nova navegação; CSS e JS usam o mesmo limite. Auditoria completa de acessibilidade/performance ainda pendente.
- WEB-A03: proprietário informou não ter artigo/capa/estados. Criado conteúdo original em rascunho com referências oficiais; proposta editorial registrada em CONTEUDO_PROPOSTO.md. Não é migração de texto WordPress.
- WEB-A04: landing /gameplay-studio com visão do produto, conceitos, sequência proposta e FAQ nativa. Dados de conceitos/marcos em src/product.php, sem estados técnicos presumidos. Falta validação de produto para apresentar progresso real.
- WEB-A05/A06: loader validado, índice, categorias, paginação e template de artigo. Conteúdo por JSON tipado fora de public; fonte única; draft/futuro ocultos. Galeria preservada. Primeiro artigo continua fora do índice; prévia isolada na porta 8082.
- WEB-A07: bloco Ferramentas na Home, navegação para produto, últimos artigos condicionais e sitemap/llms dinâmicos. Feed e dados estruturados permanecem para avaliação posterior.

Verificações executadas:

- PHP lint em public/src/templates/scripts/tests e JS syntax check: passaram.
- tests/content.php: 26 verificações (slugs, datas, links, HTML escapado, duplicações, rascunhos, datas futuras, categorias e paginação).
- HTTP: novas páginas/categorias 200; rascunho, categoria desconhecida, paginação inexistente/inválida, src/content e URL desconhecida 404; sitemap e llms 200. Sitemap XML válido sem rascunho.
- Gameplay Studio: 390, 768 e 1280 px, um H1 e sem overflow horizontal; menu móvel e Escape; FAQ abre resposta.
- Devlog: 390 e 1280 px, um H1, sem overflow horizontal; navegação por categoria funciona.
- Prévia de artigo: 390, 768 e 1280 px, capa carregada, um H1, noindex e sem overflow horizontal. Fontes copiadas para mesma origem de preview.
- Contraste calculado para pares de texto: principal/fundo 17,02:1; secundário/surface 8,81:1; secundário/surface-light 7,71:1; amarelo/surface 9,88:1; preto sobre início/fim de CTA 7,36:1 e 12,03:1; laranja/fundo 6,79:1. Não equivale a auditoria de todos os estados/gradientes ou WCAG completa.

Pendências: aprovação editorial do artigo/capa e posicionamento; privacidade baseada na operação real; titularidade das imagens herdadas; descrição do Root; estados/compatibilidade do produto; feed/JSON-LD; QA amplo (leitor de tela, zoom, outros navegadores e performance); hospedagem, migração, backup, homologação e rollback. Não anunciar release concluído.

## Primeiro artigo integrado localmente

Após revisão em blocos e autorização explícita “pode integrar”, gdforge-gameplay-studio passou de draft para published no catálogo local. Texto, capa e data foram preservados.

Conferido: Home, índice, categoria, artigo, sitemap e llms retornam 200 e incluem a URL do artigo; XML do sitemap válido; capa 200; link do índice abre a página de leitura. No navegador, um H1, capa carregada e ausência de overflow horizontal na largura atual. As 26 verificações de tests/content.php passaram.

Este registro substitui a indicação anterior de que o artigo ainda aguardava revisão/integração. A aprovação é editorial e local; não autoriza push, deploy nem afirma progresso do plugin.

## Revisão de navegação móvel

Bloco concluído: foco de âncoras, isolamento do fundo com menu aberto, área de toque e rolagem do painel em telas baixas, além de indicação da seção atual em artigos/detalhes. Ver QA_MOBILE.md para testes efetivos e limitações. Sem push ou deploy.

## Contato público

O proprietário informou gd.forge.x@gmail.com para divulgação. Integrado localmente à página /contato via componente próprio, com mailto, endereço copiável e texto sobre abertura do aplicativo de e-mail. Redes sociais preservadas e rodapé com acesso a /contato. Metadescrição atualizada. Não foi enviado e-mail nem validada entrega; não existe formulário próprio. Sem novo push ou deploy.

Verificações: lint PHP dos arquivos alterados; diff sem erros; navegador confirmou nome e href do link. A privacidade definitiva ainda depende do levantamento da hospedagem.
