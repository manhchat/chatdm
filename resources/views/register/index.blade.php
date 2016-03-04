@extends('layouts.master')
@section('title', 'Đăng ký')

@section('header')
	@include('view.header')
@stop
@section('content')
<section>

<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1><?php echo trans('register.register_title')?></h1>
						<p class="creating"><?php echo trans('register.register_content')?></p>
						<h2><?php echo trans('register.register_info')?></h2>
						@if ($errors->has())
					        <div class="alert alert-danger">
					            @foreach ($errors->all() as $error)
					                {{ $error }}<br>        
					            @endforeach
					        </div>
				        @endif
						<?php echo Form::open(array('url' => url('dang-ky/register')))?>
							<div class="sign-u">
								<div class="sign-up1">
									<h4><?php echo trans('register.register_email')?></h4>
								</div>
								<div class="sign-up2">
									<?php 
										echo Form::text('email', old('email'), array('placeholder' => trans('login.login_please_input_email'),))
									?>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4><?php echo trans('register.register_pass')?></h4>
								</div>
								<div class="sign-up2">
									<?php 
										echo Form::password('password', array('placeholder' => trans('login.login_please_input_password'),))
									?>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sign-u">
								<div class="sign-up1">
									<h4><?php echo trans('register.register_cpass')?></h4>
								</div>
								<div class="sign-up2">
									<?php 
										echo Form::password('password_confirmation', array('placeholder' => trans('login.login_please_input_password_again'),))
									?>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="sub_home">
								<div class="sub_home_left">
									<?php 
										echo Form::submit(trans('register.register_create'))
									?>
								</div>
								<div class="sub_home_right">
									<p><?php echo trans('register.register_gobackto')?><a href="<?php echo url('/')?>"><?php echo trans('register.register_home')?></a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php 
							echo Form::close();
						?>
					</div>
				</div>
			</div>

@stop

@section('footer')
	@include('view.footer-login')
@stop

</section>