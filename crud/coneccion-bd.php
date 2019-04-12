<?php
/**Crear coneccion nueva */
    class Conneccion{
        //Coneccion de la base de datos
        function getConnection(){
            $resultado = ""; //Bandera para regresar el resultado de la coneccion 
                             //o falso en caso que no se realize
            $con = mysqli_connect("localhost", "root", "root", "crud") ; //Coneccion a la base de datos

            if(!isset($con)) //Preguntamos: NO EXiste coneccion ? 
                $resultado = false;  //Se asigna falso a la bandera 
            else
                $resultado = $con;    //Existe conecccion : Se asigna el valor de con a la bandera 

            return $resultado; //Regresamos resultado con false o coneccion
        }

        function getUsers(){
            $resultado = "";            
            $coneccion = $this->getConnection(); // Llama a metedo de mi misma clase

            if($coneccion != false) //Se valida si se pudo conectar a la base de datos
            {
                //Realiza la consulta
                $consulta = "SELECT * FROM users";
                $resultado = mysqli_query($coneccion, $consulta);

                if(!isset($resultado))                    
                    $resultado = false;
            }
            else
                $resultado = false;

            return $resultado;
            
        }

        function deleteUser($id){  
            $resultado = "";      
            $coneccion = $this->getConnection();

            if($coneccion != false) //Se valida si se pudo conectar a la base de datos
            {
                $borrar = "DELETE FROM users WHERE id='$id'";
                $resultado = mysqli_query($coneccion, $borrar);

                if($resultado != true)
                    $resultado =  false;                                  
            }
            else
                $resultado = false;        

                return $resultado;
        }

        function editUser($id){
            $resultado = "";      
            $coneccion = $this->getConnection();

            if($coneccion != false) //Se valida si se pudo conectar a la base de datos
            {
                $consulta = "SELECT * FROM users WHERE id='$editar_id'"; 
                $resultado = mysqli_query($coneccion, $consulta);

                if($resultado != true)
                    $resultado =  false;                                  
            }
            else
                $resultado = false;        

                return $resultado;

        
        }

        function updateUser($id){
            $resultado = "";      
            $coneccion = $this->getConnection();

            if($coneccion != false) //Se valida si se pudo conectar a la base de datos
            {
                $actualizar = "UPDATE users SET user = '$actualizar_usr', password = '$actualizar_password', email = '$actualizar_email' WHERE id = '$id'";
                $resultado = mysqli_query($coneccion, $actualizar);

                if($resultado != true)
                    $resultado =  false;                                  
            }
            else
                $resultado = false;        

                return $resultado;

        }
    }
?>