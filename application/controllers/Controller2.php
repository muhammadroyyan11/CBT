<?php ob_start();
	/******************************************************************
		APLIKASI TRY OUT ONLINE
		WRITTEN and DEVELOPED by : Agi Nugraha
		HOME PAGE : www.jayvyn-host.com
		EMAIL ADDRESS : agi@jayvyn-host.com	
		COPYRIGHT (C): 2015 ALL RIGHTS RESERVED
	*******************************************************************/
?>

<?php
	class Controller2 extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->load->helper('download');
			$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
			$this->load->model('model1');
			
		}
		
        function index()
		{
			$objPHPExcel = new PHPExcel();
			
			// Set properties
        	$objPHPExcel->getProperties()
			->setCreator("JCom CBT Online") //creator
			->setTitle("Hasil Ujian");  //file title
			
			$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
			$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
			
			$objget->setTitle('Sample Sheet'); //sheet title
			$objset->setCellValue('A1',$this->input->post('judul')); //insert cell value
			$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size
			$objget->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objset->setCellValue('A2',$this->input->post('ketkelas')); //insert cell value
			$objget->getStyle('A2')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size	
			$objget->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objget->mergeCells('A1:I1');	
			$objget->mergeCells('A2:I2');
			$objget->mergeCells('J4:L4');
			$objget->mergeCells('M4:O4');
			$objget->mergeCells('P4:R4');
			
			//table header
			$cols = array("A","B","C","D","E","F","G","H","I","J","M","P","S");
			$val = array("NO","NAMA PESERTA","NO PESERTA","BENAR","SALAH","KOSONG","NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
			for ($a=0;$a<13;$a++) 
			{
				$objset->setCellValue($cols[$a].'4', $val[$a]);
				//set borders
				
				//set alignment
				$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
				$objget->getColumnDimension($cols[$a])->setAutoSize(true);
				$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
			}
			
			//taruh baris data disini
			$bar = 5;
			$no = 1;
			$nf = $this->input->post('excel2');
			$nama = $nf;
			$data = $this->model1->cetak();
			
			
			
			foreach ($data  AS $row) {
				$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$objget->setCellValueByColumnAndRow(0, $bar, $no);
				if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
				if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
				$objget->setCellValueByColumnAndRow(3, $bar, $row->p_benar);
				$objget->setCellValueByColumnAndRow(4, $bar, $row->p_salah);
				$objget->setCellValueByColumnAndRow(5, $bar, $row->p_kosong);
				$objget->setCellValueByColumnAndRow(6, $bar, $row->p_nilai);
				$objget->setCellValueByColumnAndRow(7, $bar, $row->k13);
				$objget->setCellValueByColumnAndRow(8, $bar, $row->predikat);
				
				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->where('id',$row->id);
				$query1 = $this->db->get();
				$jurusan = $query1->result();
				$jur = $jurusan[0]; 
				
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->where('kode_jurusan',$jur->jurusan1);
				$query2 = $this->db->get();
				$jurusan1 = $query2->result();
				$jur1 = $jurusan1[0];
				
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->where('kode_jurusan',$jur->jurusan2);
				$query3 = $this->db->get();
				$jurusan2 = $query3->result();
				$jur2 = $jurusan2[0];
				
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->where('kode_jurusan',$jur->jurusan3);
				$query4 = $this->db->get();
				$jurusan3 = $query4->result();
				$jur3 = $jurusan3[0];
				
				
				$objget->setCellValueByColumnAndRow(9, $bar, $jur1->kode_jurusan);
				$objget->setCellValueByColumnAndRow(10, $bar, $jur1->pil_jurusan);
				$objget->setCellValueByColumnAndRow(11, $bar, $jur1->nama_univ);
				$objget->setCellValueByColumnAndRow(12, $bar, $jur2->kode_jurusan);
				$objget->setCellValueByColumnAndRow(13, $bar, $jur2->pil_jurusan);
				$objget->setCellValueByColumnAndRow(14, $bar, $jur2->nama_univ);
				$objget->setCellValueByColumnAndRow(15, $bar, $jur3->kode_jurusan);
				$objget->setCellValueByColumnAndRow(16, $bar, $jur3->pil_jurusan);
				$objget->setCellValueByColumnAndRow(17, $bar, $jur3->nama_univ);
				if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(18, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(18, $bar, $row->psekolah);}
				
				$bar++;
				$no++;
			}
			
			//simpan dalam file sample.xls
			$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
			try {
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				header('Content-Type:  application/vnd.ms-excel');
				//ubah nama file saat diunduh
				header('Content-Disposition: attachment; filename="'.$nama.'.xls"'); 
				
				ob_end_clean();             
				$objWriter->save('php://output');
				} catch (Exception $e) {
				redirect(site_url('Controller2/notif_error'));
				die();
			}
			
		}
		
        function Multi()
		{
			$objPHPExcel = new PHPExcel();
			
			// Set properties
        	$objPHPExcel->getProperties()
			->setCreator("JCom CBT Online") //creator
			->setTitle("Hasil Ujian");  //file title
			
			$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
			$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
			
			$objget->setTitle('Sample Sheet'); //sheet title
			$objset->setCellValue('A1',$this->input->post('judul')); //insert cell value
			$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size
			$objget->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objset->setCellValue('A2',$this->input->post('ketkelas')); //insert cell value
			$objget->getStyle('A2')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size	
			$objget->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			
			
			$jml_mapel = $this->input->post('jml_mapel');
			$mapel1 = $this->input->post('mapel1');
			$mapel2 = $this->input->post('mapel2');
			$mapel3 = $this->input->post('mapel3');
			$mapel4 = $this->input->post('mapel4');
			$mapel5 = $this->input->post('mapel5');
			$mapel6 = $this->input->post('mapel6');
			$mapel7 = $this->input->post('mapel7');
			$mapel8 = $this->input->post('mapel8');
			$mapel9 = $this->input->post('mapel9');
			$mapel10 = $this->input->post('mapel10');
			//table header
			
			if ($jml_mapel==2)
			{
				
				$objget->mergeCells('A1:H1');	
				$objget->mergeCells('A2:H2');
				$objget->mergeCells('O4:Q4');
				$objget->mergeCells('R4:T4');
				$objget->mergeCells('U4:W4');
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","R","U","X");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
				for ($a=0;$a<18;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->p_nilai);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->k13);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->predikat);
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(14, $bar, $jur1->kode_jurusan);
					$objget->setCellValueByColumnAndRow(15, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(16, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(17, $bar, $jur2->kode_jurusan);
					$objget->setCellValueByColumnAndRow(18, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(19, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(20, $bar, $jur3->kode_jurusan);
					$objget->setCellValueByColumnAndRow(21, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(22, $bar, $jur3->nama_univ);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(23, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(23, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			else if($jml_mapel==3)
			{
				
				$objget->mergeCells('A1:I1');	
				$objget->mergeCells('A2:I2');
				$objget->mergeCells('S4:U4');
				$objget->mergeCells('V4:X4');
				$objget->mergeCells('Y4:AA4');
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","V","Y","AB");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
				for ($a=0;$a<22;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->p_nilai);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->k13);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->predikat);
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(18, $bar, $jur1->kode_jurusan);
					$objget->setCellValueByColumnAndRow(19, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(20, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(21, $bar, $jur2->kode_jurusan);
					$objget->setCellValueByColumnAndRow(22, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(23, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(24, $bar, $jur3->kode_jurusan);
					$objget->setCellValueByColumnAndRow(25, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(26, $bar, $jur3->nama_univ);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(27, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(27, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
			}
			else if($jml_mapel==4)
			{
				
				$objget->mergeCells('A1:J1');	
				$objget->mergeCells('A2:J2');
				$objget->mergeCells('W4:Y4');
				$objget->mergeCells('Z4:AB4');
				$objget->mergeCells('AC4:AE4');
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","Z","AC","AF");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
				for ($a=0;$a<26;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->p_nilai);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->k13);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->predikat);
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(22, $bar, $jur1->kode_jurusan);
					$objget->setCellValueByColumnAndRow(23, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(24, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(25, $bar, $jur2->kode_jurusan);
					$objget->setCellValueByColumnAndRow(26, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(27, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(28, $bar, $jur3->kode_jurusan);
					$objget->setCellValueByColumnAndRow(29, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(30, $bar, $jur3->nama_univ);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(31, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(31, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
			}
			
			else if($jml_mapel==5)
			{
				
				$objget->mergeCells('A1:K1');	
				$objget->mergeCells('A2:K2');
				$objget->mergeCells('AA4:AC4');
				$objget->mergeCells('AD4:AF4');
				$objget->mergeCells('AG4:AI4');
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AD","AG","AJ");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
				for ($a=0;$a<30;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->p_nilai);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->k13);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->predikat);
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(26, $bar, $jur1->kode_jurusan);
					$objget->setCellValueByColumnAndRow(27, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(28, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(29, $bar, $jur2->kode_jurusan);
					$objget->setCellValueByColumnAndRow(30, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(31, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(32, $bar, $jur3->kode_jurusan);
					$objget->setCellValueByColumnAndRow(33, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(34, $bar, $jur3->nama_univ);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(35, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(35, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
			}
			
			else if($jml_mapel==6)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				$objget->mergeCells('AE4:AG4');
				$objget->mergeCells('AH4:AJ4');
				$objget->mergeCells('AK4:AM4');
				
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AH","AK","AN");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
				for ($a=0;$a<34;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$objget->setCellValueByColumnAndRow(27, $bar, $row->p_nilai);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->k13);
					$objget->setCellValueByColumnAndRow(29, $bar, $row->predikat);
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(30, $bar, $jur1->kode_jurusan);
					$objget->setCellValueByColumnAndRow(31, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(32, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(33, $bar, $jur2->kode_jurusan);
					$objget->setCellValueByColumnAndRow(34, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(35, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(36, $bar, $jur3->kode_jurusan);
					$objget->setCellValueByColumnAndRow(37, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(38, $bar, $jur3->nama_univ);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(39, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(39, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			else if($jml_mapel==7)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				$objget->mergeCells('AI4:AK4');
				$objget->mergeCells('AL4:AN4');
				$objget->mergeCells('AO4:AQ4');
				
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AL","AO","AR");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"B","S","K",$mapel7,"NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
				for ($a=0;$a<38;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[40].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[41].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[42].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[43].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$objget->setCellValueByColumnAndRow(27, $bar, $row->benar7);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->salah7);
					$objget->setCellValueByColumnAndRow(29, $bar, $row->kosong7);
					$objget->setCellValueByColumnAndRow(30, $bar, $row->nilai7);
					$objget->setCellValueByColumnAndRow(31, $bar, $row->p_nilai);
					$objget->setCellValueByColumnAndRow(32, $bar, $row->k13);
					$objget->setCellValueByColumnAndRow(33, $bar, $row->predikat);
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(34, $bar, $jur1->kode_jurusan);
					$objget->setCellValueByColumnAndRow(35, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(36, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(37, $bar, $jur2->kode_jurusan);
					$objget->setCellValueByColumnAndRow(38, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(39, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(40, $bar, $jur3->kode_jurusan);
					$objget->setCellValueByColumnAndRow(41, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(42, $bar, $jur3->nama_univ);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(43, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(43, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			else if($jml_mapel==8)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				$objget->mergeCells('AM4:AO4');
				$objget->mergeCells('AP4:AR4');
				$objget->mergeCells('AS4:AU4');
				
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AP","AS","AV");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"B","S","K",$mapel7,"B","S","K",$mapel8,"NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
				for ($a=0;$a<42;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[40].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[41].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[42].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[43].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[44].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[45].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[46].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[47].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$objget->setCellValueByColumnAndRow(27, $bar, $row->benar7);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->salah7);
					$objget->setCellValueByColumnAndRow(29, $bar, $row->kosong7);
					$objget->setCellValueByColumnAndRow(30, $bar, $row->nilai7);
					$objget->setCellValueByColumnAndRow(31, $bar, $row->benar8);
					$objget->setCellValueByColumnAndRow(32, $bar, $row->salah8);
					$objget->setCellValueByColumnAndRow(33, $bar, $row->kosong8);
					$objget->setCellValueByColumnAndRow(34, $bar, $row->nilai8);
					$objget->setCellValueByColumnAndRow(35, $bar, $row->p_nilai);
					$objget->setCellValueByColumnAndRow(36, $bar, $row->k13);
					$objget->setCellValueByColumnAndRow(37, $bar, $row->predikat);
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(38, $bar, $jur1->kode_jurusan);
					$objget->setCellValueByColumnAndRow(39, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(40, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(41, $bar, $jur2->kode_jurusan);
					$objget->setCellValueByColumnAndRow(42, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(43, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(44, $bar, $jur3->kode_jurusan);
					$objget->setCellValueByColumnAndRow(45, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(46, $bar, $jur3->nama_univ);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(47, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(47, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			else if($jml_mapel==9)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				$objget->mergeCells('AQ4:AS4');
				$objget->mergeCells('AT4:AV4');
				$objget->mergeCells('AW4:AY4');
				
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AT","AW","AZ");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"B","S","K",$mapel7,"B","S","K",$mapel8,"B","S","K",$mapel9,"NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
				for ($a=0;$a<46;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[40].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[41].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[42].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[43].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[44].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[45].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[46].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[47].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[48].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[49].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[50].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[51].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$objget->setCellValueByColumnAndRow(27, $bar, $row->benar7);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->salah7);
					$objget->setCellValueByColumnAndRow(29, $bar, $row->kosong7);
					$objget->setCellValueByColumnAndRow(30, $bar, $row->nilai7);
					$objget->setCellValueByColumnAndRow(31, $bar, $row->benar8);
					$objget->setCellValueByColumnAndRow(32, $bar, $row->salah8);
					$objget->setCellValueByColumnAndRow(33, $bar, $row->kosong8);
					$objget->setCellValueByColumnAndRow(34, $bar, $row->nilai8);
					$objget->setCellValueByColumnAndRow(35, $bar, $row->benar9);
					$objget->setCellValueByColumnAndRow(36, $bar, $row->salah9);
					$objget->setCellValueByColumnAndRow(37, $bar, $row->kosong9);
					$objget->setCellValueByColumnAndRow(38, $bar, $row->nilai9);
					$objget->setCellValueByColumnAndRow(39, $bar, $row->p_nilai);
					$objget->setCellValueByColumnAndRow(40, $bar, $row->k13);
					$objget->setCellValueByColumnAndRow(41, $bar, $row->predikat);
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(42, $bar, $jur1->kode_jurusan);
					$objget->setCellValueByColumnAndRow(43, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(44, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(45, $bar, $jur2->kode_jurusan);
					$objget->setCellValueByColumnAndRow(46, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(47, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(48, $bar, $jur3->kode_jurusan);
					$objget->setCellValueByColumnAndRow(49, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(50, $bar, $jur3->nama_univ);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(51, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(51, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			else if($jml_mapel==10)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				$objget->mergeCells('AU4:AW4');
				$objget->mergeCells('AX4:AZ4');
				$objget->mergeCells('BA4:BC4');
				
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AX","BA","BD");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"B","S","K",$mapel7,"B","S","K",$mapel8,"B","S","K",$mapel9,"B","S","K",$mapel10,"NILAI","SKALA","PREDIKAT","PILIHAN JURUSAN 1","PILIHAN JURUSAN 2","PILIHAN JURUSAN 3","NAMA SEKOLAH");
				for ($a=0;$a<50;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[40].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[41].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[42].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[43].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[44].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[45].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[46].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[47].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[48].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[49].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[50].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[51].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[52].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[53].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[54].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[55].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$objget->setCellValueByColumnAndRow(27, $bar, $row->benar7);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->salah7);
					$objget->setCellValueByColumnAndRow(29, $bar, $row->kosong7);
					$objget->setCellValueByColumnAndRow(30, $bar, $row->nilai7);
					$objget->setCellValueByColumnAndRow(31, $bar, $row->benar8);
					$objget->setCellValueByColumnAndRow(32, $bar, $row->salah8);
					$objget->setCellValueByColumnAndRow(33, $bar, $row->kosong8);
					$objget->setCellValueByColumnAndRow(34, $bar, $row->nilai8);
					$objget->setCellValueByColumnAndRow(35, $bar, $row->benar9);
					$objget->setCellValueByColumnAndRow(36, $bar, $row->salah9);
					$objget->setCellValueByColumnAndRow(37, $bar, $row->kosong9);
					$objget->setCellValueByColumnAndRow(38, $bar, $row->nilai9);
					$objget->setCellValueByColumnAndRow(39, $bar, $row->benar10);
					$objget->setCellValueByColumnAndRow(40, $bar, $row->salah10);
					$objget->setCellValueByColumnAndRow(41, $bar, $row->kosong10);
					$objget->setCellValueByColumnAndRow(42, $bar, $row->nilai10);
					$objget->setCellValueByColumnAndRow(43, $bar, $row->p_nilai);
					$objget->setCellValueByColumnAndRow(44, $bar, $row->k13);
					$objget->setCellValueByColumnAndRow(45, $bar, $row->predikat);
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(46, $bar, $jur1->kode_jurusan);
					$objget->setCellValueByColumnAndRow(47, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(48, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(49, $bar, $jur2->kode_jurusan);
					$objget->setCellValueByColumnAndRow(50, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(51, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(52, $bar, $jur3->kode_jurusan);
					$objget->setCellValueByColumnAndRow(53, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(54, $bar, $jur3->nama_univ);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(55, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(55, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			
			
			//simpan dalam file sample.xls
			$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');  
			try {
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				header('Content-Type:  application/vnd.ms-excel');
				//ubah nama file saat diunduh
				header('Content-Disposition: attachment; filename="'.$nama.'.xls"'); 
				
				ob_end_clean();             
				$objWriter->save('php://output');
				} catch (Exception $e) {
				redirect(site_url('Controller2/notif_error'));
				die();
			}
			
			
			
		}
		
		function Cetak_siswa($id_proses)
		{	
			
			$nf = $this->input->post('excel2');
			$nama = $nf;
			$id_proses = $this->input->post('id_proses');
			$where = "proses.id_proses=$id_proses";
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian' ); 
			$this->db->from('proses');
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();
			$res = $query->result();
			$row = $res[0];
			
			if($row->analisa!=''){
				
				$objPHPExcel = new PHPExcel();
				
				// Set properties
				$objPHPExcel->getProperties()
				->setCreator("JCom CBT Online") //creator
				->setTitle("Hasil Ujian");  //file title
				
				$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
				$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
				
				$objget->setTitle('Sample Sheet'); //sheet title
				$objset->setCellValue('A1',$this->input->post('judul')); //insert cell value
				$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
				->setSize(15);    //set font size
				$objget->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$objset->setCellValue('A2',$this->input->post('head2')); //insert cell value
				$objget->getStyle('A2')->getFont()->setBold(true)  // set font weight
				->setSize(15);    //set font size	
				$objget->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				//table header
				
				//merger
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				$objget->mergeCells('A3:D3');
				$objget->mergeCells('A4:D4');
				$objget->mergeCells('C6:F6');
				$objget->mergeCells('C7:F7');
				$objget->mergeCells('C8:F8');
				$objget->mergeCells('C9:F9');
				$objget->mergeCells('H6:I6');
				
				$cols = array("A","E","F","G","H","I","J","K","L","M","N");
				$val1 = array("NAMA PESERTA","NO PESERTA","KELAS","BENAR","SALAH","KOSONG","NILAI","SKALA","PREDIKAT");
				for ($b=0;$b<9;$b++) 
				{
					$objset->setCellValue($cols[$b].'3', $val1[$b]);
					//set borders 								
					$objget->getColumnDimension($cols[$b])->setAutoSize(true);
					//set alignment
					$objget->getStyle($cols[$b].'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[$b].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$b].'3')->getFont()->setBold(true) ;
					//fill
					$objget->getStyle($cols[$b].'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$b].'3')->getFill()->getStartColor()->setRGB('D8D8D8');				
				}		
				
				$cols9 = array("A","B","C","G","H");
				$val9 = array("PILIHAN","KODE JURUSAN","PRODI PILIHAN","UNIVERSITAS","PREDIKSI DAN SELISI SOAL");
				for ($r=0;$r<5;$r++) 
				{
					$objset->setCellValue($cols9[$r].'6', $val9[$r]);
					//set borders 
					$objget->getColumnDimension($cols9[$r])->setAutoSize(true);
					//set alignment
					$objget->getStyle($cols9[$r].'6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols9[$r].'6')->getFont()->setBold(true) ;
					//fill
					$objget->getStyle($cols9[$r].'6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols9[$r].'6')->getFill()->getStartColor()->setRGB('D8D8D8');
				}	
				
				$cols1 = array("A","B","C","D","E","F","G","H","I","J","K");
				$val = array("NO","KODE SOAL","KUNCI","JAWABAN","KOREKSI","KEMAMPUAN YANG DIUJI","PERSENTASE");
				for ($a=0;$a<7;$a++) 
				{
					$objset->setCellValue($cols1[$a].'11', $val[$a]);
					//set borders
					
					
					//set alignment
					$objget->getStyle($cols1[$a].'11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols1[$a].'11')->getFont()->setBold(true) ;
					//fill
					$objget->getStyle($cols1[$a].'11')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols1[$a].'11')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				
				
				
				$jml_soal = $row->jml_soal;
				$tampil_soal = explode(',',$row->no_soal);
				
				$analisa1 = explode(',',$row->analisa);
				$jawaban = explode(',',$row->sort_jawaban);
				$jrx = explode(',',$row->sort_jrx);
				$id_soal = explode(',',$row->sort_soal);
				$koreksi = explode(',',$row->sort_hasil);
				
				$this ->db->order_by("id_soal");
				$this->db->select('*');
				$this->db->from('soal');
				$this->db->where_in('id_soal',$tampil_soal);
				$query = $this->db->get ();			
				
				$this->db->select('*');
				$this->db->from('pengguna');
				$this->db->where('id',$row->id);
				$query1 = $this->db->get();
				$jurusan = $query1->result();
				$jur = $jurusan[0]; 
				
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->where('kode_jurusan',$jur->jurusan1);
				$query2 = $this->db->get();
				$jurusan1 = $query2->result();
				$jur1 = $jurusan1[0];
				
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->where('kode_jurusan',$jur->jurusan2);
				$query3 = $this->db->get();
				$jurusan2 = $query3->result();
				$jur2 = $jurusan2[0];
				
				$this->db->select('*');
				$this->db->from('jurusan');
				$this->db->where('kode_jurusan',$jur->jurusan3);
				$query4 = $this->db->get();
				$jurusan3 = $query4->result();
				$jur3 = $jurusan3[0];
				
				$c = $this->session->userdata('idkelas');
				$d = $this->session->userdata('idujian');
				$e = $this->session->userdata('sekolah');
				$wm =  $this->session->userdata('wmulai');
				$wa =  $this->session->userdata('wakhir');
				
				if ($e == '0') {
					$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
					} else {
					$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
				}
				
				$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
				$this->db->from ( 'proses' );
				$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
				$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
				$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
				$this->db->where($where);
				$this->db->order_by("proses.p_nilai", "desc");
				$query7 = $this->db->get();
				$jml_siswa = $query7->num_rows();
				
				$bar = 12;
				$bar2 = 7;
				$no = 1;
				if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(0, 4, $row->nama);} else {$objget->setCellValueByColumnAndRow(0, 4, $row->pnama);}
				if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(4, 4, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(4, 4, $row->pnopes);}
				$objget->setCellValueByColumnAndRow(5, 4, $row->nama_kelas);
				$objget->setCellValueByColumnAndRow(6, 4, $row->p_benar);
				$objget->setCellValueByColumnAndRow(7, 4, $row->p_salah);
				$objget->setCellValueByColumnAndRow(8, 4, $row->p_kosong);
				$objget->setCellValueByColumnAndRow(9, 4, $row->p_nilai);
				$objget->setCellValueByColumnAndRow(10, 4, $row->k13);
				$objget->setCellValueByColumnAndRow(11, 4, $row->predikat);
				
				for ($q=1;$q<=3;$q++)
				{
					$objget->getStyle($cols9[0].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
					$objget->getStyle($cols9[1].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols9[2].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols9[6].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar2, 'Pilihan '.$q);
					$objget->setCellValueByColumnAndRow(1, $bar2, ${'jur'.$q}->kode_jurusan);
					$objget->setCellValueByColumnAndRow(2, $bar2, ${'jur'.$q}->pil_jurusan);
					$objget->setCellValueByColumnAndRow(6, $bar2, ${'jur'.$q}->nama_univ);
					$bar2++;
				}
				
				$i=0; foreach ($query->result() as $row)
				{
					$objget->getStyle($cols1[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols1[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols1[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols1[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols1[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols1[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols1[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					$objget->setCellValueByColumnAndRow(1, $bar, $id_soal[$i]);
					$objget->setCellValueByColumnAndRow(2, $bar, $jrx[$i]);
					$objget->setCellValueByColumnAndRow(3, $bar, $jawaban[$i]);
					if ($koreksi[$i] == 9)
					{$objget->setCellValueByColumnAndRow(4, $bar, 'Kosong'); } elseif ($koreksi[$i] == 1)
					{
						$objget->setCellValueByColumnAndRow(4, $bar, 'Benar'); 
						$objget->getStyle('E'.$bar)->getFont()->getColor()->setRGB('008000');
						} else {
						$objget->setCellValueByColumnAndRow(4, $bar, 'Salah'); 
						$objget->getStyle('E'.$bar)->getFont()->getColor()->setRGB('FF0000');
					}
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kyd);
					$pe = ($analisa1[$i])/$jml_siswa;
					$persentase = $pe*100;
					
					$objget->setCellValueByColumnAndRow(6, $bar, round($persentase, 2));
					$bar++;
					$no++;
					$i++;
				}
				
				
				
				
				//simpan dalam file sample.xls
				$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
				try {
					header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
					header("Cache-Control: no-store, no-cache, must-revalidate");
					header("Cache-Control: post-check=0, pre-check=0", false);
					header("Pragma: no-cache");
					header('Content-Type:  application/vnd.ms-excel');
					//ubah nama file saat diunduh
					header('Content-Disposition: attachment; filename="'.$nama.'.xls"'); 
					
					ob_end_clean();             
					$objWriter->save('php://output');
					} catch (Exception $e) {
					redirect(site_url('Controller2/notif_error'));
					die();
				}
				} else {
				redirect(site_url('Controller2/notif2'));
			}
		}
		
		function Cetak_siswa_e($id_proses)
		{
			$objPHPExcel = new PHPExcel();
			
			// Set properties
        	$objPHPExcel->getProperties()
			->setCreator("JCom CBT Online") //creator
			->setTitle("Hasil Ujian");  //file title
			
			$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
			$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
			
			$objget->setTitle('Sample Sheet'); //sheet title
			$objset->setCellValue('A1',$this->input->post('judul')); //insert cell value
			$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size
			$objget->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objset->setCellValue('A2',$this->input->post('head2')); //insert cell value
			$objget->getStyle('A2')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size	
			$objget->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			//table header
			
			//merger
			$objget->mergeCells('A1:K1');	
			$objget->mergeCells('A2:K2');
			$objget->mergeCells('A3:D3');
			$objget->mergeCells('A4:D4');
			$objget->mergeCells('C6:F6');
			$objget->mergeCells('C7:F7');
			$objget->mergeCells('C8:F8');
			$objget->mergeCells('C9:F9');
			$objget->mergeCells('H6:I6');
			$objget->mergeCells('B11:F11');
			
			
			$cols = array("A","E","F","G","H","I","J","K","L","M","N");
			$val1 = array("NAMA PESERTA","NO PESERTA","KELAS","BENAR","SALAH","KOSONG","NILAI","PREDIKAT");
			for ($b=0;$b<8;$b++) 
			{
				$objset->setCellValue($cols[$b].'3', $val1[$b]);
				//set borders 								
				$objget->getColumnDimension($cols[$b])->setAutoSize(true);
				//set alignment
				$objget->getStyle($cols[$b].'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[$b].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols[$b].'3')->getFont()->setBold(true) ;
				//fill
				$objget->getStyle($cols[$b].'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols[$b].'3')->getFill()->getStartColor()->setRGB('D8D8D8');				
			}		
			
			$cols9 = array("A","B","C","G","H");
			$val9 = array("PILIHAN","KODE JURUSAN","PRODI PILIHAN","UNIVERSITAS","PREDIKSI DAN SELISI SOAL");
			for ($r=0;$r<5;$r++) 
			{
				$objset->setCellValue($cols9[$r].'6', $val9[$r]);
				//set borders 
				$objget->getColumnDimension($cols9[$r])->setAutoSize(true);
				//set alignment
				$objget->getStyle($cols9[$r].'6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols9[$r].'6')->getFont()->setBold(true) ;
				//fill
				$objget->getStyle($cols9[$r].'6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols9[$r].'6')->getFill()->getStartColor()->setRGB('D8D8D8');
			}	
			
			$cols1 = array("A","B","G");
			$val = array("NO","JAWABAN","NILAI");
			for ($a=0;$a<3;$a++) 
			{
				$objset->setCellValue($cols1[$a].'11', $val[$a]);
				//set borders
				
				
				//set alignment
				$objget->getStyle($cols1[$a].'11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols1[$a].'11')->getFont()->setBold(true) ;
				//fill
				$objget->getStyle($cols1[$a].'11')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols1[$a].'11')->getFill()->getStartColor()->setRGB('D8D8D8');
			}
			
			
			
			$nf = $this->input->post('excel2');
			$nama = $nf;
			$id_proses = $this->input->post('id_proses');
			$where = "proses.id_proses=$id_proses";
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian' ); 
			$this->db->from('proses');
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();
			$res = $query->result();
			$row = $res[0];
			
			$jml_soal = $row->jml_soal;
			$tampil_soal = explode(',',$row->no_soal);
			
			$analisa1 = explode(',',$row->analisa);
			$hjawaban = explode(',',$row->hasil_jawaban);
			$jawaban = str_replace("|",",",$hjawaban);
			$jrx = explode(',',$row->sort_jrx);
			$id_soal = explode(',',$row->sort_soal);
			$koreksi = explode(',',$row->sort_hasil);
			$pn = explode(',',$row->proses_nilai);
			
			$this ->db->order_by("id_soal");
			$this->db->select('*');
			$this->db->from('soal');
			$this->db->where_in('id_soal',$tampil_soal);
			$query = $this->db->get ();			
			
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->where('id',$row->id);
			$query1 = $this->db->get();
			$jurusan = $query1->result();
			$jur = $jurusan[0]; 
			
			$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->where('kode_jurusan',$jur->jurusan1);
			$query2 = $this->db->get();
			$jurusan1 = $query2->result();
			$jur1 = $jurusan1[0];
			
			$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->where('kode_jurusan',$jur->jurusan2);
			$query3 = $this->db->get();
			$jurusan2 = $query3->result();
			$jur2 = $jurusan2[0];
			
			$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->where('kode_jurusan',$jur->jurusan3);
			$query4 = $this->db->get();
			$jurusan3 = $query4->result();
			$jur3 = $jurusan3[0];
			
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($e == '0') {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
				} else {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->order_by("proses.p_nilai", "desc");
			$query7 = $this->db->get();
			$jml_siswa = $query7->num_rows();
			
			$bar = 12;
			$bar2 = 7;
			$no = 1;
			if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(0, 4, $row->nama);} else {$objget->setCellValueByColumnAndRow(0, 4, $row->pnama);}
			if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(4, 4, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(4, 4, $row->pnopes);}
			$objget->setCellValueByColumnAndRow(5, 4, $row->nama_kelas);
			$objget->setCellValueByColumnAndRow(6, 4, $row->p_benar);
			$objget->setCellValueByColumnAndRow(7, 4, $row->p_salah);
			$objget->setCellValueByColumnAndRow(8, 4, $row->p_kosong);
			$objget->setCellValueByColumnAndRow(9, 4, $row->p_nilai);
			$objget->setCellValueByColumnAndRow(10, 4, $row->predikat);
			
			for ($q=1;$q<=3;$q++)
			{
				$objget->getStyle($cols9[0].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$objget->getStyle($cols9[1].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols9[2].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols9[6].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				
				$objget->setCellValueByColumnAndRow(0, $bar2, 'Pilihan '.$q);
				$objget->setCellValueByColumnAndRow(1, $bar2, ${'jur'.$q}->kode_jurusan);
				$objget->setCellValueByColumnAndRow(2, $bar2, ${'jur'.$q}->pil_jurusan);
				$objget->setCellValueByColumnAndRow(6, $bar2, ${'jur'.$q}->nama_univ);
				$bar2++;
			}
			
			
			
			$i=0; foreach ($query->result() as $row)
			{
				
				$objget->getStyle($cols1[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$objget->mergeCells('B'.$bar.':F'.$bar);
				$objget->setCellValueByColumnAndRow(0, $bar, $no);
				$objget->setCellValueByColumnAndRow(1, $bar, str_replace("~",",",$jawaban[$i]));
				$objget->setCellValueByColumnAndRow(6, $bar, $pn[$i]);
				$bar++;
				$no++;
				$i++;
			}
			
			
			
			
			//simpan dalam file sample.xls
			$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
			try {
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				header('Content-Type:  application/vnd.ms-excel');
				//ubah nama file saat diunduh
				header('Content-Disposition: attachment; filename="'.$nama.'.xls"'); 
				
				ob_end_clean();             
				$objWriter->save('php://output');
				} catch (Exception $e) {
				redirect(site_url('Controller2/notif_error'));
				die();
			}
		}
		
		function Cetak_siswa_multi($id_proses)
		{
			$objPHPExcel = new PHPExcel();
			
			// Set properties
        	$objPHPExcel->getProperties()
			->setCreator("JCom CBT Online") //creator
			->setTitle("Hasil Ujian");  //file title
			
			$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
			$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
			
			$objget->setTitle('Sample Sheet'); //sheet title
			$objset->setCellValue('A1',$this->input->post('judul')); //insert cell value
			$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size
			$objget->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			
			$objset->setCellValue('A2',$this->input->post('head2')); //insert cell value
			$objget->getStyle('A2')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size	
			$objget->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			//table header
			
			//merger
			
			
            $cols = array("A","E","F","G","H","I","J","K","L");
			$val1 = array("NAMA PESERTA","NO PESERTA","KELAS","BENAR","SALAH","KOSONG","NILAI","SKALA","PREDIKAT");
			for ($b=0;$b<9;$b++) 
			{
				$objset->setCellValue($cols[$b].'3', $val1[$b]);
				//set borders 
				
				
				$objget->getColumnDimension($cols[$b])->setAutoSize(true);
				//set alignment
				$objget->getStyle($cols[$b].'3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[$b].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols[$b].'3')->getFont()->setBold(true) ;
				//fill
				$objget->getStyle($cols[$b].'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols[$b].'3')->getFill()->getStartColor()->setRGB('D8D8D8');
				
			}	
			
			$cols2 = array("A","B","C","D","E","F","G","H");
			$val2 = array("MATA PELAJARAN","JUMLAH SOAL","BENAR","SALAH","KOSONG","NILAI","SKALA","PREDIKAT");
			for ($a=0;$a<8;$a++) 
			{
				$objset->setCellValue($cols2[$a].'6', $val2[$a]);
				//set borders
				
				
				//set alignment
				$objget->getStyle($cols2[$a].'6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols2[$a].'6')->getFont()->setBold(true) ;
				//fill
				$objget->getStyle($cols2[$a].'6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols2[$a].'6')->getFill()->getStartColor()->setRGB('D8D8D8');
			}
			
			
			
			
			$nf = $this->input->post('excel2');
			$nama = $nf;
			$id_proses = $this->input->post('id_proses');
			$where = "proses.id_proses=$id_proses";
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian' ); 
			$this->db->from('proses');
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();
			$res = $query->result();
			$row = $res[0]; 
			
			$jml_soal = $row->jml_soal;
			$jml_mapel= $row->jumlah_mapel;
			for ($o=1;$o<=$jml_mapel;$o++)
			{
				${'mapel'.$o} = $row->{'mapel'.$o};
				${'jml_mapel'.$o} = $row->{'jml_mapel'.$o};
				${'benar'.$o} = $row->{'benar'.$o};
				${'salah'.$o} = $row->{'salah'.$o};
				${'kosong'.$o} = $row->{'kosong'.$o};
				${'nilai'.$o} = $row->{'nilai'.$o};
				${'k13_'.$o} = $row->{'k13_'.$o};
				${'predikat'.$o} = $row->{'predikat'.$o};
			}
			
			$cols1 = array("A","B","C","D","E","F","G","H","I","J","K");
			$val = array("NO","KODE SOAL","KUNCI","JAWABAN","KOREKSI","KEMAMPUAN YANG DIUJI","PERSENTASE");
		    $bar2 = $jml_mapel+13;
			for ($a=0;$a<7;$a++) 
			{
				$objset->setCellValue($cols1[$a].$bar2, $val[$a]);
				//set borders
				
				
				//set alignment
				$objget->getStyle($cols1[$a].$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols1[$a].$bar2)->getFont()->setBold(true) ;
				//fill
				$objget->getStyle($cols1[$a].$bar2)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols1[$a].$bar2)->getFill()->getStartColor()->setRGB('D8D8D8');
			}
			
			$jml_soal = $row->jml_soal;
			$tampil_soal = explode(',',$row->no_soal);
			
			$analisa1 = explode(',',$row->analisa);
			$jawaban = explode(',',$row->sort_jawaban);
			$jrx = explode(',',$row->sort_jrx);
			$id_soal = explode(',',$row->sort_soal);
			$koreksi = explode(',',$row->sort_hasil);
			
			$this ->db->order_by("id_soal");
			$this->db->select('*');
			$this->db->from('soal');
			$this->db->where_in('id_soal',$tampil_soal);
			$query = $this->db->get ();		
			
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->where('id',$row->id);
			$query1 = $this->db->get();
			$jurusan = $query1->result();
			$jur = $jurusan[0]; 
			
			$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->where('kode_jurusan',$jur->jurusan1);
			$query2 = $this->db->get();
			$jurusan1 = $query2->result();
			$jur1 = $jurusan1[0];
			
			$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->where('kode_jurusan',$jur->jurusan2);
			$query3 = $this->db->get();
			$jurusan2 = $query3->result();
			$jur2 = $jurusan2[0];
			
			$this->db->select('*');
			$this->db->from('jurusan');
			$this->db->where('kode_jurusan',$jur->jurusan3);
			$query4 = $this->db->get();
			$jurusan3 = $query4->result();
			$jur3 = $jurusan3[0];
			
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($e == '0') {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
				} else {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->order_by("proses.p_nilai", "desc");
			$query7 = $this->db->get();
			$jml_siswa = $query7->num_rows();
			
			$bar1 = 7;
			$bar = $jml_mapel+14;
			$bar2 = $jml_mapel+9;
			$bar3 = $jml_mapel+8;
			$no = 1;
			
			$objget->mergeCells('A1:L1');	
			$objget->mergeCells('A2:L2');
			$objget->mergeCells('A3:D3');
			$objget->mergeCells('A4:D4');
			$objget->mergeCells('C'.($jml_mapel+8).':F'.($jml_mapel+8));
			$objget->mergeCells('C'.($jml_mapel+9).':F'.($jml_mapel+9));
			$objget->mergeCells('C'.($jml_mapel+10).':F'.($jml_mapel+10));
			$objget->mergeCells('C'.($jml_mapel+11).':F'.($jml_mapel+11));
			$objget->mergeCells('H'.($jml_mapel+8).':I'.($jml_mapel+8));
			
			$cols9 = array("A","B","C","G","H");
			$val9 = array("PILIHAN","KODE JURUSAN","PRODI PILIHAN","UNIVERSITAS","PREDIKSI DAN SELISI SOAL");
			for ($r=0;$r<5;$r++) 
			{
				$objset->setCellValue($cols9[$r].$bar3, $val9[$r]);
				//set borders 
				$objget->getColumnDimension($cols9[$r])->setAutoSize(true);
				//set alignment
				$objget->getStyle($cols9[$r].$bar3)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols9[$r].$bar3)->getFont()->setBold(true) ;
				//fill
				$objget->getStyle($cols9[$r].$bar3)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols9[$r].$bar3)->getFill()->getStartColor()->setRGB('D8D8D8');
			}
			
			
			
			if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(0, 4, $row->nama);} else {$objget->setCellValueByColumnAndRow(0, 4, $row->pnama);}
			if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(4, 4, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(4, 4, $row->pnopes);}
			$objget->setCellValueByColumnAndRow(5, 4, $row->nama_kelas);
			$objget->setCellValueByColumnAndRow(6, 4, $row->p_benar);
			$objget->setCellValueByColumnAndRow(7, 4, $row->p_salah);
			$objget->setCellValueByColumnAndRow(8, 4, $row->p_kosong);
			$objget->setCellValueByColumnAndRow(9, 4, $row->p_nilai);
			$objget->setCellValueByColumnAndRow(10, 4, $row->k13);
			$objget->setCellValueByColumnAndRow(11, 4, $row->predikat);
			
			
			for ($n=1;$n<=$jml_mapel;$n++)
			{
				$objget->getStyle($cols1[0].''.$bar1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[1].''.$bar1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[2].''.$bar1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[3].''.$bar1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[4].''.$bar1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[5].''.$bar1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[6].''.$bar1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[7].''.$bar1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$objget->setCellValueByColumnAndRow(0, $bar1, ${'mapel'.$n});
				$objget->setCellValueByColumnAndRow(1, $bar1, ${'jml_mapel'.$n});
				$objget->setCellValueByColumnAndRow(2, $bar1, ${'benar'.$n});
				$objget->setCellValueByColumnAndRow(3, $bar1, ${'salah'.$n});
				$objget->setCellValueByColumnAndRow(4, $bar1, ${'kosong'.$n});
				$objget->setCellValueByColumnAndRow(5, $bar1, ${'nilai'.$n});
				$objget->setCellValueByColumnAndRow(6, $bar1, ${'k13_'.$n});
				$objget->setCellValueByColumnAndRow(7, $bar1, ${'predikat'.$n});
				$bar1++;
			}
			
			for ($q=1;$q<=3;$q++)
			{
				$objget->getStyle($cols9[0].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
				$objget->getStyle($cols9[1].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols9[2].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols9[6].''.$bar2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$objget->setCellValueByColumnAndRow(0, $bar2, 'Pilihan '.$q);
				$objget->setCellValueByColumnAndRow(1, $bar2, ${'jur'.$q}->kode_jurusan);
				$objget->setCellValueByColumnAndRow(2, $bar2, ${'jur'.$q}->pil_jurusan);
				$objget->setCellValueByColumnAndRow(6, $bar2, ${'jur'.$q}->nama_univ);
				$bar2++;
			}
			
			
			
			
			$i=0; foreach ($query->result() as $row)
			{
				$objget->getStyle($cols1[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols1[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				
				$objget->setCellValueByColumnAndRow(0, $bar, $no);
				$objget->setCellValueByColumnAndRow(1, $bar, $id_soal[$i]);
				$objget->setCellValueByColumnAndRow(2, $bar, $jrx[$i]);
				$objget->setCellValueByColumnAndRow(3, $bar, $jawaban[$i]);
				if ($koreksi[$i] == 9)
				{$objget->setCellValueByColumnAndRow(4, $bar, 'Kosong'); } elseif ($koreksi[$i] == 1)
				{
					$objget->setCellValueByColumnAndRow(4, $bar, 'Benar'); 
					$objget->getStyle('E'.$bar)->getFont()->getColor()->setRGB('008000');
					} else {
					$objget->setCellValueByColumnAndRow(4, $bar, 'Salah'); 
					$objget->getStyle('E'.$bar)->getFont()->getColor()->setRGB('FF0000');
				}
				$objget->setCellValueByColumnAndRow(5, $bar, $row->kyd);
				
				$pe = ($analisa1[$i])/$jml_siswa;
				$persentase = $pe*100;
				
				$objget->setCellValueByColumnAndRow(6, $bar, round($persentase, 2));
				$bar++;
				$no++;
				$i++;
			}
			
			//simpan dalam file sample.xls
			$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
			try {
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				header('Content-Type:  application/vnd.ms-excel');
				//ubah nama file saat diunduh
				header('Content-Disposition: attachment; filename="'.$nama.'.xls"'); 
				
				ob_end_clean();             
				$objWriter->save('php://output');
				} catch (Exception $e) {
				redirect(site_url('Controller2/notif_error'));
				die();
			}
		}
		
		public function notif()
		{
			$data['pesan'] = 'Data sudah berhasil diekspor ke Excel.';
			$this->load->view('view12',$data);		
		}
		
		public function notif_error()
		{
			$data['pesan'] = 'Data <span style="color:red"><b>GAGAL</b></span> diekspor ke Excel! Periksa konfigurasi <b>Lokasi Folder</b>.';
			$this->load->view('view12',$data);		
		}
		
		public function notif2()
		{
			$data['pesan'] = 'Data <span style="color:red"><b>GAGAL</b></span> diekspor ke Excel! Lakukan <b>Proses Analisa</b> terlebih dahulu.';
			$this->load->view('view12',$data);		
		}
		
		function analisa()
		{
			$objPHPExcel = new PHPExcel();
			
			// Set properties
        	$objPHPExcel->getProperties()
			->setCreator("JCom CBT Online") //creator
			->setTitle("Analisa Ujian");  //file title
			
			$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
			$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
			
			$objget->setTitle('Sample Sheet'); //sheet title
			$objset->setCellValue('A1',$this->input->post('judul')); //insert cell value
			$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size
			$objget->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objset->setCellValue('A2',$this->input->post('ketkelas')); //insert cell value
			$objget->getStyle('A2')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size	
			$objget->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objget->mergeCells('A1:E1');	
			$objget->mergeCells('A2:E2');
			
			//table header
			$cols = array("A","B","C","D","E","F");
			$val = array("NO SOAL","KEMAMPUAN YANG DIUJI","JUMLAH BENAR","KESUKARAN","PERSENTASE","KATEGORI");
			for ($a=0;$a<6;$a++) 
			{
				$objset->setCellValue($cols[$a].'4', $val[$a]);
				//set borders
				
				//set alignment
				$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
				$objget->getColumnDimension($cols[$a])->setAutoSize(true);
				$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
			}
			
			//taruh baris data disini
			$bar = 5;
			$no = 1;
			
			$nf = $this->input->post('excel2');
			$nama = $nf;
			$data = $this->model1->cetak();
			
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($e == '0') {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
				} else {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->order_by("proses.p_nilai", "desc");
			$query = $this->db->get();
			$res = $query->result();
			$row = $res[0];
			$jml_siswa = $query->num_rows();
			
			$this->db->select ( '*' ); 
			$this->db->from('setting');
			$query1 = $this->db->get();
			$res1 = $query1->result();
			$row1 = $res1[0]; 
			
			$analisa = explode(',',$row->analisa);
			$jml = $row->jml_soal;
			
			for ($i=0;$i<$jml;$i++) 
			{
				$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$objget->setCellValueByColumnAndRow(0, $bar, $no);
				
				$sort_soal = explode(',',$row->sort_soal);
                $this->db->select('*');
				$this->db->from('soal');
				$this->db->where('id_soal',$sort_soal[$i]);
				$query2 = $this->db->get ();	
				$res2 = $query2->result();
				$row2 = $res2[0];
				
				$objget->setCellValueByColumnAndRow(1, $bar, $row2->kyd);
				$objget->setCellValueByColumnAndRow(2, $bar, $analisa[$i]);
				$pe = ($analisa[$i]/$jml_siswa);
				$kesukaran = $pe;
				$persentase = $pe*100;
				$objget->setCellValueByColumnAndRow(3, $bar, round($kesukaran, 2));
				$objget->setCellValueByColumnAndRow(4, $bar, round($persentase, 2));
				
				if (($pe*100)>=0 and ($pe*100)<=$row1->p1) {					
				$objget->setCellValueByColumnAndRow(5, $bar, $row1->k1);}
				else if (($pe*100)>$row1->p1 and ($pe*100)<=$row1->p2) {
				$objget->setCellValueByColumnAndRow(5, $bar, $row1->k2);}
				else if (($pe*100)>$row1->p2 and ($pe*100)<=$row1->p3) {
				$objget->setCellValueByColumnAndRow(5, $bar, $row1->k3);}
				else if (($pe*100)>$row1->p3 and ($pe*100)<=$row1->p4) {
				$objget->setCellValueByColumnAndRow(5, $bar, $row1->k4);}
				
				$bar++;
				$no++;
			}
			
			//simpan dalam file sample.xls
			$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
			try {
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				header('Content-Type:  application/vnd.ms-excel');
				//ubah nama file saat diunduh
				header('Content-Disposition: attachment; filename="'.$nama.'.xls"'); 
				
				ob_end_clean();             
				$objWriter->save('php://output');
				} catch (Exception $e) {
				redirect(site_url('Controller2/notif_error'));
				die();
			}
		}
		
		function setting()
		{
			$data['teks'] = $this->model1->settinganalisa()->row();
			$this->load->view('view54', $data);
		}
		
		function setting2()
		{
			$data['teks'] = $this->model1->settinganalisa()->row();
			$this->load->view('view54a', $data);
		}
		
		public function simpan()
		{
			$data['p1'] = $this->input->post('p1');
			$data['p2'] = $this->input->post('p2');
			$data['p3'] = $this->input->post('p3');
			$data['p4'] = $this->input->post('p4');
			$data['k1'] = $this->input->post('k1');
			$data['k2'] = $this->input->post('k2');
			$data['k3'] = $this->input->post('k3');
			$data['k4'] = $this->input->post('k4');
            $this->model1->updateanalisa($data);
			$data['teks'] = $this->model1->settinganalisa()->row();
			$this->load->view('view54', $data);
		}
		
		public function simpan2()
		{
			$data['an1'] = $this->input->post('an1');
			$data['an2'] = $this->input->post('an2');
			$data['an3'] = $this->input->post('an3');
			$data['an4'] = $this->input->post('an4');
			$data['an5'] = $this->input->post('an5');
			$data['ak1'] = $this->input->post('ak1');
			$data['ak2'] = $this->input->post('ak2');
			$data['ak3'] = $this->input->post('ak3');
			$data['ak4'] = $this->input->post('ak4');
			$data['ak5'] = $this->input->post('ak5');
			$data['r1a'] = $this->input->post('r1a');
			$data['r2a'] = $this->input->post('r2a');
			$data['r3a'] = $this->input->post('r3a');
			$data['r4a'] = $this->input->post('r4a');
			$data['r5a'] = $this->input->post('r5a');
			$data['r1b'] = $this->input->post('r1b');
			$data['r2b'] = $this->input->post('r2b');
			$data['r3b'] = $this->input->post('r3b');
			$data['r4b'] = $this->input->post('r4b');
			$data['r5b'] = $this->input->post('r5b');
			$data['skor'] = $this->input->post('skor');
			$data['skormax'] = $this->input->post('skormax');
            $this->model1->updateanalisa($data);
			$data['teks'] = $this->model1->settinganalisa()->row();
			$this->load->view('view54a', $data);
		}
		
		public function prosesanalisa()
		{
            $c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			if ($e == '0') {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
				} else {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();
			
			foreach($query->result_array() as $row){
				
				$id = $row["id_proses"];
				$a = explode(",",$row["no_soal"]);
				$b = explode(",",$row["proses_nilai"]);
				$c = array_combine($a, $b);
				ksort($c);
				
				$e = array_values($c);
				$f = implode(",",$c);
				$g = array_keys($c);
				$h = implode(",",$g);
				
				$b1 = explode(",",$row["hasil_jawaban"]);
				$c1 = array_combine($a, $b1);
				ksort($c1);								
				$f1 = implode(",",$c1);	
				
				$b2 = explode(",",$row["jrx"]);
				$c2 = array_combine($a, $b2);
				ksort($c2);							
				$f2 = implode(",",$c2);
				
				$data['sort_hasil'] = $f;
				$data['sort_soal'] = $h;
				$data['sort_jawaban'] = $f1;
				$data['sort_jrx'] = $f2;
				$this->model1->prosesupdate($id,$data);		
			}						
			redirect(site_url('Controller2/notifanalisa'));
		}
		
		public function notifanalisa()
		{   
			
			$this->db->select('*');
			$this->db->from('setting');
			$query6 = $this->db->get ();												
			$qrow6 = $query6->result();
			$row6 = $qrow6[0];
			$skor = $row6->skor;
			
			
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($e == '0') {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
				} else {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();	
			$res2 = $query->result();
			$jml_siswa = $query->num_rows();
			
			
			if( !$res2 )
			{
				$data['pesan'] = 'Proses analisa gagal! <br/>Silakan lengkapi tanggal awal dan tanggal akhir ujian';
				$this->load->view('view12',$data);	
			}
			else
			{
				$row2 = $res2[0];	
				$x = $row2->jml_soal;
				$jml = $row2->jml_soal;
				$analisa = explode(',',$row2->analisa);
				
				
				if ($e == '0') {
					$where1= "proses.cek='1' AND proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
					} else {
					$where1= "proses.cek='1' AND proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
				}
				
				$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
				$this->db->from ( 'proses' );
				$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
				$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
				$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
				$this->db->where($where1);
				
				$query1 = $this->db->get();	
				$res3 = $query1->result();
				
				
				if ($query1->num_rows()>0) {
					$row3 = $res3[0];				
				$y = $row3->cek;} else {$y = 0;}
				
				
				if ($y == 1)
				{
					$data['pesan'] = 'Proses analisa gagal! <br/>Silakan cek siswa yang masih belum memiliki nilai melalui menu Monitoring. <br/>Ditandai dengan icon <i class="fa fa-user-circle-o" aria-hidden="true" style="color:red;"></i>';
					$this->load->view('view12',$data);	
				}
				else
				{
					$data1 = $this->model1->cetak();
					
					foreach ($data1 AS $record) {
						
						$k = array();				
						for ($j = 0; $j < $x; $j++) 
						{
							$i=0;
							foreach($query->result_array() as $row){
								$id = $row["id_proses"];
								$m = explode(",",$row["sort_hasil"]);
								
								if ($m[$j]==9){
									$i = $i + 0;
									} else {
									$i = $i + $m[$j];
								}				
							}
							
							array_push($k, $i);
						}
						$l = implode(",",$k);
						
						$data['analisa'] = $l;
						
						$bs = array();
						for ($i1=0;$i1<$jml;$i1++) 
						{
							$pe = ($k[$i1]/$jml_siswa);
							
							if ($pe<0.3) {
								$bobot = 4;
							} 
							else if ($pe>=0.3 AND $pe<0.7)
							{
								$bobot = 3;
							}
							else if ($pe>=0.7)
							{
								$bobot = 2;
							}
							array_push($bs, $bobot);
						}
						$bs1 = implode(",",$bs);
						$data['bobot_jrx'] = $bs1;	
						$this->model1->prosesupdate2($data);
						
						$no_copy = $record->no_copy;
						$bobot_kunci = $record->bobot_jrx;
						$bobot_jwb = $record->bobot_jwb;
						$jumlah_mapel = $record->jumlah_mapel;
						$jml_mapel1 = $record->jml_mapel1;
						$jml_mapel2 = $record->jml_mapel2;
						$jml_mapel3 = $record->jml_mapel3;
						$jml_mapel4 = $record->jml_mapel4;
						$jml_mapel5 = $record->jml_mapel5;
						$jml_mapel6 = $record->jml_mapel6;
						$jml_mapel7 = $record->jml_mapel7;
						$jml_mapel8 = $record->jml_mapel8;
						$jml_mapel9 = $record->jml_mapel9;
						$jml_mapel10 = $record->jml_mapel10;
						$snl1 = $record->snl1;
						$snl2 = $record->snl2;
						$snl3 = $record->snl3;
						$sh = explode(",",$record->sort_hasil);
						$bj = array();
						for ($i2=0;$i2<$jml;$i2++) 
						{
							if($sh[$i2]==9)
							{
								$bobotjwb = $sh[$i2] * 0;
							} else
							{
								$bobotjwb = $sh[$i2] * $bs[$i2];
							}
							
							array_push($bj, $bobotjwb);
						}
						$bj1 = implode(",",$bj);
						
						
						$data2['bobot_jwb'] = $bj1;	
						
						$bs1 = array_sum(array_slice($bs, 0, $jml_mapel1));
						$bs2 = array_sum(array_slice($bs, $jml_mapel1, $jml_mapel2));
						$bs3 = array_sum(array_slice($bs, $jml_mapel1+$jml_mapel2, $jml_mapel3));
						$bs4 = array_sum(array_slice($bs, $jml_mapel1+$jml_mapel2+$jml_mapel3, $jml_mapel4));
						$bs5 = array_sum(array_slice($bs, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4, $jml_mapel5));
						$bs6 = array_sum(array_slice($bs, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5, $jml_mapel6));
						$bs7 = array_sum(array_slice($bs, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6, $jml_mapel7));
						$bs8 = array_sum(array_slice($bs, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7, $jml_mapel8));
						$bs9 = array_sum(array_slice($bs, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8, $jml_mapel9));
						$bs10 = array_sum(array_slice($bs, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9, $jml_mapel10));
						
						$bt1 = array_sum(array_slice($bj, 0, $jml_mapel1));
						$bt2 = array_sum(array_slice($bj, $jml_mapel1, $jml_mapel2));
						$bt3 = array_sum(array_slice($bj, $jml_mapel1+$jml_mapel2, $jml_mapel3));
						$bt4 = array_sum(array_slice($bj, $jml_mapel1+$jml_mapel2+$jml_mapel3, $jml_mapel4));
						$bt5 = array_sum(array_slice($bj, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4, $jml_mapel5));
						$bt6 = array_sum(array_slice($bj, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5, $jml_mapel6));
						$bt7 = array_sum(array_slice($bj, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6, $jml_mapel7));
						$bt8 = array_sum(array_slice($bj, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7, $jml_mapel8));
						$bt9 = array_sum(array_slice($bj, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8, $jml_mapel9));
						$bt10 = array_sum(array_slice($bj, $jml_mapel1+$jml_mapel2+$jml_mapel3+$jml_mapel4+$jml_mapel5+$jml_mapel6+$jml_mapel7+$jml_mapel8+$jml_mapel9, $jml_mapel10));
						
						if ($bt1==0) {
							$data2['bt1']=0; 
							$nt1=0;
							} else {
							$data2['bt1']= ($bt1/$bs1)*$skor;
							$nt1= ($bt1/$bs1)*$skor;
						}
						
						if ($bt2==0) {
							$data2['bt2']=0; 
							$nt2=0;
							} else {
							$data2['bt2']= ($bt2/$bs2)*$skor;
							$nt2 =($bt2/$bs2)*$skor;
						}
						
						if ($bt3==0) {
							$data2['bt3']=0; 
							$nt3=0;
							} else {
							$data2['bt3']= ($bt3/$bs3)*$skor;
							$nt3=($bt3/$bs3)*$skor;
						}
						
						if ($bt4==0) {
							$data2['bt4']=0; 
							$nt4=0;
							} else {
							$data2['bt4']= ($bt4/$bs4)*$skor;
							$nt4= ($bt4/$bs4)*$skor;
						}
						
						if ($bt5==0) {
							$data2['bt5']=0; 
							$nt5=0;
							} else {
							$data2['bt5']= ($bt5/$bs5)*$skor;
							$nt5= ($bt5/$bs5)*$skor;
						}
						
						if ($bt6==0) {
							$data2['bt6']=0;
							$nt6=0;
							} else {
							$data2['bt6']= ($bt6/$bs6)*$skor;
							$nt6= ($bt6/$bs6)*$skor;
						}
						
						if ($bt7==0) {
							$data2['bt7']=0; 
							$nt7=0;
							} else {
							$data2['bt7']= ($bt7/$bs7)*$skor;
							$nt7= ($bt7/$bs7)*$skor;
						}
						
						if ($bt8==0) {
							$data2['bt8']=0; 
							$nt8=0;
							} else {
							$data2['bt8']= ($bt8/$bs8)*$skor;
							$nt8= ($bt8/$bs8)*$skor;
						}
						
						if ($bt9==0) {
							$data2['bt9']=0;
							$nt9=0;
							} else {
							$data2['bt9']= ($bt9/$bs9)*$skor;
							$nt9= ($bt9/$bs9)*$skor;
						}
						
						if ($bt10==0) {
							$data2['bt10']=0; 
							$nt10=0;
							} else {
							$data2['bt10']= ($bt10/$bs10)*$skor;
							$nt10= ($bt10/$bs10)*$skor;
						}
						
						$total = $nt1+$nt2+$nt3+$nt4+$nt5+$nt6+$nt7+$nt8+$nt9+$nt10;
						$rt = round($total/$jumlah_mapel,2);
						$data2['bt']= $total;
						$data2['rt']= round($total/$jumlah_mapel,2);
						
						/*----*/
						$nk = 0;
						
						for ($i=0;$i<$jml;$i++) 
						{
							
							$pe = ($analisa[$i]/$jml_siswa);	
							
							
							if (($pe*100)>=$row6->r5a and ($pe*100)<=$row6->r5b) {					
								$level = $row6->an5;
								
							}
							else if (($pe*100)>$row6->r4a and ($pe*100)<=$row6->r4b) {
								$level = $row6->an4;
							}
							else if (($pe*100)>$row6->r3a and ($pe*100)<=$row6->r3b) {
								$level = $row6->an3;
							}
							else if (($pe*100)>$row6->r2a and ($pe*100)<=$row6->r2b) {
								$level = $row6->an2;
							}
							else if (($pe*100)>$row6->r1a and ($pe*100)<=$row6->r1b) {
								$level = $row6->an1;
							}
							
							$nk = $nk + $level;						
						}
						
						$rn = $row6->skormax - $row6->skor;
						
						$kn = 0;
						
						
						for ($x=0;$x<$jml;$x++) 
						{
							
							$mn = explode(',',$record->sort_hasil);
							
							$pe = ($analisa[$x]/$jml_siswa);
							
							if (($pe*100)>=$row6->r5a and ($pe*100)<=$row6->r5b) {					
								$level = $row6->an5;
								
								if ($mn[$x]==9){
								$nilai = 0;}
								else{
									$nilai = $mn[$x];
								}
								$irt = ($rn/$nk)*$level*$nilai;
								
							}
							else if (($pe*100)>$row6->r4a and ($pe*100)<=$row6->r4b) {
								$level = $row6->an4;
								if ($mn[$x]==9){
								$nilai = 0;}
								else{
									$nilai = $mn[$x];
								}
								$irt = ($rn/$nk)*$level*$nilai;
							}
							else if (($pe*100)>$row6->r3a and ($pe*100)<=$row6->r3b) {
								$level = $row6->an3;
								if ($mn[$x]==9){
								$nilai = 0;}
								else{
									$nilai = $mn[$x];
								}
								$irt = ($rn/$nk)*$level*$nilai;
							}
							else if (($pe*100)>$row6->r2a and ($pe*100)<=$row6->r2b) {
								$level = $row6->an2;
								if ($mn[$x]==9){
								$nilai = 0;}
								else{
									$nilai = $mn[$x];
								}
								$irt = ($rn/$nk)*$level*$nilai;
							}
							else if (($pe*100)>$row6->r1a and ($pe*100)<=$row6->r1b) {
								$level = $row6->an1;
								if ($mn[$x]==9){
								$nilai = 0;}
								else{
									$nilai = $mn[$x];
								}
								$irt = ($rn/$nk)*$level*$nilai;
							}
							
							$kn = $kn + $irt;	
						}
						
						
						$data2['kn']= round($kn+$row6->skor,2);
						$tot_irt = round($kn+$row6->skor,2);
						/*-----*/
						
						
						if ($snl1==0) {
						$data2['ket']= ""; }				
						else if ($tot_irt<>0 and $snl1<>0 and $tot_irt>=$snl1){
						$data2['ket']= "LULUS PIL 1"; }
						else if ($tot_irt<>0 and $snl2<>0 and $tot_irt>=$snl2) {
						$data2['ket']= "LULUS PIL 2"; }
						else if ($tot_irt<>0 and $snl3<>0 and $tot_irt>=$snl3) {
						$data2['ket']= "LULUS PIL 3"; }
						else {
							$data2['ket']= "TIDAK LULUS";
						}
						
						$this->model1->update_jawaban1($no_copy,$data2);	
						
					}
					
					
					$data['pesan'] = 'Proses analisa berhasil.';
					$this->load->view('view12',$data);		
				}
			}
		}
		
		public function prosesanalisa1()
		{
            $c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			if ($e == '0') {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
				} else {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();
			
			foreach($query->result_array() as $row){
				
				$id = $row["id_proses"];
				$a = explode(",",$row["no_soal"]);
				$b = explode(",",$row["proses_nilai"]);
				$c = array_combine($a, $b);
				ksort($c);
				
				$e = array_values($c);
				$f = implode(",",$c);
				$g = array_keys($c);
				$h = implode(",",$g);
				
				$b1 = explode(",",$row["hasil_jawaban"]);
				$c1 = array_combine($a, $b1);
				ksort($c1);								
				$f1 = implode(",",$c1);	
				
				$b2 = explode(",",$row["jrx"]);
				$c2 = array_combine($a, $b2);
				ksort($c2);							
				$f2 = implode(",",$c2);
				
				$data['sort_hasil'] = $f;
				$data['sort_soal'] = $h;
				$data['sort_jawaban'] = $f1;
				$data['sort_jrx'] = $f2;
				$this->model1->prosesupdate($id,$data);		
			}						
			redirect(site_url('Controller2/notifanalisa1'));
		}
		
		public function notifanalisa1()
		{   
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($e == '0') {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
				} else {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$query = $this->db->get();	
			$res2 = $query->result();
			if( !$res2 )
			{
				$data['pesan'] = 'Proses analisa gagal! <br/>Silakan lengkapi tanggal awal dan tanggal akhir ujian';
				$this->load->view('view12',$data);	
			}
			else
			{
				$row2 = $res2[0];	
				$x = $row2->jml_soal;
				
				
				if ($e == '0') {
					$where1= "proses.cek='1' AND proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
					} else {
					$where1= "proses.cek='1' AND proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
				}
				
				$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
				$this->db->from ( 'proses' );
				$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
				$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
				$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
				$this->db->where($where1);
				
				$query1 = $this->db->get();	
				$res3 = $query1->result();
				
				if ($query1->num_rows()>0) {
					$row3 = $res3[0];				
				$y = $row3->cek;} else {$y = 0;}
				
				
				if ($y == 1)
				{
					$data['pesan'] = 'Proses analisa gagal! <br/>Silakan cek siswa yang masih belum memiliki nilai melalui menu Monitoring. <br/>Ditandai dengan icon <i class="fa fa-user-circle-o" aria-hidden="true" style="color:red;"></i>';
					$this->load->view('view12',$data);	
				}
				else
				{
					$k = array();				
					for ($j = 0; $j < $x; $j++) 
					{
						$i=0;
						foreach($query->result_array() as $row){
							$id = $row["id_proses"];
							$m = explode(",",$row["sort_hasil"]);
							
							if ($m[$j]==9){
								$i = $i + 0;
								} else {
								$i = $i + $m[$j];
							}				
						}
						
						array_push($k, $i);
					}
					$l = implode(",",$k);
					$data['analisa'] = $l;
					$this->model1->prosesupdate2($data);
					$data['pesan'] = 'Proses analisa berhasil.';
					$this->load->view('view12',$data);		
				}
			}
		}
		
		function eksporjawaban()
		{
			$objPHPExcel = new PHPExcel();
			
			// Set properties
        	$objPHPExcel->getProperties()
			->setCreator("JCom CBT Online") //creator
			->setTitle("Ekspor Jawaban Siswa");  //file title
			
			$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
			$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
			
			$objget->setTitle('Sample Sheet'); //sheet title
			
			$data = $this->model1->cetak();
			
			
			$cols = array("A","B","C");
			$val = array("NO","NAMA","NO PESERTA");
			for ($a=0;$a<3;$a++) 
			{
				$objset->setCellValue($cols[$a].'1', $val[$a]);
				$objget->getColumnDimension($cols[$a])->setAutoSize(true);
			}
			
			$bar = 2;
			$no = 1;
			
			
			$nf = $this->input->post('excel2');
			$nama = $nf;
			$data = $this->model1->cetak();		
			
			foreach ($data  AS $row) {
				
				$objget->setCellValueByColumnAndRow(0, $bar,$no);
				if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
				if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
				$sj = explode(",",$row->sort_jawaban);
				$k = 0;
				$ns = 1;
				for($i=3;$i<=($row->jml_soal+2);$i++)
				{					
			        $objget->setCellValueByColumnAndRow($i, 1,$ns );					
					$objget->setCellValueByColumnAndRow($i, $bar,$sj[$k] );
					
					$k++;
					$ns++;
				}
				$objget->setCellValueByColumnAndRow($i, 1, "NILAI" );		
				$objget->setCellValueByColumnAndRow($i, $bar,$row->p_nilai);
				$bar++;
				$no++;
			}
			
			//simpan dalam file sample.xls
			$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
			try {
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				header('Content-Type:  application/vnd.ms-excel');
				//ubah nama file saat diunduh
				header('Content-Disposition: attachment; filename="'.$nama.'.xls"'); 
				
				ob_end_clean();             
				$objWriter->save('php://output');
				} catch (Exception $e) {
				redirect(site_url('Controller2/notif_error'));
				die();
			}
		}
		
		function analisa1()
		{
			$objPHPExcel = new PHPExcel();
			
			// Set properties
        	$objPHPExcel->getProperties()
			->setCreator("JCom CBT Online") //creator
			->setTitle("Analisa Soal Model IRT");  //file title
			
			$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
			$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
			
			$objget->setTitle('Sample Sheet'); //sheet title
			$objset->setCellValue('A1',$this->input->post('judul')); //insert cell value
			$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size
			$objget->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objset->setCellValue('A2',$this->input->post('ketkelas')); //insert cell value
			$objget->getStyle('A2')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size	
			$objget->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objget->mergeCells('A1:H1');	
			$objget->mergeCells('A2:H2');
			
			//table header
			$cols = array("A","B","C","D","E","F","G","H");
			$val = array("NO SOAL","KEMAMPUAN YANG DIUJI","MATA PELAJARAN","JUMLAH BENAR","TINGKAT KESUKARAN","KATEGORI SOAL","NILAI KONVERSI","NILAI IRT");
			for ($a=0;$a<8;$a++) 
			{
				$objset->setCellValue($cols[$a].'5', $val[$a]);
				//set borders
				
				//set alignment
				$objget->getStyle($cols[$a].'5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				//set font weight
				$objget->getStyle($cols[$a].'5')->getFont()->setBold(true) ;
				$objget->getColumnDimension($cols[$a])->setAutoSize(true);
				$objget->getStyle($cols[$a].'5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
				$objget->getStyle($cols[$a].'5')->getFill()->getStartColor()->setRGB('D8D8D8');
			}
			
			//taruh baris data disini
			$bar = 6;
			$no = 1;
			
			$nf = $this->input->post('excel2');
			$nama = $nf;
			$data = $this->model1->cetak();
			
			$c = $this->session->userdata('idkelas');
			$d = $this->session->userdata('idujian');
			$e = $this->session->userdata('sekolah');
			$wm =  $this->session->userdata('wmulai');
			$wa =  $this->session->userdata('wakhir');
			
			if ($e == '0') {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.tgl_ujian between '$wm' and '$wa'";	
				} else {
				$where= "proses.id_kelas='$c' AND proses.id_ujian='$d' AND proses.sekolah='$e' AND proses.tgl_ujian between '$wm' and '$wa'";	
			}
			
			$this->db->select ( '*,proses.nama as pnama,proses.no_peserta as pnopes,proses.nama_ujian as pnama_ujian, proses.sekolah as psekolah' ); 
			$this->db->from ( 'proses' );
			$this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
			$this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
			$this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
			$this->db->where($where);
			$this->db->order_by("proses.p_nilai", "desc");
			$query = $this->db->get();
			$res = $query->result();
			$row = $res[0];
			$jml_siswa = $query->num_rows();
			
			$mp=array();
			
			for ($x=1;$x<=$row->jumlah_mapel;$x++) 
			{
				for ($y=0;$y<$row->{'jml_mapel'.$x};$y++) 
				{
					$tmp = $row->{'mapel'.$x};
					array_push($mp,$tmp);			
				}
			}
			
			
			
			$objset->setCellValue('A4', 'Jumlah Siswa :');
			$objset->setCellValue('B4', $jml_siswa);
			
			$this->db->select ( '*' ); 
			$this->db->from('setting');
			$query1 = $this->db->get();
			$res1 = $query1->result();
			$row1 = $res1[0]; 
			$rn = $row1->skormax - $row1->skor;
			
			
			$analisa = explode(',',$row->analisa);
			$jml = $row->jml_soal;
			$nk = 0;
			
			for ($i=0;$i<$jml;$i++) 
			{
				$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$objget->setCellValueByColumnAndRow(0, $bar, $no);
				
				$sort_soal = explode(',',$row->sort_soal);
                $this->db->select('*');
				$this->db->from('soal');
				$this->db->where('id_soal',$sort_soal[$i]);
				$query2 = $this->db->get ();	
				$res2 = $query2->result();
				$row2 = $res2[0];
				
				$objget->setCellValueByColumnAndRow(1, $bar, $row2->kyd);
				$objget->setCellValueByColumnAndRow(2, $bar, $mp[$i]);
				$objget->setCellValueByColumnAndRow(3, $bar, $analisa[$i]);
				$pe = ($analisa[$i]/$jml_siswa);	
				
				
				if (($pe*100)>=$row1->r5a and ($pe*100)<=$row1->r5b) {					
					$bobot = $row1->ak5;
					$level = $row1->an5;
					
				}
				else if (($pe*100)>$row1->r4a and ($pe*100)<=$row1->r4b) {
					$bobot = $row1->ak4;
					$level = $row1->an4;
				}
				else if (($pe*100)>$row1->r3a and ($pe*100)<=$row1->r3b) {
					$bobot = $row1->ak3;
					$level = $row1->an3;
				}
				else if (($pe*100)>$row1->r2a and ($pe*100)<=$row1->r2b) {
					$bobot = $row1->ak2;
					$level = $row1->an2;
				}
				else if (($pe*100)>$row1->r1a and ($pe*100)<=$row1->r1b) {
					$bobot = $row1->ak1;
					$level = $row1->an1;
				}
				
				
				$objget->setCellValueByColumnAndRow(4, $bar, round($pe, 2));
				$objget->setCellValueByColumnAndRow(5, $bar, $bobot);
				$objget->setCellValueByColumnAndRow(6, $bar, $level);
				
				
				$nk = $nk + $level;
				$bar++;
				$no++;
				
				
			}
			
			$bar1 = 6;
			$no1 = 1;
			
			for ($j=0;$j<$jml;$j++) 
			{
				$objget->getStyle($cols[6].''.$bar1)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
				$pe = ($analisa[$j]/$jml_siswa);
				
				if (($pe*100)>=$row1->r5a and ($pe*100)<=$row1->r5b) {					
					$level = $row1->an5;
					$irt = ($rn/$nk)*$level;
					
				}
				else if (($pe*100)>$row1->r4a and ($pe*100)<=$row1->r4b) {
					$level = $row1->an4;
					$irt = ($rn/$nk)*$level;
				}
				else if (($pe*100)>$row1->r3a and ($pe*100)<=$row1->r3b) {
					$level = $row1->an3;
					$irt = ($rn/$nk)*$level;
				}
				else if (($pe*100)>$row1->r2a and ($pe*100)<=$row1->r2b) {
					$level = $row1->an2;
					$irt = ($rn/$nk)*$level;
				}
				else if (($pe*100)>$row1->r1a and ($pe*100)<=$row1->r1b) {
					$level = $row1->an1;
					$irt = ($rn/$nk)*$level;
				}
				
				$objget->setCellValueByColumnAndRow(7, $bar1, round($irt,2) );
				$bar1++;
				$no1++;
			}
			
			$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objget->setCellValueByColumnAndRow(0, $bar+2, "Rentang Nilai");
			$objget->setCellValueByColumnAndRow(1, $bar+2, $rn);
			$objget->setCellValueByColumnAndRow(0, $bar+3, "Koefisien Nilai");
			$objget->setCellValueByColumnAndRow(1, $bar+3, round(($rn/$nk),2));
			
			
			
			//simpan dalam file sample.xls
			$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
			try {
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				header('Content-Type:  application/vnd.ms-excel');
				//ubah nama file saat diunduh
				header('Content-Disposition: attachment; filename="'.$nama.'.xls"'); 
				
				ob_end_clean();             
				$objWriter->save('php://output');
				} catch (Exception $e) {
				redirect(site_url('Controller2/notif_error'));
				die();
			}
		}
		
		
		
		function Multi1()
		
		{
			$objPHPExcel = new PHPExcel();
			
			// Set properties
			$objPHPExcel->getProperties()
			->setCreator("JCom CBT Online") //creator
			->setTitle("Hasil Ujian");  //file title
			
			$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
			$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
			
			$objget->setTitle('Sample Sheet'); //sheet title
			$objset->setCellValue('A1',$this->input->post('judul')); //insert cell value
			$objget->getStyle('A1')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size
			$objget->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			$objset->setCellValue('A2',$this->input->post('ketkelas')); //insert cell value
			$objget->getStyle('A2')->getFont()->setBold(true)  // set font weight
			->setSize(15);    //set font size	
			$objget->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			
			
			$jml_mapel = $this->input->post('jml_mapel');
			$mapel1 = $this->input->post('mapel1');
			$mapel2 = $this->input->post('mapel2');
			$mapel3 = $this->input->post('mapel3');
			$mapel4 = $this->input->post('mapel4');
			$mapel5 = $this->input->post('mapel5');
			$mapel6 = $this->input->post('mapel6');
			$mapel7 = $this->input->post('mapel7');
			$mapel8 = $this->input->post('mapel8');
			$mapel9 = $this->input->post('mapel9');
			$mapel10 = $this->input->post('mapel10');
			//table header
			
			if ($jml_mapel==2)
			{
				
				$objget->mergeCells('A1:H1');	
				$objget->mergeCells('A2:H2');
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"RATA-RATA","NILAI IRT","PIL 1","PTN 1","PIG 1","PIL 2","PTN 2","PIG 2","PIL 3","PTN 3","PIG 3","KETERANGAN","NAMA SEKOLAH");
				for ($a=0;$a<24;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$rt = ($row->nilai1+$row->nilai2)/2;
					$objget->setCellValueByColumnAndRow(11, $bar, $rt);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->kn);
					
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(13, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(14, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(15, $bar, $jur1->standar_nilai);
					$objget->setCellValueByColumnAndRow(16, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(17, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(18, $bar, $jur2->standar_nilai);
					$objget->setCellValueByColumnAndRow(19, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(20, $bar, $jur3->nama_univ);
					$objget->setCellValueByColumnAndRow(21, $bar, $jur3->standar_nilai);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->ket);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(23, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(23, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			else if($jml_mapel==3)
			{
				
				$objget->mergeCells('A1:I1');	
				$objget->mergeCells('A2:I2');
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"RATA-RATA","NILAI IRT","PIL 1","PTN 1","PIG 1","PIL 2","PTN 2","PIG 2","PIL 3","PTN 3","PIG 3","KETERANGAN","NAMA SEKOLAH");
				for ($a=0;$a<28;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$rt = ($row->nilai1+$row->nilai2+$row->nilai3)/3;
					$objget->setCellValueByColumnAndRow(15, $bar, $rt);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->kn);
					
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(17, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(18, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(19, $bar, $jur1->standar_nilai);
					$objget->setCellValueByColumnAndRow(20, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(21, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(22, $bar, $jur2->standar_nilai);
					$objget->setCellValueByColumnAndRow(23, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(24, $bar, $jur3->nama_univ);
					$objget->setCellValueByColumnAndRow(25, $bar, $jur3->standar_nilai);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->ket);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(27, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(27, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
			}
			else if($jml_mapel==4)
			{
				
				$objget->mergeCells('A1:J1');	
				$objget->mergeCells('A2:J2');
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"RATA-RATA","NILAI IRT","PIL 1","PTN 1","PIG 1","PIL 2","PTN 2","PIG 2","PIL 3","PTN 3","PIG 3","KETERANGAN","NAMA SEKOLAH");
				for ($a=0;$a<32;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$rt = ($row->nilai1+$row->nilai2+$row->nilai3+$row->nilai4)/4;
					$objget->setCellValueByColumnAndRow(19, $bar, $rt);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->kn);
					
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(21, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(22, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(23, $bar, $jur1->standar_nilai);
					$objget->setCellValueByColumnAndRow(24, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(25, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(26, $bar, $jur2->standar_nilai);
					$objget->setCellValueByColumnAndRow(27, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(28, $bar, $jur3->nama_univ);
					$objget->setCellValueByColumnAndRow(29, $bar, $jur3->standar_nilai);
					$objget->setCellValueByColumnAndRow(30, $bar, $row->ket);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(31, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(31, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
			}
			
			else if($jml_mapel==5)
			{
				
				$objget->mergeCells('A1:K1');	
				$objget->mergeCells('A2:K2');;
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"RATA-RATA","NILAI IRT","PIL 1","PTN 1","PIG 1","PIL 2","PTN 2","PIG 2","PIL 3","PTN 3","PIG 3","KETERANGAN","NAMA SEKOLAH");
				for ($a=0;$a<36;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$rt = ($row->nilai1+$row->nilai2+$row->nilai3+$row->nilai4+$row->nilai5)/5;
					$objget->setCellValueByColumnAndRow(23, $bar, $rt);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->kn);
					
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(25, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(26, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(27, $bar, $jur1->standar_nilai);
					$objget->setCellValueByColumnAndRow(28, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(29, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(30, $bar, $jur2->standar_nilai);
					$objget->setCellValueByColumnAndRow(31, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(32, $bar, $jur3->nama_univ);
					$objget->setCellValueByColumnAndRow(33, $bar, $jur3->standar_nilai);
					$objget->setCellValueByColumnAndRow(34, $bar, $row->ket);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(35, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(35, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
			}
			
			else if($jml_mapel==6)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');			
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"RATA-RATA","NILAI IRT","PIL 1","PTN 1","PIG 1","PIL 2","PTN 2","PIG 2","PIL 3","PTN 3","PIG 3","KETERANGAN","NAMA SEKOLAH");
				for ($a=0;$a<40;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$rt = ($row->nilai1+$row->nilai2+$row->nilai3+$row->nilai4+$row->nilai5+$row->nilai6)/6;
					$objget->setCellValueByColumnAndRow(27, $bar, $rt);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->kn);
					
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(29, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(30, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(31, $bar, $jur1->standar_nilai);
					$objget->setCellValueByColumnAndRow(32, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(33, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(34, $bar, $jur2->standar_nilai);
					$objget->setCellValueByColumnAndRow(35, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(36, $bar, $jur3->nama_univ);
					$objget->setCellValueByColumnAndRow(37, $bar, $jur3->standar_nilai);
					$objget->setCellValueByColumnAndRow(38, $bar, $row->ket);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(39, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(39, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			else if($jml_mapel==7)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"B","S","K",$mapel7,"RATA-RATA","NILAI IRT","PIL 1","PTN 1","PIG 1","PIL 2","PTN 2","PIG 2","PIL 3","PTN 3","PIG 3","KETERANGAN","NAMA SEKOLAH");
				for ($a=0;$a<44;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[40].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[41].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[42].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[43].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$objget->setCellValueByColumnAndRow(27, $bar, $row->benar7);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->salah7);
					$objget->setCellValueByColumnAndRow(29, $bar, $row->kosong7);
					$objget->setCellValueByColumnAndRow(30, $bar, $row->nilai7);
					$rt = ($row->nilai1+$row->nilai2+$row->nilai3+$row->nilai4+$row->nilai5+$row->nilai6+$row->nilai7)/7;
					$objget->setCellValueByColumnAndRow(31, $bar, $rt);
					$objget->setCellValueByColumnAndRow(32, $bar, $row->kn);
					
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(33, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(34, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(35, $bar, $jur1->standar_nilai);
					$objget->setCellValueByColumnAndRow(36, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(37, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(38, $bar, $jur2->standar_nilai);
					$objget->setCellValueByColumnAndRow(39, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(40, $bar, $jur3->nama_univ);
					$objget->setCellValueByColumnAndRow(41, $bar, $jur3->standar_nilai);
					$objget->setCellValueByColumnAndRow(42, $bar, $row->ket);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(43, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(43, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			else if($jml_mapel==8)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"B","S","K",$mapel7,"B","S","K",$mapel8,"RATA-RATA","NILAI IRT","PIL 1","PTN 1","PIG 1","PIL 2","PTN 2","PIG 2","PIL 3","PTN 3","PIG 3","KETERANGAN","NAMA SEKOLAH");
				for ($a=0;$a<48;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[40].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[41].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[42].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[43].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[44].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[45].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[46].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[47].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$objget->setCellValueByColumnAndRow(27, $bar, $row->benar7);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->salah7);
					$objget->setCellValueByColumnAndRow(29, $bar, $row->kosong7);
					$objget->setCellValueByColumnAndRow(30, $bar, $row->nilai7);
					$objget->setCellValueByColumnAndRow(31, $bar, $row->benar8);
					$objget->setCellValueByColumnAndRow(32, $bar, $row->salah8);
					$objget->setCellValueByColumnAndRow(33, $bar, $row->kosong8);
					$objget->setCellValueByColumnAndRow(34, $bar, $row->nilai8);
					$rt = ($row->nilai1+$row->nilai2+$row->nilai3+$row->nilai4+$row->nilai5+$row->nilai6+$row->nilai7+$row->nilai8)/8;
					$objget->setCellValueByColumnAndRow(35, $bar, $rt);
					$objget->setCellValueByColumnAndRow(36, $bar, $row->kn);
					
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(37, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(38, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(39, $bar, $jur1->standar_nilai);
					$objget->setCellValueByColumnAndRow(40, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(41, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(42, $bar, $jur2->standar_nilai);
					$objget->setCellValueByColumnAndRow(43, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(44, $bar, $jur3->nama_univ);
					$objget->setCellValueByColumnAndRow(45, $bar, $jur3->standar_nilai);
					$objget->setCellValueByColumnAndRow(46, $bar, $row->ket);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(47, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(47, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			else if($jml_mapel==9)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"B","S","K",$mapel7,"B","S","K",$mapel8,"B","S","K",$mapel9,"RATA-RATA","NILAI IRT","PIL 1","PTN 1","PIG 1","PIL 2","PTN 2","PIG 2","PIL 3","PTN 3","PIG 3","KETERANGAN","NAMA SEKOLAH");
				for ($a=0;$a<52;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[40].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[41].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[42].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[43].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[44].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[45].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[46].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[47].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[48].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[49].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[50].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[51].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$objget->setCellValueByColumnAndRow(27, $bar, $row->benar7);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->salah7);
					$objget->setCellValueByColumnAndRow(29, $bar, $row->kosong7);
					$objget->setCellValueByColumnAndRow(30, $bar, $row->nilai7);
					$objget->setCellValueByColumnAndRow(31, $bar, $row->benar8);
					$objget->setCellValueByColumnAndRow(32, $bar, $row->salah8);
					$objget->setCellValueByColumnAndRow(33, $bar, $row->kosong8);
					$objget->setCellValueByColumnAndRow(34, $bar, $row->nilai8);
					$objget->setCellValueByColumnAndRow(35, $bar, $row->benar9);
					$objget->setCellValueByColumnAndRow(36, $bar, $row->salah9);
					$objget->setCellValueByColumnAndRow(37, $bar, $row->kosong9);
					$objget->setCellValueByColumnAndRow(38, $bar, $row->nilai9);
					$rt = ($row->nilai1+$row->nilai2+$row->nilai3+$row->nilai4+$row->nilai5+$row->nilai6+$row->nilai7+$row->nilai8+$row->nilai9)/9;
					$objget->setCellValueByColumnAndRow(39, $bar, $rt);
					$objget->setCellValueByColumnAndRow(40, $bar, $row->kn);
					
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(41, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(42, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(43, $bar, $jur1->standar_nilai);
					$objget->setCellValueByColumnAndRow(44, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(45, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(46, $bar, $jur2->standar_nilai);
					$objget->setCellValueByColumnAndRow(47, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(48, $bar, $jur3->nama_univ);
					$objget->setCellValueByColumnAndRow(49, $bar, $jur3->standar_nilai);
					$objget->setCellValueByColumnAndRow(50, $bar, $row->ket);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(51, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(51, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			else if($jml_mapel==10)
			{
				$objget->mergeCells('A1:L1');	
				$objget->mergeCells('A2:L2');
				
				
				$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD");
				$val = array("NO","NAMA PESERTA","NO PESERTA","B","S","K",$mapel1,"B","S","K",$mapel2,"B","S","K",$mapel3,"B","S","K",$mapel4,"B","S","K",$mapel5,"B","S","K",$mapel6,"B","S","K",$mapel7,"B","S","K",$mapel8,"B","S","K",$mapel9,"B","S","K",$mapel10,"RATA-RATA","NILAI IRT","PIL 1","PTN 1","PIG 1","PIL 2","PTN 2","PIG 2","PIL 3","PTN 3","PIG 3","KETERANGAN","NAMA SEKOLAH");
				for ($a=0;$a<56;$a++) 
				{
					$objset->setCellValue($cols[$a].'4', $val[$a]);
					//set borders
					
					//set alignment
					$objget->getStyle($cols[$a].'4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					//set font weight
					$objget->getStyle($cols[$a].'4')->getFont()->setBold(true) ;
					$objget->getColumnDimension($cols[$a])->setAutoSize(true);
					$objget->getStyle($cols[$a].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); ;
					$objget->getStyle($cols[$a].'4')->getFill()->getStartColor()->setRGB('D8D8D8');
				}
				
				//taruh baris data disini
				$bar = 5;
				$no = 1;
				
				$nf = $this->input->post('excel2');
				$nama = $nf;
				$data = $this->model1->cetak();
				
				foreach ($data  AS $row) {
					$objget->getStyle($cols[0].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[1].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[2].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[3].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[4].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[5].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[6].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[7].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[8].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[9].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[10].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[11].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[12].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[13].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[14].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[15].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[16].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[17].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[18].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[19].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[20].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[21].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[22].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[23].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[24].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[25].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[26].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[27].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[28].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[29].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[30].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[31].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[32].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[33].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[34].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[35].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[36].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[37].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[38].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[39].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[40].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[41].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[42].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[43].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[44].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[45].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[46].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[47].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[48].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[49].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[50].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[51].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[52].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[53].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[54].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$objget->getStyle($cols[55].''.$bar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					$objget->setCellValueByColumnAndRow(0, $bar, $no);
					if ($row->pnama == '') {$objget->setCellValueByColumnAndRow(1, $bar, $row->nama);} else {$objget->setCellValueByColumnAndRow(1, $bar, $row->pnama);}
					if ($row->pnopes == '') {$objget->setCellValueByColumnAndRow(2, $bar, $row->no_peserta);} else {$objget->setCellValueByColumnAndRow(2, $bar, $row->pnopes);}
					$objget->setCellValueByColumnAndRow(3, $bar, $row->benar1);
					$objget->setCellValueByColumnAndRow(4, $bar, $row->salah1);
					$objget->setCellValueByColumnAndRow(5, $bar, $row->kosong1);
					$objget->setCellValueByColumnAndRow(6, $bar, $row->nilai1);
					$objget->setCellValueByColumnAndRow(7, $bar, $row->benar2);
					$objget->setCellValueByColumnAndRow(8, $bar, $row->salah2);
					$objget->setCellValueByColumnAndRow(9, $bar, $row->kosong2);
					$objget->setCellValueByColumnAndRow(10, $bar, $row->nilai2);
					$objget->setCellValueByColumnAndRow(11, $bar, $row->benar3);
					$objget->setCellValueByColumnAndRow(12, $bar, $row->salah3);
					$objget->setCellValueByColumnAndRow(13, $bar, $row->kosong3);
					$objget->setCellValueByColumnAndRow(14, $bar, $row->nilai3);
					$objget->setCellValueByColumnAndRow(15, $bar, $row->benar4);
					$objget->setCellValueByColumnAndRow(16, $bar, $row->salah4);
					$objget->setCellValueByColumnAndRow(17, $bar, $row->kosong4);
					$objget->setCellValueByColumnAndRow(18, $bar, $row->nilai4);
					$objget->setCellValueByColumnAndRow(19, $bar, $row->benar5);
					$objget->setCellValueByColumnAndRow(20, $bar, $row->salah5);
					$objget->setCellValueByColumnAndRow(21, $bar, $row->kosong5);
					$objget->setCellValueByColumnAndRow(22, $bar, $row->nilai5);
					$objget->setCellValueByColumnAndRow(23, $bar, $row->benar6);
					$objget->setCellValueByColumnAndRow(24, $bar, $row->salah6);
					$objget->setCellValueByColumnAndRow(25, $bar, $row->kosong6);
					$objget->setCellValueByColumnAndRow(26, $bar, $row->nilai6);
					$objget->setCellValueByColumnAndRow(27, $bar, $row->benar7);
					$objget->setCellValueByColumnAndRow(28, $bar, $row->salah7);
					$objget->setCellValueByColumnAndRow(29, $bar, $row->kosong7);
					$objget->setCellValueByColumnAndRow(30, $bar, $row->nilai7);
					$objget->setCellValueByColumnAndRow(31, $bar, $row->benar8);
					$objget->setCellValueByColumnAndRow(32, $bar, $row->salah8);
					$objget->setCellValueByColumnAndRow(33, $bar, $row->kosong8);
					$objget->setCellValueByColumnAndRow(34, $bar, $row->nilai8);
					$objget->setCellValueByColumnAndRow(35, $bar, $row->benar9);
					$objget->setCellValueByColumnAndRow(36, $bar, $row->salah9);
					$objget->setCellValueByColumnAndRow(37, $bar, $row->kosong9);
					$objget->setCellValueByColumnAndRow(38, $bar, $row->nilai9);
					$objget->setCellValueByColumnAndRow(39, $bar, $row->benar10);
					$objget->setCellValueByColumnAndRow(40, $bar, $row->salah10);
					$objget->setCellValueByColumnAndRow(41, $bar, $row->kosong10);
					$objget->setCellValueByColumnAndRow(42, $bar, $row->nilai10);
					$rt = ($row->nilai1+$row->nilai2+$row->nilai3+$row->nilai4+$row->nilai5+$row->nilai6+$row->nilai7+$row->nilai8+$row->nilai9+$row->nilai10)/10;
					$objget->setCellValueByColumnAndRow(43, $bar, $rt);
					$objget->setCellValueByColumnAndRow(44, $bar, $row->kn);
					
					$this->db->select('*');
					$this->db->from('pengguna');
					$this->db->where('id',$row->id);
					$query1 = $this->db->get();
					$jurusan = $query1->result();
					$jur = $jurusan[0]; 
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan1);
					$query2 = $this->db->get();
					$jurusan1 = $query2->result();
					$jur1 = $jurusan1[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan2);
					$query3 = $this->db->get();
					$jurusan2 = $query3->result();
					$jur2 = $jurusan2[0];
					
					$this->db->select('*');
					$this->db->from('jurusan');
					$this->db->where('kode_jurusan',$jur->jurusan3);
					$query4 = $this->db->get();
					$jurusan3 = $query4->result();
					$jur3 = $jurusan3[0];
					
					
					$objget->setCellValueByColumnAndRow(45, $bar, $jur1->pil_jurusan);
					$objget->setCellValueByColumnAndRow(46, $bar, $jur1->nama_univ);
					$objget->setCellValueByColumnAndRow(47, $bar, $jur1->standar_nilai);
					$objget->setCellValueByColumnAndRow(48, $bar, $jur2->pil_jurusan);
					$objget->setCellValueByColumnAndRow(49, $bar, $jur2->nama_univ);
					$objget->setCellValueByColumnAndRow(50, $bar, $jur2->standar_nilai);
					$objget->setCellValueByColumnAndRow(51, $bar, $jur3->pil_jurusan);
					$objget->setCellValueByColumnAndRow(52, $bar, $jur3->nama_univ);
					$objget->setCellValueByColumnAndRow(53, $bar, $jur3->standar_nilai);
					$objget->setCellValueByColumnAndRow(54, $bar, $row->ket);
					if ($row->psekolah == '') {$objget->setCellValueByColumnAndRow(55, $bar, $row->sekolah);} else {$objget->setCellValueByColumnAndRow(55, $bar, $row->psekolah);}
					$bar++;
					$no++;
				}
				
			}
			
			
			
			//simpan dalam file sample.xls
			$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');  
			try {
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
				header('Content-Type:  application/vnd.ms-excel');
				//ubah nama file saat diunduh
				header('Content-Disposition: attachment; filename="'.$nama.'.xls"'); 
				
				ob_end_clean();             
				$objWriter->save('php://output');
				} catch (Exception $e) {
				redirect(site_url('Controller2/notif_error'));
				die();
			}
			
			
			
		}
		
	}						