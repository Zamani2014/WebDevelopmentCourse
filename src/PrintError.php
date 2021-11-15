<?php 

function PrintError(Exception $ex){
    $code = $ex->getCode();
    $message = $ex->getMessage();
    $file = $ex->getFile();
    $line = $ex->getLine();
    return $error = "<p style='background-color:#fff; font-size:16px'>Exception thrown in $file on line $line: [Code $code]
    $message</p>";
}


?>