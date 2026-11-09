# GDForge Web v2 — Plano Mestre adaptado

Versão 1.1 · 01/11/2026 · Documento de planejamento, não de funcionalidades entregues.

Origem: GDForge_Web_v2_Plano_Mestre_Codex_v1.md fornecido pelo proprietário. Esta versão adapta o plano ao repositório GDForge-Site e à identidade da Home aprovada. Não constitui autorização para push, deploy, acesso à hospedagem ou criação do produto Godot.

## 1. Objetivo e limites

Evoluir o site PHP existente para apresentar jogos e ferramentas da GDForge, divulgar o Gameplay Studio com estados factuais e oferecer Devlog editorial, mantendo o layout aprovado. O site publica conteúdo; Godot/GDScript, plugin, receitas executáveis e builds são responsabilidade de outro projeto.

Regras de execução: AGENTS.md e instruções diretas do proprietário prevalecem. Alterações locais podem ser implementadas no escopo pedido; cada envio ao GitHub exige autorização explícita para aquele envio. Publicação em produção tem autorização separada. Revisão visual/editorial não autoriza nenhuma dessas ações automaticamente.

R1 não exige autenticação, painel administrativo, banco, pagamentos, newsletter, formulário beta ou upload público. Evitar dependências sem necessidade comprovada. Não criar páginas vazias para simular recursos disponíveis.

## 2. Diagnóstico do plano recebido

| Tema | Avaliação e adaptação |
| --- | --- |
| PHP sem WordPress/CDN | Mantido; evoluir o código atual em vez de reconstruir a fundação. |
| Identidade escura/laranja | Especificada a partir da Home aprovada, não de um novo tema. |
| Estrutura app/resources proposta | Adiada; src/templates já atendem à escala atual. Separar responsabilidades gradualmente. |
| Rotas /jogos/ e barra final | Preservar /projetos e URLs sem barra final; compatibilidade descrita adiante. |
| Devlog dinâmico | Planejado; hoje existe uma galeria de quatro imagens, não um motor editorial. |
| Primeiro artigo e capa | Citados no anexo, mas não fornecidos no repositório. Recuperar antes de migrar; não inventar texto aprovado. |
| Status do produto | Exigir dados do projeto Godot. Não inferir progresso ou versões homologadas. |
| Hostinger/hPanel | Informação do documento, não auditada nesta análise. Configuração depende de confirmação. |
| SEO e bots de IA | Melhorar descoberta e legibilidade; não prometer indexação, ranking ou uso por IA. |
| Meta de segurança/performance | Critérios de avaliação, não garantias. Registrar cobertura, data e limitações dos testes. |
| Primeiro comando M00 do anexo | Orientação do documento original; não substitui o pedido atual de análise/adaptação. |

Há inconsistência editorial atual: Root está classificado como Survivors-like / Roguelike de Sobrevivência em Arena por instrução do proprietário, enquanto sua descrição ainda menciona plataforma. Revisar a descrição com conteúdo confirmado antes do release; não voltar a classificá-lo como Metroidvania. A menção institucional a Metroidvania pode permanecer como interesse do estúdio.

## 3. Estado real e fontes de verdade

Ver INVENTARIO_CONTEUDO.md para evidências locais e pendências.

- Implementado localmente: Home com referência original, Sobre, Projetos, páginas individuais dos três jogos, galeria DevLog, Contato com redes sociais, 404, metadados, sitemap e robots estáticos.
- Recursos locais: imagens da referência, Orbitron/Poppins e licenças OFL; ASSETS.md registra origem/hashes. Hash e formato não comprovam titularidade de direitos das imagens.
- PHP portátil disponível localmente em .runtime, fora do Git. Compatibilidade de produção ainda não auditada.
- Não implementado: Gameplay Studio, artigos, categorias, paginação, fluxo editorial, privacidade, feed, catálogo de receitas, roadmap e downloads.
- Alterações de layout e gênero do Root permanecem locais. Não presumir que estão no remoto ou em produção.
- Conteúdos WordPress, primeiro post, capa editorial, estados Godot, inventário de URLs públicas e backup não foram fornecidos como exports verificáveis.

Não usar o e-mail de autoria Git como contato público sem autorização específica. Instagram/TikTok continuam os canais fornecidos; verificar disponibilidade antes da migração.

## 4. Identidade visual obrigatória

Base: html.txt fornecido e sua adaptação já aprovada em templates/page.php e public/assets/site.css.

| Elemento | Diretriz para todas as páginas |
| --- | --- |
| Fundo | #0d0d11, grade discreta de 50 px, sem competir com a leitura. |
| Superfície | #1a1a24; #252533 em áreas secundárias, bordas e placeholders internos. |
| Marca | Logo local original; GD em texto claro, Forge em degradê. |
| Acentos | #ff6b00 → #ffb703; CTA com texto escuro, sem degradê em parágrafos. |
| Tipografia | Orbitron em marca/títulos curtos; Poppins em corpo, navegação e metadados. Fontes locais com font-display: swap. |
| Texto | #f0f0f0; tom secundário atual #a0a0b0 sujeito a contraste em cada superfície. Aumentar luminosidade quando necessário. |
| Seções | Títulos centralizados e sublinhado curto em degradê, como a Home. |
| Cartões | Cantos arredondados, borda discreta, capa, título, resumo e badge textual; hover e foco equivalentes. |
| Cabeçalho | Fixo, translúcido, logo e navegação; compensar altura nas âncoras e foco. |
| Rodapé | Fundo #09090c, canais reais, créditos e navegação/privacidade quando disponíveis. |
| Movimento | Discreto e opcional; respeitar reduced motion. Cursor decorativo não substitui o cursor nativo. |

Reutilizar os tokens existentes (--bg-color, --surface-color, --surface-light, --primary, --secondary, --text-main, --text-muted, --gradient-fire, --grid-color). Se criar tokens adicionais de borda, espaçamento, largura de leitura ou estado, documentá-los e evitar um segundo sistema paralelo de cores.

Não retomar bloqueios de seleção, botão direito ou atalhos. Não introduzir GSAP, FontAwesome ou bibliotecas apenas para reproduzir efeitos já possíveis com CSS/JS simples. Ícones SVG locais, decorativos com aria-hidden; botões que só têm ícone recebem nome acessível.

### 4.1 IU/UX e acessibilidade

- Escala de espaçamento 4/8/12/16/24/32/48/64 px; containers atuais de 1200 px e galeria de 1400 px. Artigos com coluna de 65–75 caracteres.
- Abertura de tela cheia reservada à Home. Produto e páginas internas usam abertura menor, permitindo chegar ao conteúdo sem rolagem desnecessária.
- Um CTA principal por contexto. Secundários como links claros; não promover inscrição, download ou compra inexistentes.
- Um H1 por página, hierarquia H2/H3, landmarks, skip link, foco visível e página/seção atual identificável.
- Alvos de toque preferencialmente de 44 × 44 px; menu com estado anunciado, Escape, ordem de foco e retorno de foco coerentes.
- Filtros e paginação funcionam com links/formulário GET sem depender de JavaScript. JS somente aprimora.
- Medir contraste de texto, controles e foco, incluindo trechos do degradê; objetivo WCAG 2.2 AA. Não usar somente cor para progresso/status.
- Galeria com legenda legível também por toque/teclado, não apenas hover. Não transformar imagens sem ação em botões falsos.
- Novas abas precisam de indicação acessível e rel adequado. Links contextuais comuns ficam na mesma aba por padrão.
- Reservar dimensões/aspect ratio para imagens; priorizar logo/hero, lazy loading abaixo da dobra. WOFF2 e formatos modernos de imagem só após conversão verificada e respeito às licenças.
- Validar 360, 390, 768, 1024, 1280 e 1440 px, zoom 200/400%, texto ampliado e movimento reduzido. Evitar títulos Orbitron longos em caixa alta em áreas de leitura.

## 5. Mapa de páginas e aplicação do layout

Manter URLs canônicas atuais sem barra final. Normalização futura deve excluir arquivos estáticos e usar destino fixo/validado, sem redirects abertos. GET/HEAD legados equivalentes podem receber 301 após inventário; não converter qualquer erro em redirect para a Home.

| URL | Conteúdo e aplicação do layout | Estado |
| --- | --- | --- |
| / | Logo e chamada Forjar Aventura; Sobre; Protótipos; futuro bloco Ferramentas; galeria; futuros posts; contato | Existente; evoluir preservando composição |
| /sobre | Título com degradê e caixa institucional; ampliar para jogos/ferramentas com texto aprovado | Existente |
| /projetos | Grade atual e gênero confirmado por jogo; futuros estados somente com evidência | Existente; canônica do portfólio |
| /projetos/{slug} | Título, capa, gênero, descrição, link itch.io e retorno | Existente |
| /jogos | Se necessário como alias, 301 para /projetos; não duplicar índice | Proposto |
| /gameplay-studio | Abertura curta, badge de estado confirmado, proposta, benefícios, receitas, roadmap, FAQ e Devlog | Planejado |
| /devlog | Índice de artigos e categorias; preservar galeria como Bastidores visuais | Atualmente galeria; evolução planejada |
| /devlog/{slug} | Breadcrumb, categoria, título, resumo, datas reais, capa, corpo e relacionados | Planejado |
| /devlog/categoria/{slug} | Nome, descrição, posts, filtros/paginação e vazio útil | Planejado |
| /contato | Canais públicos autorizados; sem formulário enquanto infraestrutura não existir | Existente |
| /privacidade | Tratamentos efetivos, hospedagem/logs, links externos e contato confirmado | Planejado; depende de informações operacionais |
| Qualquer URL desconhecida | Mesmo layout, status HTTP 404, retorno às áreas reais | Existente; /404 não precisa de página 200 |
| /sitemap.xml e /robots.txt | Descoberta coerente com ambiente e conteúdo público | Estáticos; evolução planejada |
| /llms.txt | Resumo factual e links públicos; informativo, sem promessa de suporte | Existente; manter coerente |
| /feed.xml | Artigos publicados; habilitar se houver conteúdo e implementação simples | Opcional |

Preservar /#home, /#sobre, /#projetos, /#devlog e /#contato. A galeria atual não deve desaparecer na transição editorial.

### 5.1 Navegação sem descaracterizar a Home

Na Home, manter Sobre a Forja, Protótipos, DevLog e Contato apontando para âncoras. Adicionar Gameplay Studio quando sua página estiver pronta; não exibir link desativado.

Nas páginas internas, o mesmo cabeçalho aponta para URLs reais. Logo retorna ao início. Evitar duplicar Jogos e Protótipos no mesmo menu. Se não couber antes do breakpoint atual, colapsar o menu mais cedo em vez de reduzir texto ou sobrepor links. Rodapé pode reunir navegação secundária e privacidade.

### 5.2 Esqueleto de cada experiência nova

**Gameplay Studio:** título Orbitron, mensagem “Menos código. Mais gameplay.” descrita como visão, estado confirmado e CTA “Acompanhar o desenvolvimento”. Proposta em caixa semelhante ao Sobre; três cartões de benefícios com rótulo de planejamento; receitas em cartões; roadmap em lista ordenada responsiva, sem linha horizontal que exija arrastar no celular. FAQ com details/summary nativos e indicação de expansão. Não marcar a primeira etapa como concluída por padrão.

**Devlog:** título de seção no padrão visual atual; introdução curta; filtros por categoria com URL estável; cards com capa, data, categoria, título e resumo. Grade de três/duas/uma colunas conforme espaço. Paginação com página atual anunciada. Sem resultados: explicar e oferecer remover filtro. A galeria fica em bloco separado; imagens não são posts fictícios.

**Artigo:** breadcrumb, título alinhado à leitura, metadados Poppins e capa proporcionada. Corpo em coluna estreita, H2/H3 sem excesso de caixa alta, links identificáveis e blocos de código com rolagem própria. Sumário só em textos longos; relacionados extraídos do catálogo, sem cards vazios.

**Receitas/roadmap:** rótulo textual + ícone simples + cor, data da última verificação quando real e fonte quando apropriada. Não converter “planejado” em “disponível” por passagem de tempo ou número de versão.

**Contato/privacidade:** a mesma tipografia e superfícies, priorizando leitura e canais claros; não usar hero gigante para informações de serviço.

## 6. Arquitetura incremental

Preservar PHP tipado, renderização no servidor e public como única raiz HTTP. Não mover src/templates para app/resources só para seguir o desenho genérico do anexo.

```text
public/index.php           rotas e respostas; extrair roteamento quando crescer
public/assets/site.css     tokens e componentes comuns existentes
public/assets/site.js      aprimoramentos progressivos
content/                   conteúdo futuro, fora de public
src/projects.php           catálogo atual; eliminar duplicações nos cartões
src/Content/               futuros loaders, schemas e consultas
src/view.php               escape/renderização existentes
templates/                 layout e componentes extraídos gradualmente
docs/                      plano, decisões, inventário e migração
tests/                     testes de comportamentos novos relevantes
scripts/                   validação editorial, se necessária
.runtime/                  runtime/artefatos locais, ignorados
```

Estrutura ilustrativa, não ordem para criar pastas vazias. Segurança por allowlist de rota/slug; não usar parâmetros para montar caminho livre de include/template/conteúdo.

### 6.1 Fonte única e formato editorial

Catálogo de projetos atualmente está parcialmente duplicado em src/projects.php e templates/page.php. Primeira melhoria técnica: renderizar os cartões pelo catálogo, com imagem, gênero, resumo, URL e ícone por item. Eliminar dependência de índice numérico como projects[1]. Preservar aparência e links atuais.

Para R1, preferir JSON de metadados + blocos estruturados tipados de conteúdo (parágrafo, H2/H3, lista, citação, link e código), todos escapados. Isso evita implementar parser Markdown próprio e evita introduzir biblioteca antes de avaliar necessidade. Se o proprietário preferir Markdown, registrar ADR para uma biblioteca mantida, com licença, lockfile, auditoria, HTML desabilitado e protocolos controlados. Não aceitar raw HTML livre.

Uma única consulta de conteúdo deve servir índice, categoria, artigo, Home, relacionados, sitemap e feed. Validar slug único, categoria existente, datas válidas, URL/protocolo permitido, caminho de imagem local e schema dos blocos. Rascunhos não são acessíveis por URL pública nem por tentativa de slug; preview restrito ao ambiente adequado.

### 6.2 Modelos mínimos

| Entidade | Campos e condições |
| --- | --- |
| Projeto | slug, title, summary, genre, image, alt, links, icon; status/updated_at somente com dados reais. Adaptar nomes atuais na tarefa, sem quebrar rotas. |
| Artigo | id, slug, title, excerpt, description, category, tags, published_at, updated_at opcional, publication_status, image/alt, blocks, author_display autorizado. |
| Recipe | id, title, summary, publication_status, product_status, verified_at opcional, evidence_reference opcional. |
| Marco | id, label, summary, publication_status, product_status, verified_at, evidence_reference opcional. |

Separar publicação editorial (draft/published) do estado técnico (planned/preparing/active/testing/available ou done conforme entidade). Campo ausente não equivale a planned nem a done. Datas futuras não aparecem antes do horário definido; usar fuso explícito no processo editorial.

Catálogo proposto, não progresso confirmado: SR-001 Coyote Time; SR-002 Jump Buffer; SR-003 Variable Jump; SR-004 Acceleration & Friction; SR-005 Dash; SR-006 Health & Damage; SR-007 Hitbox & Hurtbox; SR-008 Hit Feedback; SR-009 Projectile System; SR-010 Object Pooling; SR-011 Wave Spawner; SR-012 Inventory Lite; SR-013 Camera Look Ahead; SR-014 Status Effects; SR-015 Reduced Motion.

Roadmap proposto: Pesquisa e Validação; Protótipos Jogáveis; Smart Recipe Engine; Editor e Testes; Beta e Lançamento. Aprovar estados antes de apresentar ao público. Preço, licença, versão Godot homologada e lançamento continuam não confirmados.

## 7. Segurança, privacidade e descoberta

- Manter escape por contexto, CSP restritiva com font-src local, bloqueio de enquadramento e demais cabeçalhos existentes. Revalidar ao introduzir novos componentes; não adicionar unsafe-inline indiscriminadamente.
- Configurar DocumentRoot em public. Testar que .git, .env, content, src, templates, docs, backups e runtime não são servidos. Robots não é controle de acesso.
- Sem login próprio nem endpoints de escrita no R1. Formulários/newsletter exigem arquitetura específica, infraestrutura real, antiabuso, entrega testada e privacidade revisada antes de ativação.
- Não declarar ausência de dados pessoais só porque não há formulário: verificar logs, hospedagem, provedores e retenção. Não inventar texto jurídico definitivo.
- Credenciais somente por mecanismos seguros do ambiente; nada em arquivos públicos, commits ou documentação. Não coletar senhas no chat.
- Title/description/canonical por rota; um H1; OG com imagem local adequada e dimensões verdadeiras. Não declarar 1200×630 para a logo 346×328.
- Dados estruturados apenas para conteúdo e organização reais; avaliar compatibilidade com CSP. Nenhum selo, avaliação ou dado factual inventado.
- Sitemap/llms/feed só com conteúdo público aprovado, URLs canônicas e destinos válidos. Privacidade/staging não podem vazar rascunhos.
- Conteúdo HTML legível sem JS, autoria autorizada, datas e fontes corretas e links internos ajudam compreensão; nenhuma promessa de indexação por buscadores ou IA.
- Revisão de segurança orientada às recomendações OWASP pertinentes ao recurso. Verificar referências técnicas oficiais na execução; este documento não certifica conformidade.

## 8. Fluxo editorial e liberações

Receber texto/capa/evidência → criar rascunho → validar schema, direitos e fatos → preview protegido/local → revisar IU/UX e editorial → autorizar publicação editorial → preparar alteração local → autorizar push específico → integrar versão → autorizar deploy específico.

Esses passos são independentes: status published em dado local não significa publicação em produção. Uma infraestrutura futura não deve publicar automaticamente a cada push sem autorização separada. Não criar automação de deploy neste escopo.

O artigo inaugural mencionado no anexo depende de texto e capa fornecidos/recuperados. Sua falta não bloqueia melhorias da fundação ou o motor de Devlog, mas bloqueia declarar a migração editorial completa. Vazio útil é aceitável durante desenvolvimento; não anunciar R1 completo sem conteúdo aprovado.

## 9. Migração e hospedagem

Desenvolvimento local pode avançar sem auditar produção. M00 remoto é requisito para migração/go-live, não para toda melhoria local.

Antes de qualquer acesso remoto: delimitar ação autorizada. Confirmar plano, PHP disponível, servidor, docroot, limites, subdomínio, DNS, e-mails e impacto de configuração compartilhada. PHP local não comprova suporte no plano de hospedagem.

Inventariar URLs públicas versus rascunhos. Preparar decisão por URL: manter, atualizar, redirect para equivalente ou retirar com status apropriado. Nunca redirecionar tudo para a Home. Arquivos de mídia em /wp-content podem precisar de compatibilidade; decidir só após inventário.

Go-live depende de backup independente, restauração testada em ambiente isolado, homologação protegida, teste de HTTPS/headers/assets/rotas, plano de rollback e autorização explícita. WordPress e banco são preservados até aceitação e janela de retenção acordada. Não alterar DNS, e-mail, versão PHP ou produção automaticamente.

## 10. Roadmap e backlog adaptados

| Cartão | Entrega | Dependência e aceite |
| --- | --- | --- |
| WEB-A01 | Fonte única dos cartões de jogos e componentes de layout | Preservar visual, gêneros, rotas e destinos; lint e comparação desktop/mobile. |
| WEB-A02 | Consolidar design system e componentes reutilizáveis | A01; tokens existentes, foco, contraste medido, menu e leitura de texto longo. |
| WEB-A03 | Confirmar conteúdo do produto e do primeiro artigo | Pode ocorrer em paralelo temporal ao trabalho local; somente material autorizado e estados evidenciados. |
| WEB-A04 | Gameplay Studio com o layout da Home | A02+A03 para conteúdo público; hero curto, cards, roadmap, FAQ; sem promessas não validadas. |
| WEB-A05 | Loader editorial, validação e consulta única | Schema definido; testes de rascunhos, datas, slugs, protocolos e conteúdo malicioso. |
| WEB-A06 | Índice, categoria, paginação e artigo | A02+A05; links sem JS, vazio útil, preservação da galeria, primeiro artigo depende de A03. |
| WEB-A07 | Home integrada e descoberta dinâmica | A04+A06; novos blocos reais, sitemap/metadata/llms coerentes, feed opcional. |
| WEB-A08 | Contato, privacidade e licenças | Informações reais de operação; não publicar e-mail de autoria Git; rastrear direitos das imagens. |
| WEB-A09 | Regressão, acessibilidade, segurança e desempenho | A04–A08; relatório com evidências e pendências, sem aprovação presumida. |
| WEB-M00 | Inventário remoto, backup e hospedagem | Acesso específico autorizado; antes de qualquer migração, pode coexistir com desenvolvimento local. |
| WEB-A10 | Homologação e pacote de migração | A09+M00; compatibilidade real, redirects e rollback testados. |
| WEB-A11 | Go-live supervisionado | A10 e autorização explícita; smoke pós-release e monitoramento acordado. |
| WEB-A12 | Newsletter, docs, downloads, beta ou idiomas | Fora do R1; novo escopo, dados e infraestrutura aprovados. |

Executar uma tarefa delimitada por vez; não declarar M01/M02 completos por existir um site renderizado. Reaproveitar entregas verificadas sem recomeçar do zero. Cada cartão deve registrar objetivo, arquivos, critérios observáveis, testes, riscos e itens fora do escopo.

Próximo cartão recomendado: WEB-A01. Ele prepara a evolução sem alterar a identidade aprovada e elimina a duplicação que já exigiu atualizar o gênero em dois lugares. Sua execução não faz parte desta adaptação documental.

## 11. Critérios de aceite e verificação

Por mudança, executar verificações proporcionais. Alterações simples de texto não exigem nova suíte; loaders, validação, rotas dinâmicas e publicação precisam de testes de comportamento.

- PHP lint e JS syntax check quando aplicáveis; diff sem erros de whitespace.
- Regressão das oito páginas atuais e 404. Novas páginas com status esperado, um H1 e assets existentes.
- Testes de conteúdo publicado/rascunho, datas futuras, duplicação de slug, paginação inválida, categoria inexistente, XSS e traversal nos componentes que receberem esses dados.
- Comparação visual desktop/tablet/celular; navegação sem JS, teclado, leitor de tela quando disponível, zoom e reduced motion. Registrar o que não pôde ser testado.
- Avaliar contraste e performance com medidas; metas de CWV são objetivos, não resultados presumidos. Dados de laboratório e de campo ficam separados.
- Verificar links externos antes da publicação, conteúdo factual, direitos e canais públicos autorizados.
- Revisar diff, manter runtime/segredos fora do Git; push e deploy somente conforme autorizações específicas.

Release só está pronto quando as áreas anunciadas têm conteúdo e função reais, os testes pertinentes foram documentados e migração/rollback estão prontos. Um checklist preenchido não substitui evidência.

## 12. Pendências que exigem informação externa

Não impedem esta adaptação nem melhorias locais independentes:

1. Texto/capa inaugural e materiais de Gameplay Studio citados no anexo.
2. Estado real do produto, receitas, roadmap e compatibilidade Godot.
3. Hospedagem/plano e requisitos operacionais; backup/restauração e mapa de URLs legado.
4. Direitos das mídias e autoria pública autorizada.
5. Canal de contato/privacidade, logs e retenção reais.
6. Confirmar a descrição atual do Root, que ainda menciona plataforma.

Fontes desta versão: arquivo mestre fornecido, html.txt já aplicado, AGENTS.md, README, ASSETS, rotas, catálogo, templates e CSS locais. Alegações de outros documentos e de infraestrutura citadas no original não foram verificadas nesta análise.
