# A

[![php version](https://img.shields.io/badge/php-v8.1-blue?style=flat&logo=php)](php/composer.json#L6)
[![phpstan](https://img.shields.io/badge/symfony-level%2010-brightgreen.svg?style=flat)](CONTRIBUTING.md#phpstan)
[![phpstan](https://img.shields.io/badge/sonata_admin-level%2010-brightgreen.svg?style=flat)](CONTRIBUTING.md#phpstan)

A
<br>

* Symfony 6.0
* PHP 8.1
* Sonata Admin
* Api Rest


Aplicação gerada pelo <a target="_blank" href="https://geradordesistemas.com.br/">Gerador de Sistemas</a>


## Requisitos
1. Instale o docker:

        docker
2. Instale o plugin docker compose

        docker compose

## Instalação

1. Construa a imagem da aplicação com o seguinte comando:

        docker compose build app

2. Execute o ambiente em segundo plano com:

        docker compose up -d
3. Execute o script de inicialização

        ./start_project.sh

4. Execute comandos dentro do container:

         docker compose exec app

## Guia de Utilização

Abaixo contém o guia de utilização do projeto!


## Filtrando, Classificando e Paginando

### Filtrando

Os clientes precisam enviar a solicitação na própria sintaxe de string de consulta do PHP, que difere do formato de
string de consulta CGI padrão. Abaixo está uma lista completa dos operadores suportados.


| Operador         | Descrição       | Exemplo
|------------------|-----------------| -----------------
| `igual`          | Igualdade       | `nome[igual]=lucas`
| `diferente`      | Diferença       | `status[diferente]=ativo`
| `maior`          | Maior que       | `preco[maior]=10`
| `maior_ou_igual` | Maior ou igual  | `preco[maior_ou_igual]=10`
| `menor`          | Menor que       | `estoque[menor]=100`
| `menor_ou_igual` | Menor ou igual  | `estoque[menor_ou_igual]=100`
| `nulo`           | É nulo          | `ativo[nulo]`
| `nao_nulo`       | Não é nulo      | `ativo[nao_nulo]`
| `comeca_com`     | Começa com      | `nome[comeca_com]=a`
| `termina_com`    | Termina com     | `email[termina_com]=@gmail.com`
| `contem`         | Contém          | `nome[contem]=d`

exemplos:

Consulta trazendo os usuarios onde o nome seja igual a `lucas` e o sobrenome
sejá diferente de `souza`:   nome[igual]=lucas&sobrenome[diferente]=souza

### Classificando

A Classificação é aplicada por meio da chave de string de consulta `ordenar_por`,
é aplicado através da seguinte sintaxe: `nomeCampo[ordenar_por]=direcao`
onde o nomeCampo é o campo a ser classificado e a direção deve ser `asc` Crescente ou `desc` Decrescente.

| Operador      | Descrição      | Exemplo
|---------------|----------------| -----------------
| `ordenar_por` | Ordenar Crescente       | `id[ordenar_por]=asc`
| `ordenar_por`     | Ordenar Decrescente | `nome[ordenar_por]=desc`

A chave `ordenar_por` pode ser usada várias vezes e permiti a classificação por vários campos.
Por exemplo: `id[ordenar_por]=asc&nome[ordenar_por]=desc`


### Paginando
| Operador        | Descrição         | Exemplo
|-----------------|-------------------| -----------------
| `pagina`        | página            | `pagina=1`
| `paginaTamanho` | tamanho da página | `paginaTamanho=10`

A Paginação é aplicada por meio das chaves de string de consulta `pagina` e `paginaTamanho`. <br><br>
A chave `pagina` é aplicada através da seguinte sintaxe: `pagina=numero` onde o número deve ser um inteiro representando a página a ser consultada. <br>
A chave `paginaTamanho` deve ser aplicada através da seguinte sintaxe: `paginaTamanho=numero` onde o número deve ser um inteiro representado a quantidade de itens a
serem exibidos por página.

Valor padrão `pagina` = 1 <br>
Valor padrão `paginaTamanho` = 10

## Licença
Copyright (c) 2022 Alan Guedes

A permissão é concedida, gratuitamente, a qualquer pessoa que obtenha uma cópia deste software e arquivos de
documentação associados (o "Software"), para lidar com o Software sem restrições, incluindo, sem limitação,
os direitos de usar, copiar, modificar, mesclar , publicar, distribuir, sublicenciar e/ou vender cópias do
Software e permitir que as pessoas a quem o Software é fornecido o façam, sujeito às seguintes condições:


O aviso de direitos autorais acima e este aviso de permissão devem ser incluídos em todas as cópias
ou partes substanciais do Software.

O SOFTWARE É FORNECIDO "COMO ESTÁ", SEM GARANTIA DE QUALQUER TIPO, EXPRESSA OU IMPLÍCITA, INCLUINDO MAS
NÃO SE LIMITANDO ÀS GARANTIAS DE COMERCIABILIDADE, ADEQUAÇÃO A UM DETERMINADO FIM E NÃO VIOLAÇÃO. EM NENHUM
CASO OS AUTORES OU DETENTORES DOS DIREITOS AUTORAIS SERÃO RESPONSÁVEIS POR QUALQUER REIVINDICAÇÃO, DANOS OU
OUTRA RESPONSABILIDADE, SEJA EM UMA AÇÃO DE CONTRATO, ILÍCITO OU DE OUTRA FORMA, DECORRENTE DE OU EM CONEXÃO
COM O SOFTWARE OU O USO OU OUTROS NEGÓCIOS NO PROGRAMAS.
