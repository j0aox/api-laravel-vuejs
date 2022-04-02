## Sobre

Este é um projeto simples feito em PHP + Laravel, Vue.js e MySQL.
Uma API de cadastro de usuário com os campos de: nome, e-mail, senha, foto
Com. O front-end foi feito com Vue.js

## Pré-requisitos

Na sua máquina você terá que ter instalado as seguintes tecnologia
- PHP
- MySQL
- Composer
- npm

## Como executar o projeto

Antes de executar o projeto, você terá que criar uma base de dados com o nome (api-laravel-vue)

```bash
Clonar o repositorio
-- https://github.com/j0aox/api-laravel-vuejs.git

Entrar no diretório que foi criado 
-- cd api-laravel-vuejs

Instalar Dependências
-- composer install

Alterar o arquivo 
-- .env.example para .env

Mudar o arquivo .env
-- Na linha 14 onde tem: DB_DATABASE=laravel
você terá que mudar para (DB_DATABASE=api-laravel-vue) 
-- mesmo nome da base de dados ao qual você criou no início (api-laravel-vue)

Criar a chave para o projeto
-- php artisan key:generate

Rodar as migrate para criar as tabelas da banco
-- php artisan migrate

Startar o projeto
-- php artisan serve

```
Depois de feito tudo isso, abra o navegador e acesse (http://localhost:8000)
