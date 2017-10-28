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
				<a href="yeni_malzeme.php" class="btn btn-success">Yeni Malzeme</a>
				</p>
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Malzeme Adı</th>
		                  <th>Barkod</th>
		                  <th>Demirbaş No</th>
		                  <th>Taşınır Kodu</th>
						  <th style="font face=free sans">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM malzeme ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['malzeme'] . '</td>';
							   	echo '<td>'. $row['barkod'] . '</td>';
							   	echo '<td>'. $row['demirbasno'] . '</td>';
								echo '<td>'. $row['tasinirkodu'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="read1.php?id='.$row['id'].'&barkod='.$row['barkod'].'&tasinirkodu='.$row['tasinirkodu'].'">Malzeme Kartı</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Güncelle</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Sil</a>';
							   	echo '&nbsp;';
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