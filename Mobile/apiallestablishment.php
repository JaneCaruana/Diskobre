<?php
    $link = mysqli_connect('localhost','root','');
    mysqli_select_db($link,"diskobre");
    $getEstab = mysqli_query($link, "SELECT * FROM establishment JOIN category ON establishment.category_id  = category.category_id");
    if(mysqli_num_rows($getEstab) > 0){
        $return = array();
        while($estab = mysqli_fetch_array($getEstab)){
            $geometry =
                array(
                    'type' => 'Point', 
                    'coordinates' => array($estab['longtitude'], $estab['latitude']) 
                )
            ;
            $properties = 
                array(
                    'title' => '<a href="establishment-view-page.php?estabId='.$estab['establishment_id']. '" class="nav-title">'.$estab['estab_name'].'</a>',
                    'category' => ''.$estab['estcat'].''
                )
            ;
            $feature =
                array(
                    'type' => 'Feature',
                    'geometry' => $geometry,
                    'properties' => $properties
                )
            ;

            array_push($return, $feature);
        }
        $return = json_encode($return);
        echo $return;
    }
?>