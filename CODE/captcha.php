<?php
session_start();

$_SESSION['captcha'] = mt_rand(1000,9999); // chiffre aléatoire
$img = imagecreate(65,30);
$font = 'css/fonts/Captcha/28 Days Later.ttf';

$bg = imagecolorallocate($img,255,255,255);
$textcolor = imagecolorallocate($img,0,0,0);

imagettftext($img,23,0,3,30,$textcolor,$font,$_SESSION['captcha']);

header('Content-type:image/jpeg');
imagejpeg($img);
imagedestroy($img); // libere la memoire 

