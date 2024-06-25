<!DOCTYPE html>
<html lang="en">

@include('partialsadmin.head')
 
<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="f-w-400">Sign up</h4>
						<hr> 
 
						<div class="alert alert-danger print-error-msg" style="display:none"></div>
		             	<div class="alert alert-success print-error-msg1" style="display:none"></div>

						<div class="form-group mb-3">
							<input type="text" name="name" class="form-control" id="name" placeholder="Username">
						</div>

						<div class="form-group mb-3">
							<input type="text" name="email" class="form-control" id="email" placeholder="Email address">
						</div>

						<div class="form-group mb-4">
							<input type="password" name="password" class="form-control" id="password" placeholder="Password">
						</div>

						<div class="form-group mb-3">
							<input type="date" name="dob" class="form-control" id="dob" placeholder="DoB">
						</div>

						<div class="form-group mb-3"> 
							<input type="text" name="gender" class="form-control" id="gender" placeholder="gender">
						</div>

						<div class="custom-control custom-checkbox  text-left mb-4 mt-2">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">Send me the <a href="#!"> Newsletter</a> weekly.</label>
						</div>
						<button  id="signup_submit"   class="btn btn-primary btn-block mb-4">Sign up</button>
						<hr>
						<p class="mb-2">Already have an account? <a href="auth-signin.html" class="f-w-400">Signin</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end --> 

<!-- Required Js -->
@include('partialsadmin.footer') 

</body>
</html>


<script type="text/javascript">
	$(document).ready(function() {

		$("#signup_submit").click(function(event) {
			event.preventDefault();

			// var language = [];
			// language = $("input[name='language']:checked").map(function() {
			// 	return this.value;
			// }).get().join(', ');
			
			          

			$.ajax({

				url: "/authadminregistration",
				type: "post",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}, 
				data: {
					name: $('#name').val(),
					email: $('#email').val(),
					dob: $('#dob').val(),
					gender: $('#gender').val(),
					password: $('#password').val(),
					// language: language
				},

				success: function(response) {
					if (response.status === 'error') {
						$('.print-error-msg').css('display', 'block')
						$('.print-error-msg').html(response.error)
						setTimeout(function() {
							$('.print-error-msg').hide()
						}, 2000)
					} else if (response.status === 'success') {
						$('.print-error-msg1').css('display', 'block')
						$('.print-error-msg1').html(response.message)
						setTimeout(function() {
							$('.print-error-msg1').hide()
						}, 2000)
					}
				},
				error: function(jqXHR, textStatus, error) {
					// debugger;
				 	event.preventDefault();
					
				}
			});

		});
	});
</script> 