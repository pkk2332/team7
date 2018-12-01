@extends('layouts.adminmaster')

@section("title")
<title>Admin Panel</title>

@endsection

@section('content')
@include('admin.header')
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            
            {!! $dataTable->table() !!}


            

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




<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https:
//cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.js"></script>

  {!! $dataTable->scripts() !!}
  <script>


    $(function() {
    
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
                    url: "{{ route('admin.userdata') }}",
                      type: "get", //send it through get method
                      data: { 
                        id:row.data().user_id
                      },
                      success: function(response) {
                        data1=response['data'];
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
       

      var string1='<table cellpadding="5" cellspacing="0" border = "0"  style = "padding-left:50px;">';
      var string2='<tr><td>Name: </td> <td>'+d.name+'</td></tr>';
      var string3='<tr><td>Name: </td> <td>'+d.email+'</td></tr>';
      var string4='</table>';
      return string1+string2+string3+string4;


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