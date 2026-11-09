# Preparação do bloco de contato e privacidade

Estado: levantamento local e rascunho interno, não é política de privacidade publicada.

## Hospedagem confirmada pelo proprietário

O proprietário confirmou nesta conversa que a hospedagem é a Hostinger. A confirmação identifica o provedor, mas não comprova o plano contratado, a configuração do servidor, cookies acrescentados pela infraestrutura, campos dos logs, prazos de retenção, localização dos dados ou suboperadores. Não houve acesso ao hPanel nem alteração em produção.

Próxima definição em bloco: se o novo site continuará sem ferramentas de estatísticas, publicidade ou rastreamento. O código atual não inclui essas integrações; eventual inclusão exige rever o aviso de privacidade e os requisitos pertinentes antes da ativação.

## Fronteira do envio

A versão até a revisão móvel foi enviada ao GitHub no commit 21ac708, mediante autorização do proprietário. O trabalho descrito aqui começou depois desse envio e permanece local. Uma nova alteração não está autorizada para push ou deploy por causa da autorização anterior.

## Fatos observados no código

- Site informativo, sem formulário, login, cadastro, newsletter ou endpoint de upload público.
- Não foram encontradas chamadas a setcookie/session_start, armazenamento local do navegador, analytics, fetch/XMLHttpRequest ou iframe no código atual do site.
- Fontes, CSS, JavaScript, logo e capas são recursos locais. URLs canônicas e metadados são referências; não equivalem a carregamento de scripts de terceiros.
- Links externos existentes: Instagram, TikTok, itch.io, documentação Godot e crédito de desenvolvimento. A navegação para esses destinos ocorre por ação do visitante; não há embeds dessas plataformas no site atual.
- O PHP embutido usado no desenvolvimento registra acessos em logs locais ignorados pelo Git. Isso não permite inferir os logs ou a retenção da futura hospedagem.
- Artigos ficam em arquivos versionados; não existe coleta pública de respostas/comentários no Devlog.
- Ausência de cookies no código não prova ausência de cookies ou tratamento de dados na camada de hospedagem, CDN/proxy ou serviços adicionados em produção.

## Canal público confirmado

O proprietário autorizou divulgar gd.forge.x@gmail.com. O endereço foi adicionado à página /contato com link mailto e instrução para copiar/abrir no aplicativo de e-mail. Instagram/TikTok foram mantidos. O rodapé agora aponta à página de contato. Não há formulário nem envio de mensagem pelo servidor do site; o endereço de autoria Git não foi reutilizado. Não foi realizado envio de e-mail nem teste de entrega à caixa postal.

## Roteiro da futura página

1. Identificação real de quem opera o site e canal para dúvidas de privacidade.
2. Funcionamento do site informativo e ausência dos recursos de coleta que realmente não existem.
3. Logs técnicos: campos, finalidade, acesso, hospedagem e prazo real de retenção, depois de confirmar a operação.
4. Cookies e tecnologias semelhantes: descrever o que for efetivamente utilizado; não adicionar banner ou armazenamento de consentimento sem finalidade identificada.
5. Links e canais externos: explicar que a interação passa a ocorrer nas plataformas de destino.
6. Canal de solicitações e modo de atendimento viável, sem prometer prazos/rotinas não definidos.
7. Data de revisão e indicação de alterações significativas.

Não publicar texto definitivo com campos em aberto nem alegar conformidade jurídica total. O levantamento é técnico; antes do lançamento, revisar o aviso com base no tratamento real, incluindo a camada de hospedagem.

## Referência oficial

[ANPD — Guia orientativo: Cookies e proteção de dados pessoais](https://www.gov.br/anpd/pt-br/centrais-de-conteudo/materiais-educativos-e-publicacoes/guia_orientativo_cookies_e_protecao_de_dados_pessoais), consultado em 01/11/2026. Diretriz usada: informações claras sobre os tratamentos efetivos. O guia não comprova as configurações da GDForge nem transforma este inventário em certificação de conformidade.

## Próximos blocos, um por vez

- Concluído localmente: confirmar o canal público de contato e ajustar a interface correspondente.
- Depois: confirmar a hospedagem e as informações operacionais necessárias para completar a página de privacidade.
- A seguir: revisar o aviso com o proprietário e só então integrá-lo localmente, antes de qualquer autorização separada de envio/publicação.
