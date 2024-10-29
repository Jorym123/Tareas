<?php
    require_once __DIR__ .'/../config/database.php';

    function obtenerTareas() {
        global $tasksCollection;
        return $tasksCollection->find();
    }

    function formatDate($dateString) {
        $dateTime = new DateTime($dateString);
        return $dateTime->format('Y-m-d');
    }
    function agregarTarea($empleado, $seccion, $fecharegistrada) {
        global $tasksCollection;
        $newTask = [
            'empleado' => $empleado,
            'seccion' => $seccion,
            'fecharegistrada' => $fecharegistrada
        ];
        return $tasksCollection->insertOne($newTask);
    }
    function obtenerTareaPorId($id) {
        global $tasksCollection;
        return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }
    function actualizarTarea($id, $empleado, $seccion, $fecharegistrada,) {
        global $tasksCollection;
        $update = [
            '$set' => [
                'empleado' => $empleado,
                'seccion' => $seccion,
                'fecharegistrada' => $fecharegistrada,
            ]
        ];
        return $tasksCollection->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)], $update);
    }
    
    
?>