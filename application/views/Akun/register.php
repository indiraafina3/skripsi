	<title>Register</title>

	<!-- Title Page -->
					<div class="sec-title p-t-10">
									<br><br>
				<h3 class="m-text5 t-center">
					REGISTER
				</h3>
			</div>
	<br>
			<br><br>
	<!-- Cart -->
	<section class="bgwhite">
		<div class="container">
					<br>
					<form method="POST" action="<?php echo base_url()."Akun/register_akun";?>" enctype="multipart/form-data">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="akses_level" value="pelanggan" hidden>
						<span>Full Name</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="nama" placeholder="contoh : Indira Faradiba Afina"required>
						</div>
						<span>Email</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" id="email" type="email" name="email" placeholder="contoh : indira123@gmail.com" required>
						</div>
						<div>
						<span id='warningemail'></span>
						</div>
						<br>
						<span>Phone Number</span>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" minlength="12" size="12" type="number" name="telepon" placeholder="contoh : 081275746545" onkeydown="limit(this, 12);" onkeyup="limit(this, 12);" required>
						</div>
						<span>Address</span>
						<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="alamat" placeholder="contoh : Jalan. Bukit Bintang No. 32" required>
						</div>
						<span>Password</span>
						<div class="bo4 of-hidden size15 m-b-20">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="Password" name="password" id="password" placeholder="********" minlength="7" maxlength="7" size="7" required>
						</div>
						<div><input type="checkbox" onclick="myFunction2()"><font size="2">Show Password</font></div>
						<br>
						<p>sudah memiliki akun? <a href="<?php echo base_url()."Akun/login";?>">login</a></p>
								<!-- Button -->
							<div class="row" style="float: right;">
							<button class="flex-c-m size2 bg1 m-text3 w-size25" style="margin-left : 10px; color: white;" type="submit" id="submit" onclick="Confirm();" >REGISTER</button>
						</div>
				<br><br><br>
				</form>
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

		function limit(element, max) {    
    	var max_chars = max;
    	if(element.value.length = max_chars) {
        element.value = element.value.substr(0, max_chars);
    		}
		}

		function myFunction2() {
  		var y = document.getElementById("password");
  		if (y.type === "password") {
    	y.type = "text";
  		} else {
    	y.type = "password";
  		}
		}
	</script>

	<script>
		$("#email").blur(function(){
      $.ajax({
      	type : "POST",
        url : "<?php echo site_url('Akun/emailexist') ?>",
        data : {'email' : $(this).val()  },
        success : function(result) {
          if (result==1) {
    		document.getElementById('warningemail').innerHTML = 'Alamat Email tidak dapat digunakan';
            document.getElementById('warningemail').style.color = 'red';
            $(this).focus();
            document.getElementById('submit').disabled = true;      
          }else
          {
    		document.getElementById('warningemail').innerHTML = '';
            document.getElementById('submit').disabled = false;
          }
        }
      });
    });
	</script>

	
<!--===============================================================================================-->
	<script src="<?php echo base_url()."/assets/";?>js/main.js"></script>

</body>
</html>
