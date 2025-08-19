<?php

    require_once("../Models/Country.php");
    $country = new country();

    if(isset($_POST['saveCountry'])){

        $CountryId=$_POST['CountryId'];
        $CountryName=$_POST['CountryName'];
        $response=$country->saveCountry($CountryId, $CountryName);
        echo json_encode($response);

    }

    if(isset($_GET['getCountry'])){

        echo $country->getCountry();
    }

    if(isset($_GET['getCountryDetails'])){

        $CountryId=$_GET['CountryId'];
        echo $country->getCountryDetails($CountryId);
    }
   
    if(isset($_POST['deleteCountry'])){

        $CountryId=$_POST['CountryId'];
        $response=$country->deleteCountry($CountryId);
        echo json_encode($response);
    }

?>