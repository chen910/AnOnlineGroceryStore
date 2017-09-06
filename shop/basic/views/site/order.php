<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/10
 * Time: 19:48
 */
?>

<h4>address:</h4>
<form action="index.php?r=order/create" method="post">
<?php if ($address):?>
    <select name="DiliverId" id="">
        <?php foreach ($address as $ad): ?>
            <option value="<?=$ad->DiliverAddressId;?>"><?=$ad->City.'  '.$ad->Street;?></option>
        <?php endforeach;?>
    </select>
<?php else:?>
    <a href="index.php?r=diliveraddress/create">Add address first!</a>
<?php endif;?>

<h4>cards:</h4>
<?php if ($cards):?>
    <select name="CreditId" id="">
        <?php foreach ($cards as $card): ?>
            <option value="<?=$card->CreditId;?>"><?=$ad->City.'  '.$ad->Street;?></option>
        <?php endforeach;?>
    </select>
<?php else:?>
    <a href="index.php?r=creditcard/create">Add card first!</a>
<?php endif;?>

<h4>Balance:</h4>
<div><?=$balance;?></div>

<?php if ($address && $cards):?>
    <h4>pay method:</h4>
    <input type="hidden" name="Product" value="<?=$id;?>">
    <input type="hidden" name="num" value="<?=$num;?>">
    <input type="radio" name="type" value="1" checked> card
    <input type="radio" name="type" value="2"> balance
    </br>
    <input type="submit" value="order now!">
<?php endif;?>
</form>