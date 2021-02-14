
	<title>Katalog</title>

	<!-- Judul -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					KATALOG
				</h3>
			</div>

			<!-- Product -->

			<div class="row">
				
			<?php foreach ($produk as $prd) : ?>
				<div class="col-6 col-lg-3 p-b-50">
<!-- 									<div class="col-sm-12 col-md-6 col-lg-3 p-b-50"> -->
	
						<!-- Block2 -->
						<div class="block2">

							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo base_url().'uploads/'.$prd->gambar1?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="submit('<?= $prd->nama_produk ?>', '<?= $prd->harga ?>', '<?= $prd->id_produk ?>', '<?= base_url().'uploads/'.$prd->gambar1?>')" >Add to Cart</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="<?php echo base_url().'Produk/detail/'.$prd->id_produk;?>" class="block2-name dis-block s-text3 p-b-5">
												<?php echo $prd->nama_produk; ?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									Rp. <?php echo number_format($prd->harga,'0',',','.'); ?>
								</span>
							</div>
						</div>
					
					</div>
			<?php endforeach; ?>
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
					ABOUT
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
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	function submit(name, price, id, image){
		var nama = name;
		var quan = 1;
		var harga = price;
		var aidi = id;
		var gambar = image;
    	//console.log(nama, quan, harga, aidi, gambar);
      	//$('#total').html("");
      $.post('<?php echo base_url().'Produk/add_cart'; ?>', {name : nama, qty : quan, price : harga, id : aidi, image : gambar}, function(responseText){
						      			$( "#result" ).load(location.href + " #cart-details" );
						      			$( "#result1" ).load(location.href + " #cart-details1" );
		})
    }
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
	
	</script>

<!--===============================================================================================-->
	<script src="<?php echo base_url()."/assets/";?>js/main.js"></script>

</body>
</html>
