<?php

include('session.php');

// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");
 
// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=logs.xls");
 
// Add data table
//include 'export_grade.php';
?>
<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
							<tr>
								<th>
									 Date
								</th>
								<th>
									 Logs
								</th>
								<th>
									 
							</tr>
							</thead>
							<tbody>
<?php
	$query1=mysqli_query($con,"select * from history_logs natural join member order by log_date desc")or die(mysqli_error());
			while($row2=mysqli_fetch_array($query1))
			{
			
?>								
							<tr>
								<td>
									 <?php echo date("M d, Y h:i a",strtotime($row2['log_date']));?>
								</td>
								<td>
									 <?php echo $row2['member_first']." ".$row2['member_last']." ".$row2['log'];?>
								</td>
								
							</tr>
							
<?php }?>							
							</tbody>
							</table>