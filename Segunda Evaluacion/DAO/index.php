<?php
    require_once 'Calculator.php';

    session_start();
    
    $calculator = new Calculator();
    $result = $calculator->add(2, 3);
    $result = $calculator->subtract(5, 1);
    $operations = $calculator->getOperations();
    
    foreach ($operations as $operation) {
      echo $operation . "<br>";
    }

    echo "<br/>fin<br/>";
?>