@extends('layouts.horizontal')

@section('content')

 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

<script type="text/javascript">
     $(document).ready(function(){

        $('.tooltipped').tooltip();
      
         $('#textarea1').trigger('autoresize');


});
     
    function cargar(id){

         $("#"+id).css("display","");
    }
</script>
        

<style type="text/css">
    td, th {
        padding: 5px 0px !important;
    }

    .colorcolum{

        font-weight: bold;
    }
    .modal {
      max-height: 100% !important;
    }


    
    body{

         background-image: url('img/prueba12-min.jpg');
         background-repeat: no-repeat;
         background-size: cover;
         //background-color: #000;
    }

    p{

        font-size: 18px;
       }

    
</style>

<center><h4 style="color:#fff;">Mi cuenta</h4></center>

<div class="col s12 m2 l4 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="opacity:.9;">
            <div class="card-content">
               <center><h4 class="card-title mb-0" style="font-size: 30px;">
              <a class='modal-trigger' href="#cuenta" style="text-decoration: none;color:#000;">
                <b>Información <i class="material-icons" style="font-size: 30px;">account_circle</i></b></a>

            </h4></center>
            </div>
         </div>
</div>




<div class="col s12 m2 l4 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="opacity:.9;">
            <div class="card-content">
               <center><h4 class="card-title mb-0" style="font-size: 30px;">
              <a class='modal-trigger' href="#soporte-info" style="text-decoration: none;color:#000;">  <b>Soporte <i class="material-icons" style="font-size: 30px;">comment</i></b></a>
            </h4></center>
            </div>
         </div>
</div>



<div class="col s12 m2 l4 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card" style="opacity:.9;">
            <div class="card-content">
               <center><h4 class="card-title mb-0" style="font-size: 30px;"><b>Historial de Pedidos <i class="material-icons" style="font-size: 30px;">comment</i></b></h4></center>
            </div>
         </div>
</div>




  <div id="cuenta" class="modal modal-fixed-footer"  tabindex="-1" style="width:400px;">
    <div class="modal-content">
      <h6 id="title-modal" style="color:#000;font-size: 30px;">Información de la cuenta</h6><br>



        <div class="row">
            <div class="input-field col s12" >
              <input value="{{ auth()->user()->name}}" id="nombre" type="text" name="nombre" class="validate" style="font-size:22px !important;">
              <label class="active" for="nombre" style="font-size:22px !important;">Nombre Completo</label>
            </div>
          </div>

           <div class="row">
            <div class="input-field col s12" >
              <input value="{{ auth()->user()->email}}" id="correo" name="correo" type="text" class="validate" style="font-size:22px !important;">
              <label class="active" for="correo" style="font-size:22px !important;">Correo electrónico</label>
            </div>
          </div>

           <div class="row">
            <div class="input-field col s12" >
              <input value="{{ auth()->user()->telefono}}" id="telefono" name="telefono" type="text" class="validate" style="font-size:22px !important;">
              <label class="active" for="telefono" style="font-size:22px !important;">Teléfono</label>
            </div>
          </div>
               
   
    <div class="modal-footer" style="width:350px;">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
      <a href="#!" class="waves-effect waves-green btn-flat btn" style="background-color:red;color:#fff;" id='elimina-cuenta'>Eliminar cuenta</a>

    </div>
  </div>
</div>


  <div id="soporte-info" class="modal modal-fixed-footer"  tabindex="-1" style="width:400px;">
    <div class="modal-content">
      <h6 id="title-modal" style="color:#000;font-size: 30px;">Soporte</h6><br>



        <div class="row">
            <div class="input-field col s12" >
              <input value="{{ auth()->user()->name}}" id="nombreso" type="text" name="nombreso" class="validate" style="font-size:22px !important;">
              <label class="active" for="nombreso" style="font-size:22px !important;">Nombre Completo</label>
            </div>
          </div>

           <div class="row">
            <div class="input-field col s12" >
              <input value="{{ auth()->user()->email}}" id="correoso" name="correoso" type="email" class="validate" style="font-size:22px !important;">
              <label class="active" for="correoso" style="font-size:22px !important;">Correo electrónico</label>
            </div>
          </div>

           <div class="row">
            <div class="input-field col s12" >
              <input value="{{ auth()->user()->email}}" id="telefonoso" type="number" name='telefonoso' class="validate" style="font-size:22px !important;">
              <label class="active" for="telefonoso" style="font-size:22px !important;">Teléfono</label>
            </div>
          </div>

          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="comen" class="materialize-textarea" name="comen" style="font-size:22px !important;"></textarea>
                  <label for="comen" style="font-size:22px !important;">Comentarios</label>
                </div>
              </div>
            </form>
          </div>
               
   
    <div class="modal-footer" style="width:350px;">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
      <a href="#!" class="waves-effect waves-green btn-flat btn" style="background-color:black;color:#fff;" id='elimina-cuenta'>Enviar</a>

    </div>
  </div>
</div>




<!--div id="main" >
      <div class="row">

         <center>
            <h6 style="color:#00bcd4;font-size: 18px;">Mi Cuenta</h6>
         </center>

       
            <div class="col s12 m2 l6 animate fadeRight">
             
                   <div class="card">
                     <div class="card-content">
                       <div class="card-title">Información de cuenta</div>
                       <center>
                         <table class="highlight">
                          <tr>
                            <td><iconify-icon icon="mdi:user-box-outline" style="font-size: 150px;"></iconify-icon></td>
                            <td>
                              

                            </td>
                          </tr>
                           <tr>
                             <td class="colorcolum"><b>Nombre completo</b></td>
                             <td>{{ auth()->user()->name}}</td>
                           </tr>
                           <tr>
                             <td class="colorcolum"><b>Email</b></td>
                             <td>{{ auth()->user()->email}}</td>
                           </tr>

                           <tr>
                             <td class="colorcolum"><b>Teléfono</b></td>
                             <td></td>
                           </tr>
                          
                         </table>
                       </center>
                     </div>
                   </div>
                   <a href=""  class="badge pink lighten-5 pink-text text-accent-2 btn" id='elimina-cuenta' style="width:100%;background-color: #fff;color:#000;">Eliminar cuenta</a>

                   <a href="facturacion"  class="badge blue lighten-5 blue-text text-accent-2 btn"  style="width:100%;background-color: #fff;color:#000;margin-top: 20px;">Facturación</a><br><br>

            </div>

            <div class="col s12 m2 l6 animate fadeRight" style="color:#fff;">
                <p style="text-align: justify;">
         <span style="color:#00bcd4;">Gps Tracker</span> de Localizaminave es una aplicación que permite instalarse en dispositivos android para obtener y monitorear la ubicación de personas, de tu auto. No se requiere comprar ningún localizador, solo instala en el dispositivo que desees localizar y rastrea desde la plataforma <a href="https://localizaminave.com/" style="color:#00bcd4;">https://localizaminave.com</a>

         <center>
              <a href="https://play.google.com/store/apps/details?id=com.localizaminave.gps" target="_blank"> <img src="img/play.png" width="40%" style="margin-top: 10px;"></a>

              <img src="img/home/paso-4.png" width="20%" style="margin-top: 10px;"></center>

        </p>
         
         <p style="text-align: justify;">
         Conóce en donde se encuentran tus seres queridos, localizador familiar preciso y seguro, encuentra a sus seres queridos y sepa dónde están. Ahora es el mejor momento para garantizar la seguridad de su familia. Podrás localizarlos en tiempo real, compara nuestra plataforma.

        </p>
             
       
        
            </div>
        



      
</div>
</div-->


 


@endsection


