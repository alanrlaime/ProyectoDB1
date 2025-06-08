<?php
include('../../conexionDB.php');  // Ajusta la ruta según tu proyecto

// Validar que recibimos el CI
if (!isset($_GET['ci'])) {
    die("Error: No se especificó el usuario.");
}

$ci = intval($_GET['ci']);
$error = '';
$success = '';

// Procesar formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger y limpiar datos
    $paterno = $conexion->real_escape_string($_POST['paterno']);
    $materno = $conexion->real_escape_string($_POST['materno']);
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $sexo = $_POST['sexo'] === 'M' ? 'M' : 'F';
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $correo = $conexion->real_escape_string($_POST['correo']);
    $ciudad = $conexion->real_escape_string($_POST['ciudad']);
    $zona = $conexion->real_escape_string($_POST['zona']);
    $calle = $conexion->real_escape_string($_POST['calle']);
    $usuario = $conexion->real_escape_string($_POST['usuario']);
    // Para la clave: solo actualizar si se envió y no está vacía
    $clave = isset($_POST['clave']) && $_POST['clave'] !== '' ? password_hash($_POST['clave'], PASSWORD_DEFAULT) : null;

    // Actualizar en la base de datos
    if ($clave) {
        $sql = "UPDATE PERSONA SET
            Paterno = '$paterno',
            Materno = '$materno',
            Nombre = '$nombre',
            Sexo = '$sexo',
            Fecha_Nacimiento = '$fecha_nacimiento',
            Telefono = '$telefono',
            Correo = '$correo',
            Ciudad = '$ciudad',
            Zona = '$zona',
            Calle = '$calle',
            Usuario = '$usuario',
            Clave = '$clave'
            WHERE CI = $ci";
    } else {
        $sql = "UPDATE PERSONA SET
            Paterno = '$paterno',
            Materno = '$materno',
            Nombre = '$nombre',
            Sexo = '$sexo',
            Fecha_Nacimiento = '$fecha_nacimiento',
            Telefono = '$telefono',
            Correo = '$correo',
            Ciudad = '$ciudad',
            Zona = '$zona',
            Calle = '$calle',
            Usuario = '$usuario'
            WHERE CI = $ci";
    }

    if ($conexion->query($sql)) {
        $success = "Usuario actualizado correctamente.";
    } else {
        $error = "Error al actualizar: " . $conexion->error;
    }
}

// Obtener datos actuales del usuario para mostrar en el formulario
$result = $conexion->query("SELECT * FROM PERSONA WHERE CI = $ci");
if ($result->num_rows === 0) {
    die("Usuario no encontrado.");
}
$usuario_data = $result->fetch_assoc();

?>

<h2>Editar Usuario CI: <?php echo $ci; ?></h2>

<?php if ($error): ?>
    <div style="color:red;"><?php echo $error; ?></div>
<?php endif; ?>

<?php if ($success): ?>
    <div style="color:green;"><?php echo $success; ?></div>
<?php endif; ?>

<form method="post">
    <label>Paterno:<br>
        <input type="text" name="paterno" value="<?php echo htmlspecialchars($usuario_data['Paterno']); ?>" required>
    </label><br><br>

    <label>Materno:<br>
        <input type="text" name="materno" value="<?php echo htmlspecialchars($usuario_data['Materno']); ?>" required>
    </label><br><br>

    <label>Nombre:<br>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario_data['Nombre']); ?>" required>
    </label><br><br>

    <label>Sexo:<br>
        <select name="sexo" required>
            <option value="M" <?php if ($usuario_data['Sexo'] === 'M') echo 'selected'; ?>>Masculino</option>
            <option value="F" <?php if ($usuario_data['Sexo'] === 'F') echo 'selected'; ?>>Femenino</option>
        </select>
    </label><br><br>

    <label>Fecha de Nacimiento:<br>
        <input type="date" name="fecha_nacimiento" value="<?php echo $usuario_data['Fecha_Nacimiento']; ?>" required>
    </label><br><br>

    <label>Teléfono:<br>
        <input type="text" name="telefono" value="<?php echo htmlspecialchars($usuario_data['Telefono']); ?>">
    </label><br><br>

    <label>Correo:<br>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($usuario_data['Correo']); ?>">
    </label><br><br>

    <label>Ciudad:<br>
        <input type="text" name="ciudad" value="<?php echo htmlspecialchars($usuario_data['Ciudad']); ?>">
    </label><br><br>

    <label>Zona:<br>
        <input type="text" name="zona" value="<?php echo htmlspecialchars($usuario_data['Zona']); ?>">
    </label><br><br>

    <label>Calle:<br>
        <input type="text" name="calle" value="<?php echo htmlspecialchars($usuario_data['Calle']); ?>">
    </label><br><br>

    <label>Usuario:<br>
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario_data['Usuario']); ?>" required>
    </label><br><br>

    <label>Clave (dejar vacío para no cambiar):<br>
        <input type="password" name="clave">
    </label><br><br>

    <button type="submit">Actualizar Usuario</button>
</form>
