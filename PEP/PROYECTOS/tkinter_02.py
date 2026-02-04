import tkinter as tk
from tkinter import messagebox
ventana = tk.Tk()
ventana.title("Saludo")
ventana.geometry("300x300")
def mostrar_info():
    messagebox.showinfo("Información","Acerca de Gilbert")
def salir():
    ventana.destroy()
def abrir_ventana_secundaria():
    ventana_sec = tk.Toplevel(ventana)
    ventana_sec.title("Ventana secundaria")
    ventana_sec.geometry("250x150")
    tk.Label(ventana_sec,text="esto es la ventana secundaria").pack(pady=20)
    tk.Button(ventana_sec,text="Close",command=ventana_sec.destroy).pack()
menu_barra = tk.Menu(ventana)
ventana.config(menu=menu_barra)
menu_archivo = tk.Menu(menu_barra,tearoff=0)
menu_barra.add_cascade(label="Archivo",menu=menu_archivo)
menu_archivo.add_command(label="Abrir ventana",command=abrir_ventana_secundaria)
menu_archivo.add_separator()
menu_archivo.add_command(label="Salir",command=salir)
menu_ayuda = tk.Menu(menu_barra,tearoff=0)
menu_barra.add_cascade(label="Ayuda",menu=menu_ayuda)
menu_ayuda.add_command(label="Acerca de",command=mostrar_info)
ventana.mainloop()