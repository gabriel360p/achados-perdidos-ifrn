<?php

//Funciona

require __DIR__ . '/guzzle_request.php';

$path = $argv[1];

switch ($path) {
    case 1: //listando locais -- OK

        // Comando no terminal:
        // php cliente.php 1 

        $request->index_places();

        break;
    case 2: //salvando novo local -- OK

        // Comando no terminal:
        // php baldes.php 2 nome-local 

        $name = $argv[2];
        $request->store_places($name);

        break;
    case 3: //acessando um local -- OK

        // Comando no terminal:
        // php baldes.php 3 id-local 

        $id = $argv[2];
        $request->view_place($id);

        break;
    case 4: //editando local -- OK

        // Comando no terminal:
        // php baldes.php 3 id-local nome-local 

        $id = $argv[2];
        $name = $argv[3];
        $request->update_place($id, $name);

        break;
    case 5: //apagando um local -- OK

        // Comando no terminal:
        // php baldes.php 5 id-local 

        $id = $argv[2];
        $request->delete_place($id);

        break;

    default:

        echo "Opção encontrada";
}
