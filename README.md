# Gestão de Produção

Sistema web para gerenciamento de produção, custos, estoque, clientes e orçamentos, desenvolvido como projeto de estudo e portfólio com Laravel.

<p align="left">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white&style=for-the-badge" alt="Laravel 13">
  <img src="https://img.shields.io/badge/PHP-8.3%2B-777BB4?logo=php&logoColor=white&style=for-the-badge" alt="PHP 8.3+">
  <img src="https://img.shields.io/badge/MySQL-8.4-4479A1?logo=mysql&logoColor=white&style=for-the-badge" alt="MySQL 8.4">
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap&logoColor=white&style=for-the-badge" alt="Bootstrap 5">
  <img src="https://img.shields.io/badge/Vite-Frontend-646CFF?logo=vite&logoColor=white&style=for-the-badge" alt="Vite">
  <img src="https://img.shields.io/badge/Docker-Sail-2496ED?logo=docker&logoColor=white&style=for-the-badge" alt="Docker">
  <img src="https://img.shields.io/badge/Redis-Cache-DC382D?logo=redis&logoColor=white&style=for-the-badge" alt="Redis">
</p>

## Sobre o projeto

O **Gestão de Produção** tem como objetivo centralizar informações de fabricação e facilitar o cálculo do custo real de produtos.

A proposta é considerar, entre outros fatores:

- matéria-prima utilizada;
- custo e movimentação de estoque;
- tempo de mão de obra;
- tempo e custo de máquinas;
- processos produtivos;
- margem de lucro;
- geração e histórico de orçamentos.

O projeto está sendo desenvolvido de forma incremental, com foco em boas práticas, organização em MVC e entendimento dos recursos do Laravel.

## Funcionalidades

### Implementadas

- autenticação de usuários;
- login e logout;
- proteção de rotas com middleware;
- layout Blade reutilizável;
- interface principal com sidebar colapsável;
- integração do frontend com Vite;
- Bootstrap;
- estrutura inicial do banco de dados;
- controle de usuários ativos e níveis de acesso na estrutura do banco.

### Planejadas

- cadastro e gerenciamento de clientes;
- cadastro de materiais;
- movimentações de estoque;
- bloqueio de estoque negativo;
- cadastro de produtos;
- composição de produtos por matéria-prima;
- cadastro de máquinas;
- cadastro de processos produtivos;
- cálculo de custo de mão de obra;
- cálculo de custo de máquina;
- cálculo automático do custo de produtos;
- criação de orçamentos;
- histórico de valores utilizados em cada orçamento;
- controle de status e validade de orçamentos.

## Tecnologias

| Tecnologia | Uso |
| --- | --- |
| Laravel | Backend e estrutura MVC |
| PHP | Linguagem principal |
| Blade | Templates e interface |
| Bootstrap | Componentes e estilização |
| JavaScript | Comportamentos da interface |
| Vite | Build e desenvolvimento do frontend |
| MySQL | Banco de dados |
| Redis | Cache e serviços auxiliares |
| Docker | Containers do ambiente |
| Laravel Sail | Ambiente de desenvolvimento |
| Meilisearch | Estrutura disponível para busca |
| Mailpit | Testes de e-mail |
| Selenium | Testes em navegador |

## Estrutura do banco

A primeira versão do sistema foi planejada em torno das seguintes entidades:

```text
users

clientes

materiais
└── movimentacoes_estoque

produtos
├── produto_materiais
└── produto_processos
    ├── processos
    └── maquinas

orcamentos
└── orcamento_itens
```

### Decisões de modelagem

- O estoque é controlado por **movimentações**, em vez de manter apenas um saldo fixo.
- Materiais utilizados por produtos são registrados em uma composição própria.
- Processos possuem custo de mão de obra por hora.
- Máquinas possuem custo por hora independente.
- Tempos de produção são armazenados na relação entre produto e processo.
- Orçamentos preservam os custos e preços calculados no momento da criação, evitando que alterações futuras modifiquem o histórico.
- Materiais com histórico de movimentação não devem ser removidos em cascata.
- A aplicação não deve permitir estoque negativo.

## Interface

A aplicação utiliza dois layouts principais:

```text
layouts/auth.blade.php
└── telas de autenticação

layouts/app.blade.php
└── interface principal do sistema
    ├── topbar
    ├── sidebar colapsável
    └── conteúdo das páginas
```

A proposta visual é manter a aplicação com aparência de uma interface única, semelhante a um software desktop, onde navegação e barras permanecem consistentes enquanto o conteúdo principal muda.

## Executando o projeto

### Pré-requisitos

- Docker
- Docker Compose
- PHP e Composer para a instalação inicial das dependências

Clone o repositório:

```bash
git clone https://github.com/DougSchwingel/gestao-producao.git
cd gestao-producao
```

Instale as dependências PHP:

```bash
composer install
```

Crie o arquivo de ambiente:

```bash
cp .env.example .env
```

Suba os containers:

```bash
./vendor/bin/sail up -d
```

Gere a chave da aplicação:

```bash
./vendor/bin/sail artisan key:generate
```

Execute as migrations:

```bash
./vendor/bin/sail artisan migrate
```

Instale as dependências do frontend:

```bash
./vendor/bin/sail npm install
```

Inicie o Vite:

```bash
./vendor/bin/sail npm run dev
```

A aplicação ficará disponível no endereço configurado para o ambiente Laravel.

## Ambiente de desenvolvimento

O Laravel Sail utiliza os seguintes serviços no projeto:

```text
laravel.test
mysql
redis
meilisearch
mailpit
selenium
```

## Status do projeto

> Em desenvolvimento.

A estrutura base, autenticação, interface principal e modelagem inicial do banco já estão configuradas. O próximo estágio é implementar os Models, relacionamentos do Eloquent e os módulos funcionais do sistema.

## Autor

**Douglas Schwingel**

[GitHub](https://github.com/DougSchwingel)
