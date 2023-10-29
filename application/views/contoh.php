<?php
    $send = '{
        "token": "12345",
        "req": "delete_data",
        "data": {
            "id": "5"
        }
    }';

    $send = array("token"=>"12345", "req"=>"delete_data","data"=>array("id"=>"5"));
    json_encode($send);
?>