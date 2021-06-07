<?php
require_once "../controllers/controller.php";
?>


<!DOCTYPE html>
<meta charset="utf-8">

<style>

body {
  font: 7px sans-serif;
}


.back {
  width: 17.5vw;
  height: 4vh;
  border-radius: 25px;
  border: 2px solid #f4a261;
  background-color: #e9c46a;
  transition-duration: 0.4s;
}
.back:hover {
  background-color: #e76f51;
  border: 2px solid #bc6c25;
  color: white;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}


.line0{
  fill: none;
  stroke: steelblue;
  stroke-width: 1.5px;
  color:steelblue;
}

.line1 {
  fill: none;
  stroke: red;
  stroke-width: 1.5px;
  color:red;
}

.line2 {
  fill: none;
  stroke: black;
  stroke-width: 1.5px;
  color:black;

}
.line3 {
  fill: none;
  stroke: blue;
  stroke-width: 1.5px;
  color:blue;

}
.line4 {
  fill: none;
  stroke: cyan;
  stroke-width: 1.5px;
  color:cyan;

}
.line5 {
  fill: none;
  stroke: aquamarine;
  stroke-width: 1.5px;
  color:aquamarine;

}
.line6 {
  fill: none;
  stroke: orange;
  stroke-width: 1.5px;
  color:orange;

}
.line7 {
  fill: none;
  stroke: green;
  stroke-width: 1.5px;
  color:green;

}
.line8 {
  fill: none;
  stroke: yellow;
  stroke-width: 1.5px;
  color:yellow;

}
.line9 {
  fill: none;
  stroke: brown;
  stroke-width: 1.5px;
  color:brown;

}

.wrappercl{
  display:block;
  font-size:15px;
}


</style>
<body>
<h1><?php echo $_SESSION['name'] ?></h1>
  <form  method="post">
    <button class="back"  name="back">BACK</button>
  </form>
  <div class="wrappercl">
  <?php
  for($i=0;$i<sizeof($_SESSION['country']);$i++){?>
    <label <?php echo "class=line".$i ;?>>
      <?php echo $_SESSION['country'][$i];} ?>
  </label> 
  </div>
  
  
<script src="//d3js.org/d3.v3.min.js"></script>
<script>

var margin = {top: 20, right: 30, bottom: 30, left: 40},
    width = 960 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

var x = d3.scale.linear()
    .range([0, width]);

var y = d3.scale.linear()
    .range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

var line = d3.svg.line()
    .interpolate(interpolateSankey)
    .x(function(d) { return x(d.Year); })
    .y(function(d) { return y(d.Count); });

var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.json("../dboperations/getSpecificTables.php",function(error,data){
  if (error) throw error;
  console.log(data.length)
  for(j=0;j<data.length;j++){
    dataset = [];
    for(i=1960;i<2019;i++){
        
            dataset.push({"Year":i,"Count":data[j][i]});
            
    }
    x.domain(d3.extent(dataset, function(d) { return d.Year; }));
    y.domain(d3.extent(dataset, function(d) { return d.Count; }));
    var linej="line"+j;
    var countryj="country"+j;
    svg.append("path")
        .datum(dataset)
        .attr("class", linej)
        .attr("d", line);
    }
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis);

    
       
    });

    function interpolateSankey(points) {
    var x0 = points[0][0], y0 = points[0][1], x1, y1, x2,
        path = [x0, ",", y0],
        i = 0,
        n = points.length;
    while (++i < n) {
        x1 = points[i][0], y1 = points[i][1], x2 = (x0 + x1) / 2;
        path.push("C", x2, ",", y0, " ", x2, ",", y1, " ", x1, ",", y1);
        x0 = x1, y0 = y1;
    }
    return path.join("");
}
var body = document.getElementsByTagName("BODY")[0];
if(screen.width<760){
  body.style.fontSize ="22px";
}
</script>