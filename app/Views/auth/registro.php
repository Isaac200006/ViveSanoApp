<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
        <!---heading---->
        <header class="heading"> Registrar</header>
        <hr>
        </hr>
        <!---Form starting---->
        <div class="row ">
            <!--- For Name---->
            <div class="col-sm-12">
                <div class="row">
                    <form id="login-form" class="form" action="<?= site_url('auth/guardar'); ?>" method="post">
                        <div class="col-xs-4">
                            <label class="lastname" for="username" class="text-info">Nombre:</label><br>

                        </div>
                        <div class="col-xs-8">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre" required>
                        </div>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xs-4">
                        <label class="correo" for="username" class="text-info">Correo:</label><br>

                    </div>
                    <div class="col-xs-8">
                        <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingrese correo" required>
                    </div>
                </div>
            </div>
            <!-----For email---->
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xs-4">
                        <label class="contraseña" for="password" class="text-info">Contraseña:</label><br>

                    </div>
                    <div class="col-xs-8">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese contraseña" required>
                        <input type="hidden" name="rol" id="rol" value="1" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xs-4">
                        <label class="contraseña2" for="password" class="text-info">Repite la contraseña:</label>

                    </div>
                    <div class="col-xs-8">
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Repita contraseña" required>
                    </div>
                </div>

                <div id="submit-btn" class="form-group">
                    <input type="submit" name="submit" onclick="return validar();" class="btn btn-success btn-md" value="Confirmar">
                </div>
            </div>
            </form>
        </div>


    </div>

</body>

<script>
    function validar() {
        let clave, clave2;
        clave = document.querySelector('#password').value;
        clave2 = document.querySelector('#password2').value;

        if (clave !== clave2) {
            alert('Las claves son diferentes');
            return false;
        }
        return true;
    }
</script>
</body>


<style>
    body {
        background-image: url(https://blog.supermercadosmas.com/wp-content/uploads/2019/08/retomar-vida-sana.jpg);

        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 100vh;
        overflow: auto;
    }

    /*-----for border----*/
    .container {
        font-family: Roboto, sans-serif;
        background-image: url(https://www.fundacionibercaja.es/public/pub/img/salud4.png);

        border-style: 1px solid black;
        margin: 0 auto;
        text-align: center;

        margin-top: 10px;
        box-shadow: 2px 5px 5px 0px #000;
        max-width: 500px;
        padding-top: 1px;
        height: 363px;
        margin-top: 100px;
    }

    /*--- for label of first and last name---*/
    .lastname {
        margin-left: 100px;
        font-family: sans-serif;
        font-size: 14px;
        color: black;
        margin-top: 13px;
    }

    .correo {
        margin-left: 100px;
        font-family: sans-serif;
        font-size: 14px;
        color: black;
        margin-top: 13px;
    }




    /*---for heading-----*/
    .heading {
        text-decoration: bold;
        text-align: center;
        font-size: 30px;
        color: black;
        padding-top: 10px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .mail {
        margin-left: 44px;
        font-family: sans-serif;
        color: white;
        font-size: 14px;
        margin-top: 13px;
        font-family: Georgia, 'Times New Roman', Times, serif;

    }

    .contraseña {
        color: black;
        margin-top: 13px;
        font-size: 14px;
        font-family: sans-serif;
        margin-left: 70px;
        font-family: Georgia, 'Times New Roman', Times, serif;


    }

    .contraseña2 {
        width: 170px;
        color: black;
        margin-right: 40px;

        margin-top: 13px;
        font-size: 14px;
        font-family: sans-serif;
        font-family: Georgia, 'Times New Roman', Times, serif;



    }

    #register-link {
        margin-top: 3px;
    }

    #submit-btn {
        margin-top: 20px;
        margin-left: 120px;
    }

    input {
        margin-top: 7px;
    }
</style>

</html>