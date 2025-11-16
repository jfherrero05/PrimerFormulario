<?php

header("Content-Type: application/json");

$response = [
    "estado" => "ok",
    "mensaje" => "Datos recibidos correctamente",
    "datos" => $_POST
];

echo json_encode($response);
