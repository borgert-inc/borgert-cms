
# Uploads

Utilizaremos a librarie [Blueimp - jQuery File Upload](https://github.com/blueimp/jQuery-File-Upload).
Para implantarmos upload de arquivos em outros módulos no CMS utilizaremos o passo a passo abaixo.


-----

* [1. Requerimentos](#requerimentos)
* [2. Diretórios](#diretorios)
* [3. Routes](#routes)
* [4. Views](#views)
* [5. Controllers](#controllers)
* [6. Contribuições](#contribuicoes)


-----

<a name="requerimentos"></a>
## 1. Requerimentos

- Bootstrap
> bower install bootstrap --save

- Blueimp Jquery File Upload
> bower install blueimp-file-upload --save
Junto com o Blueimp File Upload vem outras dependências ('blueimp-canvas-to-blog','blueimp-load-image','blueimp-tmpl')



-----

<a name="diretorios"></a>
## 2. Diretórios

Dentro da pasta **public/uploads** é onde serão salvas as imagens, sempre criando um diretório para cada modulo como no exemplo abaixo. Dentro deste diretório será automaticamente criado outro diretório com o código do registro do cadastro, local onde serão salvos os arquivos.

```
├── public/
|	├── uploads/
|   |	└── gallerys/
|   |	└── products/
|   |	└── others.../
```


-----

<a name="routes"></a>
## 3. Routes

Adicionar essa rota ao seu módulo.

```php
Route::any('upload/{id?}', [
    'as' => 'upload',
    'uses' => 'Admin\Module\ModuleController@upload'
]);
```

-----
<a name="views"></a>
## 4. Views

Para as views teremos inclusão de CSS, Javascript e HTML.

#### 4.1 Cadastro

* Adicionado os CSS
```html
<!-- Blueimp Jquery File Upload -->
<link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload.css') !!}" rel="stylesheet">
<link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload-ui.css') !!}" rel="stylesheet">
```

* Adicionado os HTML
```html
<form action="{{ route('admin.module.store') }}" class="fileupload" method="post" enctype="multipart/form-data">
	<!-- Seu formulário de cadastro -->
    @include('admin._inc.fileupload.buttons',['extensions' => ['GIF', 'JPG', 'JPEG', 'PNG']]) 
</form>
```

* Adicionado os Javascript
```html
@include('admin._inc.fileupload.upload')
@include('admin._inc.fileupload.download')

<!-- Blueimp Jquery File Upload -->
<script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/vendor/jquery.ui.widget.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-tmpl/js/tmpl.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-load-image/js/load-image.all.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-canvas-to-blob/js/canvas-to-blob.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.iframe-transport.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-process.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-image.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-audio.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-video.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-validate.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/components/blueimp-file-upload/js/jquery.fileupload-ui.js') !!}"></script>

<script type="text/javascript">

    // Initialize the jQuery File Upload widget:
    $('.fileupload').fileupload({
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|bmp)$/i,
        maxFileSize: 10240000, // 10 MB
        url: '{{ route('admin.module.upload') }}',
    });

     // Load existing files:
    $('.fileupload').addClass('fileupload-processing');

    $.ajax({
        url: $('.fileupload').fileupload('option', 'url'),
        dataType: 'json',
        context: $('.fileupload')[0]
    }).always(function () {
        $(this).removeClass('fileupload-processing');
    }).done(function (result) {
        $(this).fileupload('option', 'done').call(this, $.Event('done'), {result: result});
    });

</script>
```



#### 4.2 Edição

* A única coisa que muda é o trecho de script abaixo, que passamos o ID do registro que estamos editando.

```html
<script type="text/javascript">

    // Initialize the jQuery File Upload widget:
    $('.fileupload').fileupload({
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|bmp)$/i,
        maxFileSize: 10240000, // 10 MB
        url: '{{ route('admin.module.upload',$registro->id) }}',
    });

</script>
```

-----
<a name="controllers"></a>
## 5. Controllers

#### 5.1 Librarie
Vamos adicionar a librarie UploadHandle que foi criada pelo Blueimp - jQuery File Upload.

```php
use App\Libraries\Upload;
```

#### 5.2 Metodo store()
Logo após o objeto ser salvo iremos pegar o ID do objeto que foi salvo para mover os arquivos do diretório temporário para o novo diretório que será o ID do registro.

```php

// Logo após o SAVE do objeto que já teremos o ID
$object->save();

$user = \Auth::User();
$path_from = self::UPLOAD_PATH.'temp-'.$user->id.'/';
$path_to = self::UPLOAD_PATH.$content->id;

if (\Storage::disk('uploads')->exists($path_from)) {
    \Storage::disk('uploads')->move($path_from, $path_to);
}

```

#### 5.3 Metodo destroy()
Ao excluirmos um registro também devemos apagar o diretório onde foi feito upload dos arquivos. O nome module da variável $path é o nome do diretório dentro da pasta `public/uploads`.

```php
// Checamos se o diretório existe
$path = self::UPLOAD_PATH.$id;

// Deletamos o diretório da imagem
if (\Storage::disk('uploads')->exists($path)) {
    \Storage::disk('uploads')->deleteDirectory($path);
}
```

#### 5.4 Metodo upload()

Adicionar constantes a classe onde configuramos a pasta onde irá ser feito o upload das imagens e qual é a rota que irá acessar ao método upload().

```
const UPLOAD_PATH = 'module/';
const UPLOAD_ROUTE = 'admin.modulo.contents.upload';
```


```php
public function upload(Request $request, $id = null)
{

    new Upload(
        $request,
        [
            'id' => $id,
            'route' => self::UPLOAD_ROUTE, // Route `routes/web.app`
            'path' => self::UPLOAD_PATH, // Path to upload file
        ]
    );

    return;

}

```


------------------------

<a name="contribuicoes"></a>
## 6. Contribuições

#### Quer participar?
- Fazendo um pull request ou criando uma [issue](https://github.com/odirleiborgert/borgert-cms/issues).

#### Algum problema na instalação?
Reporte com uma [issue](https://github.com/odirleiborgert/borgert-cms/issues).


