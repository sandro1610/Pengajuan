<?php
 include '../includes/conn.php';
     session_start();
 if (empty($_SESSION['email']) && empty($_SESSION['password']) && empty($_SESSION['id_user'])){
    header("Location:../index.php");
  }elseif ($_SESSION['level'] != 'Admin') {
    header("Location:../index.php");
  }

$tahun = date('Y');



$html='<!DOCTYPE html>
<html lang="en">
<head>
  <title>INSERDES</title>
  <meta charset="utf-8">
  <link rel="icon" href="../assets/img/icons/favicon.ico" type="image/png">
</head>
<body>
	<table align="center" style="border: solid;" border="2">
		  <tr>
		    <th rowspan="2"><h2>Dinas Pemuda dan Olahraga Provinsi Sumatera Selatan</h2></th>
		    <td></td>
		  </tr>
	</table>
	<h2 align="center">Laporan Pengajuan Sponsorship Tahun 2022</h2>
	<table border="1" cellpadding="10" cellspacing="0">
          <thead>
              <tr style="border: solid;" border="3">
                  <th width="60px">No Ticket</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th width="412px">Description</th>
                  <th>E-mail</th>
                  <th>No Handphone</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>';
              $sql = "SELECT * FROM tb_request 
                      INNER JOIN tb_user ON tb_request.id_user = tb_user.id_user
                      WHERE year(tgl_req) = $tahun and status >= 1";
              $query = mysqli_query($link,$sql);
              while($hasil=mysqli_fetch_array($query)){
              	$status = "";
                if ($hasil['status'] < 1) {
                echo "Menunggu Persetujuan Admin/TU";
                }elseif($hasil['status'] == 1){
                  $status ="Menunggu Persetujuan Kadin";
                }elseif($hasil['status'] == 2){
                  $status = "Menunggu Persetujuan Kabid";
                }elseif($hasil['status'] == 3){
                  $status = "Permohonan Disetujui";
                }elseif($hasil['status'] == 4){
                  $status = "Ditolak Admin/TU";
                }elseif($hasil['status'] == 5){
                  $status = "Ditolak Kadin";
                }elseif($hasil['status'] == 6){
                  $status = "Ditolak Kabid";
                }else{
                  $status = "Ditolak";
                }
            $html .='<tr>
            	  <td>'.$hasil['no_ticket'].'</td>
                <td>'.$hasil['tgl_req'].'</td>
                <td>'.$hasil['nama'].'</td>
                <td>'.$hasil['description'].'</td>
                <td>'.$hasil['email'].'</td>
                <td>'.$hasil['no_hp'].'</td>
                <td>'.$status.'</td>
	             </tr>';
	               }
         $html .='</tbody>
      </table>
</body>
</html>';


// Require composer autoload
require_once __DIR__ . '../../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L', 'format' => 'A4']);

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('Laporan_Request_ISDS.pdf', 'I');
?>