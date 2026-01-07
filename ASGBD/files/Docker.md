
![image](https://github.com/user-attachments/assets/0152e525-a883-4ee5-96a7-ed643a449e26)


Docker utiliza la tecnología de contenedores para encapsular una aplicación y sus dependencias (librerías, binarios, etc.) en una unidad independiente y portable llamada **imagen de contenedor**.

### **Componentes Clave:**

1. **Docker Engine**:  
   * Es el motor principal que gestiona la creación, ejecución y administración de contenedores.  
2. **Imágenes**:  
   * Una imagen es un paquete que contiene todo lo necesario para ejecutar una aplicación, incluido el sistema operativo base, bibliotecas y el propio código de la app.  
3. **Contenedores**:  
   * Los contenedores son instancias ejecutables de las imágenes. Son ligeros y se inician rápidamente.  
4. **Docker Hub**:  
   * Un repositorio público donde puedes buscar, descargar y publicar imágenes de contenedores.

---

## **¿Para qué sirve Docker?**

### **1\. Empaquetado de Aplicaciones**

Docker te permite crear imágenes que contienen tu aplicación y todas sus dependencias. Esto asegura que la aplicación se ejecute de la misma manera en cualquier entorno (desarrollo, pruebas, producción).

### **2\. Ejecución Aislada**

Cada contenedor opera de forma independiente y aislada del sistema anfitrión, lo que evita conflictos entre aplicaciones que utilizan diferentes versiones de las mismas librerías.

### **3\. Despliegue Rápido**

Los contenedores se pueden iniciar en segundos, lo que acelera enormemente el tiempo de despliegue en producción.

### **4\. Escalabilidad**

Docker facilita la escalabilidad horizontal mediante la ejecución de múltiples instancias de un contenedor, que pueden ser gestionadas por herramientas como Kubernetes.

---

## **¿Qué tiene de bueno Docker?**

### **1\. Portabilidad**

Una imagen Docker funciona igual en cualquier máquina que tenga Docker instalado, ya sea tu portátil, un servidor físico o en la nube.

### **2\. Ligereza**

Los contenedores son mucho más ligeros que las máquinas virtuales tradicionales, ya que comparten el kernel del sistema operativo anfitrión.

### **3\. Eficiencia de Recursos**

Docker optimiza el uso de CPU y memoria porque no necesita un sistema operativo completo para cada contenedor, a diferencia de las máquinas virtuales.

### **4\. Facilita el CI/CD**

Docker se integra fácilmente en pipelines de **Integración Continua** y **Despliegue Continuo**, lo que automatiza la construcción, prueba y despliegue de aplicaciones.

### **5\. Comunidad y Ecosistema Amplio**

Docker tiene una gran comunidad y un amplio ecosistema de herramientas y servicios. El **Docker Hub** ofrece miles de imágenes preconfiguradas para bases de datos, servidores web, herramientas de desarrollo, etc.

### **6\. Control de Versiones**

Puedes versionar tus imágenes Docker, lo que permite regresar a una versión anterior de tu aplicación si algo falla.

---

## **Casos de Uso**

* **Desarrollo Multiplataforma**: Los desarrolladores pueden trabajar en diferentes sistemas operativos sin problemas de compatibilidad.  
* **Microservicios**: Docker es ideal para implementar arquitecturas de microservicios, donde cada servicio se ejecuta en su propio contenedor.  
* **Testing Automatizado**: Las pruebas se pueden ejecutar en entornos idénticos a producción, lo que reduce errores por diferencias en configuraciones.  
* **Contenedores Efímeros**: Usar contenedores para tareas temporales, como pruebas rápidas o compilaciones.

---

## **Comparación con Máquinas Virtuales**

| Característica | Docker (Contenedores) | Máquinas Virtuales |
| :---- | :---- | :---- |
| **Peso** | Ligero | Pesado (incluye SO completo) |
| **Inicio** | Segundos | Minutos |
| **Uso de recursos** | Menor | Mayor |
| **Aislamiento** | Aislado pero comparte kernel | Completo |
| **Portabilidad** | Alta | Menor |

---

## **Conclusión**

Docker es una herramienta poderosa que mejora la eficiencia, portabilidad y escalabilidad de las aplicaciones. Es ideal tanto para desarrolladores como para administradores de sistemas que buscan simplificar la creación, despliegue y gestión de aplicaciones.


# **Comandos básicos**

### **2\. Verificar instalación de Docker**

`docker --version`

Muestra la versión instalada de Docker.

---

### **3\. Descargar una imagen**

`docker pull <nombre_imagen>`

`docker pull ubuntu`

Descarga la imagen `ubuntu` desde Docker Hub.

---

### **4\. Listar imágenes locales**

`docker images`

Muestra todas las imágenes descargadas en el sistema.

---

### **5\. Crear y ejecutar un contenedor**

`docker run <opciones> <imagen>`

`docker run -it ubuntu`

Ejecuta un contenedor interactivo de `ubuntu`.

---

### **6\. Listar contenedores activos**

`docker ps`

Muestra los contenedores en ejecución.

---

### **7\. Listar todos los contenedores (activos e inactivos)**

`docker ps -a`

Muestra todos los contenedores, incluso los detenidos.

---

### **8\. Detener un contenedor**

`docker stop <id_contenedor>`

Detiene un contenedor en ejecución. Puedes obtener el `<id_contenedor>` con `docker ps`.

---

### **9\. Eliminar un contenedor**

`docker rm <id_contenedor>`

Elimina un contenedor detenido.

---

### **10\. Eliminar una imagen**

`docker rmi <id_imagen>`

Elimina una imagen local. Puedes obtener el `<id_imagen>` con `docker images`.

---

### **11\. Ver logs de un contenedor**

`docker logs <id_contenedor>`

Muestra los logs generados por un contenedor.

---

### **12\. Acceder a un contenedor en ejecución**

`docker exec -it <id_contenedor>` 

Permite ejecutar un shell interactivo dentro del contenedor.

---

### **13\. Ver información general de Docker**

### `docker info`

Muestra detalles sobre la configuración y estado de Docker.

---

### **14\. Ver ayuda sobre un comando**

`docker <comando> --help`

`docker run --help`

Muestra todas las opciones disponibles para el comando `run`.




# **Aplicación `hello-world` con Docker**

Pasos detallados para descargar y ejecutar la imagen `hello-world` con Docker:

---

### **1\. Verificar que Docker está instalado**

Asegúrate de que Docker está instalado y funcionando en tu sistema. Para comprobarlo, ejecuta:

`docker --version`

Si no está instalado, consulta la documentación oficial de Docker para instalarlo según tu sistema operativo.

---

### **2\. Descargar y ejecutar la imagen `hello-world`**

Buscar para ver su información en la web docker hub:
https://hub.docker.com/_/hello-world

La imagen `hello-world` es una de las más básicas en Docker. Puedes descargarla y ejecutarla directamente con el siguiente comando:

`docker run hello-world`

Este comando realiza lo siguiente:

1. **Verifica si la imagen `hello-world` está disponible localmente**.  
2. Si no está presente, la descargará automáticamente desde Docker Hub.  
3. **Crea y ejecuta un contenedor** basado en esa imagen.  
4. **Muestra un mensaje de bienvenida en la terminal**.

---

### **3\. Verificar las imágenes locales**

Una vez que la imagen ha sido descargada, puedes verificar que está disponible localmente con:

`docker images`

Esto mostrará un listado de todas las imágenes descargadas en tu sistema, incluyendo `hello-world`.

---

### **4\. Ver contenedores creados**

Para ver el contenedor que se creó y ejecutó, usa:

`docker ps -a`

Este comando muestra todos los contenedores, incluso los que han finalizado su ejecución.

---

### **5\. Eliminar el contenedor (opcional)**

Si ya no necesitas el contenedor, puedes eliminarlo para liberar espacio:

`docker rm <id_contenedor>`

Reemplaza `<id_contenedor>` con el ID o nombre del contenedor que aparece en `docker ps -a`.

---

### **6\. Eliminar la imagen (opcional)**

Si ya no necesitas la imagen `hello-world`, puedes eliminarla con:

`docker rmi hello-world`


