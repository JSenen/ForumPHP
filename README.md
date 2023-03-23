# ForumPHP
***

## Actividad de Aprendizaje 2ºSIO - DAM Desarrollo de Interfaces

***
![php](https://img.shields.io/badge/php-777BB4?style=for-the-badge&logo=php&logoColor=white)
![mysql](https://img.shields.io/badge/mysql-blue?style=for-the-badge&logo=mysql&logoColor=white)
![MAMP](https://img.shields.io/badge/mamp-grey?style=for-the-badge&logo=mamp&logoColor=white)
![VSCode](https://img.shields.io/badge/vscode-blue?style=for-the-badge&logo=vscode&logoColor=white)
***

En esta actividad se ha desarrollado un foro web, con implementación de php y acceso a base de datos por medio de PHP Data Objects (PDO).

***

### BASE DE DATOS

Para la base de datos se ha utilizado ![php](https://img.shields.io/badge/phpMyAdmin-777BB4?style=for-the-badge&logo=phpmyadmin&logoColor=white)

La base de datos se compone de 4 tablas

1. CATEGORIES -> Contiene las distintas categorias del foro
2. TOPICS -> Los distintos temas de los que se compone cada categoria
3. POSTS -> Comentarios o mensajes que se encuentran dentro de cada tema
4. USERS -> Registro de usuarios. En el mismo se emplea encriptación de contraseña y se distinguen el nivel de usuario (Level 0 = Administrador / Level 1 = Usuario Registrado )

![database](https://raw.githubusercontent.com/JSenen/ForumPHP/main/ER_BaseDatos.png)

Existe un usuario "root", password "root" para el control de la Base de Datos y dentro de la misma un usuario "admin" y password "admin", asi como "Pepe" password "pepe" para poder comprobar su funcionamiento.
***

Dentro de la página podemos ir saltando de categorias a temas y de ahi a los comentarios; pulsando sobre cada uno de ellos.
Según el login del usuario, la página distingue si se trata de un ADMINISTRADOR, USUARIO o INVITADO. Y lo irá indicando en el header de la misma.

***

### USUARIOS

Dependiendo del nivel del usuario podrá tener acceso a distintas funciones.

1. ADMINISTRADORES : 
    - Categorias: Añadir, Borrar y Editar
    - Temas: Añadir, Borrar y Editar
    - Mensajes: Añadir, Borrar y sólo editar los que haya grabado el mismo.
2. USUARIOS:
    - Categorias: Nada
    - Temas: Añadir
    - Mensajes: Añadir. Y sólo  Borrar y Editar los que haya creado el mismo.
3. INVITADO: Sólo podrá visualizar, ni Añadir ni Borrar ni Editar

***

### LOGIN y REGISTRO

Desde la página principal podemos acceder al Login en el sistema y en caso de no disponer de el, podemos realizar un nuevo registro.
Al realizar el nuevo registro, se comprobará la validación de campos para asegurar una entrada limpia de la información en la base. En caso de error, nos avisará por medio de un mensaje y refrescará la página.



    

