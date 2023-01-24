<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <select name="cars" >
            <option value="$_POST['cars']">667-672
            <option value="667">667</option>
            <option value="668">668</option>
            <option value="669">669</option>
            <option value="670">670</option>
            <option value="671">671</option>
            <option value="672">672</option>
        </select>
        <input type="submit" name="boton" value="ok">
    </form>
</body>
</html>

<?php 
  //$valorRanda = (empty($_POST['rnd'])) ? rand($limInferior,$limSuperior) : $_POST['rnd'];
    //empty(($_POST['cars'])) ? $_POST['boton'] : $_POST['cars'];
    echo $_POST['cars'];
?>