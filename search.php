<?php
include 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$search = $conn->real_escape_string($search);

$sql = "SELECT * FROM Eq WHERE N_eq LIKE '%$search%' OR Contrato LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Resultados de Búsqueda</title>
</head>
<body>
    <div class="container">
        <h1>Resultados de Búsqueda</h1>
        <table id="eqTable">
            <thead>
                <tr>
                    <th>Número de Equipo</th>
                    <th>Tipo de Equipo</th>
                    <th>Usuario del Equipo</th>
                    <th>Estado</th>
                    <th>Contrato</th>
                    <th>Jefe de Contrato</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['N_eq'] . "</td>";
                        echo "<td>" . $row['Tipo_eq'] . "</td>";
                        echo "<td>" . $row['Usu_eq'] . "</td>";
                        echo "<td>" . $row['Estado'] . "</td>";
                        echo "<td>" . $row['Contrato'] . "</td>";
                        echo "<td>" . $row['Jef_cont'] . "</td>";
                        echo "<td><a href='update.php?N_eq=" . $row['N_eq'] . "'>Editar</a> | <a href='delete.php?N_eq=" . $row['N_eq'] . "'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No se encontraron registros</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="index.php">Volver a Inicio</a>
    </div>
</body>
</html>
