# Gestiona Tu Negocio
 
## 1. Descripción y objetivos
 
El objetivo de realizar este proyecto recae en la necesidad que puede que tengan algunos pequeños negocios de gestionar el stock del cual dispongan.
También para tener centralizada la información de sus empleados, ya que contratar o crear un ERP puede ser muy costoso, pese a la existencia de existir ERP libres,  mi web quiere cubrir esa necesidad.
 
En esta aplicación web, nos encontramos con una jerarquía de usuarios dentro de una misma tienda:
 
- Usuarios:
  - **propietario**:\
  Es el encargado de registrar la tienda en el sitio web, con toda la información que esto conlleva (datos personales, cif, dirección...).
 
    Dicho usuario tendrá todo el control sobre la aplicación, pudiendo hacer realizar la creación, lectura, actualización y borrado de usuarios, los cuales serán de rol encargado o trabajador, así como de los productos disponibles en su tienda.
    Así mismo, podrá eliminar la tienda de nuestra aplicación, cuya acción eliminará todos los datos de nuestra BD, dicha acción será irreversible, previa notificación.
  - **encargado**:\
  Este usuario será creado previamente por el propietario, y tendrá permisos para realizar la creación, lectura, modificación y borrado de los productos de la tienda, así como modificar sus propios datos como usuario, excepto el DNI, el CIF de la empresa y su rol como empleado.
  - **trabajador**:\
  Este encargado también será creado por el usuario propietario, y tendrá la posibilidad de modificar el stock de los productos de la tienda y del precio, pero no tendrá la posibilidad de crear nuevos, ni de eliminar los existentes, así de como modificar sus propios datos como usuario, excepto el DNI, el CIF de la empresa y su rol como empleado.
 
- Productos:\
  Estos podrán ser creados tanto por los propietarios como por los encargados.
  Dichos productos, tendrán una serie de campos, los cuales serán obligatorios, como pueden ser el nombre, código de referencia, precio, stock...
 
Tanto los trabajadores de la tienda como los productos, podrán ser buscados mediante la barra de búsqueda y ordenados por una serie de opciones, como pueden ser el precio, ascendente o descendente, en el caso de los productos, por orden alfabético en ambos casos, o por rol en el caso de los trabajadores.
 
## 2. Duración
 
La ejecución del proyecto se ha desarrollado durante los meses de Marzo, Abril y Mayo.
 
He decidido realizar un Diagrama de Gantt, para mostrar la aproximación de lo que me ha llevado la ejecución de cada parte del proyecto, para ello, he usado un programa de código abierto, llamado OpenProj.
Este es un software de administración de proyectos, en el cual podremos realizar tanto Diagramas de Gantt, como tablas, como diagramas entidad-relación.
 
Aquí podemos ver un diagrama Gantt con el tiempo aproximado que se le ha dedicado a cada parte.
 
![ Diagrama de Gantt ](img/diagramaDeGantt.png)
 
### 2.1 Descripción de las tareas
 
**Análisis de requisitos:** Esta es la primera etapa de cualquier proyecto, donde se definen qué características y requisitos va a tener nuestro proyecto.
 
**Diseño:** Es la fase donde vamos diseñando como queremos que sea nuestro proyecto, en mi caso, lo que hice fue escoger una plantilla de internet de libre uso, con Licencia MIT, la cual tiene un diseño responsive, la cual se adapta correctamente tanto a dispositivos móviles como pantallas de ordenador.
Una vez tenemos esto claro, se realizan los cambios que se creen oportunos, para adaptar el diseño a nuestro gusto y a los requisitos definidos.\
También se diseñó el esquema SQL de nuestra BD, así como el flujo que queremos que tenga nuestra aplicación.\
Por último, se añadieron nuevas fuentes de letras bulletproof.
 
**Implementación:** En esta parte del proyecto, es donde vamos creando las funcionalidades que tendrá nuestro proyecto, los cuales han de adaptarse a los requisitos que se han definido para dicho proyecto.
 
**Plan de pruebas:** Esta es una parte muy importante del desarrollo de cualquier proyecto, donde se ha de probar la funcionalidad del mismo, con la finalidad de detectar todos los errores de implementación que puedan haber, poniendo datos extremos para buscar y detectar los errores.
 
**Solución de errores:** Durante este tiempo, he ido corrigiendo los errores que he detectado como fallos durante el Plan de pruebas, tanto de implementación como de funcionalidad.
 
**Memoria del proyecto:** Es el tiempo que se ha invertido para la realización de la memoria del proyecto, la cual sirve para tener documentado el desarrollo del proyecto.
 
## 3. Análisis de requisitos
 
A continuación, voy a detallar los requisitos que he ido planteando que quería que tuviera mi aplicación.\
Como podemos observar, las letras no están ordenadas de forma consecutiva, dado que refleja la evolución a medida que he añadido nuevos requisitos, y se eliminaban algunos redundantes, así como no se ha renumerado porque estas letras sirven para identificar los requisitos en el plan de pruebas.
 
- Req. a: Un usuario anónimo sólo tendrá acceso a la vista de *welcome*.\
En esta vista, solo habrá el manual de como se usa nuestra aplicación, así como a las opciones de menú de Registro y Login.
 
- Req. b: Un usuario anónimo puede registrarse en la aplicación como usuario propietario de un nuevo negocio. Introducirá esta información:
   - Datos personales:
     - Nombre
     - DNI (Formato correcto y único)
     - Email (Formato correcto y único)
     - Contraseña (Han de coincidir)
  - Datos de la empresa:
     - Nombre
     - CIF (Formato correcto y único)
     - Dirección
     - Ciudad
     - País
 
- Req. c: El usuario propietario puede crear usuarios de tipo encargado y trabajador. Para cada uno de ellos, se tendrá la siguiente información:
  - Nombre
  - DNI (Formato correcto y único)
  - IBAN (Formato correcto)
  - Email (Formato correcto y único)
  - Rol
  - Contraseña (Han de coincidir)
 
- Req. d: El usuario propietario puede listar todos los trabajadores, y ver sus detalles.
- Req. za: El usuario propietario puede buscar entre sus trabajadores por su nombre, dni, rol o email.
- Req. zb: El usuario propietario puede ordenar la búsqueda de sus trabajadores por rol, nombre ascendente o nombre descendente.
- Req. e: El usuario propietario puede modificar cualquier campo de un usuario, incluido él mismo salvo el campo DNI.
- Req. f: El usuario propietario puede borrar cualquier otro usuario, excepto a sí mismo.
- Req. zc: El usuario propietario puede ver y modificar la información de su negocio, excepto el CIF.
- Req. g: El usuario propietario puede dar de baja su cuenta junto con toda la información de su negocio (usuarios, productos y la propia tienda), y el administrador recibirá un correo pidiendo la eliminación de las imágenes de Google Firebase.
- Req. h: El usuario propietario  puede crear productos. Para cada uno de ellos, se incorporará la siguiente información:
    - Nombre
    - Descripción (no obligatorio)
    - Precio
    - Stock disponible
    - Código de referencia (No modificable a posterior).
    - Imagen del producto (no obligatorio)
 
- Req. i: El usuario propietario puede listar los productos.
- Req. j: El usuario propietario puede editar los productos, salvo el código de referencia.
- Req. k: El usuario propietario puede eliminar los productos.
- Req. l: El usuario encargado puede crear productos, con los mismos datos que proporciona el usuario propietario.
- Req. m: El usuario encargado puede modificar productos, con las mismas condiciones que el propietario.
- Req. n: El usuario encargado puede eliminar productos.
- Req. ze: El usuario encargado puede listar los trabajadores.
- Req. zf: El usuario encargado no puede añadir trabajadores.
- Req. ñ: El usuario encargado puede editar sus datos como trabajador, salvo el DNI, su rol y el CIF de la empresa donde trabaja.
- Req. zh: El usuario encargado no puede eliminar trabajadores.
- Req. o: El usuario trabajador puede listar los productos.
- Req. p: El usuario trabajador puede modificar el stock y el precio de los productos.
- Req. zd: El usuario trabajador no puede eliminar productos.
- Req. q: El usuario trabajador puede listar los empleados.
- Req. zg: El usuario trabajador no puede añadir trabajadores.
- Req. r: El usuario trabajador puede modificar sus datos de trabajador, salvo el DNI, su rol y el CIF de la empresa donde trabaja.
- Req. zi: El usuario trabajador no puede eliminar trabajadores.
- Req. s: El usuario superUsuario puede listar todas las tiendas registradas en nuestra aplicación.
- Req. t: El usuario superUsuario puede modificar todas las tiendas registradas en nuestra aplicación, excepto el CIF.
- Req. u: El usuario superUsuario puede eliminar todas las tiendas registradas en nuestra aplicación, eliminando así a los trabajadores y los productos correspondientes a esa tienda. También recibirá un correo para eliminar todas las imágenes de Google Firebase.
- Req. v: El usuario superUsuario puede listar todos los empleados registrados en nuestra aplicación.
- Req. w: El usuario superUsuario puede modificar todos los empleados registrados en nuestra aplicación, excepto el DNI y el CIF de la empresa donde trabaja.
- Req. x: El usuario superUsuario puede eliminar todos los empleados registrados en nuestra aplicación.
- Req. y: Todos los usuarios pueden solicitar un restablecimiento de contraseña, la cual llegará a su correo.
 
 
 
## 4. Diseño
 
### 4.1 Flujograma global de la aplicación
 
Una de las primeras cosas que realicé antes de empezar con el diseño, fue pensar cómo quería que estuviera estructurada mi aplicación, para ello, usé una aplicación gratuita, vista previamente en clase, llamada yEd live, donde realicé un flujograma con el diseño que quería que tuviera la estructura:
 
![ Diagrama de la aplicación ](img/DiagramaGestionaTuNegocio.png)
 
Una vez tenía la estructura de la aplicación en mente, lo que hice fue pensar en la arquitectura global de la aplicación.

### 4.2 Arquitectura global de la aplicación

En este apartado, lo que hice, fue pensar cómo podría optimizar la página web de un modo fácil, y sin tener demasiados conocimientos sobre cómo hacerlo técnicamente, por lo que lo primero que pensé, fue que una de las cosas que más ralentizan una página web, entre otras cosas, es la obtención de las imágenes, por lo que sería una buena opción almacenar las imágenes en otro servidor, más pensado para ese fin, y de ese modo, no tenía que almacenar la imagen en mi BD.\
Para ello, me decanté por la opción de *Google Firebase*, la cual almacenará las imágenes, y las servirá, de ese modo, en mi BD, solo tengo que almacenar el enlace de la misma, haciendo la carga de imágenes, mucho más ligera.

![ Estructura General ](img/estructuraGeneral.png)
 
### 4.2 Bases de datos
 
 
Para almacenar los datos de mi aplicación, utilicé una base de datos MariaDB para almacenar tanto los datos de los productos, las tiendas y los trabajadores.
 
Respecto a los trabajadores, se almacenarán en una tabla donde se encontrarán los datos necesarios para la empresa para tener los datos centralizados, como el nombre, IBAN, email, DNI... Este último será el que se usará como identificador para poder editar y eliminar los usuarios, por lo que tras la inserción, este dato no podrá ser modificado.
 
Respecto a los productos, estos serán almacenados en una tabla donde los datos que se recogen, serán el nombre, descripción, stock, código de referencia... entre otros. El código de referencia, está indicado en la vista de creación que no se podrá modificar una vez añadido el producto, ya que se usa como identificador a la hora de editar y eliminar los productos.
 
A parte de la tabla con la información de los usuarios y de los productos, también dispondremos de una tabla donde se almacenan todas las tiendas registradas en nuestra aplicación.\
En esta, tendremos almacenados los datos como el nombre, ubicación, CIF... entre otros campos, de este modo, tanto los productos como los empleados, tendrán una clave ajena, indicando a qué tienda pertenecen.
 
![ Diagrama entidad relación ](img/diagramaEntidadRelacion.png)
 
En mi aplicación he usado **Google Firebase** para almacenar las imágenes de los productos de las tiendas, para así no sobrecargar la carga de la web, dado que las imágenes las obtiene de un servidor externo.\
De este modo, la carga se realiza más rápida dado que no dependemos del ancho de banda de nuestro proveedor del host.
Para visualizar las imágenes almacenadas en Google Firebase, obtenemos el enlace de la foto, una vez subida a la plataforma, y lo almaceno en el registro del producto, en el campo llamado "urlImagen"
 
### 4.3 Interfaz web
 
Para la realización de la interfaz web, opté por la opción de buscar una plantilla, cuyo uso fuera libre, por lo que terminé optando por una plantilla que se adaptaba a lo que estaba buscando, y tiene una **Licencia MIT**, por lo que, después de leerme la licencia, soy consciente de que puedo usar esta plantilla sin ningún tipo de limitación.
 
### 4.4. Lenguajes de programación utilizados
 
#### 4.4.1. Front-end
 
- **HTML:** Es un lenguaje de marcas de hipertexto, el cual define la estructura del contenido de la web.\
Hay muchas marcas para etiquetar el contenido y posicionarlo en la web, y actualmente estamos en la versión 5 de este lenguaje.\
Una estructura básica para empezar a posicionar contenido en la web, es:
 
```html
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  Cuerpo de la página.
</body>
</html>
 
```
 
- **CSS:** Es un lenguaje de estilos, el cual se utiliza para describir la presentación de documentos HTML. Este describe cómo ha de ser renderizado el elemento en la pantalla.\
Actualmente la última versión es la CSS3, la cual nació en 2011, y sigue siendo la última actualmente. Esta contiene especificaciones más completas y amplias que versiones anteriores.\
He utilizado el CSS en mi proyecto para darle color y forma, así como para adaptar el contenido al tamaño de la pantalla, para cambiar el tipo de fuente de la letra... Entre otras cosas.
 
- **JavaScript:** Es un lenguaje de programación ligero, interpretado en tiempo real. Este está basado en prototipos de un solo hilo, con soporte para programación orientada a objetos.\
En mi proyecto, he utilizado este lenguaje de programación para mostrar una alerta, cuando un usuario no tiene permisos para realizar dicha acción, así como para pedir la confirmación de acciones en procesos críticos, como eliminar productos, empleados, o incluso la propia tienda.\
También, he utilizado JS para subir las imágenes de los productos a Google Firebase, así como para modificarlas en caso de edición de la imagen de un producto, así como para mostrar los caracteres restantes para la descripción del producto, la búsqueda y disposición por orden concreto de los empleados o los productos, entre otras cosas.
 
 
#### 4.4.2. Back-end
 
- **Laravel:** Es un framework de código abierto, para desarrollar aplicaciones y servicios web con PHP.
En mi desarrollo, he usado Laravel 8, la última versión disponible en la fecha de realización del proyecto. \
Me decanté por usar este framework dando que solo lo vimos introductoriamente en clase, y me pareció bastante interesante, por lo que quería entrar más en profundidad en este, y adquirir nuevos conocimientos.\
Pero, que aporta Laravel, frente a PHP?
 
  - El manejo de los datos no es tan complejo, gracias a Eloquent, un ORM basado en el patrón active record, la interacción con las bases de datos está totalmente orientada a objetos.
  - Facilita el manejo de las rutas de nuestra aplicación, así como la generación de url amigables.
  - El sistema de plantillas *Blade* de Laravel, trae consigo la generación de mejoras en la parte de presentación de la aplicación como la generación de plantillas más simples y limpias en el código y además incluye un sistema de caché que las hace más rápidas, lo que mejora el rendimiento de la aplicación.
 
## 5. Implementación
 
### 5.1 XAMPP
 
Para el desarrollo del proyecto en mi máquina local, he utilizado el servidor web XAMPP, ya que este nos facilita la instalación de muchos otros servicios, como pueden ser Apache, MySQL, FileZilla... entre otros.
 
### 5.2 MariaDB
 
En cuanto para la base de datos utilicé la herramienta que viene integrada en la aplicación XAMPP, la cual es MariaDB, y Php MyAdmin para su gestión.
 
### 5.3 Google Firebase
 
Como he comentado en punto *4.1 Bases de datos*, he utilizado **Google Firebase** para el almacenamiento de las imágenes para optimizar recursos, y ayudar a que la web se cargue más rápidamente, dado que las imágenes provienen de otro servidor web, como es este caso, propiedad de Google, el cual están muy optimizados para ese uso, y no como puede ser mi host contratado, que es genérico.
Pero, ¿porqué he utilizado Google Firebase, y no otras opciones?
   - Por la facilidad de adaptación, y la gran información disponible en internet.
   - Conocimiento previo de la plataforma.
   - Capacidad de almacenamiento y transferencia de datos más que suficiente en el modo gratuito para la realización de este proyecto, ya que ofrece de modo gratuito:
      - 5GB de almacenamiento
      - 1GB/dia de descargas
      - 20.000/dia operaciones de carga
      - 50.000/dia operaciones de descarga
  - Posibilidad de incluir la autenticación en nuestra aplicación mediante la cuenta de Google, Facebook, Twitter... Entre otras opciones.
 
### 5.4. Despliegue (hosting)
 
Para realizar el despliegue de la aplicación, primero de todo probé en host gratuitos, como hostinger, pero la transferencia de ficheros, que se realiza mediante protocolo FTP, era muy lento, por lo que opté a adquirir un servidor en IONOS.\
En este caso, la transferencia de archivos era mucho más rápida, pero a la hora de realizar la implementación, llegaron los problemas, por ejemplo:
 - Problemas a la hora de visualizar la página web, dado que poniendo el dominio, simplemente mostraba la página de inicio por defecto, y no lo que había en la carpeta /public, que es de donde parte Laravel, por lo que tuve que modificar donde apuntaba la raíz del directorio, para poder visualizar la página web.
 - Uno de los mayores problemas, fue aprender a como crear un fichero .htaccess, que estructura tenía que tener y atributos poner, para que obtuviera los recursos (css, imágenes...) de la web, y no la mostrará como texto plano, así como para que funcionaran las rutas de Laravel, finalmente, con búsquedas en Google y un poco de intuición, logré realizar que funcionara.
 - Otro de los apartados que funcionaban correctamente en local, y al pasarlo al servidor, ha sido el envío del correo electrónico cuando se solicita el restablecimiento de la contraseña, así como en el borrado de la cuenta.\
 Finalmente, logré solucionar este apartado añadiendo unos parámetros en el fichero *Mail.php* de Laravel.
 
## 6. Pruebas
 
Este es uno de los apartados más importantes de todos en el desarrollo de un proyecto, para garantizar la calidad de cualquier desarrollo, dado que las pruebas se realizan para comprobar que una aplicación funciona con los requisitos que se han descrito, ya sea por parte de un cliente, o por el equipo técnico, para ello, he ido requisito por requisito, realizando todas las pruebas necesarias.\
Cada prueba se identifica con la letra donde se han declarado anteriormente, en el punto *3. Análisis de requisitos*.
 
- **Prueba Req a.** Cuando el usuario no está logueado, e intentamos acceder al home o a añadir un empleado, vemos como nos redirige al login:
 
![ Captura ventana principal sin login ](img/reqA.png)
 
Introducimos manualmente en la barra de direcciones del navegador, para acceder al home:
 
![ Captura remarcando cambio en la barra de direcciones para acceder al home ](img/reqA2.png)
 
Pulsamos enter para acceder a esta url, y nos redirige al login:
 
![ Captura remarcando cambio en la barra de direcciones al login ](img/reqA3.png)
 
Ahora realizamos la misma comprobación, esta vez intentando acceder a la ventana de nuevo empleado:
 
![ Captura remarcando cambio en la barra de direcciones para acceder a la ventana de nuevo empleado ](img/reqA4.png)
 
Comprobamos cómo se vuelve a redireccionar al login:
 
![ Captura remarcando cambio en la barra de direcciones al login ](img/reqA5.png)
 
- **Prueba Req b.** Cuando accedemos a la ventana *Registrarse*, visualizamos un formulario donde podremos crear nuestra cuenta:
 
![ Captura registro usuario ](img/reqB.png)
 
Comprobamos que se valida el formato del email:
 
![ Captura comprobación formato validación email ](img/reqB2.png)
 
Comprobamos que con el formato del email correcto, el mismo no esté registrado previamente en nuestra BD:
 
![ Captura comprobación formato validación email ](img/reqB8.png)
 
Comprobamos que el formato del CIF es válido:
 
![ Captura comprobación formato validación CIF ](img/reqB3.png)
 
Con un CIF válido, comprobamos que ese mismo CIF no exista en la BD, si es así, mostraremos un error:
 
![ Captura comprobación CIF duplicado ](img/reqB4.png)
 
Comprobamos que el formato del DNI es correcto:
 
![ Captura comprobación formato DNI ](img/reqB6.png)
 
Comprobamos que con el formato del DNI correcto, no esté duplicado en la BD:
 
![ Captura comprobación formato DNI ](img/reqB7.png)
 
 
Introducimos dos contraseñas distintas, y vemos como nos sale el error de que no coinciden:
 
![ Captura comprobación contraseñas iguales ](img/reqB5.png)
 
- **Prueba Req C**. Cuando creamos la tienda y nuestro usuario, vemos que nos redirige a una ventana donde crear trabajadores. Comprobamos que valida que el DNI no esté registrado:
 
![ Captura comprobación DNI duplicado ](img/reqC.png)
 
Comprobamos el formato del DNI:
 
![ Captura comprobación DNI formato ](img/reqC2.png)
 
 
Comprobamos el formato del IBAN:
 
![ Captura comprobación formato IBAN ](img/reqC3.png)
 
 
Comprobamos que las contraseñas coinciden:
 
![ Captura comprobación contraseñas coinciden ](img/reqC4.png)
 
Comprobamos el formato del correo:
 
![ Captura comprobación formato correo ](img/reqC5.png)
 
Comprobamos que el correo no exista:
 
![ Captura comprobación correo no duplicado ](img/reqC6.png)
 
- **Prueba Req d**. Accedemos a la pestaña de empleados, y vemos la lista de todos nuestros empleados:
 
![ Listado de empleados ](img/reqD.png)
 
- **Prueba Req za**. Comprobamos que podemos buscar a través del nombre:
 
![ Listado de empleados buscados por nombre ](img/reqZA.png)
 
   Comprobamos que podemos buscar por el email:
 
![ Listado de empleados buscados por email ](img/reqZA2.png)
 
  Comprobamos que podemos buscar por el rol 
 
![ Listado de empleados buscados por rol ](img/reqZA3.png)
 
  Comprobamos que podemos buscar por el dni:
 
![ Listado de empleados buscados por dni ](img/reqZA4.png)
 
- **Prueba Req. zb**. Comprobamos que los trabajadores se ordenan por rol:
 
![ Listado de empleados ordenado por rol ](img/reqZB.png)
 
Comprobamos que los trabajadores se ordenan por nombre ascendente:
 
![ Listado de empleados ordenado por nombre ascendente ](img/reqZB2.png)
 
Comprobamos que los trabajadores se ordenan por nombre descendente:
 
![ Listado de empleados ordenado por nombre descendente ](img/reqZB3.png)
 
- **Prueba Req. e**. Pulsamos sobre el botón editar empleado, y se nos abre una ventana con todos sus datos para editar, excepto el campo del DNI y el CIF empresa, los cuales están deshabilitados:
 
![ Ventana edición empleado ](img/reqE.png)
 
 
Cambiamos los datos del empleado anterior:
 
![ Ventana edición empleado con cambios ](img/reqE2.png)
 
Le damos al botón "Guardar", y se nos redirigirá a la ventana de empleados, donde podremos ver el cambio en el nombre y su rol:
 
![ Ventana empleados con los cambios del usuario ](img/reqE3.png)
 
- **Prueba Req. f**. Comprobamos que el propietario puede eliminar un empleado, para ello, pulsamos sobre el botón eliminar y nos aparecerá la siguiente ventana:
 
![ Ventana popUp eliminar empleado ](img/reqF.png)
 
Si indicamos que si, nos elimina el usuario de la BD,y nos sale la siguiente ventana:
 
![ Ventana popUp notificación eliminación empleado ](img/reqF2.png)
 
Una vez hacemos click para cerrar esa ventana PopUp, comprobamos que efectivamente, se ha eliminado el empleado, haciendo uso de la barra de búsqueda, introducimos el DNI o el nombre el empleado que hemos eliminado, y vemos que ya no aparece:
 
![ Ventana comprobar empleado eliminado ](img/reqF3.png)
 
Comprobamos que cuando intenta eliminarse a sí mismo, sale una alerta impidiendo dicha acción:
 
![ Ventana popUp impedir eliminarse a sí mismo ](img/reqF4.png)
 
- **Prueba Req. zc**. Accedemos al menú "Tienda", y vemos la información de nuestra tienda:
 
![ Ventana con información de la tienda ](img/reqZC.png)
 
Modificamos los datos:
 
![ Ventana con información de la tienda ](img/reqZC2.png)
 
Los guardamos, y vemos que se nos redirige al home. Si volvemos a acceder, vemos como ahora aparecen los datos que hemos introducido anteriormente:
 
![ Ventana con información de la tineda ](img/reqZC3.png)
 
 
- **Prueba Req. g**. Si pulsamos sobre el botón "Eliminar tienda", nos saldrá el siguiente aviso:
 
![ Ventana pidiendo confirmación de la acción ](img/reqG.png)
 
Si confirmamos la acción, vemos como nos redirige a la vista de login.\
Si vemos el correo del administrador, vemos cómo ha recibido un correo, solicitando el borrado de los datos de Google Firebase:
 
![ Correo solicitando el borrado de los datos al administrador ](img/reqG2.png)
 
 
- **Prueba Req. h**. El usuario propietario crea un producto, llenando los datos:
 
![ Ventana con los datos del producto ](img/reqH.png)
 
Pulsamos en "Añadir producto", y se nos redirige a la ventana principal, donde podemos buscar el producto que hemos introducido:
 
![ Ventana el producto añadido ](img/reqH2.png)
 
Ahora, vamos a realizar la misma prueba, pero sólo añadiendo los campos necesarios:
 
![ Ventana el producto añadido ](img/reqH3.png)
 
Nuevamente, pulsamos en "Añadir producto", y vemos que se ha añadido correctamente el nuevo producto:
 
![ Ventana el producto añadido ](img/reqH4.png)
 
- **Prueba Req. i**. Comprobamos que puede listar todos los productos que hay en la tienda:
 
![  Listado de productos ](img/reqI.png)
 
- **Prueba Req. j**. Comprobamos que puede editar todos los campos de un producto, excepto el código de referencia:
 
![  Ventana de edición de un producto ](img/reqJ.png)
 
Modificamos los datos que queremos cambiar:
 
![  Ventana de edición de un producto con los cambios realizados ](img/reqJ2.png)
 
Pulsamos sobre el botón guardar, y en el listado de productos, vemos como se han cambiado los datos:
 
![  Listado de productos ](img/reqJ3.png)
 
- **Prueba Req. k**. En el listado de productos, pulsamos para eliminar un producto, y nos aparecerá la siguiente ventana popUp:
 
![  Ventana popUp aviso eliminación prodcuto ](img/reqK.png)
 
Cuando indicamos que queremos eliminar el producto, nos aparecerá esta ventana si todo ha ido bien:
 
![  Ventana popUp confirmación eliminación prodcuto ](img/reqK2.png)
 
Hacemos clic en "Ok", para cerrar la ventana popUp, y vemos como en el listado de productos ya no aparece:
 
![  Listado de productos ](img/reqK3.png)
 
 
- **Prueba Req. l**. Ahora, accedemos a la aplicación con el usuario de un encargado, y comprobamos que podemos crear productos, para ello, pulsamos sobre el botón "Añadir producto", y vemos que se nos abre la ventana como con el propietario.\
Introducimos los datos necesarios:
 
![  Encargado añade nuevo producto ](img/reqL.png)
 
Pulsamos sobre el botón "Añadir producto", y en el listado de productos, podemos buscar el que acabamos de introducir:
 
![  Listado de productos ](img/reqL2.png)
 
- **Prueba Req. m**. En el listado de productos, pulsamos sobre uno de ellos, en el botón "Editar producto", y veremos que se nos abre la vista de edición del producto seleccionado:
 
![  Encargado editar un producto ](img/reqM.png)
 
Pulsamos sobre "Guardar", y en la lista de productos, podemos ver que se han guardado los cambios:
 
![  Listado de productos ](img/reqM2.png)
 
- **Prueba Req. n**. En el listado de productos, pulsamos sobre el botón "Eliminar producto", nos sale una ventana popUp como en el propietario, pidiendo la confirmación de la acción:
 
![  PopUp pidiendo confirmación eliminar producto ](img/reqN.png)
 
Aceptamos la operación, nos aparecerá una ventana popUp notificando de que la acción ha salido correctamente:
 
 
![  PopUp informando de acción realizada ](img/reqN2.png)
 
Y luego, cuando accedemos al listado de productos, observamos que ese ya no aparece:
 
![  Listado de productos ](img/reqN3.png)
 
- **Prueba Req. ze**. Accedemos a la ventana de Empleados, y vemos como aparecen todos ellos, pero solo tiene el botón de editar empleado él mismo:
 
![  Listado de empleados ](img/reqZE.png)
 
- **Prueba Req. zf**. Si pulsamos sobre el botón para añadir un nuevo trabajador, nos sale una alerta informándonos de que no tenemos permisos para realizar esta acción:
 
![  Alert indicando la no autorización de la acción solicitada ](img/reqZF.png)
 
 
- **Prueba Req. ñ**. Pulsamos para editar sus datos, y nos aparece la ventana para editar todos sus datos, salvo el DNI, el rol y el CIF:
 
![  Ventana de edición del empleado  ](img/reqÑ.png)
 
Cambiamos los datos que deseamos cambiar, en este caso he añadido el nombre del encargado, y le damos guardar.\
En el listado de empleados, podemos ver el cambio:
 
![  Listado de empleados ](img/reqÑ2.png)
 
- **Prueba Req. zh**. Pulsamos sobre el botón editar empleado, y vemos que nos sale una alerta impidiendo que realicemos dicha acción:
 
![ Alert acción no permitida ](img/reqZH.png)
 
 
- **Prueba Req. o**. Accedemos a la web desde un usuario cuyo rol sea trabajador, y vemos que puede ver todos los productos que hay registrados en su tienda:
 
![  Listado de productos ](img/reqO.png)
 
- **Prueba Req. p**. Accedemos para editar un producto, y vemos que solo están habilitados los campos de stock y precio para ser editados:
 
![  Edición producto por un trabajador ](img/reqP.png)
 
Editamos los campos, guardamos, y cuando volvemos a acceder, vemos que ahora tiene el nuevo precio y el nuevo stock:
 
![  Edición producto por un trabajador ](img/reqP2.png)
 
- **Prueba Req. zd**. Comprobamos que no puede eliminar productos, pulsando en el botón, y observando que nos sale un mensaje de error impidiendonos la acción:
 
![  Mensaje error impidiendo el borrado de productos por parte del trabajador ](img/reqZD.png)
 
- **Prueba Req. q**. Accedemos a la ventana de "Empleados", y vemos como aparecen todos los empleados de la tienda donde trabaja:
 
![  Listado de empleados ](img/reqQ.png)
 
- **Prueba Req. zg**. Si pulsamos sobre el botón para añadir un nuevo trabajador, nos sale una alerta informándonos de que no tenemos permisos para realizar esta acción:
 
![  Alert indicando la no autorización de la acción solicitada ](img/reqZG.png)
 
 
- **Prueba Req. r**. Como vemos en el listado anterior, solo tiene habilitado el botón de "Editar empleado", accedemos, y vemos sus datos de usuario:
 
![ Datos del empleado trabajador ](img/reqR.png)
 
Modificamos sus datos, completando su apellido, y guardando los datos, en el listado de trabajadores, podremos observar ya su cambio:
 
![ Observamos los cambios guardados ](img/reqR2.png)
 
- **Prueba Req. zi**. Pulsamos sobre el botón editar empleado, y vemos que nos sale una alerta impidiendo que realicemos dicha acción:
 
![ Alert acción no permitida ](img/reqZI.png)
 
- **Prueba Req. s**. Accedemos con el usuario superAdministrador, y vemos que se nos listan todas las tiendas que hay registradas en nuestra aplicación:
 
![ Listado de tiendas ](img/reqS.png)
 
- **Prueba Req. t**. Accedemos a una tienda, y vemos sus datos:
 
![ Edición de tiendas superAdmin ](img/reqT.png)
 
Modificamos sus datos, pulsamos en "Guardar cambios", y en el listado de tiendas, ya podemos observar el cambio realizado (dirección):
 
![ Visualización de la edición de tienda superAdmin ](img/reqT2.png)
 
- **Prueba Req. u**. Cuando accedemos a editar una tienda, vemos como nos aparece también, un botón para eliminar la tienda, si lo pulsamos, nos aparece el siguiente mensaje:
 
![ Mensaje confirmación borrado tienda ](img/reqU.png)
 
Si confirmamos la operación, observamos cómo se va el alert, y después nos redirige a la lista de tiendas, y podemos observar como se ha eliminado:
 
![ Mensaje confirmación borrado tienda ](img/reqU2.png)
 
Si accedemos al correo, veremos cómo hemos recibido un email, para que borremos manualmente la carpeta de las imágenes de Google Firebase de dicha tienda:
 
![ Correo solicitando el borrado de los datos al administrador ](img/reqU3.png)
 
 
- **Prueba Req. v**. Accedemos a la ventana de "Empleados", y vemos como se nos listan todos los empleados que hay registrados en nuestra plataforma:
 
![ Listado de trabajadores en el superAdmin ](img/reqV.png)
 
- **Prueba Req. w**. Accedemos a ver la información de un empleado, y vemos como tenemos habilitados todos los campos para la edición, excepto su DNI y el CIF de la empresa donde trabaja:
 
![ Edición de un trabajador del superAdmin ](img/reqW.png)
 
Guardamos los cambios realizados, y en el listado de trabajadores, podemos observar cómo se han aplicado los cambios del nombre y del rol:
 
![ Edición de un trabajador del superAdmin ](img/reqW2.png)
 
- **Prueba Req. x**. En el listado de trabajadores, buscamos uno que queremos eliminar, siempre y cuando no sea ni él mismo, ni un propietario, y nos saldrá la siguiente ventana:
 
![ Borrado de un trabajador superAdmin ](img/reqX.png)
 
Y si indicamos que si, nos saldrá una ventana confirmado que la acción se ha llevado a cabo. Cuando cerramos la misma, podremos comprobar en el listado de trabajadores, buscando su DNI, vemos que ya no aparece:
 
![ Listado trabajadores buscar eliminado ](img/reqX2.png)
 
- **Prueba Req. z**. Comprobamos el restablecimiento de la contraseña, accediendo a "Login", y pulsando en "He olvidado mi contraseña!", donde nos aparecerá la siguiente ventana:
 
![ Ventana restablecer contraseña ](img/reqZ.png)
 
Introducimos nuestro DNI, y veremos que se nos redirige al home, ahora, accedemos a nuestro correo electrónico, y veremos cómo hemos recibido un correo como el siguiente, con la nueva contraseña:
 
![ Ventana email recibido con la nueva contraseña ](img/reqZ2.png)
 
Ahora, nos dirigimos a hacer login con nuestra cuenta, y si probamos nuestra anterior contraseña, veremos como nos dice que las credenciales son erróneas:
 
![ Intento de acceso con la vieja contraseña ](img/reqZ3.png)
 
Ahora, ponemos la nueva contraseña, y vemos que nos deja acceder, pero que nos redirige a esta otra ventana:
 
![ Solicitud nueva contraseña ](img/reqZ4.png)
 
Solo se nos permite cambiar la contraseña para mayor seguridad, una vez la cambiemos, se nos redirige al home:
 
![ Vista home ](img/reqZ5.png)
 
Ahora, podemos volver a acceder a la aplicación con la nueva contraseña.
 
 
 
 
## 7. Integración de los módulos del ciclo
 
En este apartado, he incluido todas las asignaturas que se realizan en el CFGS de DAW, donde indico de cada módulo, que conocimientos me aportaron cada uno a la hora de realizar este proyecto.
 
- 1º Programación
  - De lenguajes de programación, para crear la app se ha usado PHP, bajo el framework de Laravel.
  Gracias a los conocimientos adquiridos de programación Orientada a Objetos, me ha permitido ser más ágil a la hora de adquirir los conocimientos necesarios de como realizar las clases con Laravel.
- 1º BBDD
  - Para almacenar la información de la aplicación, se ha utilizado la base de datos de MariaDB, en su versión 10.4.14, con el motor de vista web PHPMyAdmin, para la creación de las bases de datos SQL.
  - Para almacenar las imágenes, se ha utilizado la función Storage, de Google Firebase, la cual nos permite almacenar archivos en su sistemas, con límites gratuitos. suficientes para esta aplicación.
- 1º Entornos de desarrollo
  - De este módulo, he utilizado el desarrollo de las pruebas del software, para realizar las pruebas de mi aplicación, para ver que todo funcione correctamente.\
   En este caso, han sido pruebas de caja negra.
  - También, gracias a los conocimientos adquiridos con los IDEs, me ha resultado sencillo adaptarme, en mi caso a VSCode, y a instalarme los plugins necesarios, los cuales me han ayudado con la agilidad de programación, como pueden ser *CSS Formatter* y *Format HTML in PHP*, los cuales me han venido muy bien a la hora de formatear el código.
  - Otra herramienta que aprendí en este módulo y me ha servido para el desarrollo de mi proyecto, ha sido GIT, en mi caso, he utilizado GitHub, para llevar un control de versiones, para poder ir atrás si así lo necesitaba.
- 1º Lenguaje de Marcas y Sistemas de la gestión de la información
  - En este caso, ha utilizado los conocimientos adquiridos con dicho módulo con HTML, para crear mi front-end.
  - También las bases con CSS, me vinieron muy bien para empezar con el diseño básico de la aplicación.
- 1º Sistemas informáticos
  - Para el despliegue  de la web en un servidor, he hecho uso de estos conocimientos con linux, ya que era la manera con la que he interactuado con el sistema de AWS, para instalar tanto apache, como php y Laravel.
  - Para el desarrollo en local de mi proyecto, me sirvieron los conocimientos adquiridos de administración de equipo Windows, dado que es el SO con el que trabajo, la instalación y configuración de XAMPP, para tener un sistema de desarrollo en local de manera sencilla, y el sistema de transmisión de ficheros FTP, para subir el proyecto al servidor externo.
- 2º Desarrollo Web en entorno cliente
  - Para la realización de la funcionalidad con JS en este proyecto, conocimientos y recursos adquiridos en este módulo, ha servido de gran ayuda.
  - Algunos ejemplos de donde he utilizado JS, ha sido:
     - No habilitar la posibilidad de añadir un producto hasta que este tenga un código de referencia.
     - Mostrar el contador de caracteres para la descripción de los productos.
     - Mostrar resultados de la búsqueda de empleados y productos.
- 2º Desarrollo Web en entorno servidor
  - De este módulo, he necesitado las aptitudes obtenidas para la comunicación entre el servidor y la BD, a la hora de almacenar, obtener y editar los datos que se introducían en la web.
  - También me ha servido de ayuda la introducción que se nos hizo en dicho módulo con Laravel 5, ya que me proporcionó las herramientas y los conocimientos básicos para empezar con mi proyecto.
- 2º Despliegue  de aplicaciones web
  - En este módulo, se nos enseñó a cómo realizar  el despliegue de aplicaciones web, y estos conocimientos han sido de ayuda a la hora de saber cómo debía de instalar Laravel 8 en mi equipo.
  - Asimismo, estos conocimientos me ayudaron a la hora de instalar Laravel 8 en el servidor externo.
- 2º Diseño de interfaces Web
  - Me ha servido de ayuda el conocimiento adquirido en este módulo para saber cómo organizar la vista de los productos y de los empleados en formato Flexbox, así como la creación del CSS.
  - Además de la integración de nuevas fuentes de texto bulletproof, y la creación de un diseño responsive, para adaptar la vista a todo tipo de pantallas.
 
 
## 8. Conclusiones
 
El proyecto de *Gestiona Tu Negocio*, hace como resultado de los conocimientos adquiridos previamente en el CFGS de DAM, donde vimos que es un ERP, y los costes de desarrollo que estos pueden conllevar, aún usando ERPs de código libre, la adaptación para pequeñas o medianas empresas, puede ser un coste demasiado alto, por lo que este proyecto, lo que busca es cubrir las necesidades básicas de estas, como puede ser la gestión de sus trabajadores y los productos de los que disponen.
 
El haber realizado el proyecto en Laravel ha sido una elección personal de aprendizaje, dado que me parece un Framework PHP muy interesante, el cual es bastante utilizado actualmente, y no tenía prácticamente conocimientos de funcionamiento del mismo, por lo que me ha servido también a aprender a buscar información y ayuda tanto en la documentación oficial ofrecida por Laravel en su web oficial, como en foros.
 
Por otra parte, la elección de subir el proyecto a un servidor host, en este caso en IONOS, me ha servido para adquirir conocimientos necesarios para la administración básica de una aplicación web, en un servicio host, donde ha sido necesario creación y vinculación de la BD en el servidor, así como documentarme sobre cómo crear un fichero *.htaccess*, del cual sabía su existencia, pero no tenía conocimientos ni de qué parámetros contenía, ni de su estructura, así como hacer para que este funcionara correctamente en el servidor web, dado que con el fichero original, funcionaba en local, pero no en el host, por lo que me tocó adaptarlo.
 
Personalmente estoy bastante satisfecho con el trabajo realizado en este proyecto, con el nivel de esfuerzo dedicado al mismo y los resultados obtenidos.
 
### 8.1 Futuras implementaciones
 
Para futuras implementaciones de mi proyecto, me gustaría añadir algunas cosas que se me han quedado en el tintero por falta de tiempo, como por ejemplo:
 
   - Añadir una sección, donde poder realizar un CRUD de los proveedores, y poder asignar a cada proveedor, que productos te ofrece, así como su precio.
   - Añadir la funcionalidad de poder seleccionar los productos, para poder realizar un pedido, enviando un correo de solicitud al proveedor que ofrezca ese producto a un precio más bajo automáticamente.
   - Añadir una sección donde poder ver todos los pedidos en curso, así como los pasados.
   - Añadir la funcionalidad de poder marcar un pedido como recibido, y que este se sume al stock actual de tu tienda.
 
 
## 9. Glosario
 
En este apartado, pongo el significado de las siglas que he utilizado durante la memoria:
 
   - BD: Bases de Datos
   - SQL: Structured Query Language
   - ERP: Enterprise Resource Planning – Planificación de Recursos Empresariales
   - CRUD: acrónimo de "Crear, Leer, Actualizar y Borrar"
   - CIF: Código de identificación fiscal
   - MIT:  Massachusetts Institute of Technology
   - IBAN: Código Internacional de Cuenta Bancaria (en inglés, International Bank Account Number)
   - FTP: Protocolo de transferencia de archivos (en inglés File Transfer Protocol) 
   - HTML: lenguaje de marcado de hipertexto (en inglés  HyperText Markup Language)
   - CSS: Hojas de estilo en cascada (en inglés Cascading Style Sheets)
 
 
## 10. Bibliografía
 
Para poder realizar el proyecto, he consultado distintas páginas web, como pueden ser:
 
   - https://laravel.com/docs/8.x/
   - https://programacionymas.com/
   - https://laravelwithfirebase.blogspot.com/
   - https://firebase.google.com/docs
   - https://www.youtube.com/
   - https://es.stackoverflow.com/
 
 
 
 

