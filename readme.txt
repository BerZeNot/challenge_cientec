O projeto precisa que tenha o php e a lib php8.1-sqlite3 instalados. Caso não possua, em um ambiente linux 
é possível instalar com os comandos a seguir:

	// PHP 8.1
	sudo apt install php8.1-cli
	
	// lib php8.1-sqlite3
	sudo apt install php8.1-sqlite3 

Também é necessário configurar o banco de dados sqlite. Para isso, navegue até a pasta db, que fica no diretório
application/backend/db, e execute o comando:
	
	sqlite3 database.db ".read db.sql"

Este comando criará o arquivo de banco de dados e fará com que o sqlite leia e execute o script sql contido no 
arquivo db.sql.

Para executar o projeto navegue até a pasta application e utilize o comando do php:
	cd application/
	php -S localhost:8080

Para acessar, cole o link no navegador:
	http://localhost:8080
