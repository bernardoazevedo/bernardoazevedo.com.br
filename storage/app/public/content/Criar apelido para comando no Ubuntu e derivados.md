# Criar apelido para comando no Ubuntu e derivados

## Passo a passo

- Abra o terminal e certifique-se de estar na pasta Home com: 

```
cd $home
```

- Edite o arquivo '.bashrc': 

```
sudo nano .bashrc
```

- No fim do arquivo, coloque o apelido que você vai usar e o comando que deseja executar: 

```
alias [apelido]='comando_que_deseja_executar'
```

- Aperte 'Ctrl+O' para salvar
- Aperte 'Enter' para salvar o arquivo com o mesmo nome
- Aperte 'Ctrl+X' para sair


<!-- ## English

- Go to home folder
- Edit '.bashrc' file: `sudo nano .bashrc`
- At end of file, put the alias: `alias [yourAliasHere]='action_you_want_execute'` -->

<!-- #linux #ubuntu -->