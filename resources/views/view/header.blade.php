<?php $danhsachTinhThanh = Codedef::getID('TINH_THANH')?>
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
								<h4 class="modal-title" id="myModalLabel">Hãy chọn tỉnh thành phố mà bạn muốn xem tin rao vặt</h4>
							</div>
							<div class="modal-body">
								 <form class="form-horizontal" role="form">
									<div class="form-group">
										<select id="basic2" class="show-tick form-control">
											<optgroup label="Miền Bắc">
												<option selected style="display:none;color:#eee;">Chọn thành phố</option>
												<?php foreach ($danhsachTinhThanh['MIEN_BAC'] as $key => $value):?>
													<option value="<?php echo $key?>"><?php echo $value?></option>
												<?php endforeach;?>
											</optgroup>
											<optgroup label="Miền Trung">
												<?php foreach ($danhsachTinhThanh['MIEN_TRUNG'] as $key => $value):?>
													<option value="<?php echo $key?>"><?php echo $value?></option>
												<?php endforeach;?>
											</optgroup>
											<optgroup label="Miền Nam">
												<?php foreach ($danhsachTinhThanh['MIEN_NAM'] as $key => $value):?>
													<option value="<?php echo $key?>"><?php echo $value?></option>
												<?php endforeach;?>
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