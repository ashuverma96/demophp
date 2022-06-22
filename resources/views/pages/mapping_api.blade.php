@extends('layouts.default_new')
@section('content')

   <div class="row" style='height:1000px'>
                    <div class="col-md-12">
                        

                            
    <h4>PDF Templates </h4>                     
<br/>
<div style="overflow: auto">
<md-content  ng-app="app" laout="column" flex ng-controller="templateController">   
    <md-table-container>
    <a href="/pages/add_template">  <button class='btn-primary' style="float:left;">Add New Template</button>
</a>
      <div style="float:right;">Search:&nbsp;<input type="text"/></div>


    <table role="grid" class='table table-striped' md-table md-row-select="options.rowSelection" ng-model="selected" md-progress="promise" >
      
    <thead md-head md-order="query.order" md-on-reorder="logOrder">
    <tr md-row>
    <th md-column><span>Template Name</span></th>
    <th md-column><span>PDF File</span></th>
    <th md-column><span>Data Source</span></th>
    <th md-column><span>Action</span></th>
    </tr>
    </thead>
    <tbody md-body>
    <tr md-row md-select="template" md-on-select="logItem" md-auto-select="options.autoSelect" ng-repeat="template in template.data |limitTo: query.limit : (query.page -1) * query.limit">
    <td md-cell><%=template.template_name%></td>
    <td md-cell><%= template.pdf_file %></td>
    <td md-cell><%= template.api_url %></td>
    <td md-cell><button value="<%=(template._id).$oid %>"  style='background:grey;color:white' class='edit_template'>Edit</button>
<button value="<%=(template._id).$oid %>" style='background:green;color:white' class='view'>Map</button>
<button value="<%=(template._id).$oid %>"  style='background:blue;color:white' class='test'>Test</button>
    </td>

    </tr>
    </tbody>
    </table>

    </md-table-container>
<md-table-pagination md-limit="query.limit" md-limit-options="[5, 10, 15]" md-page="query.page" md-total="<%= template.recordsTotal %>" md-on-paginate="logPagination" md-page-select></md-table-pagination>

    <!-- <md-table-pagination md-limit="query.limit" md-page="query.page" md-total="<%= guests.count %>" md-page-select="options.pageSelector" md-boundary-links="options.boundaryLinks" md-on-paginate="logPagination"></md-table-pagination> -->
    </md-card>
    </md-content>
</div>


                                
                          




<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            Image Coordinates
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-1-content">
        
<table class="table" border="0" id='image_tbl1'>
  <thead>
    <tr><th>Sl No</th><th>Name</th><th>Width</th><th>Height</th><th>Page#</th></tr>



  </thead>
<tbody></tbody>

</table>

<button class='btn btn-primary' id='update_co'>Update</button>
        </main>
        <footer class="modal__footer">
          
          <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
        </footer>
      </div>
    </div>
  </div>







<div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-2-title">
            PDF Form
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-2-content">
        
<div id='pdf_div'>
  
  
</div>
        </main>
        <footer class="modal__footer">
          
          <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
        </footer>
      </div>
    </div>
  </div>


                            
                        </div>
                    
                </div>
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  
  <!-- Page level custom scripts -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="https://unpkg.com/micromodal/dist/micromodal.min.js
"></script>
<link href="{{ asset('modal.css')}}" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>
    <script src="https://rawgit.com/daniel-nagy/md-data-table/master/dist/md-data-table.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('js/mapping_api.js')}}"></script>
@endsection
