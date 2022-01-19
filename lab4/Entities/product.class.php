<?php 
require_once("config/db.class.php");
 
class Product{
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;
 
    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture){
        $this -> productName = $pro_name;
        $this -> cateID = $cate_id;
        $this -> price = $price;
        $this -> quantity = $quantity;
        $this -> description = $desc;
        $this -> picture = $picture;
    }
    //Lưu sản phẩm
    public function save(){
        // Khởi tạo đối tượng $db với class Db từ file db.class.php
        $db = new Db();
        // Tạo biến $sql để insert sản phẩm, chạy biến này ở dưới
        $sql = "INSERT INTO product (ProductName, CateID, Price, Quantity, Description, Picture) VALUES
        ('$this->productName', 
        '$this->cateID', 
        '$this->price', 
        '$this->quantity', 
        '$this->description', 
        '$this->picture')";
        // query_execute là function từ class Db
        $result = $db -> query_execute($sql);
        // Trả về kết quả
        return $result;
    }
    // Danh sách sản phẩm
    public static function list_product(){
        $db = new DB();
        $sql = "SELECT * FROM product";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $rs = $db -> select_to_array($sql);
        return $rs;
    }
 
}
?>