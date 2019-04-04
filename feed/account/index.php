<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/privatelogin.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    
</head>
<body>
    
<main>
<nav class="red">

    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">PopMovies</a>
    </div>
  </nav>
   
<div class="row">
    <div class="card col s12 m4 offset-m4 white white-text" id="Login">
        <div class="card-content">
            <div class="row">
                <form id="LoginForm" method="POST">
                    <span class="card-title col s10 offset-s1 red-text">Iniciar Sesion</span>
                    <div class="input-field col s10 offset-s1">
                        <input id="Username" name="Username"  class="red-text" type="text">
                        <label for="icon_prefix">Email</label>
                    </div>
                    <div class="input-field col s10 offset-s1">
                         <input id="Password" id="Password" class="red-text" type="password" >
                         <label for="icon_telephone">Contraseña</label>
                    </div>
                   <div class="col s10 offset-s1">
                        <button type="submit" class="btn col s12 black">Entrar</button>
                   </div>
                </form>
            </div>

        </div>
        <div class="card-action center">
            <a href="resetpassword.php" class="black-text">olvide mi contraseña</a>
        </div>
    </div>
</div>

</main>

<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/dashboard/controllers/LoginController.js"></script>
</body>
</html>