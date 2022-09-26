<?php include('header.php');
include('functions.php');


if(!isstaff()){
    header("Location: /");    
}

global $dbConnection;
$staffQ = mysqli_query($dbConnection, "SELECT * FROM `staff`"); 

$staff = mysqli_fetch_assoc($staffQ);
echo '         名稱 : '.$staff['email'].'<br>
價格 : $'.$staff['password'].'<br>'
;

echo   '<pre>', var_dump($staffQ) ,'</pre>';  
?>

<h1>收到的訂單</h1>
<h2>Your Login email is: <?php echo $_SESSION['email'];?></h2>

<?php
$orderQ = mysqli_query($dbConnection,"SELECT * FROM `order`");

while($order = mysqli_fetch_assoc($orderQ)){
    $stockQ = mysqli_query($dbConnection,'SELECT *FROM `stock` WHERE gem_id='.$order['gem_id']);
    $stock = mysqli_fetch_assoc($stockQ);
    echo '<div class="order">
    <p>
    客戶稱呼 : '.$order['client_name'].'<br/>
    客戶電郵 : '.$order['client_email'].'<br/>
    預訂資料 : '.$stock['name'].'x'.$order['quantity'].'件<br/>
    下單時間 : '.$order['order_time'].'<br/></p>
    </div>
    '; 
}
/* $orderData = file_get_contents('data.csv');
$orders = str_getcsv($ord erData, "\r\n"); 
foreach($orders as $order)
{
    $singleOrder = explode(",", $order);
    echo '<div class="order"><p>';
    echo '客戶稱呼 : '.$singleOrder[1].'<br>';
    echo '客戶電郵 : '.$singleOrder[2].'<br>';
    echo '預訂資料 : '.$gems[$singleOrder[0]-1]['name'].' x '.$singleOrder[3].'<br>';
    echo '下單時間 : '.$singleOrder[4].'<br>';
}*/ 

?>

<?php include('footer.php') ?>