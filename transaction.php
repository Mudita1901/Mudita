<html>
    <head>
        <title>Transact Money</title>
        <style>
            body{
                font-family: tahoma;
                
            }
            header{
                
                background: url(bg.svg);
                background-size: cover;
                height: 55vh;
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
                top: -90px;
                text-align: center;
            }

            input[type='text']{
                margin: 0px;
                width: 260px;
                height: 40px;
                padding: 3px;
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
                            <h1>Enter Following Details To Transfer Money</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-div">
            <form action="transfer-money.php" method="GET" id="transfer-form"><br/>
                <h2>From: <input type="text" placeholder="Account ID" name="from_acc_id"/></h2><br/>
                <h2>To: <input type="text" placeholder="Account ID" name="to_acc_id"/></h2><br/>
                <h2>Amount: <input type="text" placeholder="Enter Amount" name="amount"/></h2><br/>
                <input type="submit" value="Transfer" class="theme-btn" name="transfer"/>
            </form>
        </div>
    </body>
</html>