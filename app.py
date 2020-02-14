# coding=UTF-8
from flask import Flask, send_file
from flask_cors import CORS
from flask_restful import Api, Resource
from flask_swagger_ui import get_swaggerui_blueprint
from config_swagger import config_swagger
from controller.tabela import TabelaController
from controller.formulario import FormularioController
from model.tabela import TabelaModel

app = Flask(__name__)
app.config.from_object('config.ProductionConfig')
#Cross-Origin Resource Sharing para a api se tornar disponível os recursos de front-end
CORS(app)
api = Api(app)

lista_config = config_swagger()    
app.register_blueprint(lista_config[0], url_prefix=lista_config[1])

#cria um bd sqlite, TODO
@app.before_first_request
def create_db():
    TabelaModel.create_table()

class Arquivo(Resource):
    def get(self):
        path = '/home/cfservicos/apps_wsgi/everthefullstack/static/img/hammer_4.fw.png'
        return send_file(path, as_attachment=True)
    
#Rotas que a api vai disponibilizar
api.add_resource(TabelaController, '/tabela')
api.add_resource(FormularioController, '/formulario')
api.add_resource(Arquivo, '/arquivo')

if __name__ == '__main__':
    app.run(debug=True)