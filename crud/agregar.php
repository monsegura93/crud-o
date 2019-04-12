<!DOCTYPE html>
<html>
    <head>
        <?php
            $con = mysqli_connect("localhost", "root", "root", "crud") or die ("Error");
        ?>
        <title>CRUD | Agregar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
    </head>
    <body style="width:80%; margin: 50px auto;">

        <div class="uk-grid-large uk-child-width-expand@s" uk-grid>
            <h2 class="uk-heading-bullet">Agregar Usuario</h2>
        </div>

        <div class="uk-child-width-expand@s" uk-grid>
            <form action="agregar.php" method="POST">
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input" type="text" name="user" placeholder="Escriba usuario">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <input class="uk-input" type="password" name="passw" placeholder="Escriba password">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                        <input class="uk-input" type="text" name="email" placeholder="Escriba email">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline ">
                        <input type="submit" name="insert" value="INSERTAR DATOS" class="uk-button uk-button-secondary uk-button-large ">
                    </div>
                </div>
            </form>
            <a class="uk-button uk-button-default" href="#modal-sections" uk-toggle>Open</a>

            <div id="modal-sections" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title">Modal Title</h2>
                    </div>
                    <div class="uk-modal-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                        <button class="uk-button uk-button-primary" type="button">Save</button>
                    </div>
                </div>
            </div>

            <?php
                if(isset($_POST['insert'])){
                    $usr = $_POST['user'];
                    $pass = $_POST['passw'];
                    $email = $_POST['email'];

                    $insertar = "INSERT INTO users (user, password, email) VALUES ('$usr', '$pass', '$email')";

                    $ejecutar = mysqli_query($con, $insertar);

                    if($ejecutar){
                        header("Location: index.php");
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                }
            ?>
        </div>        
    </body>
</html>