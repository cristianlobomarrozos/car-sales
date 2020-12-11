# car-sales

Este proyecto trata de una página web de compra de coches. Se pueden encontrar coches tanto deportivos clásicos, como deportivos y utilitarios modernos.

Distinguiremos dos tipos de usuario: 
  - Usuarios registrados
  - Usuarios no registrados
  
Los usuarios no registrados podrán únicamente navegar por las páginas de modelos clásicos y modernos, pero sin la posibilidad de realizar la compra, para ello deberá registrarse en la aplicación.
  
Dentro de los Usuarios registrados distinguimos 2 tipos más de usuarios:
  - Administradores
  - Usuarios Normales

Una cuenta de administrador es:
  - User: admin@admin.es
  - Password: 12345

Ambos tipos de usuarios pueden navegar por las pestañas de los vehículos y realizar compras. Mientras que los administradores tendrán también a si disposición la posibilidad de añadir, borrar, editar modelos de coches así como borrar y modificar usuarios registrados.

En la inserción de modelos de coches, es necesario, al menos, rellenar los campos de nombre, marca, potencia, año y si es clásico o no, además de incluir, al menos, una imágen de dicho modelo para su publicación. Este apartado queda de uso exclusivo de los administradores.

El administrador, podrá editar los usuarios registrados, únicamente para ascenderlos a administradores y podrá eliminar usuarios registrados, siempre y cuando no hayan realizado ninguna compra, en caso contrario, hará una recarga de la página, sin haber realizado el borrado.

La funcionalidad de compra nos pedirá que pongamos nuestro nombre, correo electrónico y DNI. A la hora de incluir el DNI, nos lo pedirá en 2 campos diferente. El primero para incluir el apartado numérico y el segundo para la letra. Esto nos facilitará la comprobación de que los datos son correctos, en cuyo caso se procederá a dar por completada la compra añadiendo la misma en nuestra tabla de pedidos. En caso de que los datos de número de DNI y letra no coincidan, nos saltará una alerta de error.

Cada usuario puede acceder a su perfil y, dentro de él, puede cambiar su imagen de perfil, así como pedir la generación de una API_KEY,para poder utilizar la API que hemos creado. Además, también tendrá acceso a su historial de compras en el que aparecerán todos los pedidos que dicho usuario haya realizado y una gráfica que reflejará la cantidad de cada modelo diferente que hemos comprado.

Documentación de la API: 
  - Marca: https://documenter.getpostman.com/view/13832346/TVmV7Ed9
  - Usuario: https://documenter.getpostman.com/view/13832346/TVmV7EdA
  - Modelo: https://documenter.getpostman.com/view/13832346/TVmV7EdB

Al registrarse en la aplicación, en local no es necesario incluir fecha de nacimiento, mientras que en el hosting externo, si que es necesario rellenar este campo, ya que si está vacío, no realizará la inserción, por lo tanto no podrá acceder dicho usuario. Además de esto, como predeterminado será registrado como no administrador, algún administrador debería ascenderlo en caso de que así lo considere.
