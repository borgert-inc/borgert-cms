# Rocket CMS
Um simples CMS para iniciar projetos em Laravel 5.2.

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ad3c062e22ba4c25b8017041b619e217)](https://www.codacy.com/app/odirleiborgert/rocket-planet?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=odirleiborgert/rocket-planet&amp;utm_campaign=Badge_Grade)

-----

## Guia de Instalação:

### Passo 1: 
Instalamos os plugins para os processos utilizados
`npm install` 

### Passo 2:
Instalamos os plugins utilizados
`bower install` 

### Passo 3:
Instalamos os pacotes do packagist
`composer install` 

### Passo 4:
Configure ou crie o arquivo `.env` com suas configurações de banco de dados, o arquivo `.env.example` pode ser usado como exemplo.

### Passo 5:
`php artisan migrate` 

### Passo 6:
Criar um usuário para acesso ao CMS
`php artisan tinker` 
`$user = new App\User;`
`$user->name = 'Seu Nome';`
`$user->email = 'seu@email.com';`
`$user->password = \Hash::make('SuaSenha');`
`$user->save();` 

### Passo 7:
Iniciamos o servidor.
`php artisan serve` 

### Passo 8:
Acessar <a href="http://localhost:8000/admin">http://localhost:8000/admin</a>

### Passo 9:
Em outro console iniciamos o gulp para assistir nossos arquivos less caso tiver modificações.
`gulp watch` 

-----

## Estrutura e Diretórios:

...

## Screenshots

![alt tag](http://i.imgur.com/1jZasYG.png)


