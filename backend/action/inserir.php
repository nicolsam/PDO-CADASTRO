<?php
require_once('../Conexao/Conexao.class.php');
require_once('../modelo/userModel.php');
try {
        $conn = new Conexao("../Conexao/configDB.ini");
        $pdo = $conn->getPDO();
        $user = new UserModelo();

        $user->setUserNome($_POST['nome']);
        $user->setUserEmail($_POST['email']);
        $user->setUserSenha(sha1($_POST['senha']));

        $inserir = $pdo->prepare("INSERT INTO userinfo(userNome, userEmail, userSenha) 
        VALUES(:n, :e, :s)"); 

        $userNome = $user->getUserNome();
        $userEmail = $user->getUserEmail();
        $userSenha = $user->getUserSenha();

        $inserir->bindValue(":n", $userNome);
        $inserir->bindValue(":e", $userEmail);
        $inserir->bindValue(":s", $userSenha);

        if($inserir->execute()) {
            echo 
                "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
                <div class='p-2'>
                </p style='font-size: 18px;'>Foi feito o cadastro de usuário com sucesso. Voltando automaticamente.</p>
                <a href='../../frontend/userLista.php' class='btn btn-outline-primary'>Lista usuários</a>
                </div>";
            header("refresh:3, ../../frontend/registrar.php");
        } else {
            echo 
                "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
                <p style='font-size: 18px;'>Um erro inesperado ocorreu!</p>
                <a href='../../frontend/registrar.php' class='btn btn-outline-primary m-2'>HOME</a>";
        }
    } catch(PDOExpection $e) {
        echo "Surgiu um erro inesperado relacionado ao Banco de Dados: ".$e->getMessage();
    }
?>