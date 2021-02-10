<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Dado</title>
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
</head>
<body>
    <div class="container"> 

        <?php
    
            // Incluimos el archivo con el código del Objeto Dado
            include 'dado.php';
            if ((isset($_POST["min"])) && (isset($_POST["max"]))) {           
                if($_POST["max"] > $_POST["min"]) {
                    // Declaramos un nuevo objeto Dado
                    $dado = new Dado($_POST["min"], $_POST["max"]);
                   
                    // Comprobamos si se produjo error por fuera de límites.
                    if ($dado->comprobarValoresLimite($_POST["min"]) && $dado->comprobarValoresLimite($_POST["max"])) {
                       
                        // Si no hubo error, mostramos el resultado de las 12 tiradas en formato tabla.
                        echo ('<h1>Se muestran 12 tiradas</h1>');
                        echo ('<table><thead><tr><th>Nº Tirada</th><th>Valor</th></tr></thead><tbody>');
                        
                        for ($i = 1; $i<=12; $i++) {
                            echo ('<tr>');
                            echo ('<td>Tirada - ' . $i . '</td>');
                            echo ('<td>' . $dado->tirarDado() . '</td>');
                            echo ('</tr>');
                        };
                        
                        echo ('</tbody></table>');
                    } else {
                        echo('<p>Alguno de los valores esta fuera de los l&iacute;mites');
                    };
                    
                } else {
                    echo ('<p>El valor m&aacute;ximo no puede ser menor que el valor m&iacute;nimo</p>');                
                };
            } else {
                echo ('<p>No se han fijado los valores l&iacute;mite correctamente</p>');
            };
        ?>
        
        <a href="../html/index.html" class="btn-back">Volver</a>
    </div>
</body>
</html>