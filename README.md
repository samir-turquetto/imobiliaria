# Instruções para entrega da avaliação da disciplina Frameworks de Desenvolvimento PHP - Laminas MVC - UniAlfa Umuarama - 2021

  

1. Crie um fork deste projeto

2. No fork, altere a página de layout, colocando seu nome no rodapé

3. Crie um cadastro de imóveis. Esse cadastro deverá ler e gravar dados de uma tabela chamada imoveis. Você define a estrutura da tabela.

4. Esse cadastro deverá ter um link na página /cadastros, exibida após o login.

5. O cadastro deverá incluir, alterar, excluir e listar registros da tabela imoveis.

6. Concluída a implementação, envie um e-mail para flavio.lisboa@fgsl.eti.br, informando o endereço do fork no Github.

  

**PRAZO DE ENTREGA: 06/12/2021**

  

## Usando docker-compose

### Build e start da imagem e do container usar o comando:

  

$ docker-compose up -d --build

$ docker exec -it imobiliaria bash

$ composer install --ignore-platform-reqs

$ composer development-enable

  

## Scripts DB

Scripts do database no diretório ./data/SQL

Banco de dados está no container ADMINER na url http://localhost:9001

'driver' => 'Pdo_Mysql', 'database' => 'imobiliaria', 'username' => 'user', 'password' => 'mysql', 'port' => 3306, 'hostname' => 'db'

  

## Após, visitar http://localhost:8081 para visualizar a aplicação.

user: admin

pass: admin