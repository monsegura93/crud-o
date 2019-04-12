<!DOCTYPE html>
<html>
    <head>
        <?php
            include_once "coneccion-bd.php";
            $coneccion = new Conneccion();
            $con = $coneccion->getConnection();

            if($con ==  false)
                echo 'Ha occurrido un error al conectarte a la Base de Datos.';
        ?>
        <title>CRUD</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
    </head>
    <body style="width:80%; margin: 50px auto;">
        <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
            <div class="uk-column-1-2">
                <h1 class="uk-heading-bullet">USUARIOS</h1>
                <a class="uk-button uk-button-secondary uk-button-large uk-align-right" href="agregar.php?agregar=">AGREGAR</a><br>
            </div>
        </div>
        <div class="uk-child-width-expand@s">
            <table class="uk-table uk-table-responsive uk-table-divider">
                <thead>
                    <tr>
                        <th class="uk-table-shrink">ID</th>
                        <th>Usuario</th>
                        <th>Password</th>
                        <th>E-mail</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ejecutar = $coneccion->getUsers();
                        $i = 0;
                        if(isset($ejecutar)){
                            while ($fila = mysqli_fetch_array($ejecutar)){
                                $id = $fila['id'];
                                $usuario = $fila['user'];
                                $password = $fila['password'];
                                $email = $fila['email'];
    
                                $i++;
                        
                        
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $usuario; ?></td>
                        <td><?php echo $password; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><a href="editar.php?editar=<?php echo $id; ?>" class="uk-icon-button uk-margin-small-right" uk-icon="pencil"></a></td>
                        <td><a href="index.php?borrar=<?php echo $id; ?>" class="uk-icon-button uk-margin-small-right" uk-icon="close"></a></td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
            
            <?php
                if(isset($_GET['editar'])){
                    include("editar.php");
                }
            ?>

            <?php
                if(isset($_GET['borrar'])){
                    $borrar_id = $_GET['borrar'];

                    $ejecutar = $coneccion->deleteUser($borrar_id);

                    if($ejecutar == true){
                        echo "<script>alert('El usuario ha sido eliminado')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Ha ocurrido un error al eliminar el registro seleccionado')</script>";
                    }
                }        
            ?>
        </div>
    </body>
</html>