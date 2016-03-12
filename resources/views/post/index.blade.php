@extends('layouts.content')
@section('title', 'Trang thông tin rao vặt Bán lại | Rao vặt toàn quốc')

@section('header')
    @include('view.header')
@stop
@section('banner')
    @include('view.banner')
@stop
@section('content')
<script src="<?php echo asset('js/front/post.js')?>"></script>
<!-- Submit Ad -->
<div class="submit-ad main-grid-border">
	<div class="container">
		<h2 class="head"><?php echo trans('post.create_title')?></h2>
		<div class="post-ad-form">
			<div id="error_area"></div>
			<?php $classError = ''?>
			@if ($errors->has())
			<?php $classError = ' error'?>
		        <div class="alert alert-danger">
		            @foreach ($errors->all() as $error)
		                {{ $error }}<br>        
		            @endforeach
		        </div>
	        @endif
			<?php echo Form::open(array('url' => url('post/create'), 'id' => 'postForm'))?>
				<label class="post-label"><?php echo trans('post.select_category')?> <span>*</span></label>
				<?php echo Form::select('category', $listCategory, old('category'), array('id' => 'category', 'class' => 'selectpicker', 'data-live-search' => 'true', 'data-style' => 'btn-success', 'data-dropup-auto' => 'false'))?>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.select_address')?> <span>*</span></label>
				<?php echo Form::select('address_id', $dataTinhThanh, old('address_id'), array('id' => 'address_id', 'class' => 'selectpicker', 'data-live-search' => 'true', 'data-style' => 'btn-success', 'data-dropup-auto' => 'false'))?>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_title_of_ad')?> <span>*</span></label>
				<div><?php echo Form::text('title', old('title'), array('class' => 'phone post-text'. $errors->first('title', ' error'), 'placeholder' => trans('post.create_title_placeholder'), 'maxlength' => 200))?></div>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_description_of_ad')?> <span>*</span></label>
				<?php echo Form::textarea('description', old('description'), array('class' => 'ckeditor mess'.$classError, 'placeholder' => trans('post.create_description_placeholder')))?>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_price')?> <span>*</span></label>
				<?php echo Form::text('price', old('price'), array('class' => 'price post-text'. $errors->first('price', ' error'), 'placeholder' => trans('post.create_price'), 'maxlength' => 200))?>
				<div class="clearfix"></div>
				<div class="upload-ad-photos">
				<label class="post-label"><?php echo trans('post.create_image')?> :</label>	
					<div class="photos-upload-view">
						<div class="dropzone"></div>
	
						</div>
					<div class="clearfix"></div>
				</div>
				<div id="dropzone_value"></div>
			<div class="personal-details">
				<label class="post-label"><?php echo trans('post.create_your_name')?> <span>*</span></label>
				<?php echo Form::text('name', $errors->has() || $user == null ? old('name') : $user->user_name, array('class' => 'name post-text'. $errors->first('name', ' error'), 'placeholder' => trans('post.create_your_name_placeholder'), 'maxlength' => 100))?>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_your_mobile')?> <span>*</span></label>
				<?php echo Form::text('phone', $errors->has() || $user == null ? old('phone') : $user->phone, array('class' => 'phone post-text'. $errors->first('phone', ' error'), 'placeholder' => trans('post.create_your_phone_placeholder'), 'maxlength' => 11))?>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_your_email')?><span>*</span></label>
				<?php echo Form::text('email', $errors->has() || $user == null ? old('email') : $user->email, array('class' => 'email post-text'. $errors->first('email', ' error'), 'id' => 'email', 'placeholder' => trans('post.create_your_email_placeholder'), 'maxlength' => 100))?>
				<div class="clearfix"></div>
				<p class="post-terms"><?php echo trans('post.create_term')?></p>
				<input type="submit" id="btnPost" value="<?php echo trans('post.create')?>">			
				</div>		
			<div class="clearfix"></div>
			<?php echo Form::close()?>
			</div>
		</div>
	</div>	
<!-- // Submit Ad -->
	<!-- Dropzone Preview Template -->
    <div id="preview-template" style="display: none;">

        <div class="dz-preview dz-file-preview">
            <div class="dz-image"><img data-dz-thumbnail=""></div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

            <div class="dz-error-mark">
                <img alt="" src="<?php echo asset('images/err.png')?>">
            </div>

        </div>
    </div>
    <!-- End Dropzone Preview Template -->
@stop

@section('footer')
    @include('view.footer')
@stop