<?php
session_start();
 $aid=$_GET['aid'];
$_SESSION['aid']=$aid;
/**
 *
 *
 * @link          https://github.com/mzm-dev 
 * @demo          http://highcharts-mzm.rhcloud.com
 * @created       September 2014
 * @fb            https://www.facebook.com/zakimedia
 * @email         mohdzaki04@gmail.com
 */
$cakeDescription = "Highcharts Pie Chart";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $cakeDescription ?></title>
        <link href="../webroot/css/cake.generic.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
				var val=document.getElementById('aid');
                var options = {
                    chart: {
                        renderTo: 'container',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: 'Employee Report Based on Ratings'
                    },
                    tooltip: {
                        formatter: function() {
                            return '<b>' + this.point.name + '</b>: ' + this.y+ ' ';
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                color: '#000000',
                                connectorColor: '#000000',
                                formatter: function() {
                                    return '<b>' + this.point.name + '</b>: ' + this.y;
                                }
                            },
                            showInLegend: true
                        }
                    },
                    series: []
                };

                $.getJSON("data-pie-chart2.php?aid="+val, function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>
        <script src="highcharts.js"></script>
       
    </head>
    <body>
        <a class="link_header" href="viewreport.php">&lt;&lt; Back</a>
        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
		<?php
  echo "<input type='hidden' id='aid' value=".$aid.">";
  
  ?>
    </body>
</html>
