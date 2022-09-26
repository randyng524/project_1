<?php
include 'dbConnect.php';

$op = 'none';
if(isset($_GET['op'])) 
$op = $_GET['op'];

if($op== 'createOrder')
{
    createOrder();
}
if($op=='checkLogin')
{
    checkLogin($_POST['email'],$_POST['password']);
}
if($op=='logout')
{
    logout();
}

function isstaff()
{
    return isset($_SESSION['email']);
}
function logout()
{
    session_start();
    session_destroy();
    header("Location: /index.php");
}

function checkLogin($email, $password)
{
    global $dbConnection;
    $staffQ = mysqli_query($dbConnection, "SELECT * FROM `staff` WHERE `email`='".$email."'");    $staff = mysqli_fetch_assoc($staffQ);
    $staff = mysqli_fetch_assoc($staffQ);
/*     $staffemail1 = "staff1@gmail.com";
    $staffpassword1 = "staff1"; */


    if($email == $staff['email'] && $password == $staff['password'] )
    {
        session_start();
        $_SESSION['email'] = $email;
        header("Location: /allOrders.php");
    }
    else
    {
        header("Location: /login.php");
    }
}

function createOrder(){
    /* echo $_POST['gem_id']."<br>";
    echo $_POST['name']."<br>";
    echo $_POST['email']."<br>";
    echo $_POST['quantity']."<br>";
    echo date('Y-m-d H:i:s')."<br>"; */

    //儲存訂單
/*     $myfile = fopen("data.csv", "a") or die("未能開啟檔案");
    $data = $_POST['gem_id'].','.$_POST['name'].','.$_POST['email'].','.$_POST['quantity'].','.date('Y-m-d H:i:s')."\r\n";
    fwrite($myfile, $data);
    fclose($myfile); */
    //用MySQL儲存orders
    global $dbConnection;
    $sql = "INSERT INTO `php_new_db`.`order` (
        `client_name`, 
        `client_email`,
         `quantity`, 
         `order_time`, 
         `gem_id`
         ) VALUES (
         '{$_POST['name']}', 
         '{$_POST['email']}',
         {$_POST['quantity']}, 
         '".date('Y-m-d H:i:s')."',
         {$_POST['gem_id']})";

    
    if(mysqli_query($dbConnection,$sql))
    {
/*         $updateQ = 
        $sql = "UPDATE `php_new_db`.`stock` SET `remaining`=`remaining`-'1'  WHERE  `gem_id`='".$_POST['gem_id']."'";
 */        header("Location: /order-completed.php");
    }
    else{
        header("Location: /order-failed.php");
    }
    
    //轉變頁面
   
}   




?>