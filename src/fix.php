<?php
require("../config/connect.php");

if (isset($_POST['update'])) {
  $reci_name      = $_POST['txtHoTen'];
  $reci_age    = $_POST['txtNamSinh'];
  $reci_bgroup    = $_POST['txtNhomMau'];
  $reci_bqnty    = $_POST['txtSomaucannhan'];
  $reci_sex    = $_POST['txtGioiTinh'];
  $reci_reg_date     = $_POST['dateNgayDangKi'];
  $reci_phno  = $_POST['txtMobile'];

    $sql = "UPDATE `blood_recipient` SET reci_name='$reci_name',reci_age = '$reci_age', reci_bgrp='$reci_bgrp', reci_bqnty='$reci_bqnty', reci_sex='$reci_sex', reci_reg_date='$reci_reg_date', reci_phno='$reci_phno' WHERE reci_id='$reci_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Sửa thành công";
    } else {
        echo "Sửa thất bại: " . $conn->error;
    }

    $conn->close();
    header("Location: /project06/src/index.php/ ");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản lí nhận máu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./add.php">Thêm</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container">
            <?php
            $reci_id = $_GET['reci_id'];
            $query = mysqli_query($conn, "select * from `blood_recipient` where reci_id='$reci_id'");
            $row = mysqli_fetch_assoc($query);
            ?>
            <div class="container-fluid !direction !spacing">
                <form method="POST" class="form">
                    <h2>Sửa thành viên</h2>

                    <label for="formGroupExampleInput" class="form-label">Họ và tên: </label>
                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['reci_name']; ?>" name="txtHoTen">

                    <label for="formGroupExampleInput" class="form-label">Tuổi: </label>
                    <input type="int" class="form-control" id="formGroupExampleInput" value="<?php echo $row['reci_age']; ?>" name="txtNamSinh">


                    <label for="formGroupExampleInput" class="form-label">Nhóm máu: </label>
                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['reci_bgrp']; ?>" name="txtNhomMau">

                    <label for="formGroupExampleInput" class="form-label">Số lượng máu cần nhận(ml): </label>
                    <input type="int" class="form-control" id="formGroupExampleInput" value="<?php echo $row['reci_bqnty']; ?>" name="txtSomaucannhan">

                    <label for="formGroupExampleInput" class="form-label">Giới tính: </label>
                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['reci_sex']; ?>" name="txtGioiTinh">

                    <label for="formGroupExampleInput" class="form-label">Ngày đăng kí nhận máu: </label>
                    <input type="date" class="form-control" id="formGroupExampleInput" value="<?php echo $row['reci_reg_date']; ?>" name="dateNgayDangKi">

                    <label for="formGroupExampleInput" class="form-label">Số điện thoại: </label>
                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['reci_phno']; ?>" name="txtMobile">

                    <input class="btn btn-primary" type="submit" value="Lưu" name="update">

                </form>
            </div>

        </main>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>