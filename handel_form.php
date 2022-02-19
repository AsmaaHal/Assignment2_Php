<?php

session_start();

    // $userName = $_POST['first-name'];
    // echo $userName;
    $userName = htmlspecialchars($_POST['first-name']);
    $userLastName = $_POST['last-name'];
    $MobEmail = $_POST['email-mobile'];
    $userPass = $_POST['up-password'];
    
    $userBirth_day = $_POST['birth-day'];
    $userBirth_month = $_POST['birth-month'];
    $userBirth_year = $_POST['birth-year'];
    $usergender = $_POST['gen'];
    
    // echo "UserName is $userName and LastName is $userLastName </br>";
    // echo "Mobile or eamil is: $MobEmail </br>";
    // echo "Password is:$userPass </br>";
    // echo "User BirthDay: $userBirth_day:$userBirth_month:$userBirth_year </br>";
    // echo "user gender is: $usergender";
    $errors =[];
    $FirstLen = strlen($userName);
    $lastLen = strlen($userLastName);
    $passLen = strlen($userPass);
    // echo "$FirstLen";

    if (empty($userName)){
        $errors[] = "First name is required";
    }else if ($FirstLen < 4 || $FirstLen > 30){
        $errors[]= "First name should be between 4 nd 30";
    }
    if (empty($userLastName)){
        $errors[] ="Last name is required";
    }else if ($lastLen < 4 || $lastLen > 30){
        $errors[]= "Last name should be between 4 nd 30";
    }
    if (empty($MobEmail)){
        $errors[] ="Mobile/Email is required";
    }
    if (empty($userPass)){
        $errors[] ="Password is required";
    }else if ($passLen < 8 || $passLen > 30){
        $errors[]= "Password should be between 8 nd 30";
    }
    if (empty($userBirth_day)){
        $errors[] ="BirthDay is required";
    }
    if (empty($userBirth_month)){
        $errors[] ="BirthMonth is required";
    }
    if (empty($userBirth_year)){
        $errors[] ="BirthMonth is required";
    }
    if (empty($usergender)){
        $errors[] ="Gender is required";
    }else if($usergender != 'male'){
        if ($usergender != 'female'){
            $errors[] = "Please select a valid gender!"; 
        }
    }
    // else if($usergender != 'male' | $usergender !='female'){
    //      $errors[] = "Please select a valid gender!"; }

if(!empty($errors)){
    $_SESSION['errors']= $errors;
    header('location: sign.php');
}else {
    $_SESSION['LOGIN']= true;
    header('location:home.php');
}


?>