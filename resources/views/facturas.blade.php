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

        background-color: #000;
    }

    
</style>








<div id="main" >
      <div class="row">

         <center>
            <h6 style="color:#00bcd4;font-size: 18px;">Mis Subscripciónes</h6>
         

        </center>

        @foreach($datos as $valor)
            <div class="col s12 m2 l6 animate fadeRight">
                 <!-- Total Transaction -->

                 <div class="card">
                    <div class="card-content">
                      

                      <div class="card-title" >Dispositivo:</b> {{ $valor['alias'] }}</div>
                      <center>

                    <table class="highlight">
                      <tr>
                        <td class="colorcolum">Id</td>
                        <td>{{ $valor['id_vehiculo'] }}</td>

                    </tr>
                     <tr>
                        <td class="colorcolum">Conductor</td>
                        <td>{{ $valor['conductor'] }}</td>

                    </tr>

                      <tr>
                        <td class="colorcolum">Estatus</td>
                        <td>{{ $valor['estatus'] }}</td>

                     </tr>
                     <tr>
                        <td class="colorcolum">Subscripción</td>
                        <td>{{ $valor['subscripcion'] }}</td>
                        
                      </tr>

                     <tr>
                     <td></td>
                     <td>

                        <a  class="badge blue lighten-5 blue-text text-accent-2 btn" href="facturas.php?id={{ $valor['subscripcion'] }}" style="width:100%;" onclick='cargar("{{ $valor["subscripcion"] }}");'>Ver Factura
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

                        </a>


                    </td>
                    </tr>

                  </table>
                    

                      </center>
                    </div>
                </div>
            </div>
         @endforeach



      
</div>
</div>


 


@endsection


