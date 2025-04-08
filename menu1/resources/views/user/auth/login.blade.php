@extends('user/auth/layout')
@section('page_title','User - Login')
@section('container') 
    <div class="container mt-0">
		<div class="row align-items-center justify-contain-center">
			<div class="col-xl-12 mt-5">
				<div class="card border-0">
					<div class="card-body login-bx">
						<div class="row  mt-5">
							<div class="col-xl-8 col-md-6 sign text-center">
								<div>
									<img src="{{asset('user/assets/images/login-img/loginlogo1.png')}}" class="food-img h-75" alt="">
								</div>	
							</div>
							<div class="col-xl-4 col-md-6 pe-0" style="margin-top:10%;">
								<div class="sign-in-your">
									<div class="text-center mb-3">
										<img src="{{asset('user/assets/images/logo-full.png')}}" class="mb-3" alt="">
										<h4 class="fs-20 font-w800 text-black">Login an Account</h4>
										<span class="dlab-sign-up">Sign In</span>
									</div>
									<!-- <form action="https://fooddesk.dexignlab.com/codeigniter/demo/index">
										<div class="mb-3">
											<label class="mb-1"><strong>Email Address</strong></label>
											<input type="email" class="form-control" value="hello@example.com">
										</div>
										<div class="mb-3">
											<label class="mb-1"><strong>Password</strong></label>
											<input type="password" class="form-control" value="Password">
										</div>
										<div class="row d-flex justify-content-between mt-4 mb-2">
											<div class="mb-3">
												<a href="page-forgot-password.html">Forgot Password?</a>
											</div>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-primary btn-block shadow">Login</button>
										</div>
									</form> -->
                                    <livewire:user.auth.login />
									<div class="text-center my-3">
										<span class="dlab-sign-up style-1">continue With</span>
									</div>
									<!-- <div class="mb-3 dlab-signup-icon">
										<button class="btn btn-outline-light"><i class="fa-brands fa-facebook me-2 facebook"></i>Facebook</button>
										<button class="btn btn-outline-light"><i class="fa-brands fa-google me-2 google"></i>Google</button>
										<button class="btn btn-outline-light mt-lg-0 mt-md-1 mt-sm-0 mt-1 linked-btn"><i class="fa-brands fa-linkedin me-2 likedin"></i>linkedin</button>
									</div> -->
									<div class="text-center">
										<span>You Have No Account?<a href="{{route('user.register')}}" class="text-primary"> Sign Up</a></span>
									</div>
										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


