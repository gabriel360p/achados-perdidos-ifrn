<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body onload="meusDados()">

    Bem Vindo {{ $session['nome']}}
    <button id="logout-button">Deslogar</button>
    
    <script src="js.cookie.js"></script>
    <script src="settings.js"></script>
    <script src="client.js"></script>

    <script>
        var suap = new SuapClient(SUAP_URL, CLIENT_ID, REDIRECT_URI, SCOPE);
        suap.init();

        document.querySelector('button#logout-button').addEventListener('click', deslogar)

        function meusDados() { //pegando os dados do usuário, daqui posso até mandar para um banco de dados
            if (suap.isAuthenticated()) {
                //definindo os scopos
                var scope = "identificacao email documentos_pessoais"
                var callback = function(response) {
                    let dados = response.data

                    // axios.post('/user-session-storage',dados)
                    // .then(res=>{console.log(res)})
                    // ;
                };
                suap.getResource(scope, callback)
            }
        }

        function deslogar() { //logout do usuário
            // alert("oi")
            suap.logout();
        }

        // function deslogar() { //logout do usuário
        //     suap.logout();
        // }
        // axios.post('save-user-session', data)
    </script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
