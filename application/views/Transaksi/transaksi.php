	<title>Transaction</title>

	<!-- Title Page -->
					<div class="sec-title p-t-10">
									<br><br>
				<h3 class="m-text5 t-center">
					TRANSACTION
				</h3>
			</div>
			
	<!-- Cart -->
	<section class="cart bgwhite">
		<div class="container">

			<!-- Transaksi item -->
			<div class="pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="p-l-30">NO</th>
							<th class="column-1 ">Transaction Code</th>
							<th class="column-1 ">Recipient</th>
							<th class="column-1 ">Date</th>
							<th class="p-l-75">Payment Date</th>
							<th class="p-l-75">Delivery Date</th>
							<th class="p-l-75">Transaction Status</th>
							<th class="p-l-75">Total</th>
							<th class="p-l-75" style="padding-right: 50px;">Action</th>
						</tr>
						<?php $i=1;?>
						<?php foreach ($transaksi as $transaksi) : ?>
						<tr class="table-row" > 
							<td class="p-l-30"><?php echo $i; ?></td>
							<td class="column-1 "><a href="<?php echo base_url()."Transaksi/detail/".$transaksi->id_transaksi;?>"><u><b><?= $transaksi->id_transaksi ?></b></u></a></td>
							<td class="column-1 "><?= $transaksi->nama ?></td>
							<td class="column-1"><?= date('d-m-Y H:i:s', $transaksi->id_transaksi ) ?></td>
							<?php if ($this->session->userdata('akses_level') == 'admin') {
								?>
								<td class="p-l-75"><a href="<?php echo base_url()."Transaksi/pembayaran_list/".$transaksi->id_transaksi;?>"><u><b><?= $transaksi->tanggal_bayar?></b></u></a></td>
								<br>
							<?php }else {?>
								<td class="p-l-75"><?= $transaksi->tanggal_bayar?></td>
							<?php }?>
							<?php if ($this->session->userdata('akses_level') == 'admin') {
								?>
								<td class="p-l-75"><a href="<?php echo base_url()."Transaksi/pengiriman_list/".$transaksi->id_transaksi;?>"><u><b><?= $transaksi->tanggal_pengiriman?></b></u></a></td>
								<?php }else {?>
								<td class="p-l-75"><?= $transaksi->tanggal_pengiriman?></td>
								<?php }?> 
							<td class="p-l-75"><?= $transaksi->status_transaksi ?></td>
							<td class="p-l-75">Rp. <?php if ($transaksi->kurir=="JNE") {
							echo number_format($transaksi->total+40000,'0',',','.');
							}elseif ($transaksi->kurir=="TIKI") {
							echo number_format($transaksi->total+36000,'0',',','.');
							} ?></td>
							<td class="p-l-75" style="padding-right: 50px;">
								<div>
								
								<?php if ($this->session->userdata('akses_level') == 'pelanggan' && $transaksi->status_transaksi!=="Dibatalkan" && $transaksi->tanggal_bayar=="") {
								?>
								<a style="font-size: 14px; color: black; text-align: center;" href="<?php echo base_url()."Transaksi/pembayaran/".$transaksi->id_transaksi?>"><img src="<?php echo base_url()."/assets/";?>images/icons/confirm.png" alt="ICON"></a>
								<?php }elseif ($this->session->userdata('akses_level') == 'pelanggan' && $transaksi->status_transaksi!=="Dibatalkan" && $transaksi->tanggal_bayar!=="") {
								} ?>

								<?php if ($this->session->userdata('akses_level') == 'admin' && $transaksi->tanggal_pengiriman=="") {
								?>
								<a style="font-size: 14px; color: black; text-align: center; padding-right: 10px;" href="<?php echo base_url()."Transaksi/pengiriman/".$transaksi->id_transaksi;?>"><img src="<?php echo base_url()."/assets/";?>images/icons/send2.png" alt="ICON"></a>
								<?php }?>

								<?php if ($this->session->userdata('akses_level') == 'admin') {
								?>
								<a  style="font-size: 14px; color: black; text-align: center;" href="<?php echo base_url()."Transaksi/cetaktransaksi/".$transaksi->id_transaksi?>" target="_blank"><img src="<?php echo base_url()."/assets/";?>images/icons/print.png" alt="ICON"></a>
								<?php } ?>
								
								<?php if ($transaksi->status_transaksi!=="Dibatalkan" && $transaksi->tanggal_pengiriman=="") {	 ?>
								<a href="<?php echo base_url()."Transaksi/batalkan/".$transaksi->id_transaksi;?>"><img src="<?php echo base_url()."/assets/";?>images/icons/cancel.png" alt="ICON"></a>
								<?php }	?>
								
						</div>
							</td>
						</tr>
						<?php $i++;
						endforeach; ?>
					</table>
				</div>
			</div>
<br>
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

		
		function changeFunc() {
	    var sorting = document.getElementById("sorting");
    	var selectedValue = sorting.options[sorting.selectedIndex].value;
    	alert(selectedValue);
   		}


	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()."/assets/";?>js/main.js"></script>

</body>
</html>
