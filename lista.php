<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>
	<?php
		$con = mysqli_connect("localhost", "root", "", "dawalunos");
	?>        
		<div class="container">			
			<div class="card text-center mt-5">
				<div class="card-header">
					<a href="index.php" class="btn btn-primary">Início </a>
				</div>
				<div class="card-body">					
                    <table class="table table-sm mt-5">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Matricula</th>
                                <th>Escola</th>
								<th>Orientador</th>
                                <th>Atualizar</th>
                                <th>Apagar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $Exibe = mysqli_query($con, "SELECT * FROM alunos");
                                while($r = mysqli_fetch_array($Exibe)):
							?>
                                    <tr>
                                        <td><?php echo $r['NOME']; ?></td>
                                        <td><?php echo $r['MATRICULA']; ?></td>
                                        <td><?php echo $r['ESCOLA']; ?></td>
										<td><?php echo $r['ORIENTADOR']; ?></td>
                                        <td><a href="update.php?update_MATRICULA=<?php echo $r['MATRICULA']; ?>">Atualizar</a></td>
                                        <td><a href="delete.php?delete_MATRICULA=<?php echo $r['MATRICULA']; ?>">Apagar</a></td>										
                                    </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
				</div>
			</div>			
		</div>       
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>