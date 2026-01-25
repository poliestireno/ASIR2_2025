## **JSON (JavaScript Object Notation)**

### **¿Qué es JSON?**

JSON es un formato de intercambio de datos ligero basado en texto, utilizado principalmente para transmitir datos entre un servidor y una aplicación web. Su simplicidad lo ha convertido en un estándar ampliamente adoptado.

### **Características de JSON**

1. **Formato basado en texto**: Fácil de leer y escribir tanto para humanos como para máquinas.  
2. **Ligero**: Consume menos ancho de banda al ser compacto.  
3. **Compatible con muchos lenguajes**: JSON es soportado nativamente o a través de bibliotecas en casi todos los lenguajes de programación.  
4. **Flexible**: Permite estructuras de datos complejas gracias al uso de objetos y arreglos.

### **Sintaxis JSON**

* **Objeto JSON**: Un conjunto de pares clave-valor encerrado en llaves `{}`.  
* **Array JSON**: Una lista ordenada de valores encerrada en corchetes `[]`.

#### **Ejemplo:**

json

`{`  
  `"name": "Alice",`  
  `"age": 30,`  
  `"email": "alice@example.com",`  
  `"skills": ["JavaScript", "Python", "SQL"],`  
  `"address": {`  
    `"street": "123 Main St",`  
    `"city": "Springfield",`  
    `"zip": "12345"`  
  `}`  
`}`

#### **Tipos de datos JSON:**

1. **String**: `"Hello, world!"`  
2. **Number**: `42`, `3.14`  
3. **Boolean**: `true`, `false`  
4. **Null**: `null`  
5. **Array**: `["item1", "item2"]`  
6. **Object**: `{ "key": "value" }`

## **1\. Crear una base de datos**

En la terminal de MongoDB:

`use arboles`

Esto seleccionará (o creará, si no existe) la base de datos llamada `arboles`.

---

## **2\. Insertar documentos básicos**

### **Insertar árboles con información general:**

`db.trees.insertMany([`

  `{`

    `name: "Roble",`

    `scientific_name: "Quercus robur",`

    `height: 35,`

    `age: 120,`

    `location: { country: "España", region: "Galicia" }`

  `},`

  `{`

    `name: "Pino",`

    `scientific_name: "Pinus sylvestris",`

    `height: 40,`

    `age: 80,`

    `location: { country: "España", region: "Cataluña" }`

  `},`

  `{`

    `name: "Abeto",`

    `scientific_name: "Abies alba",`

    `height: 50,`

    `age: 100,`

    `location: { country: "Francia", region: "Alpes" }`

  `}`

`])`

---

## **3\. Consultar documentos**

### **Buscar todos los árboles:**

`db.trees.find()`

### **Buscar árboles por altura mayor a 30 metros:**

`db.trees.find({ height: { $gt: 30 } })`

### **Buscar un árbol por su nombre científico:**

`db.trees.find({ scientific_name: "Pinus sylvestris" })`

### **Operadores de comparación**

* **`$eq`**: Igualdad (`campo == valor`).  
* **`$ne`**: Diferencia (`campo != valor`).  
* **`$gt`**: Mayor que (`campo > valor`).  
* **`$gte`**: Mayor o igual que (`campo >= valor`).  
* **`$lt`**: Menor que (`campo < valor`).  
* **`$lte`**: Menor o igual que (`campo <= valor`).  
* **`$in`**: Contiene al menos uno de los valores especificados.  
* **`$nin`**: No contiene ninguno de los valores especificados.

---

### **Operadores lógicos**

**`$and`**: Combina múltiples condiciones, todas deben cumplirse.

`{ $and: [{ campo1: 50 }, { campo2: { $gt: 20 } }] }`  
**`$or`**: Combina múltiples condiciones, al menos una debe cumplirse.

`{ $or: [{ campo1: 50 }, { campo2: { $gt: 20 } }] }`  
**`$not`**: Niega una condición.

`{ campo: { $not: { $gt: 50 } } }`  
**`$nor`**: Ninguna de las condiciones especificadas puede cumplirse.

`{ $nor: [{ campo1: 50 }, { campo2: { $gt: 20 } }] }`

---

### **Operadores de elementos**

**`$exists`**: Verifica si un campo existe o no.

`{ campo: { $exists: true } }`  
**`$type`**: Filtra documentos por el tipo de datos de un campo.

`{ campo: { $type: "string" } }`  
---

### **Operadores de evaluación**

**`$regex`**: Busca coincidencias usando expresiones regulares.

`{ campo: { $regex: /^texto/i } }`  
**`$expr`**: Permite usar expresiones de agregación dentro de las consultas.

`{ $expr: { $gt: ["$campo1", "$campo2"] } }`  
**`$mod`**: Verifica si un valor dividido por un divisor tiene un residuo específico.

`{ campo: { $mod: [4, 0] } } // Múltiplos de 4`  
**`$text`**: Busca coincidencias en índices de texto.

`{ $text: { $search: "palabra clave" } }`  
**`$where`**: Usa  para filtrar documentos (no recomendado por razones de rendimiento).

`{ $where: "this.campo1 > this.campo2" }`  
---

### **Operadores de matrices**

**`$all`**: Verifica que un campo de tipo array contenga todos los valores especificados.

`{ campo: { $all: [1, 2, 3] } }`  
**`$elemMatch`**: Verifica si al menos un elemento en un array cumple varias condiciones.

`{ campo: { $elemMatch: { subcampo1: 50, subcampo2: { $gte: 20 } } } }`  
**`$size`**: Verifica el tamaño de un array.

`{ campo: { $size: 3 } }`  
**`$slice`**: Recupera una porción de un array (se usa en proyecciones).

`db.coleccion.find({}, { campo: { $slice: 2 } }) // Primeros 2 elementos`

---

## **4\. Relaciones entre documentos**

### **Relación 1:1: Un árbol y su clasificación ecológica**

Cada árbol tiene un único tipo de clasificación ecológica.

Inserta un documento en la colección `ecological_classifications`:  


`db.ecological_classifications.insertOne({`

  `_id: ObjectId("64891b2e5d2f4a38b89e0c1a"),`

  `type: "Deciduo",`

  `description: "Árboles que pierden sus hojas estacionalmente."`

`})`



Relaciona el árbol "Roble" con esta clasificación:  

`db.trees.updateOne(`

  `{ name: "Roble" },`

  `{ $set: { ecological_classification_id: ObjectId("64891b2e5d2f4a38b89e0c1a") } }`

`)`



Consulta la relación usando `lookup`:  

`db.trees.aggregate([`

  `{`

    `$lookup: {`

      `from: "ecological_classifications",`

      `localField: "ecological_classification_id",`

      `foreignField: "_id",`

      `as: "classification"`

    `}`

  `}`

`])`



---

### **Relación 1:N: Un árbol y sus avistamientos**

Un árbol puede ser avistado múltiples veces en diferentes ubicaciones.

Inserta avistamientos para el árbol "Pino":

`db.sightings.insertMany([`

  `{ tree_name: "Pino", location: "Pirineos", date: ISODate("2023-11-01T00:00:00Z") },`

  `{ tree_name: "Pino", location: "Montseny", date: ISODate("2023-12-01T00:00:00Z") }`

`])`



Consulta los avistamientos de "Pino":

`db.sightings.find({ tree_name: "Pino" })`



Usa `lookup` para mostrar los avistamientos relacionados:

`db.trees.aggregate([`

  `{`

    `$lookup: {`

      `from: "sightings",`

      `localField: "name",`

      `foreignField: "tree_name",`

      `as: "sightings"`

    `}`

  `}`

`])`



---

### **Relación N:M: Árboles y animales asociados**

Un árbol puede ser hogar de múltiples animales, y un animal puede habitar múltiples árboles.

Inserta animales en la colección `animals`:

`db.animals.insertMany([`

  `{ name: "Ardilla", species: "Sciurus vulgaris" },`

  `{ name: "Pájaro carpintero", species: "Picidae" }`

`])`



Inserta relaciones en una colección intermedia `tree_animal`:

`db.tree_animal.insertMany([`

  `{ tree_name: "Roble", animal_name: "Ardilla" },`

  `{ tree_name: "Roble", animal_name: "Pájaro carpintero" },`

  `{ tree_name: "Pino", animal_name: "Ardilla" }`

`])`



Consulta los animales asociados a cada árbol usando agregación:

`db.trees.aggregate([`

  `{`

    `$lookup: {`

      `from: "tree_animal",`

      `localField: "name",`

      `foreignField: "tree_name",`

      `as: "tree_animals"`

    `}`

  `},`

  `{`

    `$lookup: {`

      `from: "animals",`

      `localField: "tree_animals.animal_name",`

      `foreignField: "name",`

      `as: "animals"`

    `}`

  `}`

`])`
 

---

### **¿Para qué sirve `$lookup`?**

1. **Unir datos de colecciones diferentes**: Por ejemplo, relacionar documentos de una colección de usuarios con una colección de pedidos.  
2. **Simular relaciones entre documentos**: MongoDB no tiene un esquema relacional estricto, pero `$lookup` permite consultar datos como si existieran relaciones predefinidas.  
3. **Optimizar consultas complejas**: Traer datos relacionados en una sola consulta en lugar de hacer múltiples consultas individuales.

---

### **Ejemplo práctico**

#### **Caso: Biblioteca y libros**

Queremos construir una consulta que muestre las bibliotecas con los libros que tienen disponibles.

#### **Colección `libraries`:**

Copiar código  
`db.libraries.insertMany([`  
  `{ _id: 1, name: "Biblioteca Central", location: "Madrid" },`  
  `{ _id: 2, name: "Biblioteca Regional", location: "Barcelona" }`  
`])`

#### **Colección `books`:**

Copiar código  
`db.books.insertMany([`  
  `{ title: "Cien Años de Soledad", author: "Gabriel García Márquez", library_id: 1 },`  
  `{ title: "Don Quijote de la Mancha", author: "Miguel de Cervantes", library_id: 1 },`  
  `{ title: "La Sombra del Viento", author: "Carlos Ruiz Zafón", library_id: 2 }`  
`])`

---

### **Consulta con `$lookup`**

Usamos `$lookup` para combinar las bibliotecas con sus libros:

`db.libraries.aggregate([`  
  `{`  
    `$lookup: {`  
      `from: "books",            // Colección con la que unir`  
      `` localField: "_id",        // Campo en la colección `libraries` ``  
      `` foreignField: "library_id", // Campo en la colección `books` ``  
      `as: "available_books"     // Nombre del campo para los datos combinados`  
    `}`  
  `}`  
`])`

#### **Resultado esperado:**

`[`  
  `{`  
    `"_id": 1,`  
    `"name": "Biblioteca Central",`  
    `"location": "Madrid",`  
    `"available_books": [`  
      `{`  
        `"title": "Cien Años de Soledad",`  
        `"author": "Gabriel García Márquez",`  
        `"library_id": 1`  
      `},`  
      `{`  
        `"title": "Don Quijote de la Mancha",`  
        `"author": "Miguel de Cervantes",`  
        `"library_id": 1`  
      `}`  
    `]`  
  `},`  
  `{`  
    `"_id": 2,`  
    `"name": "Biblioteca Regional",`  
    `"location": "Barcelona",`  
    `"available_books": [`  
      `{`  
        `"title": "La Sombra del Viento",`  
        `"author": "Carlos Ruiz Zafón",`  
        `"library_id": 2`  
      `}`  
    `]`  
  `}`  
`]`

---

### **Explicación de la consulta**

1. **`$lookup`**:  
   * Toma cada documento en `libraries`.  
   * Busca documentos en la colección `books` donde el valor de `library_id` en `books` coincida con el valor de `_id` en `libraries`.  
   * Los resultados de esta coincidencia se almacenan en el campo `available_books`.  
2. **Campo `as`**:  
   * Especifica el nombre del campo que contendrá los datos relacionados.  
3. **Relación 1:N**:  
   * Una biblioteca puede tener varios libros. Por eso, `available_books` contiene un arreglo con todos los libros asociados.

---

### **Ejemplo más complejo: Agregar proyecciones**

Si queremos limitar los datos de los libros (por ejemplo, excluir el campo `library_id`), podemos usar `$project`:

javascript  
Copiar código  
`db.libraries.aggregate([`  
  `{`  
    `$lookup: {`  
      `from: "books",`  
      `localField: "_id",`  
      `foreignField: "library_id",`  
      `as: "available_books"`  
    `}`  
  `},`  
  `{`  
    `$project: {`  
      `name: 1,`  
      `location: 1,`  
      `"available_books.title": 1,`  
      `"available_books.author": 1`  
    `}`  
  `}`  
`])`

#### **Resultado esperado:**

json  
Copiar código  
`[`  
  `{`  
    `"_id": 1,`  
    `"name": "Biblioteca Central",`  
    `"location": "Madrid",`  
    `"available_books": [`  
      `{ "title": "Cien Años de Soledad", "author": "Gabriel García Márquez" },`  
      `{ "title": "Don Quijote de la Mancha", "author": "Miguel de Cervantes" }`  
    `]`  
  `},`  
  `{`  
    `"_id": 2,`  
    `"name": "Biblioteca Regional",`  
    `"location": "Barcelona",`  
    `"available_books": [`  
      `{ "title": "La Sombra del Viento", "author": "Carlos Ruiz Zafón" }`  
    `]`  
  `}`  
`]`

---

### **¿Cuándo usar `$lookup`?**

1. **Datos relacionados distribuidos en colecciones diferentes**.  
2. **Necesidad de reducir el número de consultas**.  
3. **Generación de reportes o vistas combinada**

