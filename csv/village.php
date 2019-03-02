<?php
        

$dataPoints = array( 
	array("y" => 3373.64, "label" => "Germany" ),
	array("y" => 2435.94, "label" => "France" ),
	array("y" => 1842.55, "label" => "China" ),
	array("y" => 1828.55, "label" => "Russia" ),
	array("y" => 1039.99, "label" => "Switzerland" ),
	array("y" => 765.215, "label" => "Japan" ),
	array("y" => 612.453, "label" => "Netherlands" )
);

?>



<html>
    <head>
        <title>Village Wise</title>

        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Gold Reserves"
	},
	axisY: {
		title: "Gold Reserves (in tonnes)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>



        <style>
        
body{
  font-family: 'Montserrat', sans-serif;
  margin:0;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  align-content: center;
  flex-wrap: wrap;
  width: 80vw;
  margin: 0 auto;
  min-height: 100vh;
}
.btn {
  flex: 1 1 auto;
  margin: 10px;
  padding: 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
 /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
  box-shadow: 0 0 20px #eee;
  border-radius: 10px;
 }



.btn:hover {
  background-position: right center; /* change the direction of the change here */
}


.btn-4 {
  background-image: linear-gradient(to right, #a1c4fd 0%, #c2e9fb 51%, #a1c4fd 100%);
}
        </style>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Top 10 Google Play Categories - till 2017"
	},
	axisY: {
		title: "Number of Apps",
		includeZero: false
	},
	data: [{
		type: "column",
                dataPoints: <?php echo $dataPoints; ?>
	}]
});
chart.render();
 
}
</script>


</head>
<body>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



<?php
//print_r($_SESSION);
if(array_key_exists("id",$_SESSION))
{
 include("sqli.php");

        $mic1 = $_SESSION["mic1"];
        $mic2 = $_SESSION["mic2"];
        $email = $_SESSION["email"];

        /* $daa1 = "2001_shivansh.verma8080@gmail.com.csv";
        $daa2 = "2002_shivansh.verma8080@gmail.com.csv"; */


      $daa1 = $mic1.'_'.$email.'.csv';
        $daa2 = $mic2.'_'.$email.'.csv';

       // $data1 = '2001_shivansh.verma8080@gmail.com.csv';

        /* if (($file1 = fopen($data1,"r")) !== FALSE) {
                while (($data = fgetcsv($file1, 1000, ",")) !== FALSE) {
                        echo $data1;
                        $num = count($data);
                        for ($i = 0; $i < $num; $i++) {
                                echo $data[$i];
                        }
                }
        } */



        // $file2 = fopen($data2,"r");

        // echo ":".$data1.":";
        // print_r($file1);


        //echo $mic1.'_'.$email.'.csv' ;


        $csv1 = new csv();
        $csv2 = new csv();



        function calc_slope($data1,$data2)
        {
                $slope = ($data2-$data1)/5;
                return $slope;
        }

        function y_inter($slope,$data2)
        {
                $y_inter = $data2 - $slope*2014;
                return $y_inter;
        }

        
        function calc_well($slope,$year,$intercept)
        {
                $estimated = $slope*$year+$intercept;
                return $estimated;
        }

        function mean_depth_calc( array $data)
        {
                $mean_depth = 0;
                $sum = 0 ;
                $sum_fi = array_sum($data);
                $sum_fi_xi = 0;
                $class_avg = 10;

                for ( $i = 0 ; $i<sizeof($data) ; ++$i )
                {
                if ( $i<=2 )
                {
                        $sum_fi_xi += ($data[$i]) * $class_avg;
                        $class_avg +=20 ;
                }

                if ( $i==3 )
                {
                        $sum_fi_xi += ($data[$i])*65;
                        $class_avg = 80;    
                }

                if ( $i<=7)
                {
                        $sum_fi_xi += ($data[$i]) * $class_avg;
                        $class_avg +=10 ;
                }

                if ($i==8)
                {
                        $sum_fi_xi += ($data[$i])*150;
                }
                }
                if ($sum_fi != 0 )
                {
                $mean_depth = $sum_fi_xi/$sum_fi;
                }
                else
                {
                        $mean_depth = 0;
                }
                return $mean_depth;
        }
        



        
        // $csv1->import($data1);
        //$csv2->import($_FILES['file2']['tmp_name']);


        $state = strtolower("goa");

        
        $dist1_array = [];
        $dist1_array = $csv1->find_distinct_dist($daa1,3);

        $dist2_array = [];
        $dist2_array = $csv2->find_distinct_dist($daa2,3);

      // print_r ( $dist2_array );

        $mean_depth_dist1 =[];
        $mean_depth_dist2 =[];

        $row = ' ';

        $header =   '       <div class="limiter">
        <div class="container-table100">
                <div class="wrap-table100">
                        <div class="table100 ver6 m-b-110">
                                <div class="table100-head">
                                        <table>
                                                <thead>
                                                        <tr class="row100 head">
                                                                <th class="column100 column1" data-column="column1">STATE</th>
                                                                <th class="column100 column2" data-column="column2">VILLAGE</th>
                                                                <th class="column100 column2" data-column="column2">DEPTH</th>
                                                                <th class="column100 column2" data-column="column2">SLOPE</th>
                                                                <th class="column100 column2" data-column="column2">Y INTERCEPT</th>
                                                                <th class="column100 column2" data-column="column2">ESTIMATED</th>
                                                                <th class="column100 column8" data-column="column8">INCERESE/DECREASE</th>
                                                        </tr>
                                                </thead>
                                        </table>
                                </div>
                                <div class="table100-body js-pscroll">
                                                        <table>
                                                                <tbody>
        ';

        $generated = [];
        $depth_zone1 =[];
        $depth_zone2 = [];
        $depth_classwise_per1 =[];
        $depth_classwise_per2 =[];
        
        $row1 = " " ;

        $data_points_village = [];
        $generated[] = array ('state' , 'block' , 'depth' , 'estimated' , 'inc/dec' );
        for ( $i=0 ; $i<sizeof($dist2_array) ; ++$i)
        {

                $depth_percentage1 = [];
                $depth_percentage2 = [];
                $data1 = [];        
                $data1 = $csv1->get_location_a($daa1,'goa',$dist1_array[$i],3);   
                $totalsum1 = array_sum($data1);
                
                $data2=[];
                $data2 = $csv1->get_location_a($daa2,'goa',$dist2_array[$i],3);  
                $totalsum2 = array_sum($data2);


                
                $depth_zone1[] = array_search( max($data1) ,$data1);
                $depth_zone2[] = array_search( max($data2) ,$data2);


                
                
                // print_r($data1);
                $mean_depth_dist1[] = mean_depth_calc($data1);

        
                //print_r($data2);    
                $mean_depth_dist2[] = mean_depth_calc($data2);   
        
                
                
                for ( $j = 0 ; $j<9 ; ++$j )
                {
                        

                $slope=0;
                $y_c=0;
                $estim=0;


                $slope=calc_slope($data1[$j],$data2[$j]);
                $y_c=y_inter($slope,$data2[$j]);

                $estim = calc_well($slope,2019,$y_c);
                $depth = 0;

                if ($estim <0 )
                {
                        $estim = 0;
                }

                switch($j)
                {
                        case 0: $depth = "0-20";
                                break;
                        case 1: $depth = "20-40";
                                break;
                        case 2: $depth = "40-60";
                                break;
                        case 3: $depth = "60-70";
                                break;
                        case 4: $depth = "70-90";
                                break;
                        case 5: $depth = "90-110";
                                break;
                        case 6: $depth = "110-130";
                                break;
                        case 7: $depth = "130-150";
                                break;
                        case 8: $depth = ">150";
                                break;
                                
                }

                /*
                echo "<br> FOR THE DISTRICT " . $dist2_array[$i];
                echo "<br> Slope " . $slope ;
                echo "<br> Y Intercept" . $y_c;
                echo "<br> Estimated in 2019:" . round($estim) ;
                echo "<br> INCRESE/DECRESE " . ($data2[$j]-$data1[$j]);

                echo "<br><<<<>>>><br>";
                }     */

                $row1 = $row1 .'<tr class="row100">
                <td class="column100 column1" data-column="column1">'.$state.'</td>                
                <td class="column100 column2" data-column="column2">'.$dist2_array[$i].'</td>
                <td class="column100 column2" data-column="column2">'.$depth.'</td>
                <td class="column100 column2" data-column="column2">'.$slope.'</td>
                <td class="column100 column2" data-column="column2">'.$y_c.'</td>
                <td class="column100 column2" data-column="column2">'.round($estim).'</td>
                <td class="column100 column8" data-column="column8">'.($data2[$j]-$data1[$j]).'</td>
                </tr>' ;

                $generated[] = array ($state ,$dist2_array[$i],$depth,round($estim),($data2[$j]-$data1[$j]));            
        
               }//ENDS THE TUBEWELL CALC
               
               


              /*  $graph_data = array_fill( 0 , 9 , 0 );

               for ( $i=0 ; $i<9; ++$i)
               {
                        $graph_data_inside = [];
                        for ( $j = 0 ; $j<9 ; ++$j)
                        {        $data1 = [];        
                                $data1 = $csv1->get_location_a($daa1,'goa',$dist1_array[$j],3);

                                $data2 = [];        
                                $data2 = $csv2->get_location_a($daa1,'goa',$dist2_array[$j],3);

                                for ( $k = 0 ; $k<sizeof($dist2_array) ; ++$k )
                                {
                                $graph_data_inside[] = array ($dist2_array[$k],($data2[$j]-$data1[$j]) );
                                }
                        }
               }


               print_r($graph_data_inside);
 */
                

                }

                $dataPoints = array(
                        array("label"=> "Education", "y"=> 284935),
                        array("label"=> "Entertainment", "y"=> 256548),
                        array("label"=> "Lifestyle", "y"=> 245214),
                        array("label"=> "Business", "y"=> 233464),
                        array("label"=> "Music & Audio", "y"=> 200285),
                        array("label"=> "Personalization", "y"=> 194422),
                        array("label"=> "Tools", "y"=> 180337),
                        array("label"=> "Books & Reference", "y"=> 172340),
                        array("label"=> "Travel & Local", "y"=> 118187),
                        array("label"=> "Puzzle", "y"=> 107530)
                );

                $end = '</tbody>
                </table>
                </div>
                </div>
                </div>
                </div>  
                </div>
                </div>';



                $header_mean = '<div class="limiter">
                <div class="container-table100">
                        <div class="wrap-table100">
                                <div class="table100 ver6 m-b-110">
                                        <div class="table100-head">
                                                <table>
                                                        <thead>
                                                                <tr class="row100 head">
                                                                        <center><th class="column100 column1" data-column="column1">STATE</th></center>
                                                                        <center><th class="column100 column2" data-column="column2">VILLAGE</th></center>
                                                                        <center><th class="column100 column2" data-column="column2">MOST COMMONLY TAPPED ZONE1</th></center>
                                                                        <center><th class="column100 column2" data-column="column2">MEAN DEPTH1</th></center>
                                                                        <center><th class="column100 column2" data-column="column2">MOST COMMONLY TAPPED ZONE2</th></center>
                                                                        <center><th class="column100 column2" data-column="column2">MEAN DEPTH2</th></center>
                                                                        <center><th class="column100 column8" data-column="column8">CHANGE IN MEAN DEPTH</th></center>
                                                                </tr>
                                                        </thead>
                                                </table>
                                        </div>
                                        <div class="table100-body js-pscroll">
                                                                <table>
                                                                        <tbody>';

                $row_data ='';

                function depth_zone($j1) 
                {
                        $depth1 = "";
                        switch($j1)
                        {
                        case 0: $depth1 =  "0-20";
                                break;
                        case 1: $depth1 =" 20-40";
                                break;
                        case 2: $depth1 = " 40-60";
                                break;
                        case 3 : $depth1 = "60-70";
                                break;
                        case 4:$depth1 =" 70-90";
                                break;
                        case 5:$depth1 ="90-110";
                                break;
                        case 6:$depth1 ="110-130";
                                break;
                        case 7:$depth1 =" 130-150";
                                break;
                        case 8:$depth1 = ">150";
                                break;
                        }

                        return $depth1;
                }


                $generated_mean = [];

                $generated_mean[] = array ( 'STATE'  ,  'VILLAGE'  , 'DEPTHZONE MOST COMMONLY TAPPED1' ,  'MEAN DEPTH1' , 'DEPTHZONE MOST COMMONLY TAPPED2' ,  'MEAN DEPTH2' , 'CHANGE IN DEPTH'   );


                for ($i = 0 ; $i<sizeof($mean_depth_dist2) ; ++$i  )
                {
                        $j1= depth_zone($depth_zone1[$i]); 
                        $j2=depth_zone($depth_zone2[$i]); 
                
                        $row_data = $row_data.'<tr class="row100">
                        <center><td class="column100 column1" data-column="column1">'.$state.'</td></center>
                        <center><td class="column100 column2" data-column="column2"">'.$dist2_array[$i].'</td></center>
                        <center><td class="column100 column2" data-column="column2">'.$j1.'</td></center>
                        <center><td class="column100 column2" data-column="column2">'.$mean_depth_dist1[$i].'</td></center>
                        <center><td class="column100 column2" data-column="column2">'.$j2.'</td></center>
                        <center><td class="column100 column2" data-column="column2">'.$mean_depth_dist2[$i].'</td></center>
                        <center><td class="column100 column2" data-column="column8">'. ( $mean_depth_dist2[$i] - $mean_depth_dist1[$i] ).'</td></center>
                        </tr>';      
                        
                        $generated_mean[] = array ( ($state) , ($dist1_array[$i]) , ($j1) , ($mean_depth_dist1[$i]) , ($j2) , ($mean_depth_dist2[$i]) , ($mean_depth_dist2[$i] - $mean_depth_dist1[$i])    )  ;
                }


                $end_mean = '
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>  
                </div>
                </div>';








                $generated_csv = $mic1.'_'.$mic2.'_'.$_SESSION['email'].'_'.'generated'.'_village'.'.csv';
                $generated_csv_mean = $mic1.'_'.$mic2.'_'.$_SESSION['email'].'_'.'generated_MEAN'.'_village'.'.csv';

                //VILLAGE WISE CSV FILE GENERATING
                $output_csv = fopen($generated_csv , 'w' );
                foreach( $generated as $files )
                {
                        fputcsv($output_csv,$files);
                }
                fclose($output_csv);

                //MEAN CSV FILE GENERATING
                $output_csv1 = fopen($generated_csv_mean,'w');
                foreach ( $generated_mean as $row )
                {
                        fputcsv($output_csv1,$row);
                }
                fclose($output_csv1);

                echo '<a class="btn btn-4" href="#" >SHOW MAP</a>';
                echo '<a class="btn btn-4" href="#" >SHOW GRAPH</a>';
                //echo '<a class="btn btn-4" href="#" >CORRELATE WITH IRRIGATION POTENTIAL</a>';

                echo $header.$row1.$end;
                echo '<a class="btn btn-4" href=" '.$generated_csv.' " download >DOWNLOAD ABOVE RESULT</a>';                


                echo $header_mean.$row_data.$end_mean;
                echo '<a class="btn btn-4" href="'.$generated_csv_mean.'" download >DOWNLOAD ABOVE RESULT</a>';


           //     echo $header_percentagetable1.$header_percentagetable1_row.$header_percentagetable1_footer.$row_wise_percentage1.$end_per_table;


                //print_r($depth_classwise_per1);




                

    }




?>






</body>

</html>


