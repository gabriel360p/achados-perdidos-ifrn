<?php
require 'Operacao.php';

$op = new Operacao(
    'http://localhost:8000/api/',
    'https://suap.ifrn.edu.br/api/v2/'
);

$ativoMenuPrincipal = true;

while ($ativoMenuPrincipal) {
    echo "\n";
    echo "=========================================================";
    echo "\n";
    echo $op->user ?  "Achados e Perdidos - Bem Vindo $op->user !" :  "Achados e Perdidos - Bem Vindo Anônimo" . "!";
    echo "\n";
    echo "=========================================================";
    echo "\n";
    echo "(1) Categorias";
    echo "\n";
    echo "(2) Locais";
    echo "\n";
    echo "(3) Itens";
    echo "\n";
    echo "(4) Logar ou Novo Login";
    echo "\n";
    echo "(5) Deslogar";
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
                        $op->index_categories();
                        break;

                    case 2: //salvando nova categoria -- OK 
                        if ($op->user) {
                            echo "Categorias já registradas:";
                            echo "\n";
                            $op->categories_names();
                            echo "\n";
                            echo "Insira o nome da categoria";
                            echo "\n";
                            if ($name = readline()) {
                                $op->store_categories($name);
                            } else {
                                echo "Alerta: é preciso inserir o nome da categoria (não pode colocar um nome existente já cadastrado)";
                            }
                            echo "\n";
                        } else {
                            echo  "Opa! Está área é exclusiva para usuários logados!";
                            echo "\n";
                        }
                        break;
                    case 3: //acessando uma categoria -- OK
                        echo "Insira o id da categoria";
                        echo "\n";
                        if ($id = readline()) {
                            $op->view_categories($id);
                        } else {
                            echo "Alerta: é preciso inserir o id da categoria";
                        }
                        echo "\n";
                        break;
                    case 4: //editando categoria -- OK
                        if ($op->user) {

                            echo "Categorias já registradas:";
                            echo "\n";
                            $op->categories_names();
                            echo "\n";
                            echo "Insira o id da categoria e depois o novo nome (não pode colocar um nome existente já cadastrado)";
                            echo "\n";
                            if ($id = readline() && $name = readline()) {
                                $op->update_categories($id, $name);
                            } else {
                                echo "Alerta: todos os campos precisam ser passados";
                            }
                            echo "\n";
                        } else {
                            echo  "Opa! Está área é exclusiva para usuários logados!";
                            echo "\n";
                        }
                        break;
                    case 5: //apagando uma categoria -- OK
                        if ($op->user) {
                            $op->categories_names();
                            echo "\n";
                            echo "Insira o id da categoria";
                            echo "\n";
                            if ($id = readline()) {
                                $op->delete_categories($id);
                            } else {
                                echo "Alerta: é preciso inserir o id da categoria";
                            }
                        } else {
                            echo  "Opa! Está área é exclusiva para usuários logados!";
                            echo "\n";
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
                        $op->index_places();
                        break;
                    case 2: //salvando novo local -- OK
                        if ($op->user) {
                            echo "Locais já registrados:";
                            echo "\n";
                            $op->places_names();
                            echo "\n";
                            echo "Insira o nome do local (não pode colocar um nome já cadastrado)";
                            echo "\n";
                            if ($name = readline()) {
                                $op->store_places($name);
                            } else {
                                echo "Alerta: é preciso inserir o nome do local";
                            }
                            echo "\n";
                        } else {
                            echo  "Opa! Está área é exclusiva para usuários logados!";
                            echo "\n";
                        }

                        break;
                    case 3: //acessando um local -- OK
                        echo "Insira o id do local";
                        echo "\n";
                        if ($id = readline()) {
                            $op->view_places($id);
                        } else {
                            echo "Alerta: é preciso inserir o id do local";
                        }
                        echo "\n";
                        break;
                    case 4: //editando local -- OK
                        if ($op->user) {

                            echo "Locais já registrados:";
                            echo "\n";
                            $op->places_names();
                            echo "\n";
                            echo "Insira o id do local e depois o novo nome (não pode colocar um nome já cadastrado)";
                            echo "\n";
                            if ($id = readline() && $name = readline()) {
                                $op->update_places($id, $name);
                            } else {
                                echo "Alerta: todos os campos precisam ser passados";
                            }
                        } else {
                            echo  "Opa! Está área é exclusiva para usuários logados!";
                            echo "\n";
                        }

                        echo "\n";
                        break;
                    case 5: //apagando um local -- OK
                        if ($op->user) {
                            $op->places_names();
                            echo "\n";
                            echo "Insira o id do local";
                            echo "\n";
                            if ($id = readline()) {
                                $op->delete_places($id);
                            } else {
                                echo "Alerta: é preciso inserir o id do local";
                            }
                        } else {
                            echo  "Opa! Está área é exclusiva para usuários logados!";
                            echo "\n";
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
                        $op->index_itens();
                        break;
                    case 2: //salvando novo item -- OK
                        if ($op->user) {
                            echo "=========================================================";
                            echo "\n";
                            echo "Escolha uma categoria:";
                            echo "\n";
                            $op->categories_names();
                            echo "\n";
                            echo "=========================================================";
                            echo "\n";
                            echo "Escolha um local:";
                            echo "\n";
                            $op->places_names();
                            echo "\n";
                            echo "=========================================================";
                            echo "\n";
                            echo "Insira o nome do item, categoria e lugar onde foi encontrado (Atenção: Insira corretamente o nome da Categoria e Local, respeite caixa de texto e acentuação)";
                            echo "\n";
                            $name = readline();
                            $categorie = readline();
                            $place = readline();
                            if ($name && $categorie && $place) {
                                $op->store_itens($name, $categorie, $place);
                            } else {
                                echo "Alerta: todos os campos precisam ser preenchidos";
                            }
                            echo "\n";
                        } else {
                            echo  "Opa! Está área é exclusiva para usuários logados!";
                            echo "\n";
                        }
                        break;
                    case 3: //acessando um item -- OK
                        echo "Insira o id do item";
                        echo "\n";
                        if ($id = readline()) {
                            $op->view_itens($id);
                        } else {
                            echo "Alerta: é preciso inserir o id do item";
                        }
                        echo "\n";
                        break;
                    case 4: //apagando item -- OK
                        if ($op->user) {
                            echo "Itens já registrados:";
                            echo "\n";
                            $op->itens_names();
                            echo "\n";
                            echo "Insira o id do item (Alerta: itens não devolvidos não podem ser apagados)";
                            echo "\n";
                            if ($id = readline()) {
                                $op->delete_itens($id);
                            } else {
                                echo "Alerta: é preciso inserir o id do item";
                            }
                            echo "\n";
                        } else {
                            echo  "Opa! Está área é exclusiva para usuários logados!";
                            echo "\n";
                        }
                        break;
                    case 5: //devolvendo item -- OK
                        if ($op->user) {
                            $op->itens_names();
                            echo "\n";
                            echo "Insira o id do item";
                            echo "\n";
                            if ($id = readline()) {
                                $op->refound_itens($id);
                            } else {
                                echo "Alerta: é preciso inserir o id do item";
                            }
                        } else {
                            echo  "Opa! Está área é exclusiva para usuários logados!";
                            echo "\n";
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

        case 4:
            // //-- Logar usuário --//
            $op->login();
            break;
            //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/

        case 5:
            // //-- Deslogar usuário --//
            $op->logout();

            break;
            //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/

        case 0:
            //-- SAIR --//
            $op->logout();
            $ativoMenuPrincipal = false;
            break;

        default:
            echo "Opção {$pathItens} inválida";
            echo "\n";
    }
}
