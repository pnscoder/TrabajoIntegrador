<?php
	include("header.php");
	if(isset($_SESSION['islogin']) and $_SESSION['islogin']==true){
		header("Location:index.php");
	}
?>
		<section class="columnas">
			<div class="titulo">
			<h1>LOGIN / REGISTRO</h1>
			<hr />
			</div>
			<div class="content">
				<div class="col6">
					<div>
						<form action="<?=$action?>" method="POST">
							<h2>Logueate</h2>
							<strong>Ingresar Mail</strong><br/>
							<input type="hidden" name="opcion" value="login" />
							<input type="email" placeholder="Mail" name="mail"  required="required" />
							<br/>
							<strong>Ingresar Clave</strong><br/>
							<input type="password" placeholder="Contrase&ntilde;a" name="clave"  required="required" />
							<br/>
							<div class="col-md-12 text-center">
								<button class="btn btn-default" type="submit">Ingresar</button>
							</div>
						</form>
					</div>		  
				</div>		  
				<div class="col6">
					<div>
						<form action="<?=$action?>" method="POST" enctype="multipart/form-data">
							<h2>Registrate</h2>
							<input type="hidden" name="opcion" value="registrar" />
							<strong>Apellido y nombre</strong><br/>
							<input type="text" placeholder="Apellido y nombre" name="apellidonombre"  
								   value="<?php if(isset($_SESSION['apellidonombre'])){echo $_SESSION['apellidonombre'];}?>" />
							<br/>
							<strong>Ingresar Mail</strong><br/>
							<input type="email" placeholder="Mail" name="mail"  
								   value="<?php if(isset($_SESSION['mail'])){echo $_SESSION['mail'];}?>" />
							<br/>
							<strong>Foto de Perfil</strong><br/>
							<input type="file" name="archivo" />
							<br/>
							<strong>Ingresar Clave</strong><br/>
							<input type="password" placeholder="Contrase&ntilde;a" name="clave"  />
							<br/>
							<strong>Repetir Clave</strong><br/>
							<input type="password" placeholder="Repetir Contrase&ntilde;a" name="repetirclave"  />
							<br/>
							<div class="col-md-12 text-center">
								<button class="btn btn-default" type="submit">Registrar</button>
							</div>
						</form>
					</div>		  
				</div>		  
			</div>		  
		</section>
    </div>
    <footer>
		<div class="contenedor">
			<p class="copy">Copyright 2017 Todos los derechos reservados </p>
			<ul class="social">
				<li><a href="http://twitter.com" target="_blank"><img src="iconos/twitter.png" alt="twitter"></a></li>
				<li><a href="http://instagram.com" target="_blank"><img src="iconos/instagram.png" alt="instagram"></a></li>
				<li><a href="https://web.whatsapp.com/" target="_blank"><img src="iconos/whatsapp.png" alt="whatsapp"></a></li>
			</ul>
		</div>
    </footer>

  </body>
</html>
