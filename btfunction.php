<?php
function chuvihinhtron($bankinh){
    $chuvi = $bankinh * 3.14;
    return $chuvi;
}
$chuvi = 7*3.14;
echo 'chu vi la:' .$chuvi;



echo '<br>';

function chuvihinhvuong($bankinh){
    $chuvihv = $bankinh * 4;
    return $chuvihv;
}
$chuvihv = 7 * 4;
echo 'chu vi hinh vuong la :' .$chuvihv;

echo '<br>';

function chuvihcn($canha , $canhb){
    $chuvihcn = ($canha + $canhb ) *2;
    return $chuvihcn;
}
$chuvihcn = (3 + 2) *3;
echo ' chu vi hinh chu nhat la : ' . $chuvihcn;
?>
