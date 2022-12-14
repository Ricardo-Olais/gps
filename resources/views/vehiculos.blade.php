@extends('layouts.sinchat')

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


  var socket = io('https://localizaminave.com:3000');

  var messages = document.getElementById('messages');


  socket.on('message', function(msg) {

    confetti();

   if(email==msg.email){

       if(msg.msg==""){

         mensaje="Dispositivo sincronizado correctamente";
       }else{

        mensaje=msg.msg;
       }
    
    Swal.fire({
                      title: mensaje,
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
        }


  });
</script>

<script type="text/javascript">
     $(document).ready(function(){

        $('.tooltipped').tooltip();
        $('.modal').modal();

        var ultimo=localStorage.getItem("ultimo");

        $.get("auxgridvehiculos");

       // alert(ultimo);


        $("#guardavehiculo").submit(function(){

              var datos=$(this).serialize()+"&_token="+token;

              $("#guardad").css("display","");

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
                Swal.fire('Escanea el c??digo QR con la app gps Tracker');

            }else{
            location.href="planes?id="+id;
            
            }


        }



        function pagargratis(id){

            if($("#"+id).val()==""){
                Swal.fire('Escanea el c??digo QR con la app gps Tracker');

            }else{

                //actualizamos veh??culo a estatus 5 que es pagar despues de la membrec??a

                
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
                      title: 'El Dispositivo ser?? eliminado, al eliminarlo se perder?? tu licencia pero mantendremos tu hist??rico, realmente deseas eliminarlo?',
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

        function editar(id){

       
               $.post("consultavehi",{id:id,_token:token},

                   function(data){
                    console.log(data);



                    $("#alias").val(data[0].alias_vehiculo);
                    $("#conductor").val(data[0].conductor);
                    $("#telefono").val(data[0].telefono);
                    $("#marca").val(data[0].marca);
                    $("#placas").val(data[0].placas);

                    

                    

                    
                                   

                },'json');

        

        }


        function cancelarSub(id){

                    $("#"+id).css("display","");

                   Swal.fire({
                      title: 'Desea cancelar la subscripci??n para este Dispositivo ?',
                      showDenyButton: false,
                      showCancelButton: true,
                      confirmButtonText: 'Si, la quiero cancelar',
                      denyButtonText: `Don't save`,
                    }).then((result) => {
                     
                      if (result.isConfirmed) {
                        
                        //location.reload();
                         $.get("cancelarSubscripcion.php",{id:id},

                                   function(data){

                                    $("#"+id).css("display","none");

                                     Swal.fire({
                                      title: 'La subscripci??n caducar?? el d??a '+data.expira,
                                      showDenyButton: false,
                                      showCancelButton:false,
                                      confirmButtonText: 'De acuerdo',
                                      denyButtonText: `Don't save`,
                                    }).then((result) => {
                                     
                                      if (result.isConfirmed) {
                                        
                                        location.reload();

                                      } 
                                      
                                    });


                                   // Swal.fire('La subscripci??n caducar?? el d??a '+data.expira);






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
    .red {
    background-color: #00bcd4 !important;
}

  body{

         background-image: url('img/fondo-login.png');
    }
</style>

<div id="main" >
      <div class="row">

         <!-- Modal Structure -->
           <div id="modal1" class="modal" style="z-index: 2000; position: absolute;">
             <div class="modal-content">
               <h6>Nuevo dispositivo</h6><br>

            <div class="row">
                    <form class="col s12" name="guardavehiculo" id="guardavehiculo">


                      <div class="row">
                        <div class="input-field col s12 m2 l6">
                          <i class="material-icons prefix">android</i>
                           <select name="tipovehiculo" id="tipovehiculo" required style="font-size:18px;">
                                 <option value="" disabled selected>Selecciona Tipo</option>
                                 <option value="adulto.png">Adulto</option>
                                 <option value="ni??o.png">Ni??o</option>
                                 <option value="auto.png">Auto</option>
                                 <option value="moto.png">Motocicleta</option>
                                
                                
                                 
                               </select>
                               <label style="font-size:18px;">Dispositivo</label>
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
                          <input  id="conductor" name="conductor" type="text" class="validate" placeholder="Ju??n P??rez" required style="font-size:18px;">
                          <label for="icon_prefix" style="font-size:18px;">Nombre de familiar</label>
                        </div>

                        <div class="input-field input-field col s12 m2 l6">
                          <i class="material-icons prefix">phone</i>
                          <input id="telefono" name="telefono" type="number" class="validate" placeholder="Opcional" style="font-size:18px;">
                          <label for="icon_telephone" style="font-size:18px;">Tel??fono</label>
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
                                 <option value="" disabled selected>Metros...</option>
                                 <?php
                                   for($i = 100; $i < 10100; $i+=100){

                                        

                                        echo "<option value='$i'>$i</option>";
                                    }

                                 ?>
                                 
                               </select>
                               <label style="font-size:18px;">Geocerca</label>
                        </div>
                      </div>



                    
            </div>
             

             </div>
             <div class="modal-footer">
               
               <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>

               <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                    <i class="material-icons right">send</i>

                     <div class="preloader-wrapper big active" style="width:20px;height: 20px;display:none;" id="guardad">
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
             </form>
           </div>

        <div class="fixed-action-btn" >
           <a class="btn-floating btn-large red modal-trigger" href="#modal1" style="margin-bottom: 5px !important;">
             <i class="large material-icons">add</i>
           </a>
           <!--ul>
             <li><a class="btn-floating" style="background-color: #66E209;"><iconify-icon icon="mdi:whatsapp" style='font-size: 40px';></iconify-icon></a></li>
             <li><a class="btn-floating  darken-1" style="background-color: #09A0E2;"><iconify-icon icon="fa-brands:facebook-messenger" style='font-size: 40px';></iconify-icon></a></li>
            
           </ul-->
         </div>

        <center><h6 style="color:#000;font-size: 18px;">Mis dispositivos</h6></center>

        @if(count($datos)==0)

              <div class="col s12 m2 l12 animate fadeRight">
                 <!-- Total Transaction -->
                
                   
                       <center>

                         <a class="waves-effect waves-light btn modal-trigger" href="#modal1" style="border-radius: 15px;height: 60px;width: 100%;font-size: 18px;padding: 10px;">Agrega tus dispositivos <i class="large material-icons">add</i></a><br><br>

                         <!--img src="img/autov.gif" width="30"-->

                   

                    </center>
                      
                   

                 
              </div>




        @endif


       @foreach($datos as $valor)


             <div class="col s12 m2 l6 animate fadeRight">
                 <!-- Total Transaction -->

                 <div class="card">
                    <div class="card-content">
                       <!--center><h6 style="color:#000 !important;">{{ $valor['alias_vehiculo'] }}</h6></center-->

                      <div class="card-title" >Dispositivo:</b> {{ $valor['alias_vehiculo'] }}</div>
                      <center>
                      <div class="title m-b-md" >
                              {!!QrCode::size(170)->color(69, 187,194)->generate($valor['email'].'-'.$valor['id']) !!}
                             </div>
                             <span style="color:#45bbc2;">Escanea el c??digo con la app localiza mi nave</span><br
                             >

              <a href="https://play.google.com/store/apps/details?id=family.tracker.my&hl=es_MX"> <img src="img/play.png" width="30%" style="margin-top: 10px;"></a>

             </center>

               

                       <table class="highlight">

                        <tr><td class="colorcolum">Id</td> <td>{{ $valor['id'] }}</td></tr>
                        
                        <tr><td class="colorcolum">Nombre</td> <td>{{ $valor['conductor'] }}</td></tr>
                        <tr><td class="colorcolum">Geocerca</td> <td>{{ $valor['geocerca'] }} Km</td></tr>
                        <tr><td class="colorcolum">Identificador</td> <td>
                            @if ($valor['id_imei_android']=='') 

                        <!--i class="material-icons prefix right tooltipped" style="cursor: pointer;" data-position="top" data-tooltip="Guardar"  onclick="guardar({{ $valor['id'] }}, $('#'+{{ $valor['id'] }}).val())">save</i-->


                        <input id="{{ $valor['id'] }}" name="{{ $valor['id'] }}" class='identidad' type="text" class="validate"  value=""  disabled>
                        
                       
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

                        @if ($valor['estatus']==2 && $valor['activo']=='active') 

                         <span class="badge blue lighten-5 blue-text text-accent-2 btn" style="width:100%;height: 40px;padding: 9px;">Licencia activa</span>

                         @endif

                         @if ($valor['estatus']==5 ) 

                         <span class="badge blue lighten-5 blue-text text-accent-2 btn" style="width:100%;height: auto;padding: 9px;">Licencia Gratuita 1 mes<br>Expira el d??a {{ $valor['Fecha_termino'] }}</span>

                         @endif

                        
                        </td></tr>
                        <script type="text/javascript">
                           var subs="{{ $valor['subscripcion'] }}";
                           var alias="{{ $valor['alias_vehiculo'] }}";
                        </script>
                         @if ($valor['estatus']==2) 
                        <tr>
                            <td class="colorcolum">Subscripci??n</td>
                            <td>
                                <span class="badge pink lighten-5 pink-text text-accent-2 btn"  onclick='cancelarSub("{{ $valor["subscripcion"] }}");' style="width:100%;height: 40px;padding: 9px;">

                                 @if ($valor['Fecha_termino']!='' && $valor['Fecha_termino']!='0000-00-00') 
                                    Expira el d??a {{ $valor['Fecha_termino'] }}
                                 @else
                                 Cancelar Subscripci??n

                                 @endif
                                



                                    <div class="preloader-wrapper big active" style="width:20px;height: 20px;display: none;" id="{{ $valor['subscripcion'] }}">
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

                            </span>


                                
                            </td>

                        </tr>
                        @endif

                        

                        <tr><td class="colorcolum">Acciones</td>  <td class="center-align">

                        <a href="#" ><i class="material-icons pink-text" style="font-size:30px !important;"  onclick="eliminar({{ $valor['id'] }})">clear</i></a>
                        <a class='modal-trigger' href="#modal1" ><i class="material-icons yellow-text" style="font-size:30px !important;"  onclick="editar({{ $valor['id'] }})">edit</i></a>

                        </td></tr>


                       </table>
                  
                    </div>
                 </div>
              </div>

             @endforeach



</div>
</div>


 


@endsection


