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
<body>
</div>
<div class="row">
    <form name="hr" action="tinhluong.php" method="post">
        <div class="form-group">
            <label>Thu nhập gross</label>
            <input type="text" name="gross" class="form-control" value="<?php
            echo isset($_POST['gross']) ? $_POST['gross'] : 0 ?>">
        </div>
        <div class="form-group">
            <label>Bảo hiểm y tế %</label>
            <input type="text" name="medical" class="form-control" value="1.5">
        </div>
        <div class="form-group">
            <label>Bảo hiểm xã hội %</label>
            <input type="text" name="social" class="form-control" value="8">
        </div>
        <div class="form-group">
            <label>Bảo hiểm thất nghiệp %</label>
            <input type="text" name="work" class="form-control" value="1">
        </div>
        <p>Giảm trừ gia cảnh</p>
        <div class="form-group">
            <label>Giảm trừ cá nhân 9.000.000</label>
            <input type="text" name="personal" class="form-control" value="9000000">
        </div>
        <div class="form-group">
            <label>Giảm trừ người phụ thuộc</label>
            <input type="text" name="family" class="form-control" value="3600000">
        </div>
        <div class="form-group">
            <label>Số người phụ thuộc</label>
            <input type="text" name="quantity_family" class="form-control" value="<?php
            echo isset($_POST['quantity_family']) ? $_POST['quantity_family'] : 0 ?>">
        </div>

        <button name="submit_btn" type="submit" class="btn btn-default" value="submit">GROSS -> NET</button>
    </form>
</div>
<div class="row">

    <?php
    $net = $gross = 0;
    $medical = 1.5/100;
    $bao_hiem_y_te = 0;
    $social = 8/100;
    $bao_hiem_xa_hoi  = 0;
    $work = 1/100;
    $bao_hiem_that_nghiep = 0;
    $tong_ba_bao_hiem  = 0;
    $thu_nhap_sau_bao_hiem  = 0;
    $personal = 9000000;
    $quantity_family  = 0;
    $family = 3600000;
    $chiu_thue_thu_nhap_ca_nhan  = 0;
    $khung_chiu_thue  = 0;
    $tien_thue_thu_nhap_ca_nhan  = 0;
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['submit_btn']) && ($_POST['submit_btn'] == 'submit') ) {
        $gross = isset($_POST['gross']) ? $_POST['gross'] : 0;
        $medical = isset($_POST['medical']) ? $_POST['medical'] : 0;
        $social = isset($_POST['social']) ? $_POST['social'] : 0;
        $work = isset($_POST['work']) ? $_POST['work'] : 0;
        $personal = isset($_POST['personal']) ? $_POST['personal'] : 0;
        $family = isset($_POST['family']) ? $_POST['family'] : 0;
        $quantity_family = isset($_POST['quantity_family']) ? $_POST['quantity_family'] : 0;
        $bao_hiem_y_te = ($medical/100)*$gross;
        $bao_hiem_xa_hoi = ($social/100)*$gross;
        $bao_hiem_that_nghiep = ($work/100)*$gross;
        $tong_ba_bao_hiem = $bao_hiem_y_te + $bao_hiem_xa_hoi + $bao_hiem_that_nghiep;
        $thu_nhap_sau_bao_hiem = $gross - $tong_ba_bao_hiem;
        if ($thu_nhap_sau_bao_hiem > 9000000) {
            $chiu_thue_thu_nhap_ca_nhan = $gross - $tong_ba_bao_hiem - $personal - ($family*$quantity_family);
        } else {
            $chiu_thue_thu_nhap_ca_nhan = 0;
        }
        if ( ($chiu_thue_thu_nhap_ca_nhan > 0) && ($chiu_thue_thu_nhap_ca_nhan <= 5000000) ) {
            $khung_chiu_thue = 5/100;
        } elseif( ($chiu_thue_thu_nhap_ca_nhan > 5000000) && ($chiu_thue_thu_nhap_ca_nhan <= 10000000) ) {
            $khung_chiu_thue = 10/100;
        } elseif( ($chiu_thue_thu_nhap_ca_nhan > 10000000) && ($chiu_thue_thu_nhap_ca_nhan <= 18000000) ) {
            $khung_chiu_thue = 15/100;
        } elseif( ($chiu_thue_thu_nhap_ca_nhan > 18000000) && ($chiu_thue_thu_nhap_ca_nhan <= 32000000) ) {
            $khung_chiu_thue = 20/100;
        } elseif( ($chiu_thue_thu_nhap_ca_nhan > 32000000) && ($chiu_thue_thu_nhap_ca_nhan <= 52000000) ) {
            $khung_chiu_thue = 25/100;
        } elseif( ($chiu_thue_thu_nhap_ca_nhan > 52000000) && ($chiu_thue_thu_nhap_ca_nhan <= 80000000) ) {
            $khung_chiu_thue = 30/100;
        } elseif( ($chiu_thue_thu_nhap_ca_nhan > 80000000) ) {
            $khung_chiu_thue = 35/100;
        } else {
            $khung_chiu_thue = 0;
        }
        $tien_thue_thu_nhap_ca_nhan = $khung_chiu_thue*$chiu_thue_thu_nhap_ca_nhan;
        $net = $gross - $tong_ba_bao_hiem - $tien_thue_thu_nhap_ca_nhan;
    }
    ?>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">1. Lương gross : <?php echo $gross ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">2. Phần trăm bảo hiểm y tế : <?php echo $medical ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">3. Bảo hiểm y tế : <?php echo $bao_hiem_y_te ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">4. Phần trăm bảo hiểm xã hội : <?php echo $social ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">5. Bảo hiểm xã hội : <?php echo $bao_hiem_xa_hoi ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">6. Phần trăm bảo hiểm thất nghiệp : <?php echo $work ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">7. Bảo hiểm thất nghiệp : <?php echo $bao_hiem_that_nghiep ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">8. Tổng 3 bảo hiểm : <?php echo $tong_ba_bao_hiem ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">9. Thu nhập sau khi trừ bảo hiểm : <?php echo $thu_nhap_sau_bao_hiem ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">10. Giảm trừ cá nhân : <?php echo $personal ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">11. Số người phụ thuộc : <?php echo $quantity_family ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">12. Giàm trừ theo 1 người phụ thuộc : <?php echo $family ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">13. Tổng giảm trừ người phụ thuộc : <?php echo ($family*$quantity_family) ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">14. Thu nhập chịu thuế : <?php echo $chiu_thue_thu_nhap_ca_nhan ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">15. Khung chịu thuế : <?php echo $khung_chiu_thue ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">16. Số tiền thuế thu nhập cá nhân phải đóng : <?php echo $tien_thue_thu_nhap_ca_nhan ?></p>
    <p id="net" style="color: #f7941d; margin: 30px; font-size: 24px">17. Lương net : <?php echo $net ?></p>
    <div style="height: 200px"></div>
</div>
</div>


</body>
</html>