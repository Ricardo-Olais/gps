@extends('layouts.app')

@section('content')

<script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.carousel').carousel();


     var instance = M.Carousel.init({
    fullWidth: true
  });

  // Or with jQuery

  $('.carousel.carousel-slider').carousel({
    fullWidth: true
  });

  $('.carousel').carousel({
    padding: 200    
});
autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 6000);
}




  });
</script>

<style type="text/css">
   .img-responsive {
    max-width: 100%;
    height: auto;
    object-fit: cover;
}
</style>

<div id="main" >
      <div class="row">
        <div class="content-wrapper-before blue-grey lighten-5"></div>
        <div class="col s12">
          <div class="container">
            <div class="section">
   <!-- Current balance & total transactions cards-->
   <div class="row vertical-modern-dashboard">


   <div class="carousel carousel-slider center">
    <div class="carousel-fixed-item center">
      <a class="btn waves-effect" style="color:#fff !important;">Comienza ahora</a>
    </div>
    <div class="carousel-item red white-text" href="#one!" style="background-image:url('img/fondo1.jpg');background-repeat: no-repeat;background-size: cover;">
      <h2>titulo1</h2>
      <p class="white-text">lorem dwnddndnwdnjwdnwdnjwdwjd</p>
    </div>
    <div class="carousel-item amber white-text" href="#two!" style="background-image:url('img/fondo6.jpg');background-repeat: no-repeat;background-size: cover;">
      <h2>titulo2</h2>
      <p class="white-text">This is your second panel</p>
    </div>
    <div class="carousel-item green white-text" href="#three!" style="background-image:url('img/fondo8.jpg');background-repeat: no-repeat;background-size: cover;">
      <h2>titulo3</h2>
      <p class="white-text">This is your third panel</p>
    </div>
    <div class="carousel-item blue white-text" href="#four!" style="background-image:url('img/fondo7.jpg');background-repeat: no-repeat;background-size: cover;">
      <h2>titulo4</h2>
      <p class="white-text">This is your fourth panel</p>
    </div>
  </div>


<div class="col s12 m2 l6 animate fadeRight" style="color:#000;">

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.




</div>

<div class="col s12 m2 l6 animate fadeRight" style="color:#000;">

Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.




</div>



  <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">Test</h4>
              
              
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.


            </div>
         </div>
      </div>


      <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">Test</h4>
              
              
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.


            </div>
         </div>
      </div>

          <div class="col s12 m2 l6 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">Test</h4>
              
              
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.


            </div>
         </div>
      </div>


      <div class="col s12 m6 l8">
         <div class="card subscriber-list-card animate fadeRight">
            <div class="card-content pb-1">
               <h4 class="card-title mb-0">Subscriber List <i class="material-icons float-right">more_vert</i></h4>
            </div>
            <table class="subscription-table responsive-table highlight">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Company</th>
                     <th>Start Date</th>
                     <th>Status</th>
                     <th>Amount</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Michael Austin</td>
                     <td>ABC Fintech LTD.</td>
                     <td>Jan 1,2019</td>
                     <td><span class="badge pink lighten-5 pink-text text-accent-2">Close</span></td>
                     <td>$ 1000.00</td>
                     <td class="center-align"><a href="#"><i class="material-icons pink-text">clear</i></a></td>
                  </tr>
                  <tr>
                     <td>Aldin Rakić</td>
                     <td>ACME Pvt LTD.</td>
                     <td>Jan 10,2019</td>
                     <td><span class="badge green lighten-5 green-text text-accent-4">Open</span></td>
                     <td>$ 3000.00</td>
                     <td class="center-align"><a href="#"><i class="material-icons pink-text">clear</i></a></td>
                  </tr>
                  <tr>
                     <td>İris Yılmaz</td>
                     <td>Collboy Tech LTD.</td>
                     <td>Jan 12,2019</td>
                     <td><span class="badge green lighten-5 green-text text-accent-4">Open</span></td>
                     <td>$ 2000.00</td>
                     <td class="center-align"><a href="#"><i class="material-icons pink-text">clear</i></a></td>
                  </tr>
                  <tr>
                     <td>Lidia Livescu</td>
                     <td>My Fintech LTD.</td>
                     <td>Jan 14,2019</td>
                     <td><span class="badge pink lighten-5 pink-text text-accent-2">Close</span></td>
                     <td>$ 1100.00</td>
                     <td class="center-align"><a href="#"><i class="material-icons pink-text">clear</i></a></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>



       <div class="col s12 m2 l12 animate fadeRight">
         <!-- Total Transaction -->
         <div class="card">
            <div class="card-content">
               <h4 class="card-title mb-0">Test</h4>
              
              
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.


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


