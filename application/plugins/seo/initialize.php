<?php

// initialize seo
include("seo.php");

$seo = new SEO(array(
    "title" => "Ayurveda Treatment",
    "keywords" => "ayurved, ayurveda, ayurvedic treatment in delhi india" ,
    "description" => "We promote health, wellness, Beauty & cure through natural healing system to mankind at an affordable cost.",
    "author" => "",
    "robots" => "INDEX,FOLLOW",
    "photo" => CDN . "images/newlogo.PNG"
));

Framework\Registry::set("seo", $seo);