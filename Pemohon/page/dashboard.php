<div class="container-fluid">
  <div class="header-body">
    <div class="row">
    <div class="col-lg-3">
        <div class="card">
          <div class="card-header">
            JUMLAH PENGAJUAN BULAN INI
          </div>
          <div class="card-body">
            <?php
            $tahun = date('Y');
            $bulan = date('m');
            $id_user = $_SESSION['id_user'];
            $sql_jumlah = "SELECT COUNT(no_ticket) AS jumlah FROM `tb_request` WHERE id_user = $id_user and month(tgl_req) = $bulan AND year(tgl_req) = $tahun";
            $query_jumlah = mysqli_query($link, $sql_jumlah);
            $jumlah = mysqli_fetch_array($query_jumlah);
            ?>
            <h2 class="card-title text-center"><?= $jumlah['jumlah']?></h2>
            <h2 class="card-title text-center">Pengajuan</h2>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <img class="img-fluid" src="../assets/img/icons/banner.png" alt="">
      </div>
    </div>
  </div>
</div>

