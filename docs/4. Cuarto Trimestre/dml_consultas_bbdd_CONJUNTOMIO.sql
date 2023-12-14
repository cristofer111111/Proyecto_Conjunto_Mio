
------------------------- TABLA PERSONAS ------------------------

-- --------------------------------------------------
-- 1 - seleccionar  los campos nombre y cedula de la tabla personas
--    donde el estado sea igual a 'Inactivo'
-------------------------------------------------------

SELECT  Nombre,Cedula FROM personas  WHERE Estado ='INACTIVO'

-- --------------------------------------------------
-- 2 - seleccionar  los campos nombre y cedula de la tabla personas
--    donde el estado sea igual a 'Inactivo' y el tipo de usuario sea igual a 'Residente'
-------------------------------------------------------

SELECT  Nombre,Cedula FROM personas  WHERE Estado ='INACTIVO' AND Tipousuario = "RESIDENTE"
-- --------------------------------------------------
-- 3 - seleccionar  los campos id nombre y cedula de la tabla personas
--    donde el tipousuario sea igual a 'Operario' y los ordene por nombre de forma descendente
-------------------------------------------------------

SELECT id_personas, nombre,cedula FROM personas  WHERE tipousuario ='OPERARIO' ORDER BY nombre DESC

-- --------------------------------------------------
-- 4 - seleccionar  los campos id nombre, cedula y tipo de usuario de la tabla personas
--    donde el estado sea igual a 'Activo' y los ordene por id
-------------------------------------------------------

SELECT id_personas, nombre,cedula,tipousuario FROM personas  WHERE estado ='ACTIVO' ORDER BY id_personas DESC

-- --------------------------------------------------
-- 5 - seleccionar  los campos id nombre, cedula y tipo de usuario de la tabla personas
--    donde el estado sea igual a 'Activo' y los ordene por nombre y id de forma descendente
-------------------------------------------------------

SELECT id_personas, nombre,cedula,tipousuario FROM personas  WHERE estado ='ACTIVO' ORDER BY nombre, id_personas DESC

-- --------------------------------------------------
-- 6 - seleccionar  los campos id nombre y cedula de la tabla personas
--    donde el estado sea igual a 'Activo' y el tipousuario sea igual a 'Administrador' los ordene por nombre y id de forma descendente
-------------------------------------------------------

SELECT id_personas, nombre,cedula FROM personas  WHERE estado ='ACTIVO' AND tipousuario ='ADMINISTRADOR' ORDER BY nombre, id_personas DESC

-- --------------------------------------------------
-- 7 - seleccionar  los campos id nombre y cedula de la tabla personas
--    donde el estado sea igual a 'Activo' y tipousuario sea igual a 'Residente' los ordene por nombre y id de forma descendente
-------------------------------------------------------

SELECT id_personas, nombre,cedula FROM personas  WHERE estado ='ACTIVO' AND tipousuario ='RESIDENTE' ORDER BY nombre, id_personas DESC

-- --------------------------------------------------
-- 8 - seleccionar la seccion (agrupacion) y cuente los valores
--      (calculo) de la tabla personas y lo agrupe por tipousuario
-------------------------------------------------------
SELECT tipousuario, COUNT(tipousuario) AS N_tipoUsuario  FROM personas GROUP by tipousuario 

-- --------------------------------------------------
-- 9 - seleccionar la seccion (agrupacion) y cuente los valores
--      (calculo) de la tabla personas donde el estado sea igual a 'Activo' y lo agrupe por tipousuario
-------------------------------------------------------
SELECT tipousuario, COUNT(tipousuario) AS N_tipoUsuario  FROM personas  WHERE estado ='ACTIVO' GROUP by tipousuario 

-- --------------------------------------------------
-- 10 - seleccionar la seccion (agrupacion) y cuente los valores
--      (calculo) de la tabla tiposervicio y lo agrupe por tipousuario y ordene por N_tipoUsuario
-------------------------------------------------------
SELECT tipousuario, COUNT(tipousuario) AS N_tipoUsuario  FROM personas GROUP by tipousuario  ORDER BY N_tipoUsuario

------------------------- TABLA RESIDENTES ------------------------

-- --------------------------------------------------
-- 11 - seleccionar  los campos id_persona y id_apartamento  de la tabla residentes
--    donde el tipo_residente sea igual a 'PROPIETARIO' y los ordene por id_personas de forma descendente
-------------------------------------------------------

SELECT id_personas,id_apartamento FROM residente  WHERE tipo_residente ='PROPIETARIO' ORDER BY id_personas DESC


-- --------------------------------------------------
-- 12 - seleccionar  los campos id_persona y id_apartamento  de la tabla residentes
--    donde el tipo_residente sea igual a 'ARRENDATARIO' y los ordene por id_apartamento de forma descendente
-------------------------------------------------------

SELECT id_personas,id_apartamento FROM residente  WHERE tipo_residente ='ARRENDATARIO' ORDER BY id_apartamento DESC

-- --------------------------------------------------
-- 13 - seleccionar la seccion (agrupacion) y cuente los valores
--      (calculo) de la tabla residentes y lo agrupe por tipo_residente
-------------------------------------------------------
SELECT tipo_residente, COUNT(tipo_residente) AS N_tipo_Residente  FROM residente GROUP BY tipo_residente

------------------------- TABLA OPERARIO ------------------------

-- --------------------------------------------------
-- 14 - seleccionar todos los campos  de la tabla operario donde la fecha  sea >= a '2004-01-21'   
-------------------------------------------------------
SELECT * FROM operario WHERE  fecha_ingreso >= '2021-01-23'

-- --------------------------------------------------
-- 15 - seleccionar todos los campos  de la tabla operario donde el cargo sea igual a 'VIGILANTE' y la fecha  sea >= a '2004-01-21'   
-------------------------------------------------------
SELECT * FROM operario WHERE cargo ='VIGILANTE' AND fecha_ingreso >= '2021-01-23'

-- --------------------------------------------------
-- 16 - seleccionar la seccion (agrupacion) y cuente los valores
--      (calculo) de la tabla operario y lo agrupe por cargo
-------------------------------------------------------
SELECT cargo, COUNT(cargo) AS N_tipo_Operario  FROM operario GROUP BY cargo

-- --------------------------------------------------
-- 17 - seleccionar la seccion (agrupacion) y cuente los valores
--      (calculo) de la tabla operario y donde la fecha  sea >= a '2004-01-21' y lo agrupe por cargo
-------------------------------------------------------
SELECT cargo, COUNT(cargo) AS N_tipo_Operario  FROM operario WHERE  fecha_ingreso >= '2021-01-23' GROUP BY cargo

------------------------- TABLA MENSAJE ------------------------

-- --------------------------------------------------
-- 18 - seleccionar todos los campos  de la tabla mensajes donde la fecha  sea >= a '2004-01-21'   
-------------------------------------------------------
SELECT * FROM mensaje WHERE  fecha>= '2021-04-03' 

-- --------------------------------------------------
-- 19 - seleccionar todos los campos  de la tabla mensajes donde la fecha sea >= a '2004-01-21'4
--     y los ordene por nombre    
-------------------------------------------------------
SELECT * FROM mensaje WHERE  fecha>= '2021-04-03'  ORDER BY nombre

------------------------- TABLA TIPO DE SERVICIO ------------------------

-- --------------------------------------------------
-- 20 - seleccionar la seccion (agrupacion) y sume los valores
--      (calculo) de la tabla tiposervicio y lo agrupe por nombre
-------------------------------------------------------
SELECT nombre, SUM(valor) FROM tipo_Servicio GROUP BY nombre

-- --------------------------------------------------
-- 21 - seleccionar la seccion (agrupacion) y sume los valores
--      (calculo) de la tabla tiposervicio y lo agrupe por nombre
--      y los ordene por sum_servicios
-------------------------------------------------------
SELECT nombre, SUM(valor) AS sum_servicios FROM tipo_Servicio GROUP BY nombre ORDER by sum_servicios

-- --------------------------------------------------
-- 22 - seleccionar la seccion (agrupacion) y saque la media de  los valores
--      (calculo) de la tabla tipoServicio y lo agrupe por nombre
-------------------------------------------------------
SELECT nombre, AVG(valor) AS Media_servicios FROM tipo_Servicio GROUP BY nombre 

-- --------------------------------------------------
-- 23 - seleccionar la seccion (agrupacion) y cuente los valores
--      (calculo) de la tabla tiposervicio y lo agrupe por nombre
-------------------------------------------------------
SELECT nombre, COUNT(nombre) AS N_servicio  FROM tipo_servicio GROUP by nombre

-- --------------------------------------------------
-- 24 - seleccionar todos los campos de la tabla tiposervicio donde el precio sea 
--     mayor que 300
-------------------------------------------------------
SELECT * FROM tipo_Servicio WHERE valor > 90000;

-- --------------------------------------------------
-- 25 - seleccionar la seccion (agrupacion) y traiga el maximo los valores
--      (calculo) de la tabla solicitudes donde el id tiposervicio sea 1 y los agrupe por id_tiposervicio
-------------------------------------------------------
SELECT Nombre, MAX(valor) AS Servicio_Mas_Alto  FROM tipo_Servicio  GROUP by Nombre;
 
-- --------------------------------------------------
-- 26 - seleccionar la seccion (agrupacion) y traiga el MINIMO los valores
--      (calculo) de la tabla solicitudes donde el id tiposervicio sea 1 y los agrupe por id_tiposervicio
-------------------------------------------------------
SELECT Nombre, MIN(valor) AS Servicio_Mas_Bajo  FROM tipo_Servicio  GROUP by Nombre;


------------------------- TABLA SOLICITUDES ------------------------

-- --------------------------------------------------
-- 27 - seleccionar los campos  fechasolicitud,fecharesidente y estado de la tabla solicitudes 
--     donde el estado sea ACTIVA O TERMINADA 
-------------------------------------------------------
SELECT fecha_solicitud,Fecha_Evento,estado FROM solicitudes WHERE estado = 'APROBADA' OR estado = 'PENDIENTE'

-- --------------------------------------------------
-- 28 - seleccionar todos los campos  de la tabla solicitudes 
--     donde el estado sea ACTIVA y la fechasolicitud >= '0004-07-21 08:00:00'
-------------------------------------------------------
SELECT * FROM solicitudes WHERE estado = 'APROBADA' AND fecha_solicitud >= '2021-04-12 08:00:00'

-- --------------------------------------------------
-- 29 - seleccionar todos los campos  de la tabla solicitudes 
--     donde la fechasolicitud este entre'0004-07-21 08:00:00' y '0004-07-21 10:00:00';
-------------------------------------------------------
SELECT * FROM solicitudes WHERE fecha_solicitud BETWEEN '2021-04-11 08:00:00' AND '2021-04-13 08:00:00';

------------------------- TABLA Visitantes ------------------------

-- --------------------------------------------------
-- 30 - seleccionar  los campos nombre y cedula de la tabla personas
--    donde la fecha_ingreso este entre '2021-04-11 08:00:00' y '2021-04-13 08:00:00'
-------------------------------------------------------

SELECT Nombres,Apellidos,Documento FROM Visitantes WHERE Fecha_Ingreso BETWEEN '2021-04-11 08:00:00' AND '2021-04-13 08:00:00'

-- --------------------------------------------------
-- 31 - seleccionar  los campos nombre y cedula de la tabla personas
--    donde la fecha_ingresp este entre '2021-04-11 08:00:00' y '2021-04-13 08:00:00' y ordene por nombre de forma 'Ascendente'
-------------------------------------------------------

SELECT Nombres,Apellidos,Documento,id_residente FROM Visitantes WHERE Fecha_Ingreso BETWEEN '2021-04-07 08:00:00' AND '2021-04-10 08:00:00' ORDER BY nombres ASC

-- --------------------------------------------------
-- 32 - seleccionar  los campos id nombre y cedula de la tabla personas
--    donde la fecha_ingresp este entre '2021-04-07 08:00:00' y '2021-04-10 08:00:00' y ordene por nombre de forma 'Ascendente'
-------------------------------------------------------

SELECT Nombres,Apellidos,Documento FROM Visitantes WHERE Fecha_Ingreso BETWEEN '2021-04-11 08:00:00' AND '2021-04-13 08:00:00' ORDER BY nombres ASC



------------------------- TABLAS RESIDENTE Y PERSONA  ------------------------

-- --------------------------------------------------
-- 1 - seleccionar todos los campos  de la tabla tipo_residente donde el id del tipo de residente sea igual al id del tipo de residente en la tabla residentes
--     donde el tipo sea PROPIETARIO  AND TIPO USUARIO sea igual residente
-------------------------------------------------------

SELECT * FROM residente  INNER JOIN personas on personas.Id_Personas =residente.id_personas WHERE residente.tipo_residente = 'PROPIETARIO' AND personas.Tipousuario = 'RESIDENTE';

-- --------------------------------------------------
-- 2 - seleccionar  los campos id_personas, id apartamento de la tabla residentes
--     donde nombre_residente sea igual a 'propietario'  '
--     ordenado por apartamento
-------------------------------------------------------
SELECT * FROM residente INNER JOIN personas on personas.Id_Personas =residente.id_personas WHERE residente.tipo_residente = 'ARRENDATARIO' ORDER BY id_apartamento
-- --------------------------------------------------
-- 3 - seleccionar todos  los campos de la tabla personas e inserte la tabla administrador donde el id_persona de la tabla personas sea igual al id_persona de la tabla Administrador
--     donde estado sea igual a 'ACTIVO' 
--     ordenado por id_administrador (Descendente )
-------------------------------------------------------
SELECT  * FROM personas INNER JOIN administrador on personas.id_personas = administrador.id_personas WHERE personas.Estado = 'ACTIVO' ORDER BY administrador.Id_Administrador DESC


-- --------------------------------------------------
-- 4 - seleccionar todos  los campos de la tabla personas e inserte la tabla OPERARIO donde el id_persona de la tabla personas sea igual al id_persona de la tabla OPERARIO
--     donde estado sea igual a 'ACTIVO' y el cargo sea 'VIGILANTE'
--     ordenado por NOMBRE (Descendente )
-------------------------------------------------------
SELECT  * FROM personas INNER JOIN OPERARIO on personas.id_personas = OPERARIO.id_personas WHERE personas.Estado = 'ACTIVO' AND OPERARIO.Cargo ='VIGILANTE 'ORDER BY personas.Nombre ASC 

-- --------------------------------------------------
-- 5 - seleccionar todos los datos de la tabla personas e insertar la tabla residentes
--      donde el id de la persona en la tabla personas sea igual al id personas de la tabla residentes
-------------------------------------------------------

SELECT * FROM personas INNER JOIN residente on personas.id_personas =residente.id_personas

-- --------------------------------------------------
-- 6 - seleccionar todos los datos de la tabla tipo residente e insertar la tabla residentes
--      donde el id de la tipo residente en la tabla tipo residente sea igual al id tipo residente de la tabla residentes
--      donde el nombre_residente sea igual a propietario y el estado sea 'Inactivo'
-------------------------------------------------------

SELECT * FROM personas INNER JOIN residente on  personas.id_personas = residente.id_personas WHERE residente.tipo_residente ='PROPIETARIO' AND personas.estado = 'INACTIVO'



