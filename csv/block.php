<?php
session_start();

//print_r($_SESSION);
if(array_key_exists("id",$_SESSION))
{
 include("sqli.php");

        $mic1 = $_SESSION["mic1"];
        $mic2 = $_SESSION["mic2"];
        $email = $_SESSION["email"];

        $daa1 = $mic1.'_'.$email.'.csv';
        $daa2 = $mic2.'_'.$email.'.csv';
/*         $data1 = $mic1.'_'.$email.'.csv';
        $data2 = $mic2.'_'.$email.'.csv';
 */
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
                $sum = 0 ;
                $sum_fi = array_sum($data);
                $sum_fi_xi = 0;
                $class_avg = 10;

                

                for ( $i = 0 ; $i<sizeof($data) ; $i++ )
                {
                if ( $i<=2 )
                {
                        $sum_fi_xi += ($data[$i])*$class_avg;
                        $class_avg +=10 ;
                }

                else if ( $i==3 )
                {
                        $sum_fi_xi += ($data[$i])*65;
                        $class_avg = 80;    
                }

                else if ( $i<=7)
                {
                        $sum_fi_xi += ($data[$i]) * $class_avg;
                        $class_avg +=20 ;
                }

                if ($i==8)
                {
                        $sum_fi_xi += ($data[$i])*150;
                }
                }


               /*  echo "<br>".$sum_fi_xi."<br>";
                echo "<br>".$sum_fi."<br>"; */
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


        $state = $_SESSION["state"];

        //echo "UPDATED";

        
        $block1_array = [];
        $block1_array = $csv1->find_distinct_dist($daa1,2);

        $block2_array = [];
        $block2_array = $csv2->find_distinct_dist($daa2,2);

       //print_r ( $block2_array );

        $mean_depth_dist1 =[];
        $mean_depth_dist2 =[];

        $row = ' ';

        $header =   '       <div class="limiter">
        <div class="container-table100">
                <div class="wrap-table100">
                        <div class="table100 ver6 m-b-110">
                                <div class="table100-head">
                                        <table data-vertable="ver6">
                                                <thead>
                                                        <tr class="row100 head">
                                                                <th class="column100 column1" data-column="column1">STATE</th>
                                                                <th class="column100 column2" data-column="column2">DEPTH</th>
                                                                <th class="column100 column2" data-column="column2">BLOCK</th>
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
        $generated[] = array ('state' , 'block' , 'depth' , 'estimated' , 'inc/dec' );
        
        $depth_zone1 =[];
        $depth_zone2 = [];


        if ( ( sizeof($block1_array)>100 ) && ( sizeof($block1_array)>100 ) )
        {
                $exe = 100;
        }

        else{
        $exe =  min( sizeof($block1_array) , sizeof($block2_array) );
        }
        

        
         for ( $i=0 ; $i<$exe ; ++$i)
        {

                
                $data1 = [];        
                $data1 = $csv1->get_location_a($daa1,$state,$block1_array[$i],2);   
                
                $data2=[];
                $data2 = $csv2->get_location_a($daa2,$state,$block2_array[$i],2);  


                
                $depth_zone1[] = array_search( max($data1) ,$data1);
                $depth_zone2[] = array_search( max($data2) ,$data2);


                
                //print_r($data1);
                //print_r($data2);
                


                
                
                // ==print_r($data1);
                $mean_depth_dist1[] = mean_depth_calc($data1);

        
                 //print_r($data2);    
                //echo "<br>".array_sum($data2)."<br>"; 
                $mean_depth_dist2[] = mean_depth_calc($data2);   
        
                
                
                for ( $j = 0 ; $j<9 ; ++$j )
                {

                $slope=0;
                $y_c=0;
                $estim=0;


                $slope=calc_slope($data1[$j],$data2[$j]);
                $y_c=y_inter($slope,$data2[$j]);

                $estim = calc_well($slope,2019,$y_c);


                if ($estim <0 )
                {
                        $estim = 0;
                }
                $depth = 0;

                switch($j)
                {
                        case 0: $depth =  "0-20";
                                break;
                        case 1: $depth ="20-40";
                                break;
                        case 2: $depth = "40-60";
                                break;
                        case 3 : $depth = "60-70";
                                break;
                        case 4:$depth ="70-90";
                                break;
                        case 5:$depth ="90-110";
                                break;
                        case 6:$depth ="110-130";
                                break;
                        case 7:$depth =" 130-150";
                                break;
                        case 8:$depth = ">150";
                                break;
                                
                }

                
                /* echo "<br> FOR THE DISTRICT " . $dist2_array[$i];
                echo "<br> Slope " . $slope ;
                echo "<br> Y Intercept" . $y_c;
                echo "<br> Estimated in 2019:" . round($estim) ;
                echo "<br> INCRESE/DECRESE " . ($data2[$j]-$data1[$j]);

                echo "<br><<<<>>>><br>"; */
                  


                //ROW WISE UPDATION OF THE TABLE

                $row = $row.'<tr class="row100">
                <center><td class="column100 column1" data-column="column1">'.$state.'</td></center>
                <td class="column100 column2" data-column="column2">'.$depth.'</td>
                <td class="column100 column2" data-column="column2">'.$block2_array[$i].'</td>
                <td class="column100 column2" data-column="column2">'.$slope.'</td>
                <td class="column100 column2" data-column="column2">'.$y_c.'</td>
                <td class="column100 column2" data-column="column2">'.round($estim).'</td>
                <td class="column100 column8" data-column="column8">'.($data2[$j]-$data1[$j]).'</td>
                </tr>' ;
                $generated[] = array (trim($state) , trim($block1_array[$i]),trim($depth),trim(round($estim)),trim($data2[$j]-$data1[$j]));
        }
                
       
                }//BLOCK EXECUTION ENDS
        
                
                

                

                

                 

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
                                                <table data-vertable="ver6">
                                                        <thead>
                                                                <tr class="row100 head">
                                                                        <center><th class="column100 column1" data-column="column1">STATE</th></center>
                                                                        <center><th class="column100 column2" data-column="column2">BLOCK</th></center>
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
                        case 1: $depth1 ="20-40";
                                break;
                        case 2: $depth1 = "40-60";
                                break;
                        case 3 : $depth1 = "60-70";
                                break;
                        case 4:$depth1 ="70-90";
                                break;
                        case 5:$depth1 ="90-110";
                                break;
                        case 6:$depth1 ="110-130";
                                break;
                        case 7:$depth1 ="130-150";
                                break;
                        case 8:$depth1 = ">150";
                                break;
                        }

                        return $depth1;
                }

                $generated_mean = [];

                $generated_mean[] = array ( 'STATE'  ,  'BLOCK'  , 'DEPTHZONE MOST COMMONLY TAPPED1' ,  'MEAN DEPTH1' , 'DEPTHZONE MOST COMMONLY TAPPED2' ,  'MEAN DEPTH2' , 'CHANGE IN DEPTH'   );



                for ($i = 0 ; $i<sizeof($mean_depth_dist2) ; ++$i  )
                {
                        $j1= depth_zone($depth_zone1[$i]); 
                        $j2=depth_zone($depth_zone2[$i]); 
                

                        $row_data = $row_data.'<tr class="row100">
                        <center><td class="column100 column1" data-column="column1">'.$state.'</td></center>
                        <center><td class="column100 column2" data-column="column2">'.$block2_array[$i].'</td></center>
                        <center><td class="column100 column2" data-column="column2">'.$j1.'</td></center>
                        <center><td class="column100 column2" data-column="column2">'.$mean_depth_dist1[$i].'</td></center>
                        <center><td class="column100 column2" data-column="column2">'.$j2.'</td></center>
                        <center><td class="column100 column2" data-column="column2">'.$mean_depth_dist2[$i].'</td></center>
                        <center><td class="column100 column8" data-column="column8">'. ( $mean_depth_dist2[$i] - $mean_depth_dist1[$i] ).'</td></center>
                        </tr>';    
                        
                        $generated_mean[] = array ( $state , $block2_array[$i] , $j1 , $mean_depth_dist1[$i] , $j2 , $mean_depth_dist2[$i] , ( $mean_depth_dist2[$i] - $mean_depth_dist1[$i] ));    
                        


                }

                $graph_data = [];

                
                $total_generated_final = [];

                for ($i = 0 ; $i<9 ; ++$i)
                {
                        $total_generated = [];
                        for( $j = 0 ; $j<($exe) ; ++$j)
                        {
                                $data1 = 0;
                                $data1 = $csv1->get_location_a($daa1,$state,$block1_array[$j],2);

                                $data2 = 0;
                                $data2 = $csv1->get_location_a($daa2,$state,$block2_array[$j],2);

                                $total_generated[] = array ( "y"=>  ($data2[$i]-$data1[$i]), "label" =>  $block1_array[$j] );
                        }
                        $total_generated_final[] = $total_generated;
                }


                $_SESSION['blockgraph'] = $total_generated_final;


                //print_r($total_generated_final);             


                


                

                
 
 
               
 


                $end_mean = '
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>  
                </div>
                </div>';            


                 //print_r ($generated);

                //GENERATING THE CSV FILE

                
                echo $_SESSION['well'];

                $generated_csv = $mic1.'_'.$mic2.'_'.$_SESSION['email'].'_'.'generated'.'_block'.'.csv';
                $generated_csv_mean = $mic1.'_'.$mic2.'_'.$_SESSION['email'].'_'.'generated_MEAN'.'_mean'.'.csv';

                echo '<a class="btn btn-4" href="district.php" >DISTRICT</a>';
                echo '<a class="btn btn-4" href="village.php" >VILLAGE</a>';
                echo '<a class="btn btn-4" href="maps/map_village.php" target="_blank" >SHOW MAP</a>';
                echo '<a class="btn btn-4" href="graphs/block.php" >SHOW GRAPH</a>';
                echo '<a class="btn btn-4" href="graphs/predict.php" >BLOCKWISE PREDECTION</a>';

             

                

                $output_csv = fopen($generated_csv , 'w' );
                foreach( $generated as $files )
                {
                        fputcsv($output_csv,$files);
                }

                fclose($output_csv);

                //MEAN CSV FILE GENERATING
                $output_csv1 = fopen($generated_csv_mean,'w');
                foreach ( $generated_mean as $row1 )
                {
                        fputcsv($output_csv1,$row1);
                }
                fclose($output_csv1);

                
                
                
                   
                echo $header.$row.$end; 
                echo '<a class="btn btn-4" href="'.$generated_csv.'" download >DOWNLOAD RESULT</a>';
                                         


                echo $header_mean.$row_data.$end_mean;

                echo '<a class="btn btn-4" href="'.$generated_csv_mean.'" download >DOWNLOAD RESULT</a>';

                
                
        
                
                
        
        
        }//ISSET CLOSES



?>

<html>
    <head>
        <title>Block Calculations</title>

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
<link href="http://dbms-com.stackstaging.com/almost/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="h.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


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
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "DEPTH CLASS 0-20"
	},
	axisY: {
		title: "INCREASE/DECREASE"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## No of Tube well(s)",
		dataPoints: <?php echo json_encode($total_generated_final[0], JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script> 

     

</head>

<body>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
</body>
</html>