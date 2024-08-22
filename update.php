<?php
include 'db.php';

$N_eq = $_GET['N_eq'];

$sql = "SELECT * FROM Eq WHERE N_eq='$N_eq'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("No se encontró el equipo.");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Actualizar Equipo</title>
</head>
<body>
    <div class="container">
        <h1>Actualizar Equipo</h1>

        <form method="POST" action="create.php">
            <input type="text" name="N_eq" value="<?php echo $row['N_eq']; ?>" readonly>
            <select name="Tipo_eq" required>
                <option value="Escritorio" <?php echo ($row['Tipo_eq'] == 'Escritorio') ? 'selected' : ''; ?>>Escritorio</option>
                <option value="Portatil" <?php echo ($row['Tipo_eq'] == 'Portatil') ? 'selected' : ''; ?>>Portatil</option>
            </select>
            <input type="text" name="Usu_eq" value="<?php echo $row['Usu_eq']; ?>" required>
            <select name="Estado" required>
                <option value="Bueno" <?php echo ($row['Estado'] == 'Bueno') ? 'selected' : ''; ?>>Bueno</option>
                <option value="Averiado H o S" <?php echo ($row['Estado'] == 'Averiado H o S') ? 'selected' : ''; ?>>Averiado H o S</option>
                <option value="Malo" <?php echo ($row['Estado'] == 'Malo') ? 'selected' : ''; ?>>Malo</option>
            </select>
            <input type="text" name="Contrato" value="<?php echo $row['Contrato']; ?>" required>
            <input type="text" name="Jef_cont" value="<?php echo $row['Jef_cont']; ?>" required>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>