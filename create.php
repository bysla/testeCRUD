

<?php
require 'banco.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $placaErro = null;
    $marcaErro = null;
    $modeloErro = null;
    $corErro = null;
    $porteErro = null;
    $tipo_de_cargaErro = null;
    $chassisErro = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['placa'])) {
            $placa = $_POST['placa'];
        } else {
            $placaErro = 'Por favor digite a placa!';
            $validacao = False;
        }

        if (!empty($_POST['marca'])) {
            $marca = $_POST['marca'];
        } else {
            $marcaErro = 'Por favor digite a marca!';
            $validacao = False;
        }

        if (!empty($_POST['modelo'])) {
            $modelo = $_POST['modelo'];
        } else {
            $modeloErro = 'Por favor digite o modelo!';
            $validacao = False;
        }
        if (!empty($_POST['cor'])) {
            $cor = $_POST['cor'];
        } else {
            $corErro = 'Por favor digite a cor!';
            $validacao = False;
        }
        if (!empty($_POST['porte'])) {
            $porte = $_POST['porte'];
        } else {
            $porteErro = 'Por favor digite o porte!';
            $validacao = False;
        }
        if (!empty($_POST['tipo_de_carga'])) {
            $tipo_de_carga = $_POST['tipo_de_carga'];
        } else {
            $tipo_de_cargaErro = 'Por favor digite o tipo_de_carga!';
            $validacao = False;
        }
        if (!empty($_POST['chassis'])) {
            $chassis = $_POST['chassis'];
        } else {
            $chassisErro = 'Por favor digite o chassis!';
            $validacao = False;
        }


    }


    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO CadastroVeiculos (placa, marca, modelo, cor, porte, tipo_de_carga, chassis) VALUES(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($placa, $marca, $modelo, $cor, $porte, $tipo_de_carga, $chassis));
        Banco::desconectar();
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Adicionar Veiculo</title>
</head>

<body>
<div >
    <div >
        <div >
            <div >
                <h3 > Adicionar Veiculo </h3>
            </div>
            <div >
                <form action="create.php" method="post">

                    <div >
                        <label >Placa</label>
                        <div >
                            <input size="50" name="placa" type="text" placeholder="placa"
                                   value="<?php echo !empty($placa) ? $placa : ''; ?>">
                            <?php if (!empty($placaErro)): ?>
                                <span ><?php echo $placaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label >marca</label>
                        <div >
                            <input size="50" name="marca" type="text" placeholder="marca"
                                   value="<?php echo !empty($marca) ? $marca : ''; ?>">
                            <?php if (!empty($marcaErro)): ?>
                                <span ><?php echo $marcaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div >
                        <label >modelo</label>
                        <div >
                            <input size="50" name="modelo" type="text" placeholder="modelo"
                                   value="<?php echo !empty($modelo) ? $modelo : ''; ?>">
                            <?php if (!empty($modeloErro)): ?>
                                <span ><?php echo $modeloErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div >
                        <label >cor</label>
                        <div >
                            <input size="50" name="cor" type="text" placeholder="cor"
                                   value="<?php echo !empty($cor) ? $cor : ''; ?>">
                            <?php if (!empty($corErro)): ?>
                                <span ><?php echo $corErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div >
                        <label >porte</label>
                        <div >
                            <input size="50" name="porte" type="text" placeholder="porte"
                                   value="<?php echo !empty($porte) ? $porte : ''; ?>">
                            <?php if (!empty($porteErro)): ?>
                                <span ><?php echo $porteErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div >
                        <label >Tipo de carga</label>
                        <div >
                            <input size="50" name="tipo_de_carga" type="text" placeholder="tipo_de_carga"
                                   value="<?php echo !empty($tipo_de_carga) ? $tipo_de_carga : ''; ?>">
                            <?php if (!empty($tipo_de_cargaErro)): ?>
                                <span ><?php echo $tipo_de_cargaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div >
                        <label >Chassis</label>
                        <div >
                            <input size="50" name="chassis" type="text" placeholder="chassis"
                                   value="<?php echo !empty($chassis) ? $chassis : ''; ?>">
                            <?php if (!empty($chassisErro)): ?>
                                <span ><?php echo $chassisErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <br/>
                        <button type="submit" >Adicionar</button>
                        <a href="index.php" type="btn">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</body>

</html>

