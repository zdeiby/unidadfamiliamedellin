CREATE TABLE cv_informacion_basica (
    cedula INT(11) PRIMARY KEY,
    nombre1 VARCHAR(45),
    nombre2 VARCHAR(45),
    apellido1 VARCHAR(45),
    apellido2 VARCHAR(45),
    fechanacimiento DATE,
    edad INT(11),
    barrio VARCHAR(45),
    ciudad VARCHAR(45),
    dirCampo1 VARCHAR(45),
    dirCampo2 VARCHAR(45),
    dirCampo3 VARCHAR(45),
    dirCampo4 VARCHAR(45),
    dirCampo5 VARCHAR(45),
    dirCampo6 VARCHAR(45),
    dirCampo7 VARCHAR(45),
    dirCampo8 VARCHAR(45),
    dirCampo9 VARCHAR(45),
    direccion VARCHAR(45),
    comuna VARCHAR(45),
    telefono VARCHAR(45),
    correo VARCHAR(45),
    fuente_reclutamiento VARCHAR(45),
    fecha_creacion DATE,
    sexo VARCHAR(45),
    estado_civil VARCHAR(45),
    estrato_social VARCHAR(45),
    estatura VARCHAR(45),
    peso VARCHAR(45),
    aspiracion_salarial VARCHAR(45),
    numero_hijos VARCHAR(45),
    categoria_licencia VARCHAR(45),
    nivel_escolaridad VARCHAR(45),
    talla_callzado VARCHAR(45),
    talla_pantalon VARCHAR(45),
    talla_camisa_blusa VARCHAR(45)
);

CREATE TABLE cv_experiencia (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre_empresa VARCHAR(45),
    cargo_desempeñado VARCHAR(45),
    jefe_inmediato VARCHAR(45),
    telefono VARCHAR(45),
    fecha_ingreso DATE,
    fecha_retiro DATE,
    informacion_basica_id INT(11),
    FOREIGN KEY (informacion_basica_id) REFERENCES cv_informacion_basica(cedula)
);

CREATE TABLE cv_personas (
    cedula INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    parentesco VARCHAR(45),
    nombre_empresa VARCHAR(45),
    cargo VARCHAR(45),
    fecha_nacimiento DATE,
    informacion_basica_id INT(11),
    categoria_id INT(11),
    FOREIGN KEY (informacion_basica_id) REFERENCES cv_informacion_basica(cedula),
    FOREIGN KEY (categoria_id) REFERENCES cv_persona_categoria(id)

);

CREATE TABLE cv_persona_categoria (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);

CREATE TABLE cv_barrio (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);

CREATE TABLE cv_ciudad (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);

CREATE TABLE cv_sexo (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);

CREATE TABLE cv_estado_civil (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);

CREATE TABLE cv_categoria_licencia (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);

CREATE TABLE cv_nivel_escolaridad (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);

CREATE TABLE cv_talla_callzado (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);

CREATE TABLE cv_talla_pantalon (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);

CREATE TABLE cv_talla_camisa_blusa (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(45),
    descripcion VARCHAR(45)
);


ALTER TABLE cv_personas
ADD CONSTRAINT fk_categoria_id
FOREIGN KEY (categoria_id) REFERENCES cv_persona_categoria(id);

ALTER TABLE cv_informacion_basica
ADD CONSTRAINT fk_barrio_id
FOREIGN KEY (barrio_id) REFERENCES cv_barrio(id);

ALTER TABLE cv_informacion_basica
ADD CONSTRAINT fk_ciudad_id
FOREIGN KEY (ciudad_id) REFERENCES cv_ciudad(id);

ALTER TABLE cv_informacion_basica
ADD CONSTRAINT fk_sexo_id
FOREIGN KEY (sexo_id) REFERENCES cv_sexo(id);

ALTER TABLE cv_informacion_basica
ADD CONSTRAINT fk_estado_civil_id
FOREIGN KEY (estado_civil_id) REFERENCES cv_estado_civil(id);

ALTER TABLE cv_informacion_basica
ADD CONSTRAINT fk_categoria_licencia_id
FOREIGN KEY (categoria_licencia_id) REFERENCES cv_categoria_licencia(id);

ALTER TABLE cv_informacion_basica
ADD CONSTRAINT fk_nivel_escolaridad_id
FOREIGN KEY (nivel_escolaridad_id) REFERENCES cv_nivel_escolaridad(id);

ALTER TABLE cv_informacion_basica
ADD CONSTRAINT fk_talla_callzado_id
FOREIGN KEY (talla_callzado_id) REFERENCES cv_talla_callzado(id);

ALTER TABLE cv_informacion_basica
ADD CONSTRAINT fk_talla_pantalon_id
FOREIGN KEY (talla_pantalon_id) REFERENCES cv_talla_pantalon(id);

ALTER TABLE cv_informacion_basica
ADD CONSTRAINT fk_talla_camisa_blusa_id
FOREIGN KEY (talla_camisa_blusa_id) REFERENCES cv_talla_camisa_blusa(id);

INSERT INTO  cv_barrio( nombre) 
VALUES 
    ( 'MIRAFLORES'),
    ( 'CERROS'),
     ( 'EL SALVADOR');

INSERT INTO cv_estado_civil ( nombre) 
VALUES 
    ( 'SOLTERO'),
    ( 'CASADO'),
     ( 'UNION LIBRE');

INSERT INTO cv_ciudad ( nombre) 
VALUES 
    ( 'MEDELLIN'),
    ( 'COPACABANA'),
     ( 'SABANETA');

INSERT INTO  cv_categoria_licencia( nombre) 
VALUES 
    ( 'A1'),
    ( 'A2'),
     ( 'B1');

INSERT INTO  cv_nivel_escolaridad( nombre) 
VALUES 
    ( 'PRIMARIA'),
    ( 'BACHILLER'),
     ( 'PROFESIONAL');

INSERT INTO cv_sexo ( nombre) 
VALUES 
    ( 'MASCULINO'),
    ( 'FEMENINO');

INSERT INTO cv_talla_callzado ( nombre) 
VALUES 
    ( '38'),
    ( '39'),
     ( '40');

INSERT INTO cv_talla_camisa_blusa ( nombre) 
VALUES 
    ( 'S'),
    ( 'M'),
     ( 'L');      

INSERT INTO  cv_talla_pantalon( nombre) 
VALUES 
    ( 'S'),
    ( 'M'),
     ( 'L');        

INSERT INTO cv_personas (cedula, nombre, parentesco, fecha_nacimiento, informacion_basica_id) 
VALUES 
    (123, 'FABIOLA CAMILA GRACIANO ARISTIZABAL', 'Hija', '1991-08-02', 1),
    (456, 'JUAN PEREZ', 'Padre', '1965-03-15', 2);

INSERT INTO cv_persona_categoria (id, nombre_columna) VALUES (3, 'nombre_categoria');

