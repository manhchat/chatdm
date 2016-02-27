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
						<div class="sign-u">
							<div class="sign-up1">
								<h4><?php echo trans('register.register_email')?></h4>
							</div>
							<div class="sign-up2">
								<form>
									<input type="text" placeholder=" " required=" "/>
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4><?php echo trans('register.register_pass')?></h4>
							</div>
							<div class="sign-up2">
								<form>
									<input type="password" placeholder=" " required=" "/>
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4><?php echo trans('register.register_cpass')?></h4>
							</div>
							<div class="sign-up2">
								<form>
									<input type="password" placeholder=" " required=" "/>
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sub_home">
							<div class="sub_home_left">
								<form>
									<input type="submit" value="<?php echo trans('register.register_create')?>">
								</form>
							</div>
							<div class="sub_home_right">
								<p><?php echo trans('register.register_gobackto')?><a href="index.html"><?php echo trans('register.register_home')?></a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>

@stop

@section('footer')
	@include('view.footer-login')
@stop

</section>