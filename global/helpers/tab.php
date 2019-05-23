<?php
class publicSite
{
	public static function headerTemplate($title)
	{
		session_start();
		ini_set('date.timezone', 'America/El_Salvador');
		print('<!DOCTYPE html>
        <!-- IDIOMA DE LA PÁGINA -->
        <html lang="es">
            <head>
                <!-- BEGIN: Head -->
                <!-- CARACTERES ESPECIALES -->
                <meta charset="UTF-8">
                <!-- TÍTULO DE LA VENTANA -->
                <title>PopMovies | '.$title.'</title>
                <!-- ÍCONO DE LA VENTANA -->
                <link rel="shortcut icon" type="image/x-icon" href="../../resources/public/img/Logo.ico">
                <!-- MATERIAL ICONS -->
                <link href="../../resources/public/css/icon.css" rel="stylesheet">
                <!-- MATERIALIZE.MIN -->
                <link href="../../resources/public/css/materialize.min.css" rel="stylesheet">
                <!-- TAMAÑO Y FUENTE -->
                <link rel="stylesheet" type="text/css" href="../../resources/public/css/style.css">
                <!-- ESTILO -->
                <link rel="stylesheet" type="text/css" href="../../resources/public/css/users.css">
                <!-- ALLAX -->
                <link href="../../../resources/public/css/public.css" rel="stylesheet">
                <!-- END: Head-->
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            </head>'
            );
            if (isset($_SESSION['idUsuario'])) {
                $filename = basename($_SERVER['PHP_SELF']);
                if ($filename != 'index.php') {
                    self::modals();
                    
                } else {
                    header('location: main.php');
                }
            } else {
                $filename = basename($_SERVER['PHP_SELF']);
                if ($filename != 'index.php' && $filename != 'register.php') {
                    header('location: home.php');
                } else {
                    print('
                    <!-- BEGIN: Navbar -->
                        <header>
                            <nav class="black">
                                <div class="nav-wrapper">
                                    <div class="ico">
                                        <a href="#" class="brand-logo"><i class="tiny material-icons">movie</i>PopMovies</a>
                                    </div>
                                    <ul class="right">
                                        <li><a href="sass.html">Catálogo</a></li>
                                        <li><a href="sass.html">Acerca de</a></li>
                                        <li><a href="index.php">Iniciar Sesión</a></li>
                                        <li><a href="register.php">Registrarme</a></li>
                                        <li><a> </a></li>
                                    </ul>
                                </div>
                            </nav>
                        </header>
                    <!-- END: Navbar -->
				');
                }
            }
        }

    public static function footerTemplate($controller)
	{
		print('<!-- PLUGIN: Funciona para los TextBox dinámicos. -->
                <script src="../../resources/public/js/plugin.js" type="text/javascript"></script>
                <!-- CONTROLADOR. -->
                <script src="../../resources/public/controllers/'.$controller.'" type="text/javascript"></script>
            </body>
        </html>
        ');
	}

    public static function modals()
	{
        print('
        <main>
			<!-- Términos y condiciones -->
			<div id="terminos" class="modal">
				<div class="modal-content">
					<h4 class="center-align">TÉRMINOS Y CONDICIONES</h4>
					<p>Nuestra empresa ofrece los mejores productos a nivel nacional con una calidad garantizada y...</p>
				</div>
				<div class="divider"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
				</div>
			</div>
			<!-- Misión -->
			<div id="mision" class="modal">
				<div class="modal-content">
					<h4 class="center-align">MISIÓN</h4>
					<p>Ofrecer los mejores productos a nivel nacional para satisfacer a nuestros clientes y...</p>
				</div>
				<div class="divider"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
				</div>
			</div>

			<!-- Visión -->
			<div id="vision" class="modal">
				<div class="modal-content">
					<h4 class="center-align">VISIÓN</h4>
					<p>Ser la empresa lider en la región ofreciendo productos de calidad a precios accesibles y...</p>
				</div>
				<div class="divider"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
				</div>
			</div>

			<!-- Valores -->
			<div id="valores" class="modal">
				<div class="modal-content center-align">
					<h4>VALORES</h4>
					<p>Responsabilidad</p>
					<p>Honestidad</p>
					<p>Seguridad</p>
					<p>Calidad</p>
				</div>
				<div class="divider"></div>
				<div class="modal-footer">
					<a href="#!" class="modal-action modal-close btn waves-effect"><i class="material-icons">done</i></a>
				</div>
            </div>
            </main>
		');
	}

}