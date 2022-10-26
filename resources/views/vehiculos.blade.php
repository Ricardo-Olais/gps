@extends('layouts.app')

@section('content')

 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
 <script src="notificaciones/node_modules/socket.io-client/dist/socket.io.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
 <script>

    var myCanvas = document.createElement('canvas');
    document.body.appendChild(myCanvas);

    var myConfetti = confetti.create(myCanvas, {
      resize: true,
      useWorker: true
    });


  var socket = io('http://187.245.4.2:3000');

  var messages = document.getElementById('messages');


  socket.on('message', function(msg) {

    confetti();
    
    Swal.fire({
                      title: 'Dispositivo sincronizado correctamente '+msg.email,
                      showDenyButton: false,
                      showCancelButton: false,
                      confirmButtonText: 'Aceptar',
                      denyButtonText: `Don't save`,
                    }).then((result) => {
                      /* Read more about isConfirmed, isDenied below */
                      if (result.isConfirmed) {
                        
                        location.reload();

                      } 
                    });



  });
</script>

<script type="text/javascript">
     $(document).ready(function(){

        $('.tooltipped').tooltip();
        $('.modal').modal();

        var ultimo=localStorage.getItem("ultimo");

       // alert(ultimo);


        $("#guardavehiculo").submit(function(){

              var datos=$(this).serialize()+"&_token="+token;

            $.post("guardavehiculo",datos,

                function(data){

                   // alert(data.ultimo);
                    localStorage.setItem("ultimo", data.ultimo);

                   location.reload();

                },'json' );
               

            return false;

        });


         
  });

      function guardar(id,android){
           // alert("actualizar "+id+ "con "+android);

            $.post("actualizanumero",{id:id,android:android,_token:token},

                function(data){

                    if(data.rows.valida="true"){

                        localStorage.setItem("id", id);

                        location.reload();
                    }

                },'json');

                
        }

        function pagar(id){

           // alert("pagar "+id);
           if($("#"+id).val()==""){
                Swal.fire('Escanea el código QR con la app gps Tracker');

            }else{
            location.href="planes?id="+id;
            
            }


        }



        function pagargratis(id){

            if($("#"+id).val()==""){
                Swal.fire('Escanea el código QR con la app gps Tracker');

            }else{

                //actualizamos vehículo a estatus 5 que es pagar despues de la membrecía

                
                $.post("licenciagratis",{id:id,_token:token},

                function(data){

                    Swal.fire({
                      title: 'Disfruta de los beneficios de localizaminave, tu licencia gratuita ha sido activada',
                      showDenyButton: false,
                      showCancelButton: false,
                      confirmButtonText: 'Aceptar',
                      denyButtonText: `Don't save`,
                    }).then((result) => {
                      /* Read more about isConfirmed, isDenied below */
                      if (result.isConfirmed) {
                        
                        location.reload();

                      } 
                    });



                   

                },'json');


            }


            //alert("gratis");
        }

        function eliminar(id){

             Swal.fire({
                      title: 'El vehículo será eliminado, al eliminarlo se perderá tu licencia pero mantendremos tu histórico, realmente deseas eliminarlo?',
                      showDenyButton: false,
                      showCancelButton: true,
                      confirmButtonText: 'Si, lo quiero eliminar',
                      denyButtonText: `Don't save`,
                    }).then((result) => {
                      /* Read more about isConfirmed, isDenied below */
                      if (result.isConfirmed) {
                        
                        //location.reload();
                         $.post("eliminavehiculogps",{id:id,_token:token},

                                   function(data){

                                     location.reload();

                                   },'json');

                      } 
                      
                    });

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
</style>

<div id="main" >
      <div class="row">

         <!-- Modal Structure -->
           <div id="modal1" class="modal">
             <div class="modal-content">
               <h5>Nuevo dispositivo</h5>

            <div class="row">
                    <form class="col s12" name="guardavehiculo" id="guardavehiculo">


                      <div class="row">
                        <div class="input-field col s12 m2 l6">
                          <i class="material-icons prefix">android</i>
                           <select name="tipovehiculo" id="tipovehiculo" required style="font-size:18px;">
                                 <option value="" disabled selected>Selecciona Tipo</option>
                                 <option>Auto</option>
                                 <option>Motocicleta</option>
                                 <option>Persona</option>
                                 <option>Mascota</option>
                                 
                               </select>
                               <label style="font-size:18px;">Vehículo</label>
                        </div>
                        <div class="input-field input-field col s12 m2 l6">
                          <i class="material-icons prefix">data_usage</i>
                          <input id="alias" name='alias' type="text" class="validate" placeholder="Por ejemplo: Mi carro rojo" required style="font-size:18px;">
                          <label for="icon_telephone" style="font-size:18px;">Alias del dispositivo</label>
                        </div>
                      </div>

                    <div class="row">
                        <div class="input-field input-field col s12 m2 l6">
                          <i class="material-icons prefix">account_circle</i>
                          <input  id="conductor" name="conductor" type="text" class="validate" placeholder="Conductor" required style="font-size:18px;">
                          <label for="icon_prefix" style="font-size:18px;">Nombre de conductor</label>
                        </div>

                        <div class="input-field input-field col s12 m2 l6">
                          <i class="material-icons prefix">phone</i>
                          <input id="telefono" name="telefono" type="number" class="validate" placeholder="Teléfono" required style="font-size:18px;">
                          <label for="icon_telephone" style="font-size:18px;">Teléfono</label>
                        </div>
                      </div>


                       <div class="row">
                        <div class="input-field col s12 m2 l4">
                          <i class="material-icons prefix">directions_car</i>
                          <input id="marca" name='marca' type="text" class="validate" placeholder="Opcional" style="font-size:18px;">
                          <label for="icon_prefix" style="font-size:18px;">Marca</label>
                        </div>
                        <div class="input-field col s12 m2 l4">
                          <i class="material-icons prefix">event_note</i>
                          <input id="placas" name='placas' type="text" class="validate" placeholder="Opcional" style="font-size:18px;">
                          <label for="icon_telephone" style="font-size:18px;">No.Placas</label>
                        </div>

                        <div class="input-field col s12 m2 l4">
                          <i class="material-icons prefix">android</i>
                           <select name="geocerca" id="geocerca" required style="font-size:18px;">
                                 <option value="" disabled selected>Selecciona Km</option>
                                 <?php
                                    for($i=1; $i<50;$i++){

                                        echo "<option value='$i'>$i</option>";
                                    }

                                 ?>
                                 
                               </select>
                               <label style="font-size:18px;">Geocerca (Km)</label>
                        </div>
                      </div>



                    
            </div>
             

             </div>
             <div class="modal-footer">
               <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>

               <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>
                  </button>
              
             </div>
             </form>
           </div>

        <div class="fixed-action-btn" >
           <a class="btn-floating btn-large red modal-trigger" href="#modal1" style="margin-bottom: 70px !important;">
             <i class="large material-icons">add</i>
           </a>
           <!--ul>
             <li><a class="btn-floating" style="background-color: #66E209;"><iconify-icon icon="mdi:whatsapp" style='font-size: 40px';></iconify-icon></a></li>
             <li><a class="btn-floating  darken-1" style="background-color: #09A0E2;"><iconify-icon icon="fa-brands:facebook-messenger" style='font-size: 40px';></iconify-icon></a></li>
            
           </ul-->
         </div>

        <center><h6>Mis dispositivos</h6></center>

        @if(count($datos)==0)

              <div class="col s12 m2 l12 animate fadeRight">
                 <!-- Total Transaction -->
                 <div class="card">
                    <div class="card-content">
                       <center>

                         <a class="waves-effect waves-light btn modal-trigger" href="#modal1" style="border-radius: 15px;">Agrega tus dispositivos</a>

                         <!--img src="img/autov.gif" width="30"-->

                   

                    </center>
                      
                   

                    </div>
                 </div>
              </div>




        @endif


       @foreach($datos as $valor)


             <div class="col s12 m2 l6 animate fadeRight">
                 <!-- Total Transaction -->

                 <div class="card">
                    <div class="card-content">
                       <!--center><h6 style="color:#000 !important;">{{ $valor['alias_vehiculo'] }}</h6></center-->

                      <div class="card-title">Dispositivo:</b> {{ $valor['alias_vehiculo'] }}</div>
                      <center>
                      <div class="title m-b-md" >
                              {!!QrCode::size(170)->color(69, 187,194)->generate($valor['email'].'-'.$valor['id']) !!}
                             </div>
                             <span style="color:#45bbc2;">Escanea el código con la app localiza mi nave</span><br></center>

                       <table class="highlight">

                        <tr><td class="colorcolum">Id</td> <td>{{ $valor['id'] }}</td></tr>
                        
                        <tr><td class="colorcolum">Conductor</td> <td>{{ $valor['conductor'] }}</td></tr>
                        <tr><td class="colorcolum">Geocerca</td> <td>{{ $valor['geocerca'] }} Km</td></tr>
                        <tr><td class="colorcolum">Identificador</td> <td>
                            @if ($valor['id_imei_android']=='') 
                        <i class="material-icons prefix right tooltipped" style="cursor: pointer;" data-position="top" data-tooltip="Guardar"  onclick="guardar({{ $valor['id'] }}, $('#'+{{ $valor['id'] }}).val())">save</i>


                        <input id="{{ $valor['id'] }}" name="{{ $valor['id'] }}" class='identidad' type="text" class="validate"  value="" placeholder="Ingresa Identificador">
                        
                       
                        @else

                        <input id="last_name" type="text" class="validate" value="{{ $valor['id_imei_android'] }}">

                    @endif
                        </td></tr>

                        <tr><td class="colorcolum">Estatus</td> <td>
                        
                        @if ($valor['estatus']==0) 


                        <span class="badge green lighten-5 blue-text text-accent-2 btn" onclick="pagargratis({{ $valor['id'] }})" style="width:100%;height: 40px;padding: 9px;">Consigue plan Gratuito</span>

                        @endif

                        @if ($valor['estatus']==1) 

                         <span class="badge pink lighten-5 pink-text text-accent-2 btn" onclick="pagar({{ $valor['id'] }})" style="width:100%;height: 40px;padding: 9px;">Pagar Licencia</span>

                         @endif

                        @if ($valor['estatus']==2) 

                         <span class="badge blue lighten-5 blue-text text-accent-2 btn" style="width:100%;height: 40px;padding: 9px;">Licencia activa</span>

                         @endif

                         @if ($valor['estatus']==5) 

                         <span class="badge blue lighten-5 blue-text text-accent-2 btn" style="width:100%;height: 40px;padding: 9px;">Licencia Gratuita 1 mes</span>

                         @endif

                        
                        </td></tr>

                        <tr><td class="colorcolum">Acciones</td>  <td class="center-align">

                        <a href="#" ><i class="material-icons pink-text" style="font-size:30px !important;"  onclick="eliminar({{ $valor['id'] }})">clear</i></a>
                        <a href="#"><i class="material-icons yellow-text" style="font-size:30px !important;">edit</i></a>

                        </td></tr>


                       </table>
                  
                    </div>
                 </div>
              </div>

             @endforeach



</div>
</div>


 


@endsection


