from flask_swagger_ui import get_swaggerui_blueprint

def config_swagger():
    ### swagger specific ###
    SWAGGER_URL = ''
    API_URL = '/static/swagger.json'
    SWAGGERUI_BLUEPRINT = get_swaggerui_blueprint(
        SWAGGER_URL,
        API_URL,
        config={
            'app_name': "Desafio Hammer"
        }
    )
    lista = [SWAGGERUI_BLUEPRINT, SWAGGER_URL]
    return lista