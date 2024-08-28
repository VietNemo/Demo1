<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo"Chuỗi lớn là: Xin chào cậu chủ ". '</br>';
    echo"Chuỗi con 1 là: về nhà". '</br>';
    echo"Chuỗi con 2 là: cậu". '</br>';
    $x="Xin chào cậu chủ" . '</br>';
    $z="về nhà" . '</br>';
    $m="cậu". '</br>';
    $y= "Xin Chào cô chủ đã về nhà". '</br>';
    echo "1, Viết một chương trình PHP để đếm số ký tự trong một chuỗi sử dụng hàm strlen().: " 
            .strlen($x).'</br>';
    echo "2, Viết một chương trình PHP để đếm số từ trong một chuỗi sử dụng hàm str_word_count(): " 
            .str_word_count($x).'</br>';
    echo "3, Viết một chương trình PHP để đảo ngược một chuỗi sử dụng hàm strrev(): " 
            .strrev($x).'</br>';
    echo "4, Viết một chương trình PHP để tìm kiếm một chuỗi con trong một chuỗi sử dụng hàm strpos(): " 
            .strpos ($x,'o'). '</br>';
    echo "5, Viết một chương trình PHP để thay thế một chuỗi con trong một chuỗi bằng một chuỗi khác sử dụng hàm str_replace(): " 
            . str_replace( "cậu", "cô", $x). '</br>';
    echo "6, Viết một chương trình PHP để kiểm tra xem một chuỗi có bắt đầu bằng một chuỗi con khác không sử dụng hàm strncmp(): " 
            .strncmp($x,$y,8) . '</br>';
    echo "7, Viết một chương trình PHP để chuyển đổi một chuỗi thành chữ hoa sử dụng hàm strtoupper(): " 
            .strtoupper($x) . '</br>';
    echo "8, Viết một chương trình PHP để chuyển đổi một chuỗi thành chữ thường sử dụng hàm strtolower(): "
            .strtolower ($x) . '</br>';
    echo "9, Viết một chương trình PHP để chuyển đổi một chuỗi thành chuỗi in hoa chữ cái đầu tiên của mỗi từ sử dụng hàm ucwords(): "
            .ucwords($x). '</br>';
    echo "10, Viết một chương trình PHP để loại bỏ khoảng trắng ở đầu và cuối chuỗi sử dụng hàm trim(): "
            .trim("MMMEm xin chào cậu chủ", "M"). '</br>';
    echo "11, Viết một chương trình PHP để loại bỏ ký tự đầu tiên của một chuỗi sử dụng hàm ltrim(): "
            .ltrim($x,"X") . '</br>';
    echo "12, Viết một chương trình PHP để loại bỏ ký tự cuối cùng của một chuỗi sử dụng hàm rtrim(): "
            .rtrim("Xin chào cậu chủ ạyyyyy","y") . "</br>";
    echo "13, Viết một chương trình PHP để tách một chuỗi thành một mảng các phần tử sử dụng hàm explode(): ";
            $t= explode(" ", $x);
            print_r($t) .'</br>';
    echo "14, Viết một chương trình PHP để nối các phần tử của một mảng thành một chuỗi sử dụng hàm implode(): ";
        $u= array ('Tớ','chào','cậu');
        $o= implode(",", $u);
        echo $o .
        '</br>';
    echo "15, Viết một chương trình PHP để thêm một chuỗi vào đầu hoặc cuối của một chuỗi sử dụng hàm str_pad(): "
        .str_pad($x, 30, 'i', STR_PAD_LEFT) .'</br>';
        ?>
<?php
echo " 16, Viết một chương trình PHP để kiểm tra xem một chuỗi có kết thúc bằng một chuỗi con khác không sử dụng hàm strrchr().". '</br>';
    if(strrchr($x,$z)===$z){
        echo"Chuỗi kết thúc bằng chuỗi con khác!";
    }
    else{
        echo"Chuỗi không kết thúc bằng chuỗi con khác!";
    }
    echo"<br>";
    ?>
<?php
echo"17, Viết một chương trình PHP để kiểm tra xem một chuỗi có chứa một chuỗi con khác không sử dụng hàm strstr()". '</br>';
if(strstr($x,$m)){
    echo"Chuỗi có chứa một chuỗi con khác!";
}
else{
    echo"Chuỗi không chứa một chuỗi con khác!";
}
echo"<br>";
?>
<?php
echo"18, Viết một chương trình PHP để thay thế tất cả các ký tự trong một chuỗi không phải là chữ cái hoặc số bằng một ký tự khác sử dụng hàm preg_replace().
". '</br>';
$str1="!@#$%^&CHAO+CAU@#%%";
echo preg_replace("/\W+/","_",$str1);
echo"<br>";
?>

<?php
echo"19, Viết một chương trình PHP để kiểm tra xem một chuỗi có phải là một số nguyên hay không sử dụng hàm is_int().". '</br>';
if(is_int($x)){
 echo"Chuỗi lớn thuộc kiểu số nguyên";
}
else{
 echo"Chuỗi lớn không thuộc kiểu số nguyên";
}
echo"<br>";
?>

<?php
echo "20, Viết một chương trình PHP để kiểm tra xem một chuỗi có phải là một email hợp lệ hay không sử dụng hàm filter_var().". '</br>';
if(filter_var($x, FILTER_VALIDATE_EMAIL)){
 echo"Email hợp lệ!";
}
else{
 echo"Chuỗi lớn là email không hợp lệ!";
}
?>
</body>
</html>
