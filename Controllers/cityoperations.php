<?php

    require_once ("../Models/city.php");
    $city = new city();

    if(isset($_POST['saveCity'])){
        $CityId=$_POST['CityId'];
        $CityName=$_POST['CityName'];
        $CountryId=$_POST['CountryId'];
        $response=$city->saveCity($CityId, $CityName, $CountryId);
        echo json_encode($response);
    }

    if(isset($_GET['getCity'])){

        echo $city->getCity();

    }

    if(isset($_GET['filterCity'])){

        $CountryName=$_GET['CountryName'];
        $CityName=$_GET['CityName'];
        echo $city->filterCity($CountryName,$CityName);
    }

    if(isset($_POST['deleteCity'])){
        $CityId=$_POST['CityId'];
        $response=$city->deleteCity($CityId);
        echo json_encode($response);
    }

?>