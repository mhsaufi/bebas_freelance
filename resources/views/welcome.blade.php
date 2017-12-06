<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>BEBAS</title>

        @include('layouts.bebas_sheets')

    </head>

    <body class="welcome-bg" style="background-image: url('{!! asset('bebas_asset/image/background-bebas.jpg') !!}')">

        <div class="row text-right" style="padding-right: 30px;">
            <br><br>
            @guest
                <button class="btn-bebas" onclick="loginform()">LOGIN</button>
            @else
                <button class="btn-bebas" onclick="gohome()">HOME</button>
            @endguest
        </div>
        <center>
            <div class="card_login" id="card_login">
                <div class="card-login-header text-center">
                    
                    <h3>Sign In</h3>

                </div>
                <div class="card-login-body">
                    <form action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <input type="text" name="email" class="form-control" placeholder="email"/><br>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <input type="password" name="password"/ class="form-control" placeholder="password"><br>

                        <input type="checkbox" name="rememberme"/> Remember Me<br><br>
                        <button class="btn btn-block btn-login">LOGIN</button><br>
                        <p>Don't have account yet? <a href="{!! route('register') !!}">Sign Up</a> now!</p>
                    </form>
                </div>
            </div>
        </center>

        @include('layouts.bebas_scripts')

        
        <script>
            $(document).ready(function(){

                $('#card_login').hide();

            });

            function loginform(){

                $('#card_login').toggle('puff','fast');

            }

            function gohome(){

                var home = '{{ url('/home') }}';
                window.location.replace(home);

            }
        </script>
    </body>
</html>
