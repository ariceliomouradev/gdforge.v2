# Inventário local de conteúdo — 01/11/2026

Escopo: leitura de arquivos do GDForge-Site e do plano fornecido. Não é inventário do WordPress remoto, de indexação ou de hospedagem. Não houve acesso a hPanel, banco, DNS ou backups.

| Item | Evidência local | Situação / próxima ação |
| --- | --- | --- |
| Home | templates/page.php; public/assets/site.css | Identidade aprovada; preservar âncoras e composição. |
| Rotas | public/index.php | /, /sobre, /projetos, /gameplay-studio, /devlog, três categorias, /contato e três detalhes. Artigos dependem de publicação editorial. URLs desconhecidas e rascunhos retornam 404. |
| Pongobo Arena | src/projects.php; imagem local | Sports / Arcade; link itch.io fornecido. Confirmar estado técnico se for exibi-lo. |
| Root: Echoes of Shadows | src/projects.php; imagem local | Survivors-like / Roguelike de Sobrevivência em Arena, confirmado pelo usuário. Descrição ainda menciona plataforma: pendência editorial. |
| Mimimiau (Estudo) | src/projects.php; imagem local | Plataforma; link itch.io fornecido. |
| Cards dos jogos | templates/page.php | WEB-A01 implementada: cartões e detalhes usam src/projects.php como fonte única; componentes compartilhados em templates/components. |
| DevLog | Quatro imagens insta-* e legendas no template | Motor editorial implementado por JSON validado; índice/categorias/artigo/paginação e galeria preservada. Nenhum artigo aprovado/publicado ainda. |
| Gameplay Studio | Referência no plano recebido | Landing local com visão, conceitos de referência e FAQ. Estados técnicos continuam não confirmados; não anuncia release. |
| Primeiro artigo/capa | Apenas menção no plano recebido | Novo texto integral e capa autoral criados a pedido do proprietário, em rascunho. Ver CONTEUDO_PROPOSTO.md e prévia isolada local. Não é texto migrado do WordPress. |
| Fontes | public/assets/fonts; ASSETS.md | Orbitron/Poppins locais, licenças OFL incluídas. |
| Imagens | public/assets/images; ASSETS.md | Origem/hashes registrados; confirmar direitos além da origem. |
| Contato | Links Instagram/TikTok no template | Canais fornecidos; sem e-mail institucional/formulário validado. |
| SEO | Metadados PHP; sitemap/llms dinâmicos, robots estático | Rotas e artigos publicados usam consulta única; rascunhos excluídos. Feed e JSON-LD pendentes. |
| Privacidade | Não existe página | Levantar operação real antes de redigir versão definitiva. |
| PHP | Runtime portátil local ignorado | Não comprova versão/configuração na hospedagem. |
| Histórico remoto | Primeiro envio autorizado na conversa | Mudanças locais posteriores não foram autorizadas para push. |
| Hostinger/WordPress/URLs públicas | Alegações do plano de origem | Não auditados; dependerão de materiais ou acesso específico autorizado. |

Verificações anteriores registradas no README: lint PHP/JS, rotas HTTP, imagens/fontes e menu móvel. Nesta análise documental não se repetiram testes de execução nem auditoria visual/segurança completa. A presença de código não equivale a aceite de release.
