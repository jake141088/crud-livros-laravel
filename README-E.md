No terminal para criação do projeto CRUD dentro da pasta:
    composer create-project laravel/laravel Nome
Obs.: para abrir a pasta coloca-se cd e arrasta o local da pasta do finder

Starta-se o servidor local xampp, wampserver, docker....

No caso de utilização do docker toda vez antes de executar o comando do php artisan deve preceder:
    docker compose exec web php artisan ....

Criando um controller CRUD:
    docker compose exec web php artisan make:controller BookController --resource   

Se for usar o bootstrap, deve-se deszipar e colocar a pasta na pasta public do diretório crud. Ou seja arquivos CSS, JS, imagem, arquivos externos para ficar disponivel para usuarios externos .

----------------NO BANCO MYSQL --------------------------------
O docker precisa fazer o download da imagem do mysql, ou seja uma imagem do servidor mysql para isso:
1. para que ele verifique se o docker esta instalado corretamente:
    docker -v
2. para baixar a imagem do mysql do dockerhub:
    docker pull mysql
3. para baixar a versao:
    docker pull mysql:8.0.34
4. saber as imagens baixadas:
    docker images
5. para criar e rodar um container tem-se que informar a senha nesse caso:
    docker run -e MYSQL_ROOT_PASSWORD=root --name nome-aplicacao -d mysql:8.0.34
6. para saber os container rodando no momento:
    docker ps
7. para para um container:
    docker stop NomeDoContainernome-do-container
8. para poder fazer a conexao com esse container precisa-se do ip desse containar:
    docker inspect nome-container
obs.: para se poder apagar um container deve-se parar ele antes



