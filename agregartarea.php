<?php
    require_once __DIR__.'/includes/functions.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = agregarTarea($_POST['empleado'], $_POST['seccion'], $_POST['fecharegistrada']);
        if ($id) {
            header("Location: index.php?mensaje=Tarea creada con éxito");
            exit;
        } else {
            $error = "No se pudo crear la tarea.";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Tarea</title>
</head>
<body>
<?php if (isset($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

    <h1>Agregar Nueva Tarea</h1>
    <form method="POST">
        <label>Empleado:</label><br>
        <input type="text" name="empleado"><br>
        <label>seccion:</label><br>
        <input type="text" name="seccion"><br>
        <label>Fecha de entrega:</label><br>
        <input type="date" name="fecharegistrada"><br>
        <input type="submit" value="Crear registro">
    </form><br><br>
    <a href="index.php">Volver a la lista de tareas</a>
</body>
</html>