#php #mysql #ubuntu #linux #phpmyadmin

## Php
* Install: `sudo apt install php'version-here' php-mysql`
## MySql
* Install mysql: `sudo apt install mysql-server`
* Configure mysql with: `sudo mysql_secure_installation`
* In my case, password authentication was disabled for default, so I run this in mysql cli to set my password: `ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'your_new_password_here'`

## PhpMyAdmin
* `sudo apt install phpmyadmin`