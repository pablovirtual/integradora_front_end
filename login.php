/**
 * login.php
 *
 * This file contains the HTML and PHP code for the login page of the web application.
 * It includes the necessary styles and scripts for the login form.
 *
 * @file login.php
 * @date 2023-10-05
 * @version 1.0
 *
 * @section DESCRIPTION
 * This page allows users to enter their email and password to log in to the application.
 * It includes a form with fields for email and password, and a submit button.
 * The form data is sent to 'autenticacion.php' for authentication.
 *
 * @section DEPENDENCIES
 * - jQuery UI (jquery-ui-1.14.1.custom)
 * - Custom styles (style.css)
 * - jQuery (jquery-3.7.1.min.js)
 *
 * @section USAGE
 * 1. Open the login page in a web browser.
 * 2. Enter your email and password in the respective fields.
 * 3. Click the "Ingresar" button to submit the form.
 *
 * @section NOTES
 * - The form uses the POST method to send data to 'autenticacion.php'.
 * - Sample credentials are provided for testing purposes.
 *
 * @section AUTHOR
 * - Your Name
 */
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--jquery UI-->
  <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.css">
  <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.structure.css">
  <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.theme.css">
  <!--estilos-->
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>login</title>
</head>
<!--formulario de ingreso-->
<body>
  <!--contenedor del formulario-->
  <div class="contenedor">
    <h1>Bienvenido</h1>
    <h2>Ingrese sus credenciales</h2>
    <div class="login ui-widget-content">
      <form class="formulario" method="POST" action="autenticacion.php">
        <label for="usuario">email</label>
        <br>
        <div class="usuario">
          <!--imagen de correo-->
          <img src="/imagenes/mail.png" alt="icono mail" height="30px">
          <input type="email" name="usuario" id="usuario" placeholder="Ingrese su email">
        </div>
        <br>
        <label for="contraseña">Contraseña</label>
        <br>
        <div class="password">
          <!--imagen de candado-->
          <img src="/imagenes/candado.png" alt="simbolo de password" height="30px">
          <input type="password" name="contraseña" id="contraseña" placeholder="Ingrese su contraseña">
        </div>
        <br>
        <!--boton de ingreso-->
        <button class="btn_formulario" type="submit">Ingresar</button>
      </form>
      <div class="credenciales">
        <p>Usuario:pedro@udg</p>
        <p>Contraseña:123</p>

      </div>
    </div>
  </div>


  <!--jquery-->
  <script src="/jquery-3.7.1.min.js"></script>
  <!--jquery UI-->
  <script src="./jquery-ui-1.14.1.custom/jquery-ui.js"></script>
  

</body>

</html>