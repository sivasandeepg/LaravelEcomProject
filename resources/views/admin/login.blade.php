<!DOCTYPE html>
<html lang="en">

@include('partialsadmin.head')
 
<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="mb-3 f-w-400">Signin</h4>   
						<hr>
						<div class="alert alert-danger print-error-msg" style="display:none"></div>
			            <div class="alert alert-success print-error-msg1" style="display:none"></div>
						<hr> 
						<div class="form-group mb-3">
							<input type="text" class="form-control" name="email" id="email" placeholder="Email address">
						</div>
						<div class="form-group mb-4">
							<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						</div>
						<div class="custom-control custom-checkbox text-left mb-4 mt-2">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">Save credentials.</label>
						</div>
						<button id="login_submit" class="btn btn-block btn-primary mb-4">Signin</button> 
						<hr>
						<p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
						<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->

@include('partialsadmin.footer')

</body>

</html>
      
   
<script type="text/javascript">
$("#login_submit").click(function(e){
		e.preventDefault();
	//	$("#spinner_login").show();
        var credentials = {email :$("input[name='email']").val() , password: $("input[name='password']").val(),page :"ifinish" };
		//debugger;
		$.ajax({ 
			url: "auth/authadminlogin", 
			type: "post",
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			data: credentials , 
			success: function (response) {
    
				if(typeof response =='object' && response.Status == 'success') {

          $('.print-error-msg1').css('display', 'block')
						$('.print-error-msg1').html(response.message)
						setTimeout(function() {
							$('.print-error-msg1').hide()
						}, 2000) 
						window.location.href = response.url;
			   } else { 
          $('.print-error-msg').css('display', 'block')
						$('.print-error-msg').html(response.error)
						setTimeout(function() {
							$('.print-error-msg').hide()
						}, 2000)  
			   }
			},
				error: function(jqXHR, textStatus, error) {
					// debugger;
				 	event.preventDefault();
					
					
				} 

		});
    });
</script>  
