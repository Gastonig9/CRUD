<?php 
include("db.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "DELETE FROM task WHERE id = $id";
    $resultado= mysqli_query($conexion, $consulta);
    if(!$resultado) {
        die("No ha sido posible realizar la consulta");
    }

    $_SESSION['message'] = "The task has been remove successfully";
    $_SESSION['message_color'] = "danger";
    header("Location: index.php");
}

?>
