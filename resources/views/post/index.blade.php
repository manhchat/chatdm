@extends('layouts.content')
@section('title', 'Trang thông tin rao vặt Bán lại | Rao vặt toàn quốc')

@section('header')
    @include('view.header')
@stop
@section('banner')
    @include('view.banner')
@stop
@section('content')

<!-- Submit Ad -->
<div class="submit-ad main-grid-border">
	<div class="container">
		<h2 class="head">Post an Ad</h2>
		<div class="post-ad-form">
			<form>
				<label class="post-label">Select Category <span>*</span></label>
				<select class="">
				  <option>Select Category</option>
				  <option>Mobiles</option>
				  <option>Electronics and Appliances</option>
				  <option>Cars</option>
				  <option>Bikes</option>
				  <option>Furniture</option>
				  <option>Pets</option>
				  <option>Books, Sports and hobbies</option>
				  <option>Fashion</option>
				  <option>Kids</option>
				  <option>Services</option>
				  <option>Real, Estate</option>
				</select>
				<div class="clearfix"></div>
				<label class="post-label">Ad Title <span>*</span></label>
				<input type="text" class="phone post-text" placeholder="">
				<div class="clearfix"></div>
				<label class="post-label">Ad Description <span>*</span></label>
				<textarea class="mess" placeholder="Write few lines about your product"></textarea>
				<div class="clearfix"></div>
			<div class="upload-ad-photos">
			<label class="post-label">Photos for your ad :</label>	
				<div class="photos-upload-view">
					<form id="upload" action="index.html" method="POST" enctype="multipart/form-data">

					<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

					<div>
						<input type="file" id="fileselect" name="fileselect[]" class="filestyle" data-iconName="glyphicon glyphicon-inbox" data-buttonText="Chọn file để tải lên" multiple="multiple" />
						<div id="filedrag">or drop files here</div>
					</div>

					<div id="submitbutton">
						<button type="submit">Upload Files</button>
					</div>

					</form>

					<div id="messages">
					<p>Status Messages</p>
					</div>
					</div>
				<div class="clearfix"></div>
					<script src="js/filedrag.js"></script>
			</div>
				<div class="personal-details">
				<form>
					<label class="post-label">Your Name <span>*</span></label>
					<input type="text" class="name post-text" placeholder="">
					<div class="clearfix"></div>
					<label class="post-label">Your Mobile No <span>*</span></label>
					<input type="text" class="phone post-text" placeholder="">
					<div class="clearfix"></div>
					<label class="post-label">Your Email Address<span>*</span></label>
					<input type="text" class="email post-text" placeholder="">
					<div class="clearfix"></div>
					<p class="post-terms">By clicking <strong>post Button</strong> you accept our <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a></p>
				<input type="submit" value="Post">					
				<div class="clearfix"></div>
				</form>
				</div>
		</div>
	</div>	
</div>
<!-- // Submit Ad -->

@stop

@section('footer')
    @include('view.footer')
@stop