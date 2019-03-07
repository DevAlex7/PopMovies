<!DOCTYPE html>
<html lang="en">
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
    <div class="card col s12 m4 offset-m4 red white-text" id="Login">
        <div class="card-content">
            <div class="row">
                <form>
                    <span class="card-title col s10 offset-s1">Iniciar Sesion</span>
                    <div class="input-field col s10 offset-s1">
                        <input id="icon_prefix"  class="white-text" type="text">
                        <label for="icon_prefix">First Name</label>
                    </div>
                    <div class="input-field col s10 offset-s1">
                         <input id="icon_telephone" class="white-text" type="password" >
                         <label for="icon_telephone">Contraseña</label>
                    </div>
                   <div class="col s10 offset-s1">
                        <button class="btn col s12 black">enviar</button>
                   </div>
                </form>
            </div>

        </div>
    </div>
</div>

</main>

<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script>  
</body>
</html>