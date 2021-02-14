	<title>Katalog</title>

	<!-- Judul -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					KATALOG
				</h3>
				<br><br>
<!-- 				<div class="row" style="float: right;"> -->
				<div class="container-table-cart pos-relative" style="float: right;">
				<a class="button flex-c-m size2 m-text2 w-size24" style="margin-left : 10px; color: white; background-color: #008CBA;" href="<?php echo base_url()."Produk/tambah";?>">ADD PRODUCT</a>
				</div>	
			</div>


			<!-- Product -->

	<section class="cart bgwhite">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-3 p-l-70">NO</th>
							<th class="column-3">PICTURE</th>
							<th class="column-2">PRODUCT NAME</th>
							<th class="column-4">PRICE</th>
							<th class="column-3">ACTION</th>
						</tr>
						<?php $i=1;
 						foreach ($produk as $prd) : ?>
						<tr class="table-row">
							<td class="column-3 p-l-70"><?php echo $i; ?></td>
							<td class="column-3">
								<div class="wrap-pic-w">
									<img src="<?php echo base_url().'/uploads/'.$prd->gambar1?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><a href="<?php echo base_url().'Produk/detail/'.$prd->id_produk;?>"><u><b><?php echo $prd->nama_produk; ?></b></u></a></td>
							<td class="column-4">Rp. <?php echo number_format($prd->harga,'0',',','.'); ?></td>
							<td class="column-3">	<div>
								<a style="font-size: 14px; color: black; padding-right: 10px;" href="<?php echo base_url().'Produk/edit/'.$prd->id_produk;?>"><img src="<?php echo base_url()."/assets/";?>images/icons/edit.png" alt="ICON"></a>
								<a onclick="return ConfirmDelete();" style="font-size: 14px; color: black;" href="<?php echo base_url().'Produk/hapus/'.$prd->id_produk;?>"><img src="<?php echo base_url()."/assets/";?>images/icons/delete.png" alt="ICON"></a>
								</div></td>
						</tr>
			<?php $i++; 
		endforeach; ?>
					</table>
				</div>
			</div>


				</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size26">
						Ada pertanyaan? Beritahu kami di toko JL. A. P. Pettarani 3 No. 18, Makassar, Sulawesi Selatan. Atau hubungi kami 081341315927/0411446606.
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					</div>
				</div>
			</div>

			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					TENTANG
				</h4>

				<div>
					<p class="s-text7 w-size23">
						Toko Delcia Handyscraft didirikan pada tahun 2017 sebuah toko kerajinan tangan yang berada di jalan Pettarani 3 No. 18, Makassar, Sulawesi Selatan, Indonesia. Berfokus pada berbagai kerajinan tangan dan kini masih berusaha untuk memperluas marketnya di daerah makassar.
					</p>

				</div>
			</div>

		</div>

		<div class="t-center p-l-15 p-r-15">
			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 All rights reserved. <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://indibaaa.carrd.co" target="_blank">indira</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()."/assets/";?>vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>    
<!--===============================================================================================-->
	<script src="<?php echo base_url()."/assets/";?>js/main.js"></script>

</body>
</html>
