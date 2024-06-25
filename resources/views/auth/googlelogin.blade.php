<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     
    <link rel="icon" type="image/png" href="{{url('loginassets/images/icons/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/vendor/animsition/css/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('loginassets/css/main.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="limiter">  
        <div class="container-login100" style="background-image: url('{{url('loginassets/images/bg-01.jpg')}}')"> 
            <div class="wrap-login100">
                <!-- <form class="login100-form validate-form"> -->
                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>


                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>
  
					<div class="alert alert-danger" id="error" style="display: none;"></div>
					<div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                    <div class="alert alert-success" id="successAuth" style="display: none;"></div>

   
                    <div class="wrap-input100 validate-input" data-validate="Enter Mobile Number">
                        <input class="input100" type="text" id="number" name="number" placeholder="Mobile Number">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
					<div class="container-login100-form-btn">
                        <button class="login100-form-btn" onclick="sendOTP();"> Login</button>
                    </div>
					  
					<div id="recaptcha-container"></div>
               

                    <div class="wrap-input100 validate-input" data-validate="Enter OTP">
                        <input class="input100" type="text" id="verification" name="verification" placeholder="Enter OTP">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="sign-in-button" onclick="verify()"> Verify OTP</button>
                    </div> 
    
					 
                    <div class="text-center p-t-60">
                        <a class="txt1" href="#">Forgot Password?</a>
                        <br>
                        <!-- <a href="{{url('auth/gmail')}}" class="txt1">Login with Gmail</a> -->
                        <a href="{{ route('auth.google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                </a> 
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
</body>
</html>

<!-- Include Firebase SDK -->
 <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-auth.js"></script>    
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
        <!-- ajax -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        var firebaseConfig = {
          apiKey: "AIzaSyDO513NEoFThTYXz3aal2a5RhcqkGuA3Ao",
    authDomain: "sivasandeep-g.firebaseapp.com",
    projectId: "sivasandeep-g",
    storageBucket: "sivasandeep-g.appspot.com",
    messagingSenderId: "953764490341",
    appId: "1:953764490341:web:ba246f133105ea83d2ea8c",
    measurementId: "G-VZH52RK94H"  
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript">
        window.onload = function () {
            render();
        };
		   
        function render() {
			window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
             'size': 'invisible',
               'callback': (response) => {
               // reCAPTCHA solved, allow signInWithPhoneNumber.
                 onSignInSubmit();
                 }
                });
        } 
		 
		 
        function sendOTP() {
            var number = '+91'+$("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }
        function verify() {
            var code = $("#verification").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);
                $("#successOtpAuth").text("Verify is successful");
                $("#successOtpAuth").show();
            
            //    Make the AJAX call   
        $.ajax({
            type: 'POST',    
            url: '../firebasesave', // Use the named route  
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token for Laravel
            },
         
            data: { 
                mobile: $('#number').val(), 
                otp: $('#verification').val(),  
                  
				},
        }); 
          
        var phoneNumber = $("#number").val();     
        sessionStorage.setItem("phoneNumber", phoneNumber);
        //     window.location.href = 'home'; 
				
            }).catch(function (error) {
                $("#error").text(error.message); 
                $("#error").show();   
            });
        }
    </script>  

 

<script src="{{ url('loginassets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('loginassets/vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ url('loginassets/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ url('loginassets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('loginassets/vendor/select2/select2.min.js') }}"></script>
<script src="{{ url('loginassets/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ url('loginassets/vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ url('loginassets/vendor/countdowntime/countdowntime.js') }}"></script>
<script src="{{ url('loginassets/js/main.js') }}"></script>