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
    $email = $data->email;
    $password = $data->password;

        //$con = mysqli_connect("Localhost:80","root","");
        //mysqli_select_db($con,"react-login-reg");

        //if($first_name && $last_name && $email && $password){

    $sql = "SELECT * FROM register WHERE email='".$email."' AND password='".$password."'";

    $result = mysqli_query($con,$sql);

    $nums = mysqli_num_rows($result);
    $rs = mysqli_fetch_array($result);

    if($nums >= 1){

        http_response_code(200);
        $outp = "";

        //while($rs = mysqli_fetch_array($result)){
            //if ($outp != "") {$outp .= ",";}

            $outp .= '{"email":"' . $rs["email"] . '",';
            $outp .= '"first_name":"' . $rs["first_name"] . '",';
            $outp .= '"last_name":"' . $rs["last_name"] . '",';
            $outp .= '"Status":"'. $rs["200"].'"}';

            echo $outp;
        //}
    }
    else{

        http_response_code(202);
    }