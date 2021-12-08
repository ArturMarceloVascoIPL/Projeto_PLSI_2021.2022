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
> > _Na linha de comandos:_
> >
> > 1.1 Executar o comando `composer`;

> **2º Passo** - Preparar o projeto Yii
>
> > _Na linha de comandos:_
> >
> > 2.1 Verificar se está colocado na pasta "FitWorkout";
> >
> > 2.2 Executar o comando `php init --env=Development --overwrite=All --delete=All` nessa pasta;

> **3º Passo** - Instalar as dependências do Composer
>
> > _Na linha de comandos:_
> >
> > 3.1 Verificar se está colocado na pasta "Projeto_PLSI_2021.2022\FitWorkout";
> >
> > 3.2 Executar o comando `composer update` nessa pasta;

> **4º Passo** - Preparar a Base de Dados
>
> > 4.1 Criar a base dados.
> >
> > 4.2 Configurar a ligação através do ficheiro "common\config\main_local.php"
> >
> > _Na linha de comandos:_
> >
> > 4.3 Verificar se está colocado na pasta "FitWorkout"
> >
> > 4.4 Executar o comando `php yii migrate`
> > 4.5 Executar o comando `php yii migrate --migrationPath=@yii/rbac/migrations`
> > 4.6 Voltar a executar o comando `php yii migrate`
> >
> > > **4bº Passo** - Em caso de atualizacao de base dados
> > > 4b.1 Executar o comando `php yii migrate/fresh`
> > > 4b.2 Executar o comando `php yii migrate --migrationPath=@yii/rbac/migrations /fresh`
> > > 4b.3 Executar o comando `php yii migrate /fresh`

> **5º Passo** - Correr a aplicação em Servidor
> Não colocar na mesma porta cada aplicação
> >
> Se Pretender pode executar o ficheiro `ServerStart.bat` para correr automaticamente (executar na pasta acima do projeto)
> > **Frontend** - Para a aplicao frontend
> >
> > > `php yii serve --docroot="frontend/web/" --port=7070`
> >
> > **Backend** - Para a aplicação frontend
> >
> > > `php yii serve --docroot="backend/web/" --port=9090`
> >
> > **REST API** - Para a aplicação REST API
> >
> > > `php yii serve --docroot="backend/web/" --port=8080`
> >