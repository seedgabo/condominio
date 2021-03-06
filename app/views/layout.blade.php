<?php
$message = Session::get('message');
$status = Session::get('status', null);
Auth::check() ? $notificaciones = Notificacion::noleidas(Auth::user()->id): $notificaciones = null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="google-site-verification" content="nCYyxZBXHh47-5gKHv0E7QcyyOYPihhituEsGQttmgU" />
	<title>@yield('title', Config::get('var.nombre', 'Tu Condominio Online'))</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{-- Estilos css propios --}}
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
	<!-- Libreria de Iconos -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Latest compiled and minified CSS & JS -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Compiled and minified JavaScript -->
	<script src="{{asset('js/materialize.min.js')}}"></script>
	{{-- Link a FAVICON --}}
	<link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />

	{{-- Librerias adicionales por plantillas hijas --}}
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>

	@yield('head', ' ')
	{{-- Estilo para Footer siempre debajo --}}
	<style type="text/css">
		body {
			display: flex;
			min-height: 100vh;
			flex-direction: column;
			background-color: #fffff;

		}

		main {
			flex: 1 0 auto;
		}
	</style>
</head>
<body>

	@include('menu')


	{{-- Contenido Principal --}}
	<main>
		@yield('contenido', '')
	</main>

	{{-- CHAT --}}
	@if(Auth::check())
		<div class="chat-container">
			<h5 class="center  blue accent-2 white-text">
				<span class="title-chat">
					<i class="fa fa-comments"></i> CHAT
				</span>
				<small>
					<a href="{{url('chat')}}" class="white-text chat-close" target="_blank"><i class="fa fa-external-link"></i></a>
					<span class="chat-close right"><i class="fa fa-times"></i></span>
				</small>
			</h5>
			<iframe style="display:none" id="chat" src="" width="100%" height="100%"></iframe>
			<script>
			var chatEnable =false;
			$('.title-chat').click(function(){
				if(!chatEnable){
					$('.chat-container').css('height',"250px");
					$('.chat-container').css('bottom',"6%");
					$('#chat').attr("src","{{url('chat-frame')}}");
					$('#chat').css('display',"block");
					chatEnable = true;
				}
			});
			$(".chat-close").click(function(){
				$('.chat-container').remove();
			});

			</script>
		</div>
	@endif

	<!-- Modal de iniciar session -->
	<div id="modallogin" class="modal">
		<div class="modal-content">
			<a href="#" class=" pull-right waves-effect waves-green btn-flat modal-action modal-close">X</a>
			<h4>Iniciar Sessión</h4>
			<form action="{{url('user')}}" method="post">
				<div class="input-field">
					<i class="material-icons prefix">account_circle</i>
					<input id="correo" type="text" name="email" class="validate">
					<label for="correo">Correo</label>
				</div>
				<div class="input-field col s6">
					<i class="material-icons prefix">lock_outline</i>
					<input id="contraseña" type="password" name="password" class="validate">
					<label for="contraseña">Contraseña</label>
				</div>
				<div class="pull-right">
					<a href="{{url('login/facebook')}}" class="waves-effect waves-light btn btn-small blue darken-2"><i class="fa fa-facebook"></i></a>
					<a href="{{url('login/google')}}" class="waves-effect waves-light btn btn-small red"><i class="fa fa-google-plus"></i></a>
					<button type="submit" class="btn waves-effect waves-light"><i class="right fa fa-sign-in"></i> Iniciar Sesión</button>
				</div>
				<a href="forgot-password" class="btn-small btn-outline">Olvido su contraseña</a>
				<br>
			</form>
		</div>
	</div>


	{{-- Footer --}}
	<footer  style="background-image: url(http://www.img.lirent.net/2014/10/Android-Lollipop-wallpapers-Download.jpg)" class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h6 class="black-text">¿Quieres tu propio servicio de Condominio online?</h6>
					<form action="{{url('contacto')}}" method="GET">
						<input type="email" name="emailContact" class="form-control col s12 m8 l8" id="" required placeholder="Deja tu Correo">
						<button type="submit" class="btn col s12 offset-l1 offset-m1 m3 l3">Enviar</button>
					</form>
				</div>
				<div class="col l4 offset-l2 s12">
					<ul>
						<li class="big-hover">
							<a href="mailto:seedgabo@gmail.com" class="black-text"> <i class="fa fa-send-o"></i> Correo</a>
						</li>
						<li class="big-hover">
							<a href="https://ve.linkedin.com/pub/gabriel-bejarano/98/817/711" class="black-text text-lighten-3"> <i class="fa fa-linkedin"></i> Linkendin</a>
						</li>
						<li class="big-hover">
							<a href="tel:+573212441949" class="black-text text-lighten-3"> <i class="fa fa-phone"></i> Llamanos: 321 244 1949</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="footer-copyright">
			<div class="container black-text">
				© 2015 Copyright , Derechos de Autor Reservados a SeeD Ltda. ResidenciasOnline Ltda es una división de Seed Ltda.
			</div>
		</div>
	</footer>

	{{--  boton FAB --}}
	<div id="fab" class="fixed-action-btn" style="bottom: 45px; right: 28px;">
		<a type="button" class="btn-floating btn-large  z-depth-1 pink accent-3"><i id="fab-btn" class="material-icons">add</i></a>
		<ul>
			<li>
				<a href="{{url("agregar-noticia")}}" type="button" class="btn-floating red tooltipped" data-position="left" data-delay="10" data-tooltip="Nueva Noticia"><i class="fa fa-newspaper-o"></i></a>
			</li>
			<li><a href="{{url("agregar-recibo")}}" type="button" class="btn-floating blue tooltipped" data-position="left" data-delay="10" data-tooltip="Registrar Pago"><i class="fa fa-money"></i></a></li>
			<li><a href="{{url("agregar-evento")}}" type="button" class="btn-floating green tooltipped" data-position="left" data-delay="10" data-tooltip="Agregar Evento al Calendario"><i class="fa fa-calendar-plus-o"></i></a></li>
			<li><a href="{{url("agregar-imagen")}}" type="button" class="btn-floating yellow tooltipped" data-position="left" data-delay="10" data-tooltip="Subir una imagen"><i class="fa fa-picture-o"></i></a></li>
		</ul>
	</div>



	<script>
		$(document).ready(function () {
		$(".button-collapse").sideNav({});

		$('select').material_select();

		$('.modal-trigger').leanModal();

		if ("{{$message or ''}}".length != 0) {
			Materialize.toast("{{$message}}", 5000, "{{$status or 'rounded'}}");
		}

		$("#fab").hover(
			function(){$("#fab-btn").css('transform', 'rotate(405deg)')},
			function(){$("#fab-btn").css('transform', 'rotate(0deg)');
		});
	});
	</script>
</body>
</html>