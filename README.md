# GDForge-Site

Implementação local em PHP 8.3+ sem framework, WordPress ou bibliotecas de execução de terceiros; fontes locais licenciadas. Não houve publicação nem alteração em produção.

## Executar

Instale uma versão PHP ainda suportada. Na raiz do projeto:

    php -S 127.0.0.1:8080 -t public router.php

Abra http://127.0.0.1:8080. O servidor embutido é somente para desenvolvimento.

Em Apache, configure DocumentRoot para a pasta public, habilite mod_rewrite e permita as diretivas do .htaccess. Em Nginx, use try_files $uri $uri/ /index.php?$query_string e configure PHP-FPM restringindo execução ao front controller. src e templates devem permanecer fora da raiz pública. Ative HTTPS em produção; configure HSTS somente depois de verificar HTTPS e subdomínios.

## Estrutura

- public/index.php: rotas explícitas, status HTTP e cabeçalhos.
- src/projects.php: catálogo dos três protótipos fornecidos.
- src/view.php: renderização e escape de saída.
- templates/page.php: HTML semântico renderizado no servidor.
- public/assets: CSS, JavaScript, imagens da referência e fontes locais com licenças.

URLs: /, /sobre, /projetos, /gameplay-studio, /devlog, /devlog/categoria/{slug}, /devlog/{slug}, /contato e /projetos/{slug}. Artigos em rascunho retornam 404; /jogos redireciona para /projetos. Endereços desconhecidos retornam 404; parâmetros não selecionam arquivos ou templates. As âncoras originais /#home, /#sobre, /#projetos , /#devlog e /#contato continuam disponíveis. O DevLog exibe a galeria de quatro registros da referência.

## Conteúdo e recursos

O HTML fornecido é a referência de IU/UX para este projeto e para as próximas páginas. Foram restaurados composição, textos, imagens e links originais, incluindo cartões que abrem o itch.io em nova aba. As páginas individuais dos projetos continuam disponíveis.

Imagens foram obtidas do domínio GDForge indicado na referência e verificadas como PNG/JPEG; sua reutilização se limita a este projeto do usuário. Fontes Orbitron e Poppins foram obtidas do repositório oficial google/fonts, com licenças OFL incluídas. Consulte ASSETS.md para origem e hashes. Nenhum recurso é carregado por CDN. Animações usam CSS e IntersectionObserver, sem GSAP. Ícones SVG são locais e não exigem FontAwesome. Cursor decorativo não esconde o cursor do sistema; seleção de texto e atalhos permanecem disponíveis.

## SEO e acessibilidade

Títulos e descrições por página, canonical, Open Graph, sitemap.xml, robots.txt e llms.txt. O domínio de referência é https://gdforge.com.br: revise antes de usar outro domínio. llms.txt é informativo e não garante suporte de bots. Indexação depende dos motores e não pode ser garantida. Conteúdo disponível sem JavaScript, link para pular ao conteúdo, navegação por teclado, menu com estado anunciado, foco visível e respeito a movimento reduzido.

## Segurança e verificações

Sem autenticação, banco, formulários ou credenciais. Escape de HTML, rotas permitidas, CSP sem scripts inline, bloqueio de enquadramento e de detecção de MIME. Recursos executáveis vêm apenas da própria origem. Não conceda acesso HTTP à raiz do repositório.

Verificações locais sugeridas após instalar PHP:

    php -l public/index.php
    php -l src/view.php
    php -l src/projects.php
    php -l templates/page.php
    php -l router.php
    node --check public/assets/site.js

Validação realizada: todos os arquivos PHP passaram em `php -l`, o JavaScript passou em `node --check`, as oito URLs do sitemap responderam HTTP 200 e uma URL inexistente retornou 404. Sitemap e SVG passaram na leitura XML. Testes visuais, teclado, zoom e navegação sem JavaScript ainda devem ser realizados.

Há um PHP portátil local em `.runtime/php/php.exe`, ignorado pelo Git. Para executar com ele no PowerShell:

    & '.\.runtime\php\php.exe' -S 127.0.0.1:8081 -t public router.php

## Envio de alterações

Repositório: https://github.com/Werisngton-GD/GDForge-Site.git

Novos envios ao remoto exigem autorização explícita do usuário para cada envio. Alterações locais não autorizam automaticamente `git push` nem publicação em produção.

## Validação da interface de referência

Abertura e galeria conferidas no navegador em desktop e em 390 × 844 px. Fontes e todas as imagens carregaram; não houve rolagem horizontal. Menu móvel testado por clique, navegação para DevLog e fechamento por Escape. URLs e recursos novos responderam 200; URL inexistente retornou 404. Não houve envio ao remoto nesta atualização.

## Planejamento da evolução

O [Plano Mestre adaptado](docs/PLANO_MESTRE.md) orienta as próximas entregas mantendo a identidade da Home. Consulte o [inventário local](docs/INVENTARIO_CONTEUDO.md) e as [decisões de adaptação](docs/DECISOES.md). O plano distingue recursos existentes, propostas e informações ainda não verificadas; não autoriza push nem deploy.

## Componentes compartilhados

Os cartões e detalhes dos jogos usam o catálogo único em src/projects.php. Cabeçalho, rodapé, metadados, cartões, detalhes e ícones estão em templates/components. Consulte docs/PROGRESSO.md para as etapas implementadas e verificações.

## Devlog e conteúdo

O catálogo de artigos em content/posts alimenta listagens, categorias, páginas de leitura, Home, sitemap.xml e llms.txt. Sitemap e llms agora são respostas dinâmicas do PHP. Leia docs/EDITORIAL.md para criar conteúdo, validar e gerar prévias isoladas. O primeiro artigo foi aprovado e integrado ao site local com status published; aparece na Home, no Devlog, na categoria e no sitemap. Nenhum push ou deploy foi realizado. A landing do Gameplay Studio apresenta uma visão de produto, sem anunciar funcionalidades disponíveis.

Teste editorial: & '.\.runtime\php\php.exe' tests/content.php (26 verificações).
