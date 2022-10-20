<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>FastTransfer</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/jquery-1.10.2.js"></script>
<script src="./success.js" defer></script>


<link  rel="icon"   href="images/fast_transfer_3.ico" type="image/png" />

<?php include 'css.php' ?>
<?php include 'js.php' ?>

<?php 

$datos=base64_decode($_GET['val']);



$datosOK=$datos."&id=".$_GET['session_id'];



?>


<script type="text/javascript">
	
	$(document).ready(function(){
    var index = 0;

 

    var datosPago= "<?php echo $datosOK;?>";

    $.post("registro.php",datosPago);


<?php if(isMobile()) { ?>
  var listaimg = ["images/mobile/2.jpeg", "images/mobile/3.jpeg","images/mobile/4.jpeg"];

<?php }?>

<?php if(!isMobile()) { ?>

var listaimg = ["images/2.jpg", "images/3.jpg", "images/4.jpg","images/5.jpg","images/6.jpg","images/7.jpg","images/8.jpg","images/1.jpg"];
<?php }?>

var totalCarga=listaimg.length;

		$(function() {
		  
		    setInterval(changeImage, 25000);
		  
		});

		function changeImage() {
		  
		 
		   $('body').css("background-image", 'url(' + listaimg[index] + ')');
		                  
		   index++;
		                  
		   if(index == totalCarga)
		      index = 0;
		    
		    
		}
		//alert(datosPago);


	});
</script>

</head>

<body>
	<?php include 'menu.php' ?>
	
 <?php 
   $toppage="8%";
   if(isMobile()){ 

    $toppage="15%";

   } ?>

<?php if(isMobile()){ ?>

<div id="contenedorBody" style="background-image: url('../images/mobile/1.jpeg');"></div>

<?php }?>

 <?php if(!isMobile()){ ?>
<div id="contenedorBody"></div>
 <?php } ?>  

<div class="container" >
	<div class="row">

		<div class="col-md-4" style="border: 1px; border-radius: 15px; box-shadow: 0px 0px 5px 8px #F7F9F9 ; padding: 20px; background-color: #fff;opacity: .9; margin-top: <?php echo $toppage;?>">
                 
           <center> <strong style="font-size: 20px;color: #000;"> Perfecto ya eres PRO!</strong></center><br><br>
                           <div class="plan plan--free" style="width: 350px;"><div><ul class="plan__features">
		<span class="glyphicon glyphicon-ok"></span> Envía y recibe hasta 20 GB<br>
		<span class="glyphicon glyphicon-ok"></span> Reenvia y elimina transferencias<br>
		<span class="glyphicon glyphicon-ok"></span> Transferencias por email<br>
		<span class="glyphicon glyphicon-ok"></span> Decide cuándo deben caducar tus transferencias<br>
		<span class="glyphicon glyphicon-ok"></span> Protege tus transferencias con contraseña<br>
		<span class="glyphicon glyphicon-ok"></span> Atención personalizada<br>
		<span class="glyphicon glyphicon-ok"></span> Página Personalizada para compartir<br>
		<span class="glyphicon glyphicon-ok"></span> Dashboard de archivos entrantes y enviados<br>
		<span class="glyphicon glyphicon-ok"></span> Apartir del quinto mes de subscripción incrementamos tu cuenta a 25 GB
	</ul>
     </div>
    </div>
                       

     </div>




		<div class="col-md-4 col-md-offset-1" style="border: 1px; border-radius: 15px; box-shadow: 0px 0px 5px 8px #F7F9F9 ; padding: 20px; background-color: #fff;opacity: .9; margin-top: 8%; height: auto;text-align: center;">


		  <!--img src="img/exitoso2.jpg"-->

		  <p style="font-size: 17px;color: red;">Tu pago se realizó de manera exitosa</p>

		   <?php if(isMobile()){ ?>
		  <a  href="index.php"  class="btn btn-warning"  style="float: right;border-radius: 20px;width: 100%;height: 60px;padding: 15px;font-size: 18px;">Comienza a probar Pro</a>
		  <div id="espacio" style="height: 60px;width: 100%;"></div>

		   <?php } else { ?>

		   	 <a  href="index.php"  style="border-radius: 20px;" class="btn btn-warning">Comienza a probar Pro</a>

		    <?php } ?>


		</div>

    </div>

</div>
</div>








<div id="error-message"></div>
    







</body>

</html>