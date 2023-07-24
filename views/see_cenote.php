<!DOCTYPE html>
<html>
<head>
    <title>Información del Cenote</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
        }

        #container {
            max-width: 50%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            border-bottom: 2px solid #2aa18a;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        p {
            margin: 10px 0;
            text-align: center;
        }

        hr {
            border-color: #2aa18a;
        }

        .gallery-item {
            text-align: center;
        }

        .comment-rating {
            margin-bottom: 5px;
        }

        .comment-content {
            margin-bottom: 15px;
            margin-left: 5px;
            text-align: left;
        }

        .comment-form {
            margin-top: 20px;
        }

        .comment-form label {
            display: block;
        }

        .comment-form textarea {
            width: 100%;
            height: 80px;
            padding: 5px;
            margin-top: 5px;
            resize: vertical;
        }

        .comment-form input[type="submit"] {
            background-color: #2aa18a;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .comment-form input[type="submit"]:hover {
            background-color: #555;
        }

        .star-rating {
            display: flex;
            justify-content: center;
            margin-top: 5px;
        }

        .comment-item {
            text-align: center;
            margin-bottom: 20px;
        }

        .comment-item img {
            max-width: 43px;
            border-radius: 50%;
        }

        .comment-info {
            display: flex;
            justify-content: left;
            align-items: center;
            margin-bottom: 10px;
        }

        #back-button {
            float: right;
            background-color: #2aa18a;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
        }

        #back-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Información del Cenote</h1>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($cenote['fotografia']); ?>" style="width: -webkit-fill-available;" alt="User Image">

        <div>
            <label for="nombre">Nombre de cenote:</label>
            <p id="nombre"><?php echo htmlspecialchars($cenote['nombre']); ?></p>
        </div>
        <div>
            <label for="ubicacion">Ubicación de cenote:</label>
            <p id="ubicacion"><?php echo htmlspecialchars($cenote['ubicacion']); ?></p>
        </div>
        <div>
            <label for="informacion">Información:</label>
            <p id="informacion"><?php echo htmlspecialchars($cenote['informacion']); ?></p>
        </div>
        <div hidden>
            <label for="status">Status:</label>
            <p id="status"><?php echo ($cenote['status'] == 1) ? 'Aprobado' : 'No aprobado'; ?></p>
        </div>

        <hr>

        <div class="row justify-content-center">
            <?php
            $contador = 0;
            foreach ($puntuaciones as $puntuacion) {
                $rating = $puntuacion['puntuacion'];
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="comment-item">
                    <div class="comment-info">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($puntuacion['imagen_perfil']); ?>" alt="User Image">
                        <p class="comment-content"><?php echo $puntuacion['usuario']; ?></p>
                        <div class="star-rating" style="    display: flex;margin-top: 19px;margin-left: 46px;position: absolute;">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span class="star-rating">&#9733;</span>'; // Estrella llena
                            } else {
                                echo '<span class="star-rating">&#9734;</span>'; // Estrella vacía
                            }
                        }
                        ?>
                    </div>
                    </div>
                    
                    <p class="comment-content"><?php echo $puntuacion['comentario']; ?></p>
                </div>
            </div>
            <?php
                $contador++;
            }
            ?>
        </div>

        <div class="comment-form" <?php if (!isset($_COOKIE['id_usuario'])) { echo 'style="display: none;"'; } ?>>
            <hr>
            <form action="new_puntuacion" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="puntuacion">Nueva calificación:</label>
                    <input type="hidden" name="id_cenote" value="<?php echo $cenote['id']; ?>">
                    <select id="puntuacion" name="puntuacion">
                        <option value="1">&#9733;</option>
                        <option value="2">&#9733;&#9733;</option>
                        <option value="3">&#9733;&#9733;&#9733;</option>
                        <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                        <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                    </select>
                </div>
                <div>
                    <label for="comentario">Nuevo comentario:</label>
                    <textarea id="comentario" name="comentario" required></textarea>
                </div>
                <div>
                    <input type="hidden" name="id_usuario" value="<?php echo $_COOKIE['id_usuario'] ?>">
                </div>
                <div>
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </div>
        <a id="back-button" style="margin-top: 30%;" href="/cenotes">Volver</a>
    </div>
</body>
</html>
