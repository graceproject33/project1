<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
   
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
  
  </head>
  <body>
    <?php include 'navbar.php';?>
    <div>
    <img class="bookstore" alt="" src="./images/bookstore.jpg">
    </div>
    <?php
    
    require('mysqli_connect.php');
    $sql = "SELECT * from bookinventory";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
?>
 <div class="row book-items">
      <?php
            while($row = $result->fetch_assoc()) {
              
      ?>
            <div class="col-sm-3">
                <div class="card custom__card" style="width: 320px;">
                    <img src="images/<?php echo $row["id"] ?>.jpg" class="card-img-top custom__image" alt="..."/>
                      <div class="card-body">
                          <p class="card-text title"><?php echo $row["name"] ?></p>
                          <p class="card-text text-grey"><?php echo $row["type"] ?></p>
                          <p class="card-text price">$ <?php echo $row["price"] ?></p>
                          <p class="card-text title">quantity  <?php echo $row["quantity"] ?></p>
                      </div>
                   <a href="cart.php?id=<?php echo $row["id"];?>"><button class="btn btn-success custom__cart">Add Cart</button></a>
                </div>
            </div>
         <?php
          
          }
            } else {
          echo "0 results";
         }
       $conn->close();
    ?>
 <div>
        </div>
        </div>
        </div>
    
  <div class="row footer__img__container">
      <img class="footer__img" src="images/footer.jpg" alt="footer">
  </div>
    
  </body>
</html>
