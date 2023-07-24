<html>

<head>
    <title>Social Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        background-image: url('bg.jpg');
        display: flex;
        justify-content: center;
        font-family: Arial, Helvetica, sans-serif;
        background-position: center;
        background-size: cover;

    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        user-select: none;
    }

    .login {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 129px;
        color: white;
        font-family: Arial, Helvetica, sans-serif;
        background-color: rgba(0, 0, 0, .6);
        border-radius: 5px;
        box-shadow: 1px 1px 20px rgba(43, 174, 168, .5);
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 10px 0;
    }

    .login header {
        margin-bottom: 25px;
        margin: 0 0 25px 0;
    }

    img {
        position: relative;
        width: 80px;
        top: 50%;
        border-radius: 50%;
        box-shadow: 1px 1px 15px #2aa18a;
    }

    .field {
        border: 1px solid #2aa18a;
        border-radius: 50px;
        background-color: transparent;
        width: 100%;
        margin-bottom: 15px;
        display: flex;
    }

    .field span {
        color: white;
        width: 40px;
        line-height: 45px;
        text-align: center;
    }

    .field input {
        width: 100%;
        height: 45px;
        font-size: 1.1rem;
        padding: 5px;
        color: #fff;
        background-color: transparent;
        border: none;
    }

    .forgot-password {
        width: 100%;
        margin-bottom: 15px;
        text-align: center;
    }

    .forgot-password a {
        color: white;
        text-decoration: none;
    }

    .forgot-password a:hover {
        text-decoration: underline;
    }

    .submit {
        display: flex;
        justify-content: center;
        width: 100%;
        height: 45px;
        margin-bottom: 25px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 1.2rem;
        color: white;
        background-color: transparent;
        border: 1px solid #2aa18a;
        border-radius: 125px;
    }

    .submit:hover {
        cursor: pointer;
        background-color: #2aa18a;
    }

    .login-form-copy {
        margin-bottom: 15px;
    }

    .login-form_sign-up {
        text-decoration: none;
        color: #2aa18a;
    }

    .social-icons {
        display: flex;
        width: 55%;
        justify-content: space-between;
        padding-bottom: 5px;
    }

    .social-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        margin-bottom: 25px;
    }

    .facebook {
        background-color: #385998;
    }

    .google {
        background-color: #CA3224;
    }

    input:focus,
    input:hover,
    input:active {
        outline: none;
    }

    .fondo {
        background-image: url(assets/wallpaperbetter.com_1920x1200.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
        width: 100%;
        position: relative;
    }

    .color-fondo {
        position: absolute;
        background-size: cover;
        height: 100%;
        width: 100%;
        background-color: #000000;
    }
    </style>
</head>

<body>
    <div class="fondo">
        <div class="color-fondo">
            <form action="/cenotes/login_session" method="POST" class="login">
                <img style ="width: 50%;height: 50%;margin-bottom: 44px;" src="views/assets/img/company/LogoCenote.png" alt="Logo Cenotes" class="logo">
                <div class="field"><span class="fa fa-user"></span><input type="text" name="email" oninput="mostrarMensaje()"
                        placeholder="Email o Usuario"></div>
                <div class="field"><span class="fa fa-lock"></span><input type="password" name="password" oninput="mostrarMensaje()"
                        placeholder="Contraseña"></div>
                <label style="<?php echo $ok ? 'display: block;' : 'display: none;'; ?>" id="mensaje">Usuario o contraseña incorrecto </label>
                        

                <input type="submit" class="submit" value="Iniciar sesión">

                <span class="login-form-copy">¿No tienes una cuenta?<a href="registro" class="login-form_sign-up">
                        Regístrate</a></span>
            </form>
        </div>
    </div>


    <script>
 
        // Función para mostrar el mensaje
        function mostrarMensaje() {
            var mensajeElement = document.getElementById('mensaje');

            mensajeElement.style.display = 'none';
            // }, 3000);
        }
 
</script>

</body>



</html>