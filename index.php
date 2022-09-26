
<?php include('header.php'); ?>

    <h1>Masterpieces List</h1>
    <h2> <?php  echo date("F");?> Series</h2>
    <div class="flex-grid">
    <?php

     $gemQ = mysqli_query($dbConnection, "SELECT * FROM `stock`");

/*      while ($stock = mysqli_fetch_assoc($gemQ)) {
        echo $stock['price'].'<br>'; 
    }   */ 

     while ($stock = mysqli_fetch_assoc($gemQ)) {
        echo '<div class="col"  float:center">
        
        
        <img src="/images2/'.$stock['image'].'" style="width:200px;height:200px;margin:15px"/>
        <p>
        作品: '.$stock['name'].'<br>
        價格: $'.$stock['price'].' USD<br>
        <a href="/order.php?gem_id='.$stock['gem_id'].'" class="buyBtn">預訂'.$stock['name'].'</a><br>    
        </div>';
    }   

/*     foreach($gems as $key => $gem)
    {   
        echo 
        '<div class="col">
        <img src="/images/'.$gem['image'].'" style="width:200px;height:200px"/>

        <p>
        名稱 : '.$gem['name'].'<br>
        價格 : $'.$gem['price'].'<br>
        <a href="/order.php?gem_id='.$gem['gem_id'].'"
        class="buyBtn" >預訂'.$gem['name'].'</a><br>
        </div>';
    } */

    ?>
    </div>

<?php include('footer.php'); ?>