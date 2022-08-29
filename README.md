<h1 align="center">Sistema de Lembretes</h1> 

<p align="center">
<img src="http://img.shields.io/static/v1?label=STATUS&message=EM%20DESENVOLVIMENTO&color=GREEN&style=for-the-badge"/>
</p>


## Descrição do projeto
O Sistema de Lembretes foi criado para um desafio de programação.

## :hammer: Funcionalidades do projeto

- `Funcionalidade 1`: Criar lembrete
- `Funcionalidade 2`: Excluir lembrete
- `Funcionalidade 3`: Agrupar Lembretes pela data

## Layout do sistema
![image](https://user-images.githubusercontent.com/51219754/187221272-378b3b72-81ff-4ca7-9473-8e99a58644fe.png)

Essa é a tela principal, onde pode ser cadastrado um novo lembrete


![image](https://user-images.githubusercontent.com/51219754/187221337-fbdec4a0-7a33-4378-a397-05f0d843204a.png)

Para cadastrar um lembrete, deve inserir o nome e a data, e clicar em Criar. Para excluir você clica no botão excluir do respectivo lembrete.


![image](https://user-images.githubusercontent.com/51219754/187221372-24fb6fa1-8179-446d-9e3d-989b690cc095.png)

Ao criar dois lembretes ou mais com a mesma data, irão ser agrupados.


![image](https://user-images.githubusercontent.com/51219754/187221725-54673f25-73ab-45c2-9983-9d99d13daae2.png)

Se for criado um lembrete com data no passado, não será criado o lembrete e retornará uma mensagem de erro.


![image](https://user-images.githubusercontent.com/51219754/187221771-a0e984a2-6782-4bb9-8d98-772e76e54013.png)

Se clicar no botão Criar sem preencher os dois campos ou um dos campos, não irá criar o lembrete e retornará uma mensagem de erro.


![image](https://user-images.githubusercontent.com/51219754/187221807-01fdf93f-13c0-4c9e-8a12-e20371018b92.png)

A última data válida é o dia 01/01/2100, após essa data não será criado um lembrete e retornará um erro.

## ✔️ Técnicas e tecnologias utilizadas

- ``PHP``
- ``Javascript``
- ``Paradigma de orientação a objetos``

## 📁 Acesso ao projeto
Você pode acessar os arquivos do projeto clicando [aqui](https://github.com/brendaPSO/SistemaLembretes).

## 🛠️ Abrir e rodar o projeto

Para utilizar o sistema é necessário instalar:
*	PHP (versão utilizada é a 8.0.12): https://www.php.net/downloads

Após instalado, entre no GitHub para baixar o projeto ou clonar:
*	Clonar: git clone https://github.com/brendaPSO/SistemaLembretes.git

Para iniciar o servidor web, entre no terminal, vá até a pasta que está o projeto, e digite:
*	php -S localhost:8000
