<!-- http://demos.jquerymobile.com/1.4.5/popup/#&ui-state=dialog -->
<!DOCTYPE html>
<?php 
include("../connection.php");
include('login-action.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WestView Pensione House</title>
        <link rel="icon" href="../images/logo.png" type="image/png" sizes="32x32">
        <link rel="stylesheet" type="text/css" href="../css/westview.css">
        <script type="text/javascript" src="../source/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
        <script type='text/javascript' src="../source/jquery-slider.js"></script>
        <script type='text/javascript' src="../source/main.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="nav-bar-head">
                    <div class="head-logo">
                        <div class="logo">
                            <a href="../index.php">
                                <img id="header-logo" src="../images/logo.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nav-bar" id="main-menu">
                    <ul>
                        <li><a href="../index.php">home</a></li>
                        <li><a href="#">room</a></li>
                        <li><a href="#">gallery</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </div>
                <div class="nav-accnt">
                    <p style="font-size: 13.5px;color:#DDD;">[ <a class="btn-login" href="#">Login</a> ]</p>
                    <div class="popup">
                        
                        <form method="post" action="">
                            <h3><span class="title">Please Login</span></h3>
                            <p><input class="ui-input-text" name="username" type="text" placeholder="Username" required/></p>
                            <P><input class="ui-input-text" name="password" type="password" placeholder="Password" required/></P>
                            <P><input class="btn-submit-login" name="submit" type="submit" value="Sign In" /> or <a class="a-signup" href="../registration.php">Sign Up</a></P>
                            <p><a class="a-signup" href="../registration.php">Forgot Password</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <div class="main-content-reg">
                <div class="content2 effect2">
                    <div class="reg-content">
                        <h2>Welcome Administrator</h2>
                        <table>
                            <form action="?" method="post">
                            
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Username: </td><td><input class="ui-input-text" name="username" type="text" placeholder="Username"/></td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Password: </td><td><input class="ui-input-text" name="password" type="password" placeholder="Password"/></td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;"></td><td><center><input class="btn-submit-login" name="submit" type="submit" value="Login" required/></center></td>
                            </tr>
                            <tr>
                                <td colspan="3"><center><h5 style="color:red"><?php echo $error?></h5></center></td>
                            </tr>
                            </form>
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
        <div style="display: none;" class="overlay"></div>
    </body>
</html>
