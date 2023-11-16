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


    //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //-- PLACES --//


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
        echo ($response->getBody());
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
        echo ($response->getBody());
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


    //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //-- CATEGORIES --//


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
        echo ($response->getBody());
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


    //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //-- ITENS --//


    public function index_itens()
    {
        $response = $this->client->request('GET', 'http://localhost:8000/api/itens');
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        echo ($response->getBody());
    }

    //----------------------------------------------------------------------------------------------------------
    public function store_itens($name, $categorie, $place)
    {
        $response = $this->client->request('POST', 'http://localhost:8000/api/itens', [
            'json' => [
                'name' => $name,
                'categorie' => $categorie,
                'place' => $place,
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        echo ($response->getBody());
    }

    //----------------------------------------------------------------------------------------------------------
    public function lost_itens()
    {
        $response = $this->client->request('GET', 'http://localhost:8000/api/itens/lost');
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        echo ($response->getBody());
    }
    
    //----------------------------------------------------------------------------------------------------------
    public function delete_itens($id)
    {
        $response = $this->client->request('DELETE', 'http://localhost:8000/api/itens', [
            'json' => [
                'id' => $id
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
    }

    public function view_itens($id)
    {
        $response = $this->client->request('GET', 'http://localhost:8000/api/itens/view', [
            'json' => [
                'id' => $id,
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        echo ($response->getBody());
    }

    //----------------------------------------------------------------------------------------------------------

    public function refound_itens($id)
    {
        $response = $this->client->request('GET', 'http://localhost:8000/api/itens/refound', [
            'json' => [
                'id' => $id,
            ]
        ]);
        echo "Status: " . $response->getStatusCode() . PHP_EOL;
        echo ($response->getBody());
    }

}

$request = new Request(new Client());//inicialiando o objeto
