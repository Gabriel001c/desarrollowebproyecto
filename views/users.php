<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Usuarios</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        img {
            width: 50px;
            height: 50px;
        }
        #back-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            margin-right: 30px;
            float: right; /* Agregado */
        }

        .profile-image {
            width: 240px;
            height: 240px;
        }
    </style>
</head>
<body>
    <a id="back-button" href="panel">Volver</a>

    <br>

    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Tipo de Usuario</th>
                <th>Imagen de Perfil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <?php if ($usuario['tipo_usuario'] === 'creator'): ?>
                    <tr>
                        <td><?php echo $usuario['email']; ?></td>
                        <td><?php echo $usuario['tipo_usuario']; ?></td>
                        <td style="width: 240px; height: 240px;">
                            <img class="profile-image" src="data:image/jpeg;base64,<?php echo base64_encode($usuario['imagen_perfil']); ?>" alt="Imagen de Perfil">
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
