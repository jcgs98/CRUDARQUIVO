<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>
        <div class="container">
			
			<div class="card text-center mt-5">				
				<div class="card-body">
					<form class="mt-2" method="POST" action="buscar.php">		
                        <input type="text" name="matricula" placeholder="Matrícula">                            
						<input type="text" name="nome" placeholder="Nome">                            
						<input type="text" name="escola" placeholder="Escola">                            
						<input type="text" name="orientador" placeholder="Orientador">                       
                        <input type="submit" name="submit" value="Buscar">                    
                    </form>					
				</div>
				<div class="card-footer text-muted">
					<a href="index.php" class="btn btn-primary">Início</a>
				</div>
		</div>        
		
		
<?php
$con = mysqli_connect("localhost", "root", "", "dawalunos");

if (($_POST) && ($_POST['submit']))
{
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $escola = $_POST["escola"];
    $orientador = $_POST["orientador"];
    $sql = "SELECT
				MATRICULA,
				NOME,
				ORIENTADOR,
				ESCOLA
			FROM
				alunos
			WHERE
			(	MATRICULA	=	'$matricula'
				OR	NOME		=	'$nome'
				OR	ESCOLA		=	'$escola'
				OR	ORIENTADOR	=	'$orientador'
			)";

    $resultado = $con->query($sql);
?>
        <table class="table table-sm mt-5">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Matricula</th>
                    <th>Orientador</th>
					<th>Escola</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
				<?php
    if ($resultado->num_rows > 0)
    {
        while ($linha = mysqli_fetch_assoc($resultado))
        {
?>
					<tr>
						<td><?php echo $linha['NOME']; ?></td>
                        <td><?php echo $linha['MATRICULA']; ?></td>
						<td><?php echo $linha['ORIENTADOR']; ?></td>
						<td><?php echo $linha['ESCOLA']; ?></td>
						<td><a class="update" href="update.php?update_MATRICULA=<?php echo $linha['MATRICULA']; ?>">Update</a></td>
						<td><a class="delete" href="delete.php?delete_MATRICULA=<?php echo $linha['MATRICULA']; ?>">Delete</a></td>
					</tr>
				<?php
        }
    }
    else
    {
        echo "<script>alert('Nome não encontrado!')</script>";
    }
?>
            </tbody>
        </table>
        <?php
}
?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
