<?php

// CONEXIÓN A SQL SERVER

$serverName = "Isai\SQLEXPRESS01";

$connectionInfo = array(
    "Database" => "prematricula_colegio1",
    "CharacterSet" => "UTF-8"
);

$conexion = sqlsrv_connect($serverName, $connectionInfo);


// Verificar conexión

if(!$conexion){

    die("Error de conexión a la base de datos");

}


// RECIBIR DATOS DEL FORMULARIO

$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];

$identidad = $_POST['identidad'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];

$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

$departamento = $_POST['departamento'];
$municipio = $_POST['municipio'];
$direccion = $_POST['direccion'];
$padre = $_POST['padre'];
$identidad_padre = $_POST['identidad_padre'];
$telefono_padre = $_POST['telefono_padre'];
$profesion_padre = $_POST['profesion_padre'];
$trabajo_padre = $_POST['trabajo_padre'];

$madre = $_POST['madre'];
$identidad_madre = $_POST['identidad_madre'];
$telefono_madre = $_POST['telefono_madre'];
$profesion_madre = $_POST['profesion_madre'];
$trabajo_madre = $_POST['trabajo_madre'];

$encargado = $_POST['encargado'];
$parentesco = $_POST['parentesco'];
$telefono_encargado = $_POST['telefono_encargado'];

$grado = $_POST['grado'];
$carrera = $_POST['carrera'];
$jornada = $_POST['jornada'];
$anio = $_POST['anio'];
$procedencia = $_POST['procedencia'];

$tipo_sangre = $_POST['tipo_sangre'];
$enfermedad = $_POST['enfermedad'];
$alergias = $_POST['alergias'];
$medicamentos = $_POST['medicamentos'];

$contacto_emergencia = $_POST['contacto_emergencia'];
$parentesco_emergencia = $_POST['parentesco_emergencia'];
$telefono_emergencia = $_POST['telefono_emergencia'];

$observaciones = $_POST['observaciones'];



// INSERTAR DATOS

$sql = "INSERT INTO dbo.estudiantes
(
primer_nombre,
segundo_nombre,
primer_apellido,
segundo_apellido,
identidad,
fecha_nacimiento,
edad,
sexo,
correo,
telefono,
departamento,
municipio,
direccion,

padre,
identidad_padre,
telefono_padre,
profesion_padre,
trabajo_padre,

madre,
identidad_madre,
telefono_madre,
profesion_madre,
trabajo_madre,

encargado,
parentesco,
telefono_encargado,

grado,
carrera,
jornada,
anio,
procedencia,

tipo_sangre,
enfermedad,
alergias,
medicamentos,

contacto_emergencia,
parentesco_emergencia,
telefono_emergencia,

observaciones
)
VALUES
(
?,?,?,?,?,?,?,?,?,?,?,?,?,
?,?,?,?,?,
?,?,?,?,?,
?,?,?,
?,?,?,?,?,
?,?,?,?,
?,?,?,
?
)";


$params = array(
$primer_nombre,
$segundo_nombre,
$primer_apellido,
$segundo_apellido,
$identidad,
$fecha_nacimiento,
$edad,
$sexo,
$correo,
$telefono,
$departamento,
$municipio,
$direccion,

$padre,
$identidad_padre,
$telefono_padre,
$profesion_padre,
$trabajo_padre,

$madre,
$identidad_madre,
$telefono_madre,
$profesion_madre,
$trabajo_madre,

$encargado,
$parentesco,
$telefono_encargado,

$grado,
$carrera,
$jornada,
$anio,
$procedencia,

$tipo_sangre,
$enfermedad,
$alergias,
$medicamentos,

$contacto_emergencia,
$parentesco_emergencia,
$telefono_emergencia,

$observaciones
);



$resultado = sqlsrv_query($conexion,$sql,$params);


// MENSAJE

if($resultado){

echo "

<script>

alert('✅ La prematrícula se ha guardado correctamente');

window.location='ejer11htphp.html';

</script>

";


}else{


echo "

<script>

alert('❌ Error: No se pudo guardar la información');

window.history.back();

</script>

";


}


sqlsrv_close($conexion);


?>