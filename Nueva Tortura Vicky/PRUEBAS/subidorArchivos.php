<?php
include '../Modelo/conexion.php';

if(!empty($_POST['submit']) && isset($_POST['submit'])){

    // Recuperamos los archivos seleccionados
    $files = $_FILES['fileToUpload'];

    $a = '';
    // // Loop a través de los archivos
    for($i=0; $i<count($files['name']); $i++) {
        // echo $files['name'][$i];
        $a = $a . '-' . $files['name'][$i];

        // $fileExtension = strtolower(pathinfo($files['name'][$i], PATHINFO_EXTENSION));
        // try {
        //     if(file_exists($files['name'][$i]))
        //         throw new Exception("El archivo ya existe.");
        //     else if ($fileExtension != "jpg") 
        //         throw new Exception("Sólo se permiten archivos JPG.");
            

        //      // Verificamos si el archivo tiene un tamaño válido
        //     if($files['size'][$i] > 0){
        //         // Ruta temporal del archivo
        //         $tempFile = $files['tmp_name'][$i];
        //         // Nombre del archivo original
        //         $fileName = $files['name'][$i];
        //         // Destino final del archivo
        //         $targetFile = "../Pruebas/" . $fileName;
        //         // Mover el archivo a la ubicación especificada
        //         move_uploaded_file($tempFile, $targetFile);

        //         echo "<br/>" .$fileName;

        //         echo "archivo subido correctamente";
        //     }

        // } catch (Exception $e) {
        //     echo "Error: " . $e->getMessage();
        // }
        
        
    }
    echo $a;

    $c = new Conexion('inmobiliaria');
    $cone = $c->conectar();
        $sqlFotos = "INSERT INTO fotos (id, id_vivienda, foto) VALUES (51, 61, '$a')";
        /*
             $stmt = $cone->prepare($sqlPublicacion);
            $stmt->bindParam(':A', $id);
            $stmt->bindParam(':B', $tipo);
            $stmt->bindParam(':C', $zona);
        
        $stmt2 = $cone->prepare($sqlFotos);
        $stmt2->bindParam(':A', "51");
        $stmt2->bindParam(':B', '61');
        $stmt2->bindParam(':C', $a);
        $stmt2->execute();
        */
        $cone->query($sqlFotos);
    
} else {
    echo "archivo vacio";
}













// if (isset($_FILES["fileToUpload"])) {
//     for ($i = 0; $i < count($_FILES['fileToUpload']['name']); $i++) {
//         $file = $_FILES['fileToUpload'];
//         $fileName = $file['name'][$i];
//         $fileTmpName = $file['tmp_name'][$i];
//         // procesar el archivo aquí
//         $fileName = $file["name"];
//         $fileTmpName = $file["tmp_name"];
//         $fileError = $file["error"];
//         $fileExt = explode(".", $fileName[$i]);
//         $fileActualExt = strtolower(end($fileExt));

//         $allowedTypes = array("jpg");

//         if (in_array($fileActualExt, $allowedTypes)) {
//             if ($fileError === 0) {
//                 if ($fileSize < 1000000) {
//                     $fileDestination = "../Pruebas/" . $fileName;
//                     move_uploaded_file($fileTmpName, $fileDestination);
//                     echo "El archivo se ha subido correctamente";
//                 } else {
//                     echo "El archivo es demasiado grande";
//                 }
//             } else {
//                 echo "Ha ocurrido un error al subir el archivo";
//             }
//         } else {
//             echo "Tipo de archivo no permitido";
//         }
//     }
    // $file = $_FILES["fileToUpload"];
    // $fileName = $file["name"];
    // $fileTmpName = $file["tmp_name"];
    // $fileError = $file["error"];

    // $fileExt = explode(".", $fileName);
    // $fileActualExt = strtolower(end($fileExt));

    // $allowedTypes = array("jpg");

    // if(in_array($fileActualExt, $allowedTypes)) {
    //   if($fileError === 0) {
    //     if($fileSize < 1000000) {
    //       $fileDestination = "../Pruebas/" . $fileName;
    //       move_uploaded_file($fileTmpName, $fileDestination);
    //       echo "El archivo se ha subido correctamente";
    //     } else {
    //       echo "El archivo es demasiado grande";
    //     }
    //   } else {
    //     echo "Ha ocurrido un error al subir el archivo";
    //   }
    // } else {
    //   echo "Tipo de archivo no permitido";
    // }
// }
