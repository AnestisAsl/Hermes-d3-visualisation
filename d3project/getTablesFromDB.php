<?php
require_once "controller.php";
require_once "DBconstants.php";

$countryArray=$_SESSION['country'];
$asd=$_SESSION['id'];

if($conn->connect_error){
    die('Database error:' .$conn->connect_error);
}
 
    if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
    }else{
        switch(count($countryArray)){
            case 1:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]')");
                break;
            case 2:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]' OR `CountryCode`='$countryArray[1]' )");
                break;
            case 3:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]' OR `CountryCode`='$countryArray[1]' OR `CountryCode`='$countryArray[2]')");
                break;
            case 4:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]' OR `CountryCode`='$countryArray[1]' OR `CountryCode`='$countryArray[2]' OR `CountryCode`='$countryArray[3]')");
                break;
            case 5:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]' OR `CountryCode`='$countryArray[1]' OR `CountryCode`='$countryArray[2]' OR `CountryCode`='$countryArray[3]' OR `CountryCode`='$countryArray[4]')");
                break;
            case 6:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]' OR `CountryCode`='$countryArray[1]'  OR `CountryCode`='$countryArray[2]' OR `CountryCode`='$countryArray[3]' OR `CountryCode`='$countryArray[4]' OR `CountryCode`='$countryArray[5]')");
                break;
            case 7:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]' OR `CountryCode`='$countryArray[1]'  OR `CountryCode`='$countryArray[2]' OR `CountryCode`='$countryArray[3]' OR `CountryCode`='$countryArray[4]' OR `CountryCode`='$countryArray[5]'OR `CountryCode`='$countryArray[6]')");
                break;
            case 8:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]' OR `CountryCode`='$countryArray[1]'  OR `CountryCode`='$countryArray[2]' OR `CountryCode`='$countryArray[3]' OR `CountryCode`='$countryArray[4]' OR `CountryCode`='$countryArray[5]'OR `CountryCode`='$countryArray[6]' OR `CountryCode`='$countryArray[7]')");
                break;
            case 9:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]' OR `CountryCode`='$countryArray[1]'  OR `CountryCode`='$countryArray[2]' OR `CountryCode`='$countryArray[3]' OR `CountryCode`='$countryArray[4]' OR `CountryCode`='$countryArray[5]'OR `CountryCode`='$countryArray[6]' OR `CountryCode`='$countryArray[7]' OR `CountryCode`='$countryArray[8]')");
                break;
            default:
                $result = mysqli_query($conn, "SELECT * FROM `countrycodeindicatorcodeyears` WHERE IndicatorCode='$asd' AND (`CountryCode`='$countryArray[0]' OR `CountryCode`='$countryArray[1]'  OR `CountryCode`='$countryArray[2]' OR `CountryCode`='$countryArray[3]' OR `CountryCode`='$countryArray[4]' OR `CountryCode`='$countryArray[5]'OR `CountryCode`='$countryArray[6]' OR `CountryCode`='$countryArray[7]' OR `CountryCode`='$countryArray[8]' OR `CountryCode`='$countryArray[9]')");
                break;
        }    
    $data = array();
    while ($row = mysqli_fetch_object($result))
    {
    array_push($data, $row);
    }
    
    echo json_encode($data);
     exit();
    $conn->close();
    }
    
?>

   



