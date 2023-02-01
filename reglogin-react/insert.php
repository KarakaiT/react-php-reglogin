<?php 

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    define("host", "Localhost");
    define("user", "root");
    define("pwd", "");
    define("dbname", "react-login-reg");

    $con = mysqli_connect(host,user,pwd,dbname);
    mysqli_query($con, "SET NAMES utf8");

    $data = json_decode( file_get_contents('php://input') );
    $first_name = $data->first_name;
    $last_name = $data->last_name;
    $email = $data->email;
    $password = $data->password;

        //$con = mysqli_connect("Localhost:80","root","");
        //mysqli_select_db($con,"react-login-reg");

        if($first_name && $last_name && $email && $password){

            $sql = "INSERT INTO register (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

            $result = mysqli_query($con,$sql);

            if($result){

                $response['data'] = array(
                    'status'=>'valid'
                );
                echo json_encode($response);
            }
            else{

                $response['data'] = array(
                    'status'=>'invalid'
                );
                echo json_encode($response);
            }
}
