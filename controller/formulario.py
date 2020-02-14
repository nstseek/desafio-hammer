from flask_restful import Resource
from model.formulario import FormularioModel

class FormularioController(Resource):
    
    def get(self):

        formulario = FormularioModel.find_form()

        if formulario:
            return formulario
        
        return {'message': 'Nenhum dado encontrado no formulario.'}

    def post(self):
        return {'message': 'Não existe POST.'}

    def put(self):
        return {'message': 'Não existe PUT.'}
        
    def delete(self):
        return {'message': 'Não existe DELETE.'}
