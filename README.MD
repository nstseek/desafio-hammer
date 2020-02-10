# Teste Hammer

Infelizmente não consegui concluir o teste pois só tive disponibilidade apartir do dia 08/02 para trabalhar no projeto. Estou comitando o que consegui fazer.

## Teste de layout

### Considerações

*/teste-layout*

Essa foi a parte em que eu mais me engajei por considerar ser mais difícil. Gostei do resultado geral final do layout, mas se eu tivesse tido mais tempo teria feito um layout adaptável, melhoraria a sincronia das animações e faria menos gambiarras utilizando "position: absolute".

## Teste de lógica

### Considerações

*/teste-logica*

Quando eu cheguei nessa parte já não me restava muito tempo, mas o back-end eu fiz basicamente todo.

#### Back-end

Ele está hospedado no meu VPS na Linode e possui os seguintes métodos:

https://alcos.me/TesteHammer/ci/v1/tabela - Gera os dados aleatórios para montar a tabela no front-end.

https://alcos.me/TesteHammer/ci/api/v1/formulario - Gera os dados aleatórios para montar o formulário no front-end.

https://alcos.me/TesteHammer/ci/api/v1/arquivo/{nome} - Força o download de um arquivo enviado pelo front-end. Há três arquivos dispoíveis para teste: Instrucoes.pdf, icon-map.png e swagger.json

#### Front-end

Nessa parte a única coisa que fiz foi configurar um servidor EC2 na Amazon em http://18.229.191.97/
Mesmo Angular sendo um framework que está pra ser descontinuado no ano que vem, foi divertido usar ele pela primeira vez. Achei alguns aspectos parecidos com VUE.JS.


Agradeço a oportunidade de participar da seleção, sempre me diverto com esse tipo de desafios.
