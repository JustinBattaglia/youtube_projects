<?php 
    include '../session.php';
        
    echo $user_check;

    $sql = "SELECT id FROM users WHERE username = '$user_check'";
    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $id = $row['id'];
    echo $id;
    $total = 0;

    $sql = "INSERT INTO `account` (account_total, user_account_id) VALUES($total,$id)";
    $result = mysqli_query($db,$sql);
    header("location: ../user_account.php");
?>