## CodeCommerce

## Projeto Fase 11

### Orders e Auth

Nessa fase do projeto, você terá de deixar o sistema totalmente preparado para gerar as ordens de serviços (Order e OrderItem) apenas para os usuários logados que tenham itens no carrinho de compra.

Quando o usuário clicar em fechar carrinho, a ordem de serviço deve ser gerada automaticamente.

Caso o usuário não esteja logado, redirecione-o para a página de login antes do mesmo finalizar o pedido.

Também você deverá adicionar um novo campo na tabela de usuários chamado: is_admin (boolean).

A partir de agora, apenas usuários logados e com is_admin=1 poderão acessar a área administrativa de nossa loja.
