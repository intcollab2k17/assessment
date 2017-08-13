<?php include('session.php');?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Statistics</title>
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<?php 
								 $gid=$_REQUEST['gid'];
								 $qid=$_REQUEST['qid'];
            				             $_SESSION['qid']=$_REQUEST['qid'];
                                                 $_SESSION['gid']=$_REQUEST['gid'];
            				$query=mysqli_query($con,"select * from quiz natural join `group` where group_id='$gid' and quiz_id='$qid'")or die(mysqli_error());
            						$row=mysqli_fetch_array($query);
            						
								?>
<script type="text/javascript">
$(document).ready(function() {
var options = {
chart: {
renderTo: 'container',
type: 'column',
marginRight: 130,
marginBottom: 25
},
title: {
text: 'Quiz Statistics for <?php echo $row['quiz_title']." ".$row['cys'];?>',
x: -20 //center
},
subtitle: {
text: '',
x: -20
},
xAxis: {
categories: []
},
yAxis: {
title: {
text: 'Requests'
},
plotLines: [{
value: 0,
width: 1,
color: '#808080'
}]
},
tooltip: {
formatter: function() {
return '<b>'+ this.series.name +'</b><br/>'+
this.x +': '+ this.y;
}
},
legend: {
layout: 'vertical',
align: 'right',
verticalAlign: 'top',
x: -10,
y: 100,
borderWidth: 0
},
plotOptions: {
column: {
stacking: 'normal',
dataLabels: {
enabled: true,
color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
}
}
},
series: []
}
 
$.getJSON("file1.php", function(json) {
options.xAxis.categories = json[0]['data'];
options.series[0] = json[1];
options.series[1] = json[2];
chart = new Highcharts.Chart(options);
});
});
</script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<table class="table table-striped table-bordered table-advance table-hover" style="width: 100%">
								<tr>
									<th>#</th>
									<th>Question</th>
									<th>Type</th>
									<th>Correct</th>
									<th>Wrong</th>
								</tr>
								<tr>
<?php 
            				
            				$query=mysqli_query($con,"select *,SUM(IF(answer_status='1',1,0)) as correct, SUM(IF(answer_status='0',1,0)) as wrong from question_order natural join question where group_id='$gid' and quiz_id='$qid' group by question_id order by q_order")or die(mysqli_error());
            						$i=1;
            						while ($row=mysqli_fetch_array($query))
            						{
            							$question_id=$row['question_id'];	
            							echo "<td>$i</td>";	
            							echo "<td>$row[question]</td>";
            							echo "<td>$row[question_type]</td>";
            							
                                                      //$queryyes=mysqli_query($con,"select *,SUM(answer_status) as yes from question_order where group_id='$gid' and quiz_id='$qid' and answer_status='1'")or die(mysqli_error($con));
		            					
		            					//	$rowyes=mysqli_fetch_array($queryyes);

            							echo "<td>$row[correct]</td>";

            							//$queryno=mysqli_query($con,"select *,SUM(answer_status) as no from question_order where group_id='$gid' and quiz_id='$qid' and answer_status<>'1'")or die(mysqli_error($con));
		            					
		            					//	$rowno=mysqli_fetch_array($queryno);

            							echo "<td>$row[wrong]</td></tr>";
            							$i++;
            						}
            						
								?>								

							</table>
</body>
</html>