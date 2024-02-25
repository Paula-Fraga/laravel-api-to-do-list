# Sobre o projeto

O projeto é uma API de lista de tarefas, com login de usuário utilizando JWT e gerenciamento de tarefas.

O sistema foi criado usando:

* PHP 8+
* Laravel 10

## Configuração do Ambiente

**Ao clonar o repositório, instale as dependências do composer:**
```bash
git clone _url_
```
```bash
composer install
```

**Configure o arquivo .env:**
* Copie o arquivo .env.example para um novo arquivo chamado .env
* Configure as variáveis de ambiente, incluindo as credenciais do banco de dados
```bash
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=laravel
 DB_USERNAME=root
 DB_PASSWORD=
```

**Execute as migrações para preparar o banco de dados:**
```bash
php artisan migrate
```

## Endpoints da API

**Login:** *POST* /login
```bash
{
	"email": "exemplo@gmail.com",
	"password": "12345678"
}
```
---

**Me:** *POST* /me

Precisa do *Bearer Token*

---

**Logout:** *POST* /logout

Precisa do *Bearer Token*

---

**User Create:** *POST* /users/create
```bash
{
	"name": "Exemplo",
	"email": "exemplo@gmail.com",
	"password": "12345678"
}
```
Regras:

* A senha precisa ter no mínimo 8 caracteres.
* O e-mail não pode já estar cadastrado no sistema.

---

**User Update:** *PUT* /users/update/{user_id}

Precisa do *Bearer Token*
```bash
{
	"name": "Exemplo1",
	"email": "exemplo@gmail.com"
}
```
*Opcional*
```bash
"password": "12345678"
```
Regras:

* A senha precisa ter no mínimo 8 caracteres.
* A senha é opcional colocar no json.
* Caso ouver troca de email, não pode colocar um e-mail que já exista no sistema.
---

**Task List:** *GET* /tasks/list

Precisa do *Bearer Token*

---

**Task By Id:** *GET* /tasks/get/{task_id}

Precisa do *Bearer Token*

---

**Task Create:** *POST* /tasks/create

Precisa do *Bearer Token*
```bash
{
	"title": "Atividade",
	"description": "Organizar exemplo 1.",
	"status": "Pendente",
	"priority": "Alto",
	"due_date": "25-02-2024"
}
```
Regras:

* O campo *STATUS* só aceita: Pendente, Em andamento ou Concluido.
* O campo *PRIORITY* só aceita: Baixo, Medio ou Alto.
* O campo *DUE_DATE* pode ser nulo ou vazio.
* O campo *DESCRIPTION* pode ser nulo ou vazio.
---

**Task Update:** *POST* /tasks/update/{task_id}

Precisa do *Bearer Token*
```bash
{
	"title": "Atividade",
	"description": "Organizar exemplo 1.",
	"status": "Pendente",
	"priority": "Alto",
	"due_date": "25-02-2024"
}
```
Regras:

* O campo *STATUS* só aceita: Pendente, Em andamento ou Concluido.
* O campo *PRIORITY* só aceita: Baixo, Medio ou Alto.
* O campo *DUE_DATE* pode ser nulo ou vazio.
* O campo *DESCRIPTION* pode ser nulo ou vazio.
---

**Task Delete:** *DELETE* /tasks/delete/{task_id}

Precisa do *Bearer Token*

---
## Considerações Finais

Essa é apenas uma estrutura básica. Personalize-a conforme necessário para atender às peculiaridades da sua API, adicionando detalhes sobre os endpoints específicos, autenticação, autorização, etc.