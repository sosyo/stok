<?php 
	
	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$malzemeError = null;
		$barkodError = null;
		$demirbasnoError = null;
		
		// keep track post values
		$malzeme = $_POST['malzeme'];
		$barkod = $_POST['barkod'];
		$demirbasno = $_POST['demirbasno'];
		$tasinirkodu= $_POST['tasinirkodu'];
		
		// validate input
		$valid = true;
		if (empty($malzeme)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		
		
		
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO malzeme (malzeme,barkod,demirbasno,tasinirkodu) values(?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($malzeme,$barkod,$demirbasno,$tasinirkodu));
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
		    			<h3>Create a Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="yeni_malzeme.php" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Malzeme</label>
					    <div class="controls">
					      	<input name="malzeme" type="text"  placeholder="Name" value="<?php echo !empty($malzeme)?$malzeme:'';?>">
					      	<?php if (!empty($malzemeError)): ?>
					      		<span class="help-inline"><?php echo $malzemeError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($barkodError)?'error':'';?>">
					    <label class="control-label">Barkod</label>
					    <div class="controls">
					      	<input name="barkod" type="text" placeholder="Email Address" value="<?php echo !empty($barkod)?$barkod:'';?>">
					      	<?php if (!empty($barkodError)): ?>
					      		<span class="help-inline"><?php echo $barkodError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($demirbasnoError)?'error':'';?>">
					    <label class="control-label">Demirbaş No</label>
					    <div class="controls">
					      	<input name="demirbasno" type="text"  placeholder="Mobile Number" value="<?php echo !empty($demirbasno)?$demirbasno:'';?>">
					      	<?php if (!empty($demirbasnoError)): ?>
					      		<span class="help-inline"><?php echo $demirbasnoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					   <div class="control-group <?php echo !empty($tasinirkoduError)?'error':'';?>">
					    <label class="control-label">Taşınır Kodu</label>
					    <div class="controls">
					      	<input name="tasinirkodu" type="text"  placeholder="Name" value="<?php echo !empty($tasinirkodu)?$tasinirkodu:'';?>">
					      	<?php if (!empty($tasinirkodueError)): ?>
					      		<span class="help-inline"><?php echo $tasinirkoduError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>