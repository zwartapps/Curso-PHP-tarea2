
<?php
/*Arrancamos una session para poder recoger los valores del formulario*/
session_name('Tarea2');
session_start();

$x = "";
$y = "";
$fraseX = "";
$fraseY = "";
$producto = "";


if(isset($_POST['X'])){
    $x = $_POST['X'];
}

if(isset($_POST['Y'])){
    $y = $_POST['Y'];
}

//Prodcuto de X * Y solamente si son numeros
function producto($x, $y){
    if(is_numeric($x) && is_numeric($y) ) {
        $producto = $x*$y;
        echo "El producto de X * Y = " . $producto;
    } else echo "No se puede multiplicar valores no numericos";
}


/*Funcion para calcular la suma de 1 a X solamente si son numeros*/
function suma($x){
    if(is_numeric($x)){
        $i = 1;
        $suma = 0;
        while($i <= $x){    
            $suma = $i + $suma;
            $i + $suma;
            $i++;       
        }
        echo "Suma de 1 al X = " . $suma . "<br>";
    } else echo "No se puede sumar valores no numericos <br>";
}




function resultado(){
    
}



/*Comprobamos que son numeros (podriamos usar en el formulario input type number)*/
if(!is_numeric($x)) {
    $fraseX = $x. " no es un valor numerico!";
}   else $fraseX = "Valor de X = " . $x;


if(!is_numeric($y)) {
    $fraseY = $y. " no es un valor numerico!";
} else $fraseY = "Valor de Y = " . $y;

//Cuando se pulsa el boton para resetear destruimos session y borramos los valores
if (isset($_POST['reset'])) {
    unset($x);
    unset($y);
    unset($_POST['X']);
    unset($_POST['Y']);
    session_destroy();
    header('index.php');
}

?>


<!DOCTYPE html>

<html lang="es">
<head>
<!--Inlcuimos el fichero header.php que tiene cargado Bootstrap y demas-->
<?php include("lib/header.php") ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tarea 2</title>
</head>
<body>
<div class="container">
<h1>Tarea 2</h1>
<h3>Introduzca 2 numeros</h3>

<!--Queremos quedar en la misma pagina-->
<form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<div class="form-group">
<label for="X">Valor X</label>
<input id="X" type="text" name="X" size="50">
</div>
<div class="form-group">
<label for="Y">Valor Y</label>
<input id="Y" type="text" name="Y" size="50">
</div>
<button class="btn btn-primary" type="submit" name="calcular">Calcular</button>
<button class="btn btn-danger" type="submit" name="reset">Resetear</button>
</form>


<?php

if(isset($_POST['calcular'])){
    echo $fraseX . "<br>";
    echo $fraseY . "<br>";
    suma($x);
    producto($x, $y);
    
    
}




?>

</div>


</body>
</html>