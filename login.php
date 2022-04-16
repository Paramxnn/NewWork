<?php
if (session_id() == "")
{
  session_start();
}
require_once dirname(__FILE__) . '/1dbCon/dbCon.php';
// require_once dirname(__FILE__) . '/sessionLoginChecker.php';

require_once dirname(__FILE__) . '/classes/User.php';

require_once dirname(__FILE__) . '/utilities/allNoticeModals.php';
require_once dirname(__FILE__) . '/utilities/databaseFunction.php';
require_once dirname(__FILE__) . '/utilities/generalFunction.php';

$conn = connDB();

$conn->close();

function promptError($msg){
    echo '
        <script>
            alert("'.$msg.'");
        </script>
    ';
}

function promptSuccess($msg){
    echo '
        <script>
            alert("'.$msg.'");
        </script>
    ';
}
?>

<!doctype html>
<html>
<head>
<?php include 'meta.php'; ?>
<meta property="og:title" content="Login | PetLab" />
<title>Login | PetLab</title>
<meta property="og:description" content="PetLab serves as Asia’s 1st established professional platform featuring pets that connects top pet sellers and buyers across nationwide. Buyers who are ready to have a pet may look into PetLab to search for their preferred breed or getting advice from us." />
<meta name="description" content="PetLab serves as Asia’s 1st established professional platform featuring pets that connects top pet sellers and buyers across nationwide. Buyers who are ready to have a pet may look into PetLab to search for their preferred breed or getting advice from us." />
<meta name="keywords" content="PetLab,pet, online pet store, pet seller, cat,kitten, dog,puppy, reptile, dog food, pet food, pet product, pet grooming, etc">
<?php include 'css.php'; ?>
</head>

<body class="body">
<?php echo '<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>'; ?>

<div class="background-div">
<?php include 'header.php'; ?>
	<div class="width100 same-padding">
        <div class="login-white-box ">
            <h1 class="green-text h1-title login-h1">Admin/Seller Login</h1>
            <div class="green-border"></div>
            <form action="utilities/adminLoginFunction.php" method="POST">
                <input class="clean line-input admin-input login-line" type="text" required placeholder="Username" id="register_name" name="register_name">
                
				<div class="edit-password-line-div hover1">
                <input class="clean line-input admin-input login-line" type="password" required placeholder="Password" id="register_password" name="register_password">
                
                	<img src="img/visible.png" class="visible-img hover1a" alt="View Password" title="View Password">
                    <img src="img/visible2.png" class="visible-img hover1b" alt="View Password" onclick="myFunction()" title="View Password">
              
                </div>
                
                <button class="green-button white-text width100 clean2" name="loginButton">
                	Login
                </button>
                <p class="text-center"><a class="open-forgot green-a forgot-a">Forgot Password?</a></p>
            </form>
        </div>
    </div>
</div>

<?php include 'js.php'; ?>

<script>
function myFunction()
{
    var x = document.getElementById("register_password");
    if (x.type === "password")
    {
        x.type = "text";
    }
    else
    {
        x.type = "password";
    }
}
</script>

<?php
if(isset($_GET['type']))
{
    $messageType = null;

    if($_SESSION['messageType'] == 1)
    {
        if($_GET['type'] == 1)
        {
            $messageType = "Successfully Login!"; 
        }
        else if($_GET['type'] == 2)
        {
            $messageType = "There are no admin with this username ! Please retry !!";
        }
        else if($_GET['type'] == 3)
        {
            $messageType = "Admin registration failed!";
        }
        else if($_GET['type'] == 4)
        {
            $messageType = "Incorrect password! ";
        }
        else if($_GET['type'] == 6)
        {
            $messageType = "User does not exist! Try to login again";
        }
        else if($_GET['type'] == 7)
        {
            $messageType = "Admin does not exist! Try to login again";
        }
        echo '
        <script>
            putNoticeJavascript("Notice !! ","'.$messageType.'");  
        </script>
        ';   
        $_SESSION['messageType'] = 0;
    }
}
?>

</body>
</html>