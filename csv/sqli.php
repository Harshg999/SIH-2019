<?php


class csv extends mysqli
{
    public function __construct()
    {
        parent::__construct("localhost","root","","test");

        if($this->connect_error)
        {
            echo "failed to connect";
        }
    }

    public function import($file)
    {
        $file = fopen($file,'r');


        while( $row = fgetcsv($file))
        {
            /*
            echo "<pre>";
            print_r ($row);
            echo "</pre>" ;
            */


            $value = implode ("','" ,$row);
            echo $value . '<br>';
        }
        echo "--------------------------" . ' <br>';
    }


    public function get_location_a($file,$data,$dist,$i)
    {
        $file = fopen($file,'r');

        $sum = array(0,0,0,0,0,0,0,0,0);

        while( $row = fgetcsv($file))
        {

            
            if( (strtolower($row[0]) === strtolower($data) ) &&  (strtolower($row[$i] ) ===  strtolower($dist) ) )
            {
                $sum[0]+=$row[4];
                $sum[1]+=$row[5];
                $sum[2]+=$row[6];
                $sum[3]+=$row[7];
                $sum[4]+=$row[8];
                $sum[5]+=$row[9];
                $sum[6]+=$row[10];
                $sum[7]+=$row[11];
                $sum[8]+=$row[12];
            }
        }
        return $sum;
    }

    public function find_distinct_dist($file,$i)
    {
        $file = fopen($file,'r');

        $dist_array = [];


        while ($row = fgetcsv($file))
        {
            $row[1] = strtolower( $row[1]);
 

            if ( in_array( strtolower($row[$i])  ,($dist_array)    ) ) // checks whether the district is present in the list
            {
                continue;
            }

            else
            {
            $dist_array[]= strtolower($row[$i]);
            }

        }


        array_shift($dist_array);
        return $dist_array;
    }

   

}




?>