
# User Guide

<a name="routes"></a>
## Routes
* We indicate to use new routes `routes resource` in file `routes/web.php`.

```php

Route::resource('users', 'Admin\Users\UsersController');

Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
    Route::resource('categorys', 'Admin\Blog\CategorysController');
    ...
});

```

<a name="controllers"></a>
## Controllers
* The controllers are saved in the `app/Http/Controllers/Admin/` folder to generate new controllers simply use the make command: controller which has the parameter `--resource` already behind the methods for CRUD.

> php artisan make:controller ExempleController --resource

<a name="models"></a>
## Models
* The models are saved in the folder `app/Models/Admin/`
* In the following models we have added a method called seo ($ param) where the parameter is the item you want to grab. Example: title, description or keywords.
    * `App\Models\Admin\Blog\Posts`
    * `App\Models\Admin\Gallerys\Gallerys` 
    * `App\Models\Admin\Pages\Contents` 
    * `App\Models\Admin\Products\Contents` 
    
    Ex.: {{ $item->seo('title')}}
* * Add image() (true or false returns the thumbnail or large image) and images() (Gallerys) method that returns the first image if any.
    * `App\Models\Admin\Blog\Posts`
    * `App\Models\Admin\Gallerys\Gallerys` 
    * `App\Models\Admin\Products\Contents` 

<a name="views"></a>
## Views
* For the views we use the following pattern in the folder `resources/views/admin/`. Where we will have a index.blade.php that will extend to the views create, edit and list or any other that may create.

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
* Using the command `gulp watch` in the background will be listening to the files SASS and JS that is in the `resources/assets/[admin,blog,site,auth]/[js,sass]` and when detected some of them are compiled and saved in the `public/assets/[admin,blog,site,auth]/[css,js]/`

<a name="languages"></a>
## Languages
Four languages currently available for Borgert CMS, Portuguese, Spanish, and English, by default we will be setting English.
In the config/app.php file, look for locale and fallback_locale and change to `pt`.

The files for translations are located in the `resources/lang/[en,pt,es,zh_cn]/[admin,blog]/**`

```php
    'locale' => 'en',
    'fallback_locale' => 'en',
```

#### You want to join?
- Making a pull request or by creating an [issue] (https://github.com/odirleiborgert/borgert-cms/issues).

#### Is there a problem in the installation?
Report with a [issue] (https://github.com/odirleiborgert/borgert-cms/issues).