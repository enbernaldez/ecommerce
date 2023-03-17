<html>
<?php include_once "db_conn.php"; ?>
<head>
    <meta charset="UTF-8">
    <title>Products</title>
 <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h3>New Product</h3>
                
                <?php
                     if(isset($_GET['new_product'])){
                            switch($_GET['new_product']){
                                case "added": echo "<div class='alert alert-success'>Product Added.</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>Product Not Added</div>";
                                      break;
                                        
                            }
                       }
                ?>
                
                <form action="newproduct.php" method="post">
                    <div class="mb-3">
                        <label for="new_item_name" class="form-label">Item Name</label>
                        <input type="text" id="new_item_name" required name="new_item_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new_item_price" class="form-label">Item Price</label>
                        <input type="text" required id="new_item_price" name="new_item_price" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary">
                </form>
                
            </div>
            <div class="col-9">
               <h3>Product Records</h3>
                <?php
                  $productlist = query($conn, "SELECT item_id, item_name, item_price FROM products WHERE item_stats='A'");
                 // var_dump($productlist);
                  echo "<hr>";
                       if(isset($_GET['update_status'])){
                            switch($_GET['update_status']){
                                case "success": echo "<div class='alert alert-success'>Product list updated!</div>";
                                      break;
                                case "failed":  echo "<div class='alert alert-danger'>Product list failed to be updated.</div>";
                                      break;
                                        
                            }
                       }
                  echo "<hr>";
                  
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                         echo "<th>Item Name</th>";
                         echo "<th>Item Price</th>";
                         echo "<th>Action</th>";
                    echo "</thead>";
                  foreach($productlist as $key => $row){
                      echo "<tr>";
                         echo "<td>" . $row['item_name'] . "</td>";
                         echo "<td>" . $row['item_price'] . "</td>";
                         echo "<td> <a class='btn btn-success' href='product_submit.php?item_name=" . $row['item_name'] . "&item_price=" .$row['item_price'] . "&item_id=". $row['item_id'] ."' > Update </a> </td>";
                         echo "<td> <a class='btn btn-danger' href='product_delete.php?item_id=". $row['item_id'] ." ' > Delete </a> </td>";
                    echo "</tr>";
                  }
                   echo "</table>";
                
                ?>
                
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
<script src="js/bootstrap.js"></script>
</html>