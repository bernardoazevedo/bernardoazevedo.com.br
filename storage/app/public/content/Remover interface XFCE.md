# Desinstalar interface XFCE em Ubuntu e derivados

## Pré-requisito
Você precisa ter uma outra interface gráfica instalada para remover o XFCE, caso contrário, o sistema iniciará pela linha de comando.


## Passo a passo
Instale o programa tasksel:

```
sudo apt install tasksel
```

Remova a interface XFCE:

```
sudo tasksel remove task-xfce-desktop
sudo apt remove xfce4-session
sudo apt autoremove 'xfce4*'
```

Por fim, reinicie o computador e entre na outra interface gráfica.

<!-- #linux #xfce #ubuntu -->