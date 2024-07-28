# Como alterar o papel de parede ao iniciar - Cinnamon

Esse procedimento foi feito para sistemas operacionais com a interface Cinnamon. Ele selecionará o papel de parede desejado sempre que o sistema iniciar. Você também criar um shell script com os comandos desejados e inserir o caminho para ele.

## Passo a passo

- Abrir "Aplicativos da Inicialização"
- Clicar no "+" e em "Comando personalizado"
- No campo "Comando", inserir: `gsettings set org.cinnamon.desktop.background picture-uri file:///insira-o-caminho-para-a-foto-aqui`
- Clicar em "Adicionar"

<!-- #linux #cinnamon -->