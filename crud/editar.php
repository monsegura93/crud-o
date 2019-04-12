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
        <title>CRUD | Editar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="width:80%; margin: 50px auto;">
        <div class="uk-grid-large uk-child-width-expand@s" uk-grid>
            <h2 class="uk-heading-bullet">Editar Usuario</h2>
        </div>
        <?php
            $usuario = "";
            $pass = "";
            $email = "";
            $editar_id = "";
            $actualizar = "";
            $ejecutar = "";
            //valido que exista la editar exista por metodo get
            if(isset($_GET['editar'])){

                $editar_id = $_GET['editar']; //obtengo la variable enviada por get

                $ejecutar = $coneccion->editUser($editar_id);
                

                $fila = mysqli_fetch_array($ejecutar);

                $usuario = $fila['user'];
                $pass = $fila['password'];
                $email = $fila['email'];
            }
        ?>

        <br>

        <form method="POST" action="editar.php" id="MiFormulario">
            <input type="hidden" name="id" value="<?php echo $editar_id; ?>"><br>
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input class="uk-input" type="text" name="user" value="<?php echo $usuario; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input" type="text" name="passw" value="<?php echo $pass; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    <input class="uk-input" type="text" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-inline">
                    <input type="submit" name="actualizar" id="actualizar" value="ACTUALIZAR DATOS" class="uk-button uk-button-secondary actualizar">
                </div>
            </div>
        </form>

        <?php
            if(isset($_POST['actualizar'])){
                $id = $_POST['id'];
                $actualizar_usr = $_POST['user'];
                $actualizar_password = $_POST['passw'];
                $actualizar_email = $_POST['email'];

                $ejecutar = $coneccion->updateUser($id);
                $ejecutar = $coneccion->updateUser($actualizar_usr);
                $ejecutar = $coneccion->updateUser($actualizar_password);
                $ejecutar = $coneccion->updateUser($actualizar_emai);
                

                if($ejecutar == true){
                    header("Location: index.php");
                }
                else
                {
                    echo "<script>alert('Ha ocurrido un error al actualizar el registro seleccionado')</script>";
                }
            }
        ?>
    </body>
</html>