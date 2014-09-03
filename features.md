# Features (O CLÁSSICO DO PHP)

###0.1.x

- Site simples em PHP

Nessa fase do projeto você deverá criar um pequeno site em PHP com os seguintes requisitos:

- Links de navegação
 - Home
 - Empresa
 - Produtos
 - Serviços
 - Contato

A estilização deverá ser feito utilizando o Twitter Bootstrap (se você não aprendeu utilizá-lo ainda, será uma ótima oportunidade)

A manutenção desse pequeno site deve ser muito prática, ou seja, utilizando recursos do PHP, você evitará ter que ficar repetindo blocos HTML em diversos arquivos

No rodapé do site, dever ser exibido "Todos os direitos reservados - <ANO>" - O ano precisa ser dinâmico

O usuário final não poderá mudar o comportamento da página, ou seja, o sistema tem que tratar os erros no caso de um parâmetro GET ter sido alterado de propósito

O sistema deve ser MUITO simples, sem utilização de qualquer banco de dados, etc.

- A página de contato deve possuir um formulário de contato com os campos:
 - Nome
 - Email
 - Assunto
 - Mensagem
- Quando o formulário for enviado, uma mensagem deve ser exibida para o usuário final:
 - Dados enviados com sucesso, abaixo seguem os dados que você enviou
 - Exibição dos campos preenchidos pelos usuário.
 
###0.2.x

- Ajustando as rotas

Agora que você já possui um site simples e funcional com PHP, utilize os conhecimentos passados nesse capítulo para redirecionar todos os requests para seu index.php.

Logo, quando o usuário acessar site.com.br/contato, deverá ser chamada a página de contato.

REGRAS:

1. Você deverá verificar sempre se o arquivo acessado existe
2. Você deverá apresentar uma mensagem de erro 404 caso a url acessada seja inválida (não esqueça de enviar o STATUS CODE 404)
3. Crie uma função para fazer a verificação das rotas
4. Registre cada uma das rotas em um array

 
###0.3.x

- Conteúdo em banco de dados

Ao invés de trabalhar com require / include para incluir as páginas de conteúdo no site simples, você deverá agora trazer esse conteúdo de um banco de dados MySQL.

Você também precisará criar um arquivo de configuração (variáveis) para com o banco de dados e também as fixtures necessárias para que seja possível verificar dados de teste.

Não deixe de criar um sistema de busca por palavra-chave, ou seja, quando alguém buscar determinada palavra, o sistema deverá  pesquisar nos conteúdos das páginas no banco de dados e listar as páginas que possuem a palavra buscada. Ao clicar nessa página, o usuário deverá ser redirecionado para a mesma.

A conexão deverá ser realizada via PDO.

###0.4.x

- Área administrativa

Agora que seu projeto possui diversas páginas de conteúdo que vem diretamente de um banco de dados, você tem o seguinte desafio: Deixar todas essas páginas administráveis =)

Crie uma área restrita (onde você precisa de um login e senha). Nessa área você terá acesso a listagem de todas as páginas. Ao clicar na página, você terá opção de editar seu conteúdo através de um editor online (você pode utilizar um de sua preferência como o ckeditor)...

Depois de fazer as alterações, você pode clicar em salvar, para completar a edição de conteúdo da página correspondente. (No momento do salvar, você dará um update no banco de dados).

Se um usuário não autenticado acessar a URL de administração, ele deverá ser redirecionado para uma tela de login para ele se autenticar.

O usuário e senha de autenticação deverão estar gravados no banco de forma segura.

Crie uma fixture para adicionar o usuário e senha.

PS: Basicamente o que estou exigindo a mais é a utilização do editor online... Conte conosco para lhe ajudar a implementar, mas antes quero que você tente por você mesmo...

PSS: Perceba que ao final desse projeto, você terá um site 100% administrável, ou seja, você fará um CMS simples, mas lembre-se, foi você que fez =)

PSSS: Conte conosco SEMPRE!














 