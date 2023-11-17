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


        case 3:
            //-- ITENS --//
            $ativoMenuItens = true;

            while ($ativoMenuItens) {
                echo "\n";
                echo "=========================================================";
                echo "\n";
                echo "Seção Itens";
                echo "\n";
                echo "=========================================================";
                echo "\n";
                echo "(1) Todas os Itens";
                echo "\n";
                echo "(2) Novo Item";
                echo "\n";
                echo "(3) Vizualizar Item";
                echo "\n";
                echo "(4) Apagar Item";
                echo "\n";
                echo "(5) Devolver Item";
                echo "\n";
                echo "(0) Sair da seção Itens";
                echo "\n";
                $pathItens = readline();
                switch ($pathItens) {
                    case 1: //listando Itens -- OK
                        $request->index_itens();
                        break;
                    case 2: //salvando novo item -- OK
                        echo "=========================================================";
                        echo "\n";
                        echo "Escolha uma categoria:";
                        echo "\n";
                        $request->categories_names();
                        echo "\n";
                        echo "=========================================================";
                        echo "\n";
                        echo "Escolha um local:";
                        echo "\n";
                        $request->places_names();
                        echo "\n";
                        echo "=========================================================";
                        echo "\n";
                        echo "Insira o nome do item, categoria e lugar onde foi encontrado (Atenção: Insira corretamente o nome da Categoria e Local, respeite caixa de texto e acentuação)";
                        echo "\n";
                        $name = readline();
                        $categorie = readline();
                        $place = readline();
                        if ($name && $categorie && $place) {
                            $request->store_itens($name, $categorie, $place);
                        } else {
                            echo "Alerta: todos os campos precisam ser preenchidos";
                        }
                        echo "\n";
                        break;
                    case 3: //acessando um item -- OK
                        echo "Insira o id do item";
                        echo "\n";
                        if ($id = readline()) {
                            $request->view_itens($id);
                        } else {
                            echo "Alerta: é preciso inserir o id do item";
                        }
                        echo "\n";
                        break;
                    case 4: //apagando item -- OK
                        echo "Itens já registrados:";
                        echo "\n";
                        $request->itens_names();
                        echo "\n";
                        echo "Insira o id do item (Alerta: itens não devolvidos não podem ser apagados)";
                        echo "\n";
                        if ($id = readline()) {
                            $request->delete_itens($id);
                        } else {
                            echo "Alerta: é preciso inserir o id do item";
                        }
                        echo "\n";
                        break;
                    case 5: //devolvendo item -- OK
                        $request->itens_names();
                        echo "\n";
                        echo "Insira o id do item";
                        echo "\n";
                        if ($id = readline()) {
                            $request->refound_itens($id);
                        } else {
                            echo "Alerta: é preciso inserir o id do item";
                        }
                        break;
                    case 0:
                        $ativoMenuItens = false;
                        break;
                    default:
                        echo "Opção {$pathItens} inválida";
                        echo "\n";
                } //switch itens
            } //while seção itens
            break; //seção itens

            //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
        case 0:
            //-- SAIR --//
            $ativoMenuPrincipal = false;
            break;
    }
}
