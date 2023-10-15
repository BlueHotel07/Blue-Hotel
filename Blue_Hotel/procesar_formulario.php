<?php

header('Location: http://localhost/Blue_Hotel/index.html');

$servername = "localhost";
$username = "root"; // Por defecto, el nombre de usuario de MySQL en XAMPP es "root".
$password = ""; // Deja la contraseña en blanco por defecto.
$dbname = "reservas"; // Reemplaza con el nombre de tu base de datos.

// Establece la conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica la conexión
// if (!$conn) {
//     die("Conexión fallida: " . mysqli_connect_error());
// } else {
//     echo "Conexión exitosa"; // Agrega esta línea para verificar la conexión.
// }

// Obtiene los valores del formulario
$arrival_date = $_POST['arrival_date'];
$departure_date = $_POST['departure_date'];
$guests = $_POST['guests'];

$sql = "INSERT INTO reserva (arrival_date, departure_date, guests) VALUES ('$arrival_date', '$departure_date', '$guests')";

// if (mysqli_query($conn, $sql)) {
//     echo "Datos almacenados con éxito en la base de datos.";
// } else {
//     echo "Error al almacenar datos: " . mysqli_error($conn);
// }

if (mysqli_query($conn, $sql)) {
    // Redirigir a una página de éxito o a cualquier otra página que desees
    header('Location: index.html');
    exit(); // Asegura que el script se detenga después de la redirección
} else {
    echo "Error al almacenar datos: " . mysqli_error($conn);
}

mysqli_close($conn);

?>