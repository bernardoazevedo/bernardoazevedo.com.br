#linux #ubuntu
# Como configurar rede no Ubuntu Server 24.04
## Introdução
- O arquivo de configuração fica em: `etc/netplan`
- Use `ls /etc/netplan` para ver o nome do seu arquivo
- No meu caso, o nome do arquivo é `50-cloud-init.yaml`
- Para editar o arquivo: `sudo nano /etc/netplan/50-cloud-init.yaml`
## Exemplo da estrutura do arquivo:
- Ethernet:
```
network:
    version: 2
    renderer: networkd
    ethernets:
        nome-da-interface-aqui:
            dhcp4: no
            addresses: [static-ip-aqui/24]
            routes:
                  - to: default
                    via: gateway-ip-aqui
            nameservers:
                addresses: [dns-1-aqui, dns-2-aqui]
```

- Wi-Fi:
```
network:
    version: 2
    renderer: networkd
    wifis:
        nome-da-interface-aqui:
            access-points:
                ssid-aqui:
                    password: senha-aqui
            dhcp4: true
```
## Exemplo preenchido:
- Ethernet:
```
network:
    version: 2
    renderer: networkd
    ethernets:
        eno1:
            dhcp4: no
            addresses: [192.168.0.85/24]
            routes:
                  - to: default
                    via: 192.168.0.1
            nameservers:
                addresses: [1.1.1.1, 8.8.8.8]
```

- Wi-fi:
```
network:
    version: 2
    renderer: networkd
    wifis:
        wlp3s0:
            access-points:
                BernardoWifi:
                    password: minhasenha123
            dhcp4: true
```
## Para aplicar as configurações:
- Antes de aplicar, teste a configuração: `sudo netplan try`
- O programa avisará se houver algum erro. se tiver, corrija.
- Se não exibir erros: `sudo netplan apply`

Referência: https://people.ubuntu.com/~slyon/netplan-docs/examples/