
<?php
require_once "../controllers/controller.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
		<title>D3: A simple packed Bubble Chart</title>
		<script type="text/javascript" src="https://d3js.org/d3.v4.min.js"></script>

		<style type="text/css">
        body {
            font: 10px sans-serif;
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

		</style>
</head>
<body>
    <h1><?php echo $_SESSION['name'] ?></h1>
    <form  method="post">
        <button class="back" name="back">BACK</button>
    </form>
    <script type="text/javascript">
        var dateInp1="<?php echo $_SESSION['bubbleDate1'];?>";
        var dateInp2="<?php echo $_SESSION['bubbleDate2'] ?>";
        d3.json("../dboperations/getSpecificTables.php",function(error,data){
            array=[];
            for(i=0;i<data.length;i++){
                for(j=Number(dateInp1);j<=Number(dateInp2);j++){
                    console.log(data[i].CountryCode);
                    array.push({"Name":data[i].CountryCode+"  "+String(j),"Count":data[i][String(j)]});
                }
            }
            dataset = {
                    
                "children": array
            };
        
        var diameter = 600;
        var color = d3.scaleOrdinal(d3.schemeCategory20);

        var bubble = d3.pack(dataset)
            .size([diameter, diameter])
            .padding(1.5);

        var svg = d3.select("body")
            .append("svg")
            .attr("width", diameter)
            .attr("height", diameter)
            .attr("class", "bubble");

        var nodes = d3.hierarchy(dataset)
            .sum(function(d) { return d.Count; });

        var node = svg.selectAll(".node")
            .data(bubble(nodes).descendants())
            .enter()
            .filter(function(d){
                return  !d.children
            })
            .append("g")
            .attr("class", "node")
            .attr("transform", function(d) {
                return "translate(" + d.x + "," + d.y + ")";
            });

        node.append("title")
            .text(function(d) {
                return d.Name + ": " + d.Count;
            });

        node.append("circle")
            .attr("r", function(d) {
                return d.r;
            })
            .style("fill", function(d,i) {
                return color(i);
            });

        node.append("text")
            .attr("dy", ".2em")
            .style("text-anchor", "middle")
            .text(function(d) {
                return d.data.Name.substring(0, d.r / 3);
            })
            .attr("font-family", "sans-serif")
            .attr("font-size", function(d){
                return d.r/5;
            })
            .attr("fill", "white");

        node.append("text")
            .attr("dy", "1.3em")
            .style("text-anchor", "middle")
            .text(function(d) {
                return d.data.Count;
            })
            .attr("font-family",  "Gill Sans", "Gill Sans MT")
            .attr("font-size", function(d){
                return d.r/5;
            })
            .attr("fill", "white");

        d3.select(self.frameElement)
            .style("height", diameter + "px");


})
var body = document.getElementsByTagName("BODY")[0];
if(screen.width<760){
  body.style.fontSize ="22px";
}
	</script>
    
</body>
</html>