<?php
include 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$search = $conn->real_escape_string($search);

// Buscar por Número de Equipo o Contrato
$sql = "SELECT * FROM Eq WHERE N_eq LIKE '%$search%' OR Contrato LIKE '%$search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['N_eq']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Tipo_eq']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Usu_eq']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Estado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Contrato']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Jef_cont']) . "</td>";
        echo "<td><a href='update.php?N_eq=" . urlencode($row['N_eq']) . "'>Editar</a> | <a href='delete.php?N_eq=" . urlencode($row['N_eq']) . "'>Eliminar</a></td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No se encontraron registros</td></tr>";
}

$conn->close();

?>
