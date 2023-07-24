<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Cenote</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f2f2f2;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="file"]:focus,
        textarea:focus {
            outline: none;
            border-color: #4CAF50;
        }

        textarea {
            height: 120px;
        }

        input[type="submit"] {
            display: flex;
            background-color: #2aa18a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            float: right;
            margin-top: -36px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #back-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        #back-button:hover {
            color: #555;
        }

        /* Estilos para la sección de comentarios del administrador */
        .comments-section {
            margin: 20px auto;
            max-width: 800px;
        }

        .comment-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #222;
        }

        .comment-content {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .comment-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comment-date {
            font-size: 14px;
            color: #999;
        }

        .comment-actions {
            display: flex;
        }

        .delete-comment-btn {
            background-color: #ff0000;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
            transition: background-color 0.3s ease;
        }

        .delete-comment-btn:hover {
            background-color: #e00000;
        }
    </style>
</head>
<body>
    <form action="actualizar_mi_cenote" method="POST" style="color:#000;">
        <div>
            <input type="hidden" name="id" value="<?php echo $cenote['id']; ?>">
        </div>
        <div>
            <label for="nombre">Nombre de cenote:</label>
            <input type="text" id="nombre" name="nombre" required value="<?php echo htmlspecialchars($cenote['nombre']); ?>">
        </div>
        <div>
            <label for="ubicacion">Ubicación de cenote:</label>
            <input type="text" id="ubicacion" name="ubicacion" required value="<?php echo htmlspecialchars($cenote['ubicacion']); ?>">
        </div>
        <div>
            <label for="informacion">Información:</label>
            <textarea id="informacion" name="informacion" required><?php echo htmlspecialchars($cenote['informacion']); ?></textarea>
        </div>
        
        <div>
            <label for="status">Status:
                <?php echo $cenote['status'] == 1 ? 'Aprobado' : 'No Aprobado'; ?>
                <input type="text" hidden id="status" name="status" value="<?php echo htmlspecialchars($cenote['status']); ?>">

            </label>
        </div>
        <div>
            <a id="back-button" href="mis_cenotes">Cancelar</a>
            <a onclick="confirmarEliminar()" style="display: inline-block;
            background-color: #ff0000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 100px;">Eliminar</a>
            <input type="submit" value="Actualizar" style="    position: absolute;margin-left: 16%;">
        </div>
    </form>

    <!-- JavaScript para la ventana de confirmación -->
    <script>
        function confirmarEliminar() {
            if (confirm('¿Estás seguro de que quieres eliminar este cenote?')) {
                // Si el usuario hace clic en "Aceptar", enviamos el formulario para eliminar el cenote
                document.querySelector('form').action = 'eliminar_mi_cenote';
                document.querySelector('form').submit();
            }
        }
    </script>



<div class="comments-section">
        <h2 style="    text-align: center;">Comentarios del administrador</h2>
        <?php foreach ($comentarios as $comentario) { ?>
            <div class="comment-item">
                <p class="comment-content"><?php echo $comentario['comentario']; ?></p>
                <div class="comment-info">
                    <!-- <span class="comment-date"><?php echo $comentario['fecha']; ?></span> -->
                    <div class="comment-actions">
                        <!-- Agrega aquí cualquier acción adicional que desees -->
                        <!-- <button class="delete-comment-btn" onclick="eliminarComentario(<?php echo $puntuacion['id']; ?>)">Eliminar</button> -->
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- JavaScript para eliminar comentarios -->
    <script>
        function eliminarComentario(commentId) {
            if (confirm('¿Estás seguro de que quieres eliminar este comentario?')) {
                 
            }
        }
    </script>
</body>
</html>
