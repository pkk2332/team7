@extends("layouts.adminmaster")

@section("title")

<title>Admin Panel</title>

@endsection

@section("content")

@include('admin.header')
<!-- partial -->


<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            @include('session')
            {!! $dataTable->table() !!}

{{--             <div class="table-responsive">
              <table class="table table-bordered" id="products">
                <thead>
                  <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                    <th></th>
                  </tr>
                </thead>
              </table>
            </div> --}}
            

          </div>
        </div>
      </div>

    </div>
  </div>
  
  <div class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <img src='' style="width: 100%;height: 100%;" />
      </div>
    </div>

  </div>

  @include('admin.footer')
  <!-- page-body-wrapper ends -->
</div>

@push('scripts')
{{-- <script id="details-template" type="text/x-handlebars-template">
    <table class="table">
        <tr>
            <td>Full name:</td>
            <td>@{{name}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>@{{email}}</td>
        </tr>
        <tr>
            <td>Extra info:</td>
            <td>And any further details here (images etc)...</td>
        </tr>
    </table>
  </script> --}}


<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https:
//cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.js"></script>

  {!! $dataTable->scripts() !!}
  <script>


    $(function() {
    // var template = Handlebars.compile($("#details-template").html());

    // var table=$('#products').DataTable({
    //   processing: true,
    //   serverSide: true,
    //   responsive: true,
      // ajax: '{{ route('admin.data') }}',
    //   columns: [
    //   {
    //     "className":      'details-control',
    //     "orderable":      false,
    //     "searchable":     false,
    //     "data":           null,
    //     "defaultContent": ''
    //   },

    //   {data: 'id',name: 'id'},
    //   {data: 'name', name: 'name'},
    //   {data: 'description', name: 'description'},
    //   {data: 'created_at',name:'created_at'},
    //   {data: 'updated_at',name:'updated_at'},
    //   { data: 'edit', name: 'edit' },
    //   { data: 'delete', name: 'delete' }
    //   ],



    //   order: [[1, 'asc']],

    // });
    $('#dataTableBuilder_wrapper tbody').on('click', 'td.details-control', function () {
var oTable = $('#dataTableBuilder').DataTable();
      var tr = $(this).closest('tr');
      var row = oTable  .row(tr);
      console.log(row.child.isShown());
      if ( row.child.isShown() ) {
                  // This row is already open - close it
                  row.child.hide();
                  tr.removeClass('shown');
                }
                else {


                  $.ajax({
                    url: "{{ route('admin.data1') }}",
                      type: "get", //send it through get method
                      data: { 
                        id:row.data().id
                      },
                      success: function(response) {
                        data1=response['data']['image'];
                        row.child(format(data1)).show();
                        tr.addClass('shown');
                      },
                      error: function(xhr) {
                        //Do Something to handle error
                      }
                    });

                }

              });
    
    function format(d){
       $(document).ready(function(){
    $('.popupimage').click(function(event){
        event.preventDefault();
        $('.modal img').attr('src',$(this).attr('href'));
        $('.modal').modal('show'); 
    });
  });
      var string1='<table cellpadding="5" cellspacing="0" border = "0"  style = "padding-left:50px;"><tr><td>Images:</td>';
      var string3='';
      var arraylength=d.length;
      for (var i = 0; i < arraylength; i++) {

        string3+=`<a class="popupimage" href="/storage/${d[i].id}/${d[i].file_name}"><img class="img-fluid img-thumbnail" style="width:100px;height:100px;" src="/storage/${d[i].id}/${d[i].file_name}"></a>
        `
      }

      var string4='<td>'+string3+'</td></tr></table>';
      return string1+string4;
    }    

    // Add event listener for opening and closing details
    
    // $('#products-table').DataTable({
    //   processing: true,
    //   serverSide: true,
    //   ajax: '',
    //   columns: [
    //   { data: 'id', name: 'id' },
    //   { data: 'name', name: 'name' },
    //   { data: 'description', name: 'description' },
    //   { data: 'created_at', name: 'created_at' },
    //   { data: 'updated_at', name: 'updated_at' }
    //   ]
    // });
  }); 



    
</script>

@endpush

@section("script")
<script>
  $(document).ready(function() {
    $('#product_categories').select2(); 
  });
</script>

@endsection