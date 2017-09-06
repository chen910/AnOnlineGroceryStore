<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/10
 * Time: 12:51
 */
?>
<h3>ProductName:</h3>
<?= $product->ProductName;?>

<h3>In Stock:</h3>
<?php foreach ($stores as $store):?>
    <div>WarehouseName:<?= $store->WarehouseName;?>/ Num:<?= $store->Quantity;?></div>
<?php endforeach;?>
<h4>Add To Stock:</h4>
<form action="index.php">

<select name="WarehouseId" id="WarehouseId">
    <?php foreach ($warehouses as $warehouse):?>
        <option value="<?= $warehouse->WarehouseId;?>"><?= $warehouse->WarehouseName;?></option>
    <?php endforeach;?>
</select>
    <input type="text" placeholder="quantity" name="quantity">
    <input type="hidden" name="ProductId" value="<?= $product->ProductId;?>">
    <input type="hidden" name="r" value="products/addstock">
    <input type="submit">
</form>

<a href="index.php?r=products/index"><-back</a>