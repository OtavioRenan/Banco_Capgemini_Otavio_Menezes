Informações sobre implementação de um projeto laravel: 

Apos a clonagem do projeto no repositório é necessário instalar as dependecias do composer com o comando

## composer install

Depois da instalação das deprendencias do composer segue a instalação das dependências do nodejs com o comando

## npm install

Após a instalação das dependências é necessário configurar o arquivo .env onde encontra-se as configurações do banco de dados. Copie o arquivo .env.example para .env na pasta raiz. Você pode digitar copy .env.example .env se estiver usando o comando Prompt Windows ou cp .env.example .env se estiver usando o terminal linux. Abra o arquivo e configure o banco de dados. Como não houve uma exigência dei preferência ao uso do banco MySQL.

Para gerar uma nova chave, execute o comando

## php artisan key:generate

Para criar as tabelas execute o comando

## php artisan migrate

Como o desafio não exigia um cadastro de contas, eu criei um factory e um arquivo .sql para popular o banco. O arquivo encontra-se no diretório database, e para rodar o factory basta executar o seeder

## composer dump-autoload
## php artisan db:seed

Para executar o projeto com o serve-laravel, execute o comando

## php artisan serve

Informações sobre implementação (opcional)

Favor informar os seguintes pontos sobre sua implementação:

1) Faça uma breve descrição sobre a arquitetura utilizada no problema proposto;
Utilizei a arquitetura Model–view–controller onde criei um model para utilizar a biblioteca eloquent do Laravel e assim faciliar as consultas do banco de dados e fornecer as Api's mais facilmente.

2) Em sua análise, houve algum problema relevante que gostaria de destacar?
Como um mine teste compreendo a abstração do projeto, mas no caso de um projeto profissional  seria necessário um sistema de autenticação.

3) Houve alguma solução ou padrão arquitetural que tenha aplicado e gostaria de ressaltar?
Já descrito na questão 1º foi utilizado o Model–view–controller para o back, e no frnt como não foi solicitado algo mais complexo como o Vue Router, optei por ultilizar o padrão Single-Page Application e deixei todo o script em um só arquivo .vue.