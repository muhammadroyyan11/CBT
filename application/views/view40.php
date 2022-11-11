<div class="nav-side-menu">
	<?php
		$this->db->select('*');
		$this->db->from('setting');
		$query = $this->db->get();
		$qrow = $query->result();
		$row = $qrow[0];
		$logo = $row->logo;
	?>
    <div class="brand">
	<?php
		if ($logo == '')
						{ ?>
						<img src="<?php echo base_url() . 'assets/css/images/jayvyn-host.png' ?>" style="max-width:60px;padding:20px 0;">
						<?php } else
						{ ?>
						<img class="img-responsive center-block" src="<?php echo base_url() . 'assets/css/images/' . $logo ?>" style="max-width:60px;">	
					<?php } ?>
		
		</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
	
	<div class="menu-list">
		
		<ul id="menu-content" class="menu-content collapse out">
			<li>
				<a href="<?php echo site_url('home')?>">
					<img src="<?php echo base_url() . 'assets/css/images/admin-icon-03.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Dashboard
				</a>
			</li>
			
			<li  data-toggle="collapse" data-target="#user" class="collapsed">
				<a href="#"><i class="fa fa-user fa-lg"></i> User <span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="user">
				<li><a href="<?php echo site_url('user')?>">Semua User</a></li>
				<li><a href="<?php echo site_url('tambahuser');?>">Tambah User</a></li>
			</ul>
			
			
			<li  data-toggle="collapse" data-target="#kelas" class="collapsed">
				<a href="#"><img src="<?php echo base_url() . 'assets/css/images/admin-icon-05.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Kelas<span class="arrow"></span></a>
			</li>  
			<ul class="sub-menu collapse" id="kelas">
				<li><a href="<?php echo site_url('kelas')?>">Semua Kelas</a></li>
				<li><a href="<?php echo site_url('tambahkelas');?>">Tambah Kelas</a></li>
			</ul>
			
			<li  data-toggle="collapse" data-target="#ujian" class="collapsed">
				<a href="#"><img src="<?php echo base_url() . 'assets/css/images/admin-icon-06.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Soal Ujian<span class="arrow"></span></a>
			</li>  
			<ul class="sub-menu collapse" id="ujian">
			<li><a href="<?php echo site_url('folder')?>">Semua Ujian</a></li>
				<?php /* <li><a href="<?php echo site_url('ujian')?>">Semua Ujian</a></li> */ ?>
				<li><a href="<?php echo site_url('tambahujian');?>">Tambah Ujian</a></li>
			</ul>
			<li  data-toggle="collapse" data-target="#peminatan" class="collapsed">
				<a href="#"><img src="<?php echo base_url() . 'assets/css/images/admin-icon-07.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Peminatan<span class="arrow"></span></a>
			</li>  
			<ul class="sub-menu collapse" id="peminatan">
				<li><a href="<?php echo site_url('peminatan')?>">Semua Peminatan</a></li>
				<li><a href="<?php echo site_url('tambahpeminatan');?>">Tambah Peminatan</a></li>
			</ul>
			
			<li  data-toggle="collapse" data-target="#jurusan" class="collapsed">
				<a href="#"><img src="<?php echo base_url() . 'assets/css/images/admin-icon-08.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Jurusan<span class="arrow"></span></a>
			</li>  
			<ul class="sub-menu collapse" id="jurusan">
				<li><a href="<?php echo site_url('jurusan')?>">Semua Jurusan</a></li>
				<li><a href="<?php echo site_url('tambahjurusan');?>">Tambah Jurusan</a></li>
			</ul>
			
			<li>
				<a href="<?php echo site_url('toprank')?>">
					<img src="<?php echo base_url() . 'assets/css/images/admin-icon-09.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Top 10 Ranking
				</a>
			</li>
			<li  data-toggle="collapse" data-target="#laporan" class="collapsed">
				<a href="#"><i class="fa fa-file-text fa-lg"></i> Laporan Ujian<span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="laporan">
				<li><a href="<?php echo site_url('carilaporan')?>">Cari Hasil Ujian</a></li>
				<li><a href="<?php echo site_url('settinganalisa');?>">Setting Analisa Model A</a></li>
				<li><a href="<?php echo site_url('settinganalisa2');?>">Setting IRT</a></li>
			</ul>
			<li>
				<a href="<?php echo site_url('monitoring')?>">
					<img src="<?php echo base_url() . 'assets/css/images/admin-icon-10.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Monitoring
				</a>
			</li>
			
			<li  data-toggle="collapse" data-target="#transaksi" class="collapsed">
				<a href="#"><img src="<?php echo base_url() . 'assets/css/images/admin-icon-05.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Transaksi<span class="arrow"></span></a>
			</li>  
			<ul class="sub-menu collapse" id="transaksi">
				<li><a href="<?php echo site_url('pembelian');?>">Pembelian</a></li>
				<li><a href="<?php echo site_url('produk')?>">Semua Produk</a></li>
				<li><a href="<?php echo site_url('tambahproduk');?>">Tambah Produk</a></li>
			</ul>
			
			<li>
				<a href="<?php echo site_url('log')?>">
					<img src="<?php echo base_url() . 'assets/css/images/admin-icon-11.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Clear Login Session
				</a>
			</li>
			
			<li>
				<a href="<?php echo site_url('backrest')?>">
					<i class="fa fa-database fa-lg"></i> Backup & Restore
				</a>
			</li>
			
			<li>
				<a href="<?php echo site_url('setting')?>">
					<img src="<?php echo base_url() . 'assets/css/images/admin-icon-13.png' ?>" style="max-width:16px;margin:0 5px 0 10px;"> Setting
				</a>
			</li>
			
			<li style="background:#1B1464;">
				<a href="<?php echo site_url('admlogout')?>">
					<i class="fa fa-sign-out fa-lg"></i> Logout
				</a>
			</li>
			
		</ul>
	</div>
</div>