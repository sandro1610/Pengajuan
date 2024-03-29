  <div class="card">
  <!-- Card header -->
    <div class="card-header"><h3 class="mb-0">Data Pengajuan</h3></div>
    <div class="container">
      <div class="table-responsive py-4">
        <table class="table table-flush" id="data-request">
          <thead class="thead-light">
              <tr>
                  <th></th>
                  <th style="width:70%">Status</th>
                  <th>Balasan</th>
                  <th>No Ticket</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Description</th>
                  <th>E-mail</th>
                  <th>No Handphone</th>
                  <th>Attachment</th>
              </tr>
          </thead>
          <tbody>
          <?php
            $id_user = $_SESSION['id_user'];
            $sql = "SELECT * FROM tb_request 
                    INNER JOIN tb_user ON tb_request.id_user = tb_user.id_user
                    WHERE tb_request.id_user = $id_user";
            $query = mysqli_query($link,$sql);
            while($hasil=mysqli_fetch_array($query)):
          ?>
            <tr>
              <td>
                <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $hasil['no_ticket']; ?>">Detail</a>
                <a href="#" type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-form<?php echo $hasil['no_ticket']; ?>">
                  <i class='fas fa-pencil-alt' style="color: gray;"></i>
                  </a>
                  <a class="btn btn-sm btn-default" href="javascript:hapusData_request('<?=$hasil['no_ticket'];?>')">
                       <i class='fas fa-trash' style="color: red;"></i>
                  </a>
                <!-- Modal -->
                <div class="modal fade" id="myModal<?php echo $hasil['no_ticket']; ?>" role="dialog">
                   <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title-default">Detail</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                          <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                              <form role="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">No Ticket</label>
                                      <div class="col-sm-6">
                                         <input class="form-control" readonly type="text" value="<?= $hasil['no_ticket'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">Tanggal</label>
                                      <div class="col-sm-6">
                                         <input class="form-control" readonly type="text" value="<?= $hasil['tgl_req'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">Nama</label>
                                      <div class="col-sm-6">
                                         <input class="form-control" readonly type="text" value="<?= $hasil['nama'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="fname" class="col-sm-3 text-left control-label col-form-label">Description</label>
                                      <div class="col-sm-6">
                                          <textarea readonly type="text" name="description" class="form-control" id="description" placeholder="Description"><?=$hasil['description'];?></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="lname" class="col-sm-3 text-left control-label col-form-label">Email</label>
                                      <div class="col-sm-6">
                                        <input class="form-control" readonly type="text" value="<?= $hasil['email'] ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="lname" class="col-sm-3 text-left control-label col-form-label">Status</label>
                                      <div class="col-sm-6">
                                        <textarea rows="5" class="form-control" readonly type="text" value=""><?php 
                                                                                                if ($hasil['status'] < 1) {
                                                                                                  echo "Menunggu Persetujuan Admin/TU";
                                                                                                  }elseif($hasil['status'] == 1){
                                                                                                    echo "Menunggu Persetujuan Kadin";
                                                                                                  }elseif($hasil['status'] == 2){
                                                                                                    echo "Menunggu Persetujuan Kabid";
                                                                                                  }elseif($hasil['status'] == 3){
                                                                                                    echo "Permohonan Disetujui, silahkan menunggu untuk dihubungi atau datang langsung ke kantor dengan membawa dokumen yang di kirim";
                                                                                                  }elseif($hasil['status'] == 4){
                                                                                                    echo "Ditolak Admin/TU";
                                                                                                  }elseif($hasil['status'] == 5){
                                                                                                    echo "Ditolak Kadin";
                                                                                                  }elseif($hasil['status'] == 6){
                                                                                                    echo "Ditolak Kabid";
                                                                                                  }else{
                                                                                                    echo "Ditolak";
                                                                                                  }
                                                                                                ?></textarea>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="file" class="col-sm-3 text-left control-label col-form-label">File</label>
                                      <div class="col-md-6">
                                          <a download="<?=$hasil['attachment'];?>" href="../upload/request/<?=$hasil['attachment'];?>"><?=$hasil['attachment'];?></a>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="file" class="col-sm-3 text-left control-label col-form-label">Balasan</label>
                                      <div class="col-md-6">
                                          <a download="<?=$hasil['balasan'];?>" href="../upload/balasan/<?=$hasil['balasan'];?>"><?=$hasil['balasan'];?></a>
                                      </div>
                                  </div>   
                                  <div class="text-center">
                                    <a class="btn btn-danger" href="javascript:hapusData_request('<?=$hasil['no_ticket'];?>')">Delete</a>
                                  </div>
                              </form>
                            </div>
                          </div>    
                        </div>            
                      </div>
                    </div>
                </div>
              </td>
              <td class="<?php 
                if ($hasil['status'] < 1) {
                  echo "bg-warning text-white font-weight-bold";
                 }elseif($hasil['status'] == 1){
                   echo "bg-secondary text-black font-weight-bold";
                 }elseif($hasil['status'] == 2){
                   echo "bg-primary text-white font-weight-bold";
                 }elseif($hasil['status'] == 3){
                   echo "bg-success text-white font-weight-bold";
                 }elseif($hasil['status'] == 4){
                   echo "bg-danger text-white font-weight-bold";
                 }elseif($hasil['status'] == 5){
                  echo "bg-danger text-white font-weight-bold";
                }elseif($hasil['status'] == 6){
                  echo "bg-danger text-white font-weight-bold";
                }else{
                  echo "bg-danger text-white font-weight-bold";
                }
               ?>"><?php 
               if ($hasil['status'] < 1) {
                echo "Menunggu Persetujuan Admin/TU";
                }elseif($hasil['status'] == 1){
                  echo "Menunggu Persetujuan Kadin";
                }elseif($hasil['status'] == 2){
                  echo "Menunggu Persetujuan Kabid";
                }elseif($hasil['status'] == 3){
                  echo "Permohonan Disetujui, silahkan menunggu untuk dihubungi atau datang langsung ke kantor dengan membawa dokumen yang di kirim";
                }elseif($hasil['status'] == 4){
                  echo "Ditolak Admin/TU";
                }elseif($hasil['status'] == 5){
                  echo "Ditolak Kadin";
                }elseif($hasil['status'] == 6){
                  echo "Ditolak Kabid";
                }else{
                  echo "Ditolak";
                }
              ?></td>
              <td><a download="<?=$hasil['balasan'];?>" href="../upload/balasan/<?=$hasil['balasan'];?>"><?=$hasil['balasan'];?></a></td>
              <td><?=$hasil['no_ticket'];?></td>
              <td><?=$hasil['tgl_req'];?></td>
              <td><?=$hasil['nama'];?></td>
              <td><?=$hasil['description'];?></td>
              <td><?=$hasil['email'];?></td>
              <td><?=$hasil['no_hp'];?></td>
              <td><a download="<?=$hasil['attachment'];?>" href="../upload/request/<?=$hasil['attachment'];?>"><?=$hasil['attachment'];?></a></td>
            </tr>
              <?php endwhile; ?>
          </tbody>
      </table>
    </div>
    </div>
  </div>

  <!-- Modal Edit-->
<?php
$result = mysqli_fetch_array($query);
if(isset($_POST["Edit"])){  
  $description = $_POST['description'];
  $no_ticket = $_POST['no_ticket'];
  $sql = mysqli_query($link,"UPDATE tb_request SET description = '$description' WHERE no_ticket = '$no_ticket'");
  if ($sql) {
      echo "<script>alert('Data Saved Successfully');</script>";
      echo "<script>window.location='?p=history_request';</script>";
    } else {
      echo "<script>alert('Data Failed to Save');</script>";
  }
}
?>
<?php
    $sql = "SELECT * FROM tb_request 
            INNER JOIN tb_user ON tb_request.id_user = tb_user.id_user";
    $query = mysqli_query($link,$sql);
    while($hasil=mysqli_fetch_array($query)):
?>
<div class="modal fade" id="modal-form<?php echo $hasil['no_ticket']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="modal-title-default">Edit Request</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
      </div>
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" method="POST" enctype="multipart/form-data">
              <input hidden name="no_ticket" value="<?php echo $hasil['no_ticket']; ?>">
              <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-left control-label col-form-label">Description</label>
                  <div class="col-sm-6">
                      <textarea type="text" name="description" class="form-control" id="description" placeholder="Description"><?php echo $hasil['description']; ?></textarea>
                  </div>
              </div>
                <div class="text-center">
                    <button type="Submit" class="btn btn-primary my-4" name="Edit" data-toggle="modal" data-target="#modal-form1">Edit</button>
                </div>
            </form>
          </div>
        </div>    
      </div>            
    </div>
  </div>
</div>
<?php endwhile; ?>