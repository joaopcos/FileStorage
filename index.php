<?php
session_start();
if(isset($_SESSION['user'])){
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<head>
    <title>Log in</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body{
            margin: 0;
            background-color: ghostwhite;
            font: 16px Arial, sans-serif;
        }
        #main{
            width: 600px;
            height: 350px;
        }
        #main-header{
            justify-content: center;
        }
        #main-body{
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        #main-body form{
            display: flex;
            flex-direction: column;
            width: 80%;
        }
        #alert{
            position: relative;
            top: -10px;
            width: 600px;
            background-color: red;
            color: white;
            border-radius: .225rem;
        }
        #alert-content{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #alert-content > p{
            margin: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="alert">
            <div id="alert-content">
            </div>
        </div>
        <div id="main">
            <div id="main-header">
                <h2>Log in</h2>
            </div>
            <i class="divider"></i>
            <div id="main-body">
                <form id="login">
                    <input type="text" name="user" id="user" class="form" placeholder="User">
                    <input type="password" name="password" id="password" class="form"  placeholder="Password">
                    <input type="submit" class="btn success">
                </form>
            </div>
        </div>
    </div>
    <div id="loading-ajax">
    </div>
    <script src="assets/scripts/jquery-3.6.0.min.js"></script>
    <script src="assets/scripts/Login.js"></script>
</body>
</html>