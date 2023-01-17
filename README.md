# Swagger

## Description

Lista todas as rotas da api com suas respectivas requisições e respostas 

## Getting started

### How to run

Use um dos seguintes comandos para gerar os arquivos necessários

```
- `php artisan docs:route route/:id index store show update destroy --auth` comando completo
- `php artisan docs:route route index store show update destroy --auth` sem parâmetro
- `php artisan docs:route route index store show update destroy` sem autenticação
- `php artisan docs:route route index` cria somente o método index
- `php artisan docs:route route store` cria somente o método store
- `php artisan docs:route route show` cria somente o método show, sem parâmetro
- `php artisan docs:route route/:id show` cria somente o método show, com parâmetro
- `php artisan docs:route route update` cria somente o método update
- `php artisan docs:route route destroy` cria somente o método destroy
```

#### Actions
```
- `index` gera um arquivo com o método get e com o retorno padrão de uma index
- `show` gera um arquivo com o método get e com o retorno padrão de um show
- `store` gera um arquivo com o método post e com o corpo e retorno padrão de uma store
- `update` gera um arquivo com o método put e com o corpo e retorno padrão de um update (update)
- `destroy` gera um arquivo com o método delete e com o retorno padrão de um destroy
```

#### Rename file names
```
- `php artisan docs:route route/:id store --name=login` gera um arquivo com o método post mas com o nome login.yaml
- `php artisan docs:route route/:id store show --name=login --name=me` gera um arquivo com o método post mas com o nome login.yaml e um arquivo no método get com o nome me.yaml
```

Cada nome deve ser passado utilizando o **--name=** e na mesma ordem que foi informado as actions
Se o nome não é informado, o arquivo ficará com o nome da ação

#### Auth
Por padrão os métodos que serão autenticados precisam estar acompanhados do `--auth` ou `-a`

```
- `php artisan docs:route routePath index store show update destroy --a` adiciona o autenticador nos arquivos de cada método informado
- `php artisan docs:route routePath index -a` adiciona o autenticador somente no método informado
```

##### Tip
Caso tenha alguma rota que precisa ser autenticada, siga os seguintes passos:

```
- `php artisan docs:route route index` sem autenticar
- `php artisan docs:route route store --a` adiciona o autenticador somente no método informado e não apaga o código gerado em sua actions.yaml
```

#### Parameters
Pode-se executar o comando com mais de um parâmetro na url

```
- `php artisan docs:route route/:routeId/:id index` irá criar o caminho `route/routeId/id/actions.yaml`
- `php artisan docs:route route/:routeId/description/:descriptionId index` irá criar o caminho `route/routeId/description/descriptionId/actions.yaml`
```

Por padrão os nomes dos parâmetros já serão adicionados em seus respectivos arquivo.yaml

### Patch Notes
As notas de atualização servem para armazenar o histórico de atualização de sua documentação

#### How to run
```
- `php artisan docs:patch NomeDaAtualizacao` irá a estrutura da nota de atualização
- `php artisan docs:patch NomeDaAtualizacao --routes=2` irá a estrutura da nota de atualização com descrição para duas rotas
```
