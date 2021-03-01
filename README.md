## TESTE BACKEND PHP

### Requisitos para rodar a aplicação

- GIT
- Docker
- Docker-Compose

### Instruções para rodar a aplicação

Siga todos os passos para rodar a aplicação utilizando o Docker/Docker-Compose, é muito importante executar os comandos na raíz do projeto.

Subir todos os containers Docker

```
docker-compose up -d
```

Criar o arquivo de configurações

```
cp ./laravel-framework/.env.example ./laravel-framework/.env
```

Instalando as dependências do projeto Laravel

```
docker-compose exec php-fpm composer install
```

Gerar o APP_KEY do .env

```
docker-compose exec php-fpm php artisan key:generate
```

Adicionar permissão

```
docker-compose exec php-fpm chown -R www-data:www-data /application/public
```

Adicionar permissão

```
docker-compose exec php-fpm chmod -R 755 /application/storage
```
