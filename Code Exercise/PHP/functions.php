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
  
 $jsonIterator = new RecursiveIteratorIterator(
  new RecursiveArrayIterator(json_decode($input_array, TRUE)),
  RecursiveIteratorIterator::SELF_FIRST);

  $result = '[';
  foreach ($jsonIterator as $key => $val) {  
    if(is_array($val)) {
        if(strpos($key,'bird')===FALSE){
          if(!$key==0){
            $result.= '},';
          }
        $result.= '{';
        }
    } else {
        if($key == 'EnglishName'){
          $result.= '"name": "' . $val . '",';
        }
        elseif($key == 'Species'){
          $result.= '"latin": "' . $val . '",';
        }
        if($key == 'Lifespan'){
          $result.= '"lifespan": "' . $val . '"';
        }
    }
  }

  $result.= '}';
  $result.= ']';

 return $result;
}

// save the array to file named "my-output.json" 
function save_php_array_to_output_file($output_array) {
  print "Saving...\n";    
  
  return file_put_contents(dirname(__FILE__). "/data/my-output.json", $output_array);
}

########################################################################
###  Note: Final "my-output.json" file should match structure of     ###
###  "correct-output.json" - but, whitespace does NOT have to match. ###
########################################################################

########################################################################
###  Tip - Look at these built-in PHP functions:                     ###
###  json_encode, json_decode, file_put_contents, file_get_contents  ###
########################################################################

