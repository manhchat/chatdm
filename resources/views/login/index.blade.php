@extends('layouts.master')
@section('title', 'Đăng nhập')

@section('header')
	@include('view.header')
@stop
@section('content')
<section>
	<div id="page-wrapper" class="sign-in-wrapper">
		<div class="graphs">
			<div class="sign-in-form">
				<div class="sign-in-form-top">
					<h1><?php echo trans('login.login_title')?></h1>
				</div>
				<div class="signin">
					<div class="signin-rit">
								<span class="checkbox1">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><?php echo trans('login.login_forgot_password')?></label>
								</span>
						<p><a href="#"><?php echo trans('login.login_click_here')?></a> </p>
						<div class="clearfix"> </div>
					</div>
					@if ($errors->has())
				        <div class="alert alert-danger">
				            @foreach ($errors->all() as $error)
				                {{ $error }}<br>        
				            @endforeach
				        </div>
			        @endif
					<?php echo Form::open(array('url' => url('login/logon')))?>
						<div class="log-input">
							<div class="log-input-left">
								<?php echo Form::text('email', old('email'), array('class' => 'user', 'placeholder' => trans('login.login_your_email')))?>
							</div>
<!-- 							<span class="checkbox2"> -->
<!-- 								 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label> -->
<!-- 							</span> -->
							<div class="clearfix"> </div>
						</div>
						<div class="log-input">
							<div class="log-input-left">
								<?php echo Form::password('password', array('class' => 'lock', 'placeholder' => trans('login.login_your_password')))?>
							</div>
<!-- 							<span class="checkbox2"> -->
<!-- 								 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label> -->
<!-- 							</span> -->
							<div class="clearfix"> </div>
						</div>
						<?php echo Form::submit(trans('login.login_your_login'));?>
					<?php echo Form::close()?>
				</div>
				<div class="new_people">
					<h2><?php echo trans('login.login_your_chuacotk')?></h2>
					<p><?php echo trans('login.login_your_content')?></p>
					<a href="<?php echo url('dang-ky')?>"><?php echo trans('login.login_your_dky')?></a>
				</div>
			</div>
		</div>
	</div>

@stop

@section('footer')
	@include('view.footer-login')
@stop
</section>