<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$tcError = null;
		$nameError = null;
		$surnameError = null;
		$telError = null;
		
		// keep track post values
		$tc = $_POST['tc'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$tel = $_POST['tel'];
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		
		
		
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO customers (tc,name,surname,tel) values(?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($tc,$name,$surname,$tel));
			Database::disconnect();
			header("Location: index.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Yeni Kişi Ekle</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="yeni_kisi.php" method="post">
					   <div class="control-group <?php echo !empty($tcError)?'error':'';?>">
					    <label class="control-label">TC No</label>
					    <div class="controls">
					      	<input name="tc" type="text"  placeholder="TC No" value="<?php echo !empty($tc)?$tc:'';?>">
					      	<?php if (!empty($tcError)): ?>
					      		<span class="help-inline"><?php echo $tcError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">İsim</label>
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="İsim" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($surnameError)?'error':'';?>">
					    <label class="control-label">Soyisim</label>
					    <div class="controls">
					      	<input name="surname" type="text" placeholder="Soyisim" value="<?php echo !empty($surname)?$surname:'';?>">
					      	<?php if (!empty($surnameError)): ?>
					      		<span class="help-inline"><?php echo $surnameError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($telError)?'error':'';?>">
					    <label class="control-label">Telefon No</label>
					    <div class="controls">
					      	<input name="tel" type="text"  placeholder="Telefon No" value="<?php echo !empty($tel)?$tel:'';?>">
					      	<?php if (!empty($telError)): ?>
					      		<span class="help-inline"><?php echo $telError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Ekle</button>
						  <a class="btn" href="index.php">Vazgeç</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>