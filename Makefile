setupUbuntu:
	@make build
	@make permissions
	# @make up
	# @make data

setupMac:
	@make build
	@make up
	@make dataM

build:
	docker-compose build --no-cache --force-rm
permissions:
	docker exec issste sh -c "sudo chmod -R 775 storage"
	docker exec issste sh -c "sudo chmod -R ugo+rw storage"
	docker exec issste/laravel-app sh -c "php artisan cache:clear"
stop:
	docker-compose stop
up:
	docker-compose up -d
# composer-update:
# 	docker exec issste bash -c "composer update"
data:
	docker cp ./laravel-app/public/issste.sql docker-issste_mysql_db_1:/
dataM:
	docker cp ./laravel-app/public/issste.sql docker-issste-mysql_db-1:/
# storage:
# 	docker exec issste/laravel-app bash -c "sudo chmod -R 775 storage"
# 	docker exec issste/laravel-app bash -c "sudo chmod -R ugo+rw storage"
# php artisan cache:clear

# Others

 # docker exec -it docker-issste_mysql_db_1 bash -c 'exec mysql -uroot -proot issste < issste.sql'
 # docker exec -it docker-issste-mysql_db-1 bash -c 'exec mysql -uroot -proot issste < issste.sql'
