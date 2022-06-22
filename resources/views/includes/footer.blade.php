 
 <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            
                        </div>
                    </div>
                </footer>



          
        <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css' rel='stylesheet'/>

 <!-- 
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 
  <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

  
  
<link href='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.12/plugins/codesample/css/prism.min.css' rel='stylesheet'/>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
        
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      
<script src="{{ asset('js/home.js')}}"></script>
<script src="{{ asset('js/datatables-simple-demo.js')}}"></script>
<script src="{{ asset('js/scripts.js')}}"></script>
<script src="{{ asset('js/home_subscription.js')}}"></script>

<script>
  

  var searchParams =(window.location.href)
var search_p=(searchParams.split("/"))[3];
console.log(search_p)
$(".sb-sidenav-menu-nested").each(function(){
   $(this).find("a").each(function(){
     $(this).removeClass("active")
    });
});
$(".sb-sidenav-menu-nested").each(function(){
  $(this).find("a").each(function(){
    var href=$(this).attr("href")
    console.log(href+"-"+search_p)
  
  if(search_p==href){
    $(this).addClass("active")
    $(this).parent().parent().addClass("show")
  }
  })
})
</script>

 @yield('scripts')
