## API de Agenda utilizando Laravel 8.75x e MongoDB

Foi realizado um Deploy Back-end na plataforma Heroku de um CRUD para uma simples agenda de contatos utilizando laravel e MongoDB

### Rotas da API


- [Home](https://agenda-laravel-mongodb-api.herokuapp.com/api/agenda) [GET]
- [Criar Contato](https://agenda-laravel-mongodb-api.herokuapp.com/api/agenda/contato/create) [POST]    <nome: string, telefone: string, endereco: string>
- [Listar Contatos](http:s://agenda-laravel-mongodb-api.herokuapp.com/api/agenda/contato/list) [GET]
- [Remover Usuário](https://agenda-laravel-mongodb-api.herokuapp.com/api/agenda/contato/delete) [DELETE] <_id>
- [Atualizar Contato](https://agenda-laravel-mongodb-api.herokuapp.com/api/agenda/contato/update) [PUT] <_id: string, nome: string, telefone: string, endereco: string>

