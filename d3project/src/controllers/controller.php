
<?php
session_start();

if(isset($_POST["bubblesBtn"])){
    $_SESSION['bubbleDate1']=$_POST["bubblesDateInp1"];
    $_SESSION['bubbleDate2']=$_POST["bubblesDateInp2"];
    if(!isset($_SESSION['country'])){
        echo "<div class='error'>
        <h3>Choose the category field and the countries first.</h3>
        <button class='ok'>OK</button>
        </div> ";
    }else{
        if($_SESSION['bubbleDate1']<1960 || $_SESSION['bubbleDate1']>2019 || $_SESSION['bubbleDate2']<1960 || $_SESSION['bubbleDate2']>2019){
            echo "<div class='error'>
            <h3>Wrong Input!</h3>
            <p>Years must be between 1960 and 2019.</p>
            <button class='ok'>OK</button>

            </div> ";
        }else{
            header("Location:charts/bubbles.php");

        }
    }
}
if(isset($_POST["soloBarChartBtn"])){
    $_SESSION['date']=$_POST["dateInp"];
    if(!isset($_SESSION['country'])){
        echo "<div class='error'>
        <h3>Choose the category field and the countries first.</h3>
        <button class='ok'>OK</button>

        </div> ";
    }else{
        if($_SESSION['date']<1960 || $_SESSION['date']>2019){
            echo "<div class='error'>
            <h3>Wrong Input!</h3>
            <p>Years must be between 1960 and 2019.</p>
            <button class='ok'>OK</button>

            </div> ";
        }else{
            header("Location:charts/barchartsolo.php");
        }
    }
}
if(isset($_POST["doubleBarChartBtn"])){
    $_SESSION['doubleDate1']=$_POST["doubleDateInp1"];
    $_SESSION['doubleDate2']=$_POST["doubleDateInp2"];
    if(!isset($_SESSION['country'])){
        echo "<div class='error'>
        <h3>Choose the category field and the countries first.</h3>
        <button class='ok'>OK</button>

        </div> ";
    }else{
        if($_SESSION['doubleDate1']<1960 || $_SESSION['doubleDate1']>2019 || $_SESSION['doubleDate2']<1960 || $_SESSION['doubleDate2']>2019){
            echo "<div class='error'>
            <h3>Wrong Input!</h3>
            <p>Years must be between 1960 and 2019.</p>
            <button class='ok'>OK</button>

            </div> ";
        }else{
            header("Location:charts/barchartdouble.php");
        }
    }

}
if(isset($_POST["horizontalLinesChartBtn"])){
    if(!isset($_SESSION['country'])){
        echo "<div class='error'>
        <h3>Choose the category field and the countries first.</h3>
        <button class='ok'>OK</button>
        </div> ";
    }else{
        header("Location:charts/horizantalLines.php");
    }
}

if(isset($_POST["indicatorCode"])){
    $tempCode='';
    $tempName='';
    $tempCode=$_POST["indicatorCode"];
    $tempName=$_POST["setName"];
    $_SESSION['id']=$tempCode;
    $_SESSION['name']=$tempName;
}
if(isset($_POST["country"])){
    $country=$_POST["country"];
    $temp="";
    foreach ($country as $c){
        $temp.=$c.",";
    }
    $temp=substr($temp,0,-1);
    $_SESSION['country']=explode(",", $temp);
}

if(isset($_POST["back"])){
    header("Location:../index.php");
    session_destroy();

}

if(isset($_POST["backToWelcomePage"])){
    header("Location: welcome.php");
    session_destroy();
}

?>
