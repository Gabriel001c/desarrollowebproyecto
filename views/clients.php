<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Usuarios</title>
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
            background-color: #000;

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

        img.profile-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
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
            float: right; /* Agregado */
        }
        #back-button:hover {
            background-color: #555;
        }

        @media (max-width: 600px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }

            img.profile-image {
                width: 40px;
                height: 40px;
            }

            #back-button {
                font-size: 14px;
                padding: 8px 12px;
            }
            #filter-input {
                
            }
        }
    </style>
</head>
<body>
    
    <br>
    <h1 style="color: #fff;text-align: center;">Turistas Registrados</h1>
    <input type="text" id="filter-input-clients" placeholder="Buscar por nombre" style="padding: 8px;border: 1px solid #ccc;border-radius: 4px;margin-bottom: 10px;width: 80%;margin-left: 10%;box-sizing: border-box;" oninput="filterTableClient()">
    
    <div class="table-container">
        <table id="tabla-clients" style="background-color: #000;">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Tipo de Usuario</th>
                    <th>Imagen de Perfil</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <?php if ($usuario['tipo_usuario'] === 'tourist'): ?>
                        <tr>
                            <td><?php echo $usuario['email']; ?></td>
                            <td><?php echo $usuario['tipo_usuario']; ?></td>
                            <td>
                                <img class="profile-image" src="data:image/jpeg;base64,<?php echo base64_encode($usuario['imagen_perfil']); ?>" alt="Imagen de Perfil">
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
        </table>
    </div>
    <!-- <a id="back-button" href="panel">Volver</a> -->


    
    <script>
        function filterTableClient() {

                    // Obtener el valor del campo de entrada de texto
        var filterValue = document.getElementById("filter-input-clients").value.toUpperCase();

        // Obtener la tabla específica por su identificador único
        var table = document.getElementById("tabla-clients");

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
