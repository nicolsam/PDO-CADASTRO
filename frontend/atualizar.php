<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação PW2</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body>
    <div id="app">
        <atualizar-dados></atualizar-dados>
    </div>
    <script>
        Vue.component('atualizar-dados', {
            template: "<div class='p-2'><h1 style='font-size:24px;font-weight: bold;'>Alteração de dados - <?php echo $_GET['userNome']?></h1><form enctype='multipart/form-data' action='../backend/action/update.php?userNome=<?php echo $_GET['userNome'] ?>' method='post' class='w-50'><div class='form-div form-floating mb-3'><input type='text' class='form-control' id='userNome' name='nomeAtualizado' placeholder='Nome para usuário' style='outline: none;'><label for='userNome'>Novo nome de usuário</label></div><div class='form-div form-floating mb-3'><input type='email' class='form-control' id='userEmail' name='emailAtualizado' placeholder='nome@exemplo.com'><label for='userEmail'>Novo endereço de e-mail</label></div><div class='form-div form-floating mb-3'><input type='password' class='form-control' id='userSenha' name='senhaAtualizada' placeholder='senha'><label for='userSenha'>Nova senha</label></div><a href='registrar.php' class='btn btn-outline-primary'>HOME</a><input class='w-25 float-end btn btn-outline-primary' type='submit' value='Atualizar dados'></form></div>"
        })
        const App = new Vue({
            el: "#app"
        });
    </script>
</body>
</html>