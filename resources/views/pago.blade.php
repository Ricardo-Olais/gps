@extends('layouts.app')

@section('content')
 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
 <script src="https://js.stripe.com/v3/"></script>
 <script src="js/script.js" defer></script>
 <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>


 <script type="text/javascript">
     var myCanvas = document.createElement('canvas');
document.body.appendChild(myCanvas);

var myConfetti = confetti.create(myCanvas, {
  resize: true,
  useWorker: true
});
confetti();
 </script>

<script type="text/javascript">
  

  $(document).ready(function(){
   $('.fixed-action-btn').floatingActionButton();


   $.get("get-checkout-session.php",{"sessionId": "<?php echo $_REQUEST['session_id']; ?>"},

        function(data){

            $.post("actualizasubscripcion");

        },'json' );



  });
</script>

<div id="main" >
      <div class="row">
      
       
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!-- Current balance & total transactions cards-->
   <div class="row vertical-modern-dashboard">



    <div class="col s12 m2 l1"></div>

       <div class="col s12 m2 l10 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b><i class="material-icons right">gps_not_fixed</i>Tu plan ha sido activado con éxito</b></h4></center><br>
              
              
              
              <center><img src="images/pago.jpg" width="50%"></center>

             <a href="https://localizaminave.com/tracker" class="btn waves-effect waves-light" type="submit" name="action" style="width:100%;background-color:#00d3ee;margin-top: 20px;">Comenzar a localizar mi dispositivo
                <i class="material-icons right">send</i>
              </a>


            </div>
         </div>
      </div>


</div>
</div>
</div>
</div>



</div>
</div>


 


@endsection


