<!DOCTYPE html>
/**
 * 📄 index.php
 * 
 * 
 * 🌐 This file contains the main HTML structure for the web application.
 * 🌍 Language: Spanish (es)
 * 
 * 🛠️ Developed as part of the "Producto integrador" project for the "DESARROLLO FRONT END" course.
 * 📅 Semester: CUARTO SEMESTRE
 * 
 * 📋 Description:
 * This file serves as the entry point for the web application, setting up the basic HTML structure and language settings.
 * 
 * 📌 Note:
 * Ensure that all necessary resources (CSS, JS, images) are correctly linked in this file.
 */
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jquery UI-->
    <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.structure.css">
    <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.theme.css">
    <!--estilos-->
    <link rel="stylesheet" href="style.css">
    <title>Producto integrador. Aplicación Web con JavaScript</title>
</head>

<body>
    <!--presentacion-->
    <div class="presentacion ui-widget-content">
        <h2>Producto integrador. Aplicación Web con JavaScript</h2>
        <h3>Alumno</h3>
        <h4>Pedro Pablo Rodriguez Gomez</h4>
        <h3>Profesor</h3>
        <h4>Carlos Alejandro Mendoza Alvarez</h4>
    </div>
    <!--imagen-->
    <br>
    <div class="imagen_portada">
        <img src="/imagenes/logo_ldsw.png" alt="logo" width="100%" height="100%">
    </div>
    <!--boton con enlace a la pagina de interfaz-->
    <br>
    <div class=" enlace">
        <a href="login.php"
            style="padding: 10px 20px; background-color: blue; color: white; border: none; cursor: pointer;">Enlace de
            ingreso a la aplicaion</a>
    </div>
    <!--jquery-->
    <script src="/jquery-3.7.1.min.js"></script>
    <!--jquery UI-->
    <script src="./jquery-ui-1.14.1.custom/jquery-ui.js"></script>
</body>

</html>