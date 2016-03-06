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
						<h1>Chúc mừng bạn đã Đăng ký thành công</h1>
						<p class="creating">Để hoàn tất việc đăng ký hãy kiểm tra Email và xác nhận tài khoản bạn vừa tạo ! Nếu không nhận được Email kích hoạt tài khoản hãy kiểm tra trong Mục SPAM hoặc liên hệ với chúng tôi theo địa chỉ Email: chatdm@fsoft.com.vn</p>
						<p align = "center"><font color = "blue"><i>Bán lại là Bán lãi</i></font></p>
					</div>
				</div>
			</div>

@stop

@section('footer')
	@include('view.footer-login')
@stop

</section>