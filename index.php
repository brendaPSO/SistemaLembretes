<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Brenda Orlandi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/home.css">
    <title>Sistema de Lembretes</title>
</head>
<body>

    <head>
        <h2>
            NOVO LEMBRETE
        </h2>
    </head>

    <section id="formSection">
        <form action="app/controller/CadastrarLembrete.php" method="POST" id="formLembrete">
            <div class="nome">
                <label for="nome">Nome</label>
                <input type="text" id="nome">
            </div>

            <div class="data">
                <label for="data">Data</label>
                <input type="date" id="data">
            </div>

            <button type="submit">Criar</button>
        </form>
    </section>

    <section>
        <h3>Lista de Lembretes</h3>
        <div class="listLembretes"></div>
    </section>
    
</body>
</html>