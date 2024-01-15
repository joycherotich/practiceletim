<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Partners Portal</title>


    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">

    <link href="{{ asset('libs/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/imports.css') }}" rel="stylesheet">
    <link href="{{ asset('css/LineIcons.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/icons/font-awesome-old/css/font-awesome.min.css') }}" rel="stylesheet">

</head>

<body class="h-100 ">

    <span class="text-center" id="master_loader" style="display:none;z-index:99999!important;">
        <img src="{{asset('images/loading.gif')}}" alt="loader" style="max-height:40px; max-width:40px; top:50%; left:50%;z-index: 9999;position:fixed;" />
    </span>

    <div class="outer_layer justify-content-between">
        <div class="inner_layer">
            <div class="row">
                <div class=" col-xm-6 col-sm-6 col-md-2 col-lg-2 center-all login-labels"></div>
                <div class="col-md-2 col-md-8 col-lg-8"> </div>
                <div class="col-xm-6 col-sm-6 col-md-2 col-lg-2 center-all login-labels"> </div>
            </div>

        </div>
    </div>


    <div class="row fill-height">
        <div class="col-sm-5 col-md-5 col-l-5 login-left-side">
            <div class="overlay-images-welcome align-center color-1">


            </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-6 login-right-side">

            <div class="  auth-form fill-height">

                <div class="login_start_content"></div>
                <h4 class="text-center mb-4 "><img src="{{ asset('images/logo.png') }}" alt="INSTACASH" style="max-width:250px;max-height:200px;"></h4>

                <div align="center">  Web Account Sucurity </div> <br>
                <div class="row" align="left">

                    <div class="col-md-2">
                    </div>

                    <div class="col-md-10">                     

                        <div id="" class="">
                           

                            @if($mode==1 && $valid_token==true)
                            <span class="font-15 color4 fw-500 mb-5"> <u> <small>Step 2 of 2 : </small> Set you web password <br> </u></span><br>
                            @endif


                            @if($message && $valid_token==false)
                            <span class="font-15 error fw-500 mb-5"> <b> {{$message}}</b> <br> </span><br>
                            @endif

                            @if($valid_token==true)
                           
                                <div class="row" align="center">

                                    <div class="col-lg-6 mb-2" align="center">

                                        <form  id="set_password_form" name="set_password_form">
                                            <div class="form-group">
                                                <label class="text-label">Enter your new password</label>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="" required="">
                                                <input type="hidden" name="d3sk2aq5" id="d3sk2aq5" class="form-control"  value="{{@$vtoken}}">
                                                <input type="hidden" name="R1a3" id="R1a3" class="form-control"  value="{{@$user_id}}">
                                                <input type="hidden" name="Snhp" id="Snhp" class="form-control"  value="{{@$mode}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            </div>

                                            <div class="form-group">
                                                <label class="text-label">Re-enter your new password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="" required="">                                            
                                            </div>

                                            <div class="form-group mt-3">
                                            <button type="button" id="btn_save_password" class="btn btn-primary btn-block " onclick="save_password();">Save Password</button>
                                            </div>
                                        </form>
                                    </div>                                    

                                </div>

                                @endif
                        </div>

                    </div>


                </div>

                <br><br>
                <div class="form-row d-flex justify-content-between mt-4 mb-2 ml-2" align="center">



                    <div class="form-group mr-4 ">
                        <a href="{{ URL::to('/login') }}">Go to Login Page</a>
                    </div>                  

                    <div class="form-group mr-4 ">
                        <a href="#">Forgot Username?</a>
                    </div>


                </div>
            </div>


        </div>

    </div>
    <div class="authincation h-100 login-bg" style="display:none;">
        <br>
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('libs/global/global.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="{{ asset('js/imports.js') }}"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        //izitoast notifier
         function show_message(msg = " ", type = "1", l = "topRight") {

            $('#loading').hide();

            var title = "";
            var titleColor = "";

            if (type == 1) {
                //success
                title = '<b> <i class="flaticon-381-success-2"></i> </b>';
                titleColor = "green";

            } else if (type == 2) { // warning

                title = '<b>  <i class="flaticon-381-warning-1"></i> </b> ';
                titleColor = "#f2b305";

            } else if (type == 3) {
                title = '<b> <i class="flaticon-381-error"></i> </b>';
                titleColor = "red";
            } else {

            }

            iziToast.show({
                id: null,
                class: '',
                title: title,
                titleColor: titleColor,
                titleSize: '20',
                titleLineHeight: '',
                message: msg,
                messageColor: 'grey',
                messageSize: '15',
                messageLineHeight: '',
                backgroundColor: 'white',
                theme: 'light', // dark
                color: '', // blue, red, green, yellow
                icon: '',
                iconText: '',
                iconColor: '',
                image: '',
                imageWidth: 50,
                maxWidth: null,
                zindex: 9999,
                layout: 1,
                balloon: false,
                close: true,
                closeOnEscape: true,
                rtl: false,
                position: l, // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
                target: '',
                targetFirst: true,
                toastOnce: false,
                timeout: 10000,
                animateInside: true,
                drag: true,
                pauseOnHover: true,
                resetOnHover: false,
                progressBar: true,
                progressBarColor: titleColor,
                progressBarEasing: 'linear',
                overlay: false,
                overlayClose: true,
                overlayColor: 'white',
                transitionIn: 'bounceInLeft',
                transitionOut: 'flipOutX',
                transitionInMobile: 'fadeInUp',
                transitionOutMobile: 'fadeOutDown',
                buttons: {},
                inputs: {},
                onOpening: function() {},
                onOpened: function() {},
                onClosing: function() {},
                onClosed: function() {}
            });

        }

      

        function save_password() {

            var password = $('#set_password_form #password').val();
            var confirm_password = $('#set_password_form #confirm_password').val();

            if (confirm_password!=password) {
                show_message("Your re-entered password should match your password!", 2);
                return 1;
            }

            $('#btn_save_password').attr("disabled", true);
            $('#master_loader').show();

            var pdata = $("#set_password_form").serialize();

            $.ajax({
                type: 'POST',
                data: pdata,
                url: '<?php echo url("/do_set_password"); ?>',
                success: function(data) {

                    if (data.success) {

                        show_message(data.msg);   
                        setTimeout(to_login_page, 3000);

                    } else {
                        show_message(data.msg, 3);
                    }
                },
                error: function(data) {
                    show_message("An error occured. Try again later!", 3);
                    $('#btn_save_password').attr("disabled", false);
                },
                complete: function(data) {
                   
                    $('#master_loader').hide();
                }

            });

        } //close fxn

        function to_login_page(){
            var setpurl = "<?php echo url('/') ?>";
            window.location.replace(setpurl);
        } 


    </script>

</body>


</html>