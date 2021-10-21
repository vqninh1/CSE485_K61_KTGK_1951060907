<?php
  if(isset($_POST['btnSave'])){
    $reci_name      = $_POST['txtHoTen'];
    $reci_age    = $_POST['txtNamSinh'];
    $reci_bgroup    = $_POST['txtNhomMau'];
    $reci_bqnty    = $_POST['txtSomaucannhan'];
    $reci_sex    = $_POST['txtGioiTinh'];
    $reci_reg_date     = $_POST['dateNgayDangKi'];
    $reci_phno  = $_POST['txtMobile'];

    require("../config/connect.php");

    $sql = "INSERT INTO blood_recipient(reci_name, reci_age, reci_bgrp, reci_bqnty, reci_sex, reci_reg_date, reci_phno)
    VALUES('$reci_name','$reci_age','$reci_bgroup','$reci_bqnty','$reci_sex','$reci_reg_date','$reci_phno')";

    echo $sql."<br>";

    if(mysqli_query($conn,$sql)==TRUE){
        $value='ok';
        header("Location:index.php?response=$value");
      }else{
        echo 'Fix Success';
      }
    mysqli_close($conn);
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Update</title>
  </head>
  <body>
    <?php
      // Kết nối Database
      $conn = mysqli_connect('localhost', 'root', '', 'receive-blood');
      if (!$conn) {
          die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
      }
      $reci_id = $_GET['reci_id'];
      $query = mysqli_query($conn, "select * from `blood_recipient` where reci_id='$reci_id'");
      $row = mysqli_fetch_assoc($query);
    ?>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-success text-white">
            <div class="container">
                <a class="navbar-brand" href="#"><i class="fas fa-home"></i>Trang chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" href="#">Quản lý người nhận máu</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tính năng
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled">Giới thiệu</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn btn-warning" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
      </header>
      <main class="mt-4">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2>Sửa thông tin</h2>
                <form  method="post">
                  <div class="row mb-3">
                    <label for="txtHoTen" class="col-sm-2 col-form-label">Họ Và Tên</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo isset($row['reci_name']); ?>" class="form-control" id="txtHoTen" name="txtHoTen">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtNămSinh" class="col-sm-2 col-form-label">Năm Sinh(Tuổi)</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo isset($row['reci_age']); ?>" class="form-control" id="txtNamSinh" name="txtNamSinh">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtNhomMau" class="col-sm-2 col-form-label">Nhóm Máu</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo isset($row['reci_bgroup']); ?>" class="form-control" id="txtNhomMau" name="txtNhomMau">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtGioiTinh" class="col-sm-2 col-form-label">Giới Tính</label>
                    <div class="col-sm-10">
                      <input type="text" value="<?php echo isset($row['reci_sex']); ?>" class="form-control" id="txtGioiTinh" name="txtGioiTinh">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="txtMobile" class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                      <input type="tel" value="<?php echo isset($row['reci_phno']); ?>" class="form-control" id="txtMobile" name="txtMobile">
                    </div>
                  </div>
                  
                  </div>
                  <button type="submit" class="btn btn-primary" name="btnUpdate">Sửa</button>
                </form>
              </div>
            </div>
        </div>
      </main>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

