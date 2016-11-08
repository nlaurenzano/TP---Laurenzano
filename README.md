# TP---Laurenzano




Puntos Pendientes:
******************
OK	Crear repositorio.
 
OK	Crear DB.
OK	Crear tabla Estacionados: id, patente, entrada.
OK	Crear tabla Tickets: id, patente, entrada, salida, importe.
 
OK	Modificar clases para trabajar con DB, en lugar de archivos de texto.

OK	Modificar interfaz. Una tabla sobre la otra, bien simple. Después se arregla.
OK	Hacer funcionar la aplicación con DB.

OK	Subirla al host.

OK	Agregar AJAX.
OK	Mejoras estéticas
OK	Agregar WS.
OK	Agregar login.	

 *	Crear tabla Usuarios: id, email, clave, nombre, rol.

 *	Agregar JSON.
 *	Usuario Admin puede modificar usuarios: Agregar, eliminar, cambiar mail o contraseña.

 *	Subir todo al host.


ADICIONALES:
************

 *	Corregir validación de patente. Permite el formato AAA.
 *	Usuario Admin puede modificar todas las tablas, usando un botón "Modificar" en las grillas.
 *	Usuarios pueden modificar su propia contraseña y mail.
 *	Estética mejorada.
 *	Subir fotos para los autos.
 *	Carga inicial de datos desde archivo de texto.
 *	Estética adicional: Logo del estacionamiento y fabicon.




SQL:
***********

SELECT column_name,column_name
FROM table_name;


SELECT CustomerName as Cliente,City as Ciudad FROM Customers as clientes where clientes.City='london';

INSERT INTO table_name (column1,...)
VALUES (value1,...);

	INSERT INTO usuarios (email, clave, nombre, rol) VALUES ('usuario1@gmail.com', 'user01', 'Usuario Uno', 'usuario');


INSERT INTO estacionados (patente, entrada) VALUES ('patente', 'entrada');

UPDATE table_name
SET column1=value1,column2=value2,...
WHERE some_column=some_value;

DELETE FROM table_name
WHERE some_column=some_value;

