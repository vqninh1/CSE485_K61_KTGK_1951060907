<?php
    $conn = mysqli_connect('localhost','root','','receive-blood');
    if(!$conn){ 
        die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
    }
?>