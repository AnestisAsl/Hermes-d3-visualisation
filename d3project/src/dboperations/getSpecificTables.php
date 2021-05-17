<?php
require_once "../controllers/controller.php";
require_once "../constants/DBconstants.php";

$SESid=$_SESSION['id'];
$countryArray=$_SESSION['country'];
if($conn->connect_error){
    die('Database error:' .$conn->connect_error);
}
 
if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
}else{
    //for the IN operation in sql query
    $strArray=implode("', '", $countryArray);
    $strArray="'".$strArray."'";
    $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$SESid' AND (`CountryCode` IN ($strArray))");

    $data = array();
    while ($row = mysqli_fetch_object($result)){
        array_push($data, $row);
    }
    echo json_encode($data);
        exit();
    $conn->close();
}
    
?>

   



