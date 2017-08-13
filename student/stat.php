<?php 
include('session.php');
date_default_timezone_set("Asia/Manila");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title><?php include('title.php');?> | Take Quiz</title>
    <?php include('head.php');?>
 
  </head>
  <body class="page-md page-header-fixed page-sidebar-closed page-sidebar-closed-hide-logo">
  <?php include('header.php');?>
  <div class="clearfix">
  </div>

  <div class="page-container">
    <?php include('sidebar.php');?>
    
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
      <div class="page-content">
        <!-- BEGIN PAGE CONTENT-->
			<?php
			   include('../includes/dbcon.php');
			   $quiz_id=$_REQUEST['qid'];
               $_SESSION['qid']=$quiz_id;
			   $sid=$_SESSION['id'];
			   $query2=mysqli_query($con,"select * from grade join quiz on grade.quiz_id=quiz.quiz_id where grade.quiz_id='$quiz_id'")or die(mysqli_error($con));
				    $row1=mysqli_fetch_array($query2);
				      $gid= $row1['group_id'];
				      //unset($_SESSION['quiz_id']);
			?>
		     
		  <div class="note">
                <h2 class="block">Quiz Result <a href="progress.php?gid=<?php echo $gid; ?>" class="pull-right btn btn-primary btn-lg">Back</a></h2>
                <h1 class="text-center">
                   Score: <?php echo $row1['score']." / ".$row1['total'];?>
                </h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-8">
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <tr>
                                    <td>#</td>
                                    <td>Question</td>
                                    <td>Type</td>
                                    <td>Answer Status</td>
                                </tr>
                                <tr>
<?php 
                            
                            $query=mysqli_query($con,"select * from question_order natural join question where member_id='$sid' and quiz_id='$quiz_id' order by q_order")or die(mysqli_error($con));
                                    $i=1;
                                    while ($row=mysqli_fetch_array($query))
                                    {
                                        //$order_id=$row['order_id'];   
                                        echo "<td>$i</td>"; 
                                        echo "<td>$row[question]</td>";
                                        echo "<td>$row[question_type]</td>";
                                        
                                        if ($row['answer_status']==1)
                                                echo "<td><span class='badge badge-success'>Correct</span></td></tr>";
                                        else 
                                                echo "<td><span class='badge badge-danger'>Wrong</span></td></tr>";
   
                                        
                                        $i++;
                                    }
                                    
                                ?>                              

                            </table>

                        </div>
                        <div id="graph" class="col-md-4"></div>
                    </div>
                </div>
      </div>
        </div><!--col-md-12-->
      </div><!--page-content-->
    </div><!--page-container-->
  </div><!--container-->
 </body>  

   
    
    <!-- jQuery 2.1.4 -->
    <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="../plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'graph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    spacingBottom: 0,
                    spacingLeft: 0
                },
                title: {
                    text: '',
                    style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '18px', fontSize: '26px' }
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            style: { fontFamily: '\'Lato\', sans-serif', lineHeight: '10px', fontSize: '14px' },
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: '',
                    data: []
                }]
            }
            
            $.getJSON("stat_data.php", function(json) {
                options.series[0].data = json;
                chart = new Highcharts.Chart(options);
            });
            
            
            
        });   
        </script>
      <script src="highcharts.js"></script>
        <script src="exporting.js"></script>
  </body>
</html>
