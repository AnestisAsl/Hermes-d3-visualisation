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

    $sql = "SELECT * FROM `countrycodeindicatorcodeyears`
     WHERE IndicatorCode=? AND (`CountryCode` IN ($strArray))"; 
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $SESid);
    $stmt->execute();
    $result = $stmt->get_result(); 

    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
        exit();
    $conn->close();
}
    
?>

   



