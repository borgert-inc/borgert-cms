
# Guia de Uso

<a name="routes"></a>
## Routes
* Indicamos para novas rotas utilizar `routes resource` no arquivo `routes/web.php`.

```php

Route::resource('users', 'Admin\Users\UsersController');

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::resource('categorys', 'Admin\Blog\CategorysController');
    ...
});

```

<a name="controllers"></a>
## Controllers
* Os controllers são salvos dentro da pasta `app/Http/Controllers/Admin/` para gerar novos controllers basta utilizar o comando make:controller onde tem o parametro `--resource` que já trás os métodos para o CRUD. 

> php artisan make:controller ExemploController --resource

<a name="models"></a>
## Models
* Os models são salvos dentro da pasta `app/Models/Admin/`
* Nos models a seguir foi adicionado um método chamado seo($param) onde o parâmetro é o item que você quer pegar. Ex.: title, description ou keywords. 
    * `App\Models\Admin\Blog\Posts`
    * `App\Models\Admin\Gallerys\Gallerys` 
    * `App\Models\Admin\Pages\Contents` 
    * `App\Models\Admin\Products\Contents` 
    
    Ex.: {{ $item->seo('title')}}

* Adicionado método image(true or false)  e images() (Gallerys) que retorna a primeira imagem se existir alguma.
    * `App\Models\Admin\Blog\Posts`
    * `App\Models\Admin\Gallerys\Gallerys` 
    * `App\Models\Admin\Products\Contents` 

<a name="views"></a>
## Views
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

<a name="assets"></a>
## Assets
* Utilizando o comando `gulp watch` em background ficará escutando os arquivos LESS, JS que está  no diretório `resources/assets/[js,less,sass]` e quando for detectado alguma neles são compilados e salvos na pasta `public/assets/[css,js]/`

<a name="languages"></a>
## Idiomas
Dois idiomas disponíveis no momento para o Rocket, Portuguès e Inglês, por padrão estaremos setando o inglês. 
No arquivo config/app.php procure por locale e fallback_locale e altere para `pt_BR`.

Os arquivos para traduções estarão localizados na pasta `resources\lang\[en,pt_BR\admin\**`

```php
    'locale' => 'en',
    'fallback_locale' => 'en',
```

<a name="phpcsfixer"></a>
## PhpCsFixer
* Utilizamos o comando `php artisan borgert:phpcsfixer`, requer o arquivo phpcsfixer.phar 


#### Quer participar?
- Fazendo um pull request ou criando uma [issue](https://github.com/odirleiborgert/borgert-cms/issues).

#### Algum problema na instalação?
Reporte com uma [issue](https://github.com/odirleiborgert/borgert-cms/issues).


