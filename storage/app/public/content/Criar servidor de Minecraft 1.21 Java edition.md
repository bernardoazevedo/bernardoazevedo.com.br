# Criar servidor de Minecraft 1.21 Java edition

## Pré-requisitos

- Instalar Java (a versão vai variar conforme a versão do Minecraft, nesse tutorial cobrimos a versão 1.21):

```shell
sudo apt-get install openjdk-21-jdk
```
 
- Permitir conexões TCP na porta 25565 (a padrão do servidor do Minecraft):
```shell
sudo ufw allow 25565/tcp
```


## Criar um usuário para o servidor do Minecraft

- Crie o usuário:

```shell
sudo adduser minecraft
```

- Dê permissões de superuser temporariamente:

```shell
sudo usermod -aG sudo minecraft
```

- Faça login no novo usuário com:

```shell
sudo su minecraft
```


## Download

- Crie uma pasta e baixe o servidor no link: https://www.minecraft.net/en-us/download/server

```shell
mkdir server && cd server
wget -O minecraft_server.jar https://piston-data.mojang.com/v1/objects/450698d1863ab5180c25d7c804ef0fe6369dd1ba/server.jar
```


## Inicie o servidor

```shell
java -Xmx512M -Xms512M -jar minecraft_server.jar nogui
```

- "512M" se refere a "512mb", a quantidade de memória RAM que será dedicada ao servidor, você pode alterar conforme seu hardware e a quantidade de clientes. 
- "nogui" faz com que não seja carregada uma interface gráfica para diminuir o uso de recursos.
- Na primeira vez que iniciar, você receberá um erro por não ter aceitado o EULA, edite o arquivo `eula.txt`, mudando 'false' para 'true' na última linha:

```shell
nano eula.txt
```


## Aceitar jogadores usando versões crackeadas

- Edite o arquivo `server.properties`, mudando a linha `online-mode=true` para `online-mode=true`

```shell
nano server.properties
```

Referência: https://tjtanjin.medium.com/how-to-set-up-a-minecraft-server-on-ubuntu-a-step-by-step-guide-9d602a12af40