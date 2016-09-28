<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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

            .title {
                font-size: 96px;
                font-weight: 100;
                font-family: 'Lato';
            }
            h4 {
                font-family: 'Lato';
            }
            .btn {
                text-decoration: none;
                background-color: #E77E23;
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
                <div class="title">{{ config('borgert.name') }}</div>
                <h4>Framework {{ config('borgert.laravel') }}</h4>
                <a href="{{ route('admin.index') }}" class="btn">Enter</a>
            </div>
        </div>
    </body>
</html>
