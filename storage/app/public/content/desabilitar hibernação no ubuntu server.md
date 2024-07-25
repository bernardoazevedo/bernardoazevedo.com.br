#ubuntu #linux 
Esse comportamento acontece por conta dos seguintes serviços: 
- `sleep.target`
- `suspend.target`
- `hibernate.target`
- `hybrid-sleep.target`

Por isso, vamos "mascarar" esses serviços, para que quando um programa tentar executar algum deles, isso não seja possível.

Para mascarar, você simplesmente irá usar o comando `sudo systemctl mask nome-do-serviço-aqui`. Execute os comandos abaixo no terminal:
- `sudo systemctl mask sleep.target`
- `sudo systemctl mask suspend.target`
- `sudo systemctl mask hibernate.target`
- `sudo systemctl mask hybrid-sleep.target`

Após executar, você pode testar se o procedimento funcionou com o comando `systemctl status nome-do-serviço-aqui`, exemplo:
- `systemctl status suspend.target`

Referência: https://linux-tips.us/how-to-disable-sleep-and-hibernation-on-ubuntu-server/