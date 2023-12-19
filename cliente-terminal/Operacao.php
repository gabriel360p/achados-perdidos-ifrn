<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception as GuzzleException;
use GuzzleHttp\Psr7;

class Operacao
{
    private $suapToken;
    public $clientServidor;
    public $clientSuap;
    public $user;

    public function __construct($baseURI, $BaseUriSuap)
    {
        //conexão com o suap
        $this->clientSuap = new GuzzleClient();

        //conexão com achados e perdidos
        $this->clientServidor = new GuzzleClient();
    }
    public function login()
    {
        $this->user;
        $this->suapToken = '';
        echo "=========================================================\n";
        echo "Login SUAP - Insira matrícula e depois sua senha\n";
        $this->setSuapToken(readline(), Seld\CliPrompt\CliPrompt::hiddenPrompt());
        // $this->setSuapToken('', '');
        echo "=========================================================\n";
    }

    public function setSuapToken($matricula, $senha)
    {
        try {
            //mandando os dados e recebendo o token de acesso do suap
            $res = $this->clientSuap->request('POST', 'https://suap.ifrn.edu.br/api/v2/autenticacao/token/', [
                'form_params' => [
                    'username' => $matricula,
                    'password' => $senha
                ]
            ]);

            //token de acesso
            $data = json_decode($res->getBody());

            // setcookie('token_access', $data->access,time()+3600);
            $this->suapToken = $data->access;

            //definir dados do usuário
            $this->setUser();
        } catch (GuzzleException\ClientException $th) {

            //caso usuário digite os dados errados, ele recebe esse erro
            echo Psr7\Message::toString($th->getResponse());
            echo "\n";
            //refazer o login
            $this->login();
        }
    }
    public function setUser()
    {
        //depois de ter pego o token de acesso, posso pegar os dados do usuário:
        $res = $this->clientSuap->request(
            'GET',
            'https://suap.ifrn.edu.br/api/v2/minhas-informacoes/meus-dados/',
            ['headers' => ['Authorization' => "Bearer " . $this->getSuapToken()]]
        )->getBody()->getContents();

        //"salvando" os dados
        $this->user =  json_decode($res, associative: true)['nome_usual'];
    }
    public function getSuapToken()
    {
        return $this->suapToken;
    }
    public function logout()
    {
        $this->user=null;
        $this->suapToken = '';
    }



















    //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //-- PLACES --//
    public function index_places()
    {
        try {
            $response = $this->clientServidor->request(
                'GET',
                'http://localhost:8000/api/places',
                ['headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]]
            );
            var_dump(json_decode($response->getBody(), true));
        } catch (GuzzleException\ClientException $th) {
            $res = $th->getResponse();
            echo $res->getStatusCode() . " Não Autorizado";
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function store_places($name)
    {

        try {
            $response = $this->clientServidor->request('POST', 'http://localhost:8000/api/places', [
                'json' => [
                    'name' => $name,
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
            ]);
            var_dump(json_decode($response->getBody(), true));
        } catch (GuzzleException\ClientException $th) {
            $res = $th->getResponse();
            echo $res->getStatusCode() . " Não Autorizado";
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function view_places($id)
    {
        try {
            $response = $this->clientServidor->request('GET', 'http://localhost:8000/api/categories/view', [
                'json' => [
                    'id' => $id,
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
            ]);
            var_dump(json_decode($response->getBody(), true));
        } catch (GuzzleException\ClientException $th) {
            $res = $th->getResponse();
            echo $res->getStatusCode() . " Não Autorizado";
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function update_places($id, $name)
    {
        try {
            $response = $this->clientServidor->request('PUT', 'http://localhost:8000/api/places', [
                'json' => [
                    'id' => $id,
                    'name' => $name,
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]

            ]);
            echo ($response->getBody());
        } catch (GuzzleException\ClientException $th) {
            $res = $th->getResponse();
            echo $res->getStatusCode() . " Não Autorizado";
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function delete_places($id)
    {
        try {
            $res = $this->clientServidor->request('DELETE', 'http://localhost:8000/api/places', [
                'json' => [
                    'id' => $id
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
            ]);
            echo $res->getStatusCode();
        } catch (GuzzleException\ClientException $th) {
            $res = $th->getResponse();
            echo $res->getStatusCode() . " Não Autorizado";
        }
    }

    public function places_names()
    {
        try {
            $response = $this->clientServidor->request(
                'GET',
                'http://localhost:8000/api/places-names',
                ['headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]]
            );
            echo $response->getBody();
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }






    //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //-- CATEGORIES --//
    public function index_categories()
    {
        try {
            $response = $this->clientServidor->request(
                'GET',
                'http://localhost:8000/api/categories',
                ['headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]]
            );
            echo ($response->getBody());
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function categories_names()
    {
        try {
            $response = $this->clientServidor->request(
                'GET',
                'http://localhost:8000/api/categories-names',
                ['headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]]
            );
            echo ($response->getBody());
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function store_categories($name)
    {
        try {
            $response = $this->clientServidor->post(
                'http://localhost:8000/api/categories',
                [
                    'json' => ['name' => $name],
                    'headers' =>
                    [
                        'Authorization' => 'Bearer ' . $this->getSuapToken()
                    ]
                ]
            );
            echo ($response->getBody());
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function view_categories($id)
    {
        try {
            $response = $this->clientServidor->request('GET', 'http://localhost:8000/api/categories/view', [
                'json' => [
                    'id' => $id,
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
            ]);
            echo ($response->getBody());
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function update_categories($id, $name)
    {
        try {
            $response = $this->clientServidor->request('PUT', 'http://localhost:8000/api/categories', [
                'json' => [
                    'id' => $id,
                    'name' => $name,
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
            ]);
            echo ($response->getBody());
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function delete_categories($id)
    {
        try {
            $response = $this->clientServidor->request('DELETE', 'http://localhost:8000/api/categories', [
                'json' => [
                    'id' => $id,
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
            ]);
            echo 'Status: ' . $response->getStatusCode();
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }











    //---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/---/
    //-- ITENS --//
    public function index_itens()
    {
        try {
            $response = $this->clientServidor->request(
                'GET',
                'http://localhost:8000/api/items',
                ['headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]]
            );
            echo $response->getBody();
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function itens_names()
    {
        try {
            $response = $this->clientServidor->request(
                'GET',
                'http://localhost:8000/api/items-names',
                ['headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]]
            );
            echo $response->getBody();
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }


    //----------------------------------------------------------------------------------------------------------
    public function store_itens($name, $categorie, $place)
    { {
            try {
                $response = $this->clientServidor->request('POST', 'http://localhost:8000/api/items', [
                    'json' => [
                        'name' => $name,
                        'place' => $place,
                        'categorie' => $categorie,
                    ],
                    'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
                ]);
                echo $response->getBody();
            } catch (GuzzleException\ClientException $e) {
                $response = $e->getResponse();
                echo 'Status: ' . $response->getStatusCode();
            }
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function delete_itens($id)
    {
        try {
            $response = $this->clientServidor->request('DELETE', 'http://localhost:8000/api/items', [
                'json' => [
                    'id' => $id,
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
            ]);
            echo $response->getStatusCode();
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function view_itens($id)
    {
        try {
            $response = $this->clientServidor->request('GET', 'http://localhost:8000/api/items/view', [
                'json' => [
                    'id' => $id,
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
            ]);
            echo $response->getBody();
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }

    //----------------------------------------------------------------------------------------------------------
    public function refound_itens($id)
    {
        try {
            $response = $this->clientServidor->request('GET', 'http://localhost:8000/api/items/refound', [
                'json' => [
                    'id' => $id,
                ],
                'headers' => ['Authorization' => 'Bearer ' . $this->getSuapToken()]
            ]);
            echo 'Status: ' . $response->getStatusCode();
        } catch (GuzzleException\ClientException $e) {
            $response = $e->getResponse();
            echo 'Status: ' . $response->getStatusCode();
        }
    }
}
