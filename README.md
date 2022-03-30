Priklad pouziva jako behove prostredi [DOCKER](https://docker.com)

Zprovoznění:
1) docker-compose up
2) Zjistit v terminálu IP adresu dev-server_1 
3) Upravit v src/Database/Connection.php, řádek 25 mysql:host na aktuální IP dev-server_1
4) Spustit v prohlížeči localhost:8001

Kompletni dokumentace k DOCKER kontejneru níže:
# Credits
Docker containers:
[https://github.com/jstormes/php-docker-compose](https://github.com/jstormes/php-docker-compose)