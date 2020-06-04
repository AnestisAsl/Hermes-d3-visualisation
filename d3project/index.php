
<?php
require_once "controller.php";
require_once "DBconstants.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Tera&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">  
    <link rel="stylesheet"  href="style.css">
    <title>Explore</title>
</head>
<body>
    <h1>Data journey starts here</h1>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catergory</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" id="category1" href="#" onclick="takeValue('cat1','Services')">Services</a>
                <a class="dropdown-item" id="category2" href="#" onclick="takeValue('cat2','Agriculture')">Agriculture</a>
                <a class="dropdown-item" id="category3" href="#" onclick="takeValue('cat3','Investments')">Investments</a>
                <a class="dropdown-item" id="category4" href="#" onclick="takeValue('cat4','Electricity')">Electricity</a>
                <a class="dropdown-item" id="category5" href="#" onclick="takeValue('cat5','Emissions')">Emissions</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="index.php" method="post">
                <label class="cat1">
                    <input type="radio"   name="indicatorCode" value="BM.GSR.TRVL.ZS" onclick="setValue('Travel services (%of service imports)')" required>
                    Travel services (%of service imports)
                </label><br/>
                <label class="cat1">
                    <input type="radio"   name="indicatorCode" value="BM.GSR.TRAN.ZS" onclick="setValue('Transport services (% of service imports)')" required>
                    Transport services (% of service imports)
                </label><br/>
                <label class="cat1">
                    <input type="radio"   name="indicatorCode" value="BM.GSR.TOTL.CD" onclick="setValue('Imports of goods')" required>
                    Imports of goods
                </label><br/>
                <label class="cat1">
                    <input type="radio"   name="indicatorCode" value="BX.GSR.TOTL.CD" onclick="setValue('Exports of goods')" required>
                    Exports of goods   
                </label><br/>
                <label class="cat1">
                    <input type="radio"   name="indicatorCode" value="BN.GSR.GNFS.CD" onclick="setValue('Net trade in goods and services (BoP)')" required>
                    Net trade in goods and services (BoP)
                </label><br/>
                <label class="cat1">
                    <input type="radio"   name="indicatorCode" value="BX.GSR.CMCP.ZS" onclick="setValue('Communications')" required>
                    Communications
                </label><br/>
                
                
                <label class="cat2">
                    <input type="radio"   name="indicatorCode" value="AG.LND.AGRI.K2" onclick="setValue('Agricultural land (sq. km)')" required>
                    Agricultural land (sq. km) 
                </label><br/>
                <label class="cat2">
                    <input type="radio"   name="indicatorCode" value="AG.LND.AGRI.ZS" onclick="setValue('Agricultural land (% of land area)')" required>
                    Agricultural land (% of land area)
                </label><br/>
                <label class="cat2">
                    <input type="radio"   name="indicatorCode" value="AG.LND.ARBL.HA" onclick="setValue('Arable land (hectares)')" required>
                    Arable land (hectares)
                </label><br/>
                <label class="cat2">
                    <input type="radio"   name="indicatorCode" value="AG.LND.ARBL.HA.PC" onclick="setValue('Arable land (hectares per person) ')" required>
                    Arable land (hectares per person) 
                </label><br/>
                <label class="cat2">
                    <input type="radio"   name="indicatorCode" value="AG.LND.CREL.HA" onclick="setValue('Land under cereal production (hectares)')" required>
                    Land under cereal production (hectares)
                </label><br/>
                <label class="cat2">
                    <input type="radio"   name="indicatorCode" value="AG.PRD.CREL.MT" onclick="setValue('Cereal production (metric tons)')" required>
                    Land under cereal production (hectares)
                </label><br/>
                

                <label class="cat3">
                    <input type="radio"   name="indicatorCode" value="AG.PRD.CREL.MT" onclick="setValue('Portfolio investment')" required>
                    Portfolio investment
                </label><br/>
                <label class="cat3">
                    <input type="radio"   name="indicatorCode" value="AG.PRD.CREL.MT" onclick="setValue('Foreign direct investment')" required>
                    Foreign direct investment
                </label><br/>
                <label class="cat3">
                    <input type="radio"   name="indicatorCode" value="CM.MKT.TRAD.CD" onclick="setValue('Stocks traded')" required>
                    Stocks traded
                </label><br/>
                


                <label class="cat4">
                    <input type="radio"   name="indicatorCode" value="EG.ELC.ACCS.ZS" onclick="setValue('Access to electricity (% of population)')" required>
                    Access to electricity (% of population)
                </label><br/>
                <label class="cat4">
                    <input type="radio"   name="indicatorCode" value="EG.ELC.COAL.ZS" onclick="setValue('Electricity production from coal sources (% of total)')" required>
                    Electricity production from coal sources (% of total)
                </label><br/>
                <label class="cat4">
                    <input type="radio"   name="indicatorCode" value="EG.ELC.FOSL.ZS" onclick="setValue('Electricity production from oil')" required>
                    Electricity production from oil
                </label><br/>
                <label class="cat4">
                    <input type="radio"   name="indicatorCode" value="EG.ELC.HYRO.ZS" onclick="setValue('Electricity production from hydroelectric sources (% of total)')" required>
                    Electricity production from hydroelectric sources (% of total)
                </label><br/>
                <label class="cat4">
                    <input type="radio"   name="indicatorCode" value="EG.ELC.NUCL.ZS" onclick="setValue('Electricity production from nuclear sources (% of total)')" required>
                    Electricity production from nuclear sources (% of total)
                </label><br/>
                <label class="cat4">
                    <input type="radio"   name="indicatorCode" value="EG.ELC.RNWX.KH" onclick="setValue('Electricity production from renewable sources')" required>
                    Electricity production from renewable sources
                </label><br/>


                <label class="cat5">
                    <input type="radio"   name="indicatorCode" value="EN.ATM.CO2E.KT" onclick="setValue('CO2 emissions (kt)')" required>
                    CO2 emissions (kt)
                </label><br/>
                <label class="cat5">
                    <input type="radio"   name="indicatorCode" value="EN.ATM.METH.ZG" onclick="setValue('Methane emissions (% change from 1990)')" required>
                    Methane emissions (% change from 1990)
                </label><br/>
                <label class="cat5">
                    <input type="radio"   name="indicatorCode" value="EN.ATM.GHGT.ZG" onclick="setValue('Total greenhouse gas emissions (% change from 1990)')" required>
                    Total greenhouse gas emissions (% change from 1990)
                </label><br/>
                <label class="cat5">
                    <input type="radio"   name="indicatorCode" value="EN.ATM.NOXE.ZG" onclick="setValue('Nitrous oxide emissions (% change from 1990)')" required>
                    Nitrous oxide emissions (% change from 1990)
                </label><br/>
                <label class="cat5">
                    <input type="radio"   name="indicatorCode" value="EN.CO2.ETOT.ZS" onclick="setValue('CO2 emissions from electricity and heat production')" required>
                    CO2 emissions from electricity and heat production
                </label><br/>
                <label class="cat5">
                    <input type="radio"   name="indicatorCode" value="EN.CO2.TRAN.ZS" onclick="setValue('CO2 emissions from transport (% of total fuel combustion)')" required>
                    CO2 emissions from transport (% of total fuel combustion)
                </label><br/>
                




                <input type="text" name="setName" class="form-control" id="inputInCodesId" aria-label="Text input with dropdown button" placeholder="Choose Category" readonly>

        </div>
         
        <div class="container1">
                <input type="checkbox" id="GreeceId" name="country[]" value="GRC">
                <label class="country"> Greece</label><br>
                <input type="checkbox" id="CanadaId" name="country[]" value="CAN">
                <label class="country"> Canada</label><br>
                <input type="checkbox" id="USAId" name="country[]" value="USA">
                <label class="country">USA</label><br>
                <input type="checkbox" id="FranceId" name="country[]" value="FRA">
                <label class="country">France</label><br>
                <input type="checkbox" id="GermanyId" name="country[]" value="DEU">
                <label class="country">Germany</label><br>
                <input type="checkbox" id="RussiaId" name="country[]" value="RUS">
                <label class="country">Russia</label><br>
                <input type="checkbox" id="SpainId" name="country[]" value="ESP">
                <label class="country">Spain</label><br>
                <input type="checkbox" id="PortugalId" name="country[]" value="PRT">
                <label class="country">Portugal</label><br>
                <input type="checkbox" id="SwedenId" name="country[]" value="SWE">
                <label class="country">Sweden</label><br>
                <input type="checkbox" id="UnitedKingdomId" name="country[]" value="GBR">
                <label class="country">United Kingdom</label><br>
                <input type="submit" name="submit" value="SUBMIT" />
            </form>
        </div>
    </div> 
    <div class="container">
    <div class="horizontalChart">
        <h3>Horizontal Bar Chart</h3>
        <p>From year 1960 to 2019</p>
        <form action="index.php" method="post"> 
            <button type="submit" name="horizontalLinesChartBtn" class="btn btn-outline-primary" value="Submit">Horizontal Lines bar chart</button>
        </form>
    </div>
    <div class="soloChart">
        <h3>Double Bar Chart</h3>
        <p>Enter the year(1960....2019)</p>
        <form action="index.php" method="post"> 
            <input type="number" name="dateInp" required>
            <button type="submit" name="soloBarChartBtn" class="btn btn-outline-primary" value="Submit">solo bar chart</button>
        </form>
    </div>
    <div class="doubleChart">
        <h3>Double Bar Chart</h3>
        <p>Enter the time period you want to compare (1960....2019)</p>
        <form action="index.php" method="post"> 
            <input type="number" name="doubleDateInp1" required>
            <input type="number" name="doubleDateInp2" required>
            <button type="submit" name="doubleBarChartBtn" class="btn btn-outline-primary" value="Submit">double bar chart</button>
        </form>
    </div>
    <div class="bubbles">
    <h3>Bubble Chart</h3>
        <p>Enter the time period you want to compare (1960....2019)</p>
        <form action="index.php" method="post"> 
            <input type="number" name="bubblesDateInp1" required>
            <input type="number" name="bubblesDateInp2" required>
            <button type="submit" name="bubblesBtn"  class="btn btn-outline-primary" value="Submit">bubbles</button>
        </form>
    </div>
    </div>
    <div class="infos">
        <h1>Help</h1>
        <p>1) Press the category button at the Drop Down Menu.<br>
        2) Choose the data category you want to explore.<br>
        3) Choose the countries you want to compare.At this momment there are only 10 but we are working on it.<br>
        !Attention! Step 1,2,3 are the same for each chart.<br>
        4) Complete only the forms at the chart you want.<br>
        </p>
        
        
    </div>
</div> 

<script>
    function takeValue(str,categoryName){
        var text=document.getElementById("inputInCodesId" );


        displayNone('cat1');
        displayNone('cat2');
        displayNone('cat3');
        displayNone('cat4');
        displayNone('cat5');



        var category=document.getElementsByClassName(str);
        text.value=categoryName;
        var pxMovement=0;
        for(i=0;i<category.length;i++){
            category[i].style.display='inline-flex';
            category[i].style.position='absolute';
            category[i].style.top=pxMovement+'px';
            pxMovement+=25;
            
        }
        
    }
    function displayNone(str){
        var category=document.getElementsByClassName(str);
        for(i=0;i<category.length;i++){
            category[i].style.display='none';
        }

    }
    function setValue(str){
        var text=document.getElementById("inputInCodesId" );
        text.value=str;
    }

</script>
  
</body>
</html>




