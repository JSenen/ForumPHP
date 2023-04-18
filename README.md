# ForumPHP 
***

## Actividad de Aprendizaje 2ºSIO - DAM Desarrollo de Interfaces
👨🏻‍💻
***
![php](https://img.shields.io/badge/php-777BB4?style=for-the-badge&logo=php&logoColor=white)
![mysql](https://img.shields.io/badge/mysql-blue?style=for-the-badge&logo=mysql&logoColor=white)
![MAMP](https://img.shields.io/badge/mamp-grey?style=for-the-badge&logo=mamp&logoColor=white)
![VSCode](https://img.shields.io/badge/vscode-blue?style=for-the-badge&logo=vscode&logoColor=white)
***

En esta actividad se ha desarrollado un foro web, con **implementación de php y acceso a base de datos por medio de PHP Data Objects (PDO)**.

***

### BASE DE DATOS

Para la base de datos se ha utilizado ![php](https://img.shields.io/badge/phpMyAdmin-777BB4?style=for-the-badge&logo=phpmyadmin&logoColor=white)

La base de datos se compone de 4 tablas

1. **CATEGORIES** -> Contiene las distintas categorias del foro
2. **TOPICS** -> Los distintos temas de los que se compone cada categoria
3. **POSTS** -> Comentarios o mensajes que se encuentran dentro de cada tema
4. **USERS** -> Registro de usuarios. En el mismo se emplea **encriptación de contraseña** y se distinguen el nivel de usuario (Level 0 = Administrador / Level 1 = Usuario Registrado )

![Imagen](https://raw.githubusercontent.com/JSenen/ForumPHP/blob/main/ER_BaseDatos.png)

Existe un ***usuario "root", password "root"*** para el control de la Base de Datos y dentro de la misma un usuario ***"admin" y password "admin"***, asi como "***Pepe" password "pepe"*** para poder comprobar su funcionamiento.
Se incorpora a este repositorio un **script** dentro del directorio db denominado foro.sql
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

### CODIGO DE INTERES

Se adjunta partes de código de funciones de interes

#### MVC

En todo el desarrollo se ha implementado el patrón de diseño **Model View Controller**

#### ENCRIPTACION CONTRASEÑAS

**Encriptación contraseña**
```
$passhash = password_hash($password, PASSWORD_DEFAULT); 
```
**Verificación contraseña**
```
password_verify($password,$pass)
```
**Ejemplo control inyeccion SQL**
```
try {
      //configuramos la consulta a la base de datos
      $stmt = $dbh->prepare("SELECT post_id, post_content, post_date, post_by FROM posts WHERE post_topic = :id");
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
      
      $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
      .
      .
      .
       } catch (PDOException $e) {
      echo "ERROR: " . $e->getMessage();
  }
  ```
**Mail**
Envio
```
function sendmail($emailuser,$name){

    ini_set( 'display_errors', 1 ); //Avisará de error si no se ejecuta
    error_reporting( E_ALL );
    $asunto = 'Bienvienido '.$name.' al Foro';
    $cuerpo = 'Gracias por registrarte. '.$name.' Recuerda tener tus claves de acceso en un lugar seguro';

    $date = date('d-m-Y');           //Recuperamos fecha actual en formato dia-mes-año
    $to = $emailuser;                 
    $subject = $asunto;                    
    $message = $cuerpo;  
    $headers = "Date:" . $date;             
    $headers .= "From: Foro PHP";
    $headers .= "User mail ".$emailuser;     
    mail($to,$subject,$message, $headers);  
    echo '<div class="message_login"><div><p class="success">EMAIL ENVIADO</p></div></div></p>';
}
```
Validacion
```
function validate_mail($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {    
        return $email;
    }else{
       return $email = '';}
}
```
Refreso de pantalla tras tiempo establecido
```
$sec = 3; 
      $message = 'EMAIL INTRODUCIDO NO VALIDO';
      include('./view/error_header_view.php');
      header("Refresh: $sec; url=indexRegister.php");
```
**Otros**
Parseado de fechas
```
function fixdate($date) {
  //Funcion que nos permite modificar el formato de la fecha 
  return date('d-m-Y', strtotime($date));
}
```
#### UTILIZACION DE OBJETOS

En el modelo, disponemos de 4 objetos que iremos utilizando durante el desarrollo de la aplicación

***CONECCTION***
En esta clase, se encuentra el constructor para la conexión a la base de datos por medio de PDO por medio
de una función a la que se lamará durante las diferentes peticiones.

```
 function getConection() {
    // Con un array de opciones
    try {
        $dbname = "foro";            //Nombre de la Base de Datos
        $user = "root";             // Usuario
        $password = "root";         // Contraseña
        $server = 'localhost';      // Dirección servidor
        $dbh ="";
        $dsn = "mysql:host=$server;dbname=$dbname;charset=UTF8";
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo $e->getMessage();
        redirect('errorpagePDO_view.php'); 
    }
    return $dbh;
}
```

En la misma, tambien encontramos la funcion para comprobar el login del usuario
```
function getLogin()
{
    if ( isset ($_POST['username']) && ($_POST('userpassword'))) {
        if($_POST['username'] == 'admin' && $_POST['userpassword'] == 'admin ') {
            return $result = 'login';
        } else {
            return $result = 'invalida user';
        }
    }
}
```
***CATEGORY**
En modelo correspondiente a la entidad Category de la base de datos. 
Podemos encontrar diferentes funciones a las que se llamara en distintos momentos, según el tipo
de dato que necesitemos de la Base de Datos

***POST**
Igual que en el modelo Category
***TOPIC***
Igual que en el modelo Category












    

