<?php
include 'db.php';

$N_EQ = $_GET['N_eq'];

$sql = "DELETE FROM Eq WHERE N_eq='$N_eq'";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
