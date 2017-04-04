<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Diabeasy Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/auth/css/login.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" /> </head>
    <style>
        body.login {
            background-color: #F1F1F1 !important;
        }
    </style>
<body class=" login">
<div class="logo">
    <a href="index.html">
        <img style="width:300px; height:auto;" src="{{ asset('/diabeasy.png') }}" alt="" /> </a>
</div>
<div class="content">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('registered'))
        <div class="alert alert-success">
            <strong>Success!</strong> Registered user! You may now log in
            @php
                session(['registered' => false]);
            @endphp
        </div>
    @endif
    <div class="alert alert-info">
        <h4>Client Demo Login:</h4>
        <p><strong>Login:</strong> client@client.com</p>
        <p><strong>Password:</strong> password</p><br>
        <h4>Medical Professional Demo Login:</h4>
        <p><strong>Login:</strong> nurse@nurse.com</p>
        <p><strong>Password:</strong> password</p><br>
        <p>Registration also works!</p>
    </div>
    <form class="login-form" action="{{ url('/login') }}" method="post">
        <h3 class="form-title font-green">Sign In</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" /> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn green uppercase">Login</button>
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" />Remember
                <span></span>
            </label>
            <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
        </div>
        <div class="create-account">
            <p>
                <a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
            </p>
        </div>
    </form>
    <form class="register-form" action="{{ route('register') }}" method="post">
        <h3 class="font-green">Sign Up</h3>
        <p class="hint"> Enter your personal details below: </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">First Name</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="first-name" /> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Last Name</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="last-name" /> </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" /> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" /> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="password_confirmation" /> </div>
        <p class="hint"> Select Account Type (only here for demo): </p>
        <div class="form-group margin-top-20 margin-bottom-20">
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Account Type</label>
                <select name="type" class="form-control">
                    <option value="client">Client</option>
                    <option value="professional">Medical Professional</option>
                </select>
            </div>
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="tnc" /> I agree to the
                <a href="javascript:;">Terms of Service </a> &
                <a href="javascript:;">Privacy Policy </a>
                <span></span>
            </label>
            <div id="register_tnc_error"> </div>
        </div>
        <div class="form-actions">
            <button type="button" id="register-back-btn" class="btn green btn-outline">Back</button>
            <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
</div>
<!--[if lt IE 9]>
<script src="{{ asset('/layout/js/ie.js') }}"></script>
<![endif]-->
<script src="{{ asset('/auth/js/login.js') }}" type="text/javascript"></script>
</body>

</html>