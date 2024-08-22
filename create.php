<?php
include 'db.php';

$N_EQ = $_POST['N_EQ'];
$Tipo_eq = $_POST['Tipo_eq'];
$Usu_eq = $_POST['Usu_eq'];
$Estado = $_POST['Estado'];
$Contrato = $_POST['Contrato'];
$jef_cont = $_POST['jef_cont'];

// Verificar si el equipo ya existe para actualización
$sql = "SELECT * FROM Eq WHERE N_EQ='$N_EQ'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Actualización
    $sql = "UPDATE Eq SET Tipo_eq='$Tipo_eq', Usu_eq='$Usu_eq', Estado='$Estado', Contrato='$Contrato', jef_cont='$jef_cont' WHERE N_EQ='$N_EQ'";
} else {
    // Creación
    $sql = "INSERT INTO Eq (N_EQ, Tipo_eq, Usu_eq, Estado, Contrato, jef_cont) VALUES ('$N_EQ', '$Tipo_eq', '$Usu_eq', '$Estado', '$Contrato', '$jef_cont')";
}

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
