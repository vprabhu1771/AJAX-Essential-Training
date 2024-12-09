<?php

    $countries[] = "United States";
    $countries[] = "United Kingdom";
    $countries[] = "United Arab Emirates";
    $countries[] = "Brazil";
    $countries[] = "India";
    $countries[] = "China";
    $countries[] = "Sri Lanka";

    foreach ($countries as $country) 
    {
        // echo $country . "<br>";

        if (isset($_REQUEST['var1'])) 
        {
            if ($_REQUEST['var1'] == $country) 
            {
                echo '<div style="color: green;">' . $_REQUEST['var1'] . '</div>';
            }
        }
    }