<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific Controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding Controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_Controller'] = 'welcome';
|
| This route indicates which Controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which Controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| Controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| Controller and method URI segments.
|
| Examples:	my-Controller/index	-> my_Controller/index
|		my-Controller/my-method	-> my_Controller/my_method
*/
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = '';
$route['default_controller'] = 'Controller9';
$route['loginform'] = "Controller9/login_form";
$route['admlogau'] = "Controller9/a_form";
$route['msk'] = "Controller9/a_msk";
$route['snap'] = "snap";
$route['login'] = "Controller9/login";
$route['resetpassword'] = "Controller9/reset_password";
$route['resetpass'] = "Controller9/reset_pass";
$route['home'] = "Controller9/home";
$route['homesiswa'] = "Controller9/home2";
$route['user'] = "Controller5";
$route['user/(:num)'] = "Controller5/index/$1";
$route['kelas'] = "Controller4";
$route['kelas/(:num)'] = "Controller4/index/$1";
$route['ujian'] = "Controller8";
$route['ujian/(:num)'] = "Controller8/index/$1";
$route['ujian_l'] = "Controller8_l";
$route['ujian_l/(:num)'] = "Controller8_l/index/$1";
$route['ujian_n'] = "Controller8_n";
$route['ujian_n/(:num)'] = "Controller8_n/index/$1";
$route['jurusan'] = "Controller11";
$route['jurusan/(:num)'] = "Controller11/index/$1";
$route['logout'] = "Controller9/Logout";
$route['admlogout'] = "Controller9/Logout_admin";
$route['tips'] = "Controller1/tips";
$route['peminatan'] = "Controller12";
$route['peminatan/(:num)'] = "Controller12/index/$1";
$route['folder'] = "Controller13";
$route['folder/(:num)'] = "Controller13/index/$1";
$route['folder_l'] = "Controller13_l";
$route['folder_l/(:num)'] = "Controller13_l/index/$1";
$route['folder_n'] = "Controller13_n";
$route['folder_n/(:num)'] = "Controller13_n/index/$1";

// user
$route['tambahuser'] = "Controller5/tambah_pengguna";
$route['daftar'] = "Controller5/daftar";
$route['isiprofil'] = "Controller5/isiprofil";
$route['kirimprofil'] = "Controller5/Proses_isiprofil";
$route['simpanprofil'] = "Controller5/simpan_isiprofil";
$route['editprofil'] = "Controller5/edit_profil";
$route['simpanuser'] = "Controller5/Proses_tambah_pengguna";
$route['kirim'] = "Controller5/Proses_daftar";
$route['edituser/(:any)'] = "Controller5/edit_pengguna/$1";
$route['simpanedituser'] = "Controller5/proses_edit_pengguna";
$route['hapususer/(:any)'] = "Controller5/delete_pengguna/$1";
$route['cariuser'] = "Controller5/Cari";
$route['cariuser/(:num)'] = "Controller5/Cari/$1";
$route['cariuseraktif'] = "Controller5/Cari_aktif";
$route['cariuseraktif/(:num)'] = "Controller5/Cari_aktif/$1";
$route['cariusernonaktif'] = "Controller5/Cari_nonaktif";
$route['cariusernonaktif/(:num)'] = "Controller5/Cari_nonaktif/$1";
$route['aktivasiuser'] = "Controller5/update_aktivasi_pengguna";
$route['aktivasiuser1/(:any)'] = "Controller5/view_edit_pengguna/$1";
$route['hapusfoto'] = "Controller5/delete";
$route['hapusfoto/(:num)'] = "Controller5/delete/$1";
$route['simpanfoto'] = "Controller5/simpan_foto";
$route['simpanfoto/(:num)'] = "Controller5/simpan_foto/$1";




// kelas
$route['tambahkelas'] = "Controller4/tambah_kelas";
$route['simpankelas'] = "Controller4/Proses_tambah_kelas";
$route['editkelas/(:any)'] = "Controller4/edit_kelas/$1";
$route['simpaneditkelas'] = "Controller4/proses_edit_kelas";
$route['hapuskelas/(:any)'] = "Controller4/delete_kelas/$1";
$route['aktivasikelas'] = "Controller4/update_aktivasi_kelas";
$route['carikelas'] = "Controller4/Cari";
$route['carikelas/(:num)'] = "Controller4/Cari/$1";

// folder
$route['tambahfolder'] = "Controller13/tambah_folder";
$route['simpanfolder'] = "Controller13/Proses_tambah_folder";
$route['editfolder/(:any)'] = "Controller13/edit_folder/$1";
$route['simpaneditfolder'] = "Controller13/proses_edit_folder";
$route['hapusfolder/(:any)'] = "Controller13/delete_folder/$1";
$route['aktivasifolder'] = "Controller13/update_aktivasi_folder";
$route['carifolder'] = "Controller13/Cari";
$route['carifolder/(:num)'] = "Controller13/Cari/$1";

//ujian
$route['tampilujian/(:any)'] = "Controller8/edit_by_folder_id/$1";
$route['tampilujian/(:any)/(:any)'] = "Controller8/edit_by_folder_id/$1/$2";

$route['tambahujian'] = "Controller8/Tambah_ujian";
$route['simpanujian'] = "Controller8/Proses_tambah_ujian";
$route['editujian/(:any)'] = "Controller8/edit_ujian/$1";
$route['simpaneditujian'] = "Controller8/proses_edit_ujian";
$route['hapusujian/(:any)'] = "Controller8/delete_ujian/$1";
$route['cariujian'] = "Controller8/Cari";
$route['cariujian/(:num)'] = "Controller8/Cari/$1";
$route['cariujianaktif'] = "Controller8/Cari_aktif";
$route['cariujianaktif/(:num)'] = "Controller8/Cari_aktif/$1";
$route['cariujiannonaktif'] = "Controller8/Cari_nonaktif";
$route['cariujiannonaktif/(:num)'] = "Controller8/Cari_nonaktif/$1";
$route['aktivasiujian'] = "Controller8/update_aktivasi_ujian";
$route['aktivasiujian1/(:any)'] = "Controller8/view_edit_ujian/$1";


// soal
$route['tampilsoal/(:any)'] = "Controller7/edit_by_ujian_id/$1";
$route['tampilsoal/(:any)/(:any)'] = "Controller7/edit_by_ujian_id/$1/$2";
$route['tambahsoal/ujian'] = "Controller7/Tambah_soal";
$route['tambahsoal/ujian_e'] = "Controller7/Tambah_soal_e";
$route['editsoal/(:any)'] = "Controller7/edit_soal/$1";
$route['editsoal_e/(:any)'] = "Controller7/edit_soal_e/$1";
$route['hapussoal/(:any)'] = "Controller7/delete_soal/$1";
$route['simpansoal'] = "Controller7/Proses_tambah_soal";
$route['simpansoal_e'] = "Controller7/Proses_tambah_soal_e";
$route['simpaneditsoal'] = "Controller7/proses_edit_soal";
$route['simpaneditsoal_e'] = "Controller7/proses_edit_soal_e";
$route['carisoal/(:any)'] = "Controller7/Cari/$1";
$route['carisoal/(:any)/(:any)'] = "Controller7/Cari/$1/$2";
$route['aktivasisoal'] = "Controller7/update_aktivasi_soal";
$route['duplikasi'] = "Controller7/duplikasi";
$route['aktivasisoal1/(:any)'] = "Controller7/view_edit_soal/$1";
$route['carisoalaktif/(:any)'] = "Controller7/Cari_aktif/$1";
$route['carisoalaktif/(:any)/(:any)'] = "Controller7/Cari_aktif/$1/$2";
$route['carisoalnonaktif/(:any)'] = "Controller7/Cari_nonaktif/$1";
$route['carisoalnonaktif/(:any)/(:any)'] = "Controller7/Cari_nonaktif/$1/$2";
$route['downloadsoal/(:any)'] = "Controller7/dpdf/$1";

// hasil ujian

$route['prosesnilaiessay'] = "Controller6/prosesnilai_e";
$route['hasilujian'] = "Controller6/hasil_ujian";
$route['laporan'] = "Controller3";
$route['carilaporan'] = "Controller3/cari_laporan";
$route['cari'] = "Controller3/cari";
$route['carinama'] = "Controller3/carinama";
$route['sort1'] = "Controller3/sort1";
$route['sort2'] = "Controller3/sort2";
$route['sort3'] = "Controller3/sort3";
$route['sort4'] = "Controller3/sort4";
$route['sort5'] = "Controller3/sort5";
$route['sort6'] = "Controller3/sort6";
$route['sort7'] = "Controller3/sort7";
$route['msort1'] = "Controller3/msort1";
$route['msort2'] = "Controller3/msort2";
$route['msort3'] = "Controller3/msort3";
$route['msort4'] = "Controller3/msort4";
$route['msort5'] = "Controller3/msort5";
$route['msort6'] = "Controller3/msort6";
$route['msort7'] = "Controller3/msort7";
$route['monitoring'] = "Controller3/monitoring";
$route['monitor'] = "Controller3/monitor";
$route['hasilpersiswa/(:any)'] = "Controller3/hasil_ujian/$1";
$route['hasiltopersiswa/(:any)/(:any)'] = "Controller3/hasil_ujian_to/$1/$2";
$route['uploadjawaban/(:any)'] = "Controller3/uploadjawaban/$1";
$route['uploadjawaban_m/(:any)'] = "Controller3/uploadjawaban_m/$1";
$route['selesai'] = "Controller6/hasil_jawaban";
$route['selesai_e'] = "Controller6/hasil_jawaban_e";
$route['selesai2'] = "Controller6/hasil_jawaban2";
$route['kirun'] = "Controller6/kirim_ulang";
$route['hapushasil/(:any)'] = "Controller3/delete_proses/$1";
$route['lihathasil/(:any)'] = "Controller3/lihat_hasil/$1";
$route['lanjutujian/(:any)'] = "Controller6/lanjutujian/$1";
$route['lanjutujian_e/(:any)'] = "Controller6/lanjutujian_e/$1";
$route['lanjutujian_u/(:any)'] = "Controller6/lanjutujian_u/$1";
$route['simpanjawaban'] = "Controller6/hasil_jawaban1";
$route['updatejawaban'] = "Controller6/update_proses";
$route['editip/(:any)'] = "Controller3/edit_ip/$1";
$route['simpanip'] = "Controller3/proses_edit_ip";
$route['closeip'] = "Controller3/close_ip";
$route['proses'] = "Controller3/hasil_jawaban";
$route['batal'] = "Controller3/batalkan_nilai";
$route['klir'] = "Controller6/klir";
$route['toprank'] = "Controller3/carirank";
$route['topranks'] = "Controller3/cariranks";
$route['rank'] = "Controller3/rank";
$route['ranks'] = "Controller3/ranks";
$route['log'] = "Controller3/log";
$route['log/(:num)'] = "Controller3/log/$1";
$route['carilog'] = "Controller3/Carilog";
$route['carilog/(:num)'] = "Controller3/Carilog/$1";
$route['hapuslog/(:any)'] = "Controller3/delete_log/$1";
$route['hapuslogs'] = "Controller3/del_all";
$route['updatelog'] = "Controller3/update_log";
$route['prosesnilai'] = "Controller3/hasil_jawaban2";
$route['batalnilai'] = "Controller3/batalkan_banyak_nilai";
$route['hapushu'] = "Controller3/hapus_ujian_siswa";
$route['mprosesnilai'] = "Controller3/mhasil_jawaban2";
$route['mbatalnilai'] = "Controller3/mbatalkan_banyak_nilai";
$route['mhapushu'] = "Controller3/mhapus_ujian_siswa";
$route['downloadto/(:any)/(:any)/(:any)/(:any)'] = "Controller3/topdf/$1/$2/$3/$4";

//jurusan
$route['carijurusan'] = "Controller11/Cari";
$route['carijurusan/(:num)'] = "Controller11/Cari/$1";
$route['piljur/(:any)'] = "Controller3/pilih_jurusan/$1";
$route['updatejur/(:any)'] = "Controller3/update_jurusan/$1";
$route['updatejur1/(:any)'] = "Controller3/update_jurusan1/$1";
$route['aktivasijurusan'] = "Controller11/update_aktivasi_jurusan";
$route['tambahjurusan'] = "Controller11/tambah_jurusan";
$route['simpanjurusan'] = "Controller11/Proses_tambah_jurusan";
$route['simpaneditjurusan'] = "Controller11/proses_edit_jurusan";
$route['editjurusan/(:any)'] = "Controller11/edit_jurusan/$1";
$route['hapusjurusan/(:any)'] = "Controller11/delete_jurusan/$1";

//peminatan
$route['caripeminatan'] = "Controller12/Cari";
$route['caripeminatan/(:num)'] = "Controller12/Cari/$1";
$route['aktivasipeminatan'] = "Controller12/update_aktivasi_peminatan";
$route['tambahpeminatan'] = "Controller12/tambah_peminatan";
$route['simpanpeminatan'] = "Controller12/Proses_tambah_peminatan";
$route['simpaneditpeminatan'] = "Controller12/proses_edit_peminatan";
$route['editpeminatan/(:any)'] = "Controller12/edit_peminatan/$1";
$route['hapuspeminatan/(:any)'] = "Controller12/delete_peminatan/$1";


//siswa
$route['soalujian/(:any)'] = "Controller6/show_by_ujian_id/$1";
$route['soalujian/(:any)/(:any)'] = "Controller6/show_by_ujian_id/$1/$2";
$route['soalujiansiswa/(:any)'] = "Controller6/show_soal_siswa/$1";
$route['soalujiansiswa/(:any)/(:any)'] = "Controller6/show_soal_siswa/$1/$2";
$route['daftarujian'] = "Controller6/list_ujian";
$route['daftarujian/(:num)'] = "Controller6/list_ujian/$1";
$route[''] = "Controller6/list_ujian";

//cetak
$route['ekspor'] = "Controller2";
$route['eksporanalisa'] = "Controller2/analisa";
$route['eksporanalisa1'] = "Controller2/analisa1";
$route['prosesanalisa'] = "Controller2/prosesanalisa";
$route['prosesanalisa1'] = "Controller2/prosesanalisa1";
$route['eksporjawaban'] = "Controller2/eksporjawaban";
$route['ekspor_multi'] = "Controller2/Multi";
$route['ekspor_multi1'] = "Controller2/Multi1";
$route['eksporsiswa'] = "Controller2/Cetak_siswa";
$route['eksporsiswa_e'] = "Controller2/Cetak_siswa_e";
$route['eksporsiswamulti'] = "Controller2/Cetak_siswa_multi";
$route['settinganalisa'] = "Controller2/setting";
$route['settinganalisa2'] = "Controller2/setting2";
$route['simpansa'] = "Controller2/simpan";
$route['simpansa2'] = "Controller2/simpan2";

//backup dan restore
$route['backrest'] = "Controller1/backrest";
$route['backup'] = "Controller1";
$route['backup_user'] = "Controller1/user";
$route['backup_kelas'] = "Controller1/kelas";
$route['backup_jurusan'] = "Controller1/jurusan";
$route['backup_peminatan'] = "Controller1/peminatan";
$route['backup_soal'] = "Controller1/soal";
$route['backup_haji'] = "Controller1/haji";
$route['hapus_haji'] = "Controller1/hapus_haji";
$route['hapus_siswa'] = "Controller1/hapus_siswa";
$route['hapus_jurusan'] = "Controller1/hapus_jurusan";
$route['hapus_peminatan'] = "Controller1/hapus_peminatan";
$route['hapus_log'] = "Controller1/hapus_log";
$route['hapus_full'] = "Controller1/hapus_full";
$route['hapus_kelas'] = "Controller1/hapus_kelas";
$route['hapus_soal'] = "Controller1/hapus_soal";
$route['restore'] = "Controller1/restore";
$route['setting'] = "Controller1/settingheader";
$route['simpansetting'] = "Controller1/simpansetting";
$route['simpanlogo'] = "Controller1/simpanlogo";
$route['hapuslogo'] = "Controller1/hapuslogo";

$route['pbackup'] = "Controller1/pbackup";
$route['prestore'] = "Controller1/prestore";
$route['backup_gbr'] = "Controller1/zipgbr";
$route['restore_gbr'] = "Controller1/uploadgbr";
$route['backup_profil'] = "Controller1/zipprofil";
$route['restore_profil'] = "Controller1/uploadprofil";
$route['backup_audio'] = "Controller1/zipaudio";
$route['restore_audio'] = "Controller1/uploadaudio";
$route['unzip'] = "Controller1/unzip";
$route['upload'] = "Controller1/backrest";

//ujian Literasi
$route['tampilujian_l/(:any)'] = "Controller8_l/edit_by_folder_id/$1";
$route['tampilujian_l/(:any)/(:any)'] = "Controller8_l/edit_by_folder_id/$1/$2";

$route['tambahujian_l'] = "Controller8_l/Tambah_ujian";
$route['simpanujian_l'] = "Controller8_l/Proses_tambah_ujian";
$route['editujian_l/(:any)'] = "Controller8_l/edit_ujian/$1";
$route['simpaneditujian_l'] = "Controller8_l/proses_edit_ujian";
$route['hapusujian_l/(:any)'] = "Controller8_l/delete_ujian/$1";
$route['cariujian_l'] = "Controller8_l/Cari";
$route['cariujian_l/(:num)'] = "Controller8_l/Cari/$1";
$route['cariujianaktif_l'] = "Controller8_l/Cari_aktif";
$route['cariujianaktif_l/(:num)'] = "Controller8_l/Cari_aktif/$1";
$route['cariujiannonaktif_l'] = "Controller8_l/Cari_nonaktif";
$route['cariujiannonaktif_l/(:num)'] = "Controller8_l/Cari_nonaktif/$1";
$route['aktivasiujian_l'] = "Controller8_l/update_aktivasi_ujian";
$route['aktivasiujian1_l/(:any)'] = "Controller8_l/view_edit_ujian/$1";

// soal literasi
$route['tampilsoal_l/(:any)'] = "Controller7_l/edit_by_ujian_id/$1";
$route['tampilsoal_l/(:any)/(:any)'] = "Controller7_l/edit_by_ujian_id/$1/$2";
$route['tambahsoal_l/ujian'] = "Controller7_l/Tambah_soal";
$route['tambahsoal_l/ujian_e'] = "Controller7_l/Tambah_soal_e";
$route['tambahsoal_l/ujian_k'] = "Controller7_l/Tambah_soal_k";
$route['editsoal_l/(:any)'] = "Controller7_l/edit_soal/$1";
$route['editsoal_el/(:any)'] = "Controller7_l/edit_soal_e/$1";
$route['hapussoal_l/(:any)'] = "Controller7_l/delete_soal/$1";
$route['simpansoal_l'] = "Controller7_l/Proses_tambah_soal";
$route['pilih_bentuk_l'] = "Controller7_l/Pilih_bentuk";
$route['simpansoal_el'] = "Controller7_l/Proses_tambah_soal_e";
$route['simpaneditsoal_l'] = "Controller7_l/proses_edit_soal";
$route['simpaneditsoal_el'] = "Controller7_l/proses_edit_soal_e";
$route['carisoal_l/(:any)'] = "Controller7_l/Cari/$1";
$route['carisoal_l/(:any)/(:any)'] = "Controller7_l/Cari/$1/$2";
$route['aktivasisoal_l'] = "Controller7_l/update_aktivasi_soal";
$route['duplikasi_l'] = "Controller7_l/duplikasi";
$route['aktivasisoal1_l/(:any)'] = "Controller7_l/view_edit_soal/$1";
$route['carisoalaktif_l/(:any)'] = "Controller7_l/Cari_aktif/$1";
$route['carisoalaktif_l/(:any)/(:any)'] = "Controller7_l/Cari_aktif/$1/$2";
$route['carisoalnonaktif_l/(:any)'] = "Controller7_l/Cari_nonaktif/$1";
$route['carisoalnonaktif_l/(:any)/(:any)'] = "Controller7_l/Cari_nonaktif/$1/$2";
$route['pil0'] = "Controller7_l/Pil0";
$route['pil1'] = "Controller7_l/Pil1";
$route['pil2'] = "Controller7_l/Pil2";
$route['pil3'] = "Controller7_l/Pil3";
$route['pil4'] = "Controller7_l/Pil4";
$route['pil5'] = "Controller7_l/Pil5";
$route['add'] = "Controller7_l/Add";

// folder Literasi
$route['tambahfolder_l'] = "Controller13_l/tambah_folder";
$route['simpanfolder_l'] = "Controller13_l/Proses_tambah_folder";
$route['editfolder_l/(:any)'] = "Controller13_l/edit_folder/$1";
$route['simpaneditfolder_l'] = "Controller13_l/proses_edit_folder";
$route['hapusfolder_l/(:any)'] = "Controller13_l/delete_folder/$1";
$route['aktivasifolder_l'] = "Controller13_l/update_aktivasi_folder";
$route['carifolder_l'] = "Controller13_l/Cari";
$route['carifolder_l/(:num)'] = "Controller13_l/Cari/$1";


//ujian Numerasi
$route['tampilujian_n/(:any)'] = "Controller8_n/edit_by_folder_id/$1";
$route['tampilujian_n/(:any)/(:any)'] = "Controller8_n/edit_by_folder_id/$1/$2";

$route['tambahujian_n'] = "Controller8_n/Tambah_ujian";
$route['simpanujian_n'] = "Controller8_n/Proses_tambah_ujian";
$route['editujian_n/(:any)'] = "Controller8_n/edit_ujian/$1";
$route['simpaneditujian_n'] = "Controller8_n/proses_edit_ujian";
$route['hapusujian_n/(:any)'] = "Controller8_n/delete_ujian/$1";
$route['cariujian_n'] = "Controller8_n/Cari";
$route['cariujian_n/(:num)'] = "Controller8_n/Cari/$1";
$route['cariujianaktif_n'] = "Controller8_n/Cari_aktif";
$route['cariujianaktif_n/(:num)'] = "Controller8_n/Cari_aktif/$1";
$route['cariujiannonaktif_n'] = "Controller8_n/Cari_nonaktif";
$route['cariujiannonaktif_n/(:num)'] = "Controller8_n/Cari_nonaktif/$1";
$route['aktivasiujian_n'] = "Controller8_n/update_aktivasi_ujian";
$route['aktivasiujian1_n/(:any)'] = "Controller8_n/view_edit_ujian/$1";

// folder Numerasi
$route['tambahfolder_n'] = "Controller13_n/tambah_folder";
$route['simpanfolder_n'] = "Controller13_n/Proses_tambah_folder";
$route['editfolder_n/(:any)'] = "Controller13_n/edit_folder/$1";
$route['simpaneditfolder_n'] = "Controller13_n/proses_edit_folder";
$route['hapusfolder_n/(:any)'] = "Controller13_n/delete_folder/$1";
$route['aktivasifolder_n'] = "Controller13_n/update_aktivasi_folder";
$route['carifolder_n'] = "Controller13_n/Cari";
$route['carifolder_n/(:num)'] = "Controller13_n/Cari/$1";

// shopping cart
$route['pendaftaranujian'] = "Controller16/pendaftaran_ujian";
$route['keranjangbelanja'] = "cart/add";
$route['riwayat'] = "Snap/riwayat";
$route['order'] = "cart/add";
$route['simpanbill'] = "billing/save_order";
$route['request'] = "Controller16/request";
$route['response'] = "Controller16/response";
$route['callback'] = "Controller16/call_back";
$route['return'] = "Controller16/return";

$route['produk'] = "Controller17";
$route['produk/(:num)'] = "Controller17/index/$1";
$route['tambahproduk'] = "Controller17/tambah_produk";
$route['simpanproduk'] = "Controller17/Proses_tambah_produk";
$route['editproduk/(:any)'] = "Controller17/edit_produk/$1";
$route['simpaneditproduk'] = "Controller17/proses_edit_produk";
$route['hapusproduk/(:any)'] = "Controller17/delete_produk/$1";
$route['aktivasiproduk'] = "Controller17/update_aktivasi_produk";
$route['cariproduk'] = "Controller17/Cari";
$route['cariproduk/(:num)'] = "Controller17/Cari/$1";
$route['hapusfotoproduk'] = "Controller17/delete";
$route['hapusfotoproduk/(:num)'] = "Controller17/delete/$1";
$route['pembelian'] = "Controller17/pembelian";
$route['aktivasipembelian'] = "Controller17/update_aktivasi_pembelian";
$route['hapuspembelian/(:any)'] = "Controller17/delete_pembelian/$1";
$route['caripembelian'] = "Controller17/Carip";
$route['caripembelian/(:num)'] = "Controller17/Carip/$1";
$route['tes'] = "Snap/tes";
$route['clbk'] = "Snap/clbk";
$route['notif'] = "Snap/Notification";


