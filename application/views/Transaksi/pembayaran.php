	<title>Payment Confirmation</title>

	<!-- Title Page -->
					<div class="sec-title p-t-10">
					<br><br>
				<h3 class="m-text5 t-center">
					PAYMENT CONFIRMATION
				</h3>
			</div>
	<br>


	<section class="cart bgwhite">
		<div class="container">
			<br>
						<div class="col-md-6 p-b-30">
					<form method="POST" action="<?php echo base_url()."Transaksi/do_pembayaran";?>" enctype="multipart/form-data">
						<span class="s-text18 w-size19 w-full-sm">
						JUMLAH YANG HARUS DIBAYAR DENGAN ONGKIR : Rp <?php if ($transaksi->kurir=="JNE") {
							echo number_format($transaksi->total+40000,'0',',','.');
						}elseif ($transaksi->kurir=="TIKI") {
							echo number_format($transaksi->total+36000,'0',',','.');
						} ?>
					</span>
					<br><br>
					<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="status_bayar" value="dibayar" hidden>
						<span>Transaction Date</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="id_transaksi" value="<?php echo $transaksi->id_transaksi; ?>" readonly>
						</div>
						<span>Transfer to</span>
							<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="bank_tujuan" value="BCA Atas nama WIWIK 065687986878" readonly="">
						</div>
						<span>Payment Date</span>
							<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="date" name="tanggal_bayar" required>
						</div>
						<span>Payment Total</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="jumlah_bayar" placeholder="contoh: 45000" required>
						</div>
						<span>From Bank</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="bank_asal" placeholder="contoh : Mandiri Syariah" required>
						</div>
						<span>Account Number</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="no_rekening" placeholder="contoh : 0767546656" required>
						</div>
						<span>Account Sender Name</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="atas_nama" placeholder="contoh : Indira Faradiba" required>
						</div>
						<span>Upload Proof of Payment</span>
						<div class="of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-r-15" type="file" name="buktibayar" placeholder="" required>
						</div>
						<div>
							<button type="submit" class="flex-c-m size2 bg1 m-text3 w-size25" style="float: right;">
								PAY
							</button>
							<br><br>
						</div>
							</form>	
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

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



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

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()."/assets/";?>js/main.js"></script>

</body>
</html>
