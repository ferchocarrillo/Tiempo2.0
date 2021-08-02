<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestor de Tiempos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
body{

position: relative;
border-radius: 2.75em;
font-family: 'Nunito', sans-serif;
font-weight: 200;
height: 100vh;
margin: 0;
background-color: transparent;
background-image: url('https://i.gifer.com/Vj7m.gif');
background-repeat:no-repeat;
background-size:cover;





}

.content{
    background: url('theme\images\reloj.gif')
}

        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn-index"  href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a class="btn-index"  href="{{ route('login') }}">Logueo</a>





                    @endauth

                    <style>
            .btn-index{
                background-image: url('https://image.shutterstock.com/image-vector/login-button-260nw-369107741.jpg');
                width: 500px;
                height:500px;
                background-color:red;
                color:#FFFFFF;
            }
        </style>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{asset('\theme\images\logo_blanco.png')}}" alt="CoolAdmin" width="350px">

                    <h4 style="color:#FFFFFF;">Sistema de Gestion de Tiempos</h4>
                </div>

                <div class="links">

                </div>

            </div>

        </div>


    </body>
</html>
