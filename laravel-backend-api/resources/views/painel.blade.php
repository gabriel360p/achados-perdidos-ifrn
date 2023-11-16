<!doctype html>
<html lang="en">

<head>
    <title>Painel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body onload="data()">

    <div id="app" style="display: none">
        oiiii
        <button id="deslogar"  class="btn btn-outline-success">Deslogar</button>

        @php
            var_dump(session()->get('UserSession'));
        @endphp

    </div>


    <script src="js.cookie.js"></script>
    <script src="settings.js"></script>
    <script src="client.js"></script>

    <script>
        var suap = new SuapClient(SUAP_URL, CLIENT_ID, REDIRECT_URI, SCOPE);
        suap.init();

        document.querySelector('button#deslogar').addEventListener('click', logout)
        var app = document.getElementById('app');

        http = axios.create({
            baseURL: 'http://localhost:8000',
        })

        function logout() {
            suap.logout();
        }

        function data() {
            if (suap.isAuthenticated()) {
                app.style.display = "block"

                var scope = "identificacao email documentos_pessoais"
                var callback = function(response) {

                    let dados = response.data

                    http.post('/user-session-storage', dados)
                        .then(resp => {
                            console.log(resp)
                        })
                        .catch(err => {
                            console.log(err)
                        })
                }
                suap.getResource(scope, callback)
            }else{
                window.location='http://localhost:8000/'
            }


        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>




</body>

</html>
