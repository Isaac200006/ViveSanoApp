<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Iniciar Sesion</title>
</head>

<body>
    <div class="sidenav">
        <div class="login-main-text">

            <img id="logo" src="https://cirugiaobesidadmarbella.com/wp-content/uploads/2018/07/kisspng-obesity-bariatric-surgery-health-medicine-diabetes-risk-5acb25d0c1e0a9.1143610215232629287941-1024x1024.png" alt="" width="290px" height="250px">
            <br><br>

            <p style="text-align: center;">Accede a nuestra plataforma y verifica tu IMC</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form id="login-form" class="form" action="<?= site_url('auth/login'); ?>" method="post">
                    <div class="form-group">
                        <label id="usuario">Correo</label>
                        <input id="datos" type="email" name="correo" id="correo" class="form-control" placeholder="Correo" required>
                    </div>
                    <div class="form-group">
                        <label id="usuario2">Contraseña</label>
                        <input id="datos" type="password" name="password" id="password" class="form-control" placeholder="contraseña" required>
                    </div>
                    <input id="iniciar" type="submit" name="submit" class="btn btn-primary btn-md" value="Iniciar">
                    <div id="registro">
                        <p id="info-parrafo">¿no tienes cuenta?</p>
                        <a id="registro" href="<?= site_url('auth/registro'); ?>">Registrate</a>

                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
<style>
    body {
        font-family: "Lato", sans-serif;
        background: #5433FF;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #A5FECB, #20BDFF, #5433FF);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #A5FECB, #20BDFF, #5433FF);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }



    .main-head {
        height: 150px;
        background: blue;

    }

    .sidenav {
        height: 100%;
        background: #ECE9E6;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #FFFFFF, #ECE9E6);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #FFFFFF, #ECE9E6);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        overflow-x: hidden;
        padding-top: 20px;
    }


    .main {
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }
    }

    @media screen and (max-width: 450px) {
        .login-form {
            margin-top: 10%;
        }

        .register-form {
            margin-top: 10%;
        }
    }

    @media screen and (min-width: 768px) {
        .main {
            margin-left: 40%;
        }

        .sidenav {
            width: 40%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }

        .login-form {
            margin-top: 50%;
        }

        .register-form {
            margin-top: 20%;
        }
    }


    .login-main-text {
        margin-top: 20%;
        padding: 60px;
        color: black;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }


    #usuario {
        margin-left: 340px;
        font-size: large;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    #usuario2 {
        margin-left: 330px;
        font-size: large;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    #logo {
        margin-left: 70px;
    }

    #registro {
        margin-top: 10px;
        margin-left: 170px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: blue;


    }

    #iniciar {
        width: 120px;
        margin-left: 320px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }

    #datos {

        margin-left: 190px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }

    #info-parrafo {
        margin-top: 20px;
        margin-left: 140px;
        width: 300px;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: black;

    }
</style>

</html>