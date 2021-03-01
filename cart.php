<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php include 'navbar.php';?>
    <?php

    $id = $_GET['id'];
    require('mysqli_connect.php');
    $sql = "SELECT * FROM `bookinventory` WHERE `id`='" . $id . "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
?>
<!-- /************Update data***************** */ -->
<?php
    if(isset($_POST['insert'])){
        $id = $_GET['id'];
      
        $sql = "UPDATE bookinventory SET quantity = quantity - 1 WHERE `id`='" . $id . "'";
        $result = $conn->query($sql);
        if($result){
          
?>
        <div class="card custom__card text-grn">
           Your Order has been placed successfully.
        </div>
      <?php

            exit();
        }
        else{
            echo "Not successfully";
        }
    }




?>
 <div class="row book-items">
<?php
      while($row = $result->fetch_assoc()) {
?>
        <div class="col-sm-4">
            <div class="card custom__card">
                <img src="images/<?php echo $row["id"] ?>.jpg" class="card-img-top" alt="...">
                
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card custom__card">
                <div class="card-body">
                    <p class="card-text title"><?php echo $row["name"] ?></p>
                    <p class="card-text"><?php echo $row["type"] ?></p>
                    <p class="card-text title">quantity  <?php echo $row["quantity"] ?></p>
                    <p>
                <strong>About this item</strong>
                <p>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius laudantium quia excepturi.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius laudantium quia excepturi.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius laudantium quia excepturi.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius laudantium quia excepturi.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius laudantium quia excepturi.</li>
                </ul>
                </p>
              </p>
                </div>
               
            </div>
        </div>
        <div class="col-sm-3">
        <div class="card custom__card">
        <p class="card-text title"><?php echo $row["name"] ?></p>
        <p class="card-text title">Total Amount - $ <?php echo $row["price"] ?></p>
      
        <form  method="post">
            <input type="submit" class="btn btn-primary buy__item" name="insert" value="Buy">
         </form>
      </div>
      </div>

<?php

      }
    } else {
      echo "0 results";
    }
    $conn->close();
 
    ?>
    </div>
</div>
     <div class="row footer__img__container">
      <img class="footer__img" src="images/footer.jpg" alt="footer">
  </div>
</body>
</html>