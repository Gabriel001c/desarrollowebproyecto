<style>
    body {
        font: 100%/1.414 "Open Sans", "Roboto", arial, sans-serif;
        background: #e9e9e9;
    }

    a,
    [type="submit"] {
        transition: all .25s ease-in;
    }

    .signup__container {
        position: absolute;
        top: 50%;
        right: 0;
        left: 0;
        margin-right: auto;
        margin-left: auto;
        transform: translateY(-50%);
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 800px;
        height: 480px;
        border-radius: 3px;
        box-shadow: 0px 3px 7px rgba(0, 0, 0, .25);
    }

    .signup__overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .76);
    }

    .container__child {
        border-radius: 10%;
        width: 50%;
        height: 100%;
        color: #fff;
    }

    .signup__thumbnail {
        position: relative;
        padding: 2rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        background: url(http://ultraimg.com/images/spectre-login.jpg);
        background-repeat: no-repeat;
        background-position: top center;
        background-size: cover;
    }

    .thumbnail__logo,
    .thumbnail__content,
    .thumbnail__links {
        position: relative;
        z-index: 2;
    }

    .thumbnail__logo {
        align-self: flex-start;
    }

    .logo__shape {
        fill: #fff;
    }

    .logo__text {
        display: inline-block;
        font-size: .8rem;
        font-weight: 700;
        vertical-align: bottom;
    }

    .thumbnail__content {
        align-self: center;
    }

    h1,
    h2 {
        font-weight: 300;
        color: rgba(255, 255, 255, 1);
    }

    .heading--primary {
        font-size: 1.999rem;
    }

    .heading--secondary {
        font-size: 1.414rem;
    }

    .thumbnail__links {
        align-self: flex-end;
        width: 100%;
    }

    .thumbnail__links a {
        font-size: 1rem;
        color: #fff;
    }

    .thumbnail__links a:focus,
    .thumbnail__links a:hover {
        color: rgba(255, 255, 255, .5);
    }

    .signup__form {
        padding: 2.5rem;
        background: #fafafa;
    }

    label {
        font-size: .85rem;
        text-transform: uppercase;
        color: #ccc;
    }

    .form-control {
        background-color: transparent;
        border-top: 0;
        border-right: 0;
        border-left: 0;
        border-radius: 0;
    }

    .form-control:focus {
        border-color: #111;
    }

    [type="text"] {
        color: #111;
    }

    [type="password"] {
        color: #111;
    }

    .btn--form {
        padding: .5rem 2.5rem;
        font-size: .95rem;
        font-weight: 600;
        text-transform: uppercase;
        color: #fff;
        background: #111;
        border-radius: 35px;
    }

    .btn--form:focus,
    .btn--form:hover {
        background: lighten(#111, 13%);
    }

    .signup__link {
        font-size: .8rem;
        font-weight: 600;
        text-decoration: underline;
        color: #999;
    }

    .signup__link:focus,
    .signup__link:hover {
        color: darken(#999, 13%);
    }
</style>
<!-- Vendor CSS Files -->
<link rel="stylesheet" href="http://localhost/cenotes/views/assets/vendor/bootstrap/css/bootstrap.min.css">
<link href="http://localhost/cenotes/views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="http://localhost/cenotes/views/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="http://localhost/cenotes/views/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="http://localhost/cenotes/views/assets/vendor/aos/aos.css" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="http://localhost/cenotes/views/assets/css/main.css" rel="stylesheet">
<div class="signup__container">
    <div class="container__child signup__thumbnail">

        <div class="thumbnail__content text-center">
            <img style="width: 50%; height: 50%; margin-bottom: 44px;" src="assets/img/company/LogoCenote.png" alt="Logo Cenotes" class="logo">
            <h1 class="heading--primary">Bienvenido a Cenote Tickets</h1>
        <h2 class="heading--secondary">Únete como creador de contenido</h2>
    </div>

    <div class="signup__overlay"></div>
</div>


<div class="container__child signup__form">
    <form action="registro" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">

        <div class="form-group">
            <label for="user">Usuario</label>
            <input class="form-control" type="text" name="user" id="user" placeholder="james.bond" required />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email" placeholder="james.bond@spectre.com" required />
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="********"
                required />
        </div>


        <div class="form-group" hidden>
            <label for="userType">Tipo de usuario:</label>
            <select class="form-control" name="userType" id="userType" required>
                <option value="">Seleccione una opción</option>
                <option value="creator">Creador de contenido</option>
                <option value="tourist" selected>Turista</option>
            </select>
        </div>

        <div class="form-group">
            <label for="profileImage">Imagen de perfil (240px x 240px)</label>
            <input class="form-control" type="file" name="profileImage" id="profileImage" accept="image/*" onchange="displayFileName(this)" />
        </div>
        <img id="profileImagePreview" src="assets/img/company/userDefault.png" alt="Imagen por defecto" style="max-width: 150px;max-height: 150px;position: fixed;border-radius: 10%;margin-top: 2%;">

        <!-- <img id="profileImagePreview" src="" alt="Vista previa de la imagen" style="max-width: 240px; max-height: 240px; margin-top: 10px;"> -->
        <script>
            function displayFileName(input) {
                var label = document.querySelector('label[for="profileImage"]');
                var previewImage = document.getElementById("profileImagePreview");

                if (input.files.length > 0) {
                label.textContent = input.files[0].name;
                var reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
                } else {
                label.textContent = "Imagen de perfil (240px x 240px)";
                previewImage.src = "assets/img/company/userDefault.png";
                }
            }
        </script>
        
        <script>
            function validarFormulario() {
                var passwordInput = document.getElementById("password");
                var password = passwordInput.value;

                if (password.length < 8) {
                    alert("La contraseña debe tener al menos 8 caracteres.");
                    return false;
                }

                if (!/[a-z]/.test(password) || !/[A-Z]/.test(password)) {
                    alert("La contraseña debe contener al menos una letra minúscula y una letra mayúscula.");
                    return false;
                }

                return true;
            }
        </script>



        <div class="m-t-lg">
            <ul class="list-inline"style= "float: right;    margin-top: 100px;">
                <li>
                    <input class="btn btn--form" type="submit" value="REGISTRAR" onchange="click(this)" />
                </li>
                <li>
                    <a class="signup__link" href="login.php">Ya soy miembro</a>
                </li>
            </ul>
        </div>
    </form>

</div>
        </div>