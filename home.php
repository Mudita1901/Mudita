<html>
    <head>
        <title>Online Transactions</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>

            body{
                font-family: tahoma;
                
            }

            header{
                
                background: url(bg.svg);
                background-size: cover;
                height: 100vh;
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


            }

            .theme-btn:hover{
                text-decoration: none;
                background-color: #fffff1;
                color: #033974;
            }
            

            
        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="header-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div style="margin-top: 230px;"></div>
                            <h1>Make Bank Transactions Simple! </h1>
                            <a href="customers.php" class="theme-btn">View All Customers</a>
                            <a href="transactions.php" class="theme-btn">View All Transactions</a>
                            <div class="go-about"></div>

                        </div>
                        <div class="col-lg-6">
                            <div style="margin-top: 130px;"></div>
                            <img src="moneyr.png" class="img-responsive" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
