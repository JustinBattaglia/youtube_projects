<!DOCTYPE html>
<?php include("session.php");?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/styles.css">
        <title>Welcome</title>
    </head>
    <style>
        
    </style>
    <body>
        <navbar>
            <a id="home-btn" href="index.php" alt="home">
                <div class="bg_slider_r"></div>
                <img src="images/home.png" alt="">
            </a>
            <a id="logout-btn" href = "logout.php" alt="Log Out">
                <div class="bg_slider_l"></div>
                <img src="images/logout.png" alt="">
            </a>
        </navbar>
        <div class="wrapper">
            <h1 style="margin-top: 80px;">Hello <?php echo $login_session_uname; ?>, welcome back.</h1>
            <br>
            <div class="content-container">
                <div class="details-container left">
                    <div class="bank-action-container">
                        <form id="deposit" action="bankActions/deposit.php" method="POST">
                            <input type="text" name="depositAmount">
                            <button type="submit">Deposit</button>
                        </form>
                        <br>
                        <form id="withdraw" action="bankActions/withdraw.php" method="POST">
                            <input type="text" name="withdrawAmount">
                            <button type="submit">Withdraw</button>
                        </form>
                    </div>
                </div>
                <div class="right">
                    <h2>
                        <?php     
                            if ($account_active_count != 1) {
                                echo "<h2>No Account Created</h2>";
                                echo "<h2>
                                        <a href = 'bankActions/createAcct.php' class='create-acct'>Create Account</a>
                                      </h2>";
                            } else {
                                if (mysqli_num_rows($account_total_sel) == 1) {
                                    echo "
                                        <div style='font-size: .8em; display: flex;'>
                                            <h2>
                                                Account #$account_number
                                            </h2>
                                            <h2 style='align-self: flex-end;'>
                                                Total: $$account_total.00
                                            </h2>
                                        </div>";
                                } 
                            }
                        ?>
                    </h2>
                    <h2><?php 
                        if ($account_active_count == 1) {
                            echo "Transaction History";
                        }
                        ?>
                    </h2>
                    <?php 
                        $query = mysqli_query($db, "SELECT * FROM users, account, transactions WHERE users.id = account.user_account_id AND account.account_primary_id = transactions.account_transaction_ID AND users.id = '$id';");

                        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            if ($row['amount'] < 0) {
                                echo "
                                <div>
                                    <h3> 
                                        Transaction: -$".abs($row['amount']).".00 | "."Date: ".$row['created_at']."
                                    </h3>
                                </div>";
                            } else {
                                echo "
                                        <div>
                                            <h3> 
                                                Transaction:&nbsp; $".$row['amount'].".00 | "."Date: ".$row['created_at']."
                                            </h3>
                                        </div>";
                            }

                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>