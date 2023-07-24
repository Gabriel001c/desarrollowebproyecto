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
            display: inline-block;
            background-color: #2aa18a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 211px;
            /* float: right; Agregado */
        }

        input[type="submit"]:hover {
            background-color: #2ad18a;
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
    </style>
</head>
<body >
    <form action="create_cenote_push" method="POST" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre de cenote:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="ubicacion">Ubicación de cenote:</label>
            <input type="text" id="ubicacion" name="ubicacion" required>
        </div>
        <div>
            <label for="fotografia">Fotografía:</label>
            <input type="file" id="fotografia" name="fotografia" accept="image/*" required>
        </div>
        <div>
            <label for="informacion">Información:</label>
            <textarea id="informacion" name="informacion" required></textarea>
        </div>
        <div>
            <a id="back-button" href="mis_cenotes">Cancelar</a>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>
