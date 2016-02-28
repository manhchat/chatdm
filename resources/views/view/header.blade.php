<div class="header">
		<div class="container">
			<div class="logo">
				<a href="<?php echo url('')?>"><span>Bán</span>lại</a>
			</div>
			<div class="header-right">
			<?php if (!ClassesAuth::isAuth()) {?>
				<a class="account" href="<?php echo url('dang-nhap')?>">Tài khoản</a>
			<?php } else {?>
				<a class="account" href="<?php echo url('cai-dat-tai-khoan')?>">Quản lý tài khoản</a>
			<?php }?>
	<!-- Large modal -->
		<div class="selectregion">
			<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Chọn thành phố</button>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
				aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									&times;</button>
								<h4 class="modal-title" id="myModalLabel">Hãy chọn thành phố của bạn</h4>
							</div>
							<div class="modal-body">
								 <form class="form-horizontal" role="form">
									<div class="form-group">
										<select id="basic2" class="show-tick form-control" multiple>
											<optgroup label="Miền Bắc">
												<option selected style="display:none;color:#eee;">Chọn thành phố</option>
												<option>Hà Nội</option>
												<option>Hải Phòng</option>
												<option>Lào Cai</option>
												<option>Yên Bái</option>
											</optgroup>
											<optgroup label="Miền khác">
												<optgroup label="Miền Trung">
													<option>Huế</option>
													<option>Đà Nẵng</option>
													<option>Thanh Hóa</option>
													<option>Nghệ An</option>
												</optgroup>
												<optgroup label="Miền Nam">
													<option>TP Hồ Chí Minh</option>
													<option>Bình Dương</option>
													<option>Vũng Tàu</option>
													<option>Bạc Liêu</option>
													<option>Củ Chi</option>
												</optgroup>
											</optgroup>
										</select>
									</div>
								  </form>    
							</div>
						</div>
					</div>
				</div>
			<script>
			$('#myModal').modal('');
			</script>
		</div>
		<?php if (ClassesAuth::isAuth()):?>
			<a class="account logout" href="<?php echo url('dang-xuat')?>">Đăng xuất</a>
		<?php endif;?>
	</div>
	</div>
</div>