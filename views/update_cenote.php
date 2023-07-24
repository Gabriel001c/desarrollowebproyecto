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
            margin-left: 211px;
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
    <form action="actualizar_cenote" method="POST" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="id" value="<?php echo $cenote['id']; ?>">
        </div>
        <div>
            <label for="nombre">Nombre de cenote:</label>
            <input type="text" id="nombre" name="nombre" required readonly  value="<?php echo htmlspecialchars($cenote['nombre']); ?>">
        </div>
        <div>
            <label for="ubicacion">Ubicación de cenote:</label>
            <input type="text" id="ubicacion" name="ubicacion" required readonly  value="<?php echo htmlspecialchars($cenote['ubicacion']); ?>">
        </div>
        <div>
            <label for="informacion">Información:</label>
            <textarea id="informacion" name="informacion" required readonly ><?php echo htmlspecialchars($cenote['informacion']); ?></textarea>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="0" <?php if ($cenote['status'] == 0) echo 'selected'; ?>>No aprobado</option>
                <option value="1" <?php if ($cenote['status'] == 1) echo 'selected'; ?>>Aprobado</option>
            </select>
        </div>
        <div>
            <a id="back-button" href="panel">Cancelar</a>
            <a style = "display: inline-block;background-color: #2aa18a;color: white;padding: 10px 20px;border: none;border-radius: 4px;cursor: pointer;transition: background-color 0.3s ease;margin-left: 118px;">Eliminar</a>
            <!-- <b type="submit" value="Enviar"> -->
            <input type="submit" value="Enviar">
        </div>
    </form>


        
        <!-- mostrar comentarios -->

        <div class="comments-section" style="color:#fff;">
    <h2 style="text-align: center;">Comentarios del administrador</h2>
    <?php foreach ($comentarios as $comentario) { ?>
        <div class="comment-item">
            <form action="eliminar_mi_comentario" method="POST" style="display:none;">
                <input type="hidden" name="id" value="<?php echo $comentario['id']; ?>">
            </form>
            <p class="comment-content"><?php echo $comentario['comentario']; ?></p>
            <div class="comment-info">
                <!-- <span class="comment-date"><?php echo $comentario['fecha']; ?></span> -->
                <div class="comment-actions">
                    <!-- Agrega aquí cualquier acción adicional que desees -->
                    <button class="delete-comment-btn" onclick="eliminarComentario(<?php echo $comentario['id']; ?>)">Eliminar</button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<!-- JavaScript para eliminar comentarios -->
<script>
    function eliminarComentario(commentId) {
        console.log("id: ", commentId);
        if (confirm('¿Estás seguro de que quieres eliminar este comentario?')) {
            // Obtener el formulario correspondiente al comentario específico
            var form = document.querySelector('form[action="eliminar_mi_comentario"]');
            // Asignar el valor del comentario al input "id" del formulario
            form.querySelector('input[name="id"]').value = commentId;
            // Enviar el formulario
            form.submit();
        }
    }
</script>




<!-- agregar comentarios -->
        <div id="comentario-form-container" style="display: none;">
            <form action="new_comentario" method="POST" enctype="multipart/form-data">
 
                <div>
                    <label for="comentario">Nuevo comentario:</label>
                    <textarea id="comentario" name="comentario" required></textarea>
                </div>
                <div>
                    <input type="hidden" name="id_usuario" value="<?php echo $_COOKIE['id_usuario'] ?>">
                    <input type="hidden" name="id_cenote" value="<?php echo $cenote['id']; ?>">
                </div>
                <div>
                    <!-- <button type="button" id="cancelar-comentario">Cancelar</button> -->
                    <button id="cancelar-comentario" id="cancelar-comentario" style="display: inline-block;padding: 10px 15px;background-color: #333;color: #fff;text-decoration: none;border-radius: 4px;margin-top: 0px;transition: background-color 0.3s ease;">Cancelar</button>
                    <input type="submit" style="margin-top: 2vh;" value="Enviar">
                </div>
            </form>
        </div>
        
        <button type="button" id="mostrar-form-comentario" style="display: inline-block;background-color: rgb(42, 161, 138);color: white;padding: 10px 20px;border: none;    border-radius: 4px;margin-left: 53%;margin-top: 0px;">Enviar Comentario</button>
        
        <script>
            const mostrarFormComentarioBtn = document.getElementById('mostrar-form-comentario');
            const comentarioFormContainer = document.getElementById('comentario-form-container');
            const cancelarComentarioBtn = document.getElementById('cancelar-comentario');
            
            mostrarFormComentarioBtn.addEventListener('click', () => {
                comentarioFormContainer.style.display = 'block';
                mostrarFormComentarioBtn.style.display = 'none';
            });
            
            cancelarComentarioBtn.addEventListener('click', () => {
                comentarioFormContainer.style.display = 'none';
                mostrarFormComentarioBtn.style.display = 'inline-block';
            });
        </script>

</body>
</html>
