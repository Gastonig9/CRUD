<?php
include("db.php");


if (isset($_POST['save_task'])) {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $consulta= "INSERT INTO task(title, description) VALUES('$title', '$description')";
    $resultado= mysqli_query($conexion, $consulta);

    if(!$resultado) {
        die("No ha sido posible realizar la consulta");
    }

    $_SESSION['message'] = "The task has been saved successfully";
    $_SESSION['message_color'] = "success";

    header("Location: index.php");
}

?>