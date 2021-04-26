# Gestiona Tu Negocio

Índice

1. Descripción
2. Planificación
3. Análisis de requisitos
4. Diseño
5. Implementación
6. Futuras implementaciones
7. Conclusiones
8. Anexos

## 1. Descripción y objetivos

El objetivo de realizar este proyecto recae en la necesidad que puede que tengan algunos pequeños negocios de gestionar el stock del cual dispongan.
También para tener centralizada la información de sus empleados, ya que contratar o crear un ERP puede ser muy costoso, pese a la existencia de existir ERP libres,  mi web quiere cubrir esa necesidad.

En esta aplicación web, nos encontramos con una jerarquía de usuarios dentro de una misma tienda:

- Usuarios:
  - **propietario**:\
  Es el encargado de registrar la tienda en el sitio web, con toda la información que esto conlleva (datos personales, cif, dirección...).

    Dicho usuario tendrá todo el control sobre la aplicación, pudiendo hacer un CRUD de usuarios, los cuales serán de rol encargado o trabajador, así como de los productos disponibles en su tienda.
    Así mismo, podrá eliminar la tienda de nuestra aplicación, cuya acción eliminará todos los datos de nuestra BD.
  - **encargado**:\
  Este usuario será creado previamente por el propietario, y tendrá permisos para realizar un CRUD de los productos de la tienda.
  - **trabajador**:\
  Este encargado también será creado por el usuario propietario, y dentrá la posibilidad de modificar el stock de los productos de la tienda y del precio, pero no tendrá la posibilidad de crear nuevos, ni de eliminar los existentes.

Todos ellos, se almacenarán en una tabla donde se almacenarán los datos necesarios para ellos, como el nombre, IBAN, email, DNI... Este último será el que se usará como identificador para poder editar y eliminar los usuarios, por lo que tras la inserción, este dato no podrá ser modificado.

Respecto a los productos, estos serán almacenados en una tabla donde los datos que se recogen, serán el nombre, descripción, stock, código de referencia... entre otros. El código de referencia, está indicado en la vista de creación que no se podrá modificar una vez añadido el producto, ya que se usa como identificador a la hora de editar y eliminar los productos.

A parte de la tabla con la información de los usuarios y de los productos, también dispondremos de una tabla donde se almacenan todas las tiendas registradas en nuestra aplicación.\
En esta, tendremos almacenados los datos como el nombre, ubicación, CIF... entre otros campos, de este modo, tanto los productos como los empleados, tendrán una clave ajena, indicando a que tienda pertenecen.

En mi aplicación he usado **Google Firebase** para almacenar las imágenes de los productos de las tiendas, para así no sobrecargar la carga de la web, dado que las imágenes las obtiene de un servidor externo.\
De este modo, la carga se realiza más rápida dado que no dependemos del ancho de banda de nuestro proveedor del host.

TODO: esquema global del sistema y los actores.
- Usuarios
  - propietario
  - encargado
  - trabajador
- Tiendas
- Productos
- Sistema (aplicación)
- Firebase


## 2. Planificación

La ejecución del proyecto se ha desarrollado durante los meses de Marzo, Abril y Mayo.

Aquí podemos ver un diagrama Gantt con el tiempo que se le ha dedicado a cada parte.

TODO: INSERTAR IMAGEN AQUÍ

## 3. Análisis de requisitos

- Req. a: Un usuario anónimo solo tendrá acceso a la vista de *welcome*.\
En esta vista, solo habrá el manual de como se usa nuestra aplicación, así como a las opciones de menú de Registro y Login.

- Req. b: Un usuario anónimo puede registrarse en la aplicación como usuario propietario de un nuevo negocio. Introducirá esta información:
   - Datos personales:
     - Nombre
     - DNI
     - Email
     - Contraseña
  - Datos de la empresa:
     - Nombre
     - CIF
     - Dirección
     - Ciudad
     - País

- Req. c: El usuario propietario puede crear usuarios de tipo encargado y trabajador. Para cada uno de ellos, se tendrá la siguiente información:
  - Nombre
  - DNI
  - IBAN
  - Email
  - Rol
  - Contraseña

- Req. d: El usuario propietario puede modificar cualquier campo de un usuario salvo el campo DNI.
- Req. e: El usuario propietario puede borrar cualquier otro usuario.
- Req. f: El usuario propietario puede dar de baja su cuenta junto con toda la información de su negocio (usuarios, productos y la propia tienda).
- Req. g: El usuario propietario  puede crear productos. Para cada uno de ellos, se incorporará la siguiente información:
    - Nombre
    - Descripción
    - Precio
    - Stock disponible
    - Código de referencia (No modificable a posteriori).
    - Imagen del producto

- Req. h: El usuario propietario puede eliminar la tienda, con toda la información.
- Req. e: El usuario encargado puede crear productos, con los mismos datos que proporciona el usuario propietario.
- Req. e: El usuario encargado puede eliminar productos.
- Req. e: El usuario encargado puede editar los trabajadores.
- Req. e: El usuario encargado puede eliminar trabajadores.
- Req. x: El usuario trabajador puede modificar el stock y el precio de los productos.
- Req. x: El usuario trabajador puede modificar sus datos de usuario.

TODO: Anyadir els requisits del superUsuari


## 4. Diseño

## 5. Implementación

## x. Despliegue

Para realizar el despliegue de la aplicación, primero de todo probé en host gratuitos, como hostinger, pero la transferencia de ficheros, que se realiza mediante protocolo FTP, era muy lento, por lo que opté a adquirir un servidor en IONOS.\
En este caso, la transferencia de archivos era mucho más rápida, pero a la hora de realizar la implementación, llegaron los problemas, por ejemplo:
 - Problemas a la hora de visualizar la página web, dado que poniendo el dominio, simplemente mostraba la página de inicio por defecto, y no lo que había en la carpeta /public, que es de donde parte Laravel.
 - Modifiqué donde apuntaba la raiz del directorio, para poder visualizar la página web.
 - Investigué como crear un fichero .htaccess, que estructura tenía que tener, y que poner, para que obtuviera los recursos (css, imágenes...) de la web, y no la mostrara como texto plano.
 - Finalmente no conseguí que funcionara la parte de las rutas de Laravel en el servidor, ya que el framework, tiene hace unas rutas, para llamar a un fichero....
 TODO: Acabar este últim punt

## x. Pruebas

Blah blah?
Mejor, además: plan pruebas.


## x. Integración de los módulos del ciclo

- 1º Programación
  - De lenguajes de programación, para crear la app se ha usado PHP, bajo el framework de Laravel.
- 1º BBDD
  - Para almacenar la información de la aplicación, se ha utilizado la base de datos de MariaDB, en su versión 10.4.14, con el motor de vista web PHPMyAdmin.
  - Para almacenar las imágenes, se ha utilizado la función Storage, de Google Firebase, la cual nos permite almacenar archivos en su sistemas, con los límites gratuitos que he explicado anteriormente. 
- 1º Entornos de desarrollo
  - De este módulo, he utilizado el desarrollo de las pruebas del software, para realizar las pruebas de mi aplicación, para ver que todo funcione correctamente.\
   En este caso, han sido pruebas de caja negra.
- 1º Lenguaje de Marcas y Sistemas de la gestión de la información
  - En este caso, ha utilizado los conocimientos adquiridos con dicho módulo con HTML, para crear mi web.
- 1º Sistemas informáticos
  - Para el despliegue  de la web en un servidor, he hecho uso de estos conocimientos con linux, ya que era la manera con la que he interactuado con el sistema de AWS.
- 2º Desarrollo Web en entorno cliente
  - Para la aplicación de funcionalidad JS en este proyecto, conocimientos y recursos adquiridos en este módulo, ha servido de gran ayuda.
- 2º Desarrollo Web en entorno servidor
TODO
- 2º Despliegue  de aplicaciones web
  - En este módulo, se nos enseñó a como realizar  el despliegue de aplicaciones web, y estos conocimientos han sido de ayuda a la hora de saber como debía de instalar Laravel en mi equipo.
- 2º Diseño de interfaces Web
  - Me ha servido de ayuda el conocimiento adquirido en este curso para saber a como organizar la vista de los productos y de los empleados en formato Flexbox, así como la creación del CSS.


## 7. Conclusiones

### 7.1 Futuras implementaciones


## x. Glosario

## x. Bibliografía

## 8. Anexos


