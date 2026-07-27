CREATE DATABASE 
prematricula_colegio1;

USE prematricula_colegio1;
GO

CREATE TABLE estudiantes (
    id INT IDENTITY(1,1) PRIMARY KEY,

    primer_nombre VARCHAR(50),
    segundo_nombre VARCHAR(50),
    primer_apellido VARCHAR(50),
    segundo_apellido VARCHAR(50),

    identidad VARCHAR(20),

    fecha_nacimiento DATE,
    edad INT,
    sexo VARCHAR(20),

    correo VARCHAR(100),
    telefono VARCHAR(20),

    departamento VARCHAR(50),
    municipio VARCHAR(50),
    direccion VARCHAR(MAX),

    padre VARCHAR(100),
    identidad_padre VARCHAR(20),
    telefono_padre VARCHAR(20),
    profesion_padre VARCHAR(100),
    trabajo_padre VARCHAR(100),

    madre VARCHAR(100),
    identidad_madre VARCHAR(20),
    telefono_madre VARCHAR(20),
    profesion_madre VARCHAR(100),
    trabajo_madre VARCHAR(100),

    encargado VARCHAR(100),
    parentesco VARCHAR(50),
    telefono_encargado VARCHAR(20),

    grado VARCHAR(20),
    carrera VARCHAR(100),
    jornada VARCHAR(30),
    anio INT,
    procedencia VARCHAR(100),

    tipo_sangre VARCHAR(10),
    enfermedad VARCHAR(200),
    alergias VARCHAR(200),
    medicamentos VARCHAR(MAX),

    contacto_emergencia VARCHAR(100),
    parentesco_emergencia VARCHAR(50),
    telefono_emergencia VARCHAR(20),

    observaciones VARCHAR(MAX),

    fecha_registro DATETIME DEFAULT GETDATE()
);