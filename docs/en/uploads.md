
# Uploads

We will use the librarie [Blueimp - jQuery File Upload](https://github.com/blueimp/jQuery-File-Upload).
To upload files we implement other modules in CMS will use the walkthrough below.


-----

* [1. Requirements](#requirements)
* [2. Directories](#directories)
* [3. Routes](#routes)
* [4. Views](#views)
* [5. Controllers](#controllers)
* [6. Contributions](#contributions)


-----

<a name="requirements"></a>
## 1. Requirements

- Bootstrap
> bower install bootstrap --save

- Blueimp Jquery File Upload
> bower install blueimp-file-upload --save
Along with Blueimp File Upload has other dependencies ('blueimp-canvas-to-blog','blueimp-load-image','blueimp-tmpl')



-----

<a name="directories"></a>
## 2. Directories

Inside the folder **public/uploads** is where the images will be saved, always creating a directory for each module as shown below. Within this directory will be automatically created another directory with the master record of the code, where the files are saved.

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

Add a route to your module.

```php
Route::any('upload/{id?}', [
    'as' => 'upload',
    'uses' => 'Admin\Module\ModuleController@upload'
]);
```

-----
<a name="views"></a>
## 4. Views

For views will include CSS, Javascript and HTML.

#### 4.1 Register

* Added CSS
```html
<!-- Blueimp Jquery File Upload -->
<link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload.css') !!}" rel="stylesheet">
<link href="{!! asset('assets/components/blueimp-file-upload/css/jquery.fileupload-ui.css') !!}" rel="stylesheet">
```

* Added HTML
```html
<form action="{{ route('admin.module.store') }}" class="fileupload" method="post" enctype="multipart/form-data">
	<!-- this your form -->
    @include('admin._inc.fileupload.buttons',['extensions' => ['GIF', 'JPG', 'JPEG', 'PNG']])
</form>
```

* Added Javascript
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



#### 4.2 Edit

* The only thing that changes is the script snippet, we pass the record ID that we are editing.

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
Let's add the library Upload Handler that was created by Blueimp - jQuery File Upload.

```php
use App\Libraries\UploadHandler;
```

#### 5.2 Method store()
Soon after the object to be saved we will catch the object ID that was saved to move the temporary directory of the files to the new directory that will be the record ID.

```php

// Soon after the SAVE object that we will have the ID
$object->save();

$user = \Auth::User();
$path_from = self::UPLOAD_PATH.'temp-'.$user->id.'/';
$path_to = self::UPLOAD_PATH.$content->id;

if (\Storage::disk('uploads')->exists($path_from)) {
    \Storage::disk('uploads')->move($path_from, $path_to);
}

```

#### 5.3 Method destroy()
To exclude a record should also delete the directory where uploaded files. The module name of the variable $path is the directory name in the folder `public/uploads`.

```php
// Check that the directory exists
$path = self::UPLOAD_PATH.$id;

// Delete the image directory
if (\Storage::disk('uploads')->exists($path)) {
    \Storage::disk('uploads')->deleteDirectory($path);
}
```

#### 5.4 Method upload()

Add constant class where we set the folder will be uploaded the images and what is the route that will access the upload() method.

```
const UPLOAD_PATH = 'modulo/';
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


------------------------------

#### You want to join?
- Making a pull request or by creating an [issue] (https://github.com/odirleiborgert/borgert-cms/issues).

#### Is there a problem in the installation?
Report with a [issue] (https://github.com/odirleiborgert/borgert-cms/issues).