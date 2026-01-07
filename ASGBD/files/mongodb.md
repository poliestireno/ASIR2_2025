## **Despliegue de MongoDB en Docker**

### **Paso 1: Descargar e iniciar un contenedor de MongoDB**

Ejecuta el siguiente comando para descargar la imagen oficial de MongoDB e iniciar un contenedor:

`docker run -d \
  --name mongodb \
  -p 27017:27017 \
  -e MONGO_INITDB_ROOT_USERNAME=admin \
  -e MONGO_INITDB_ROOT_PASSWORD=admin123 \
  -v /TU_DIRECTORIO/mongo_data:/data/db \
  mongo
`

* `-d`: Ejecuta el contenedor en segundo plano.  
* `--name mongodb-container`: Nombre del contenedor.  
* `-p 27017:27017`: Mapea el puerto local `27017` al puerto del contenedor.  
* `-e MONGO_INITDB_ROOT_USERNAME`: Establece el usuario administrador.  
* `-e MONGO_INITDB_ROOT_PASSWORD`: Establece la contraseña del usuario administrador.
* `-v crea un volumen para que tenga persistencia, aunque que se borre el contenedor siguen los datos.`

  ### **Paso 2: Verificar el contenedor**

Lista los contenedores activos para asegurarte de que MongoDB está corriendo:

`docker ps`

### **Paso 3: Conectar a MongoDB**

Puedes conectarte a MongoDB usando un cliente gráfico como **MongoDB Compass** o desde la terminal con `mongo`:

Instalar mongosh

# Importar la clave pública de MongoDB
wget -qO - https://www.mongodb.org/static/pgp/server-7.0.asc | sudo gpg --dearmor -o /usr/share/keyrings/mongodb-archive-keyring.gpg

# Añadir el repositorio de MongoDB
echo "deb [ arch=amd64 signed-by=/usr/share/keyrings/mongodb-archive-keyring.gpg ] https://repo.mongodb.org/apt/ubuntu jammy/mongodb-org/7.0 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-7.0.list

# Actualizar repositorios
sudo apt update

# Instalar mongosh
sudo apt install -y mongodb-mongosh


## **MongoDB: Características principales y uso básico**

### **¿Qué es MongoDB?**

MongoDB es una base de datos NoSQL de tipo **documento**. En lugar de usar tablas y filas como en bases de datos relacionales, MongoDB almacena datos en documentos similares a JSON, lo que la hace flexible y escalable.

### **Características principales de MongoDB**

1. **Modelo de datos basado en documentos**:  
   * Los datos se almacenan en documentos BSON (similar a JSON).  
   * Cada documento puede tener un esquema flexible, lo que significa que los campos no tienen que estar predefinidos.  
2. **NoSQL**:  
   * No requiere esquemas fijos como las bases de datos relacionales.  
   * Ideal para trabajar con datos no estructurados o semiestructurados.  
3. **Escalabilidad horizontal**:  
   * Permite distribuir los datos en múltiples servidores mediante **sharding** (particionamiento).  
4. **Consultas potentes**:  
   * Ofrece un lenguaje de consultas flexible y expresivo con soporte para filtros, proyecciones, agregaciones, y búsquedas basadas en índices.  
5. **Alta disponibilidad**:  
   * Soporta **replicación** para tolerancia a fallos y recuperación automática.  
6. **Índices**:  
   * Soporta índices en cualquier campo para acelerar las búsquedas.  
7. **Agregaciones**:  
   * Proporciona potentes herramientas de procesamiento de datos mediante el framework de **aggregation pipeline**.

   ## **Uso básico de MongoDB desde la terminal**

   ### **1\. Conectarse a MongoDB**

Para conectarte al servidor MongoDB desde la terminal host:

`mongosh -u admin -p admin123 --authenticationDatabase admin`

Para conectarte al servidor MongoDB desde otro contenedor:

`docker exec -it mongodb mongosh -u admin -p admin123 --authenticationDatabase admin`


Una buena práctica para dejar de utilizar mongo es parar el contenedor, y en un momento futuro poderlo arrancar si perder nada:

`docker stop mongodb-container`

Para arrancarlo despues:

`docker start -ai mongodb-container`

### **2\. Ver bases de datos disponibles**

`show dbs`

Esto muestra todas las bases de datos existentes en el servidor.

### **3\. Seleccionar (o crear) una base de datos**

`use nombre_base_datos`

Si la base de datos no existe, este comando la creará al insertar el primer documento.

### **4\. Mostrar colecciones en una base de datos**

`show collections`

### **5\. Insertar documentos**

#### **Insertar un solo documento**

`db.nombre_coleccion.insertOne({`

  `nombre: "Juan",`

  `edad: 25,`

  `ciudad: "Madrid"`

`})`

#### **Insertar múltiples documentos**

`db.nombre_coleccion.insertMany([`

  `{ nombre: "Ana", edad: 30, ciudad: "Barcelona" },`

  `{ nombre: "Luis", edad: 28, ciudad: "Sevilla" }`

`])`

---

### **6\. Consultar documentos**

#### **Consultar todos los documentos de una colección**

`db.nombre_coleccion.find()`

#### **Consultar documentos con un filtro**

`db.nombre_coleccion.find({ ciudad: "Madrid" })`

#### **Consultar con proyección (mostrar solo campos específicos)**

`db.nombre_coleccion.find(`

 `{ ciudad: "Madrid" },`

 `{ nombre: 1, edad: 1, _id: 0 }`

`)`

### **7\. Actualizar documentos**

#### **Actualizar un solo documento**

Actualiza la edad de Juan:

`db.nombre_coleccion.updateOne(`

  `{ nombre: "Juan" },`

  `{ $set: { edad: 26 } }`

`)`

#### **Actualizar múltiples documentos**

Incrementa la edad de todas las personas que viven en "Madrid":

`db.nombre_coleccion.updateMany(`

  `{ ciudad: "Madrid" },`

  `{ $inc: { edad: 1 } }`

`)`

### **8\. Eliminar documentos**

#### **Eliminar un solo documento**

Elimina el documento de Juan:

`db.nombre_coleccion.deleteOne({ nombre: "Juan" })`

#### **Eliminar múltiples documentos**

Elimina todas las personas que viven en "Sevilla":

`db.nombre_coleccion.deleteMany({ ciudad: "Sevilla" })`

### **9\. Contar documentos**

Cuenta cuántos documentos existen en la colección:

`db.nombre_coleccion.countDocuments()`

O con un filtro:

`db.nombre_coleccion.countDocuments({ ciudad: "Madrid" })`

## **Pasos para usar MongoDB Visual (Compass)**

### Para trabajar con MongoDB desde un entorno visual, una herramienta popular es **MongoDB Compass**, que ofrece una interfaz gráfica fácil de usar para interactuar con las bases de datos. A continuación, te muestro un ejemplo paso a paso para realizar operaciones básicas con MongoDB Compass.

### **1\. Descargar e instalar MongoDB Compass**

### **2\. Conectarse a un servidor MongoDB**

1. Abre **MongoDB Compass**.  
* En la pantalla inicial, introduce la **URI de conexión** de tu servidor MongoDB. 

  ### **3\. Crear una base de datos y una colección**

1. En el panel izquierdo, haz clic en **Create Database**.  
2. Introduce un nombre para la base de datos, por ejemplo, `tienda`.  
3. Introduce un nombre para la colección inicial, por ejemplo, `productos`.  
4. Haz clic en **Create Database**.

   ### **4\. Insertar documentos**

1. Abre la colección `productos` dentro de la base de datos `tienda`.  
2. Haz clic en **Insert Document**.  
* Se abrirá un editor donde puedes insertar un documento en formato JSON. Por ejemplo:

  `{`  
*   `"nombre": "Laptop",`  
*   `"precio": 1000,`  
*   `"stock": 50`  
* `}`  
3. Haz clic en **Insert**.  
* Repite este proceso para insertar más documentos:  
  json

  `{`  
*   `"nombre": "Teléfono",`  
*   `"precio": 500,`  
*   `"stock": 200`  
* `}`  
    
  **5\. Consultar documentos**  
1. Dentro de la colección `productos`, verás una lista con todos los documentos.  
   Para realizar una consulta específica, usa el cuadro de búsqueda en la parte superior y escribe una consulta en formato JSON. Por ejemplo, para buscar productos con un precio mayor a 400:

   `{ "precio": { "$gt": 400 } }`  
   

   ### **6\. Actualizar documentos**

1. Encuentra el documento que quieres actualizar y haz clic en el ícono de lápiz junto a él.  
   Modifica el documento directamente en el editor. Por ejemplo, para actualizar el stock de la "Laptop":

   `{`  
    `"nombre": "Laptop",`  
     `"precio": 1000,`  
     `"stock": 45`  
   `}`  
2. Haz clic en **Update** para guardar los cambios.  
   

   ### **7\. Eliminar documentos**

1. Encuentra el documento que quieres eliminar.  
2. Haz clic en el ícono de papelera junto al documento.  
3. Confirma la eliminación en el cuadro de diálogo.  
   

   ### **Ventajas de MongoDB Compass**

* **Interfaz amigable**: Ideal para usuarios que prefieren evitar la línea de comandos.  
* **Visualización de datos**: Permite ver documentos, estructuras y estadísticas de manera gráfica.  
* **Consultas avanzadas**: Incluye asistentes para crear filtros y proyecciones.  
* **Gestión de índices**: Puedes crear y administrar índices sin necesidad de comandos.  
* **Agregaciones**: Ofrece un generador visual para pipelines de agregación.
