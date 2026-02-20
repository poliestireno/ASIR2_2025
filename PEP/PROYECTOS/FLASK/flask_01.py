from flask import Flask, jsonify, request,render_template,redirect,url_for

app = Flask(__name__)

poblado = {
    "nombre": "Sotana del Marqués",
    "habitantes" : { "mujeres": 26, "hombres":24},
    "num_bares": 0
}
# ruta principal
@app.route("/")
def inicio():
    return render_template("index.html",poblado=poblado)
    #return "Servidor del poblado funcionando"
# ruta para obtener todo el poblado
@app.route("/poblado", methods=["GET"])
def obtener_poblado():
    return jsonify(poblado)
# ruta para obtener todo el poblado
@app.route("/nuevo_bar", methods=["POST"])
def aumentarBar():
    poblado["num_bares"]= poblado["num_bares"] + 1
    return redirect(url_for('inicio'))
    #return jsonify(poblado)

@app.route("/nuevos_bares", methods=["POST"])
def aumentarBares():
    cantidad = request.form.get("cantidad",1,type=int)
    poblado["num_bares"]= poblado["num_bares"] + cantidad
    return redirect(url_for('inicio'))
    #return jsonify(poblado)

@app.route("/nuevo_hombre", methods=["POST"])
def aumentarHombre():
    poblado["habitantes"]["hombres"]= poblado["habitantes"]["hombres"] + 1
    return jsonify(poblado)

@app.route("/nuevos_hombres", methods=["POST"])
def aumentarHombres():
    datos = request.get_json()
    cantidad = datos.get("cantidad")
    poblado["habitantes"]["hombres"]= poblado["habitantes"]["hombres"] + cantidad
    return jsonify(poblado)

# Inicio servidor
if __name__ == "__main__":
    app.run(host="0.0.0.0",port=5000,debug=True)