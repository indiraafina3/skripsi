<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url()."/assets/";?>images/icons/favicon2.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."/assets/";?>css/main.css">
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/ckeditor/ckeditor.js"></script>
<!--===============================================================================================-->
</head>
<body class="animsition">
		<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="https://www.instagram.com/delciahandyscraft/" class="topbar-social-item fa fa-facebook"></a>
					<a href="https://www.facebook.com/Delcia-Handyscraft-327732091006717/" class="topbar-social-item fa fa-instagram"></a>
				</div>
				<span class="topbar-child1">
					Tempat belanja kerajinan tangan terbaik!
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						merrymaybeth09@gmail.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="<?php echo base_url()."Produk/katalog";?>" class="logo">
					<img src="<?php echo base_url()."/assets/";?>images/icons/logo2.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">

							<?php if ($this->session->userdata('akses_level') == 'admin') {?>
								<li>
								<a href="<?php echo base_url()."Produk/katalog1";?>">Katalog</a>
							</li>
							<?php } 
							else{
							?>
							<li>
								<a href="<?php echo base_url()."Produk/katalog";?>">Katalog</a>
							</li>
							<?php }?>
							<?php if ($this->session->userdata('akses_level') !== 'admin') {
								?>
							<li>
								<a href="<?php echo base_url()."Transaksi/checkout";?>">Checkout</a>
							</li>
							<?php } 
							else{}
							?>
							<?php if ($this->session->userdata('nama')) { ?>
							<li>
								<a href="<?php echo base_url()."Transaksi/lihat";?>">Transaction</a>
							</li>
						<?php }
						else{} ?>
<!-- 							disini profile -->
						</ul>
					</nav>
				</div>
						<?php if ($this->session->userdata('akses_level') !== 'admin') {
								?>
						<li>
							<div class="search-product pos-relative">
								<form method="POST" action="<?php echo base_url()."Produk/cari";?>">
								<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="keyword" placeholder="Search product...">
							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" type="submit">
								</form>
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
							</li>
						<?php }else{} ?>
				<!-- Header Icon -->
				<div class="header-icons">
					
						<?php if ($this->session->userdata('akses_level') == 'pelanggan') {
									$id_user = $this->session->userdata('id_user');
								?>
								<li>
								<a style="font-size: 14px; color: black;" href="<?php echo base_url().'Akun/detail/'.$id_user?>"><img src="<?php echo base_url()."/assets/";?>images/icons/face.png" alt="ICON"></a>
							</li>
						<?php }else{} ?>
					<span class="linedivide1"></span>
					<div class="header-wrapicon2">
						<?php $cart=$this->cart->contents(); ?>
						<?php if ($this->session->userdata('akses_level') !== 'admin') {?>
						<img src="<?php echo base_url()."/assets/";?>images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<!-- <span class="header-icons-noti"></span> -->
						<?php }else{} ?>
						<!-- Header cart noti -->
						<div id="result">
						<div class="header-cart header-dropdown" id="cart-details">
							<ul class="header-cart-wrapitem">
								<?php if (empty($cart)) {
									echo "Belum ada belanjaan!";
								}
								else{
									foreach ($cart as $cart) {
									$id = $cart['id'];
									$produknya = $this->model_produk->get_detail($id);	
								?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url()."/uploads/".$produknya->gambar1?>" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											<?php echo $cart['name']; ?>
										</a>

										<span class="header-cart-item-info">
											<?php echo $cart['qty']; ?> x Rp. <?php echo number_format($cart['price'],'0',',','.'); ?> = Rp. <?php echo number_format($cart['subtotal'],'0',',','.'); ?>
										</span>
									</div>
								</li>

								<?php }} ?>
							</ul>

							<div class="header-cart-total">
								Total = Rp. <?php $keranjang1=$this->cart->total(); ?><?php echo number_format($keranjang1,'0',',','.'); ?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<?php if ($this->session->userdata('akses_level') !== 'admin') {
								?>
									<a href="<?php echo base_url()."Transaksi/checkout";?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
					</div>
										<span class="linedivide1"></span>

					<?php if ($this->session->userdata('nama')) { ?>
				<a href="<?php echo base_url()."Akun/logout";?>"><img src="<?php echo base_url()."/assets/";?>images/icons/exit.png" alt="ICON"></a>
			<?php }else{ ?>
				<a class="button" href="<?php echo base_url()."Akun/login";?>">login</a>
			<?php }?>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="<?php echo base_url()."Produk/katalog";?>" class="logo-mobile">
				<img src="<?php echo base_url()."/assets/";?>images/icons/logo2.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<div class="header-wrapicon2">
						<?php $cart=$this->cart->contents(); ?>
						<?php if ($this->session->userdata('akses_level') !== 'admin') {?>
						<img src="<?php echo base_url()."/assets/";?>images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<!-- <span id="noti1" class="header-icons-noti"></span> -->
						<?php }else{} ?>
							
						<!-- Header cart noti -->
						<div id="result1">
						<div class="header-cart header-dropdown" id="cart-details1">
							<ul class="header-cart-wrapitem">
								<?php if (empty($cart)) {
									echo "Belum ada belanjaan!";
								}
								else{
									foreach ($cart as $cart) {
									$id_produk = $cart['id'];
									$produknya = $this->model_produk->get_detail($id_produk);
									
								?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url()."uploads/".$produknya->gambar1?>">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											<?php echo $cart['name']; ?>
										</a>

										<span class="header-cart-item-info">
											<?php echo $cart['qty']; ?> x <?php echo number_format($cart['price'],'0',',','.'); ?> = <?php echo number_format($cart['subtotal'],'0',',','.'); ?>
										</span>
									</div>
								</li>
								<?php }} ?>
							</ul>

							<div class="header-cart-total">
								Total = Rp. <?php $keranjang1=$this->cart->total(); ?><?php echo number_format($keranjang1,'0',',','.'); ?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<?php if ($this->session->userdata('akses_level') !== 'admin') {
								?>
									<a href="<?php echo base_url()."Transaksi/checkout";?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									<?php } ?>
									</a>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
					<span class="linedivide2"></span>
				<?php if ($this->session->userdata('nama')) { ?>
				<a href="<?php echo base_url()."Akun/logout";?>"><img src="<?php echo base_url()."/assets/";?>images/icons/exit.png" alt="ICON"></a>
			<?php }else{ ?>
				<a class="button" href="<?php echo base_url()."Akun/login";?>">login</a>
			<?php }?>
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-1-20 p-t-8 p-b-8">
						<span class="topbar-child1">
								<div class="search-product pos-relative">
								<form method="POST" action="<?php echo base_url()."Produk/cari";?>">
								<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="keyword" placeholder="Search product...">
							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" type="submit">
								</form>
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
						</span>
					</li>
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Tempat belanja kerajinan tangan terbaik!
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								merrymaybeth09@gmail.com
							</span>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
						</div>
					</li>

					<?php if ($this->session->userdata('akses_level') == 'admin') {?>
								<li class="item-menu-mobile">
								<a href="<?php echo base_url()."Produk/katalog1";?>">Katalog</a>
							</li>
							<?php } 
							else{
							?>
							<li class="item-menu-mobile">
								<a href="<?php echo base_url()."Produk/katalog";?>">Katalog</a>
							</li>
							<?php }?>
							<?php if ($this->session->userdata('akses_level') !== 'admin') {?>
							<li class="item-menu-mobile">
								<a href="<?php echo base_url()."Transaksi/checkout";?>">Checkout</a>
							</li>
							<?php } 
							else{}
							?>
							<?php if ($this->session->userdata('nama')) { ?>
							<li class="item-menu-mobile">
								<a href="<?php echo base_url()."Transaksi/lihat";?>">Transaction</a>
							</li>
						<?php }
						else{} ?>
							<?php if ($this->session->userdata('akses_level') == 'pelanggan') {
									$id_user = $this->session->userdata('id_user');
								?>
								<li class="item-menu-mobile">
								<a href="<?php echo base_url().'Akun/detail/'.$id_user?>">Profile</a>
							</li>
						<?php }else{} ?>
				</ul>
			</nav>
		</div>
	</header>