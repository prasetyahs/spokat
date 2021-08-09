<!DOCTYPE html>
<html>
<head>
    <title>SPOKAT WASH</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<link rel="shortcut icon" href="logo/resik.png">
<body style="background: #f0f0f0">
    <br/>
    <br/>
    <center>
        <h2>SPOKAT WASH</h2>
    </center>
    <br/>
    <br/>
    
    <div class="container">
        <div class="col-md-4 col-md-offset-4">        
            <form action="prosesregister.php" method="post">
                <div class="panel">
                    <br/>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Usename</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Hp</label>
                            <input type="number" class="form-control" name="no_hp">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>  
                        <input type="submit" class="btn btn-primary" value="Register">      
                    </div>
                    <br/>
                    <p>Sudah Punya Akun Silahkan <a href="login.php">Login</a></p>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
