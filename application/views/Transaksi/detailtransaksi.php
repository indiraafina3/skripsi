	<title>Detail Transaction</title>

	<!-- Title Page -->
					<div class="sec-title p-t-10">
									<br><br>
				<h3 class="m-text5 t-center">
					DETAIL TRANSACTION
				</h3>
			</div>
	
<br>
	<!-- Cart -->
	<section class="cart bgwhite">
		<div class="container">
				<table width="520" cellspacing="1" cellpadding="1">
						<tr>
						<td width="153">Transaction Code</td>
						<td width="23"><div align="center" >:</div></td>
						<td width="326"><?php echo $transaksi->id_transaksi; ?></td>
						</tr>
						<tr>
						<td>Recipient</td>
						<td><div align="center" >:</div></td>
						<td><?php echo $transaksi->nama; ?></td>
						</tr>
						<tr>
						<td>Email</td>
						<td><div align="center" >:</div></td>
						<td><?php echo $transaksi->email; ?></td>
						</tr>
						<tr>
						<td>Phone Number</td>
						<td><div align="center" >:</div></td>
						<td><?php echo $transaksi->telepon; ?></td>
						</tr>
						<tr>
						<td>Address</td>
						<td><div align="center" >:</div></td>
						<td ><?php echo $transaksi->alamat; ?></td>
						</tr>
						<tr>
						<td>Transaction Date</td>
						<td><div align="center" >:</div></td>
						<td><?php echo $transaksi->tanggal_transaksi; ?></td>
						</tr>
						<tr>
						<td>Transaction Status</td>
						<td><div align="center" >:</div></td>
						<td><?php echo $transaksi->status_transaksi; ?></td>
						</tr>
						<tr>
						<td>Payment Date</td>
						<td><div align="center" >:</div></td>
						<td ><?php echo $transaksi->tanggal_bayar; ?></td>
						</tr>
						<tr>
						<td>Delivered Date</td>
						<td><div align="center" >:</div></td>
						<td ><?php echo $transaksi->tanggal_pengiriman; ?></td>
						</tr>
						<tr>
						<td>Driver</td>
						<td><div align="center" >:</div></td>
						<td ><?php echo $transaksi->kurir; ?></td>
						</tr>
						<tr>
						<td>Resi</td>
						<td><div align="center" >:</div></td>
						<td ><?php echo $transaksi->no_resi; ?></td>
						</tr>
						</table>
						<br>
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="p-l-10">Product Name</th>
							<th class="p-l-10">Price</th>
							<th class="p-l-10">Quantity</th>
							<th class="p-l-10">Subtotal</th>
						</tr>
						<?php foreach ($item as $item) : ?>
						<tr class="table-row">
							<td class="p-l-10"><?php echo $item->nama_produk; ?></td>
							<td class="p-l-10"><?php echo number_format($item->harga,'0',',','.'); ?></td>
							<td class="p-l-10"><?php echo $item->jumlah; ?></td>
							<td class="p-l-10">Rp <?php echo number_format($item->total,'0',',','.'); ?></td>
						</tr>
					<?php endforeach; ?>
					</table>
				</div>
			</div>

			<br>
			<div class="jumbotron" style="text-align: right;">
					<span>
						<b>TOTAL + DELIVERY SERVICE : Rp <?php if ($transaksi->kurir=="JNE") {
							echo number_format($transaksi->total+40000,'0',',','.');
						}elseif ($transaksi->kurir=="TIKI") {
							echo number_format($transaksi->total+36000,'0',',','.');
						} ?></b>
					</span>
					<br><br>
				</div>
				<div>
						<br><br>
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
