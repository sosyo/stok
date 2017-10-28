<?php
$barkod = (isset($_GET["barkod"])?$_GET["barkod"]:"0");
?>
<html>
<body>

	<a href="javascript:;" class="text-center" onclick="print_barcode();" style="width:100%;">
    	<div style="height:4px;"></div>
    	<img src="./barcode/barcode.php?barkod=<?php echo $barkod;?>" class="img-responsive" />
    </a>
    
    
    <script>
	function print_barcode() { 
		window.print();
window.onfocus=function(){ window.close();}
	}
	</script>

</body>
</html>