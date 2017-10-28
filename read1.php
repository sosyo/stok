<?php 
	require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM malzeme where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
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
    <div class="row">
    			<?php 
				include("head.php");
				?>
    		</div>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Malzeme Kartı</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Malzeme Adı</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['malzeme'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Demirbaş No</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['demirbasno'];?>
						    </label>
					    </div>
					  </div>
					  
					  <div class="control-group">
					    <label class="control-label">Taşınır Kodu</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['tasinirkodu'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Barkod</label>
					    <div class="controls">
	<a href="javascript:;" class="img-thumbnail text-center" onclick="print_barcode();" style="width:100%;">
    	<div style="height:4px;"></div>
    	<img src="./barcode/barcode.php?barkod=<?php echo $data['barkod'];?>" class="img-responsive" />
    </a>
					<script>
	function print_barcode() { 
		new_window = window.open("deneme.php?barkod=<?php echo $data['barkod'];?>", "<?php echo $data['barkod'];?>","location=0,status=0,scrollbars=0,width=200,height=100"); 
		new_window.moveTo(0,0); 
	}
	</script>			
					    </div>
					  </div>
					    <div class="form-actions">
						
						  <a class="btn" href="malzemeler.php">Geri</a>
					   </div>	 
					</div>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>