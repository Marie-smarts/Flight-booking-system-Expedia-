<?php

    require_once("../Models/gender.php");
    $gender = new gender();

    if(isset($_POST['saveGender'])){

        $GenderId = $_POST['GenderId'];
        $Gender=$_POST['Gender'];
        $response = $gender->saveGender($GenderId,$Gender);
        echo json_encode($response);
    }

    if(isset($_GET['getGender'])){

        echo $gender->getGender();
    }

    if(isset($_GET['filterGender'])){

        $Gender = $_GET['Gender'];
        echo $gender->filterGender($Gender);
    }

    if(isset($_POST['deleteGender'])){

        $GenderId = $_POST['GenderId'];
        $response = $gender->deleteGender($GenderId);
        echo json_encode($response);
    }




?>