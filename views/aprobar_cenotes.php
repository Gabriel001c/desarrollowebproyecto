<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Cenotes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000; /* Fondo negro */
            color: #FFFFFF; /* Letras blancas */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            color: #FFFFFF; /* Letras blancas */
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
            color: #FFFFFF; /* Letras blancas */
        }

        th {
            background-color: #2aa18a; /* Color verde */
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
            background-color: #2aa18a; /* Color verde */
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-right: 30px;
            float: right;
        }

        #back-button:hover {
            background-color: #45a049;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: inline-block;
            margin-bottom: 5px;
            color: #FFFFFF; /* Letras blancas */
        }

        select,
        input[type="submit"] {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            background-color: #2aa18a; /* Color verde */
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: #FFFFFF; /* Letras blancas */
        }

        select:hover,
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        select {
            margin-right: 10px;
        }

        .status-approved {
            color: #2aa18a; /* Color verde */
            font-weight: bold;
        }

        .status-not-approved {
            color: #F0F8FF; /* Color blanco */
            font-weight: bold;
        }

        .action-button {
            padding: 8px 12px;
            background-color: #000000; /* Fondo negro */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: #FFFFFF; /* Letras blancas */
        }

        .table-container {
            max-height: 600px; /* Altura máxima del div */
            overflow-y: auto; /* Habilitar el desplazamiento vertical */
            margin-bottom: 20px;
            margin-top: 20px;
            margin-inline: 5%;
        }
        .action-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body style="padding-left: 29px;padding-right: 30px;">
    <h1 style="color: #fff;text-align: center;">Aprobar Cenotes</h1>
    
    <br>
    <input type="text" id="filter-input-aprobar" placeholder="Buscar por nombre" style="padding: 8px;border: 1px solid #ccc;border-radius: 4px;margin-bottom: 10px;width: 80%;margin-left: 10%;box-sizing: border-box;" oninput="filterTableAprobar()">

    
    <!-- Agrega el filtro -->
    <form action="aprobar_cenotes_filter" method="POST">
        <label for="filtro">Filtrar por estatus:</label>
        <select name="filtro" id="filtro">
            <option value="0">No aprobado</option>
            <option value="1">Aprobado</option>
        </select>
        <input type="submit" value="Filtrar">
    </form>
    <div class="table-container">
        <table style="background-color: #000;" id="tabla-aprobar">

            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Fotografía</th>
                    <th>Información</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody >
                <?php foreach ($cenotes as $cenote): ?>
                    <tr>
                        <td><?php echo $cenote['nombre']; ?></td>
                        <td><?php echo $cenote['ubicacion']; ?></td>
                        <td><img class="cenote-image"
                        src="data:image/jpeg;base64,<?php echo base64_encode($cenote['fotografia']); ?>"
                        alt="Fotografía"></td>
                        <td><?php echo $cenote['informacion']; ?></td>
                        <td class="<?php echo $cenote['status'] == 1 ? 'status-approved' : 'status-not-approved'; ?>">
                            <?php echo $cenote['status'] == 1 ? 'Aprobado' : 'No aprobado'; ?>
                        </td>
                        <td>
                            <form action="update_cenote" method="POST">
                                <input type="hidden" name="id" value="<?php echo $cenote['id']; ?>">
                                <input type="hidden" name="nombre" value="<?php echo $cenote['nombre']; ?>">
                                <input type="hidden" name="ubicacion" value="<?php echo $cenote['ubicacion']; ?>">
                                <input type="hidden" name="fotografia"
                                value="<?php echo base64_encode($cenote['fotografia']); ?>">
                                <input type="hidden" name="informacion" value="<?php echo $cenote['informacion']; ?>">
                                <input type="hidden" name="status" value="<?php echo $cenote['status']; ?>">
                                <input class="action-button" type="submit" value="Editar">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- <a id="back-button" href="panel" style= "color: #fff;">Volver</a> -->

        
    
    <script>
        function filterTableAprobar() {

                    // Obtener el valor del campo de entrada de texto
        var filterValue = document.getElementById("filter-input-aprobar").value.toUpperCase();

        // Obtener la tabla específica por su identificador único
        var table = document.getElementById("tabla-aprobar");

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
    