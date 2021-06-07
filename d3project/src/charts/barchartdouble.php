
<?php

require_once "../controllers/controller.php";

?>


<!DOCTYPE html>
<meta charset="utf-8">
<style>

body {
  font: 10px sans-serif;
}
.back {
  width: 8.5vw;
  height: 5vh;
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

.y.axisRight text {
    fill: orange;
}

.y.axisLeft text {
    fill: steelblue;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.bar1 {
  fill: steelblue;
}

.bar2 {
  fill: orange;
}

.x.axis path {
  display: none;
}

</style>
<body>
  <h1><?php echo $_SESSION['name'] ?></h1>
  <form  method="post">
    <button class="back"  name="back">BACK</button>
  </form>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script>

var dateInp1="<?php echo $_SESSION['doubleDate1']; ?>";
var dateInp2="<?php echo $_SESSION['doubleDate2'] ?>";

var margin = {top: 80, right: 80, bottom: 80, left: 80},
    width = 600 - margin.left - margin.right,
    height = 400 - margin.top - margin.bottom;

var x = d3.scale.ordinal()
    .rangeRoundBands([0, width], .1);

var y0 = d3.scale.linear().domain([300, 1100]).range([height, 0]),
y1 = d3.scale.linear().domain([0, 50]).range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

// create left yAxis
var yAxisLeft = d3.svg.axis().scale(y0).ticks(4).orient("left");
// create right yAxis
var yAxisRight = d3.svg.axis().scale(y1).ticks(6).orient("right");

var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("class", "graph")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.json("../dboperations/getSpecificTables.php",function(error,data){
  x.domain(data.map(function(d) { return d.CountryCode; }));
  y0.domain([0, d3.max(data, function(d) { return d[dateInp2]; })]);
  y1.domain([0, d3.max(data, function(d) { return d[dateInp2]; })]);
  
  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);

  svg.append("g")
	  .attr("class", "y axis axisLeft")
	  .attr("transform", "translate(0,0)")
	  .call(yAxisLeft)
	.append("text")
	  .attr("y", 6)
	  .attr("dy", "-2em")
	  .style("text-anchor", "end")
	  .style("text-anchor", "end")
	  .text(dateInp1);
	
  svg.append("g")
	  .attr("class", "y axis axisRight")
	  .attr("transform", "translate(" + (width) + ",0)")
	  .call(yAxisRight)
	.append("text")
	  .attr("y", 6)
	  .attr("dy", "-2em")
	  .attr("dx", "2em")
	  .style("text-anchor", "end")
	  .text(dateInp2);

  bars = svg.selectAll(".bar").data(data).enter();

  bars.append("rect")
      .attr("class", "bar1")
      .attr("x", function(d) { return x(d.CountryCode); })
      .attr("width", x.rangeBand()/2)
      .attr("y", function(d) { return y0(d[dateInp2]); })
	  .attr("height", function(d,i,j) { return height - y0(d[dateInp2]); }); 

  bars.append("rect")
      .attr("class", "bar2")
      .attr("x", function(d) { return x(d.CountryCode) + x.rangeBand()/2; })
      .attr("width", x.rangeBand() / 2)
      .attr("y", function(d) { return y1(d[dateInp1]); })
	  .attr("height", function(d,i,j) { return height - y1(d[dateInp1]); }); 

});

function type(d) {
  d[dateInp2] = +d[dateInp2];
  return d;
}
var body = document.getElementsByTagName("BODY")[0];
if(screen.width<760){
  body.style.fontSize ="22px";
}

</script>