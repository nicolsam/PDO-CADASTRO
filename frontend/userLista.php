<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação PW2</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once('../backend/Conexao/Conexao.class.php');
        require_once('../backend/modelo/userModel.php');
            try {
            $conn = new Conexao("../backend/Conexao/configDB.ini");
            $pdo = $conn->getPDO();
            $user = new UserModelo();

            $sth = $pdo->prepare("SELECT * FROM userinfo;");
            $sth->execute();
            $resultado = $sth->fetchAll(PDO::FETCH_CLASS, "UserModelo");

            echo "<div class='p-2 table-responsive'>
                    <table class='table table-dark table-hover'>
                        <tr>
                            <th scope='col' class='text-center'>NOME</th>
                            <th scope='col' class='text-center'>EMAIL</th>
                            <th scope='col' class='text-center'>SENHA</th>
                            <th scope='col' class='text-center'>EDITAR</th>
                            <th scope='col' class='text-center'>EXCLUIR</th>
                        </tr>";
                foreach($resultado as $item){
                    echo "<tr>";
                        echo "<td class='text-center'>{$item->getUserNome()}</td>";
                        echo "<td class='text-center'>{$item->getUserEmail()}</td>";
                        echo "<td class='text-center'>{$item->getUserSenha()}</td>";
                        echo "<td class='text-center'><a href='atualizar.php?userNome={$item->getUserNome()}' class='btn btn-warning'>Editar</a></td>";
                        echo "<td class='text-center'><a href='../backend/action/deletar.php?userNome={$item->getUserNome()}' class='btn btn-danger'>Apagar</a></td>";
                    echo "</tr>";
                }
                echo "
                </table>
                <a href='registrar.php' class='mt-5 btn btn-primary'>HOME</a>
                </div>";
            } catch(PDOException $e){
                echo ("Ocorreu um erro inesperado: {$e->getMessage()}");
            }
        ?>
</body>
</html>