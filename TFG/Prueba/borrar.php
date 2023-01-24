<?php 
    
    $contador = 0;
    for ($i=0; $i < 5; $i++) { 
        echo "<div id='pepa".$contador."'>pepito</div><br/>";
        $contador++;
    }
?>
<script type="text/javascript">
    for (let i = 0; i < 5; i++) {
        var p = document.getElementById("pepa"+i);
        console.log(p);
    }
</script>