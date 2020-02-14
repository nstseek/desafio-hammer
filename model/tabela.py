from peewee import *

bd = SqliteDatabase('hammer.db')

class TabelaModel(Model):

    user_id = IntegerField(primary_key=True)
    nome = CharField()
    cpf = CharField()
    salario = CharField()

    class Meta:
        database = bd

    def __init__(self, user_id, nome, cpf, salario):
        self.user_id = user_id
        self.nome = nome
        self.cpf = cpf
        self.salario = salario
    
    @classmethod
    def find_table(cls):

        #tabela = cls.select()
        
        tabela = [{"user_id": "1",
                   "nome": "Giovani",
                   "cpf":"123",
                   "salario": "3000"
                  },
                  {
                   "user_id": "2",
                   "nome": "Willian",
                   "salario": "10000"
                   },
                   {
                    "nome": "Bruna",
                    "salario": "999999"
                   }]

        if tabela:
            return tabela

        return None

