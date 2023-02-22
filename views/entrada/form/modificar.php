<h1>Modificar datos de la entrada</h1>
<!--Formulario para modificar los datos de cada la entrada-->
<form action="modificar" method="POST">

    <label for="nombre">Id</label>
    <input type="int" name="id" id="id" style="width:350px" placeholder="Introduzca id de la entrada (por orden de arriba a abajo)" required>
    <br><br>

    <label for="nombre">Titulo</label>
    <input type="text" name="titulo" id="titulo" style="width:250px" placeholder="Introduzca su titulo" required>
    <br><br>

    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" style="width:250px" placeholder="Introduzca la descripcion" required>
    <br><br>

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha" id="fecha" required>
    <br><br>

    <input type="submit" value="Modificar">
    
</form>