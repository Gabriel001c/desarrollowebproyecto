<!DOCTYPE html>
<html>
<head>
    <title>Top Ten Cenotes</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        h1 {
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }
        li {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }
        .image {
            width: 200px;
            height: 200px;
            margin-right: 20px;
            border-radius: 50%;
            overflow: hidden;
        }
        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        h2 {
            margin: 0;
        }
        p {
            margin: 10px 0;
        }
        .container {
            max-height: 88vh;
            overflow-y: auto;
            margin-top: 7%;
            max-width: inherit;
        }
    </style>
</head>
<body >
    <div class="container">
        <h1 style="text-align: center;">Top Ten Cenotes</h1>
        
        <?php if (isset($cenotes) && is_array($cenotes)): ?>
        <ul>
            <?php foreach ($cenotes as $cenote): ?>
                <?php if ($cenote['status'] != '0'): ?>
                    <li>

                        <div>

                            <hr >
                            <h2><?php echo $cenote['nombre']; ?></h2>
                            <img style="width: 200px;height: 200px;margin-right: 20px;border-radius: 50%;overflow: hidden;" src="data:image/jpeg;base64,<?php echo base64_encode($cenote['fotografia']); ?>" alt="Imagen de Cenote">

                            <p><strong>Ubicación:</strong> <?php echo $cenote['ubicacion']; ?></p>
                            <!-- <p><?php echo $cenote['informacion']; ?></p> -->
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
<?php else: ?>
    <p>No hay cenotes disponibles actualmente.</p>
<?php endif; ?>
    </div>
</body>
</html>
