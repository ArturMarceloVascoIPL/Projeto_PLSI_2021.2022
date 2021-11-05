<p align="center">
    <a href="https://github.com/ArturMarceloVascoIPL/Projeto_PLSI_2021.2022" target="_blank">
        <img src="fitworkout_logo.png" height="100px">
    </a>
    <h1 align="center">Fit Workout</h1>
    <h2 align="center">Unidade Curricular de Plataformas de Sistemas de Informação</h2>
    <br>
	<h4>Grupo:</h4>
	<h5>Artur Quaresma - 2201115</h5>
	<h5>Marcelo Marques - 2200428</h5>
	<h5>Vasco Silva - 2200426</h5>
</p>



---

Informação de como instalar o nosso projeto:

**A pasta do repositório Git tem de estar dentro da pasta "www" do Wamp**

> **1º Passo** - Verificação do Composer
>
> Verificar se o Composer está instalado.
>
> > *Na linha de comandos:*
> >
> > 1.1 Executar o comando `composer`;

> **2º Passo** - Preparar o projeto Yii
>
> > *Na linha de comandos:*
> >
> > 2.1 Verificar se está colocado na pasta "FitWorkout";
> >
> > 2.2 Executar o comando `php init --env=Development --overwrite=All --delete=All` nessa pasta;

> **3º Passo** - Instalar as dependências do Composer
>
> > *Na linha de comandos:*
> >
> > 3.1 Verificar se está colocado na pasta "Projeto_PLSI_2021.2022\FitWorkout";
> >
> > 3.2 Executar o comando `composer update` nessa pasta;

> **4º Passo** - Preparar a Base de Dados
>
> > 4.1 Criar a base dados.
> >
> > 4.2 Configurar a ligação através do ficheiro "common\config\main_local.php".
> >
> > *Na linha de comandos:*
> >
> > 4.3 Verificar se está colocado na pasta "FitWorkout";
> >
> > 4.4 Executar o comando `php yii migrate --migrationPath=@yii/rbac/migrations `;
> >
> > 4.5 Executar o comando `php yii migrate`;

