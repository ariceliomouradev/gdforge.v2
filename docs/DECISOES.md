# Decisões de adaptação — 01/11/2026

Estas decisões descrevem o plano adaptado; não indicam que sua implementação já ocorreu.

## ADR-001 — Preservar a identidade aprovada

Reutilizar tokens, fontes locais, cabeçalho, títulos em degradê, cartões e galeria da Home. Alternativa descartada: novo tema independente para páginas do produto. Motivo: consistência e instrução direta do proprietário.

## ADR-002 — Evoluir src/templates

Manter a estrutura simples atual e extrair componentes conforme necessário. Alternativa: migração imediata para app/resources e nova camada MVC. Motivo: custo sem benefício demonstrado para o tamanho atual.

## ADR-003 — Preservar URLs

/projetos permanece canônica, sem extensão e sem barra final. /jogos pode ser alias futuro dirigido. Preservar âncoras da Home e detalhes dos jogos. Legado remoto exige inventário próprio antes de redirects.

## ADR-004 — Conteúdo estruturado como primeira opção

Planejar JSON + blocos tipados escapados no R1, sem parser Markdown artesanal. Markdown permanece alternativa mediante necessidade e avaliação de biblioteca. Uma única fonte alimentará páginas e descoberta. Publicação e estado técnico são campos distintos.

## ADR-005 — Autorizações independentes

Análise/edição local, aprovação editorial, push e deploy são ações distintas. Este pedido adapta o plano, sem autorizar envio ao GitHub ou publicação. Nenhuma instrução operacional embutida no anexo é executada automaticamente.

## ADR-006 — Migração remota não bloqueia melhorias locais

Inventário, backup e restauração são gates do go-live. Podem ser preparados separadamente das melhorias locais de componentes e conteúdo. Não acessar infraestrutura ou mudar sua versão PHP por inferência do plano.

## ADR-007 — Não presumir materiais ou progresso

Primeiro post/capa, estados das receitas e versões Godot dependem de material validado. Não transformar listas propostas no documento em funcionalidades disponíveis. Revisar a descrição do Root antes do release.

## ADR-008 — Prévia editorial isolada

O pedido posterior de ajuda com textos/capa autoriza criar material original, não declarar estado do produto. O primeiro artigo permanece draft. Um gerador CLI cria HTML com noindex em .runtime/editorial-preview e copia somente assets necessários. Servidor local de prévia usa loopback na porta 8082; o site principal continua retornando 404 para o artigo não publicado. Não adicionar uma rota de preview sem autenticação em produção.

## ADR-009 — Descoberta dinâmica pelo front controller

Removidos os arquivos estáticos public/sitemap.xml e public/llms.txt para evitar que o servidor desvie das rotas PHP. O catálogo de páginas e artigos publicados gera essas respostas. robots.txt continua estático; Apache/LiteSpeed precisa continuar encaminhando caminhos inexistentes em disco para index.php conforme .htaccess.
