<?php
include("connection.php");

if($_POST['type']==""){
$cont="SELECT * FROM countries";
$cont_query_run=mysqli_query($conn,$cont);

$str="";
//if($cont_num_rows=mysqli_num_rows($cont_query_run)>0){
    while($cont_fetch_assoc=mysqli_fetch_assoc($cont_query_run)){
       $str .="<option value='{$cont_fetch_assoc['id']}'>{$cont_fetch_assoc['countries_name']}</option>";
    }

//}
}else if($_POST['type']=="stateData"){
    $sql_state="SELECT * FROM states WHERE country_id= {$_POST['id']}";
    $state_query=mysqli_query($conn,$sql_state);

    $str = "";
   // if($state_num_rows=mysqli_num_rows($state_query)>0){
        while($state_fetch_assoc=mysqli_fetch_assoc($state_query)){
            $str .="<option value='{$state_fetch_assoc['id']}'>{$state_fetch_assoc['name']}</option>";
        }
   // }

}else if($_POST['type']== "cityData"){
    
    $state_id = $_POST['state_id'];
    //print_r($state_id);
    $sql_city="SELECT * FROM cities WHERE state_id={$state_id}";
    $city_query=mysqli_query($conn,$sql_city);
    
    $str= "";
    while($city_fetch_assoc=mysqli_fetch_assoc($city_query)){
        $str .="<option value='{$city_fetch_assoc['id']}'>{$city_fetch_assoc['name']}</option>";
    }
}
echo $str;
?>