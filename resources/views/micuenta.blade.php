@extends('layouts.app')

@section('content')

 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

<script type="text/javascript">
     $(document).ready(function(){

        $('.tooltipped').tooltip();


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

         //background-image: url('img/fondo-login.png');
         background-color: #000;
    }

    p{

        font-size: 18px;
       }

    
</style>








<div id="main" >
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
</div>


 


@endsection


