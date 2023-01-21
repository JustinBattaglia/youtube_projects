<?php
    include('../session.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // $deposit = mysqli_real_escape_string($db,$_POST['depositAmount']);

        $deposit = $_POST['depositAmount'];

        $account_total_sel = mysqli_query($db, "SELECT account.account_total FROM users,account WHERE users.id = account.user_account_id AND id= '$id' ");
        
        if (mysqli_num_rows($account_total_sel) == 1) {
            try {
                $DEPOST_ACTION = mysqli_query($db, "UPDATE account SET account_total = account_total + $deposit WHERE account.user_account_id = '$id' ");

              }
              catch(Exception $ignored) {
              }
        } 
        
        $process_account = mysqli_multi_query($db, "INSERT INTO transactions (account_transaction_ID, amount) VALUES ($account_number, $deposit);");
        
    }

    header('location: ../user_account.php')
?>