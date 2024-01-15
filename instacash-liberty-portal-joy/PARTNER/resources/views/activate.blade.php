<!-- <!DOCTYPE html>
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

                <div align="center"> Activate Your Web Account </div> <br>
                <div class="row" align="left">

                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10">
                        <div id="how_to_activate_view">

                            <h5> <u align="center"> How to Activate Your Web Account </u></h5>
                            <br>
                            <ul>
                                <li> <b>1.</b> Confirm your registered Instacash phone number. <br> <br> </li>
                                <li> <b>2.</b> Set your web account password.<br> <br> </li>
                            </ul>

                            <span class="color3"> Note : </span> <small> The web account is only for Instacash registered agents, billers and merchants.</small>

                            <button class="btn btn-primary btn-block mt-3" onclick="show_activation_form();"> Get Started Now </button>

                        </div>

                        <div id="how_to_activate_form" class="hidden">

                            <span class="font-15 color4 fw-500 mb-5"> <u> <small>Step 1 of 2 : </small> Confirm your Instacash phone number <br> </u></span><br>


                            <div id="request_code_view">
                                Enter your Instacash registered phone number <br>
                                <div class="row">

                                    <div class="col-lg-5 mb-2">
                                        <div class="form-group">
                                            <label class="text-label"></label>
                                            <input type="number" name="msisdn" id="msisdn" class="form-control" placeholder="Enter phone number" required>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2 ">
                                        <div class="form-group mt-3">
                                            <button type="button" id="btn_send_me_confirmation_code" class="btn btn-primary btn-block " onclick="send_me_confirmation_code();">Send me confirmation code</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="hidden" id="submit_code_view">
                            <b> <div id="code_expiry_counter" class="highlight bold"></div> </b> <br>
                                <div class="row">
                                   <div> Enter the confirmation code sent to your phone below :</div>
                                                                                                       
                                    <div class="col-lg-6 mb-2">
                                    
                                        <div class="form-group">
                                            <label class="text-label"></label>
                                            <input type="number" min="1000" max="9999" name="code" id="code" class="form-control" placeholder="enter code" required>
                                            <input type="hidden" name="msisdn" id="msisdn" class="form-control"  required>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2 ">
                                        <div class="form-group mt-3">
                                            <button type="button" id="btn_submit_confirmation_code" class="btn btn-primary btn-block " onclick="submit_confirmation_code();">Submit confirmation code</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>




                </div>

                <br><br>
                <div class="form-row d-flex justify-content-between mt-4 mb-2 ml-2" align="center">



                    <div class="form-group mr-4 ">
                        <a href="{{ URL::to('/login') }}">Go back to Login</a>
                    </div>

                    <div class="form-group mr-4 ">
                        <a href="{{ URL::to('/login') }}">Forgot Password?</a>
                    </div>

                    <div class="form-group mr-4 ">
                        <a href="#">Forgot Web User ID?</a>
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

        function show_activation_form() {
            $("#how_to_activate_view").hide();
            $("#how_to_activate_form").show();
        }

        function send_me_confirmation_code() {

            var msisdn = $('#request_code_view #msisdn').val();

            if (msisdn.length < 7) {
                show_message("Enter your valid Instacash registered phone number", 2);
                return 1;
            }

            $('#btn_send_me_confirmation_code').attr("disabled", true);
            $('#master_loader').show();

            var pdata = {
                msisdn: msisdn,
                _token: '<?php echo csrf_token() ?>'
            }

            $.ajax({
                type: 'POST',
                data: pdata,
                url: '<?php echo url("/send_me_confirmation_code"); ?>',
                success: function(data) {

                    if (data.success) {
                        show_message(data.msg);
                        //show                         
                        $('#request_code_view').hide();
                        $('#submit_code_view').show();
                        $('#submit_code_view #code_expiry_counter').html(data.counter);
                        $('#submit_code_view #msisdn').val(data.msisdn);
                        setInterval(run_counter, 1000);
                    } else {
                        show_message(data.msg, 3);
                    }
                },
                error: function(data) {
                    show_message("An error occured. Try again later!", 3);
                },
                complete: function(data) {
                    $('#btn_send_me_confirmation_code').attr("disabled", false);
                    $('#master_loader').hide();
                }

            });

        } //close fxn

        function run_counter() {

            var l = parseInt($("#code_expiry_counter").html());
            var n = l - 1;

            if (n > 2) {
               
                $("#code_expiry_counter").html(n + ' seconds');
            } else if (n <= 2) {
                $("#code_expiry_counter").html('Expired!');
                window.location.replace("<?php echo url('/activate'); ?>");
            }
        }


        function submit_confirmation_code() {

            var code = $('#submit_code_view #code').val();

            if (code.length!=4 ) {
                show_message("Enter the correct confirmation code", 2);
                return 1;
            }

            $('#btn_submit_confirmation_code').attr("disabled", true);
            $('#master_loader').show();

            var pdata = {
                code: code,
                msisdn: $('#submit_code_view #msisdn').val(),
                _token: '<?php echo csrf_token() ?>'
            }

            $.ajax({
                type: 'POST',
                data: pdata,
                url: '<?php echo url("/submit_confirmation_code"); ?>',
                success: function(data) {

                    if (data.success) {

                        show_message(data.msg);
                        $('#request_code_view').hide();
                        $('#submit_code_view').hide();
                        var setpurl = "<?php echo url('/set_password') . "?d3sk2aq5="; ?>" + data.vtoken+"&Snhp=1";
                        window.location.replace(setpurl);

                    } else {
                        show_message(data.msg, 3);
                    }
                },
                error: function(data) {
                    show_message("An error occured. Try again later!", 3);
                },
                complete: function(data) {
                    $('#btn_send_me_confirmation_code').attr("disabled", false);
                    $('#master_loader').hide();
                }

            });

        }
    </script>

</body>


</html> -->