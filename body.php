<div class="encabezado text-center">	
  <h1> Practica presencial tema 1 php </h1>
</div>    

<div class="centrar">	
  <div class="container cuerpo text-center">	
    <p><h2> Datos de usuario:</h2></p>
    <?php echo validez($errors); ?>
    <?php if (isset($_POST["submit"]) && (count($errors) == 0)) { valoresfrm(); } ?>
  </div>
  <div class="container">
    <form  action="tareapresencialtema1php.php" method="POST" enctype="multipart/form-data">

      <label for="numeroexp">Número de expediente:
        <input type="text" name="numeroexp" class="form-control" <?php if(isset($_POST["numeroexp"])){echo "value='{$_POST["numeroexp"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "numeroexp"); ?>    
      </label>
      <br/>

      <!--  -->
      
      <label for="nif"> NIF:
        <input type="text" name="nif" class="form-control" <?php if(isset($_POST["nif"])){echo "value='{$_POST["nif"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "nif"); ?>  
      </label>
      <br/>

      <!--  -->

      <label for="apellidos"> Apellidos:
        <input type="text" name="apellidos" class="form-control" <?php if(isset($_POST["apellidos"])){echo "value='{$_POST["apellidos"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "apellidos"); ?>  
      </label>
      <br/>

      <!--  -->

      <label for="nombre"> Nombre:
        <input type="text" name="nombre" class="form-control" <?php if(isset($_POST["nombre"])){echo "value='{$_POST["nombre"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "nombre"); ?>  
      </label>
      <br/>

      <!--  -->
      <!-- aqui hay que poner el sexo -->
      <label for="sexo">Sexo:</label>
      <select name="sexo" id="sexo" class="form-control">
          <option value="sindefinir" <?php if(isset($_POST["sexo"]) && $_POST["sexo"] === "sindefinir") { echo "selected"; } ?>>Sin definir</option>
          <option value="hombre" <?php if(isset($_POST["sexo"]) && $_POST["sexo"] === "hombre") { echo "selected"; } ?>>Hombre</option>
          <option value="mujer" <?php if(isset($_POST["sexo"]) && $_POST["sexo"] === "mujer") { echo "selected"; } ?>>Mujer</option>
      </select>
      <br/>
      <!--  -->
      
      <label for="email">Correo:
        <input type="email" name="email" class="form-control" <?php if(isset($_POST["email"])){echo "value='{$_POST["email"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "email"); ?>                      
      </label>
      <br/>

      <!--  -->

      <label for="tlf">Teléfono móvil :
        <input type="tel" name="tlf" class="form-control" <?php if(isset($_POST["tlf"])){echo "value='{$_POST["tlf"]}'";} ?> /> 
        <?php echo mostrar_error($errors, "tlf"); ?>  
      </label>
      <br/>

      <!--  -->

      <label for="image">Imagen:
        <input type="file" name="image" class="form-control" /> 
        <?php echo mostrar_error($errors, "image"); ?>                         
      </label>
      <br/>

      <!--  -->
      <!-- aqui hay que poner si quiere beca -->
      <label for="beca">Solicita Beca:</label>
      <input type="checkbox" name="beca" <?php if(isset($_POST["beca"]) && $_POST["beca"] == "on") { echo "checked"; } ?> />
      <br/>
      <!--  -->

      <br/>           
      <input type="submit" value="Enviar" name="submit" class="btn btn-success" />
    </form>
  </div>
</div>  