<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/10
 * Time: 14:57
 */
?>
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
    <table border="1">
        <tr>
            <th>Names</th>
            <th>Num</th>
            <th>SinglePrice</th>
        </tr>
        <form action="index.php?r=order/create" method="post">
    <?php foreach ($products as $product): ?>
        <tr>
            <td> <?=$product->ProductName;?></td>
            <input type="hidden" name="Product[]" value="<?=$product->ProductId;?>">
            <input type="submit" id="submit" value="<?=$product->ProductId;?>" style="display: none">
            <td><input type="text" name="num[]"></td>
            <td><?=$product->ProductPrice;?></td>
        </tr>
    <?php endforeach;?>
        </form>
    </table>
<h3><button onclick="javascript:$('#submit').click()">Order Now!</button></h3>

