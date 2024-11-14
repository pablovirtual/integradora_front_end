<?php 
include 'data_base.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST['usuario'];
    $password = $_POST['contraseña'];

    if(empty($email) || empty($password)){
        echo "Por favor llena todos los campos";
} else {
    // ! me revisar esta parte del codigo
    $stmt = $conn->prepare("SELECT * FROM usuarios_autorizados WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();
}

if($stmt->num_rows > 0){
    echo "Bienvenido";
} else {
    echo "Usuario o contraseña incorrectos";
}
}
?>

