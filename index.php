<?php
    require_once __DIR__ .'/includes/functions.php';
    $tareas = obtenerTareas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas de Cursos</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Tareas de Cursos</h1>

        <?php if (isset($mensaje)): ?>
            <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <a href="agregartarea.php" class="button">Registrarse</a>

        <h2>Lista de Tareas</h2>
        <table border =1>
            <tr>
                <th>Empleado</th>
                <th>seccion</th>
                <th>Fecha de registro</th>
                <th>registro</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($tareas as $tarea): ?>
            <tr>
                <td><?php echo htmlspecialchars($tarea['empleado']); ?></td>
                <td><?php echo htmlspecialchars($tarea['seccion']); ?></td>
                <td><?php echo formatDate($tarea['fecharegistrada']); ?></td>
                <td><?php if (isset($tarea['registro'])) { ?>
                 <?php echo $tarea['registro'] ? 'Sí' : 'No'; ?>
                   <?php } else { ?>
                 No definida
                  <?php } ?></td>
                <td class="actions">
                    <a href="editartarea.php?id=<?php echo $tarea['_id']; ?>" class="button">Editar</a>
                    <a href="index.php?accion=eliminar&id=<?php echo $tarea['_id']; ?>" class="button" onclick="return confirm('¿Seguro que quieres eliminar el registro?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

