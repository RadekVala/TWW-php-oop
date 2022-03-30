Priklad pouziva jako behove prostredi [DOCKER](https://docker.com)

Zprovoznění:
1) Stáhněte si tento repozitář např. pomocí $ git clone https://github.com/RadekVala/TWW-php-oop
2) Po stažení vstupte do staženého adresáře: $ cd TWW-php-oop
3) Spusťte $ docker-compose build
4) Spusťte $ docker-compose up
5) Spusťte nový terminál a v něm $ docker exec -it tww-php-oop_dev-server1 bash
6) Dále composer dump-autoload
7) Zjistit v terminálu IP adresu dev-server_1 
8) Upravit v src/Database/Connection.php, řádek 25 mysql:host na aktuální IP dev-server_1
9) Spustit v prohlížeči localhost:8001

Kompletni dokumentace k DOCKER kontejneru níže:
# Credits
Docker containers:
[https://github.com/jstormes/php-docker-compose](https://github.com/jstormes/php-docker-compose)