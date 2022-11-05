<?php require_once("cnx.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Administracion Tareas</title>
    <link rel="stylesheet" href="../css/ppl.css"><!-- hasta aca carga las librerias -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../icon/style.css">
</head>

<body>
    <div class="welcome">
        <h1>Bienvenido</h1>
        <a href="act_datos/tarea.php"><label class="lnr lnr-pencil"></label>Tareas</a>
        <a href="act_datos/tarea_ext.php"><label class="lnr lnr-pencil"></label>Entregas</a>
        <a href="act_datos/producto.php"><label class="lnr lnr-pencil"></label>Productos</a>
        <a href="act_datos/cliente_externo.php"><label class="lnr lnr-pencil"></label>Benef. externos</a>
        <a href="act_datos/cliente_interno.php"><label class="lnr lnr-pencil"></label>Benef. interno</a>
        <a href="act_datos/reporte.php"><label class="lnr lnr-pencil"></label>Reportes de tareas</a>
        <a href="act_datos/reporte_entregas.php"><label class="lnr lnr-pencil"></label>Reportes de entregas</a>
        <a href="act_datos/usuario.php"><label class="lnr lnr-pencil"></label>Usuarios</a>
        <a href="cerrar.php"><label class="lnr lnr-exit"></label>Cerrar sesión</a>
    </div>
</body>

</html>