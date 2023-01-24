<?php
     echo "<form method='post' action=''>

       <input type='radio' name='trabajo_id' value='667'>
          <label for='667'>667</label><br>
        <input type='radio' name='trabajo_id' value='668'>
          <label for='668'>668</label><br>
        <input type='radio' name='trabajo_id' value='669'>
          <label for='669'>669</label><br>
        <input type='radio' name='trabajo_id' value='670'>
          <label for='670'>670</label><br>
        <input type='radio' name='trabajo_id' value='671'>
          <label for='671'>671</label><br>
        <input type='radio' name='trabajo_id' value='672'>
          <label for='672'>672</label><br>



        <input type='submit' value='Submit'>



     <fieldset>
         <legend>Completa los campos:</legend>
         <input type='text' name='empleado' placeholder='Empleado_ID' >
         <input type='text' name='apellido' placeholder='Apellido' >
         <input type='text' name='nombre' placeholder='Nombre' >
         <input type='text' name='inicial' placeholder='Inicial Segundo Apellido' >
         <select name='trb'>
            <option value='667'>667</option>
            <option value='668'>668</option>
            <option value='669'>669</option>
            <option value='670'>670</option>
            <option value='671'>671</option>
            <option value='672'>672</option>
        </select>
         <input type='text' name='jefe' placeholder='Jefe ID' >
         <input type='date' name='fechaContrato' placeholder='Fecha Contrato' >
         <input type='text' name='salario' placeholder='Salario' >
         <input type='text' name='comision' placeholder='Comision' >
         <select name='depa'>
            <option value='10'>10</option>
            <option value='12'>12</option>
            <option value='13'>13</option>
            <option value='14'>14</option>
            <option value='20'>20</option>
            <option value='23'>23</option>
            <option value='24'>24</option>
            <option value='30'>30</option>
            <option value='34'>34</option>
            <option value='40'>40</option>
            <option value='43'>43</option>
        </select>
         <p><input type='submit' name='botonEnviarEmpleado' value='Enviar datos'></p>
     </fieldset>
 </form>";


 echo $_POST['trb'];
 echo $_POST['depa'];

?>