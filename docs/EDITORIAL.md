# Fluxo editorial GDForge

Cada artigo é um JSON em content/posts, fora da raiz pública. O arquivo inicial gdforge-gameplay-studio.json é um rascunho de apresentação criado a pedido do proprietário. Não é uma migração de texto anterior nem comprova progresso do plugin.

Campos obrigatórios: slug (minúsculas, números e hífen), title, excerpt, description, category, date (AAAA-MM-DD, fuso America/Sao_Paulo), status (draft/published), author e blocks. Imagem e texto alternativo são opcionais em conjunto; updated_at é opcional e não pode anteceder date.

Categorias: gameplay-studio, jogos-gdforge, bastidores-da-forja. Blocos: paragraph, heading (nível 2 ou 3), list (items), quote, code, link (text/url) e image (src, alt, caption). Todo texto é escapado, inclusive HTML incluído acidentalmente. Links aceitam HTTPS sem credenciais ou caminhos internos simples; não aceitam JavaScript, data ou caminhos relativos de traversal.

Não adicionar HTML bruto ou scripts. Imagens devem existir em public/assets/images. SVG é permitido apenas como arquivo autoral local revisado, sem scripts nem recursos externos; não existe upload público. Assets da pasta public são públicos mesmo quando usados por um rascunho e nunca devem conter informação confidencial.

Um catálogo validado alimenta Home, índice, categorias, artigos, sitemap e llms. Somente published com data não futura entra nas consultas públicas. Duplicações de slug e arquivos inválidos bloqueiam o catálogo com resposta genérica 503 e log sem conteúdo do arquivo. Execute validação antes de alterar conteúdo em ambiente público.

Validar:

    & '.\.runtime\php\php.exe' tests/content.php

Prévia isolada do rascunho (CLI, não cria rota no servidor do site):

    & '.\.runtime\php\php.exe' scripts/preview-post.php gdforge-gameplay-studio
    & '.\.runtime\php\php.exe' -S 127.0.0.1:8082 -t .runtime/editorial-preview

O gerador copia CSS, JS, fontes e as imagens necessárias para a pasta isolada de prévia; links de navegação apontam ao site em 127.0.0.1:8081. Isso mantém as fontes na mesma origem, sem liberar CORS. A prévia é servida somente em loopback por uma pasta separada dentro de .runtime, ignorada pelo Git, com noindex e indicação de rascunho. Não transportar esse servidor ou a pasta .runtime para produção. A URL normal do artigo deve continuar retornando 404 enquanto ele for draft.

Para publicar: revisar texto, capa, fatos, links, autoria e data; obter aprovação editorial; alterar status para published; validar o catálogo e as páginas; obter autorização específica para push e autorização separada para deploy. Inclusão automática nas listagens significa renderização automática após o conteúdo aprovado estar presente, não publicação automática em produção.

O sitemap.xml e o llms.txt passaram a ser respostas do front controller; não recriar arquivos estáticos com os mesmos caminhos. robots.txt continua estático. Feed e dados estruturados de artigos permanecem para uma próxima entrega, sem botões que anunciem recurso ausente.
