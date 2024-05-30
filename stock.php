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
    <title>Stock Section</title>

    <!-- Style -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">

    <!-- Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

    <div class="main-content">

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
    <div class="container my-1">
      <div class="card-container">
        <div class="card">
          <!-- Image -->
          <img src="uploads/example.jpg" class="card-img-top" alt="Item Image">
          <div class="card-body">
            <!-- Item Name -->
            <h5 class="card-title">Item Name</h5>
             <!-- Item Brand -->
            <p class="card-text">Item Brand</p>
            <!-- Item Price -->
            <p class="card-text">Price: $10</p>
            <!-- Item Quantity -->
            <p class="card-text">Quantity: 2</p>
            <div class="d-flex justify-content-between align-items-center">
              <button class="btn btn-success" data-toggle="modal" data-target="#editProductModal">
                <i class='bx bxs-edit' style="font-size: 25px; vertical-align: middle;"></i>
              </button>
              <button class="btn btn-danger">
                <i class='bx bx-trash' style="font-size: 25px; vertical-align: middle;"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- paginationHTML insert Here -->

</div>
    </div>

<!-- Add Product Modal -->
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <script src="script.js"></script>

</body>
</html>