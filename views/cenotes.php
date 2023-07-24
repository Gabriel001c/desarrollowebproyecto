<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Cenotes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
        }

        .table-container {
            max-height: 600px; /* Altura máxima del div */
            overflow-y: auto; /* Habilitar el desplazamiento vertical */
            margin-bottom: 20px;
            margin-top: 20px;
            margin-inline: 5%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #2aa18a;
            color: #333;
            font-weight: bold;
        }

        .cenote-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #back-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #2aa18a;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            margin-right: 30px;
            float: right;
        }

        #back-button:hover {
            background-color: #555;
        }
            /* Estilos para el campo de entrada de búsqueda */

    </style>
</head>
<body>
    <h1 style="color: #fff;text-align: center;">Cenotes</h1>

    <input type="text" id="filter-input-cenotes" placeholder="Buscar por nombre" style="padding: 8px;border: 1px solid #ccc;border-radius: 4px;margin-bottom: 10px;width: 80%;margin-left: 10%;box-sizing: border-box;" oninput="filterTable()">

    <div class="table-container">
        <table style="background-color: #000;" id="tabla-cenotes">

            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Fotografía</th>
                    <th>Información</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cenotes as $cenote): ?>
                    <tr>
                        <td><?php echo $cenote['nombre']; ?></td>
                        <td><?php echo $cenote['ubicacion']; ?></td>
                        <td><img class="cenote-image" src="data:image/jpeg;base64,<?php echo base64_encode($cenote['fotografia']); ?>" alt="Fotografía"></td>
                        <td><?php echo $cenote['informacion']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- <a id="back-button" href="panel">Volver</a> -->

    
    <script>
        function filterTable() {
        // Obtener el valor del campo de entrada de texto
        var filterValue = document.getElementById("filter-input-cenotes").value.toUpperCase();

        // Obtener la tabla específica por su identificador único
        var table = document.getElementById("tabla-cenotes");

        // Obtener todas las filas de la tabla
        var rows = table.getElementsByTagName("tr");

        // Recorrer todas las filas, empezando por la segunda (índice 1) para evitar la fila de encabezados
        for (var i = 1; i < rows.length; i++) {
            var nameColumn = rows[i].getElementsByTagName("td")[0];
            if (nameColumn) {
                var nameValue = nameColumn.textContent || nameColumn.innerText;
                // Si el valor del nombre coincide con el filtro, mostrar la fila; de lo contrario, ocultarla
                if (nameValue.toUpperCase().indexOf(filterValue) > -1) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
</script>

</body>
</html>
