<?php 
require_once("Entities/product.class.php");
require_once('Entities/category.class.php');
 
if(isset($_POST["btnsubmit"])){
    //Lấy giá trị từ form
    $productName = $_POST["txtname"];
    $cateID = $_POST["txtcateid"];
    $price = $_POST["txtprice"];
    $quantity = $_POST["txtquantity"];
    $description = $_POST["txtdesc"];
    $picture = $_FILES["txtpic"];
    //Khởi tạo đối tượng product
    $newProduct = new  Product($productName, $cateID, $price, $quantity, $description, $picture);
    $loi = array();
    $loi_str = "";
    // Lưu xuống CSDL
    $result = $newProduct -> save($loi);
    if(!$result){
        //Truy vấn lỗi
        // header("Location: product-add.php?status=failure");
        foreach($loi as $item) $loi_str = $loi_str.$item."<br/>";
    }else{
        header("Location: product-add.php?status=inserted");
    }
}
?>
<?php require 'header.php'; ?>
<?php
    if(isset($_GET["status"])){
        if ($_GET["status"] == 'inserted') {
            echo "<h2>Thêm sản phẩm thành công.</h2>";
        }else{
            echo "<h2>Thêm sản phẩm thất bại.</h2>";    
        }
    }
?>
    <!-- Form Thêm sản phẩm -->
    <form method="post" enctype="multipart/form-data">
        <!-- Tên sản phẩm -->
        <div class="row">
            <div class="lbltitle">
                <label>Tên sản phẩm</label>
            </div>
            <div class="lblinput">
                <input type="text" name="txtname" value="<?php echo isset($_POST["txtname"]) ? $_POST["txtname"] : "" ?>">
            </div>
        </div>
        <!-- Mô tả sản phẩm -->
        <div class="row">
            <div class="lbltitle">
                <label>Mô tả sản phẩm</label>
            </div>
            <div class="lblinput">
                <textarea type="text" name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ?>"></textarea>
            </div>
        </div>
        <!-- Số lượng sản phẩm -->
        <div class="row">
            <div class="lbltitle">
                <label>Số lượng sản phẩm</label>
            </div>
            <div class="lblinput">
                <input type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ?>">
            </div>
        </div>
        <!-- Giá sản phẩm -->
        <div class="row">
            <div class="lbltitle">
                <label>Giá sản phẩm</label>
            </div>
            <div class="lblinput">
                <input type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ?>">
            </div>
        </div>
        <!-- Loại sản phẩm -->
        <div class="row">
            <div class="lbltitle">
                <label>Loại sản phẩm</label>
            </div>
            <div class="lblinput">
                <select name="txtcateid">
                    <option value="" selected>-- Chọn loại --</option>
                    <?php $cates = Category::list_category() ?>
                    <?php    foreach ($cates as $item) { ?>
                    <option value="<?php echo $item['CateID'] ?>"><?php echo $item['CategoryName'] ?></option>
                    <?php } ?>
                </select>
                <!-- <input type="number" name="txtcateid" value="<?php echo isset($_POST["txtcateid"]) ? $_POST["txtcateid"] : "" ?>"> -->
            </div>
        </div>
        <!-- Loại sản phẩm -->
        <div class="row">
            <div class="lbltitle">
                <label>Url Hình ảnh</label>
            </div>
            <div class="lblinput">
                <input type="file" name="txtpic" accept=".PNG,.GIF,.JPG,.JPGEG">
            </div>
        </div>
        <div class="row">
            <div class="lbltitle">
                   Click thêm
            </div>
            <div class="submit">
                <button type="submit" name="btnsubmit">Thêm sản phẩm</button>
            </div>
        </div>
    </form>
 
<!-- Footer -->
<?php require 'footer.php'; ?>