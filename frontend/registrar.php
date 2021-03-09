<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body class="p-3">
    <div id="app">
        <registrar></registrar>
    </div>
    <script>
        Vue.component('registrar', {
            template: "<div><h1 style='font-size:24px;font-weight: bold;'>Cadastro de usuário</h1><form enctype='multipart/form-data' action='../backend/action/inserir.php' method='post' class='w-50'><div class='form-div form-floating mb-3'><input type='text' class='form-control' id='userNome' name='nome' placeholder='Nome para usuário' style='outline: none;'><label for='userNome'>Nome de usuário</label></div><div class='form-div form-floating mb-3'><input type='email' class='form-control' id='userEmail' name='email' placeholder='nome@exemplo.com' ><label for='userEmail'>Endereço de e-mail</label></div><div class='form-div form-floating mb-3'><input type='password' class='form-control' id='userSenha' name='senha' placeholder='senha'><label for='userSenha'>Senha</label></div><a href='userLista.php' class='btn btn-outline-info w-25' title='Função disponível apenas para administradores'>Lista usuários</a><input class='w-25 float-end btn btn-outline-primary' type='submit' value='ENVIAR'></form></div>"
        })
        const App = new Vue({
            el: "#app"
        });

    </script>
</body>
</html>