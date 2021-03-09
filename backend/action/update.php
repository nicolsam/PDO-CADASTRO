<?php
    require_once('../modelo/userModel.php');
    require_once('../Conexao/Conexao.class.php');

    $oldUser = $_GET['userNome'];
    if(isset($oldUser)) {
        try {
            $conn = new Conexao("../Conexao/configDB.ini");
            $pdo = $conn->getPDO();
            $user = new UserModelo();

            $user->setUserNome($_POST['nomeAtualizado']);
            $user->setUserEmail($_POST['emailAtualizado']);
            $user->setUserSenha(sha1($_POST['senhaAtualizada']));

            $userNome = $user->getUserNome();
            $userEmail = $user->getUserEmail();
            $userSenha = $user->getUserSenha();

            $atualizar = $pdo->prepare("UPDATE userinfo SET userNome=:n, userEmail=:e, userSenha=:s WHERE userNome=:un");
            $atualizar->bindValue(":n", $userNome);
            $atualizar->bindValue(":e", $userEmail);
            $atualizar->bindValue(":s", $userSenha);
            $atualizar->bindValue(":un", $oldUser);

            if($atualizar->execute()) {
                echo "
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
                    <div class='p-2'>
                        <p style='font-size: 18px;'>A conta do usuário ".$oldUser." foi atualizada com sucesso para o seguintes dados:</p>
                        <p style='font-size: 16px;'>Usuário -> ".$userNome."</br><p style='font-size: 16px;'>Email -> ".$userEmail."</br><p style='font-size: 16px;'>Senha -> ".$userSenha."</br>
                    </div>
                    <a href='../../frontend/registrar.php' class='btn btn-outline-primary m-2'>HOME</a>";
            } else {
                echo "Erro desconhecido.";
            }
        } catch(PDOExpection $e) {
            echo "Surgiu um erro inesperado relacionado ao Banco de Dados: ".$e->getMessage();
        }
    } else {
        echo "Parece que houve um problema interno.";
    }
?>