<?php
    include('config.php');

    $user_check = $_SESSION['login_user'];
    $id = $_SESSION['id'];

    // First Name Handling 
    $ses_sql = mysqli_query($db,"SELECT firstname FROM users WHERE username = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session_uname = $row['firstname'];

    // Account Total Handing
    $account_total_sel = mysqli_query($db, "SELECT account.account_total FROM users,account WHERE users.id = account.user_account_id AND id= '$id' ");
    $row = mysqli_fetch_array($account_total_sel, MYSQLI_ASSOC);
    if($row != NULL) {
        $account_total = $row['account_total'];
    }
    
    // Active Account ID Handling
    $account_active = mysqli_query($db, "SELECT account.account_primary_id FROM users, account WHERE users.id = account.user_account_id AND id= '$id' ");
    $account_active_count = mysqli_num_rows($account_active);
    
    if ($account_active_count==1) {
        $account_active_check = mysqli_fetch_array($account_active, MYSQLI_ASSOC);
        $account_number = $account_active_check['account_primary_id'];


        // Transaction Handling
        $transactionAmount = mysqli_query($db, "SELECT amount FROM users, account, transactions WHERE users.id = account.user_account_id AND users.id = '$id' ");
        $transactionAmount_check = mysqli_fetch_array($transactionAmount, MYSQLI_ASSOC);
        if ($transactionAmount_check != null) {
            $amount = $transactionAmount_check['amount'];

            print_r(mysqli_fetch_array($transactionAmount, MYSQLI_ASSOC));

            $transactionDate = mysqli_query($db, "SELECT transactions.created_at FROM users, account, transactions WHERE users.id = account.user_account_id AND users.id = '$id'");
            $transactionDate_check = mysqli_fetch_array($transactionDate, MYSQLI_ASSOC);
            $date = $transactionDate_check['created_at'];
        }
    }

    if(!isset($_SESSION['login_user'])){
      header("location: login.php");
      die();
    }
?>