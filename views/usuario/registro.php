<h1>registrarse</h1>

<form action="index.php?controller=usuario&action=save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required >

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" required>

    <input type="submit" value="Registrarse">
</form>