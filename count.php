<?php
include 'db.php';

// Conteo de equipos por contrato
$sql_contract_count = "SELECT Contrato, COUNT(*) AS Total FROM Eq GROUP BY Contrato";
$result_contract_count = $conn->query($sql_contract_count);

// Conteo general de equipos
$sql_general_count = "SELECT COUNT(*) AS TotalGeneral FROM Eq";
$result_general_count = $conn->query($sql_general_count);
$general_count = $result_general_count->fetch_assoc();

// Mostrar los resultados
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Conteo de Equipos</title>
</head>
<body>
    <div class="container">
        <h1>Conteo de Equipos</h1>

        <!-- Conteo general de equipos -->
        <h2>Conteo General</h2>
        <p>Total de Equipos: <?php echo $general_count['TotalGeneral']; ?></p>

        <!-- Conteo de equipos por contrato -->
        <h2>Equipos por Contrato</h2>
        <table id="countTable">
            <thead>
                <tr>
                    <th>Contrato</th>
                    <th>Total de Equipos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_contract_count->num_rows > 0) {
                    while ($row = $result_contract_count->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['Contrato']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Total']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No se encontraron registros</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.php">Volver a Inicio</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
