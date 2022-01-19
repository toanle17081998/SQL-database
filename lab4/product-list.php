<?php 
require_once('entities/product.class.php');
?>
<?php 
include_once('header.php');
$prods = Product::list_product();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table border="1" class="table">
                <tr>
                    <td>Hình</td>
                    <td>Tên SP</td>
                    <td>Loại</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Mô tả</td>
                </tr>
                <?php 
                    foreach ($prods as $item) {
                ?>
                <tr>
                    <td><?php echo $item['Picture']?></td>
                    <td><?php echo $item['ProductName']?></td>
                    <td><?php echo $item['CateID']?></td>
                    <td><?php echo $item['Price']?></td>
                    <td><?php echo $item['Quantity']?></td>
                    <td><?php echo $item['Description']?></td>
                </tr>
                <?php } ?>
            </table>
        </div>    
    </div>
</div>
 
<?php 
include_once('footer.php');
?>