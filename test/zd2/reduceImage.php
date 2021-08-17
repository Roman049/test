<?php
header('Content-Type: image/png');
$im = imagecreatefrompng("img/2.png");


 
 
 function resizePng($im, $dst_width, $dst_height) {//Создание нового изображения с заданными шириной и высотой
    
    $width = imagesx($im);
    $height = imagesy($im);
    
    $newImg = imagecreatetruecolor($dst_width, $dst_height);

    imagealphablending($newImg, false);
    imagesavealpha($newImg, true);
    $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
    imagefilledrectangle($newImg, 0, 0, $width, $height, $transparent);
    imagecopyresampled($newImg, $im, 0, 0, 0, 0, $dst_width, $dst_height, $width, $height);

    return $newImg;
}

imagepng(resizePng($im ,200 ,100),"img/2__miniature.png");//сохраняем новый файл с уменьшиным изображением

if(null !== imagecreatefrompng("img/2__miniature.png")){
    header("Location: index.php");//перенаправляем на страницу где запустим баннер 
}
?>