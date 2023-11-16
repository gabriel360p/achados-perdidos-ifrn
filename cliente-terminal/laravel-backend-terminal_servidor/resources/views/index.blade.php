<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente Js</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
</style>

<body onload="auth()">

    {{-- <div class="container" id="container-after-login" style="margin-top: 30px;">
    <span class="display-5" id="welcome-user"></span>

    <div class="mt-3">
      <h5 id="login-status-h5"></h5>
    </div>
    <hr>

    <div class="row">
      <div class="col-12">
        <button id="deslogar" class="btn btn-outline-success">Deslogar</button>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h3 class="mb-3 mt-2">Atente-se aos seus dados:</h3>
        <img src="" id="user-avatar">
        <div id="user-data-div">
          
        </div>
      </div>
    </div>
    

  </div> --}}

    <div class="container" id="container-login" style="margin-top: 100px;">

        <div id="logar" class="row">
            <div class="col-12">
                <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">

                    <div>
                        <img src="https://www.ifpb.edu.br/ti/sistemas/imagens/suap.jpg" style="height: 100px;"
                            alt="">
                    </div>

                    <div class="mt-3">
                        <h5 id="login-status-h5"></h5>
                    </div>

                    <div style="width: 10%;" class="mt-3">
                        <a id="login" class="btn btn-outline-success">Logar com SUAP</a>
                    </div>

                </div>

            </div>
        </div>

    </div>


    <script src="js.cookie.js"></script>
    <script src="settings.js"></script>
    <script src="client.js"></script>
    <script>
        //inciando objeto SUAP
        var suap = new SuapClient(SUAP_URL, CLIENT_ID, REDIRECT_URI, SCOPE);
        suap.init();

        //captura do evento ao clicar em login
        document.querySelector('a#login').addEventListener('click', logar)

        //captura do evento ao clicar em deslogar
        // document.querySelector('button#deslogar').addEventListener('click', deslogar)

        //captura do evento ao clicar em deslogar
        // document.querySelector('button#logar').href = suap.getLoginURL()

        function auth() { //essa função verifica como está o usuário, se ele está autenticado ou não
            if (suap.isAuthenticated()) {
                // await meusDados()
                console.log("Vc não esta logado")
                document.querySelector('div#container-login').style.display = 'show'
                document.querySelector('div#container-after-login').style.display = 'none'
                let status = document.querySelector('h5#login-status-h5')
                status.style.color = "red"
                status.innerHTML = 'Você não esta logado'
            }
        }

        function meusDados() { //pegando os dados do usuário, daqui posso até mandar para um banco de dados
            if (suap.isAuthenticated()) {
                //definindo os scopos
                var scope = "identificacao email documentos_pessoais"
                var callback = function(response) {

                    //salvando os dados do usuário no localStorage do Js
                    let dados = response.data
                    localStorage.setItem("user", JSON.stringify(dados));
                    var user = JSON.parse(localStorage.getItem("user"))

                    //mostrando uma saudação para o usuário logado
                    document.querySelector('span#welcome-user').innerHTML = `Bem Vindo ${user.nome_usual}!`

                    //foto do usuário
                    document.querySelector('img#user-avatar').setAttribute('src',
                        `https://suap.ifrn.edu.br${user.foto}`)

                    //dados do usuário
                    let div = document.querySelector('div#user-data-div').innerHTML =
                        `
            <p> Nome: ${user.nome_usual} </p>
            <p> Matricula: ${user.identificacao} </p>
            <p> Campus: ${user.campus} </p>
            <p> Email: ${user.email}</p>
            <p> Tipo de usuário: ${user.tipo_usuario} </p>
            <p> Sexo: ${user.sexo} </p>
            <p> CPF: ${user.cpf} </p>
            <p> Foto: ${user.foto} </p>
          `
                };
                suap.getResource(scope, callback)
            }
        }

        function deslogar() { //logout do usuário
            suap.logout();
        }

        function logar() { //encaminhamento para logar o usuário caso ele não esteja logado no suap
            let a = document.querySelector('a#login')
            a.setAttribute('href', suap.getLoginURL())
        }
    </script>
</body>

</html>
