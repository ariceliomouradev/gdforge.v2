# Regras do projeto GDForge

- Usar PHP com tipagem, HTML semântico, CSS responsivo e JavaScript simples.
- Manter código limpo, separação de responsabilidades, segurança e acessibilidade.
- Não usar CDN ou dependências desnecessárias. Recursos de terceiros devem ser locais, licenciados e verificados.
- Nunca incluir credenciais no repositório ou implementar autenticação própria sem revisão arquitetural específica.
- Preservar páginas existentes e usar URLs amigáveis sem extensão PHP.
- Aplicar SEO técnico pertinente ao nicho de jogos indie sem prometer indexação.
- Executar verificações proporcionais e explicar brevemente mudanças e testes.
- Trabalhar somente no escopo solicitado; nunca publicar ou alterar produção automaticamente.
- Enviar alterações ao repositório remoto (git push) somente com autorização explícita do usuário para aquele envio. A autorização do primeiro envio não autoriza atualizações futuras.
- Manter o runtime local em .runtime fora do versionamento.

## Referência de interface

- O html.txt fornecido pelo usuário é a base visual e de interação para todas as páginas futuras: fundo escuro quadriculado, Orbitron/Poppins locais, degradê laranja-amarelo, cabeçalho fixo, abertura centralizada, cartões e galeria.
- Reutilizar os tokens e componentes de public/assets/site.css; não substituir esta identidade por outro layout sem pedido do usuário.
- Manter navegação por seções na página inicial e URLs amigáveis individuais. Preservar acessibilidade e recursos locais ao adaptar a referência.
