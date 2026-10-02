<?php
date_default_timezone_set("asia/jakarta");
 
echo date("Y-m-d H:i:s") .  "<br>";

$jam = date("H:i");

if ($jam < "10:00") {
    echo "Selamat Pagi";
} else if ($jam < "14:30") {
    echo "Selamat Siang";
} else if ($jam < "18:00") {
    echo "Selamat Sore";
} 
else if ($jam > "18:00" && $jam < "5:00") {
    echo "Selamat Malam";
} 

?>