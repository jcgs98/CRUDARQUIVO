<?php
if (($_POST) && (!empty($_POST["csv"])))
{
    $con = mysqli_connect("localhost", "root", "", "dawalunos");

    $arquivo = fopen($_POST["csv"], 'r');
	
	$DATA = fgetcsv($arquivo, 0, ';', '"');

    if ($arquivo)
    {
        while (!feof($arquivo))
        {
            $DATA = fgetcsv($arquivo, 0, ';', '"');

            if (!$DATA) continue;

            $query = mysqli_query($con, "INSERT INTO alunos (NOME, ORIENTADOR, ESCOLA) VALUES ('$DATA[0]', '$DATA[1]', '$DATA[2]')");
        }

        echo "<script>alert('Inserção realizada com sucesso!')</script>";

        fclose($arquivo);
    }
    else echo "<script>alert('Verifique o arquivo!')</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Inserir Aluno por Arquivo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">	
			<div class="card text-center mt-5">				
				<div class="card-body">					
					<a href="inserirArquivo.php" class="btn btn-primary">Inserir Aluno por Arquivo</a>
					<a href="lista.php" class="btn btn-primary">Listar Alunos</a>
					<a href="buscar.php" class="btn btn-primary">Exibir um Aluno</a>
                    <form class="mt-4" method="POST" action="inserirArquivo.php">
                            Digite o nome do arquivo: <input type="text" name="csv">
                            <input type="submit" name="submit" value="Enviar">
                        </fieldset>
                    </form>
                    </div>				
			</div>
			
		</div>	

        <?php
?>
    </body>
</html>
