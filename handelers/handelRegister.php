<?php 
session_start();

include '../core/request.php';
include '../core/validations.php';
include '../core/sessions.php';
$errors = [];

if(postMethod()){

    foreach($_POST as $key => $value)
    {
        $$key  =  reciveInput($value);
    }



    // validations 

    if(requiredInput($name)){
        $errors[] = "name required";
    }elseif(minInput($name,3)){
        $errors[] ="name must be greater than 3 chars";
    }elseif(maxInput($name,20)){
        $errors[] = "name must be smaller than 20 chars";
    }


    if(requiredInput($email)){
        $errors[] = "email required";
    }elseif(emailInput($email)){
        $errors[] = "please type a valid email";
    }




    if(requiredInput($name)){
        $errors[] = "password required";
    }elseif(minInput($password,6)){
        $errors[] ="password must be greater than 6 chars";
    }elseif(maxInput($password,25)){
        $errors[] = "password must be smaller than 25 chars";
    }


    if(requiredInput($confirm_password)){
        $errors[] = "confirm password required";
    }elseif(sameInput($password,$confirm_password)){
        $errors[] = "confirm password must be equal to password";
    }


    if(empty($errors)){
        $user = [
            'name' => $name,
            'email'=> $email
        ];
        sessionStore('user',$user);
        header("location:../profile.php");
    }else{
        sessionStore("errors",$errors);
        header("location:../register.php");
    }


}else{
    echo "method not allowed";
}
