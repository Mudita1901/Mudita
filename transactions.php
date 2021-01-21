<html>
    <head>
        <title>
            Transactions
        </title>
        <style>
            body{
                font-family: tahoma;
                
            }
            header{
                
                background: url(bg.svg);
                background-size: cover;
                height: 70vh;
                position: relative;
                overflow: hidden;
                
                
            }

            header:after{
                content:"";
                position: absolute;
                bottom:0;
                width: 100%;
                background-image: url(wave-bottom.svg);
                height: 275px;


            }

            .header-content{
                z-index:1;
                position: relative;
                text-align: center;

            }

            .header-content h1{
                font-size: 45px;
                font-weight: bold;
                text-transform: capitalize;
                color: #fffff1;
            }

            .theme-btn{
                border-radius: 50px;
                background: #033974;
                padding: 15px 30px;
                min-width: 170px;
                border: 2px solid #033974;
                color: #fffff1;
                font-size: 14px;
                text-transform: uppercase;
                margin-top: 13px;
                display: inline-block;
                text-align: center;
                margin-right: 12px;
                transition: all 0.5s ease-in;
                font-weight: bold;
                cursor: pointer;
                text-decoration:none;


            }

            .theme-btn:hover{
                text-decoration: none;
                background-color: #fffff1;
                color: #033974;
            }

            .main-div{
                width: 100vw;
                margin:0 auto;
                position: relative;
                top: -40px;
            }
            h1{
                text-align: center;
            }
            table{
               margin: 15px auto;
               width :50vw;
               text-align: center;
            }
            table tr td{
                padding: 12px;
            }
        </style>
    </head>
    <body>
    <header>
            <div class="container">
                <div class="header-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div style="margin-top: 100px;"></div>
                            <h1>Transactions</h1>
                            <a href="home.php" class="theme-btn">Home</a>
                            <a href="transaction.php" class="theme-btn">Transact Money</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-div">
            <div>
                <?php
                    $servername = 'localhost';
                    $username = 'root';
                    $password = '';
                    $databasename = 'banking';

                    //connection to the database

                    $connection = mysqli_connect($servername, $username, $password, $databasename);

                    //check if connection was successful

                    if(!$connection){
                        die('Connection unsuccessful :' .mysqli_connect_error());
                    }

                    //query the table for the records
                    
                    $sql = "SELECT * FROM transactions";  //set up our query
                    $result = mysqli_query($connection, $sql);  //store the result of our query into the $result
                    $rowCount = mysqli_num_rows($result);

                    if($rowCount>0){
                        echo "
                            <table>
                                <thead>
                                    <tr>
                                        <th>Transaction Id</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Amount</th>
                                        
                                    </tr>
                                </thead>
                        ";
                    }
                ?>
                <?php
                    while($row = $result->fetch_assoc()):
                    
                ?>
                <tr>
                            <td><?php echo $row['transaction_id']?></td>
                            <td><?php echo $row['tran_from_acc_id']?></td>
                            <td><?php echo $row['trans_to_acc_id']?></td>
                            <td><?php echo $row['amount']?></td>
                            
                            
                        </tr>
                        
                    <?php endwhile ?>

                </table>
            </div>

        </div>
    </body>
</html>