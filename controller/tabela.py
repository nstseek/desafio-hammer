from flask_restful import Resource
from model.tabela import TabelaModel

class TabelaController(Resource):
    
    def get(self):

        tabela = TabelaModel.find_table()

        if tabela:
            return tabela
        
        return {'message': 'Nenhum dado encontrado na tabela.'}

    def post(self):
        return {'message': 'Não existe POST.'}

    def put(self):
        return {'message': 'Não existe PUT.'}
        
    def delete(self):
        return {'message': 'Não existe DELETE.'}
