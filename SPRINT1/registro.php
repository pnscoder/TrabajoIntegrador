<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/estilosformulario.css">
  <link rel="stylesheet" href="css/formularioestilotablet.css">
  <title>Registro</title>
</head>
<body>


<div class="contenedor">

  <div class="container">
<h2>Registrese</h2>


<form class="formulario" action="index.html" method="post">


  <div class="campo" id="nombre">
  <label class="" for="">Nombre:
  <input type="text" name="nombre" value="" required>
  </label>
</div>


<div class="campo" id="apellido">
  <label for="">Apellido:
  <input type="text" name="apellido" value="" required>
  </label>
  </div>
  <br>


<div class="campo" id="edad">
  <label for="edad">Edad:
  <input type="number" name="anios" min="1" max="99">
  </label>
  </div>


<div class="campo" id="sexo">
  <p>
    Sexo:<br>
    <input type="radio" name="sexo" value="hombre">Hombre<br>
    <input type="radio" name="sexo" value="mujer">Mujer<br>
  </p>
  </div>


<div class="campo" id="fecha">
  <p >Fecha de nacimiento:</p>

  <label for="">dia:
  <select name="dia">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
  </select>
  </label>

  <label for="">mes:
  <select name="mes">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
  </select>
  </label>

    <label for="">año:
  <select name="anio">
    <option value="1990">1990</option>
    <option value="1991">1991</option>
    <option value="1992">1992</option>
    <option value="1993">1993</option>
    <option value="1994">1994</option>
    <option value="1995">1995</option>
    <option value="1996">1996</option>
    <option value="1997">1997</option>
  </select>
  </label>
  </div>
<br>

  <div class="campo" id="mail">
    <label for="">E-Mail:
  <input type="email" name="correo" placeholder="nombre@abcdefg.com" required>
  </label>
  </div>

<br>
<div class="campo" id="direccion">
  <label for="">Direccion:
  <input type="text" placeholder="Calle" required></label>
  <label for=""><input type="text" placeholder="Numero" required></label>
  <label for=""><input type="text" placeholder="Codigo postal" required></label>
  <label for=""><input type="text" placeholder="Localidad" required></label>
  <label for=""><input type="text" placeholder="Provincia" required></label>
  <label for=""><input type="text" placeholder="Pais" required ></label>

</div>


<br>
  <div class="campo" id="tel">
    <label for="">Telefono:
  <input type="text" name="tel" value="">
  </label>
</div>
<br>


<div class="campo" >
  <label for="">Ingrese contraseña:
<input type="password" name="password" value="">
</label>
</div>

<br>

<div class="campo" >
  <label for="">Repita contraseña:
<input type="password" name="password" value="">
</label>
</div>


  <br>

  <div class="campo">
    <label for="">Consultas y comentarios:
  <input type="textarea" name="comentarios">
</label>
</div>

  <br>

<div class="campo" id="aceptacion">
  <label for="">
<input type="checkbox" name="acepto" value="acepto" required>
He leido y acepto la politica de privacidad</label>
</div>

<br>

<div class="campo">
<label for="">
<input type="checkbox" name="acepto" value="acepto" >
Acepto recibir novedades por e-mail</label>
</div>


<br>
<div class="envio">
<button type="submit" name="enviar">Enviar</button>
<button type="reset" name="reset">Borrar</button>
</div>


</form>

</div>

</div>


</body>
</html>
