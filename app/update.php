<?php
require_once __DIR__ . "../vendor/autoload.php";

$client = new MongoDB\Client(
    'mongodb+srv://admin:admin@cluster0-qsxwb.azure.mongodb.net/inventario?retryWrites=true&w=majority');

// $db = $client->inventario;

// CREATE
// $insertManyResult = $db->productos->insertMany([
//     [
//         "nombre": "silla",
//         "descripción": "Silla regular para espera",
//         "categoría": "oficina",
//         "proveedor": "Office Depot",
//         "cantidad": 20,
//         "marca": "Office Depot"
//     ],
//     [
//         "nombre": "mesa",
//         "descripción": "Mesa para oficinas ejecutivas",
//         "categoría": "oficina",
//         "proveedor": "Office Depot",
//         "cantidad": 3,
//         "marca": "Office Depot"
//     ],
// ]);

// READ
// $readResults = $db->productos->find();

// UPDATE
// $updateResult = $db->inventory->updateOne(
//     ['nombre' => 'silla'],
//     [
//         '$set' => ['cantidad' => 19],
//     ]
// );

// DELETE
// $deleteResult = $db->inventory->deleteOne(['cantidad' => {$eq: 0}]);
?>