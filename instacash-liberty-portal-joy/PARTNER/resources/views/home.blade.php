<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Partners Portal</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('libs/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/imports.css') }}" rel="stylesheet">
    <link href="{{ asset('css/LineIcons.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icons/font-awesome-old/css/font-awesome.min.css') }}" rel="stylesheet">

    <style>
        body {
            height: 50%;
        }

        #master_loader {
            display: none;
            z-index: 99999 !important;
        }

        .outer_layer {
            display: flex;
            justify-content: space-between;
        }

        .inner_layer {
            width: 100%;
        }

        .row.fill-height {
            height: 100%;
        }

        .login-left-side {
            /* Add your styles for the left side */
        }

        .login-right-side {
            /* Add your styles for the right side */
        }

        .auth-form {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body class="h-100">
<!-- 
    <span class="text-center" id="master_loader">
        <img src="{{ asset('images/loading.gif') }}" alt="loader" style="max-height: 40px; max-width: 40px; top: 50%; left: 50%; z-index: 9999; position: fixed;" />
    </span> -->

    <div class="outer_layer justify-content-between">
        <div class="inner_layer">
            <div class="row">
                <div class="col-xm-6 col-sm-6 col-md-2 col-lg-2 center-all login-labels"></div>
                <div class="col-md-2 col-md-8 col-lg-8"></div>
                <div class="col-xm-6 col-sm-6 col-md-2 col-lg-2 center-all login-labels"></div>
            </div>
        </div>
    </div>

    <div class="row fill-height">
        <div class="col-sm-5 col-md-5 col-l-5 login-left-side">
            <!-- Add your welcome content or images here -->
        </div>

        <div class="col-sm-4 col-md-4 col-lg-4 login-right-side">
            <div class="auth-form fill-height">
                <br>
                <h4 class="text-center mb-4"><img src="{{ asset('images/logo.png') }}" alt="INSTACASH" style="max-width: 250px; max-height: 200px;"></h4>
                <h5 class="text-center mb-4">Partners Portal</h5>

                <form id="login_form" name="login_form">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-primary btn-block" onclick="simulateLogin()">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function simulateLogin() {
    var email = document.forms["login_form"]["email"].value;
    var password = document.forms["login_form"]["password"].value;

    if (email === "liberty23@gmail.com" && password === "set4liberty") {
        // Redirect to the dashboard
        window.location.replace("<?php echo url('/dashboard'); ?>");
    } else {
        alert("Invalid email or password. Please try again.");
    }
}
    </script>

   
</body>

</html>
