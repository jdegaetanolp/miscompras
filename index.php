<?php
include('INC/api.php');
$Fun = new appforms;
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ComprasPRO</title>
        <link rel="shortcut icon" href="IMG/grafico-circular.png">

        <!-- css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/toastify.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
        <!-- css -->

    </head>
    <body>          


        <?php
        if($_SESSION['login'] == 1)
        {
        ?>

        <!-- Login -->

        <link rel="stylesheet" href="css/login.css">

        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first align-items-center">
                     <a href="javascript:cargarModulo('inicio');">
                    
                    <img src="IMG/grafico-circular.png" id="icon" alt="User Icon"/>
                        <p class="logo-inicio-texto">FinanPro</p>
                    </a>
                    
                </div>

                <!-- Login Form -->
                <form>
                    <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario">
                    <input type="text" id="password" class="fadeIn third" name="login" placeholder="Clave">
                    <input type="submit" class="fadeIn fourth" value="Ingresar">
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="#">¿No recordas tu clave?</a>
                </div>

            </div>
        </div>

        <?php
        }
        else
        {
        ?>

        <!-- Login -->




        <!-- Navbar -->            
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #8F00FF">

            <a class="navbar-brand d-flex" href="javascript:cargarModulo('inicio');">
                <img src="IMG/grafico-circular.png" class="logo">
                <p class="logo-texto">ComprasPro</p>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="javascript:cargarModulo('inicio');">INICIO<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:cargarModulo('productos');">PRODUCTOS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:cargarModulo('categorias');">CATEGORIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:cargarModulo('medidas');">UNIDADES</a>
                    </li>
                 
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:cargarModulo('salir');">SALIR</a>
                    </li>                        
                </ul>
            </div>

        </nav>  
        <!-- Navbar -->       

        <div class="container-fluid mt-nav">
       
            <div id="main"></div>        

        </div>        

    </body>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body"></div>     
            </div> 
        </div>
    </div>
    <!-- Fin Modal -->

    <!-- scripts -->
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/toastify-js.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
    <!-- scripts -->    

    <script>
        $( document ).ready(function() {
        
            cargarModulo('inicio');

        });
       
        function cargarModulo(modulo)
        {
            switch(modulo)
            {
                case 'inicio':
                    $('#main').load('MODULOS/listas/index.php');
                    break;

                case 'productos':
                    $('#main').load('MODULOS/productos/inc.productos.listado.php');
                    break;

                case 'categorias':
                    console.log('categorias');
                    $('#main').load('MODULOS/categorias/index.php');
                    break;                    

                case 'medidas':
                    $('#main').load('MODULOS/medidas/index.php');
                    break;         
                    
                case 'salir':
                    $('#main').load('inicio.php');
                    break;                             
            }

            $('.navbar-collapse').collapse('hide');
        }

    </script>
    
    <?php
    }
    ?>

</html>