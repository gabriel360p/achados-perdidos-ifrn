<?php

//Funciona

require __DIR__ . '/guzzle_request.php';

//Referente a variável path -> (1) Armazenar -- (2) Listar tudo do banco -- (3) Deletar do Banco -- (4) Atualizar -- (5) Mostrar um item do banco


$path = $argv[1];
switch ($path) {
    case 1: //listando locais -- OK

        // Comando no terminal:
        // php cliente.php 1 

        $request->index_places();

        break;


    case 2: //salvando novo local -- OK

        // Comando no terminal:
        // php baldes.php 2 nomeLocal 

        $name = $argv[2];
        $request->store_places($name);

        break;













    case 3: //Salvando no Banco -- OK

        // Comando no terminal:
        // php baldes.php 3 nome-usuario nome-balde 

        $usuario = $argv[2];

        $nome = $argv[3];

        $request->store($usuario, $nome);

        break;

    case 4: //atualizando o balde -- OK

        // Comando no terminal:
        // php baldes.php 4 nome-do-balde novo-nome novo-usuario

        $balde = $argv[2];

        $nome = $argv[3];

        $usuario = $argv[4];

        $request->update($balde, $usuario, $nome);

        break;

    case 5: //listando um determinado balde -- OK

        // Comando no terminal:
        // php baldes.php 5 nome-do-balde

        $balde = $argv[2];

        $request->show($balde);

        break;

    case 6: //Deletendo o balde do banco -- OK

        // Comando no terminal:

        // php baldes.php 6 nome-do-balde

        $nome = $argv[2];

        $request->delete($nome);

        break;
}
