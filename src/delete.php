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
<?php 

    include('../config/connect.php');

    $reci_id = $_GET['reci_id'];

    $sql = "DELETE FROM blood_recipient WHERE reci_id=$reci_id";
    $res = mysqli_query($conn, $sql);
    if($res==TRUE){
        $value='Delete';
        header("Location:index.php?response=$value");
    }else{
        echo 'Delete Success';
    }
    mysqli_close($conn);

?>