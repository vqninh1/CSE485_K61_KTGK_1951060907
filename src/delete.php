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