<!-- http://demos.jquerymobile.com/1.4.5/popup/#&ui-state=dialog -->
<!DOCTYPE html>
<?php
session_start();
include("../connection.php");
include('session.php');
include('regredirect.php');
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
                        <li><a href="home.php">home</a></li>
                        <li><a href="#">room</a></li>
                        <li><a href="#">gallery</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </div>
                <div class="nav-accnt">
                    <p style="font-size: 13.5px;color:#DDD;">[ <a class="btn-login" href="logout.php">Logout</a> ]</p>
                </div>
            </div>
            <div class="main-content-reg">
                <div class="content2 effect2">
                    <div class="reg-content">
                        <h2>Add Staff</h2>
                        <table>
                            <form action="?" method="post">
                            
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Name: </td><td><input class="ui-input-text" name="fname" type="text" placeholder="Name" required/></td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Last Name: </td><td><input class="ui-input-text" name="lname" type="text" placeholder="Lastname" required/></td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Username: </td><td><input class="ui-input-text" name="username" type="text" placeholder="Username" required/></td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Password: </td><td><input id="pass" class="ui-input-text" name="password" type="password" placeholder="Password" required/></td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Confirm Password: </td><td><input id="repass" class="ui-input-text" name="retypepassword" type="password" placeholder="Retype Password" required/></td>
                            </tr>
                            <tr><td></td><td> <b id="validate-status"></b></td></tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Phone: </td><td><input class="ui-input-text" name="phone" type="text" placeholder="Phone Number" required/></td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Email Address: </td><td><input class="ui-input-text" name="email" type="email" placeholder="Email Address" required/></td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Type: </td>
                                <td><select name="type" class="ui-input-text" required>
                                    <option value="Staff">Staff</option>
                                    <option value="Administrator">Administrator</option>
                                </select></td>
                            </tr>  
                            <tr>
                                <td style="width:10em;padding-left: 25px;">Gender: </td><td><input type="radio" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female</td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;">City/State: </td><td><input class="ui-input-text" name="city" type="text" placeholder="City/State" required/></td>
                            </tr>
                            <tr>
                                <td style="width:10em;padding-left: 25px;"></td><td><input class="btn-submit-login" name="submit" type="submit" value="Register" required/></td>
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
