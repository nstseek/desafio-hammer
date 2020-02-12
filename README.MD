# Teste Hammer

Mesmo depois de um segundo prazo não consegui concluir tudo, mas acho que agora é o suficiente.

## Teste de layout

### Considerações

*/teste-layout*

https://alcos.me/TesteHammer/public/teste-layout/

Essa foi a parte em que eu mais me engajei por considerar ser mais difícil. Gostei do resultado geral final do layout, mas se eu tivesse tido mais tempo teria feito um layout adaptável, melhoraria a sincronia das animações e faria menos gambiarras utilizando "position: absolute".

## Teste de lógica

### Considerações

*/teste-logica*


#### Back-end

- Hospedado na Linode

Ele está hospedado no meu VPS na Linode e possui os seguintes métodos:

https://alcos.me/TesteHammer/ci/v1/tabela - Gera os dados aleatórios para montar a tabela no front-end.

https://alcos.me/TesteHammer/ci/api/v1/formulario - Gera os dados aleatórios para montar o formulário no front-end.

https://alcos.me/TesteHammer/ci/api/v1/arquivo/{nome} - Força o download de um arquivo enviado pelo front-end. Há três arquivos dispoíveis para teste: Instrucoes.pdf, icon-map.png

#### Front-end

- Hospedado na AWS

As únicas coisas que faltaram foi instalar o Swagger e salvar o formulário.

http://18.229.191.97/tabela - Geração de tabelas utilizando a API do back-end.

http://18.229.191.97/ng/formulario - Geração de formulário utilizando a API do back-end.

Agradeço a oportunidade de participar da seleção, sempre me diverto com esse tipo de desafios.
