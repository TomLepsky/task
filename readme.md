**Развертывание проекта**  
```
docker-compose build
docker-compose up -d
docker run --rm -ti -v $pwd:/app composer composer install --ignore-platform-reqs --no-scripts
```
**Запуск тестов**  
```
docker exec -ti php ./vendor/bin/phpunit tests
```