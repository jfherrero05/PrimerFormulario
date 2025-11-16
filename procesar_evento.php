<?php
// Validaciones básicas
$errores = [];

if (!isset($_POST["terminos"])) {
    $errores[] = "Debes aceptar los términos y condiciones.";
}

if ($_POST["password"] !== $_POST["password2"]) {
    $errores[] = "Las contraseñas no coinciden.";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos recibidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
<div class="container mt-5">

<h2 class="mb-4">Resultado del formulario</h2>

<?php if (!empty($errores)): ?>
    <div class="alert alert-danger">
        <h4>Errores encontrados:</h4>
        <ul>
            <?php foreach ($errores as $e) echo "<li>$e</li>"; ?>
        </ul>
    </div>
<?php else: ?>

    <div class="card p-4">
        <h4>Información Personal</h4>
        <p><strong>Nombre:</strong> <?= $_POST["nombre"] ?></p>
        <p><strong>Correo:</strong> <?= $_POST["correo"] ?></p>
        <p><strong>Teléfono:</strong> <?= $_POST["telefono"] ?></p>
        <p><strong>Nacimiento:</strong> <?= $_POST["nacimiento"] ?></p>
        <p><strong>Género:</strong> <?= $_POST["genero"] ?></p>

        <hr>

        <h4>Evento</h4>
        <p><strong>Fecha:</strong> <?= $_POST["fecha_evento"] ?></p>
        <p><strong>Entrada:</strong> <?= $_POST["entrada"] ?></p>
        <p><strong>Comida:</strong> <?= isset($_POST["comida"]) ? implode(", ", $_POST["comida"]) : "Ninguna" ?></p>

        <hr>

        <h4>Acceso</h4>
        <p><strong>Usuario:</strong> <?= $_POST["usuario"] ?></p>

        <hr>

        <h4>Preferencias</h4>
        <p><strong>Notificaciones:</strong>
            <?= isset($_POST["notificaciones"]) ? "Sí" : "No" ?>
        </p>

        <hr>

        <h4>Encuesta</h4>
        <p><strong>Calificación:</strong> <?= $_POST["calificacion"] ?></p>
        <p><strong>Comentarios:</strong> <?= nl2br($_POST["comentarios"]) ?></p>

        <hr>

        <h4>Archivo subido:</h4>
        <?php if ($_FILES["archivo"]["name"] != ""): ?>
            <p><?= $_FILES["archivo"]["name"] ?></p>
        <?php else: ?>
            <p>No se subió ningún archivo.</p>
        <?php endif; ?>
    </div>

<?php endif; ?>

</div>
</body>
</html>
