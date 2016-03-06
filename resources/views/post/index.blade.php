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
			<?php echo Form::open(array('url' => url('post/create')))?>
				<label class="post-label"><?php echo trans('post.select_category')?> <span>*</span></label>
				<div id="category_append"><?php echo Form::select('category', $listCategory,'', array('id' => 'category'))?></div>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_title_of_ad')?> <span>*</span></label>
				<?php echo Form::text('title', old('title'), array('class' => 'phone post-text', 'placeholder' => trans('post.create_title_placeholder')))?>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_description_of_ad')?> <span>*</span></label>
				<?php echo Form::textarea('description', old('description'), array('class' => 'mess', 'placeholder' => trans('post.create_description_placeholder')))?>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_price')?> <span>*</span></label>
				<?php echo Form::text('price', old('price'), array('class' => 'price post-text', 'placeholder' => trans('post.create_price')))?>
				<div class="clearfix"></div>
				<div class="upload-ad-photos">
				<label class="post-label"><?php echo trans('post.create_image')?> :</label>	
					<div class="photos-upload-view">
						<?php echo Form::hidden('MAX_FILE_SIZE', '300000', array('id' => 'MAX_FILE_SIZE'))?>
						<div>
							<?php echo Form::file('fileselect[]', array('id' => 'fileselect', 'class' => 'filestyle', 'data-iconName' => 'glyphicon glyphicon-inbox', 'data-buttonText' => trans('post.upload_btn'), 'multiple' => 'multiple'))?>
							<div id="filedrag"><?php echo trans('post.create_image_drop')?></div>
						</div>
	
						<div id="submitbutton">
							<button type="submit"><?php echo trans('post.create_btn_upload')?></button>
						</div>
	
	
						<div id="messages">
						<p>Status Messages</p>
						</div>
						</div>
					<div class="clearfix"></div>
						<script src="<?php echo asset('js/filedrag.js')?>"></script>
				</div>
			<div class="personal-details">
				<label class="post-label"><?php echo trans('post.create_your_name')?> <span>*</span></label>
				<?php echo Form::text('name', old('name'), array('class' => 'name post-text', 'placeholder' => trans('post.create_your_name_placeholder')))?>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_your_mobile')?> <span>*</span></label>
				<?php echo Form::text('name', old('phone'), array('class' => 'phone post-text', 'placeholder' => trans('post.create_your_phone_placeholder')))?>
				<div class="clearfix"></div>
				<label class="post-label"><?php echo trans('post.create_your_email')?><span>*</span></label>
				<?php echo Form::text('name', old('email'), array('class' => 'email post-text', 'placeholder' => trans('post.create_your_email_placeholder')))?>
				<div class="clearfix"></div>
				<p class="post-terms"><?php echo trans('post.create_term')?></p>
				<input type="submit" value="<?php echo trans('post.create')?>">			
				</div>		
			<div class="clearfix"></div>
			</form>
			</div>
		</div>
	</div>	
<!-- // Submit Ad -->

@stop

@section('footer')
    @include('view.footer')
@stop