# Rocket CMS
Um simples CMS para iniciar projetos em Laravel 5.2.

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ad3c062e22ba4c25b8017041b619e217)](https://www.codacy.com/app/odirleiborgert/rocket-planet?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=odirleiborgert/rocket-planet&amp;utm_campaign=Badge_Grade)

-----

## Guia de Instalação:

#### Passo 1: 
Instalamos os plugins para os processos utilizados
``` bash
npm install
```

#### Passo 2:
Instalamos os plugins utilizados
``` bash
bower install
```

#### Passo 3:
Instalamos os pacotes do packagist
``` bash
composer install
```

#### Passo 4:
Configure ou crie o arquivo `.env` com suas configurações de banco de dados, o arquivo `.env.example` pode ser usado como exemplo.

#### Passo 5:
``` bash
php artisan migrate
```

#### Passo 6:
Criar um usuário para acesso ao CMS
``` bash
php artisan tinker 
$user = new App\User;
$user->name = 'Seu Nome';
$user->email = 'seu@email.com';
$user->password = \Hash::make('SuaSenha');
$user->save(); 
```

#### Passo 7:
Iniciamos o servidor.
``` bash
php artisan serve
```

#### Passo 8:
Acessar <a href="http://localhost:8000/admin">http://localhost:8000/admin</a>

#### Passo 9:
Em outro console iniciamos o gulp para assistir nossos arquivos less caso tiver modificações.
``` bash
gulp watch
```

-----

## Estrutura e Diretórios:

### Routes
* Novas rotas para outros modulos do CMS devem ser apenas incluidas dentro da pasta `app/Http/Routes/Admin/` utilizando o prefixo ou como segue o modelo.

``` bash
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function() {
	// Suas regras para rotas
});
```

### Controllers
* Os controllers são salvos dentro da pasta `app/Http/Controllers/Admin/`

### Models
* Os models são salvos dentro da pasta `app/Models/Admin/`

### Assets
* Utilizando o comando `gulp watch` em background ficará escutando os arquivos LESS, JS e caso tiver alguma alteração são compilados e salvos na pasta `public/assets/[css,js]/`


...

## Screenshots

![alt tag](http://i.imgur.com/YChCpxi.png)

![alt tag](http://i.imgur.com/1jZasYG.png)

-----

## PHP Libraries

* [laravel/laravel](https://github.com/laravel/laravel) - A PHP Framework For Web Artisans
* [thomaswelton/laravel-gravatar](https://github.com/thomaswelton/laravel-gravatar) - Image gravatar

-----

## Javascript Libraries

* Animate.css
* Bootstrap
* Chart.js
* Font Awesome
* Jquery
* Jquery UI
* Metis Menu
* Pace
* Slim Scroll
* Summer Note

Para novas libraries procure no site <a href="http://bower.io/search/">bower.io/search/</a> e utilize o comando `bower install X_PACKAGE_X --save` que irá instalar na pasta `public/assets/components/`


