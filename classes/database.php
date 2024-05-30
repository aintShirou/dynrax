<?php 

class database{

    function opencon(){
        return new PDO('mysql:host=localhost;dbname=das_finals','root','');
    }

  
    function addProduct($product_category, $product_brand, $product_name, $product_quantity, $product_price, $product_image_path){ 
        $con = $this->opencon();
        $stmt = $con->prepare("INSERT INTO product (cat_id, product_brand, product_name, price, stocks, item_image) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$product_category, $product_brand, $product_name, $product_quantity, $product_price, $product_image_path]);
        
        // Get the ID of the last inserted row
        $last_id = $con->lastInsertId();

        // Return the last inserted ID
        return $last_id;
    }
    function viewCat(){
    $con = $this->opencon();
    return $stmt = $con->query("SELECT cat_id, Cat_Type FROM category")->fetchAll();
    }

    function viewProducts(){
        $con = $this->opencon();
        return $stmt = $con->query("SELECT * FROM product") ->fetchAll();
    }

    function viewProduct($product_id){
        $con = $this->opencon();
        $stmt = $con->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->execute([$product_id]);
        return $stmt->fetch();
    }


    function updateProduct($id, $product_brand, $product_name, $product_category, $product_quantity, $product_price){
        try{
        $con = $this->opencon();
        $con->beginTransaction();
        $query = $con->prepare("UPDATE products SET cat_id=?, product_brand=?, product_name=?, price=?, stocks=?, item_image=? WHERE product_id=?");
        $query->execute([$product_brand, $product_name, $product_category, $product_quantity, $product_price, $id]);
        $con->commit();
        return true;
    } catch(PDOException $e) {
        $con->rollBack();
            return false;
    }
}
}