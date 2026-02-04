import tkinter as tk

ventana = tk.Tk()
ventana.title("Saludo")
ventana.geometry("300x300")

etiqueta1 = tk.Label(ventana,text="Escribe algo")
etiqueta1.pack(pady=20)

entrada1 = tk.Entry(ventana)
entrada1.pack()

def saludar():
    algo = entrada1.get()
    etiqueta2.config(text=f"{algo} flojo")

boton1 = tk.Button(ventana,text="Dame!",command=saludar)
boton1.pack(pady=10)

etiqueta2 = tk.Label(ventana,text="")
etiqueta2.pack(pady=5)

ventana.mainloop()