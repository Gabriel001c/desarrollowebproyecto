 

<!-- ======= End Page Header ======= -->
<head>
    <title>Cenotes Yucatecos</title>
    <!-- Agrega el enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agrega tus estilos personalizados aquí si los tienes -->
</head>
<body style="background-color: #000;color: aliceblue;margin-left: 4%;">
<div class="page-header d-flex align-items-center">
    <div class="container position-relative">
        <div class="row d-flex justify-content-center" style="margin-left: -50%;margin-right: -50%;">
            <div class="col-lg-6 text-center">
                <h2>Cenotes Yucatecos</h2>
<!-- ======= Start Carousel Section ======= -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 rounded-image" style="max-height: 400px; object-fit: cover;" src="views/assets/img/company/carusel/car_01.jpg" alt="Imagen 1">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 rounded-image" style="max-height: 400px; object-fit: cover;" src="views/assets/img/company/carusel/car_02.jpg" alt="Imagen 2">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 rounded-image" style="max-height: 400px; object-fit: cover;" src="views/assets/img/company/carusel/car_03.jpg" alt="Imagen 3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- ======= End Carousel Section ======= -->


                <p><br><br><h4>Descubriendo los Tesoros Ocultos de la Península: Cenotes Mágicos</h4>

Bienvenidos a nuestra página web sobre cenotes, un rincón dedicado a explorar y compartir la maravilla natural de estos tesoros subterráneos en la mágica Península de Yucatán, México. Sumérgete con nosotros en el fascinante mundo de los cenotes, donde la belleza de la naturaleza se encuentra con la historia y la espiritualidad en un entorno único y cautivador.

<br><br><b><h4>¿Qué son los cenotes?</h4></b>

<br>Los cenotes son depósitos de agua dulce que se forman a través de la disolución de la roca caliza, comúnmente encontrada en la Península de Yucatán. Estas formaciones geológicas son una de las características más distintivas de la región. Los mayas, antiguos habitantes de la península, consideraban los cenotes como fuentes sagradas de agua y los utilizaban para rituales ceremoniales y actividades cotidianas.

<br><br><b><h4>La belleza de los cenotes:</h4></b>

<br>Imagina estar rodeado de estalactitas y estalagmitas mientras la luz del sol se filtra desde arriba, pintando el agua cristalina de colores impresionantes. Los cenotes son un espectáculo natural que te dejará sin aliento. Con diferentes tipos de cenotes, como abiertos, semiabiertos o subterráneos, cada uno ofrece una experiencia única para los visitantes.

<br><br><b><h4>Explora con nosotros:</h4></b>

<br>En nuestro sitio web, encontrarás guías detalladas sobre los cenotes más espectaculares y menos conocidos. Te proporcionaremos consejos sobre cómo planificar tu visita, qué llevar contigo y cómo respetar la vida silvestre y la cultura local. A través de nuestras fotos y relatos, esperamos inspirarte a que te aventures y descubras los secretos que estos cenotes tienen para ofrecer.

<br><br>¡Prepárate para un viaje inolvidable a los cenotes de la Península de Yucatán! Nos emociona compartir contigo esta experiencia única y guiarte en este fascinante mundo subterráneo lleno de historia, espiritualidad y maravillas naturales. ¡Bienvenido a la magia de los cenotes!</p>
            </div>
        </div>
    </div>
</div><!-- End Page Header -->

<!-- ======= Gallery Single Section ======= -->

<!-- ======= Start Gallery Section ======= -->
<div class="gallery" style="margin-bottom: 8%;">
    <div class="row justify-content-center">
        <?php
        $contador = 0;
        foreach ($cenotes as $cenote) {
            if ($contador % 5 == 0 && $contador != 0) {
                echo '</div><div class="row justify-content-center">';
            }
        ?>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="gallery-item">
                    <img class="rounded-image" style="width: 250px; height: 250px; cursor: pointer; border-radius: 50%;" src="data:image/jpeg;base64,<?php echo base64_encode($cenote['fotografia']); ?>" alt="Imagen" onclick="submitForm(<?php echo $cenote['id']; ?>);">
                    <!-- <label style="font-size: 25px;background-color: #e0ecff00;color: #fff;border: aliceblue;" class="action-button"  value= "<?php echo $cenote['nombre']; ?>" onclick="submitForm(<?php echo $cenote['id']; ?>);"> -->
            <label for="nombre" style="font-size: 25px;" onclick="submitForm(<?php echo $cenote['id']; ?>);"><?php echo $cenote['nombre']; ?></label>
                    
                    <form id="form_<?php echo $cenote['id']; ?>" action="see_cenote" method="POST" style="display: none;">
                        <input type="hidden" name="id" value="<?php echo $cenote['id']; ?>">
                        <input type="hidden" name="nombre" value="<?php echo $cenote['nombre']; ?>">
                        <input type="hidden" name="ubicacion" value="<?php echo $cenote['ubicacion']; ?>">
                        <input type="hidden" name="fotografia" value="<?php echo base64_encode($cenote['fotografia']); ?>">
                        <input type="hidden" name="informacion" value="<?php echo $cenote['informacion']; ?>">
                        <input type="hidden" name="status" value="<?php echo $cenote['status']; ?>">
                        
                    </form>
                </div>
            </div>
        <?php
            $contador++;
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
<script>
    function submitForm(id) {
        document.getElementById('form_' + id).submit();
    }
</script>
<!-- ======= End Gallery Section ======= -->
 
<style>
    /* .rounded-image {
        border-radius: 50%;
    } */
</style>

  