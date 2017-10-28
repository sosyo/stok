<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<?php 
				include("head.php");
				?>
    		</div>
			<div class="row">
				<p>
				<a href="yeni_kisi.php" class="btn btn-success">Yeni Kişi</a>
				</p>
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
						<th>TC Kimlik No</th>
		                  <th>İsim</th>
		                  <th>Soyisim</th>
		                  <th>Telefon</th>
		                  <th></th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customers ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
								echo '<td>'. $row['tc'] . '</td>';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo '<td>'. $row['surname'] . '</td>';
							   	echo '<td>'. $row['tel'] . '</td>';
							   	echo '<td width=250>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Güncelle</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Sil</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>