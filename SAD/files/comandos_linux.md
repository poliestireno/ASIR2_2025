
# Comandos de Linux básicos

| Comandos Comunes de Navegación y Estructura de Ficheros |  |
| :---- | :---- |
| ls | Lista el contenido (archivos y directorios) de un directorio. |
| cd | Cambia de directorio (navegar). Ej: cd /home/usuario o cd .. (subir un nivel). |
| pwd | Muestra la ruta del directorio actual donde te encuentras. |
| mkdir | Crea un nuevo directorio (carpeta). |
| rmdir | Elimina un directorio vacío. |
| touch | Crea un archivo vacío o actualiza la marca de tiempo de uno existente. |
| man | Abre la página del manual (ayuda) de un comando. Ej: man ls. |
|  |  |
| **Comandos Comunes de Gestión de Ficheros y Directorios** |  |
| cp | Copia archivos y directorios de una ubicación a otra. |
| mv | Mueve o renombra archivos y directorios. |
| rm | Elimina (borra) archivos o directorios de forma permanente. |
| cat | Muestra el contenido completo de un archivo de texto en la terminal. |
| head | Muestra las primeras 10 líneas de un archivo. |
| tail | Muestra las últimas 10 líneas de un archivo (útil para logs). |
| tar | Comprime y descomprime archivos (trabaja con archivos .tar, .tar.gz, etc.). |
| zip/unzip | Comprime y descomprime archivos en formato .zip. |
| **Comandos Comunes de Búsqueda y Filtrado** |  |
| find | Busca archivos y directorios en una jerarquía de directorios según varios criterios (nombre, tamaño, fecha). |
| grep | Busca patrones de texto dentro del contenido de uno o más archivos. |
| locate | Busca archivos usando una base de datos preconstruida, muy rápido, pero puede no ser 100% actualizado. |
| **Comandos Comunes de Gestión de Procesos** |  |
| ps | Muestra una instantánea estática de los procesos que se están ejecutando actualmente. |
| top | Muestra una vista dinámica y en tiempo real de los procesos, ordenados por consumo de CPU/Memoria. |
| htop | Versión interactiva y mejorada de top con una interfaz más visual (a menudo requiere instalación). |
| kill | Termina (envía una señal) un proceso por su PID (ID de Proceso). |
| pgrep | Busca el PID (ID de Proceso) de un proceso por su nombre. |
| **Comandos Comunes de Permisos y Usuarios** |  |
| chmod | Cambia los permisos de acceso (lectura, escritura, ejecución) de un archivo o directorio. |
| chown | Cambia el propietario (dueño) de un archivo o directorio. |
| sudo | Ejecuta un comando como superusuario (administrador). |
|  |  |
| **Ejemplos grep** |  |
| find . \-name "config.txt" | Busca un archivo llamado config.txt solo en el directorio actual (.). |
| find /home/usuario \-name "\*.jpg" | Busca todos los archivos con extensión .jpg en el directorio del usuario y sus subdirectorios. |
| find /var/www \-type d \-name "cache" | Busca solo directorios (-type d) llamados cache dentro de /var/www. |
| find /tmp \-type f \-size \+10M | Busca todos los archivos (-type f) en /tmp cuyo tamaño sea mayor a 10 Megabytes (+10M). |
| **Ejemplos find** |  |
| find . \-name "config.txt" | Busca un archivo llamado config.txt solo en el directorio actual (.). |
| find /home/usuario \-name "\*.jpg" | Busca todos los archivos con extensión .jpg en el directorio del usuario y sus subdirectorios. |
| find /var/www \-type d \-name "cache" | Busca solo directorios (-type d) llamados cache dentro de /var/www. |
| find /tmp \-type f \-size \+10M | Busca todos los archivos (-type f) en /tmp cuyo tamaño sea mayor a 10 Megabytes (+10M). |
| **Ejemplos locate** |  |
| locate notas\_de\_reunion.pdf | Busca rápidamente en todo el sistema la ruta de cualquier archivo llamado notas\_de\_reunion.pdf. |
| locate \-i documentos | Busca archivos o directorios que contengan la palabra "documentos" en su nombre, ignorando mayúsculas/minúsculas (-i). |
| sudo updatedb | (Comando para el administrador) Fuerza la actualización manual de la base de datos de locate para incluir los archivos creados más recientemente. |

# Comandos de Linux sobre permisos

## chmod (cambiar los permisos de los archivos)

El comando `chmod` se utiliza para cambiar los permisos de un archivo o directorio. Los permisos determinan quién puede leer, escribir o ejecutar el archivo.

*   **Ejemplo 1**: `chmod 755 archivo`  
    Establece permisos de lectura, escritura y ejecución para el propietario (7), y permisos de lectura y ejecución para los demás (5).

```
ls -l archivo
-rwxr-xr-x 1 usuario grupo 0 date archivo
```

*   **Ejemplo 2**: `chmod +x script.sh`  
    Agrega el permiso de ejecución para el propietario del archivo.

```
ls -l script.sh
-rwxr--r-- 1 usuario grupo 0 date script.sh
```

## chown (cambiar el propietario y grupo de un archivo)

El comando `chown` cambia el propietario y el grupo de un archivo o directorio.

*   **Ejemplo 1**: `chown usuario:grupo archivo`  
    Cambia el propietario del archivo a "usuario" y el grupo a "grupo".

```
ls -l archivo
-rwxr--r-- 1 usuario grupo 0 date archivo
```

*   **Ejemplo 2**: `chown -R usuario:grupo /directorio`  
    Cambia recursivamente el propietario y el grupo de todos los archivos y subdirectorios en "/directorio".

```
ls -l /directorio
drwxr-xr-x 1 usuario grupo 0 date directorio
```

## chgrp (cambiar el grupo de un archivo)

El comando `chgrp` cambia el grupo al que pertenece un archivo o directorio.

*   **Ejemplo 1**: `chgrp nombre_grupo archivo`  
    Cambia el grupo del archivo a "nombre\_grupo".

```
ls -l archivo
-rwxr--r-- 1 usuario nombre_grupo 0 date archivo
```

*   **Ejemplo 2**: `chgrp -R nombre_grupo /directorio`  
    Cambia recursivamente el grupo de todos los archivos y subdirectorios en "/directorio".

```
ls -l /directorio
drwxr-xr-x 1 usuario nombre_grupo 0 date directorio
```

## umask (establecer permisos predeterminados de archivos)

El comando `umask` establece los permisos predeterminados para los archivos y directorios que se crean.

*   **Ejemplo 1**: `umask 022`  
    Establece los permisos predeterminados para archivos recién creados a 755.

```
touch nuevo_archivo
ls -l nuevo_archivo
-rwxr-xr-x 1 usuario grupo 0 date nuevo_archivo
```

*   **Ejemplo 2**: `umask 007`  
    Establece los permisos predeterminados para archivos recién creados a 770.

```
touch otro_archivo
ls -l otro_archivo
-rwxrwx--- 1 usuario grupo 0 date otro_archivo
```

*   **Ejemplo 3**: `umask -S`  
    Muestra la umask actual en notación simbólica.

```
umask -S
u=rwx,g=rx,o=rx
```

*   **Ejemplo 4**: `umask 002`  
    Establece los permisos predeterminados para archivos recién creados a 775.

```
touch nuevo_archivo
ls -l nuevo_archivo
-rwxrwxr-x 1 usuario grupo 0 date nuevo_archivo
```
## SUID (Set User ID)

El bit SUID permite que un archivo se ejecute con los permisos del propietario del archivo.
El SUID es un permiso especial que se puede establecer en archivos ejecutables en sistemas Unix y Linux. Cuando se aplica el bit SUID a un archivo, permite que el archivo se ejecute con los permisos del propietario del archivo, en lugar de los permisos del usuario que lo está ejecutando. Esto es útil en situaciones donde se requiere que los usuarios tengan acceso temporal a privilegios elevados sin otorgarles acceso permanente a esos privilegios.
Uso principal: El SUID se utiliza principalmente para permitir que los programas realicen tareas que requieren permisos de superusuario (root) o de otro usuario, sin que el usuario tenga esos permisos directamente. Esto puede ser crítico para ciertos programas que necesitan acceso a recursos protegidos.

*   **Ejemplo 1**: `chmod u+s archivo`  
    Establece el bit SUID en el archivo.

```
ls -l archivo
-rwsr--r-- 1 usuario grupo 0 date archivo
```

*   **Ejemplo 2**: `ls -l archivo`  
    Muestra el bit SUID como una “s” en la posición de ejecución del propietario.

```
ls -l archivo
-rwsr--r-- 1 usuario grupo 0 date archivo
```

## SGID (Set Group ID)

El bit SGID permite que un archivo o directorio se ejecute con los permisos del grupo del archivo o directorio.
El SGID es un permiso especial que se puede aplicar a archivos y directorios en sistemas Unix y Linux. Cuando se establece el bit SGID en un archivo ejecutable, este se ejecuta con los permisos del grupo del archivo en lugar de los permisos del grupo del usuario que lo ejecuta. Esto permite a los usuarios ejecutar programas con privilegios del grupo, lo cual es útil en situaciones donde varios usuarios necesitan acceso a recursos compartidos.
En archivos ejecutables: Si un archivo tiene el bit SGID, cualquier usuario que lo ejecute lo hará con los permisos del grupo propietario del archivo.
En directorios: Si se establece el SGID en un directorio, los archivos creados dentro de ese directorio heredarán automáticamente el grupo del directorio, en lugar de ser asignados al grupo del usuario que creó el archivo. Esto es útil en entornos colaborativos.

*   **Ejemplo 1**: `chmod g+s directorio`  
    Establece el bit SGID en el directorio.

```
ls -l directorio
drwxr-sr-x 1 usuario grupo 0 date directorio
```

*   **Ejemplo 2**: `ls -l directorio`  
    Muestra el bit SGID como una “s” en la posición de ejecución del grupo.

```
ls -l directorio
drwxr-sr-x 1 usuario grupo 0 date directorio
```

## Sticky bit

El bit de sticky asegura que solo el propietario del archivo o el directorio pueda eliminar o modificar archivos dentro del directorio.
El Sticky Bit es un permiso especial que se aplica generalmente a los directorios. Cuando se establece el Sticky Bit en un directorio, solo los propietarios de los archivos dentro de ese directorio pueden eliminar o renombrar sus propios archivos. Este mecanismo ayuda a proteger los archivos en directorios compartidos, como /tmp, donde muchos usuarios tienen acceso.
Uso común: Es más común en directorios públicos, donde múltiples usuarios pueden crear y gestionar archivos. El Sticky Bit evita que un usuario elimine o modifique archivos que no le pertenecen.

*   **Ejemplo 1**: `chmod +t directorio`  
    Establece el bit de sticky en el directorio.

```
ls -ld directorio
drwxr-xr-t 1 usuario grupo 0 date directorio
```

*   **Ejemplo 2**: `ls -ld directorio`  
    Muestra el bit de sticky como una “t” en la posición de ejecución de otros.

```
ls -ld directorio
drwxr-xr-t 1 usuario grupo 0 date directorio
```


