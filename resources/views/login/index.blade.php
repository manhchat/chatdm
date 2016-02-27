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
					<form>
						<div class="log-input">
							<div class="log-input-left">
								<input type="text" class="user" value="<?php echo trans('login.login_your_email')?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo trans('login.login_your_email')?>';}"/>
							</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span>
							<div class="clearfix"> </div>
						</div>
						<div class="log-input">
							<div class="log-input-left">
								<input type="password" class="lock" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
							</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span>
							<div class="clearfix"> </div>
						</div>
						<input type="submit" value="Log in">
					</form>
				</div>
				<div class="new_people">
					<h2>For New People</h2>
					<p>Having hands on experience in creating innovative designs,I do offer design
						solutions which harness.</p>
					<a href="register.html">Register Now!</a>
				</div>
			</div>
		</div>
	</div>

@stop

@section('footer')
	@include('view.footer-login')
@stop
</section>