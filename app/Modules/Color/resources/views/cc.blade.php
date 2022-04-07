
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">
    @include('header')
    @include('sidebar')
    <div class="wrapper">

        <div class="content-wrapper">

            <div class="d-flex justify-content-center m-5 pb-5">
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">List Colors</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            &nbsp; &nbsp;&nbsp; &nbsp; <a class="btn btn-danger float-right" href="#" role="button">Trash<i class="far fa-trash-alt"></i></a>&nbsp; &nbsp;
            &nbsp; &nbsp; <a class="btn btn-success float-right" href="{{ url('Addcolor') }}" role="button">Add
             <i class="fas fa-plus-circle">&nbsp; &nbsp;&nbsp; &nbsp;</i></a>&nbsp; &nbsp; &nbsp;
          </div>
          <!-- /.card-header -->
            <table id="myTable" class="display">
                <thead>
                    <tr>

                        <th> id </th>
                        <th>userid</th>
                        <th>Color Name</th>
                        <th>Status</th>

                        <th>action</th>
                        {{-- <th>Created Date</th>
                        <th> Updated Date</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $col)
                    <tr>
                            <td>{{$col->id}}</td>
                            <td>{{$col->userid}}</td>
                            <td>{{$col->name}}</td>
                            <td>
                                <input data-id="{{$col->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $col->status ? 'checked' : '' }}>

                        </td>


                            {{-- <td class="text-center">
                                <div class="toggle-btn">
                                    <div class="inner-circle"></div>
                                </div>


                            </td> --}}
                            {{-- <td class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" >
                                <label class="custom-control-label" for="customSwitches"></label>


                            </td> --}}
                            {{-- <td>{{$col->created_at}}</td>
                            <td>{{$col->updated_at}}</td> --}}
                            <td>

                                <a href="" class=""><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                <a href="" class=""><i class="fas fa-trash-alt"></i></a>
                            </td>



                    </tr>
                    @endforeach
                </tbody>
            </table>
       

          </div>
        </div>
    </div>
</div>
</div>
@include('js')
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

        url: '/changesStatus',

        data: {'status': status, 'id': id},

        success: function(data){
         console.log(data.success)

        }

    });

})

})
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
