
# SQLite: Base de Datos Relacional pequeña pequeñita
(https://www.sqlite.org/index.html)

## 1. Introducción a SQLite
- **Definición y Características**:
  - SQLite es una **base de datos embebida** que no requiere instalación ni configuración de un servidor. Esto la hace ligera y rápida, ideal para proyectos pequeños y medianos o para almacenamiento local en aplicaciones móviles, web y sistemas embebidos.
  - Todo se gestiona en un solo archivo de base de datos, lo que facilita su portabilidad.
  - **Transaccional**: Soporta las propiedades ACID (Atomicidad, Consistencia, Aislamiento, Durabilidad), lo que garantiza la seguridad y coherencia de los datos.
  - **Código Abierto**: Es de código abierto, compatible con varias plataformas y lenguajes de programación como PHP, Python, Java, y C/C++.

## 2. Fundamentos de SQLite
  
### 2.1. Creación y Manejo de Bases de Datos
- **Instalar en linux SQLite**:
```bash
sudo apt update
sudo apt install sqlite3
  ```
- **Iniciar SQLite**:
  El comando `sqlite3` se usa para iniciar el shell de SQLite y abrir una base de datos:
  ```bash
  sqlite3 nombre_de_base_datos.db
  ```

- **Crear Tablas**:
  Las tablas se crean usando la sentencia `CREATE TABLE`. Un ejemplo básico:
  ```sql
  CREATE TABLE empleados (
      id INTEGER PRIMARY KEY,
      nombre TEXT NOT NULL,
      departamento TEXT,
      salario REAL
  );
  ```
  - **Tipos de Datos Comunes en SQLite**: `INTEGER`, `TEXT`, `REAL`, `BLOB`.

- **Ver Tablas Existentes**:
  Para listar todas las tablas de la base de datos:
  ```sql
  .tables
  ```

### 2.2. Manipulación de Datos

- **Insertar Datos**:
  Para insertar un nuevo registro en la tabla:
  ```sql
  INSERT INTO empleados (nombre, departamento, salario) 
  VALUES ('Juan Pérez', 'IT', 2500.50);
  ```

- **Consultar Datos**:
  La consulta básica para ver todos los registros:
  ```sql
  SELECT * FROM empleados;
  ```

- **Consulta Condicional (WHERE)**:
  Las consultas pueden filtrarse usando condiciones:
  ```sql
  SELECT nombre, salario FROM empleados WHERE departamento = 'IT';
  ```

- **Actualizar Datos**:
  Para modificar registros ya existentes:
  ```sql
  UPDATE empleados 
  SET salario = 2700 
  WHERE nombre = 'Juan Pérez';
  ```

- **Eliminar Registros**:
  Para eliminar registros:
  ```sql
  DELETE FROM empleados WHERE nombre = 'Juan Pérez';
  ```

### 2.3. Claves Primarias y Restricciones

- **Claves Primarias**:
  Una **clave primaria** identifica de manera única cada registro de una tabla.
  ```sql
  CREATE TABLE departamentos (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      nombre TEXT NOT NULL
  );
  ```
  En este ejemplo, `AUTOINCREMENT` genera automáticamente el valor del `id`.

- **Restricciones**:
  Las restricciones definen reglas que los datos deben seguir, como `NOT NULL` (el campo no puede ser vacío) y `UNIQUE` (los valores en este campo deben ser únicos).
  ```sql
  CREATE TABLE usuarios (
      id INTEGER PRIMARY KEY,
      email TEXT NOT NULL UNIQUE,
      password TEXT NOT NULL
  );
  ```

## 3. Consultas Avanzadas

### 3.1. Funciones Agregadas y Agrupamiento
- **Funciones Agregadas**:
  SQLite incluye funciones agregadas como `SUM`, `COUNT`, `AVG` para realizar cálculos sobre los datos.
  ```sql
  SELECT SUM(salario) FROM empleados WHERE departamento = 'IT';
  ```
  En este ejemplo, calculamos la suma total de los salarios en el departamento de IT.

- **Agrupamiento con GROUP BY**:
  Se utiliza `GROUP BY` para agrupar filas que comparten valores en una columna.
  ```sql
  SELECT departamento, COUNT(*) 
  FROM empleados 
  GROUP BY departamento;
  ```
  Esta consulta cuenta cuántos empleados hay por departamento.

### 3.2. Joins (Uniones de Tablas)

- **Inner Join**:
  Combina filas de dos o más tablas cuando las condiciones coinciden.
  ```sql
  SELECT empleados.nombre, departamentos.nombre 
  FROM empleados 
  JOIN departamentos 
  ON empleados.departamento_id = departamentos.id;
  ```

- **Left Join**:
  Retorna todos los registros de la tabla de la izquierda, y los datos correspondientes de la tabla de la derecha. Si no hay coincidencia, retorna `NULL`.
  ```sql
  SELECT empleados.nombre, departamentos.nombre 
  FROM empleados 
  LEFT JOIN departamentos 
  ON empleados.departamento_id = departamentos.id;
  ```

## 4. Seguridad y Optimización

### 4.1. Seguridad en SQLite

- **Permisos de Archivos**:
  Dado que SQLite almacena las bases de datos en un solo archivo, es importante establecer permisos de acceso seguros:
  ```bash
  chmod 600 nombre_de_base_datos.db
  chown root nombre_de_base_datos.db
  ```
  Estos comandos aseguran que solo el propietario pueda leer y escribir en el archivo.

- **Inyección SQL**:
  Una práctica crucial es **sanitizar** las entradas del usuario para evitar ataques de inyección SQL. Se recomienda usar consultas preparadas (con parámetros) para esto, especialmente si se usa SQLite en aplicaciones web o móviles.

### 4.2. Optimización de Consultas

- **Índices**:
  Los índices mejoran la velocidad de las consultas en campos específicos.
  ```sql
  CREATE INDEX idx_nombre ON empleados(nombre);
  ```
  El índice se crea sobre la columna `nombre` de la tabla `empleados`.

- **Vacuum**:
  El comando `VACUUM` se usa para compactar la base de datos y reducir el espacio en disco.
  ```sql
  VACUUM;
  ```

- **Análisis de Consultas EXPLAIN QUERY PLAN**

`EXPLAIN QUERY` se utiliza para analizar cómo se ejecutará una consulta SQL. Proporciona un desglose del plan de ejecución que sigue la base de datos al realizar la consulta, es decir, cómo se buscarán los datos en las tablas y qué pasos se llevarán a cabo. El objetivo principal de este comando es ayudar a los desarrolladores a **optimizar sus consultas** al entender cómo funciona internamente la base de datos. Permite ver si se utilizan índices, cuántas tablas se van a escanear, si se hará un "full table scan" (es decir, recorrer toda la tabla) o si la base de datos aprovechará un índice para hacer la búsqueda más eficiente.

## Ejemplo:
Imagina que tienes la tabla `empleados` y la siguiente consulta:
```sql
SELECT * FROM empleados WHERE nombre = 'Juan';
```

Al ejecutar `EXPLAIN QUERY PLAN`, SQLite te devuelve información sobre el plan de ejecución, por ejemplo:
```
0|0|0|SCAN TABLE empleados
```

Esto significa que **SQLite realizará un escaneo completo de la tabla `empleados`** para buscar el registro donde `nombre` sea 'Juan'. Esto podría indicar que la consulta puede ser mejorada si, por ejemplo, creas un índice sobre la columna `nombre`, lo que permitiría que la búsqueda sea más rápida:
```sql
CREATE INDEX idx_nombre ON empleados(nombre);
```

Si después de crear el índice vuelves a ejecutar `EXPLAIN QUERY PLAN`, podrías ver algo como:
```
0|0|0|SEARCH TABLE empleados USING INDEX idx_nombre (nombre=?)
```

Este nuevo resultado indica que ahora la búsqueda se realizará usando el índice, lo que suele ser más rápido que un escaneo completo de la tabla.

## 5. Integración y Herramientas

### 5.1. Integración con Aplicaciones

- **Lenguajes de Programación**:
  SQLite puede integrarse con lenguajes como **PHP**, **Python**, **Java**, entre otros. Ejemplo en **PHP**:

  ```php
  <?php
  // Conectar a la base de datos SQLite
  $db = new SQLite3('mi_base_datos.db');

  // Ejecutar una consulta SELECT
  $resultado = $db->query('SELECT * FROM empleados');

  // Iterar sobre los resultados y mostrarlos
  while ($fila = $resultado->fetchArray(SQLITE3_ASSOC)) {
      echo "Nombre: " . $fila['nombre'] . " - Salario: " . $fila['salario'] . "<br>";
  }

  // Cerrar la conexión a la base de datos
  $db->close();
  ?>
  ```

  Este script en PHP realiza una conexión a la base de datos SQLite, ejecuta una consulta `SELECT` y muestra los resultados en el navegador.

### 5.2. Herramientas de Administración

- **sqlite3 (CLI)**:
  Es la herramienta de línea de comandos que viene con SQLite. Permite ejecutar comandos SQL directamente en la base de datos.

- **DB Browser for SQLite**:
  Es una herramienta gráfica gratuita que permite interactuar de forma visual con las bases de datos SQLite. Ideal para la administración diaria, visualización de datos y exportación de bases de datos a formatos como CSV.
