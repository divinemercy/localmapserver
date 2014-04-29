<?php

//    $url = "http://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap&sensor=false";
    $url = "http://uni2growcameroun.com/app/resources/images/templatemo_image_01.jpg";
    
    echo "test <br>";
    echo file_get_contents($url, true);
