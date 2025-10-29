# Entrega
 * Código fuente
 * Las 3 imágenes de la solución de cada ejercicio

# Introducción



Turtle es una librería de Python usada para generar gráficos de forma creativa. Requiere tener instalada otra extensión llamada Tkinter, pero viene incluida en la mayoría de distribuciones de Python.

Si no está instalado Turtle, podemos hacerlo mediante el comando del gestor de paquetes de Python (llamado "PIP", "_Pip Installs Packages_"):

```sh
pip install turtle # o PythonTutrtle
```

Aunque este paso no debería ser necesario. Si no deja instalarlo porque carecemos de un entorno virtual en el que trabajar, si no queremos crear uno, podemos eludirlo con:

```sh
python3 -m pip config set global.break-system-packages true
```

Más documentación: [Turtle](https://docs.python.org/3/library/turtle.html).

# Procedimiento

Para ver como funciona rápidamente la librería, podemos abrir la terminal (`ctrl + alt + t`) y escribir lo siguiente:

```py
python3

from turtle import *

forward(100)
left(90)
forward(100)
left(90)
forward(100)
left(90)
forward(100)
```

Tras presionar el `enter`, nos daremos cuenta de que se dibuja un cuadrado en una ventana nueva.

Una vez completado los pasos anteriores, entramos en Visual Studio Code, o nuestro editor de confianza, y escribimos lo siguiente dentro de un archivo de Python:

```py
from turtle import *

forward(100)
done()
```

## Funciones básicas

Ya lo hemos visto, aunque no ha sido explicado: las funciones más básicas de Trutle son `forward()` y `left()`. La primera función produce un avance en la tortuga (el cursor, vaya), y la segunda hace girar a la izquierda. Hay muchas funciones más, aunque ya no son tan esenciales. Estas son:

1. `right()`.
2. `done()`: Pausa el programa.
3. `penup()`.
4. `pendown()`.
5. `setpos()`.
6. `speed()`.
7. `color()`.
8. `bgcolor()`.
9. `pensize()`.
10. `hideturtle()`.
11. `showturtle()`.

El uso de controladores de flujo, como `while` o `for`, son muy recomendables para llevar a cabo patrones más complejos. Por ejemplo, mi foto de perfil de GitHub está hecho gracias a estas tecnologías:

![[Ejemplo Turtle.png]]
# Ejercicios
## Ejercicio 1: Dibujar la estrella de La Salle

En un archivo de Python, usando la librería de Turtle, debes dibujar una estrella de forma creativa, y que se parezca lo más posible a la de La Salle.
## Ejercicio 2: Escribir tu nombre

Escribe tu nombre en Turtle usando Python. Queda prohibido usar la función `write()` (que escribe directamente el texto que se le indica).
## Ejercicio 3: Dibuja algo creativo

Haz gala de tus conocimientos en Python y Turtle para dibujar lo que quieras. La única condición es que se deben ejecutar más de 30 funciones (si un bucle ejecuta una función más de una vez, entonces cuenta para el total).

Recomendación: una práctica común en Python, y que se complementa muy bien con Turtle, es hacer bucles con contador, de la siguiente manera:

```py
for i in range(1, 360):
	forward(i)
	left(i)
	
# O su versión en `while`, que es similar pero se repite infinitamente

cont = 1

while True:
	forward(i)
	left(i)
	
	cont += 1
```

```py
from turtle import *

speed(0)

for i in range(1, 360000):
	forward(i%90)
    left(i)
    print(i)
    
     if i%180 == 0:
         setpos(0, 0)
```

![Ejemplo Turtle](https://github.com/user-attachments/assets/c45fe2ff-8bab-4397-9b43-dbea0f903865)
