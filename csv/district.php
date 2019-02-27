<html>
    <head>
        <title>DISTRICT BOX</title>

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

</head>

</html>

<?php
print_r($_SESSION);
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
                $sum = 0 ;
                $sum_fi = array_sum($data);
                $sum_fi_xi = 0;
                $class_avg = 10;

                for ( $i = 0 ; $i<sizeof($data) ; ++$i )
                {
                if ( $i<=2 )
                {
                        $sum_fi_xi += ($data[$i]) * $class_avg;
                        $class_avg +=10 ;
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
        $dist1_array = $csv1->find_distinct_dist($daa1,1);

        $dist2_array = [];
        $dist2_array = $csv2->find_distinct_dist($daa2,1);

       print_r ( $dist2_array );

        $mean_depth_dist1 =[];
        $mean_depth_dist2 =[];

        $row = ' ';

        $header =   '       <div class="limiter">
        <div class="container-table100">
                <div class="wrap-table100">
                        <div class="table100 ver1 m-b-110">
                                <div class="table100-head">
                                        <table>
                                                <thead>
                                                        <tr class="row100 head">
                                                                <th class="cell100 column1">DEPTH</th>
                                                                <th class="cell100 column2">DISTRICT</th>
                                                                <th class="cell100 column3">SLOPE</th>
                                                                <th class="cell100 column4">Y INTERCEPT</th>
                                                                <th class="cell100 column5">ESTIMATED</th>
                                                                <th class="cell100 column6">INCERESE/DECREASE</th>
                                                        </tr>
                                                </thead>
                                        </table>
                                </div>
                                <div class="table100-body js-pscroll">
                                                        <table>
                                                                <tbody>
        ';
        for ( $i=0 ; $i<sizeof($dist2_array) ; ++$i)
        {
                $data1 = [];        
                $data1 = $csv1->get_location_a($daa1,'goa',$dist1_array[$i],1);   
                
                $data2=[];
                $data2 = $csv1->get_location_a($daa2,'goa',$dist2_array[$i],1);  

                
                
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

                switch($j)
                {
                        case 0: $depth =  "0-20";
                                break;
                        case 1: $depth =" 20-40";
                                break;
                        case 2: $depth = " 40-60";
                                break;
                        case 3 : $depth = "60-70";
                                break;
                        case 4:$depth =" 70-90";
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

                /*
                echo "<br> FOR THE DISTRICT " . $dist2_array[$i];
                echo "<br> Slope " . $slope ;
                echo "<br> Y Intercept" . $y_c;
                echo "<br> Estimated in 2019:" . round($estim) ;
                echo "<br> INCRESE/DECRESE " . ($data2[$j]-$data1[$j]);

                echo "<br><<<<>>>><br>";
                }     */

                $row = $row.'<tr class="row100 body">
                <td class="cell100 column1">'.$depth.'</td>
                <td class="cell100 column2">'.$dist2_array[$i].'</</td>
                <td class="cell100 column3">'.$slope.'</td>
                <td class="cell100 column4">'.$y_c.'</</td>
                <td class="cell100 column5">'.round($estim).'</td>
                <td class="cell100 column6">'.($data2[$j]-$data1[$j]).'</td>
                </tr>' ;
        
                }
        

                



                

                }

                $end = '</tbody>
                </table>
                </div>
                </div>
                </div>
                </div>  
                </div>
                </div>';

                echo $header.$row.$end;
    }



?>

