@extends('layouts.master')
@section('title', 'Page Title')
@section('content')
	@if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif
	{{ Form::open(array('url' => 'login/logon')) }}
		<?php echo Form::text('username', 'chadm', array(
			'class' => 'form-control'
		))?>
		{{ Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control' ) ) }}
		<?php echo Form::submit('Login', array('class' => 'btn btn-primary'));?>
	{{ Form::close() }}
@stop