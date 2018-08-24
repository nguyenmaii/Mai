<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<style>
    .table-striped{
        width: 900px;
        margin-left: 300px;
        border: 1px solid #cccccc;
        margin-top: 50px;
    }
    .col{
        width: 30%;
    }
</style>
</head>
<body>

<?php
$array = array();
$array[] = array('product_id' => '01', 'product_name' => 'Shoe', 'product_price' => '600000');
$array[] = array('product_id' => '02', 'product_name' => 'Sandal', 'product_price' => '420000');
$array[] = array('product_id' => '03', 'product_name' => 'Skirt', 'product_price' => '123000');
$array[] = array('product_id' => '04', 'product_name' => 'Dress', 'product_price' => '987000');
$array[] = array('product_id' => '05', 'product_name' => 'Hat', 'product_price' => '124000');
$array[]= array('product_id' => '06', 'product_name' => 'Bags', 'product_price' => '783000');
$array[] = array('product_id' => '07', 'product_name' => 'LipStick', 'product_price' => '123000');
$array[] = array('product_id' => '08', 'product_name' => 'Water', 'product_price' => '019000');
$array[] = array('product_id' => '09', 'product_name' => 'Neck', 'product_price' => '124000');
$array[] = array('product_id' => '10', 'product_name' => 'shoe', 'product_price' => '321000');



?>

<table class="table-striped">
    <thead>
    <tr>
        <th class="col">ID</th>
        <th class="col">Tên sản phẩm</th>
        <th class="col">Gía tiền</th>
    </tr>
    </thead>
    <tbody>

    <?php

    foreach ($array as $item)  { ?>
        <tr>
            <td><?php echo $item['product_id'] ?></td>
            <td><?php echo $item['product_name'] ?></td>
            <td><?php echo $item['product_price'] ?></td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
</body>
</html>