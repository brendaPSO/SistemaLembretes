<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Brenda Orlandi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/home.css">
    <title>Sistema de Lembretes</title>


    <script>
        function salvarForm(){
            if (localStorage.cont) {
                localStorage.cont = Number(localStorage.cont)+1;
            } else {
                localStorage.cont = 1;
            }
            
            lemb = document.getElementById('nome').value + ';' + document.getElementById('data').value;
            localStorage.setItem("lemb_"+localStorage.cont, lemb);
        }

        function lerForm(){
            for(cont = 1; cont <= localStorage.cont; cont++){
                if (localStorage.getItem('lemb_'+cont) != null) {
                    ficha = localStorage.getItem('lemb_'+cont);
                    document.getElementById("listLembretes").innerHTML += "Nome: " + ficha.split(";")[0] + ", " + "Data: " + ficha.split(";")[1] + "<br>";
                }
            }
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "gravar.php?q=" + document.getElementById("listLembretes").innerHTML, true);
            xmlhttp.send();
        }
    </script>
</head>

<body onload="lerForm()">

    <head>
        <h2>
            NOVO LEMBRETE
        </h2>
    </head>

    <section id="formSection">
        <form action="?controller=LembreteController&method=salvar?>" method="post">
            <div class="nome">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome">
            </div>

            <div class="data">
                <label for="data">Data</label>
                <input type="date" id="data" name="data">
            </div>

            <button type="submit" id="bt-enviar">Criar</button>
        </form>
    </section>

    <section>
        <h3>Lista de Lembretes</h3>
        <div id="listLembretes">

        </div>

    </section>

</body>

</html>