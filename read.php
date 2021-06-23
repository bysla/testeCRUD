<?php
require 'banco.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM CadastroVeiculos where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css">
    <title>Informações do veiculo</title>
</head>

<body>
<div>
    <div>
        <div>
            <div>
                <h3>Informações do veiculo</h3>
            </div>
            <div>
                <div >
                    <div>
                        <label class="control-label">Placa:</label>
                        <div class="controls ">
                            <label >
                                <?php echo $data['placa']; ?>
                            </label>
                        </div>
                    </div>

                    <div >
                        <label class="control-label">Marca:</label>
                        <div class="controls  disabled">
                            <label >
                                <?php echo $data['marca']; ?>
                            </label>
                        </div>
                    </div>

                    <div >
                        <label class="control-label">Modelo:</label>
                        <div class="controls  disabled">
                            <label >
                                <?php echo $data['modelo']; ?>
                            </label>
                        </div>
                    </div>

                    <div >
                        <label class="control-label">Cor:</label>
                        <div class="controls  disabled">
                            <label >
                                <?php echo $data['cor']; ?>
                            </label>
                        </div>
                    </div>

                    <div >
                        <label class="control-label">Porte:</label>
                        <div class="controls form-check disabled">
                            <label >
                                <?php echo $data['porte']; ?>
                            </label>
                        </div>
                    </div>

                    <div >
                        <label class="control-label">Tipo de carga:</label>
                        <div class="controls form-check disabled">
                            <label >
                                <?php echo $data['tipo_de_carga']; ?>
                            </label>
                        </div>
                    </div>

                    <div >
                        <label class="control-label">Chassis:</label>
                        <div class="controls form-check disabled">
                            <label >
                                <?php echo $data['chassis']; ?>
                            </label>
                        </div>
                    </div>
                    <br/>
                    <div>
                        <a href="index.php" type="btn" >Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
