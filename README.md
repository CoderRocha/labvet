# 🐾 LabVet

> **Sistema de Gestão para Laboratórios Veterinários**

![Laravel](https://img.shields.io/badge/Laravel-10.0-red?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

## Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Funcionalidades](#funcionalidades)
- [Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [Estrutura do Projeto](#-estrutura-do-projeto)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Como Utilizar](#como-utilizar)
- [Estrutura do Banco de Dados](#-estrutura-do-banco-de-dados)
- [Autor](#autor)

## Sobre o Projeto

O **LabVet** é um sistema de gestão para laboratórios e clínicas veterinárias. O sistema permite o gerenciamento de clientes, pets, veterinários, procedimentos e consultas, tudo de forma integrada, facilitando o controle administrativo e clínico de estabelecimentos veterinários.

## Funcionalidades

### Gestão de Clientes

- Cadastro, edição e exclusão de clientes
- Informações de contato
- Relacionamento com pets

### Gestão de Pets

- Cadastro completo de animais de estimação
- Informações detalhadas do pet
- Foto do pet
- Vinculação com clientes

### Gestão de Veterinários

- Cadastro de profissionais veterinários
- Informações de contato e localização
- Associação com consultas realizadas

### Gestão de Procedimentos

- Cadastro de procedimentos disponíveis
- Definição de preços
- Associação com consultas

### Gestão de Consultas

- Agendamento e registro de consultas
- Vinculação de pet, veterinário e procedimentos
- Histórico completo de atendimentos

### Relatórios

- Relatórios de Clientes
- Relatórios de Pets
- Relatórios de Procedimentos
- Relatórios de Veterinários
- Relatórios de Consultas

## 🛠 Tecnologias Utilizadas

- **[Laravel 10.0](https://laravel.com/)**
- **[PHP 8.1+](https://www.php.net/)**
- **[MySQL](https://www.mysql.com/)**

## 📁 Estrutura do Projeto

```
labvet/
├── app/
│   ├── Console/              
│   ├── Exceptions/           
│   ├── Http/
│   │   ├── Controllers/      # Controllers
│   │   │   ├── ClientController.php
│   │   │   ├── PetController.php
│   │   │   ├── VetController.php
│   │   │   ├── ProcedureController.php
│   │   │   ├── ConsultationController.php
│   │   │   └── ReportController.php
│   │   └── Middleware/       
│   └── Models/               # Models
│       ├── Client.php
│       ├── Pet.php
│       ├── Vet.php
│       ├── Procedure.php
│       ├── Consultation.php
│       └── User.php
├── database/
│   ├── migrations/           # Migrations do banco de dados
│   ├── seeders/              # Seeders do banco de dados
│   └── factories/           
├── resources/
│   ├── views/                # Views
│   ├── css/                  # CSS
│   └── js/                   # JavaScript
├── routes/
│   └── web.php               # Rotas do Sistema
├── public/                   
├── config/                   # Arquivos de configuração do sistema
├── composer.json
├── package.json
└── vite.config.js
```

## Instalação

Antes de começar, certifique-se de ter instalado:

- **PHP** 8.1+
- **Composer** 2.0+
- **Node.js** 18.0+ e **npm** 9.0+
- **MySQL**

### Passo a Passo

1. **Clone o repositório**

   ```bash
   git clone https://github.com/coderrocha/labvet.git
   cd labvet
   ```

2. **Instale as dependências do PHP**

   ```bash
   composer install
   ```

3. **Instale as dependências do Node.js**

   ```bash
   npm install
   ```

4. **Configure o arquivo de ambiente**

   ```bash
   cp .env.example .env
   ```

5. **Gere a chave da aplicação**

   ```bash
   php artisan key:generate
   ```

6. **Execute as migrations**

   ```bash
   php artisan migrate
   ```

7. **Inicie o servidor**

   ```bash
   php artisan serve
   ```

8. **Acesse a aplicação**

   Abra [http://localhost:8000](http://localhost:8000) no seu navegador.

## Configuração

### Variáveis de Ambiente

Configure as seguintes variáveis no arquivo `.env`:

```env
APP_NAME=LabVet
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=labvet
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### Banco de Dados

1. Crie um banco de dados no MySQL
2. Configure as credenciais no arquivo `.env`
3. Execute as migrations:

   ```bash
   php artisan migrate
   ```

## Como Utilizar

### Gestão de Clientes

1. Acesse `/client` para visualizar todos os clientes
2. Clique em "New Client" para cadastrar um novo cliente
3. Preencha as informações exigidas
4. Use "Edit" para modificar informações existentes
5. Use "Delete" para remover um cliente

### Gestão de Pets

1. Acesse `/pet` para visualizar todos os pets
2. Cadastre um novo pet vinculando a um cliente
3. Preencha informações detalhadas exigidas

### Gestão de Veterinários

1. Acesse `/vet` para visualizar todos os veterinários
2. Cadastre profissionais com suas informações de contato exigidas
3. Gerencie os dados dos veterinários cadastrados

### Gestão de Procedimentos

1. Acesse `/procedure` para visualizar todos os procedimentos
2. Cadastre procedimentos com nome e preço
3. Os procedimentos podem ser associados as consultas

### Gestão de Consultas

1. Acesse `/consultation` para visualizar todas as consultas
2. Crie uma nova consulta selecionando:
   - Data da consulta
   - Pet que vai ser atendido
   - Veterinário responsável
   - Procedimentos realizados
3. Visualize detalhes completos de cada consulta
4. Exclua consultas quando necessário

### Relatórios

1. Acesse `/report` para visualizar opções de relatórios
2. Selecione o tipo de relatório desejado:
   - Clientes
   - Pets
   - Procedimentos
   - Veterinários
   - Consultas
3. Visualize os relatórios gerados

## Rotas

#### Clientes

- `GET /client` - Lista todos os clientes
- `GET /client/new` - Página para criar um novo cliente
- `POST /client` - Cria um novo cliente
- `GET /client/edit/{id}` - Página para editar um cliente existente
- `POST /client/{id}` - Atualiza um cliente
- `GET /client/delete/{id}` - Exclui um cliente

#### Pets

- `GET /pet` - Lista todos os pets
- `GET /pet/new` - Página para criar um novo pet
- `POST /pet` - Cria um novo pet
- `GET /pet/edit/{id}` - Página para editar um pet existente
- `POST /pet/{id}` - Atualiza um pet
- `GET /pet/delete/{id}` - Exclui um pet

#### Veterinários

- `GET /vet` - Lista todos os veterinários
- `GET /vet/new` - Página para criar um novo vet
- `POST /vet` - Cria um novo veterinário
- `GET /vet/edit/{id}` - Página para editar um pet existente
- `POST /vet/{id}` - Atualiza um veterinário
- `GET /vet/delete/{id}` - Exclui um veterinário

#### Procedimentos

- `GET /procedure` - Lista todos os procedimentos
- `GET /procedure/new` - Página para criar um novo procedimento
- `POST /procedure` - Cria um novo procedimento
- `GET /procedure/edit/{id}` - Página para editar um procedimento existente
- `POST /procedure/{id}` - Atualiza um procedimento
- `GET /procedure/delete/{id}` - Exclui um procedimento

#### Consultas

- `GET /consultation` - Lista todas as consultas
- `GET /consultation/new` - Página para criar uma nova consulta
- `POST /consultation` - Cria uma nova consulta
- `GET /consultation/show/{id}` - Visualiza os detalhes de uma consulta
- `GET /consultation/delete/{id}` - Exclui uma consulta

#### Relatórios

- `GET /report` - Página de seleção de relatórios
- `POST /report/show` - Exibe relatório selecionado

## 🗄 Estrutura do Banco de Dados

### Tabelas Principais

- **clients** - Informações dos clientes
- **pets** - Informações dos pets (relacionado com clients)
- **vets** - Informações dos veterinários
- **procedures** - Procedimentos disponíveis
- **consultations** - Consultas realizadas (relacionado com pets e vets)
- **consultations_procedures** - Tabela para relacionar consultas e procedimentos

### Relacionamentos

- Um cliente pode ter vários pets
- Um pet pertence a um cliente
- Um pet pode ter várias consultas
- Um veterinário pode realizar várias consultas
- Uma consulta pertence a um pet e um veterinário
- Uma consulta pode ter vários procedimentos

## Autor

**Guilherme Rocha (CoderRocha)**

- GitHub: [CoderRocha](https://github.com/coderrocha)
- LinkedIn: [Guilherme Rocha](https://www.linkedin.com/in/guilherme-rocha-da-silva)

---