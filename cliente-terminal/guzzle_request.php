<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException as RequestException;

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
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/places');
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function places_names()
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/places-names');
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function store_places($name)
    {
        try {
            $response = $this->client->request('POST', 'http://localhost:8000/api/places', [
                'json' => [
                    'name' => $name,
                ]
            ]);
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo '' . $response->getStatusCode() . PHP_EOL;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function view_places($id)
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/categories/view', [
                'json' => [
                    'id' => $id,
                ]
            ]);
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
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
    public function index_categories()
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/categories');
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function categories_names()
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/categories-names');
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function store_categories($name)
    {
        try {
            $response = $this->client->request('POST', 'http://localhost:8000/api/categories', [
                'json' => [
                    'name' => $name,
                ]
            ]);
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo '' . $response->getStatusCode() . PHP_EOL;
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function view_categories($id)
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/categories/view', [
                'json' => [
                    'id' => $id,
                ]
            ]);
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function update_categories($id, $name)
    {
        try {
            $response = $this->client->request('PUT', 'http://localhost:8000/api/categories', [
                'json' => [
                    'id' => $id,
                    'name' => $name,
                ]
            ]);
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function delete_categories($id)
    {
        try {
            $response = $this->client->request('DELETE', 'http://localhost:8000/api/categories', [
                'json' => [
                    'id' => $id,
                ]
            ]);
            echo 'Status: ' . $response->getStatusCode();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }











    //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //-- ITENS --//
    public function index_itens()
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/itens');
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function itens_names()
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/itens-names');
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }


    //----------------------------------------------------------------------------------------------------------
    public function store_itens($name, $categorie, $place)
    { {
            try {
                $response = $this->client->request('POST', 'http://localhost:8000/api/itens', [
                    'json' => [
                        'name' => $name,
                        'place' => $place,
                        'categorie' => $categorie,
                    ]
                ]);
                if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                    var_dump(json_decode($response->getBody(), true));
                } else {
                    echo '' . $response->getStatusCode() . PHP_EOL;
                }
            } catch (RequestException $e) {
                $response = $e->getResponse();
                echo 'Status: ' . $response->getStatusCode();
            }
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function delete_itens($id)
    {
        try {
            $response = $this->client->request('DELETE', 'http://localhost:8000/api/itens', [
                'json' => [
                    'id' => $id,
                ]
            ]);
            echo 'Status: ' . $response->getStatusCode();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function view_itens($id)
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/itens/view', [
                'json' => [
                    'id' => $id,
                ]
            ]);
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function refound_itens($id)
    {
        try {
            $response = $this->client->request('GET', 'http://localhost:8000/api/itens/refound', [
                'json' => [
                    'id' => $id,
                ]
            ]);
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                var_dump(json_decode($response->getBody(), true));
            } else {
                echo 'Status: ' . $response->getStatusCode();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }
}

$request = new Request(new Client());//inicialiando o objeto
