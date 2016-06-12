# Rocket CMS
Um simples CMS para iniciar projetos em Laravel 5.2.

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ad3c062e22ba4c25b8017041b619e217)](https://www.codacy.com/app/odirleiborgert/rocket-planet?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=odirleiborgert/rocket-planet&amp;utm_campaign=Badge_Grade)

#### Quer participar?
- Fazendo um pull request ou crie uma [issue](https://github.com/odirleiborgert/rocket-cms/issues).


-----

* [Módulos](#modulos)
* [Guia de Instalação](#instalacao)
* [Estrutura e Diretórios](#item3)
* [Screenshots](#screenshots)
* [PHP Libraries](#php-libraries)
* [Javascript Libraries](#javascript-libraries)
* [Licença](#licenca)



-----
<a name="modulos"></a>
## Módulos:

1. Blog
	* Categorias
	* Posts
	* Comentários
2. Páginas
	* Categorias
	* Conteúdos
3. Produtos
	* Categorias
	* Conteúdos
4. Mailbox
	* Caixa de Entrada
	* Arquivados
	* Lixeira
5. Usuários


-----
<a name="instalacao"></a>
## Guia de Instalação:

#### Passo 1: 
Instalamos gulp, laravel-elixir, bootstrap-sass e demais pacotes via npm.
> npm install

#### Passo 2:
Instalamos os plugins utilizados
> bower install

#### Passo 3:
Instalamos os pacotes do packagist utilizando o composer, as libraries que [utilizamos são essas aqui](#php-libraries).
> composer install

#### Passo 4:
Configure ou crie o arquivo `.env` com suas configurações de banco de dados, o arquivo `.env.example` pode ser usado como exemplo.

#### Passo 5:
> php artisan migrate

#### Passo 6:
Vamos acessar ao tinker do artisan para criar o primeiro usuário para acessar ao CMS

> php artisan tinker 

```shell
$user = new App\User;
$user->name = 'Seu Nome';
$user->email = 'seu@email.com';
$user->password = \Hash::make('SuaSenha');
$user->save(); 
```

#### Passo 7:
No console iniciamos o gulp para escutar nossos arquivos *.less e *.js que estão dentro da pasta `resources/assets/[js,less]` caso tiver modificações. Lembro que nesse caso estou só utilizando o `less`, também pode ser utilizado `stylus && sass`.
> gulp watch

#### Passo 8:
Em outro console iniciamos o servidor.
> php artisan serve

#### Passo 9:
Acessar <a href="http://localhost:8000/admin">http://localhost:8000/admin</a>



-----
<a name="estrutura"></a>
## Estrutura e Diretórios:

#### Routes
* Novas rotas para outros modulos do CMS devem ser apenas incluidas dentro da pasta `app/Http/Routes/Admin/` utilizando o prefixo ou como segue o modelo.

```php
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function() {
	// Suas regras para rotas
});
```
#### Controllers
* Os controllers são salvos dentro da pasta `app/Http/Controllers/Admin/` para gerar novos controllers basta utilizar o comando make:controller onde tem o parametro `--resource` que já trás os métodos para o CRUD. 
> php artisan make:controller ExemploController --resource

#### Models
* Os models são salvos dentro da pasta `app/Models/Admin/`

#### Views
* Para as views utilizamos o seguinte padrão dentro da pasta `resources/views/admin/`. Onde teremos um index.blade.php que extenderá para as views create, edit e list ou qualquer outra que vier a criar.

```
├── module_XYZ/
|	├── index.blade.php
|	├── categorys/
|   |	└── create.blade.php
|   |	└── edit.blade.php
|   |	└── list.blade.php
| 	└── contents/
|   	└── create.blade.php
|   	└── edit.blade.php
|   	└── list.blade.php
```

#### Assets
* Utilizando o comando `gulp watch` em background ficará escutando os arquivos LESS, JS que está  no diretório `resources/assets/[js,less,sass]` e quando for detectado alguma neles são compilados e salvos na pasta `public/assets/[css,js]/`


-----
<a name="screenshots"></a>
## Screenshots

![alt tag](http://i.imgur.com/Ox6vGP1.png)

![alt tag](http://i.imgur.com/dQQKLzM.png)

-----
<a name="php-libraries"></a>
## PHP Libraries

* [laravel/laravel](https://github.com/laravel/laravel) - A PHP Framework For Web Artisans
* [thomaswelton/laravel-gravatar](https://github.com/thomaswelton/laravel-gravatar) - Image gravatar

-----
<a name="javascript-libraries"></a>
## Javascript Libraries

* [Animate.css](http://daneden.github.io/animate.css/) - Animações com CSS
* [Bootstrap](http://getbootstrap.com) - Framework CSS
* [Chart.js](http://chartjs.org) - Gráficos
* [Font Awesome](http://http://fontawesome.io/) - Ícones
* [Jquery](http://jquery.com) - Framework Javascript
* [Jquery UI](http://jqueryui.com) - User Interface
* [Metis Menu](https://github.com/onokumus/metisMenu) - Menu toogle
* [Pace](https://github.com/HubSpot/pace) - Loading páginas
* [Slim Scroll](https://github.com/rochal/jQuery-slimScroll) - Barra de rolagem 
* [Summer Note](https://github.com/summernote/summernote) - Editor de texto

Para novas libraries procure no site <a href="http://bower.io/search/">bower.io/search/</a> e utilize o comando abaixo que irá instalar na pasta `public/assets/components/`
`> bower install X_PACKAGE_X --save`


-----
<a name="licenca"></a>
## Licença

Este é um software livre distribuído sob os termos da licença MIT. © [Odirlei Borgert](http://www.odirleiborgert.com.br)

-----
