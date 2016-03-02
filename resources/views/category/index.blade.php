@extends('layouts.content')
@section('title', 'Trang thông tin rao vặt Bán lại | Rao vặt toàn quốc')

@section('header')
    @include('view.header')
@stop
@section('banner')
    @include('view.banner')
@stop
@section('content')

<!-- Categories -->
	<!--Vertical Tab-->
	<div class="categories-section main-grid-border">
		<div class="container">
			<h2 class="head"><?php echo trans('category.category_main')?></h2>
			<div class="category-list">
				<div id="parentVerticalTab">
					<ul class="resp-tabs-list hor_1">
						<li><?php echo trans('category.category_mobile')?></li>
						<li><?php echo trans('category.category_electronic')?></li>
						<li><?php echo trans('category.category_car')?></li>
						<li><?php echo trans('category.category_bike')?></li>
						<li><?php echo trans('category.category_furniture')?></li>
						<li><?php echo trans('category.category_pet')?></li>
						<li><?php echo trans('category.category_book')?></li>
						<li><?php echo trans('category.category_fashion')?></li>
						<li><?php echo trans('category.category_kid')?></li>
						<li><?php echo trans('category.category_service')?></li>
						<li><?php echo trans('category.category_job')?></li>
						<li><?php echo trans('category.category_real')?></li>
						<a href="all-classifieds.html"><?php echo trans('category.category_ad')?></a>
					</ul>
					<div class="resp-tabs-container hor_1">
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong><?php echo trans('subcat.subcat_allusa')?></strong> <?php echo trans('subcat.subcat_city')?></span>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat1.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('subcat.subcat_mobile')?></h4>
									<span>5,12,850 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="mobiles.html"><?php echo trans('subcat.subcat_mobilephone')?></a></li>
									<li><a href="mobiles.html"><?php echo trans('subcat.subcat_tablet')?></a></li>
									<li><a href="mobiles.html"><?php echo trans('subcat.subcat_acc')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat2.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_electronic')?></h4>
									<span>2,01,850 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="electronics-appliances.html"><?php echo trans('subcat.subcat_com')?></a></li>
									<li><a href="electronics-appliances.html"><?php echo trans('subcat.subcat_tv')?></a></li>
									<li><a href="electronics-appliances.html"><?php echo trans('subcat.subcat_cam')?></a></li>
									<li><a href="electronics-appliances.html"><?php echo trans('subcat.subcat_game')?></a></li>
									<li><a href="electronics-appliances.html"><?php echo trans('subcat.subcat_frid')?></a></li>
									<li><a href="electronics-appliances.html"><?php echo trans('subcat.subcat_kit')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat3.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_car')?></h4>
									<span>1,98,080 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="cars.html"><?php echo trans('subcat.subcat_comm')?></a></li>
									<li><a href="cars.html"><?php echo trans('subcat.subcat_oth')?></a></li>
									<li><a href="cars.html"><?php echo trans('subcat.subcat_spare')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat4.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_bike')?></h4>
									<span>6,17,568 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="bikes.html"><?php echo trans('subcat.subcat_moto')?></a></li>
									<li><a href="bikes.html"><?php echo trans('subcat.subcat_scot')?></a></li>
									<li><a href="bikes.html"><?php echo trans('subcat.subcat_bicy')?></a></li>
									<li><a href="bikes.html"><?php echo trans('subcat.subcat_spare')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat5.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_furniture')?></h4>
									<span>1,05,168 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="furnitures.html"><?php echo trans('subcat.subcat_sofa')?></a></li>
									<li><a href="furnitures.html"><?php echo trans('subcat.subcat_bed')?></a></li>
									<li><a href="furnitures.html"><?php echo trans('subcat.subcat_home')?></a></li>
									<li><a href="furnitures.html"><?php echo trans('subcat.subcat_other')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat6.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_pet')?></h4>
									<span>1,77,816 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="pets.html"><?php echo trans('subcat.subcat_dog')?></a></li>
									<li><a href="pets.html"><?php echo trans('subcat.subcat_ca')?></a></li>
									<li><a href="pets.html"><?php echo trans('subcat.subcat_pk')?></a></li>
									<li><a href="pets.html"><?php echo trans('subcat.subcat_tn')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat7.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_book')?></h4>
									<span>9,58,458 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="books-sports-hobbies.html"><?php echo trans('subcat.subcat_book')?></a></li>
									<li><a href="books-sports-hobbies.html"><?php echo trans('subcat.subcat_music')?></a></li>
									<li><a href="books-sports-hobbies.html"><?php echo trans('subcat.subcat_sport')?></a></li>
									<li><a href="books-sports-hobbies.html"><?php echo trans('subcat.subcat_gym')?></a></li>
									<li><a href="books-sports-hobbies.html"><?php echo trans('subcat.subcat_hobbi')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat8.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_fashion')?></h4>
									<span>3,52,345 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="fashion.html"><?php echo trans('subcat.subcat_clothe')?></a></li>
									<li><a href="fashion.html"><?php echo trans('subcat.subcat_wear')?></a></li>
									<li><a href="fashion.html"><?php echo trans('subcat.subcat_access')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat9.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_kid')?></h4>
									<span>8,45,298 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="kids.html"><?php echo trans('subcat.subcat_doss')?></a></li>
									<li><a href="kids.html"><?php echo trans('subcat.subcat_xtd')?></a></li>
									<li><a href="kids.html"><?php echo trans('subcat.subcat_ddk')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat10.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_service')?></h4>
									<span>7,58,867 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="services.html"><?php echo trans('subcat.subcat_edu')?></a></li>
									<li><a href="services.html"><?php echo trans('subcat.subcat_web')?></a></li>
									<li><a href="services.html"><?php echo trans('subcat.subcat_computer')?></a></li>
									<li><a href="services.html"><?php echo trans('subcat.subcat_osin')?></a></li>
									<li><a href="services.html"><?php echo trans('subcat.subcat_spa')?></a></li>
									<li><a href="services.html"><?php echo trans('subcat.subcat_vanchuyen')?></a></li>
									<li><a href="services.html"><?php echo trans('subcat.subcat_driver')?></a></li>
									<li><a href="services.html"><?php echo trans('subcat.subcat_sukien')?></a></li>
									<li><a href="services.html"><?php echo trans('subcat.subcat_dvk')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat11.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_job')?></h4>
									<span>5,74,547 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_cskh')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_it')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_online')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_online')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_pa')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_sale')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_admin')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_nhansu')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_giaovien')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_hotel')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_kt')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_ctm')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_p-time')?></a></li>
									<li><a href="jobs.html"><?php echo trans('subcat.subcat_vieck')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="images/cat12.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo trans('category.category_real')?></h4>
									<span>98,156 <?php echo trans('subcat.subcat_ads')?></span>
									<a href="all-classifieds.html"><?php echo trans('subcat.subcat_allads')?></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<li><a href="real-estate.html"><?php echo trans('subcat.subcat_nhao')?></a></li>
									<li><a href="real-estate.html"><?php echo trans('subcat.subcat_canh')?></a></li>
									<li><a href="real-estate.html"><?php echo trans('subcat.subcat_phongt')?></a></li>
									<li><a href="real-estate.html"><?php echo trans('subcat.subcat_datd')?></a></li>
									<li><a href="real-estate.html"><?php echo trans('subcat.subcat_cuah')?></a></li>
									<li><a href="real-estate.html"><?php echo trans('subcat.subcat_nhan')?></a></li>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--Plug-in Initialisation-->
	<script type="text/javascript">
    $(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
	<!-- //Categories -->

@stop

@section('footer')
    @include('view.footer')
@stop