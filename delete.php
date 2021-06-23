<?php
require 'banco.php';

$id = 0;

if(!empty($_GET['id']))
{
    $id = $_REQUEST['id'];
}

if(!empty($_POST))
{
    $id = $_POST['id'];

    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM CadastroVeiculos where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
    header("Location: index.php");
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Deletar veiculo</title>
    </head>

    <body>
        <div>
            <div>
                <div>
                    <h3>Excluir veiculo</h3>
                </div>
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>" />
                    <div> Deseja excluir o veiculo?
                    </div>
                    <div>
                        <button type="submit">Sim</button>
                        <a href="index.php" type="btn">Não</a>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>
