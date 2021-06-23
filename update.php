<?php

require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    $placaErro = null;
    $marcaErro = null;
    $modeloErro = null;
    $corErro = null;
    $porteErro = null;
    $tipo_de_cargaErro = null;
    $chassisErro = null;

    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];
    $porte = $_POST['porte'];
    $tipo_de_carga = $_POST['tipo_de_carga'];
    $chassis = $_POST['chassis'];

    //Validação
    $validacao = true;
    if (empty($placa)) {
        $placaErro = 'Por favor digite a placa!';
        $validacao = false;
    }

    if (empty($marca)) {
        $marcaErro = 'Por favor digite a marca!';
        $validacao = false;
    }

    if (empty($modelo)) {
        $modeloErro = 'Por favor digite o modelo!';
        $validacao = false;
    }

    if (empty($cor)) {
        $corErro = 'Por favor digite a cor!';
        $validacao = false;
    }

    if (empty($tipo_de_carga)) {
        $tipo_de_cargaErro = 'Por favor digite o tipo_de_carga!';
        $validacao = false;
    }

    if (empty($porte)) {
        $porteErro = 'Por favor digite o porte!';
        $validacao = false;
    }

    if (empty($chassis)) {
        $chassisErro = 'Por favor digite o chassis!';
        $validacao = false;
    }

    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE CadastroVeiculos  set placa = ?, marca = ?, modelo = ?, cor = ?, porte = ? , tipo_de_carga = ? , chassis = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($placa, $marca, $modelo, $cor, $porte,$tipo_de_carga,$chassis, $id));
        Banco::desconectar();
        header("Location: index.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM CadastroVeiculos where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $placa = $data['placa'];
    $marca = $data['marca'];
    $modelo = $data['modelo'];
    $cor = $data['cor'];
    $porte = $data['porte'];
    $tipo_de_carga = $data['tipo_de_carga'];
    $chassis = $data['chassis'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
   
    <title>Atualizar Veiculo</title>
</head>

<body>
<div >

    <div >
        <div>
            <div >
                <h3 > Atualizar Veiculo </h3>
            </div>
            <div >
                <form  action="update.php?id=<?php echo $id ?>" method="post">

                    <div >
                        <label >Placa</label>
                        <div>
                            <input name="placa"  size="50" type="text" placeholder="placa"
                                   value="<?php echo !empty($placa) ? $placa : ''; ?>">
                            <?php if (!empty($placaErro)): ?>
                                <span><?php echo $placaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label>Marca</label>
                        <div>
                            <input name="marca"  size="50" type="text" placeholder="marca"
                                   value="<?php echo !empty($marca) ? $marca : ''; ?>">
                            <?php if (!empty($marcaErro)): ?>
                                <span ><?php echo $marcaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div >
                        <label >Modelo</label>
                        <div >
                            <input name="modelo"  size="50" type="text" placeholder="modelo"
                                   value="<?php echo !empty($modelo) ? $modelo : ''; ?>">
                            <?php if (!empty($modeloErro)): ?>
                                <span ><?php echo $modeloErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div  >
                        <label >Cor</label>
                        <div >
                            <input name="cor"  size="50" type="text" placeholder="cor"
                                   value="<?php echo !empty($cor) ? $cor : ''; ?>">
                            <?php if (!empty($corErro)): ?>
                                <span ><?php echo $corErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div >
                        <label >Porte</label>
                        <div >
                            <input name="porte"  size="50" type="text" placeholder="porte"
                                   value="<?php echo !empty($porte) ? $porte : ''; ?>">
                            <?php if (!empty($porteErro)): ?>
                                <span ><?php echo $porteErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div >
                        <label >Tipo de carga</label>
                        <div >
                            <input name="tipo_de_carga"  size="50" type="text" placeholder="tipo_de_carga"
                                   value="<?php echo !empty($tipo_de_carga) ? $tipo_de_carga : ''; ?>">
                            <?php if (!empty($tipo_de_cargaErro)): ?>
                                <span ><?php echo $tipo_de_cargaErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label >Chassis</label>
                        <div >
                            <input name="chassis"  size="50" type="text" placeholder="chassis"
                                   value="<?php echo !empty($chassis) ? $chassis : ''; ?>">
                            <?php if (!empty($chassisErro)): ?>
                                <span ><?php echo $chassisErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                   
                    <br/>
                    <div >
                        <button type="submit" >Atualizar</button>
                        <a href="index.php" type="btn" >Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>
