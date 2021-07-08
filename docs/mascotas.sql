-- CIFO Vallès, CIFO La Violeta
-- Robert Sallent

-- EJERCICIO 2: MASCOTAS
-- Última revisión 20/10/2020

-- elimina la base de datos mascota si existe
DROP DATABASE IF EXISTS mascotas;

-- crea la base de datos mascotas
CREATE DATABASE mascotas 
DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

-- usa la base de datos mascotas
USE mascotas;

-- crea la tabla tipos
CREATE TABLE IF NOT EXISTS tipos (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(64) NOT NULL,
  descripcion text NOT NULL
) ENGINE=InnoDB;

-- inserta los registros en la tabla tipos
INSERT INTO tipos(id, nombre, descripcion) VALUES
(1, 'Leon', 'Felino grande que vive en la selva.'),
(2, 'Gato', 'Felino doméstico autónomo.'),
(3, 'Paquidermo', 'Animal muy grande'),
(4, 'Pájaro', 'Animal pequeño y ruidoso'),
(5, 'Reptil', 'Animal de sangre fría que repta'),
(6, 'Gamusino', 'Animal autóctono de España, Portugal y Cuba'),
(7, 'Perro', 'Animal doméstico y para guardar cabras'),
(8, 'Pez', 'Animales acuáticos olvidadizos'),
(9, 'Cobaya', 'Animalillo chillón que siempre tiene hambre'),
(10, 'Oveja', 'Animal que da lana y leche para hacer buenos quesos');

-- crea la tabla razas
CREATE TABLE IF NOT EXISTS razas (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(64) NOT NULL,
  descripcion text NOT NULL,
  idtipo int(11) NOT NULL,
  FOREIGN KEY (idtipo) REFERENCES tipos (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- inserta las razas
INSERT INTO razas(id, nombre, descripcion, idtipo) VALUES
(1, 'León africano', 'León de la jungla africana', 1),
(2, 'Persa', 'Gato peludo', 2),
(3, 'Siamés', 'Gato blanco de cara negra', 2),
(4, 'Elefante', 'Gran animal con trompa', 3),
(5, 'Gorrión', 'Pájaro urbano', 4),
(6, 'Canario', 'Pájaro doméstico cantarín, de color amarillo', 4),
(7, 'Jilguero', 'Pájaro cantarín de colorines', 4),
(8, 'Cotorra', 'Pájaro hablador, bastante molesto', 4),
(9, 'Camaleón', 'Reptil pequeño que muta de color', 5),
(10, 'Boa', 'Gran serpiente', 5),
(11, 'Dragón', 'Pequeño reptil', 5),
(12, 'Gamusino extremeño', 'Gamusino propio de los campos de Badajoz', 6),
(13, 'Dogo', 'Perro de gran tamaño', 7),
(14, 'Bulldog', 'Perro gordo con problemas en los ojos y en el parto', 7),
(15, 'Yorkshire', 'Perro pequeño color gris', 7),
(16, 'Dálmata', 'Perro blanco con manchas negras', 7),
(17, 'Galgo', 'Perro muy delgado y muy rápido', 7),
(18, 'Bichón Maltés', 'Perro peludo, blanco y pequeño', 7),
(19, 'Carpa', 'Pez muy habitual en jardines japoneses', 8),
(20, 'Ojos de burbuja', 'Pez con ojos muy grandes que te mira raro', 8),
(21, 'Oveja escocesa', 'Oveja con falda a cuadros', 10);

-- crea la tabla usuarios
CREATE TABLE IF NOT EXISTS usuarios (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user varchar(16) NOT NULL unique KEY,
  pass varchar(32) NOT NULL,
  nombre varchar(32) NOT NULL,
  apellidos varchar(128) NOT NULL,
  email varchar(128) NOT NULL,
  direccion varchar(256) NOT NULL,
  poblacion varchar(128) NOT NULL,
  provincia varchar(128) NOT NULL,
  cp varchar(5) NOT NULL,
  privilegio int(11) NOT NULL DEFAULT 0, 
  administrador boolean NOT NULL DEFAULT false, 
  imagen varchar(512) DEFAULT NULL, 
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  updated_at timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- inserta en la tabla usuarios
INSERT INTO usuarios(id, user, pass, nombre, apellidos, email, direccion, poblacion, provincia, cp, privilegio, administrador, created_at, updated_at) VALUES
(1, 'albertito', '81dc9bdb52d04dc20036dbd8313ed055', 'alberto', 'sanchez', 'alberto02@gmail.com', 'C/Provenza', 'Terrassa', 'Barcelona', '08023', 100, 0, '2021-05-17', '2021-05-17'),
(2, 'andreu', '81dc9bdb52d04dc20036dbd8313ed055', 'Andrade', 'Campo Sol', 'andreu@yahoo.com', 'C/Pinar', 'Manresa', 'Barcelona', '08265', 100, 0, '2021-05-17', '2021-05-17'),
(3, 'Antoninos', '81dc9bdb52d04dc20036dbd8313ed055', 'Antonio', 'Manao Cetruera', 'amc@vetetuasaber.com', 'C/Manresa, 75', 'Cornellá Ll', 'Barcelona', '08037', 100, 0, '2021-05-17', '2021-05-17'),
(4, 'berto', '81dc9bdb52d04dc20036dbd8313ed055', 'Berto', 'Matt', 'bertomatt@gmail.com', 'C/Pepairas', 'Sabadell', 'Barcelona', '08204', 100, 0, '2021-05-17', '2021-05-17'),
(5, 'carlota95', '81dc9bdb52d04dc20036dbd8313ed055', 'carlota', 'perez', 'carlota1955@gmail.com', 'pl. Dr. Robert', 'Sabadell', 'Barcelona', '08207', 100, 0, '2021-05-17', '2021-05-17'),
(6, 'cinguango', '81dc9bdb52d04dc20036dbd8313ed055', 'David', 'Smith Wesson', 'smith@gmail.com', 'C/Corral', 'Sabadell', 'Barcelona', '08206', 100, 0, '2021-05-17', '2021-05-17'),
(7, 'davidito', '81dc9bdb52d04dc20036dbd8313ed055', 'david', 'lopez', 'david07@gmail.com', 'C/Manresa', 'Ripollet', 'Barcelona', '02145', 100, 0, '2021-05-17', '2021-05-17'),
(8, 'Elemental33', '81dc9bdb52d04dc20036dbd8313ed055', 'Esteban', 'Martínez Gómez', 'martinezgomez@gmail.com', 'C/Dominó', 'Bellaterra', 'Barcelona', '08318', 100, 0, '2021-05-17', '2021-05-17'),
(9, 'felipo', '81dc9bdb52d04dc20036dbd8313ed055', 'Felipe', 'Sanchez Perez', 'felipesanchez@yahoo.com', 'Pasaje Ribatallada', 'Sabadell', 'Barcelona', '08206', 100, 0, '2021-05-17', '2021-05-17'),
(10, 'francisco', '81dc9bdb52d04dc20036dbd8313ed055', 'fran', 'garcia toledo', 'frangar@yahoo.es', 'C/del Alamo', 'Terrassa', 'Barcelona', '08222', 100, 0,'2021-05-17', '2021-05-17'),
(11, 'Hommer', '81dc9bdb52d04dc20036dbd8313ed055', 'Hommer', 'Simpson', 'hommer@gmail.com', 'C/Avenida siempre viva 742', 'Springfield', 'Massachusetts', '01101', 100, 0, '2021-05-17', '2021-05-17'),
(12, 'Juanico', '81dc9bdb52d04dc20036dbd8313ed055', 'Juan', 'Mariano Garcia', 'jmg@vetetuasaber.com', 'C/Guantánamo, 61', 'Badalona', 'Barcelona', '08114', 100, 0, '2021-05-17', '2021-05-17'),
(13, 'jupe', '81dc9bdb52d04dc20036dbd8313ed055', 'Juan', 'Perez', 'juan@gmail.com', 'C/Tamarit 53', 'Sabadell', 'Barcelona', '08021', 100, 0, '2021-05-17', '2021-05-17'),
(14, 'lola', '81dc9bdb52d04dc20036dbd8313ed055', 'Dolores', 'Pepin ocho', 'lola@yahoo.com', 'C/Sierra', 'Rio Tinto', 'Huelva', '34565', 100, 0, '2021-05-17', '2021-05-17'),
(15, 'lolailo', '81dc9bdb52d04dc20036dbd8313ed055', 'Lolo', 'Cercezo', 'lolailo@hotmail.es', 'C/Quetedije', 'Terrassa', 'Barcelona', '08208', 100, 0, '2021-05-17', '2021-05-17'),
(16, 'maica', '81dc9bdb52d04dc20036dbd8313ed055', 'maica', 'ferrer cas', 'maica@gmail.com', 'pl. Cerca', 'viladecavalls', 'barcelona', '08220', 100, 0, '2021-05-17', '2021-05-17'),
(17, 'manu', '81dc9bdb52d04dc20036dbd8313ed055', 'manuel', 'ferrero caso', 'manu@gmail.com', 'pl. de la vila', 'barcelona', 'barcelona', '08025', 100, 0, '2021-05-17', '2021-05-17'),
(18, 'maria', '81dc9bdb52d04dc20036dbd8313ed055', 'Maria', 'Leon Grados', 'marialg@hotmail.com', 'C/Rambla', 'Sabadell', 'Barcelona', '08201', 100, 0, '2021-05-17', '2021-05-17'),
(19, 'mayelakb', '81dc9bdb52d04dc20036dbd8313ed055', 'Filomeno', 'De los Palotes', 'palotesfilemon@yahoo.com', 'C/Sallares i Plà', 'Sabadell', 'Barcelona', '08201', 100, 0, '2021-05-17', '2021-05-17'),
(20, 'manolo', '81dc9bdb52d04dc20036dbd8313ed055', 'Manolo', 'Rodriguez Sánchez', 'manolico@vetetuasaber.com', 'c/Fondo, 5', 'Hospitalet Ll', 'Barcelona', '08015', 100, 0, '2021-05-17', '2021-05-17'),
(21, 'mortadelo', '81dc9bdb52d04dc20036dbd8313ed055', 'Filemon', 'Carmona Gonzalez', 'Mortadelo@gmail.com', 'C/13 Rue del Percebe', 'Sabadell', 'Barcelona', '08206', 100, 0, '2021-05-17', '2021-05-17'),
(22, 'one', '81dc9bdb52d04dc20036dbd8313ed055', 'oscar', 'nicolas espino', 'one@msn.com', 'C/Constantí', 'Sabadell', 'Barcelona', '08206', 100, 0, '2021-05-17', '2021-05-17'),
(23, 'pepe', '81dc9bdb52d04dc20036dbd8313ed055', 'José', 'López López', 'pepelopezlopez@hotmail.com', 'C/Pinos', 'Sabadell', 'Barcelona', '08205', 100, 0, '2021-05-17', '2021-05-17'),
(24, 'programeitor', '81dc9bdb52d04dc20036dbd8313ed055', 'Friki', 'Frikazo', 'frikifrikazo@gmail.com', 'pl. del Mas Allá', 'Rubí', 'Barcelona', '08218', 100, 0, '2021-05-17', '2021-05-17'),
(25, 'tito', '81dc9bdb52d04dc20036dbd8313ed055', 'Carlos', 'Martinez Luengo', 'titocm@gmail.com', 'C/Lacy', 'Sabadell', 'Barcelona', '08202', 100, 0, '2021-05-17', '2021-05-17'),
(26, 'txema', '81dc9bdb52d04dc20036dbd8313ed055', 'Jesús', 'Arias Pur', 'txema@gmail.com', 'C/Provença 50', 'Barcelona', 'Barcelona', '08029', 100, 0, '2021-05-17', '2021-05-17'),
(27, 'yek', '81dc9bdb52d04dc20036dbd8313ed055', 'Yesika', 'lopez', 'yesika@gmail.com', 'C/Canigo 90', 'Terrassa', 'Barcelona', '08211', 100, 0, '2021-05-17', '2021-05-17'),
(28, 'zenvi', '81dc9bdb52d04dc20036dbd8313ed055', 'Unai', 'guillen', 'unai@gmail.com', 'C/Nord 32', 'Ripollet', 'Barcelona', '08222', 100, 0, '2021-05-17', '2021-05-17'),
(29, 'musta', '81dc9bdb52d04dc20036dbd8313ed055', 'Mustafa', 'Zidane', 'musta@gmail.com', 'C/Albada 3', 'Terrassa', 'Barcelona', '08201', 100, 0, '2021-05-17', '2021-05-17'),
(30,'tika26', '81dc9bdb52d04dc20036dbd8313ed055', 'Lorena', 'Tikashinskaia', 'lotika@hotmail.com', 'av. Vallés', 'Cerdanyola', 'Barcelona', '08108', 100, 0, '2021-05-17', '2021-05-17'),
(31,'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Lorena', 'Tikashinskaia', 'lotika@hotmail.com', 'av. Vallés', 'Cerdanyola', 'Barcelona', '08108', 1000, 1, '2021-05-17', '2021-05-17');

-- crea la tabla mascotas
CREATE TABLE IF NOT EXISTS mascotas (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre varchar(64) NOT NULL,
  sexo char(1) NOT NULL COMMENT 'M macho, H hembra',
  biografia text NOT NULL,
  nacimiento date NOT NULL,
  fallecimiento date DEFAULT NULL,
  user varchar(16) NOT NULL,
  idraza int(11) NOT NULL,
  iduser int(11) NOT NULL,
  FOREIGN KEY (iduser) REFERENCES usuarios (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (idraza) REFERENCES razas (id) ON DELETE RESTRICT ON UPDATE CASCADE
 )ENGINE=InnoDB;

-- inserta en la tabla mascotas
INSERT INTO mascotas(id, nombre, sexo, biografia, nacimiento, fallecimiento, user, idraza,iduser) VALUES
(1, 'Toby', 'M', 'Mascota muy graciosa', '2009-11-16', NULL, 'Cinguango', 2,6),
(2, 'Chuli', 'H', 'Mascota de la família desde hace muchos años', '2014-04-14', NULL, 'Hommer', 3,11),
(3, 'Cali', 'M', 'Animal que hace mucha compañía', '2006-09-04', '2014-12-10', 'maica', 9,16),
(4, 'Rocky', 'M', 'El alma de la casa', '2009-09-17', NULL, 'maria', 8,18),
(5, 'Tin', 'M', 'Bicho bastante molesto que anda por casa', '2009-08-29', NULL, 'programeitor', 15,24),
(6, 'Pancho', 'M', 'La mascota de mi hija', '2015-02-12', '2015-05-03', 'zenvi', 15,28),
(7, 'Comotu', 'M', 'No hace nada más que comer y dormir', '2010-03-27', NULL, 'Mortadelo', 2,21),
(8, 'Ally', 'H', 'Salta, corre, baila y hace el pino', '2012-05-11', NULL, 'yek', 12,27),
(9, 'Perri', 'H', 'Animalillo que encontramos y adoptamos', '2011-07-17', NULL, 'txema', 17,26),
(10, 'Rock', 'M', 'Es muy divertido', '2002-12-07', NULL, 'txema', 9,26),
(11, 'Tali', 'M', 'Lo cogimos en adopción', '2004-09-16', NULL, 'programeitor', 9,24),
(12, 'Molli', 'H', 'Proviene de la protectora de Mataró', '2008-02-26', '2015-05-31', 'zenvi', 6,28),
(13, 'Wilson', 'M', 'Ha pasado mucho tiempo con nosotros', '2015-05-25', NULL, 'manu', 10,17),
(14, 'Lucy', 'H', 'Es un animal muy inteligente', '2015-06-11', '2015-07-25', 'felipo', 9,9),
(15, 'Cas', 'M', 'Es torpe, gordo y se tira pedos', '2005-09-13', '2014-06-18', 'tito', 6,25),
(16, 'Peltu', 'M', 'No hace más que girar sobre sí mismo', '2014-07-18', NULL, 'carlota95', 3,5),
(17, 'Peludo', 'M', 'La abuela le tiene mucho cariño', '2006-03-27', NULL, 'jupe', 13,13),
(18, 'Luna', 'H', 'No sabemos de dónde procede', '2012-04-29', '2015-01-07', 'lola', 16,14),
(19, 'Pancho', 'M', 'Nos lo encontramos en una gasolinera', '2013-09-20', NULL, 'tito', 4,25),
(20, 'Spider', 'M', 'El anterior dueño no lo podía cuidar', '2002-10-14', '2002-12-16', 'francisco', 16,10),
(21, 'Mack', 'M', 'Va cada verano a un hotel para mascotas', '2013-01-18', '2015-05-31', 'Cinguango', 1,6),
(22, 'Rulo', 'M', 'Nos hace dejarnos la pasta en el veterinario', '2010-09-16', NULL, 'one', 13,22),
(23, 'Resti', 'H', 'Duerme en un colchón en el comedor', '2007-10-07', NULL, 'Mortadelo', 14,21),
(24, 'Festa', 'H', 'Se hace pis por toda la casa', '2014-12-25', '2015-01-09', 'Antoninos', 8,3),
(25, 'Black', 'M', 'Sabe contar los números del 1 al 10', '2005-05-16', '2005-09-18', 'berto', 11,4),
(26, 'Nico', 'M', 'Es capaz de arrastrar un trineo', '2007-01-22', NULL, 'manolo', 15,20),
(27, 'Tayo', 'M', 'Muerde el parachoques del coche cuando salimos', '2005-10-18', '2015-01-08', 'Hommer', 16,11),
(28, 'Multto', 'M', 'Corre como un galgo', '2009-04-16', '2014-06-20', 'maria', 6,18),
(29, 'Ari', 'H', 'Había vivido en una pensión de mala muerte', '2013-03-14', '2015-03-17', 'andreu', 12,2),
(30, 'Licky', 'H', 'Vive una vida feliz', '2008-12-04', NULL, 'albertito', 11,1),
(31, 'Uma', 'H', 'Tiene su propio cojín en casa', '2010-12-21', '2014-12-06', 'Cinguango', 4,6),
(32, 'Fraile', 'M', 'Suele vomitar en la terraza', '2008-11-13', NULL, 'maica', 3,16),
(33, 'Monchi', 'M', 'Juega con la pelota de tenis habitualmente', '2009-10-02', '2014-11-02', 'carlota95', 14,5),
(34, 'Acas', 'M', 'Es super silencioso', '2013-03-08', NULL, 'Antoninos', 6,3),
(35, 'Paquete', 'M', 'Sabe saltar a la comba', '2009-07-19', NULL, 'zenvi', 4,28),
(36, 'Bartolo', 'M', 'Algún día huirá de casa', '2007-08-20', '2014-10-05', 'txema', 14,26),
(37, 'Julipa', 'H', 'Come chorizo y eructa', '2005-10-28', '2015-03-05', 'manu', 5,17),
(38, 'Tenor', 'M', 'Lo atropellaron y se convirtió en mascota-zombi', '2002-02-26', NULL, 'Elemental33', 7,8),
(39, 'Tula', 'H', 'Protagonizó un capítulo con Lassie', '2014-04-12', NULL, 'felipo', 7,9),
(40, 'Milito', 'M', 'Es amigo de Rex el perro policía', '2001-04-30', '2015-01-09', 'Hommer', 8,11),
(41, 'Merri', 'H', 'Tiene sabañones', '2003-02-20', '2015-01-01', 'programeitor', 13,24),
(42, 'Chris', 'M', 'No le gustan los petardos', '2001-05-17', '2014-12-06', 'yek', 1,27),
(43, 'Uma', 'H', 'Huye de mi hermano pequeño', '2011-12-19', '2015-01-17', 'albertito', 10,1),
(44, 'Ferri', 'M', 'Tenía una mancha negra', '2015-05-25', '2017-06-01', 'Hommer', 10,11),
(45, 'Tobi', 'M', 'Tiene la lengua exageradamente larga', '2017-11-25', NULL, 'txema', 14,26),
(46, 'Lassie', 'L', 'Grande y peluda', '2018-10-07', NULL, 'manu', 15,17),
(47, 'Hippie', 'M', 'Peludo y pequeño', '2014-12-25', NULL, 'manu', 15,17),
(48, 'Millo', 'M', 'Tiene la lengua exageradamente larga', '2010-10-08', NULL, 'zenvi', 14,28),
(49, 'Albi', 'H', 'Es una gran compañía', '2012-02-15', NULL, 'felipo', 3,9),
(50, 'Terrano', 'M', 'Sabe jugar y saltar', '2013-02-10', NULL, 'manu', 14,17),
(51, 'Tini', 'M', 'Perro travieso y poco inteligente', '2019-12-10', NULL, 'manu', 16,17),
(52, 'Toby', 'M', 'Perro de compañía para personas ciegas', '2010-12-10', '2019-12-10', 'felipo', 16,9),
(53, 'Fruski', 'M', 'Perro gracioso, que no hace gran cosa en todo el día', '2013-02-05', NULL, 'musta', 18,29),
(54, 'Troncho', 'M', 'No hace nada', '2002-02-26', '2007-05-12', 'felipo', 20,9),
(55, 'Mustaco', 'M', 'Tiene bigote y corre que se las pela', '2019-12-10', '2020-12-10', 'manu', 19,17);

-- crea la tabla fotos
CREATE TABLE IF NOT EXISTS fotos(
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fichero varchar(256) NOT NULL,
  ubicacion varchar(128) DEFAULT NULL,
  idmascota int(11) NOT NULL,
  FOREIGN KEY (idmascota) REFERENCES mascotas (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- inserta en la tabla fotos
INSERT INTO fotos(id, fichero, ubicacion, idmascota) VALUES
(1, 'imagenes/mascotas/imagen1.jpg', 'Barcelona', 18),
(2, 'imagenes/mascotas/imagen2.jpg', 'Barcelona', 31),
(3, 'imagenes/mascotas/imagen3.jpg', 'Barcelona', 3),
(4, 'imagenes/mascotas/imagen4.jpg', 'Barcelona', 32),
(5, 'imagenes/mascotas/imagen5.jpg', 'Barcelona', 7),
(6, 'imagenes/mascotas/imagen6.jpg', 'Barcelona', 39),
(7, 'imagenes/mascotas/imagen7.jpg', 'Barcelona', 10),
(8, 'imagenes/mascotas/imagen8.jpg', 'Barcelona', 46),
(9, 'imagenes/mascotas/imagen9.jpg', 'Sabadell', 30),
(10, 'imagenes/mascotas/imagen10.jpg', 'Sabadell', 9),
(11, 'imagenes/mascotas/imagen11.jpg', 'Sabadell', 26),
(12, 'imagenes/mascotas/imagen12.jpg', 'Sabadell', 7),
(13, 'imagenes/mascotas/imagen13.jpg', 'Sabadell', 30),
(14, 'imagenes/mascotas/imagen14.jpg', 'Terrassa', 25),
(15, 'imagenes/mascotas/imagen15.jpg', 'Terrassa', 5),
(16, 'imagenes/mascotas/imagen16.jpg', 'Terrassa', 16),
(17, 'imagenes/mascotas/imagen17.jpg', 'Terrassa', 6),
(18, 'imagenes/mascotas/imagen18.jpg', 'Terrassa', 38),
(19, 'imagenes/mascotas/imagen19.jpg', 'Terrassa', 27),
(20, 'imagenes/mascotas/imagen20.jpg', 'Sant Cugat', 22);


SELECT * FROM mascotas;

CREATE VIEW v_fotos AS
SELECT f.*, m.nombre, m.sexo, m.iduser, r.nombre AS raza, t.nombre AS tipo
FROM fotos f
	INNER JOIN mascotas m ON f.idmascota=m.id
    INNER JOIN razas r ON m.idraza=r.id
    INNER JOIN tipos t ON r.idtipo=t.id
    ORDER BY f.id;

SELECT * FROM v_fotos;

SELECT * FROM mascotas;

