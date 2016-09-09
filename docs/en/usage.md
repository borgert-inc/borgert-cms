
# User Guide

<a name="routes"></a>
## Routes
* New routes for other CMS modules should only be included in the `routes/admin/`, `routes/auth/` and `routes/custom/` folder using the prefix or as follows the model

```php
Route::group(['prefix' => 'blog', 'as' => 'blog.'], function() {
	// Your rules
});
```

<a name="controllers"></a>
## Controllers
* The controllers are saved in the `app/Http/Controllers/Admin/` folder to generate new controllers simply use the make command: controller which has the parameter `--resource` already behind the methods for CRUD.

> php artisan make:controller ExempleController --resource

<a name="models"></a>
## Models
* The models are saved in the folder `app/Models/Admin/`

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
* Using the command `gulp watch` in the background will be listening to the files LESS and JS that is in the `resources/assets/[js,less,sass]` and when detected some of them are compiled and saved in the `public/assets/[css,js]/`

<a name="languages"></a>
## Languages
Two languages currently available for Rocket, Portuguès and English by default by setting will be English.
The file config / app.php look for locale and fallback_locale and change to `pt_BR`.

The files for translations are located in the `resources\lang\[en,pt_BR\admin\**`

```php
    'locale' => 'en',
    'fallback_locale' => 'en',
`


------------------------------

#### You want to join?
- Making a pull request or by creating an [issue] (https://github.com/odirleiborgert/borgert-cms/issues).

#### Is there a problem in the installation?
Report with a [issue] (https://github.com/odirleiborgert/borgert-cms/issues).