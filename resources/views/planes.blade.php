@extends('layouts.app')

@section('content')
 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
 <script src="https://js.stripe.com/v3/"></script>
 <script src="js/script.js" defer></script>

 <?php
    session_start(); 
    $_SESSION["id"]=@$_REQUEST['id'];

 ?>

<script type="text/javascript">
  

  $(document).ready(function(){
   $('.fixed-action-btn').floatingActionButton();


   $("#gratis").click(function(){

        $("#basico").css("display","");



   });

   $("#basic-plan-btn").click(function(){

        $("#plan1").css("display","");

   });

    $("#pro-plan-btn").click(function(){

        $("#plan2").css("display","");

   });




  });
</script>

<div id="main" >
      <div class="row">
     <input type="hidden" name="valida" id="valida" value="<?php echo @$_REQUEST['id']; ?>">
    
        <div class="content-wrapper-before blue-grey lighten-5"></div>
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!-- Current balance & total transactions cards-->
   <div class="row vertical-modern-dashboard">

  <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="background-color: #00bcd4;border-radius: 15px;padding:1px;">
           
               <center><h5 style="color:#fff !important;">Conoce nuestros planes</h5></center>
          

         </div>
      </div>

       <div class="col s12 m2 l4 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b><i class="material-icons right">gps_not_fixed</i>Prueba Gratuita (1 mes)</b></h4></center><br>
              
           <ul class="collection with-header">
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real</li>
        <li class="collection-item" style="background-color:#D5D8D4;"><i class="material-icons" style="color:red">gps_fixed</i> Cuentas espejo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas</li>
        <li class="collection-item" style="background-color:#D5D8D4;"><i class="material-icons" style="color:red">hdr_weak</i> Configura ubicación fija</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo</li>
        <li class="collection-item" style="background-color:#D5D8D4;"><i class="material-icons" style="color:red">headset_mic</i> Atención personalizada por chat</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">notifications</i> Notificaciones vía whatsapp y correo electrónico</li>
      </ul>

               

              <center><img src="img/home/real.png" width="50%"></center>

             <a href="dispositivos"  class="btn waves-effect waves-light" id='gratis' style="width:100%;background-color: #fff;color:#000;">Conseguir Plan
                <i class="material-icons right">send</i>
                 <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="basico">
                      <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                </div>
              </a>


            </div>
         </div>
      </div>


      <div class="col s12 m2 l4 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h4 class="card-title mb-0"><b><i class="material-icons right">gps_fixed</i>Plan Mensual $29.00 MXN</b></h4></center><br>
              
            

      <ul class="collection with-header">
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">notifications</i> Notificaciones vía whatsapp y correo electrónico</li>
      </ul>

               

              <center><img src="img/home/rutas.png" width="50%"></center>



             <a class="btn waves-effect waves-light" id="basic-plan-btn"  style="width:100%;background-color: black;">Conseguir Plan
                <i class="material-icons right">send</i>
                <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="plan1">
                      <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                </div>
              </a>


            </div>
         </div>
      </div>

          <div class="col s12 m2 l4 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <center><h5 class="card-title mb-0"><b><i class="material-icons right">gps_fixed</i>Plan anual $299.00 MXN</b></h5></center><br>
              
        <ul class="collection with-header">
       
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Ubicación en tiempo real</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">gps_fixed</i> Cuentas espejo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">location_on</i> Configura Geocercas</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">hdr_weak</i> Configura ubicación fija</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">format_list_bulleted</i> Consulta Histórico (1 año)</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">perm_data_setting</i> Herramientas de reporte de robo</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">headset_mic</i> Atención personalizada por chat</li>
        <li class="collection-item"><i class="material-icons" style="color:#00bcd4;">notifications</i> Notificaciones vía whatsapp y correo electrónico</li>
      </ul>

              <center><img src="img/home/vehiculos.png" width="50%"></center>

              <button class="btn waves-effect waves-light" id="pro-plan-btn"  style="width:100%;">Conseguir Plan
                <i class="material-icons right">send</i>

                <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="plan2">
                      <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>

                      <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                          <div class="circle"></div>
                        </div><div class="gap-patch">
                          <div class="circle"></div>
                        </div><div class="circle-clipper right">
                          <div class="circle"></div>
                        </div>
                      </div>
                </div>
              </button>





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


