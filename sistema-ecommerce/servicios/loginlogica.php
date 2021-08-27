<?php

include('./_conexion_sistemaEcommer.php');
$emausu=$_POST['emausu']; /* es del name emausu del login.php*/ 
$sql="SELECT * FROM USUARIO WHERE emausu='$emausu'";
$result = mysqli_query($con,$sql);

if($result){ /*si resultado es verdadero ejecutate */
    $row=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result); //esto ahce que cuente los resultados de la consulta
    if($count!=0){ /*si count es diferente de 0  es decir que existe el  email en la base de datos*/
        $pasusu=$_POST['pasusu'];
        if($row['pasusu']!=$pasusu){ // si pasusu es diretente a la contraseña que esta mandado deesde formulario
            header('Location: ../login.php?e=3'); /*error 3 contrasena invalida*/ 

        }else{ // si es correcta la contraseña
            session_start(); // inicio la sesion
            $_SESSION['codusu']=$row['codusu'];/*es el id de usario*/
            $_SESSION['emausu']=$row['emausu'];
            $_SESSION['nomusu']=$row['nomusu'];
            header('Location: ../'); //esto va a redirecionar al index por eso lo dejamos en blanco

        }

    }else{
        header('Location: ../login.php?e=2'); /* email invalido */ 

    }

}else{
    header('Location: ../login.php?e=1'); /*si hay error de eonexion 1*/
}




?>