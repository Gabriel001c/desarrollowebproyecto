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
    <h1 style="color: #fff;text-align: center;">Mis Cenotes</h1>
    
    <br>
     
    <div class="table-container">
        <table style="background-color: #000;">

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
                            
                            <img style="width: 18%; height: 50%; margin-bottom: 0px; border-radius: 10px; <?php echo $cenote['comentarios'] > 0 ? 'display: block;' : 'display: none;'; ?>" src="views/assets/img/company/message.png" alt="Logo Cenotes" class="logo">

                        </td>
                        <td>
                            <form action="update_mi_cenote" method="POST">
                                <input type="hidden" name="id" value="<?php echo $cenote['id']; ?>">
                                <input type="hidden" name="nombre" value="<?php echo $cenote['nombre']; ?>">
                                <input type="hidden" name="ubicacion" value="<?php echo $cenote['ubicacion']; ?>">
                                <input type="hidden" name="fotografia"
                                value="<?php echo base64_encode($cenote['fotografia']); ?>">
                                <input type="hidden" name="informacion" value="<?php echo $cenote['informacion']; ?>">
                                <input type="hidden" name="status" value="<?php echo $cenote['status']; ?>">
                                <input class="action-button" type="submit" value="Ver">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <a id="back-button" href="/cenotes" style= "color: #fff;">Volver</a>
        <a id="back-button" href="create_cenote" style= "color: #fff;">Crear Cenote</a>
    </body>
    </html>
    