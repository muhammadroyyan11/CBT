<div class="nav-side-menu">
	<?php
		$this->db->select('*');
		$this->db->from('setting');
		$query1 = $this->db->get ();												
		$qrow1 = $query1->result();
		$row1 = $qrow1[0];
		$versi = $row1->versi;
	?>
    <div class="brand">JCOM CBT Versi <?php echo $versi; ?></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
	
	<div class="menu-list">
		
		<ul id="menu-content" class="menu-content collapse out">
			<li>
				<a href="<?php echo site_url('homesiswa')?>">
					<i class="fa fa-dashboard fa-lg"></i> Back
				</a>
			</li>
		</ul>
	</div>
</div>