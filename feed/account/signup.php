<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PopMovies | Registrarme</title>
    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.signup.css">
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
  <div class="card col s12 m4 offset-m4" id="SignUpCard">
      <div class="card-content">
      <span class="card-title center">¡Registrate!</span>
        <div class="row">
          <form class="col s12 m12" method="POST" id="CreateUserForm">
            <div class="row">
              <div class="input-field col s10 offset-s1">
                <i class="material-icons prefix black-text">account_circle</i>
                <input id="AdminUserName" type="text" name="AdminUserName" placeholder="Ingrese su nombre">
              </div>
              <div class="input-field col s10 offset-s1">
                <i class="material-icons prefix  black-text">account_circle</i>
                <input id="AdminUserLastName" type="text" name="AdminUserLastName" placeholder="Ingrese sus apellidos">
              </div>
              <div class="input-field col s10 offset-s1">
                <i class="material-icons prefix  black-text">assignment_ind</i>
                <input id="Username" name="Username" type="text" placeholder="Ingrese su nombre de usuario">
              </div>
              <div class="input-field col s10 offset-s1">
                <i class="material-icons prefix  black-text">mail</i>
                <input id="AdminUserEmail" name="AdminUserEmail" type="text" placeholder="Ingrese su correo">
              </div>
              <div class="input-field col s10 offset-s1">
                <i class="material-icons prefix  black-text">vpn_key</i>
                <input id="AdminUserPassword" name="AdminUserPassword" type="password" placeholder="Ingrese su contraseña">
              </div>
              <div class="input-field col s10 offset-s1">
                <i class="material-icons prefix  black-text">vpn_key</i>
                <input id="AdminUserRepeatPassword" name="AdminUserRepeatPassword"  type="password" placeholder="Repita su contraseña">
              </div>
                <button type="submit" class="btn col s12 red">Registrarme</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
</main>

<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script>
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/dashboard/controllers/SignUpController.js"></script>  
</body>
</html>