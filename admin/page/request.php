<?php
if(isset($_POST["Submit"])){
    $email = $_SESSION['email'];
    $tgl_req = date('Y-m-d');
    $id_user = $_POST['id_user'];
    $description = $_POST['description'];
    $v_key = md5(time().$id_user);

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmp_name = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf','doc','docx');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 1000000) {
          $sql = mysqli_query($link, "SELECT nama FROM tb_user where id_user=$id_user");
          $result = mysqli_fetch_assoc($sql);
          $date = date('d-M-Y H-i-s');
          $fileNewName = $result['nama'].' '.$date.'.'.$fileActualExt;
          $fileDestination = '../upload/request/'.$fileNewName;
          move_uploaded_file($fileTmp_name, $fileDestination);
          $sql = mysqli_query($link,"INSERT INTO tb_request (no_ticket, tgl_req, email, id_user, status, description, attachment, v_key)
            VALUES ('',
                    '$tgl_req',
                    '$email', 
                    '$id_user',
                    '1',
                    '$description',
                    '$fileNewName',
                    '$v_key')" );
          if ($sql) {
            echo "<script>alert('Data Saved Successfully');</script>";
            echo "<script>window.location='?p=history_request';</script>";
          } else {
            echo "<script>alert('Data Failed to Save');</script>";
          }
        }else{
          echo "<script>alert('Your file is too big !!');</script>";
        }
      }else{
        echo "<script>alert('Thare is an error in your file !!');</script>";
      }
    }else{
      echo "<script>alert('Sorry only pdf files are allowed');</script>";
    }
}
?>

<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Request</h3>
      </div>
    </div>
  </div>
    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
      <div class="card-body">
              <input type="hidden" class="form-control" value="<?php echo $_SESSION['id_user'];?>" name="id_user">
              <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-left control-label col-form-label">Description</label>
                  <div class="col-sm-6">
                      <textarea type="text" name="description" class="form-control" id="description" placeholder="Description"></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="file" class="col-sm-3 text-left control-label col-form-label">File</label>
                  <div class="col-md-6">
                      <input type="file" name="file" class="form-control">
                  </div>
              </div>  
              <div class="border-top">
                  <div class="card-body">
                      <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                  </div>
              </div>
      </div>
    </form>
</div>