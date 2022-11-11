

<?php
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>

<?php
	if(isset($_SESSION['user_id'])){ //jika variabel berisi id_user
	?>
	<?php include 'view6.php';?>
	
	<div class="container">
		<div class="row" >	
			<div class="col-md-2" >
		
			</div>
			<div class="col-md-8 plr15" >	
				<div class="wrapper">	
					<div class="container">
						<div class="row" >
							<div class="col-md-12" >
								
									<span style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">Tips Mengerjakan Ujian</span>
									<div class="panel-body">
										<ol class="plr15" style="font-family: 'Montserrat Bold', arial;font-size:18px;font-weight:bold;">
											<li>Awali dengan do’a<br/><span style="font-family: 'Montserrat Regular', arial;font-size:12px;font-weight:none;">Sebelum mengerjakan soal ujian, biasakanlah untuk berdoa. Dengan berdoa Anda akan menjadi tenang, santai dan tidak tegang, lebih percaya diri, serta siap dalam mengerjakan setiap soal ujian. Kondisi tegang pada saat ujian akan merusak konsentrasi Anda.</span></li>
											<li>Bacalah petunjuk/perintah pengerjaan soal ujian dengan baik<br/><span style="font-family: 'Montserrat Regular', arial;font-size:12px;font-weight:none;">Sebelum mulai mengerjakan soal ujian, bacalah petunjuk pengerjaan soal ujian yang terdapat dalam naskah ujian dengan baik dan tidak terburu-buru. Pada beberapa ujian, petunjuk pengerjaan soal ujian disampaikan oleh pengawas. Dengarkanlah penjelasan pengawas dengan baik dan seksama, sebab sering kali petunjuk untuk menjawab soal ujian yang satu berbeda dengan soal ujian yang lain.</span></li>
											<li>Kerjakan dahulu soal ujian yang Anda anggap mudah<br/><span style="font-family: 'Montserrat Regular', arial;font-size:12px;font-weight:none;">Dengan mengerjakan terlebih dahulu soal yang Anda anggap mudah atau bisa dengan cepat dikerjakan, maka Anda akan menghemat waktu dalam menjawab soal ujian.</span></li>
											<li>Bacalah soal ujian dengan teliti, pahami maksudnya, baru kemudian Anda menjawab<br/><span style="font-family: 'Montserrat Regular', arial;font-size:12px;font-weight:none;">Jangan pernah mengerjakan soal ujian secara terburu-buru, karena akan menyebabkan jawaban Anda tidak maksimal. Bacalah soal ujian dengan teliti kemudian pahami maksud soal tersebut, setelah itu baru Anda jawab.</span></li>
											<li>Kerjakan sendiri sesuai dengan kemampuan Anda<br/><span style="font-family: 'Montserrat Regular', arial;font-size:12px;font-weight:none;">Jangan pernah menyontek jawaban teman Anda, karena mungkin jawaban teman Anda salah. Oleh karena itu kerjakan soal ujian sesuai dengan keyakinan dan kemampuan Anda sendiri. Yakinlah bahwa Anda lebih siap dari teman Anda.</span></li>
											<li>Ikuti teknik menjawab soal pilihan ganda<br/><span style="font-family: 'Montserrat Regular', arial;font-size:12px;font-weight:none;">Langsung abaikan pilihan jawaban yang Anda tahu salah. Jika hukuman pengurangan nilai digunakan (ada nilai minus), jangan menebak suatu pilihan ketika Anda tidak tahu secara pasti. Tetapi jika tidak ada nilai minus, pilihlah salah satu jawaban yang menurut Anda benar walaupun tidak tahu secara pasti. Pilihan Anda yang pertama biasanya benar, jangan menggantinya kecuali Anda yakin akan koreksi yang dilakukan.</span></li>
											<li>Periksa kembali seluruh jawabanmu<br/><span style="font-family: 'Montserrat Regular', arial;font-size:12px;font-weight:none;">Bila semua soal ujian telah selesai Anda kerjakan, jangan terburu-buru keluar ruangan. Pergunakan sisa waktu yang ada untuk memeriksa dan membaca kembali jawaban Anda sehingga bila ada kekurangan dapat segera Anda perbaiki.</span></li>
											<li>Akhiri dengan do’a<br/><span style="font-family: 'Montserrat Regular', arial;font-size:12px;font-weight:none;">Sebagaimana Anda berdo’a untuk mulai mengerjakan soal ujian, berdoalah juga setelah selesai mengerjakan soal ujian. Semoga apa yang sudah Anda kerjakan benar dan mendapat nilai yang baik</span></li>
										</ol>
									</div>
								
							</div>	
						</div>	
					</div>	
					<div class="clear"></div>						
				</div>
			</div>			<div class="col-md-2" >
				
			</div>
		</div>
	</div>
	
	<?php include 'view3.php'; ?>
	<?php
		}else{
		?>	<?php include 'view5.php'; ?>
	<div class="wrapper">
		<div class="container">	
			<div class="row" >
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading" style="background:#FFB94A;color:#fff;">PERINGATAN</div>
						<div class="panel-body text-center">
							<p>Anda belum login. </p><br/><p><a class="btn btn-warning btn-sm" href="<?php echo base_url(); ?>">Login</a></p>
						</div></div></div>
						<div class="col-md-4"></div>
			</div>
		</div>
		</div><?php
	}
?>