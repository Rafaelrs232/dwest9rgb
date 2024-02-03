<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>DWES T9 RGB</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    
    <link rel="stylesheet" href="estilot9rgb.css">    
</head>

<body>


    <header class="head p-3 w-100 d-flex justify-content-center align-items-center mb-5">
        <h1 id="title-page">DWES Tarea 9 RGB</h1>
        
    </header>
       
    <div class="d-flex flex-column justify-content-center">
        <h2 class="text-center">Oferta de productos</h2>
        <form action="" method="get" class="d-flex flex-column justify-content-center align-items-center">
            <input type="text" name="producto" id="idtienda" require placeholder="Introduzca ID entre 1 y 20" class="mt-3 w-25">
            <input type="submit" value="Buscar" name="search" class="mt-3" >
        </form>
        <a class='mt-3 text-center' href="./doc/index.html">Enlace doc phpDocumentor</a>        
    </div>
    
    <div class="result d-flex justify-content-center align-items-center mt-5">

        <?php
        /**
        * @author Rafael Gomez Benitez
        * @global mixed $_GET['search'] Contiene valor si se ha pulsado el input submit
        * @global string $_GET['producto'] Valor recogido en el input tipo text de nuestro formulario
        */

        if (isset($_GET['search']))
        {
            $regex = "/^[0-9]+$/";
            //controlamos si el valor introducido es texto o numero sin espacios
            if(preg_match($regex, $_GET['producto'])){
                //recuperamos los datos de la API                
                $respPro = @file_get_contents("https://fakestoreapi.com/products/".strtolower($_GET['producto']));
                $respPro = json_decode($respPro);
                
                //controlamos si esa respuesta tiene datos
                if($respPro)
                {
                    $img = $respPro->image;
                    echo '<div class="w-25 d-flex flex-column justify-content-center p-3  ms-5 me-5 bg-light border border-5 border-dark rounded">';
                    echo "<img src='".$img."' alt='".$respPro->title."' >";
                    echo "<h3 class='mt-3 text-center'>".$respPro->id."-".ucfirst($respPro->title)."</h3>";
                    echo "<p class='mt-3 text-center'>".$respPro->description."</p>";
                    echo "<h3 class='mt-3 text-center'> Precio: ".$respPro->price." €</h3>";
                    echo '</div>';
                } 
                else {
                    echo '<div class="alert alert-warning w-50 mt-5" role="alert">¡EL ID NO EXISTE!-Introduce un ID entre 1 y 20</div>';
                }
            }
            else{
                echo '<div class="alert alert-warning w-50 mt-5" role="alert">¡DEBES INTRODUCIR UN ID DEL PRODUCTO! - Introduce un ID entre 1 y 20</div>';
            }
        }
        ?>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="./scriptst9.js"></script>

    <footer>
        <div class="contendorfoot">
        <h3>Diseñado por: Rafael Gomez Benitez</h3>
        <h3>DNI: 31733314F</h3>
        <h3>DWES T9</h3>
        </div>
	</footer>


    
</body>
</html>