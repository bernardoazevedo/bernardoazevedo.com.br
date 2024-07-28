# Instalar PHP, MySQL e phpMyAdmin no Ubuntu 22.04

## PHP

Instalar: 
```
sudo apt install php'version-here' php-mysql
```

## MySQL

Instalar:
```
sudo apt install mysql-server
```

Configure o MySQL com:
```
sudo mysql_secure_installation
```

No meu caso, a autenticação por senha foi desabilitada por padrão, então executei esse comando para definir minha senha:
```
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'sua_nova_senha_aqui'
```

## phpMyAdmin
```
sudo apt install phpmyadmin
```

<!-- ## PHP

Install: 
```
sudo apt install php'version-here' php-mysql
```

## MySQL

Install mysql:
```
sudo apt install mysql-server
```

Configure mysql with:
```
sudo mysql_secure_installation
```

In my case, password authentication was disabled for default, so I run this in mysql cli to set my password:
```
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password by 'your_new_password_here'
```

## phpMyAdmin
```
sudo apt install phpmyadmin
``` -->

<!-- #php #mysql #ubuntu #linux #phpmyadmin -->