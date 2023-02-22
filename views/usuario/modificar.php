<h1>Modificar datos</h1>
<p>Podra cambiar su nombre y su email</p>
<form action="modificarUsuario" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" style="width:250px" placeholder="Introduzca su nuevo nombre" required>
    <br><br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" style="width:250px" placeholder="Introduzca su nuevo email" required>
    <br><br>

    <label for="nombre">Usuario</label>
    <input type="text" name="usuario" id="usuario" style="width:250px" placeholder="Introduzca su nombre de usuario" required>
    <br><br>

    <input type="submit" value="Modificar">
    
</form>