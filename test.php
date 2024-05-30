<?php
    
    require_once('classes/database.php');
    $con = new database(); 
    
     if(isset($_POST['addproduct'])){
      $product_name = $_POST['productName'];
      $product_brand = $_POST['productBrand'];
      $product_category = $_POST['productCategory'];
      $product_quantity = $_POST['productQuantity'];
      $product_price = $_POST['productPrice'];
      $product_image = $_FILES['productImage'];

      // Handle file upload
      $target_dir = "uploads/";
      $original_file_name = basename($_FILES["productImage"]["name"]);

      // NEW CODE: Initialize $new_file_name with $original_file_name
      $new_file_name = $original_file_name; 

      $target_file = $target_dir . $original_file_name;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $uploadOk = 1;

      // Check if file already exists and rename if necessary
      if (file_exists($target_file)) {
        // Generate a unique file name by appending a timestamp
        $new_file_name = pathinfo($original_file_name, PATHINFO_FILENAME) . '_' . time() . '.' . $imageFileType;
        $target_file = $target_dir . $new_file_name;
      } else {
        // Update $target_file with the original file name
        $target_file = $target_dir . $original_file_name;
      }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
      // Check if file is an actual image or fake image
      $check = getimagesize($_FILES["productImage"]["tmp_name"]);
      if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["productImage"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      } 

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      } else {
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
          echo "The file " . htmlspecialchars($new_file_name) . " has been uploaded.";

          // Save the product data and the path to the product image in the database
          $product_image_path = 'uploads/'.$new_file_name; // Save the new file name (without directory)
          
          $productID = $con->addProduct($product_category, $product_brand, $product_name, $product_quantity, $product_price, $product_image_path);

          if ($productID) {
            // Product addition successful, redirect to index page
            header('location:index.php?section=stock');
            exit; // Stop further execution
          } else {
            // Product addition failed, display error message
            echo "Sorry, there was an error adding the product.";
          }
        } else {
          // File upload failed, display error message
          echo "Sorry, there was an error uploading your file.";
        }
      }
    }
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="transaction section" id="transaction">

          <div class="title-product">
            <h1>Transactions</h1>
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="col-md-7">

                <!-- Calculate the Income -->
                <div class="income">

                  <h3>Income</h3>
                  <h4 class="increase">+ ₱5,000</h4>

                  <!-- Selection of Date to view Income -->

                </div>

                <!-- Transaction of the Customer -->
                <div class="transactions">
                  <div class="trans-head">
                    <h3>Transaction</h3>

                    <!-- Selection of Date to view Transaction -->

                  </div>

                  <!-- Table for Transaction -->

                  <div class="table-trans">
                    <table>
                      <tbody>
                        <tr>
                          <td>Customer Number</td>
                          <td>Payment Method</td>
                          <td>Price</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>

              </div>
              <div class="col-md-5">
                <div class="order-recent">
                  <h2>Recent Purchase</h2>

                  <!-- Recent Purchases -->
                  <div class="recent-pur">
                    <table>
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Customer Numer</th>
                          <th>Date</th>
                          <th>Price</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Oil</td>
                          <td>#563927</td>
                          <td>5/24/2023</td>
                          <td>₱1500</td>
                          <td><span class="text-success">Success</span></td>
                        </tr>
                        <tr>
                          <td>Tail Light</td>
                          <td>#123453</td>
                          <td>5/18/2023</td>
                          <td>₱2500</td>
                          <td><span class="text-danger">Failed</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <!-- paginationHTMl insert Here -->

                </div>
              </div>
            </div>
          </div>

        </section>

        <!-- Stock Section -->

        <section class="stock section" id="stock">

          <div class="title-product">
            <h1>Stocks</h1>
          </div>

          <div class="stocks">

              <div class="stockhead">
                <div class="search-cat">
                  <div class="search-bar">
                    <input type="text" class="form-control" placeholder="Search products...">
                  </div>
                  <div class="stock-category">
                    <label for="stockCategory" class="form-label">Category</label>
                    <select class="form-select" id="stockCategory">
                        <option value="0">Select Category</option>
                  
        
                        <option value="1">Auto Parts</option>
                        <option value="2">Oil/Fluids</option>
                        <option value="3">Car Accessories</option>
                       
                    </select>
                  </div>
                </div>
              </div>
                <div class="addproduct">
                  <button class="button" data-toggle="modal" data-target="#addProductModal"><i class="bx bx-plus" style="font-size: 35px;"></i>Add Product</button>
                </div>
          

            <div class="productcardview">
            <div class="container-fluid my-3">
                <div class="card-container">
                    <?php
                    $data = $con->viewProducts();
                    foreach ($data as $rows) {
                    ?>
                    <div class="card">
                        <div class="card-body text-center">
                            <?php if (!empty($rows['item_page'])): ?>
                                <img src="<?php echo htmlspecialchars($rows['item_image']); ?>" alt="Profile Picture" class="profile-img">
                            <?php else: ?>
                                <img src="path/to/default/profile/pic.jpg" alt="Default Profile Picture" class="profile-img">
                            <?php endif; ?>
                            <h5 class="card-title"><?php echo htmlspecialchars($rows['product_brand']); ?></h5>
                            <p class="card-text"> <?php echo htmlspecialchars($rows['product_name']); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars($rows['price']); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars($rows['stocks']); ?></p>
                            <form action="update.php" method="post" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($rows['product_id']); ?>">
                                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                            </form>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($rows['product_id']); ?>">
                                <input type="submit" name="delete" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                            </form>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            </div>

            <!-- paginationHTML insert Here -->

          </div>

        </section>
</body>
</html>