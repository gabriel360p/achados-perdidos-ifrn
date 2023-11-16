<?php
require __DIR__ . '/guzzle_request.php';

$path = $argv[1];
switch ($path) {


        //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
        //-- PLACES --//


    case 1: //listando locais -- OK

        // Comando no terminal:
        // php cliente.php 1 

        $request->index_places();
        break;
    case 2: //salvando novo local -- OK

        // Comando no terminal:
        // php baldes.php 2 nome-local 

        if ($name = $argv[2]) {
            $request->store_places($name);
        } else {
            echo "Alerta: é preciso inserir um nome para esse local";
        }
        break;
    case 3: //acessando um local -- OK

        // Comando no terminal:
        // php baldes.php 3 id-local 

        if ($id = $argv[2]) {
            $request->view_places($id);
        } else {
            echo "Alerta: é preciso inserir o id do local";
        }
        break;
    case 4: //editando local -- OK

        // Comando no terminal:
        // php baldes.php 3 id-local nome-local 

        if ($id = $argv[2] && $name = $argv[3]) {
            $request->update_places($id, $name);
        } else {
            echo "Alerta: todos os campos precisam ser passados";
        }
        break;
    case 5: //apagando um local -- OK

        // Comando no terminal:
        // php baldes.php 5 id-local 

        if ($id = $argv[2]) {
            $request->delete_places($id);
        } else {
            echo "Alerta: é preciso inserir o id do local";
        }
        break;


        //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
        //-- CATEGORIES --//


    case 6: //listando categorias -- OK

        // Comando no terminal:
        // php cliente.php 6

        $request->index_categories();
        break;
    case 7: //salvando nova categoria -- OK

        // Comando no terminal:
        // php baldes.php 7 nome-local 

        if ($name = $argv[2]) {
            $request->store_categories($name);
        } else {
            echo "Alerta: é preciso inserir o nome da categoria";
        }
        break;
    case 8: //acessando uma categoria -- OK

        // Comando no terminal:
        // php baldes.php 8 id-local 

        if ($id = $argv[2]) {
            $request->view_categories($id);
        } else {
            echo "Alerta: é preciso inserir o id da categoria";
        }
        break;
    case 9: //editando categoria -- OK

        // Comando no terminal:
        // php baldes.php 9 id-local nome-local 

        if ($id = $argv[2] && $name = $argv[3]) {
            $request->update_categories($id, $name);
        } else {
            echo "Alerta: todos os campos precisam ser passados";
        }
        break;
    case 10: //apagando uma categoria -- OK

        // Comando no terminal:
        // php baldes.php 10 id-local 

        if ($id = $argv[2]) {
            $request->delete_categories($id);
        } else {
            echo "Alerta: é preciso inserir o id da categoria";
        }
        break;


        //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
        //-- ITENS --//


    case 11: //listando itens -- OK

        // Comando no terminal:
        // php cliente.php 11

        $request->index_itens();
        break;
    case 12: //adcionando item -- OK

        // Comando no terminal:
        // php cliente.php 12 nome-item  categoria-item  descrição-item  lugar-item
        $name = $argv[2];
        $categorie = $argv[3];
        $place = $argv[4];

        if (
            $name && $categorie && $place
        ) {
            $request->store_itens($name, $categorie, $place);
        } else {
            echo "Alerta: todos os campos precisam ser passados";
        }
        break;
    case 13: //acessar itens perdidos -- OK

        // Comando no terminal:
        // php cliente.php 13 

        $request->lost_itens();

        break;
    case 14: //deletar item perdido -- OK

        // Comando no terminal:
        // php cliente.php 14 id-item

        if ($id = $argv[2]) {
            $request->delete_itens($id);
        } else {
            echo "Alerta: é preciso inserir o id da categoria";
        }
        break;
    case 15: //acessar item perdido -- OK

        // Comando no terminal:
        // php cliente.php 15 id-item

        if ($id = $argv[2]) {
            $request->view_itens($id);
        } else {
            echo "Alerta: é preciso inserir o id da categoria";
        }
        break;
    case 16: //devolver item perdido -- OK

        // Comando no terminal:
        // php cliente.php 16 id-item

        if ($id = $argv[2]) {
            $request->refound_itens($id);
        } else {
            echo "Alerta: é preciso inserir o id da categoria";
        }
        break;

    default:
        echo "Opção '{$path}' não encontrada";
}
