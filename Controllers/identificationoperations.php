<?php

    require_once('../Models/identification.php');
    $identification = new identification();

    if(isset($_POST['saveIdentification'])){

        $IdentificationId = $_POST['IdentificationId'];
        $DocumentName = $_POST['DocumentName'];

        $response = $identification->saveIdentification($IdentificationId,$DocumentName);
        echo json_encode($response);

    }

    if(isset($_GET['filterIdentification'])){

        $DocumentName = $_GET['DocumentName'];
        echo $identification->filterIdentification($DocumentName);
    }

    if(isset($_GET['getIdentification'])){

        echo $identification->getIdentification();
    }

    if(isset($_POST['deleteIdentification'])){

        $IdentificationId = $_POST['IdentificationId'];

        $response = $identification->deleteIdentification($IdentificationId);
        echo json_encode($response);
    }

?>