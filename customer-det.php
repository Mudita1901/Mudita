<html>
    <head>
    <style>

        body{
            font-family: tahoma;
    
        }

        header{
    
            background: url(bg.svg);
            background-size: cover;
            height: 60vh;
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
            font-size: 50px;
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
            text-decoration: none;



        }

        .theme-btn:hover{
            text-decoration: none;
            background-color: #fffff1;
            color: #033974;
        }
        .details{
            position: relative;
            top: -10px;
            right: -50px;
            width :50vw;
            text-align: left;
            
        }
        .main-div{
            display: flex;
            flex-direction: row ;
        }

        .buttons{
    
            width: 40%;
            height: 200px;
            margin-left: 9%;
            margin-top: 5%;
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
                            <?php
                                
                                //creating connection to database
                                $servername = 'localhost';
                                $username = 'root';
                                $password = '';
                                $databasename = 'banking';

                                //connection to the database

                                $connection = mysqli_connect($servername, $username, $password, $databasename);
                                        
                                //chech if connection was successful

                                /*if(!$connection){
                                    die('Connection unsuccessful :' .mysqli_connect_error());
                                }else{
                                    echo 'Connection success!';
                                }*/

                                //store user input into the variables
                                $id = $_GET['acc_id'];

                                //define delete query
                                $sql = "SELECT * FROM customers WHERE acc_id='$id'";
                                $viewQuery = mysqli_query($connection, $sql);
                                $rowCount = mysqli_num_rows($viewQuery);
                                session_start();
                                while($row = mysqli_fetch_array($viewQuery)){
                                    $_SESSION["id"] = $row['acc_id'];
                                    $_SESSION["name"] = $row['name'];
                                    $_SESSION["email"] = $row['email'];
                                    $_SESSION['phone_no'] = $row['phone_no'];
                                    $_SESSION['address'] = $row['address'];
                                    $_SESSION['balance'] = $row['acc_balance'];
                                }
                                session_write_close();
                                
                                
                                

                            ?>
                            <h1>Customer ID 
                                <?php 
                                    session_start();
                                    echo $_SESSION['id'];
                                    session_write_close();
                                ?> </h1>
                            

                            

                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-div">
        <div class="details">
            <h2>Name:
                <?php 
                    session_start();
                    echo $_SESSION['name'];
                    session_write_close();
                    ?> 

            </h2>
            <h2>Email:
                <?php 
                    session_start();
                    echo $_SESSION['email'];
                    session_write_close();
                    ?> 
            </h2>
            <h2>Phone Number:
                <?php 
                    session_start();
                    echo $_SESSION['phone_no'];
                    session_write_close();
                    ?> 
            </h2>
            <h2>Address:
                <?php 
                    session_start();
                    echo $_SESSION['address'];
                    session_write_close();
                    ?> 
            </h2>
            <h2>Balance:
                <?php 
                    session_start();
                    echo $_SESSION['balance'];
                    session_write_close();
                    ?> 
            </h2>
        </div>
        <div class="buttons">
            <a href="transaction.php" class="theme-btn">Make a Transaction</a>
            <a href="home.php" class="theme-btn">Go Home</a>
        </div>
        </div>
    </body>
</html>



