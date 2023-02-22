<h1>Publicar Entrada</h1>
<!--Formulario para publicar entrada-->
    <form action="publicar" method="POST">
        <label for="categoria_id">usuario_id</label>
        <input type="int" name="usuario_id" id="usuario_id" placeholder="Introduzca el usuario_id" required >
        <br><br>

        <label for="categoria_id">categoria_id</label>
        <input type="int" name="categoria_id" id="categoria_id" style="width:260px" placeholder="Introduzca id por orden de categorias (1-5)" required >
        <br><br>

        <label for="titulo">titulo</label>
        <input type="text" name="titulo" id="titulo" placeholder="Introduzca el titulo" required >
        <br><br>

        <label for="descripcion">descripcion</label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Introduzca la descripcion" required >
        <br><br>

        <label for="fecha">fecha</label>
        <input type="date" name="fecha" id="fecha" required >
        <br><br>

        <input type="submit" value="Publicar">
        
    </form>
