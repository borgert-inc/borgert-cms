
# Guia de Uso - Rocket CMS

## Routes
* Novas rotas para outros modulos do CMS devem ser apenas incluidas dentro da pasta `app/Http/Routes/Admin/` utilizando o prefixo ou como segue o modelo.

```php
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function() {
	// Suas regras para rotas
});
```
## Controllers
* Os controllers são salvos dentro da pasta `app/Http/Controllers/Admin/` para gerar novos controllers basta utilizar o comando make:controller onde tem o parametro `--resource` que já trás os métodos para o CRUD. 
> php artisan make:controller ExemploController --resource

## Models
* Os models são salvos dentro da pasta `app/Models/Admin/`

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

## Assets
* Utilizando o comando `gulp watch` em background ficará escutando os arquivos LESS, JS que está  no diretório `resources/assets/[js,less,sass]` e quando for detectado alguma neles são compilados e salvos na pasta `public/assets/[css,js]/`



#### Algum dificuldade ou sugestão de melhorias?
Reporte com uma [issue](https://github.com/odirleiborgert/rocket-cms/issues).
