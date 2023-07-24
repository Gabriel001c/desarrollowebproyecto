<?php
$assets_path = dirname(dirname(__DIR__)) . '/views/assets/';

function isPageActive($currentPage, $page)
{
    return $currentPage === $page ? 'active' : '';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cenotes</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="http://localhost/cenotes/views/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="http://localhost/cenotes/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="http://localhost/cenotes/views/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="http://localhost/cenotes/views/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="http://localhost/cenotes/views/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="http://localhost/cenotes/views/assets/css/main.css" rel="stylesheet">

    <style>
        /* Clase para el enlace activo */
        .active {
            color: red; /* Cambia el color de las letras según tu preferencia */
            /* Otros estilos adicionales que desees aplicar */
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="" class="logo d-flex align-items-center  me-auto me-lg-0">
                <img style="width: 18%;height: 50%;margin-bottom: 0px;border-radius: 10px;"
                    src="views/assets/img/company/LogoCenote.png" alt="Logo Cenotes" class="logo">
                <h1>Cenote tickets</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <?php $request_uri = $_SERVER['REQUEST_URI'];
                        $path = parse_url($request_uri, PHP_URL_PATH);
                         ?>
                    <li><a href="index.php" class="<?php echo isPageActive($path, '/cenotes/'); ?>">Home </a></li>
                    <li><a href="views/top_ten.php" class="<?php echo isPageActive($path, '/cenotes/top'); ?>">Top 10 cenotes</a></li>
                    <?php
                    // Verificar si existe la cookie "token"
                    if (isset($_COOKIE['token'])) {
                        // Si existe la cookie, mostrar el botón de Logout
                        if (isset($_COOKIE['tipo_usuario']) && $_COOKIE['tipo_usuario'] == 'admin') {
                            echo '<li><a href="panel">Panel</a></li>';
                        } else {
                            echo '<li><a href="views/mis_cenotes.php">Mis Cenotes</a></li>';
                        }

                        echo '<li><a href="logout">Logout</a></li>';
                    } else {
                        // Si no existe la cookie, mostrar el botón de Login
                        echo '<li><a href="views/login.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </nav><!-- .navbar -->

            <div class="header-social-links">
                <a href="#" class="twitter"><img style="height: 30px;"
                        src="views/assets/img/company/twitter.png" alt="Twitter"></a>
                <a href="#" class="facebook"><img style="height: 30px;"
                        src="views/assets/img/company/facebook.png" alt="Facebook"></a>
                <a href="#" class="instagram"><img style="height: 30px;"
                        src="views/assets/img/company/instagram.png" alt="Instagram"></a>
                <a href="#" class="linkedin"><img style="height: 30px;"
                        src="views/assets/img/company/linkedin.png" alt="LinkedIn"></a>
            </div>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

    <!-- Resto del código HTML... -->

</body>

</html>
