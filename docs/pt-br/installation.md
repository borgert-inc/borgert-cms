
# Guia de Instalação

#### Passo 1: 
Instalamos gulp, laravel-elixir, bootstrap-sass e demais pacotes via npm.
> npm install

#### Passo 2:
Instalamos os plugins utilizados
> bower install

#### Passo 3:
Instalamos os pacotes do packagist utilizando o composer.
> composer install

#### Passo 4:
Configure ou crie o arquivo `.env` com suas configurações de banco de dados, o arquivo `.env.example` pode ser usado como exemplo.

#### Passo 5:
> php artisan key:generate

#### Passo 6:
> php artisan migrate

#### Passo 7:
Vamos acessar ao tinker do artisan para criar o primeiro usuário para acessar ao CMS

> php artisan borgert:user 

Ou

> php artisan tinker 

```shell
$user = new App\User;
$user->name = 'Seu Nome';
$user->email = 'seu@email.com';
$user->password = \Hash::make('SuaSenha');
$user->status = 1;
$user->save(); 
```

#### Passo 8:
No console iniciamos o gulp para escutar nossos arquivos *.less e *.js que estão dentro da pasta `resources/assets/[js,less]` caso tiver modificações. Lembro que nesse caso estou só utilizando o `less`, também pode ser utilizado `stylus && sass`.
> gulp watch

#### Passo 9:
Em outro console iniciamos o servidor.
> php artisan serve

#### Passo 10:
Acessar <a href="http://localhost:8000/admin">http://localhost:8000/admin</a>



------------------------

#### Quer participar?
- Fazendo um pull request ou criando uma [issue](https://github.com/odirleiborgert/borgert-cms/issues).

#### Algum problema na instalação?
Reporte com uma [issue](https://github.com/odirleiborgert/borgert-cms/issues).


