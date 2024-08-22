<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>CRUD de Equipos</title>
</head>
<body>
    <h1>Gestión de Equipos</h1>

    <!-- Formulario de búsqueda -->
     <h6>Buscar</h6>
    <form id="searchForm" method="GET" action="search.php">
        <input type="text" id="search" name="search" placeholder="Buscar por Número de Equipo o Contrato">
        <button type="submit">Buscar</button>
    </form>

    <!-- Formulario para crear/editar un equipo -->
    <form id="eqForm" method="POST" action="create.php">
        <input type="text" name="N_EQ" placeholder="Número de Equipo" required>
        <select name="Tipo_eq" required>
            <option value="Portatil">Portatil</option>
            <option value="Escritorio">Escritorio</option>
        </select>
        <input type="text" name="Usu_eq" placeholder="Usuario del Equipo" required>
        <select name="Estado" required>
            <option value="Bueno">Bueno</option>
            <option value="Averiado H o S">Averiado H o S</option>
            <option value="Malo">Malo</option>
        </select>
        <input type="text" name="Contrato" placeholder="Contrato" required>
        <input type="text" name="jef_cont" placeholder="Jefe de Contrato" required>
        <button type="submit">Guardar</button>
    </form>

    <!-- Tabla de equipos -->
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
            
        </tbody>
    </table>

    <!-- Pestaña para contar equipos por contrato -->
    <div id="contractCount">
        <h2>Equipos por Contrato</h2>
        <button onclick="countByContract()">Ver Conteo</button>
        <div id="countResult"></div>
    </div>

    <script src="script.js"></script>
</body>
</html>
