
<?php
    
    require_once('classes/database.php');
    $con = new database();  
   

?>
dsadasdsadsa
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynrax Auto Supply</title>

    <!-- Style -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">

    <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<>

  <!-- header -->

  

    <!-- Main Container -->

    <div class="main-container">

      <!-- Aside Navbar -->
      
      <div class="aside">
        <div class="navbar-logo">
            <a href="index.html"><img src="import/Dynrax Web Finals.png"></a>
        </div>
    
        <div class="navbar-toggle">
            <span></span>
        </div>
    
        <ul class="nav">
            <li><a href="#home" style="text-decoration:none;" class="active"><i class="bx bx-home"></i>Home</a></li>
            <li><a href="#product" style="text-decoration:none;"><i class="bx bx-package"></i>Product</a></li>
            <li><a href="#transaction" style="text-decoration:none;"><i class="bx bx-cart"></i>Transaction</a></li>
            <li><a href="#stock" style="text-decoration:none;"><i class="bx bx-store"></i>Stock</a></li>
            <li><a href="#sales" style="text-decoration:none;"><i class="bx bx-dollar"></i>Total Sale</a></li>
        </ul>
    
    </div>

      <!-- Main Content -->
      <div class="main-content">

        <!-- Home Section -->
        <!-- Home Section -->
        <section class="home active section" id="home">
            <div class="welcome-user">
                <!-- Display of Username -->
                <h2>Welcome, Username!</h2>
            </div>

            <!-- Analytics -->

            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <div class="box">
                    <h3>Total Sales</h3>
                    <h1>999</h1>
                    <p><span>100%</span> +₱2.8k this week</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box">
                    <h3>Total Customers</h3>
                    <h1>999</h1>
                    <p><span>100%</span> +₱2.8k this week</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box">
                    <h3>Transaction History</h3>
                    <h1>999</h1>
                    <p><span>100%</span> +₱2.8k this week</p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="box">
                    <h3>Product in Stocks</h3>
                    <h1>999</h1>
                    <p><span>100%</span> +₱2.8k this week</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Charts -->

            <div class="container-fluid">
              <div class="row mr-1">
                <div class="col-md-7">
                  <div class="titles-home">
                    <h3>Low Quantity</h3>
                  </div>
                  <div class="lowstock">
                    <div class="row low-stock-products">
                      <!-- Low stock product cards will be dynamically generated here -->
                      <div class="col-md-4 col-sm-6 col-xs-12 low-stock-product-card">
                        <div class="product-card">
                          <img class="product-image" src="#" alt="Product Image">
                          <div class="product-details">
                            <h4 class="product-name">Product Name</h4>
                            <p class="product-quantity">Only <strong>5</strong> left in stock!</p>
                            <a class="product-link" href="#">View Product</a>
                          </div>
                        </div>
                      </div>
                      <!-- More low stock product cards can be added here -->
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="titles-home">
                    <h3>Top Product</h3>
                  </div>
                  <div class="topproducts">
                    <!-- View top product of the day -->
                    <div class="top-product-card">
                      <div class="product-card">
                        <img class="product-image" src="#" alt="Product Image">
                        <div class="product-details">
                          <h4 class="product-name">Product Name</h4>
                          <p class="product-description">This is a short description of the product.</p>
                          <a class="product-link" href="#">View Product</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </section>


        <!-- Product Section -->

       <section class="product section" id="product">

          <div class="title-product">
            <h1>Products</h1>
          </div>

          <!-- Chart of Sales -->

          <div class="products">
            <div class="container-fluid">
              <div class="row grid" style="align-items: center;">
                <div class="col-md-7">

                  <!-- Top Product Chart -->

                  <div class="titles-home">
                    <h1>Top Product</h1>
                  </div>

                  <div class="total-sales">
                    <div class="product-barchart">
                      <canvas id="barchart"></canvas>
                    </div>
                  </div>

                  <div class="box-product latest-order">
                    <h2>Latest Orders</h2>

                    <!--Latest Order  -->

                    <div class="table-orders">
                      <table>
                        <thead>
                          <tr>
                            <th>Order Id</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>Transaction Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Gear Oil</td>
                            <td>PHP200.00</td>
                            <td>Cash</td>
                            <td>29/08/2023</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <!-- paginationHTMl insert Here -->

                  </div>

                </div>
  
                <!-- To add item for Customer Order -->
  
                <div class="col-md-5">
                  <div class="item-view">
                    <div class="product-details">

                      <div class="items">
                        <h2>Customer Order</h2>
                      </div>

                      <!-- Customer Order Form -->
                      
                      <div class="addsearch">
                        <div class="searchbar">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="text" class="form-control" placeholder="Enter Customer Name">
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control" placeholder="Search products...">
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="productCategory" class="form-label">Category</label>
                          <select class="form-select" id="productCategory">
                            <option value="0">Select Category</option>
                            <option value="1">Auto Parts</option>
                            <option value="2">Oil/Fluids</option>
                            <option value="3">Car Accessories</option>
                          </select>
                        </div>
                      </div>
                      <div class="view-product">
                      </div>

                      <!-- paginationHTML insert Here -->

                    <div class="checkout">
                      <div class="head"><p>My Cart</p></div>
                      <div id="cartItem">Your cart is Empty</div>
                      <div class="foot">
                        <h3>Total</h3>
                        <h2 id="total">₱ 0.00</h2>
                        <button id="checkoutButton">Checkout</button>
                      </div>
                    </div>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </section>

        <!-- Transaction section -->

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

        <!-- Total Sales Section -->

        <section class="sales section" id="sales">

          <div class="title-product">
            <h1>Total Sales</h1>
          </div>

          <div class="container-fluid">
            <div class="row mr-1">
              <div class="col-md-7">
                  <div class="item-sales-title">
                    <h3>Items Sales</h3>
                  </div>

                  <!-- Sales per Item -->

                  <div class="item-sales-chart">
                    <canvas id="linechart"></canvas>
                  </div>
              </div>
              <div class="col-md-5">
                <div class="item-sales-title">
                  <h3>Sales By Category</h3>
                </div>

                <!-- Sales per Category -->

                <div class="item-sales-pie">
                  <canvas id="pieschart"></canvas>
                </div>
              </div>
            </div>
            <div class="row mr-1">
              <div class="col md-3">
                <div class="total-income">
                  <i class='bx bx-money'></i>

                  <!-- View Total income of the Store -->

                  <h4>Total Income</h4>
                  <h1>₱15,000.00</h1>
                </div>
              </div>
              <div class="col md-3">
                <div class="inquiry-succsess">
                  <i class='bx bx-line-chart' ></i>

                  <!-- View Total Success Rate?? -->

                  <h4>Inquiry Success Rate</h4>
                  <h1>56%</h1>
                </div>
              </div>
              <div class="col md-3">
                <div class="new-customer">
                  <i class='bx bx-user' ></i>

                  <!-- View Total Customers per Day -->

                  <h4>Number of New Customers</h4>
                  <h1>42</h1>
                </div>
              </div>
              <div class="col md-3">
                <div class="complete-order">
                  <i class='bx bxs-check-square' ></i>

                  <!-- View Total Completed Orders -->

                  <h4>Number of Completed Orders</h4>
                  <h1>38</h1>
                </div>
              </div>
            </div>
          </div>

        </section>

      </div>

    </div>

    <!-- Add Product Modal -->
    <?php
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
            // header('location:index.php?section=stock');
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
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
          </div>
          <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="productImage" class="form-label">Product Image</label>
                <div class="input-group">
                  <input type="file" class="form-control d-none" id="productImage" aria-describedby="inputGroupFileAddon" onchange="previewImage()" name="productImage">
                  <label class="input-group-text" for="productImage">
                    <i class="bx bx-image" style="font-size: 1.5rem;"></i>
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <img id="preview" src="#" alt="Preview Image" style="max-width: 150px; display: none;">
              </div>
              <div class="mb-3">
                <label for="productBrand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="productBrand" name="productBrand">
              </div>

              <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName">
              </div>
              
              <div class="mb-3">
                <label for="productCategory" class="form-label">Category</label>
                <select class="form-select" id="productCategory" name="productCategory">
                  <option value="selected">Select Category </option>
                  <?php 
                    $category = $con->viewCat();
                    foreach($category as $cat){
                  ?>
                  <option value="<?php echo $cat['cat_id'];?>"><?php echo $cat['Cat_Type'];?></option>
                  <?php 
                    }
                  ?>
                </select>
              </div>
        

              <div class="mb-3">
                <label for="productQuantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="productQuantity" name="productQuantity">
              </div>
              <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addproduct">Add Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="mb-3">
                          <label for="editProductName" class="form-label">Product Name</label>
                          <input type="text" class="form-control" id="editProductName">
                      </div>
                      <div class="mb-3">
                          <label for="editProductPrice" class="form-label">Price</label>
                          <input type="text" class="form-control" id="editProductPrice">
                      </div>
                      <div class="mb-3">
                          <label for="editProductQuantity" class="form-label">Quantity</label>
                          <input type="number" class="form-control" id="editProductQuantity">
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
              </div>
          </div>
      </div>
    </div>
    

    <!-- Add Product -->
    <script>

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    

</body>
</html>