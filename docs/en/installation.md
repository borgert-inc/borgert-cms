
# Installation Guide

#### Step 1: 
Install gulp, laravel-elixir, bootstrap-sass and others.
> npm install

#### Step 2:
Install libraries bower
> bower install

#### Step 3:
Packagist install the packages using the composer.
> composer install

#### Step 4:
Set or create `.env` file with your database settings, `.env.example` file can be used as an example.

#### Step 5:
> php artisan key:generate

#### Step 6:
> php artisan migrate

#### Step 7:
Let access to tinker artisan to create the first user to access the CMS.

> php artisan borgert:user 

OR

> php artisan tinker 

```shell
$user = new App\User;
$user->name = 'Your Name';
$user->email = 'your@email.com';
$user->password = \Hash::make('YourPassword');
$user->status = 1;
$user->save(); 
```

#### Step 8:
In the console started to listen to gulp our files *.less and *.js that are within the folder `resources/assets/[js,less]` If you have modifications. I remember that in this case I'm just using `less`, can also be used `stylus && sass`.
> gulp watch

#### Step 9:
In another console we started the server.
> php artisan serve

#### Step 10:
Visit <a href="http://localhost:8000/admin">http://localhost:8000/admin</a>


------------------------------

#### You want to join?
- Making a pull request or by creating an [issue] (https://github.com/odirleiborgert/borgert-cms/issues).

#### Is there a problem in the installation?
Report with a [issue] (https://github.com/odirleiborgert/borgert-cms/issues).