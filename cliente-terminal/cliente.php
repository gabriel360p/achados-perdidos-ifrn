<?php
require __DIR__ . '/guzzle_request.php';

$ativoMenuPrincipal = true;

while ($ativoMenuPrincipal) {
    echo "\n";
    echo "=========================================================";
    echo "\n";
    echo "Achados e Perdidos";
    echo "\n";
    echo "=========================================================";
    echo "\n";
    echo "(1) Categorias";
    echo "\n";
    echo "(2) Locais";
    echo "\n";
    echo "(3) Itens";
    echo "\n";
    echo "(0) Sair";
    echo "\n";
    $path = readline();

    switch ($path) {
            //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
        case 1:
            //-- CATEGORIAS --//
            $ativoMenuCategorias = true;

            while ($ativoMenuCategorias) {
                echo "\n";
                echo "=========================================================";
                echo "\n";
                echo "Seção Categorias";
                echo "\n";
                echo "=========================================================";
                echo "\n";
                echo "(1) Todas as Categorias";
                echo "\n";
                echo "(2) Nova Categoria ";
                echo "\n";
                echo "(3) Vizualizar Categoria ";
                echo "\n";
                echo "(4) Editar Categoria ";
                echo "\n";
                echo "(5) Apagar Categoria ";
                echo "\n";
                echo "(0) Sair da seção categorias ";
                echo "\n";
                $pathCategories = readline();
                switch ($pathCategories) {
                    case 1: //listando categorias -- OK
                        $request->index_categories();
                        break;

                    case 2: //salvando nova categoria -- OK
                        echo "Categorias já registradas:";
                        echo "\n";
                        $request->categories_names();
                        echo "\n";
                        echo "Insira o nome da categoria";
                        echo "\n";
                        if ($name = readline()) {
                            $request->store_categories($name);
                        } else {
                            echo "Alerta: é preciso inserir o nome da categoria (não pode colocar um nome existente já cadastrado)";
                        }
                        echo "\n";
                        break;

                    case 3: //acessando uma categoria -- OK
                        echo "Insira o id da categoria";
                        echo "\n";
                        if ($id = readline()) {
                            $request->view_categories($id);
                        } else {
                            echo "Alerta: é preciso inserir o id da categoria";
                        }
                        echo "\n";
                        break;
                    case 4: //editando categoria -- OK
                        echo "Categorias já registradas:";
                        echo "\n";
                        $request->categories_names();
                        echo "\n";
                        echo "Insira o id da categoria e depois o novo nome (não pode colocar um nome existente já cadastrado)";
                        echo "\n";
                        if ($id = readline() && $name = readline()) {
                            $request->update_categories($id, $name);
                        } else {
                            echo "Alerta: todos os campos precisam ser passados";
                        }
                        echo "\n";
                        break;
                    case 5: //apagando uma categoria -- OK
                        $request->categories_names();
                        echo "\n";
                        echo "Insira o id da categoria";
                        echo "\n";
                        if ($id = readline()) {
                            $request->delete_categories($id);
                        } else {
                            echo "Alerta: é preciso inserir o id da categoria";
                        }
                        break;
                    case 0:
                        $ativoMenuCategorias = false;
                        break;
                    default:
                        echo "Opção {$pathCategories} inválida";
                        echo "\n";
                } //switch categorias
            } //while seção categorias
            break; //seção categorias


            //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
        case 2:
            //-- LOCAIS --//
            $ativoMenuLocais = true;

            while ($ativoMenuLocais) {
                echo "\n";
                echo "=========================================================";
                echo "\n";
                echo "Seção Locais";
                echo "\n";
                echo "=========================================================";
                echo "\n";
                echo "(1) Todas os Locais";
                echo "\n";
                echo "(2) Novo Local ";
                echo "\n";
                echo "(3) Vizualizar Local ";
                echo "\n";
                echo "(4) Editar Local";
                echo "\n";
                echo "(5) Apagar Local ";
                echo "\n";
                echo "(0) Sair da seção Locais ";
                echo "\n";
                $pathPlaces = readline();
                switch ($pathPlaces) {
                    case 1: //listando locais -- OK
                        $request->index_places();
                        break;
                    case 2: //salvando novo local -- OK
                        echo "Locais já registrados:";
                        echo "\n";
                        $request->places_names();
                        echo "\n";
                        echo "Insira o nome do local (não pode colocar um nome já cadastrado)";
                        echo "\n";
                        if ($name = readline()) {
                            $request->store_places($name);
                        } else {
                            echo "Alerta: é preciso inserir o nome do local";
                        }
                        echo "\n";
                        break;
                    case 3: //acessando um local -- OK
                        echo "Insira o id do local";
                        echo "\n";
                        if ($id = readline()) {
                            $request->view_places($id);
                        } else {
                            echo "Alerta: é preciso inserir o id do local";
                        }
                        echo "\n";
                        break;
                    case 4: //editando local -- OK
                        echo "Locais já registrados:";
                        echo "\n";
                        $request->places_names();
                        echo "\n";
                        echo "Insira o id do local e depois o novo nome (não pode colocar um nome já cadastrado)";
                        echo "\n";
                        if ($id = readline() && $name = readline()) {
                            $request->update_places($id, $name);
                        } else {
                            echo "Alerta: todos os campos precisam ser passados";
                        }
                        echo "\n";
                        break;
                    case 5: //apagando um local -- OK
                        $request->places_names();
                        echo "\n";
                        echo "Insira o id do local";
                        echo "\n";
                        if ($id = readline()) {
                            $request->delete_places($id);
                        } else {
                            echo "Alerta: é preciso inserir o id do local";
                        }
                        break;
                    case 0:
                        $ativoMenuLocais = false;
                        break;
                    default:
                        echo "Opção {$pathCategories} inválida";
                        echo "\n";
                } //switch locais
            } //while seção locais
            break; //seção locais







        case 0:
            //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
            //-- SAIR --//
            $ativoMenuPrincipal = false;
            break;
    }





    // switch ($path) {


    //         //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //         //-- PLACES --//


    //     case 1: //listando locais -- OK

    //         // Comando no terminal:
    //         // php cliente.php 1 

    //         $request->index_places();
    //         break;
    //     case 2: //salvando novo local -- OK

    //         // Comando no terminal:
    //         // php baldes.php 2 nome-local 

    //         if ($name = $argv[2]) {
    //             $request->store_places($name);
    //         } else {
    //             echo "Alerta: é preciso inserir um nome para esse local";
    //         }
    //         break;
    //     case 3: //acessando um local -- OK

    //         // Comando no terminal:
    //         // php baldes.php 3 id-local 

    //         if ($id = $argv[2]) {
    //             $request->view_places($id);
    //         } else {
    //             echo "Alerta: é preciso inserir o id do local";
    //         }
    //         break;
    //     case 4: //editando local -- OK

    //         // Comando no terminal:
    //         // php baldes.php 3 id-local nome-local 

    //         if ($id = $argv[2] && $name = $argv[3]) {
    //             $request->update_places($id, $name);
    //         } else {
    //             echo "Alerta: todos os campos precisam ser passados";
    //         }
    //         break;
    //     case 5: //apagando um local -- OK

    //         // Comando no terminal:
    //         // php baldes.php 5 id-local 

    //         if ($id = $argv[2]) {
    //             $request->delete_places($id);
    //         } else {
    //             echo "Alerta: é preciso inserir o id do local";
    //         }
    //         break;


    //         //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //         //-- CATEGORIES --//


    //     case 6: //listando categorias -- OK

    //         // Comando no terminal:
    //         // php cliente.php 6

    //         $request->index_categories();
    //         break;
    //     case 7: //salvando nova categoria -- OK

    //         // Comando no terminal:
    //         // php baldes.php 7 nome-local 

    //         if ($name = $argv[2]) {
    //             $request->store_categories($name);
    //         } else {
    //             echo "Alerta: é preciso inserir o nome da categoria";
    //         }
    //         break;
    //     case 8: //acessando uma categoria -- OK

    //         // Comando no terminal:
    //         // php baldes.php 8 id-local 

    //         if ($id = $argv[2]) {
    //             $request->view_categories($id);
    //         } else {
    //             echo "Alerta: é preciso inserir o id da categoria";
    //         }
    //         break;
    //     case 9: //editando categoria -- OK

    //         // Comando no terminal:
    //         // php baldes.php 9 id-local nome-local 

    //         if ($id = $argv[2] && $name = $argv[3]) {
    //             $request->update_categories($id, $name);
    //         } else {
    //             echo "Alerta: todos os campos precisam ser passados";
    //         }
    //         break;
    //     case 10: //apagando uma categoria -- OK

    //         // Comando no terminal:
    //         // php baldes.php 10 id-local 

    //         if ($id = $argv[2]) {
    //             $request->delete_categories($id);
    //         } else {
    //             echo "Alerta: é preciso inserir o id da categoria";
    //         }
    //         break;


    //         //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //         //-- ITENS --//


    //     case 11: //listando itens -- OK

    //         // Comando no terminal:
    //         // php cliente.php 11

    //         $request->index_itens();
    //         break;
    //     case 12: //adcionando item -- OK

    //         // Comando no terminal:
    //         // php cliente.php 12 nome-item  categoria-item  descrição-item  lugar-item
    //         $name = $argv[2];
    //         $categorie = $argv[3];
    //         $place = $argv[4];

    //         if (
    //             $name && $categorie && $place
    //         ) {
    //             $request->store_itens($name, $categorie, $place);
    //         } else {
    //             echo "Alerta: todos os campos precisam ser passados";
    //         }
    //         break;
    //     case 13: //acessar itens perdidos -- OK

    //         // Comando no terminal:
    //         // php cliente.php 13 

    //         $request->lost_itens();

    //         break;
    //     case 14: //deletar item perdido -- OK

    //         // Comando no terminal:
    //         // php cliente.php 14 id-item

    //         if ($id = $argv[2]) {
    //             $request->delete_itens($id);
    //         } else {
    //             echo "Alerta: é preciso inserir o id da categoria";
    //         }
    //         break;
    //     case 15: //acessar item perdido -- OK

    //         // Comando no terminal:
    //         // php cliente.php 15 id-item

    //         if ($id = $argv[2]) {
    //             $request->view_itens($id);
    //         } else {
    //             echo "Alerta: é preciso inserir o id da categoria";
    //         }
    //         break;
    //     case 16: //devolver item perdido -- OK

    //         // Comando no terminal:
    //         // php cliente.php 16 id-item

    //         if ($id = $argv[2]) {
    //             $request->refound_itens($id);
    //         } else {
    //             echo "Alerta: é preciso inserir o id da categoria";
    //         }
    //         break;

    //     default:
    //         echo "Opção '{$path}' não encontrada";
    // }
}
