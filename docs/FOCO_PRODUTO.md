# Decisão de foco — 02/11/2026

## Medição de acesso

O proprietário deixou a escolha de Analytics a critério técnico, condicionada a custo e explicação. Decisão para esta etapa: não instalar Google Analytics. A versão padrão é oferecida gratuitamente, mas a implementação envolve medição e envio de dados ao Google; exige avaliar privacidade, configurações de consentimento e compatibilidade com a regra atual de recursos locais. Não há necessidade de medições de visitas durante o desenvolvimento em loopback.

Quando o site estiver publicamente disponível, priorizar avaliar o Search Console para rastreamento/indexação e desempenho na Pesquisa Google. Não foi criada conta/propriedade, inserido código de medição nem modificado DNS. Analytics pode ser reavaliado quando existir uma pergunta concreta a responder, como origem de visitas e acesso às páginas do produto.

Fontes oficiais consultadas:

- https://marketingplatform.google.com/about/analytics/
- https://developers.google.com/analytics/devguides/collection/ga4/tag-options
- https://support.google.com/webmasters/answer/9128668?hl=pt-BR

## Ponto de parada do site

Recomendação: encerrar a expansão funcional do site nesta etapa e começar a validação do primeiro experimento do Gameplay Studio no projeto Godot separado. Não aguardar newsletter, painel, feed, analytics, traduções ou catálogo completo para experimentar o produto.

A base local já apresenta a marca, o produto como visão, projetos, artigo aprovado, Devlog e contato. Isso não significa que o site esteja pronto para substituir produção. Privacidade operacional, QA amplo, hospedagem, backup/restauração, migração e rollback continuam requisitos antes do go-live. Essas tarefas podem ser retomadas em blocos próprios, sem bloquear um protótipo de produto que não coleta dados e não depende do site publicado.

## Próximo bloco proposto para o produto

Especificar uma primeira Smart Recipe pequena (sugestão: Coyote Time em uma cena 2D), com problema a resolver, limites, parâmetros e critérios de teste. Depois, implementar uma demo isolada e validar a mecânica antes de tratar o experimento como produto comercial ou anunciar disponibilidade.

A versão/estrutura Godot será conferida no projeto de produto; nenhuma compatibilidade foi presumida. Este registro não implementa GDScript, não cria outro chat e não declara receita pronta. O site receberá apenas resultados aprovados e evidenciados desse projeto.

Sem novo push, deploy ou mudança em produção.
