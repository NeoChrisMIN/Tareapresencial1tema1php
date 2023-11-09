<?php

/**
 * Script que muestra en una tabla los valores enviados por el usuario a través 
 * del formulario utilizando el método POST
 */
// Definimos e inicializamos el array de errores y las variables asociadas a cada campo
$errors    = [];
$numeroexp = "";
$nif = "";
$apellidos = "";
$nombre    = "";
$sexo  = ""; //no puede fallar la validación
$email    = "";
$tlf    = "";
$image    = "";
$beca    = ""; //no puede fallar la validación



/*
Número de expediente
NIF
Apellidos 
Nombre
Sexo
email
Teléfono móvil. 
Imagen
Beca
*/

// Función que muestra el mensaje de error bajo el campo que no ha superado
// el proceso de validación
function mostrar_error($errors, $campo) {
  $alert = "";
  if (isset($errors[$campo]) && (!empty($campo))) {
    $alert = '<div class="alert alert-danger" style="margin-top:5px;">' . $errors[$campo] . '</div>';
  }
  return $alert;
}

// Verificamos si todos los campos han sido validados
function validez($errors) {
  if (isset($_POST["submit"]) && (count($errors) == 0)) {
    return '<div class="alert alert-success" style="margin-top:5px;"> Formulario validado correctamente!! :)</div>';
  }
}

// Visualización de las variables obtenidas mediante el formulario
function valoresfrm() {
  global $numeroexp,$nif,$apellidos,$nombre,$email,$tlf,$sexo,$beca,$image;
  /*
  echo "<h4>Valores obtenidos mediante el formulario</h4><br/>";
  echo "<strong>Numero expediente:</strong>" . $numeroexp . "<br/>";
  echo "<strong>nif:</strong>" . $nif . "<br/>";
  echo "<strong>apellidos:</strong>" . $apellidos . "<br/>";
  echo "<strong>nombre:</strong>" . $nombre . "<br/>";
  echo "<strong>sexo:</strong>" . $sexo . "<br/>";
  echo "<strong>email:</strong>" . $email . "<br/>";
  echo "<strong>tlf:</strong>" . $tlf . "<br/>";
  echo "<strong>beca:</strong>" . $beca . "<br/>";

  echo "<strong>Fotografía:</strong>" . $image . "<br/>";*/

  echo "<h4>Valores obtenidos mediante el formulario</h4>";

  // Comienza la tabla
  echo "<table border='1'>";
  echo "<tr><th>Campo</th><th>Valor</th></tr>";

  echo "<tr><td><strong>Número expediente:</strong></td><td>" . $numeroexp . "</td></tr>";
  echo "<tr><td><strong>NIF:</strong></td><td>" . $nif . "</td></tr>";
  echo "<tr><td><strong>Apellidos:</strong></td><td>" . $apellidos . "</td></tr>";
  echo "<tr><td><strong>Nombre:</strong></td><td>" . $nombre . "</td></tr>";
  echo "<tr><td><strong>Sexo:</strong></td><td>" . $sexo . "</td></tr>";
  echo "<tr><td><strong>Email:</strong></td><td>" . $email . "</td></tr>";
  echo "<tr><td><strong>Teléfono:</strong></td><td>" . $tlf . "</td></tr>";
  echo "<tr><td><strong>Beca:</strong></td><td>" . $beca . "</td></tr>";
  echo "<tr><td><strong>Fotografía:</strong></td><td>" . $image . "</td></tr>";

  // Cierra la tabla
  echo "</table>";
}

if (isset($_POST["submit"])) {
  
  if (!empty($_POST["numeroexp"])) {
    $numeroexp = trim($_POST["numeroexp"]);
    
    // Expresión regular para el formato del número de expediente
    $expedientePattern = "/^[A-Za-z]{2,5}-\d{4}-\d{4}\/[HM]$/";

    if (preg_match($expedientePattern, $numeroexp)) {
        // Validación exitosa
        $numeroExpediente = filter_var($numeroexp, FILTER_SANITIZE_STRING);
    } else {
        // Formato incorrecto
        $errors["numeroexp"] = "El número de expediente introducido no es válido :(";
    }
  } else {
      // Campo vacío
      $errors["numeroexp"] = "Por favor, introduce el número de expediente.";
  }

  //-----------------------------------------------------

  if (!empty($_POST["nif"])) {
    $nif = trim($_POST["nif"]);
    
    // Expresión regular para el formato del NIF
    $nifPattern = "/^\d{8}[A-Za-z]$/";

    if (preg_match($nifPattern, $nif)) {
        // Validación exitosa
        $nifValidado = filter_var($nif, FILTER_SANITIZE_STRING);
    } else {
        // Formato incorrecto
        $errors["nif"] = "El NIF introducido no es válido :(";
    }
  } else {
      // Campo vacío
      $errors["nif"] = "Por favor, introduce el NIF.";
  }

  //-----------------------------------------------------

  if (!empty($_POST["apellidos"])) {
    $apellidos = trim($_POST["apellidos"]);

    // Verificar la longitud máxima
    if (strlen($apellidos) <= 20) {
        // Verificar si solo contiene caracteres y guiones bajos
        if (preg_match("/^[A-Za-z_-]+$/", $apellidos)) {
            // Validación exitosa
            $apellidosValidados = filter_var($apellidos, FILTER_SANITIZE_STRING);
        } else {
            // Caracteres no permitidos
            $errors["apellidos"] = "Los apellidos solo pueden contener letras, guiones bajos y guiones :(";
        }
    } else {
        // Longitud excede el límite
        $errors["apellidos"] = "La longitud de los apellidos no puede superar los 20 caracteres :(";
    }
  } else {
      // Campo vacío
      $errors["apellidos"] = "Por favor, introduce los apellidos.";
  }

  //-----------------------------------------------------

  if (!empty($_POST["nombre"])) {
    $nombre = trim($_POST["nombre"]);

    // Verificar la longitud máxima
    if (strlen($nombre) <= 10) {
        // Verificar si solo contiene caracteres y guiones bajos
        if (preg_match("/^[A-Za-z_-]+$/", $nombre)) {
            // Validación exitosa
            $nombreValidado = filter_var($nombre, FILTER_SANITIZE_STRING);
        } else {
            // Caracteres no permitidos
            $errors["nombre"] = "El nombre solo puede contener letras, guiones bajos y guiones :(";
        }
    } else {
        // Longitud excede el límite
        $errors["nombre"] = "La longitud del nombre no puede superar los 10 caracteres :(";
    }
  } else {
      // Campo vacío
      $errors["nombre"] = "Por favor, introduce el nombre.";
  }

  //-----------------------------------------------------

  if (!empty($_POST["sexo"])) {
    $sexo = filter_var($_POST["sexo"], FILTER_SANITIZE_STRING);
  }

  //-----------------------------------------------------

  if (!empty($_POST["email"])) {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email["email"] = "La dirección email introducida no es válida :(";
    }
  }

  //-----------------------------------------------------

  if (!empty($_POST["tlf"])) {
    $tlf = trim($_POST["tlf"]);

    if (preg_match("/^\d{9}$/", $tlf)) {
        // Validación exitosa
        $tlf = filter_var($tlf, FILTER_SANITIZE_NUMBER_INT);
    } else {
        // Formato incorrecto
        $errors["tlf"] = "El formato del teléfono móvil no es válido :(";
    }
  } else {
      // Campo vacío
      $errors["tlf"] = "Por favor, introduce el teléfono móvil.";
  }

  //-----------------------------------------------------


  if (!isset($_FILES["image"]) || empty($_FILES["image"]["tmp_name"])) {
    $image = "imagen_por_defecto.jpg";
  }else{
    $image = "directorio_destino/" . $_FILES["image"]["name"];
  }

  //-----------------------------------------------------

  if (isset($_POST["beca"])) {
    // El checkbox está marcado
    $beca = "Si";
  } else {
      // El checkbox no está marcado
      $beca = "No";
  }

}
?>
