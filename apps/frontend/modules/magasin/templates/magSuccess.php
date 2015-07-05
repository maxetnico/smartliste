<?php


if (is_ajax()) {
  if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
    $action = $_POST["action"];
    switch($action) { //Switch case for value of action
      case "test": test_function($_POST["mag"]); break;
      case "test2": test2_function($_POST["mag2"]); break;
      case "test3": test3_function($_POST["mag3"]); break;
    }
  }
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function test_function($aaa){
    //$txt="ok";
    $txt=$aaa["a"];
    /*foreach ($aaa as $magasin) {
        $txt= $magasin->getNom();
    }*/
    echo $txt;
}

function test2_function($aaa){
    //$txt="ok";
    $txt='';
    foreach ($aaa as $magasin) {
        $txt.= $magasin;
    }
    echo $txt;
}

function test3_function($aaa){
    //$txt="ok";
    $txt='';
    foreach ($aaa as $magasin) {
        $txt.= $magasin->getNom();
    }
    echo $txt;
}


?>