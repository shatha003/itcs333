<?php

$url = "https://data.gov.bh/explore/dataset/01-statistics-of-students-nationalities_updated/table/?disjunctive.year&disjunctive.semester&disjunctive.the_programs&sort=number_of_students"


$respose = file_get_contents($url);
echo $respose

print_r($respose)


$data = json_decode($respose, true)



if(!data || !sset($data["result"])){
    die('error fetching the data from the api ')
}
 $result= $data["results"]:
 print_r($result)
 ?>
