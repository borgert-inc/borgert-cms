<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:300,700" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-family: 'Arial';
                color: #888;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            h4 {
                font-family: 'Lato';
                font-weight: 300;
                font-size: 20px;
            }
            h4 strong {
                font-weight: 700;
            }
            .btn {
                text-decoration: none;
                background-color: #273643;
                color: #fff;
                padding: 10px 15px;
                border-radius: 4px;
                font-size: 12px;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <img src="{{ asset('assets/admin/img/borgert-logo.png') }}" width="250">
                <h4><strong>{{ config('borgert.name') }}</strong> | Framework {{ config('borgert.laravel') }}</h4>
                <a href="{{ route('admin.index') }}" class="btn">Enter</a>
            </div>
        </div>
    </body>
</html>
