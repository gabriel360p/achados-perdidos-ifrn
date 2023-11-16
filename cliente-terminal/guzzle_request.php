<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

class Request
{
    protected $client;

    function __construct(Client $client)
    {
        $this->client = $client;
    }

    //----------------------------------------------------------------------------------------------------------
    public function index_places()
    {
        $response = $this->client->request('GET', 'http://localhost:8000/api/places');
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        echo ($response->getBody());
    }

    //----------------------------------------------------------------------------------------------------------
    public function store_places($name)
    {
        $response = $this->client->request('POST', 'http://localhost:8000/api/places', [
            'json' => [
                'name' => $name,
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
    }

    //----------------------------------------------------------------------------------------------------------
    public function view_places($id)
    {
        $response = $this->client->request('GET', 'http://localhost:8000/api/places/view', [
            'json' => [
                'id' => $id,
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        echo ($response->getBody());
    }

    //----------------------------------------------------------------------------------------------------------
    public function update_places($id, $name)
    {
        $response = $this->client->request('PUT', 'http://localhost:8000/api/places', [
            'json' => [
                'id' => $id,
                'name' => $name,
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
    }

    //----------------------------------------------------------------------------------------------------------
    public function delete_places($id)
    { 
        $response = $this->client->request('DELETE', 'http://localhost:8000/api/places', [
            'json' => [
                'id' => $id
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
    }


    //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/


    //----------------------------------------------------------------------------------------------------------
    public function index_categories()
    {
        $response = $this->client->request('GET', 'http://localhost:8000/api/categories');
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        echo ($response->getBody());
    }

    //----------------------------------------------------------------------------------------------------------
    public function store_categories($name)
    {
        $response = $this->client->request('POST', 'http://localhost:8000/api/categories', [
            'json' => [
                'name' => $name,
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
    }

    //----------------------------------------------------------------------------------------------------------
    public function view_categories($id)
    {
        $response = $this->client->request('GET', 'http://localhost:8000/api/categories/view', [
            'json' => [
                'id' => $id,
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        echo ($response->getBody());
    }

    //----------------------------------------------------------------------------------------------------------
    public function update_categories($id, $name)
    {
        $response = $this->client->request('PUT', 'http://localhost:8000/api/categories', [
            'json' => [
                'id' => $id,
                'name' => $name,
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
    }

    //----------------------------------------------------------------------------------------------------------
    public function delete_categories($id)
    { 
        $response = $this->client->request('DELETE', 'http://localhost:8000/api/categories', [
            'json' => [
                'id' => $id
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
    }



















    public function list()
    { //LIST ----------------------------------------------------------------------------------------------------------
        $response = $this->client->request('GET', 'http://localhost:8000/api/baldes');

        $html = json_decode($response->getBody(true)); //pegando o corpo, os dados que vem em array, pra facilitar coloco ele dentro da função json_decode()
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        print_r($html);
    }

    public function delete($nome)
    { //DELETE ----------------------------------------------------------------------------------------------------------
        $response = $this->client->request('DELETE', 'http://localhost:8000/api/baldes/balde/delete', [
            'json' => [
                'nome' => $nome
            ]
        ]);
    }

    public function update($balde, $usuario, $nome)
    { //UPDATE ----------------------------------------------------------------------------------------------------------
        $response = $this->client->request('GET', 'http://localhost:8000/api/baldes/balde/update', [
            'json' => [
                'balde' => $balde,
                'usuario' => $usuario,
                'nome' => $nome
            ]
        ]);

        echo "Status: " . $response->getStatusCode() . PHP_EOL;
    }

    public function show($balde)
    { //SHOW ----------------------------------------------------------------------------------------------------------
        $response = $this->client->request('GET', 'http://localhost:8000/api/baldes/balde/show', [
            'json' => [
                'nome' => $balde
            ]
        ]);

        echo "Status: " . $response->getStatusCode() . PHP_EOL;

        print_r(json_decode($response->getBody(true)));
    }
}

$request = new Request(new Client());//inicialiando o objeto
