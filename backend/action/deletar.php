<?php
    require_once('../Conexao/Conexao.class.php');
    require_once('../modelo/userModel.php');
    try {
        $conn = new Conexao("../Conexao/configDB.ini");
        $pdo = $conn->getPDO();
        
        $userNome = $_GET['userNome'];

        $comando = $pdo->prepare('DELETE FROM userinfo WHERE userNome=:n');
        $comando->bindValue(":n", $userNome);
        if($comando->execute()) {
            echo "
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
            <div class='p-2'>
            <p style='font-size: 18px;'>A conta do usuário ".$userNome." foi excluída com sucesso.</p>
            <a href='../../frontend/registrar.php' class='btn btn-outline-primary'>HOME</a>
            <a href='../../frontend/userLista.php' class='btn btn-outline-info' title='Função disponível apenas para administradores'>Lista usuários</a>
            </div>";
        } else {
            echo "A conta do usuário ".$userNome." não foi excluída devido a problemas inesperados.";
        }


    } catch(PDOExpection $e) {
        echo "Surgiu um erro inesperado relacionado ao Banco de Dados: ".$e->getMessage();
    }



?>