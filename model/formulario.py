from peewee import *

bd = SqliteDatabase('hammer.db')

class FormularioModel(Model):

    titulo = CharField()
    tipo = CharField()
    valor = CharField()
    opcoes = CharField()

    class Meta:
        database = bd

    def __init__(self, titulo, tipo, valor, opcoes):
        self.titulo = titulo
        self.tipo = tipo
        self.valor = valor
        self.opcoes = opcoes
    
    @classmethod
    def find_form(cls):

        #formulario = cls.select()

        formulario = [
                        {
                            "titulo": "Campo 1, tipo ARQUIVO",
                            "tipo": "ARQUIVO",
                            "valor": "pdf2",
                            "opcoes": None
                        },
                        {
                            "titulo": "Campo 2, tipo TEXTO",
                            "tipo": "TEXTO",
                            "valor": "",
                            "opcoes": None
                        },
                        {
                            "titulo": "Campo 3, tipo TEXTO",
                            "tipo": "TEXTO",
                            "valor": "",
                            "opcoes": None
                        },
                        {
                            "titulo": "Campo 3, tipo SELECAO",
                            "tipo": "SELECAO",
                            "valor": "Opcao 3",
                            "opcoes": [
                            "Opcao 1",
                            "Opcao 2",
                            "Opcao 3",
                            "Opcao 4"
                            ]
                        },  
                        {
                            "titulo": "Campo 5, tipo NUMERICO",
                            "tipo": "NUMERICO",
                            "valor": 0,
                            "opcoes": None
                        }
                     ]

        if formulario:
            return formulario

        return None

