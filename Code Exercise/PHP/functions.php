<?php

########################
###  EDIT THIS FILE  ###
########################

// read from "input.json" and return as an array
function load_input_file_into_php_array() {
  print "Loading...\n";  
  return file_get_contents(dirname(__FILE__) . "/data/input.json");

}
// convert array to match structure in "correct-output.json"
function convert_array_to_output_format($input_array) {
  print "Converting...\n";
  
$array = json_decode($input_array, TRUE); 
$result = array();
$index = 0;
 
foreach ($array as $x => $y)
{
  foreach ($y as $o => $p)
  {       
    foreach ($p as $inside => $info)
    {  
      foreach($info as $a =>$b)
      {
        if($a == 'EnglishName'){
          $info['name'] = $info[$a];          
           unset($info[$a]);
        }
        elseif($a == 'Species'){
          $info['latin'] = $info[$a];
          unset($info[$a]);
        }
        if($a == 'Lifespan'){
          $info['lifespan'] = $info[$a];          
           unset($info[$a]);          
        }
  
      }
      $result[$index] = $info;
     
      $index++; 
    }
  }
}

 return $result;
}

// save the array to file named "my-output.json" 
function save_php_array_to_output_file($output_array) {
  print "Saving...\n";    
  
  return file_put_contents(dirname(__FILE__). "/data/my-output.json", json_encode($output_array));
}

########################################################################
###  Note: Final "my-output.json" file should match structure of     ###
###  "correct-output.json" - but, whitespace does NOT have to match. ###
########################################################################

########################################################################
###  Tip - Look at these built-in PHP functions:                     ###
###  json_encode, json_decode, file_put_contents, file_get_contents  ###
########################################################################

