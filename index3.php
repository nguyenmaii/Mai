<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>tao bang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        .table-bordered{
            width: 700px;
            margin-top: 200px;
        }
    </style>
</head>
<body>
<?php
$connection = new mysqli("localhost", "root", "", "codeme.edu.vn");
if($connection->connect_error){
    die("connection failed:".$connection->connect_error);
}
$sql = "select * from article";
$result = $connection->query($sql);
?>
<table class="table-bordered" align="center">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Article_content</th>
        <th>Status</th>
    </tr>

    <?php if ($result ->num_rows>0){
        while ($row = $result->fetch_assoc()){?>
            <tr>
                <td> <?php echo $row["id"]?></td>
                <td><?php echo $row["title"]?></td>
                <td><?php echo $row["article_content"]?></td>
                <td><?php echo $row["status"]?></td>
            </tr>
        <?php  } ?>
        <?php }?>


</table>

</body>
</html>