# Tunel HTTP - MYSQL
Realizar un tunel http para conectarse a mysql. Devolviendo los resultados de las consultas en json.

## TESTING
En construcción.


## Servicio
Este proyecto se guarda en un directorio accesible por http y se configura. De este modo podrn realizarse consultas a traves de las urls.
### Configuración
Es necesario crear un archivo "secret.php" con la configuracion de la conexion a la db y el directorio donde se encuentra alojado el proyecto.
#### Secretos
Ejemplo: secret-ejemple.php
### URL's
Estas urls nos serviran para lanzar los comandos de mysql, enviando por post el parametro "query" con el comando.
#### /public/v1/query
Realizar una consulta a mysql.
#### /public/v1/insert
Realizar un insert en mysql y devuelve el id de la fila.

## Cliente
El cliente es una libreria para php con la que se puede conectar al servicio.