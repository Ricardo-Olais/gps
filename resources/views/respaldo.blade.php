@extends('layouts.app')

@section('content')

 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

<script type="text/javascript">
     $(document).ready(function(){

        $('.tooltipped').tooltip();


         
  });

      function guardar(id,android){
           // alert("actualizar "+id+ "con "+android);

            $.post("actualizanumero",{id:id,android:android,_token:token},

                function(data){

                    if(data.rows.valida="true"){

                        location.reload();
                    }

                },'json');

                
        }

        function pagar(id){

            alert("pagar "+id);
        }
      
  </script>
        }

<style type="text/css">
    td, th {
        padding: 0px 0px !important;
    }
</style>

<div id="main" >
      <div class="row">

        <div class="fixed-action-btn">
           <a class="btn-floating btn-large red">
             <i class="large material-icons">sms</i>
           </a>
           <ul>
             <li><a class="btn-floating" style="background-color: #66E209;"><iconify-icon icon="mdi:whatsapp" style='font-size: 40px';></iconify-icon></a></li>
             <li><a class="btn-floating  darken-1" style="background-color: #09A0E2;"><iconify-icon icon="fa-brands:facebook-messenger" style='font-size: 40px';></iconify-icon></a></li>
             <!--li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
             <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li-->
           </ul>
         </div>


        <div class="content-wrapper-before blue-grey lighten-5"></div>
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!-- Current balance & total transactions cards-->
   <div class="row vertical-modern-dashboard">

        <div class="col s12 m6 l12">
         <div class="card animate fadeRight" style="padding:15px;">
            <div class="card-content pb-1">

             @foreach($datos as $valor)

             <div class="col s12 m2 l6 animate fadeRight">
                 <!-- Total Transaction -->
                 <div class="card">
                    <div class="card-content">
                       <!--center><h6 style="color:#000 !important;">{{ $valor['alias_vehiculo'] }}</h6></center-->

                      

                       <table class="highlight">

                        <tr><td></td>Dispositivo: {{ $valor['alias_vehiculo'] }}<td>
                            
                             <div class="title m-b-md">
                              {!!QrCode::size(150)->color(255, 0, 0, 25)->generate('eerrerererer') !!}
                             </div>
                        </td></tr>
                        <tr><td>Id</td> <td>{{ $valor['id'] }}</td></tr>
                        
                        <tr><td>Conductor</td> <td>{{ $valor['conductor'] }}</td></tr>
                        <tr><td>Geocerca</td> <td>{{ $valor['geocerca'] }} Km</td></tr>
                        <tr><td>Identificador</td> <td>
                            @if ($valor['id_imei_android']=='') 
                        <i class="material-icons prefix right tooltipped" style="cursor: pointer;" data-position="top" data-tooltip="Guardar"  onclick="guardar({{ $valor['id'] }}, $('#'+{{ $valor['id'] }}).val())">save</i>


                        <input id="{{ $valor['id'] }}" name="{{ $valor['id'] }}" class='identidad' type="text" class="validate" autofocus value="" placeholder="Ingresa Identificador">
                        
                       
                        @else

                        <input id="last_name" type="text" class="validate" value="{{ $valor['id_imei_android'] }}">

                    @endif
                        </td></tr>

                        <tr><td>Estatus</td> <td>
                              @if ($valor['estatus']==0) 


                        <span class="badge pink lighten-5 pink-text text-accent-2 btn" onclick="pagar({{ $valor['id'] }})">Pagar Licencia</span>

                          @else

                         <span class="badge blue lighten-5 blue-text text-accent-2 btn">Licencia activa</span>

                        @endif
                        </td></tr>

                        <tr><td>Acciones</td>  <td class="center-align">

                        <a href="#"><i class="material-icons pink-text">clear</i></a>
                        <a href="#"><i class="material-icons yellow-text">edit</i></a>

                        </td></tr>


                       </table>
                  
                    </div>
                 </div>
              </div>

             @endforeach
                      
            <!--table class=" responsive-table highlight">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Alias</th>
                     <th>Conductor</th>
                     <th>Geocerca</th>
                     <th>Identificador</th>
                     <th>Estatus</th>
                     <th>Acciones</th>
                  </tr>
               </thead>
               <tbody>
                 @foreach($datos as $valor)

                 <tr>
                     <td>{{ $valor['id'] }}</td>
                     <td>{{ $valor['alias_vehiculo'] }}</td>
                     <td>{{ $valor['conductor'] }}</td>
                     <td>{{ $valor['geocerca'] }} Km</td>
                     <td>
                      @if ($valor['id_imei_android']=='') 
                        <i class="material-icons prefix right tooltipped" style="cursor: pointer;" data-position="top" data-tooltip="Guardar"  onclick="guardar({{ $valor['id'] }}, $('#'+{{ $valor['id'] }}).val())">save</i>


                        <input id="{{ $valor['id'] }}" name="{{ $valor['id'] }}" class='identidad' type="text" class="validate" autofocus value="" placeholder="Ingresa Identificador">
                        
                       
                        @else

                        <input id="last_name" type="text" class="validate" value="{{ $valor['id_imei_android'] }}">

                    @endif

                    </td>
                     <td>
                        @if ($valor['estatus']==0) 


                        <span class="badge pink lighten-5 pink-text text-accent-2 btn" onclick="pagar({{ $valor['id'] }})">Pagar Licencia</span>

                          @else

                         <span class="badge blue lighten-5 blue-text text-accent-2 btn">Licencia activa</span>

                        @endif


                    </td>
                     <td class="center-align">

                        <a href="#"><i class="material-icons pink-text">clear</i></a>
                        <a href="#"><i class="material-icons yellow-text">edit</i></a>

                    </td>
                  </tr>

                            
                          
                       

                       @endforeach



             
               </tbody>
            </table-->


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


