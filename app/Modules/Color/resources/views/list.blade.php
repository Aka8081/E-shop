<!DOCTYPE html>

<html>

<head>

    <title>AdminLTE 3 | Dashboard</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <div class="content-wrapper">

            <div class="d-flex justify-content-center m-5 pb-5">
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">List Colors</h3>
          </div>
          <div>
      <a class="btn btn-danger float-right" href="{{ url('trash') }}" role="button">Trash<i class="far fa-trash-alt"></i></a>
     <a class="btn btn-success float-right" href="{{ url('Addcolor') }}" role="button">Add
             <i class="fas fa-plus-circle"></i></i></a></div>
          </div>

        <table id="myTable" class="table table-bordered">

            <thead>

               <tr>

                  <th>ID</th>

                  <th>UserId</th>
                  <th>ColorName</th>

                  <th>Status</th>
                  <th>Action</th>

               </tr>

            </thead>

            <tbody>
               @foreach($colors as $col)
                  <tr>
                     <td>{{ $col->id }}</td>
                     <td>{{ $col->userid }}</td>
                     <td>{{ $col->color_name }}</td>
                     <td>
                        <input data-id="{{$col->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $col->status ? 'checked' : '' }}>
                     </td>
                     <td>

                        <a href="{{ url('edit',$col->id) }}" class=""><i class="fas fa-pencil-alt"></i></a>&nbsp;
                        <a href="javascript:void(0);" onclick="delete_Question({{$col->id}})"><i class="fas fa-trash-alt"></i></a>
                      </td>
                  </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

</body>

<script>

  $(function() {

    $('.toggle-class').change(function() {

        var status = $(this).prop('checked') == true ? 'Y' : 'N';

        var id = $(this).data('id');



        $.ajax({

            type: "GET",

            dataType: "json",

            url: '/changeStatus',

            data: {'status': status, 'id': id},

            success: function(data){
             console.log(data.success)

            }

        });

    })

  })
</script>



{{-- delete _ Status --}}
<script>

function delete_Question(id){

    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {

    jQuery.ajax({
            url:"{{ url('completedUpdate/') }}",
            type:'POST',
            data:{
                _token: "{{ csrf_token() }}",
                        _method: "PUT",
                'id':id},
            success:function(result){
                    if(result == "success"){
                        Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
                    }
            }
        });
  }
})
}

</script>



<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );

    $(document).ready(function(){

    $('.toggle-btn').click(function() {
    $(this).toggleClass('active').siblings().removeClass('active');
    });

    });
    </script>

</html>
