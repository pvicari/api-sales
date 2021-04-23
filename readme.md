# Api-Sales

Uma aplicação desenvolvida em Laravel 6 a partir de um Container Docker.

Para executar você irá precisar do Docker e o Docker Compose instalado.

Crie um arquivo .env na raiz seguindo o exemplo do arquivo .env.example, substituindo as informações do banco de dados (Mysql) e mailtrap (http://mailtrap.io), necessário para testar a parte de email.

Rode os seguintes comandos no terminal:

```
docker-compose build app
docker-compose up
```

Entre na aplicação e instale as dependencias do composer e gere a chave de criptografia da aplicação pelos comandos:

```
docker exec -it api-sales /bin/bash  
composer install
php artisan key:generate
```

Após isso, acesse a aplicação pelo https://localhost:8000/

Obs: Para colocar a schedule de email para funcionar é necessário iniciar com o comando:

```
php artisan schedule:run 
```

