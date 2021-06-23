<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css">
    <title>Página Inicial</title>
</head>

<body>
        <div>
          <div>
            <div>
                <h2>CRUD</h2>
            </div>
          </div>
            </br>
            <div>
                <p>
                    <a href="create.php">Adicionar</a>
                </p>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Cor</th>
                            <th scope="col">Porte</th>
                            <th scope="col">Tipo de carga</th>
                            <th scope="col">Chassis</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM CadastroVeiculos ORDER BY id DESC';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
			                      echo '<th scope="row">'. $row['id'] . '</th>';
                            echo '<td>'. $row['placa'] . '</td>';
                            echo '<td>'. $row['marca'] . '</td>';
                            echo '<td>'. $row['modelo'] . '</td>';
                            echo '<td>'. $row['cor'] . '</td>';
                            echo '<td>'. $row['porte'] . '</td>';
                            echo '<td>'. $row['tipo_de_carga'] . '</td>';
                            echo '<td>'. $row['chassis'] . '</td>';
                            echo '<td width=250>';
                            echo '<a href="read.php?id='.$row['id'].'">Info</a>';
                            echo ' ';
                            echo '<a href="update.php?id='.$row['id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a c href="delete.php?id='.$row['id'].'">Excluir</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</body>

</html>
