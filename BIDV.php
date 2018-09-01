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

<style>
    body{
        margin: 10px;
    }
    .table1{
        width: 300px;
        background-color: aliceblue;
        float: left;

    }
    .form-control{
       width: 280px;
    }

    h1{
        padding: 5px;
    }
    .table2{
        width: 230px;
        border: 1px solid #F1B75F;
        margin-left: 305px;
        height: 285px;
        padding: 25px;

    }
    .menu{
        font-size: 18px;
        padding-left: 53px;
        height: 30px;
        background-color: #0043A8;
        color: #ffffff;
    }
    .line{
        width: 100px;
        background:#F1B75F ;

        border: 1px solid #cccccc;
        padding-left: 150px;
    }


</style>
</head>
<body>
<div class="table1">
    <form method="post", name="BIDV" , action="BIDV.php">
        <div class="menu"><P>Nhập số tiền vay</P></div>
        <div class="form-group">
            <label>Số tiền vay (VND):</label>
            <input type="number" , name="tienvay" class="form-control" value="<?php echo isset($_POST['tienvay']) ? $_POST['tienvay']: 10000000 ?>">
        </div>
        <div class="form-group">
            <label>Lãi suất:</label>
            <input type="number" , name="laisuat" class="form-control" value="<?php echo isset($_POST['laisuat']) ? $_POST['laisuat']: 12 ?>">
        </div>
        <div class="form-group">
            <label>Thời hạn vay (tháng):</label>
            <input type="number" , name="time" class="form-control" value="<?php echo isset($_POST['time']) ? $_POST['time']: 12 ?>">
        </div>
        <button type="submit" class="btn btn-default">Tổng</button>
    </form>
</div>
<?php
$tienvay = isset($_POST['tienvay']) ? $_POST['tienvay']: 100000000;
$laisuat =isset($_POST['laisuat']) ? $_POST['laisuat']: 12;
$thoihanvay = isset($_POST['time']) ? $_POST['time']: 12;
$laisuattheothang= $laisuat/12;
$tien_no_goc_hang_thang = $tienvay/ $thoihanvay;
$tien_thang_dau = $tien_no_goc_hang_thang + $tienvay*$laisuattheothang/100;
$tien_con_no = $tienvay;
$tong_lai_phai_tra = 0;
for ($i =1 ; $i<=$thoihanvay ; $i++){
    $tong_lai_phai_tra = $tong_lai_phai_tra+ $tien_con_no*$laisuattheothang/100;
    $tien_con_no = $tien_con_no - $tien_no_goc_hang_thang;
}
$tong_tien_phai_tra = $tienvay + $tong_lai_phai_tra;
$tien_con_no = $tienvay;
?>
<div class="table2">
    <form>
    <p>Số tiền phải trả tháng đầu</p>
        <p style="padding-left: 20px"><?php echo number_format($tien_thang_dau) . ' VNĐ'?> </p>
        <div class="line"></div>
    <p style="padding-top: 15px ; padding-left: 15px">Tổng lãi phải trả </p>
    <p style="padding-left: 20px"><?php echo  number_format($tong_lai_phai_tra) .'VNĐ'?></p>
        <div class="line"></div>
    <p  style="padding-top: 15px ; padding-left: 5px">Tổng số tiền gốc và lãi phải trả </p>
    <p style="padding-left: 20px"><?php echo number_format($tong_tien_phai_tra) .'VNĐ'?></p>
    </form>
</div>
<div class="table">
    <table class="table table-bordered" style="margin-top: 10px">
        <thead>
        <tr>
            <th>Kì hạn</th>
            <th>Lãi phải trả</th>
            <th>Gốc phải trả</th>
            <th>Số tiền phải trả</th>
            <th>Số tiền còn lại</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i =1 ; $i<=$thoihanvay ; $i++) {
           $tien_lai_hang_thang = $tien_con_no*$laisuattheothang/100;
            $tien_con_no = $tien_con_no - $tien_no_goc_hang_thang;
            $tien_tra_hang_thang = $laisuattheothang + $tien_no_goc_hang_thang;

            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo number_format($tien_lai_hang_thang); ?></td>
                <td><?php echo number_format($tien_no_goc_hang_thang); ?></td>
                <td><?php echo number_format($tien_tra_hang_thang); ?></td>
                <td><?php echo number_format($tien_con_no); ?></td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>
</body>