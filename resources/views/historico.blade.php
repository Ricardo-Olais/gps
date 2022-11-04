@extends('layouts.app')

@section('content')

 <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

<script type="text/javascript">
     $(document).ready(function(){

        $('.tooltipped').tooltip();
        $('.modal').modal();


        $("#guardavehiculo").submit(function(){

              var datos=$(this).serialize()+"&_token="+token;

            $.post("guardavehiculo",datos,

                function(data){

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
    th {
   
    text-align: center !important;
  
   }
</style>

<div id="main" >
      <div class="row">
         <center><h6><b>Histórico {{ $datos[0]['alias_vehiculo'] }}</b></h6></center>
             <div class="card">
                <div class="card-content">
                <table>
                    <thead style="background-color:#00bcd4;color:#fff;padding: 15px;height: 40px;">
                      <tr>
                          
                          <th>Ubicación</th>
                          <th>Fecha</th>
                          <th></th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($datos as $valor)
                   
                      <tr>
                       
                        <td>{{ $valor['direccion'] }}</td>
                        <td>{{ $valor['fecha'] }}</td>

                        <td><a href="https://maps.google.com/?q={{ $valor['long'] }},{{ $valor['lat'] }}" > Ver <i class="material-icons">gps_fixed</i></a></td>
                      </tr>
              @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
</div>


 


@endsection


