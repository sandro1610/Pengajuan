<?php
include "../includes/conn.php";
if (isset($_POST["Submit_User"])) {
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $no_hp = $_POST["no_hp"];
  $level = $_POST["level"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $sql = mysqli_query($link, "INSERT INTO tb_user(nama, email, no_hp, level, password) VALUES ('$nama', '$email', '$no_hp', '$level', '$password')");
  if ($sql) {
    echo "<script>alert('Account Successfully Registered');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Account Failed To Registered');</script>";
  }
}
?>
<div class="container-fluid">
  <div class="header-body">
    <div class="row">
      <div class="col-lg-9">
        <table class="table table-bordered table-responsive" id="data-transaksi">
          <div class="row">
            <div class="col-lg-10" >
              <h2>USER</h2>
            </div>
            <div class="col-lg-2 text-right">
              <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">ADD DATA</a>
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="modal-title-default">Tambah User</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-md-3 py-md-3">
                          <form role="form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                </div>
                                <input class="form-control" name="nama" placeholder="Name" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" name="email" placeholder="Email" type="email">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                </div>
                                <input class="form-control" name="no_hp" placeholder="No Handphone" type="text">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-briefcase-24"></i></span>
                                </div>
                                <select class="form-control" name="level">
                                  <option selected disabled>Level</option>
                                  <option value="Admin">Admin</option>
                                  <option value="Kadin">Kepala Dinas</option>
                                  <option value="Kabid">Kepala Bidang</option>
                                  <option value="Pemohon">Pemohon</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" name="password" placeholder="Password" type="password">
                              </div>
                            </div>
                            <div class="text-center">
                              <button class="btn btn-primary mt-4" name="Submit_User" type="Submit">Create account</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>E-mail</th>
              <th>No Handphone</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM tb_user";
            $query = mysqli_query($link, $sql);
            while ($hasil = mysqli_fetch_array($query)) :
            ?>
              <tr>
                <td><?= $hasil['id_user']; ?></td>
                <td><?= $hasil['nama']; ?></td>
                <td><?= $hasil['email']; ?></td>
                <td><?= $hasil['no_hp']; ?></td>
                <td><?= $hasil['level']; ?></td>
                <td>
                  <a href="#" data-toggle="modal" data-target="#modal-form<?php echo $hasil['id_user']; ?>">
                    <i class='fas fa-pencil-alt' style="color: blue;"></i>
                  </a>
                  |
                  <a href="javascript:hapusData_user('<?= $hasil['id_user']; ?>')">
                    <i class='fas fa-trash' style="color: red;"></i>
                  </a>
                </td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      </div>
      <div class="col-lg-3">
        <div class="card">
          <div class="card-header">
            JUMLAH PENGAJUAN BULAN INI
          </div>
          <div class="card-body">
            <?php
            $sql_jumlah = "SELECT COUNT(no_ticket) AS jumlah FROM `tb_request` WHERE month(tgl_req) = 07 AND year(tgl_req) = 2022";
            $query_jumlah = mysqli_query($link, $sql_jumlah);
            $jumlah = mysqli_fetch_array($query_jumlah);
            ?>
            <h2 class="card-title text-center"><?= $jumlah['jumlah']?></h2>
            <h2 class="card-title text-center">Pengajuan</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Edit-->
<?php
if (isset($_POST["Edit"])) {
  $nama = $_POST['nama'];
  $id_user = $_POST['id_user'];
  $email = $_POST['email'];
  $email = $_POST['no_hp'];
  $level = $_POST['level'];
  $sql = "SELECT * FROM tb_user WHERE id_user = '$id_user'";
  $query = mysqli_query($link, $sql);
  $hasil = mysqli_fetch_array($query);
  $sql = mysqli_query($link, "UPDATE tb_user SET  nama = '$nama', email = '$email', no_hp = '$no_hp', level = '$level' WHERE id_user = '$id_user'");
  if ($sql) {
    echo "<script>alert('Data Saved Successfully');</script>";
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "<script>alert('Data Failed to Save');</script>";
  }
}
?>
<?php
$sql = "SELECT * FROM tb_user";
$query = mysqli_query($link, $sql);
while ($hasil = mysqli_fetch_array($query)) :
?>
  <div class="modal fade" id="modal-form<?php echo $hasil['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-title-default">Edit User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body p-0">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" method="POST" enctype="multipart/form-data">
                <input name="id_user" hidden value="<?php echo $hasil['id_user']; ?>">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" name="nama" value="<?php echo $hasil['nama']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" value="<?php echo $hasil['email']; ?>" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                    </div>
                    <input class="form-control" name="no_hp" value="<?php echo $hasil['no_hp']; ?>" type="no_hp">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-briefcase-24"></i></span>
                    </div>
                    <select class="form-control" name="level">
                      <option selected disabled>Level</option>
                      <option value="admin">Admin</option>
                      <option value="manager">Manager</option>
                      <option value="staff">Staff</option>
                      <option value="petugas">Petugas</option>
                      <option value="engginer">Engginer</option>
                    </select>
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