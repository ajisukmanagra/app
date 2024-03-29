@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        #button {
            background-color: #2f3542;
            width: 100%;
            padding: 5px 0 10px 0;
        }

        #button {
            text-decoration: none;
            color: #ffffff;
            width: 100px;
            padding: 5px 10px;
            margin: 5px
        }
    </style>
</head>
<center>
    <body style="background-color: #1e90ff">
    <div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-6">
            <div class="card">
                <div class="card-header-circle"><img src="{{asset('unnamed.png')}}"><h1>Login</h1></div>


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right"></label>

                            <div class="col-md-8">
                                <input placeholder="E Mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right"></label>

                            <div class="col-md-8">
                                <input placeholder="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 
                        <div class="form-group row mb-1 ">
                            <div class="col-md-8 offset-md-5">
                               <button type="submit" class="btn btn-dark">      
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</center>
</body>
</html>
@endsection
