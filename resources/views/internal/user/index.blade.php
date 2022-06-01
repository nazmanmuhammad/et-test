@extends('layouts.master')
@section('content')
	

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin-template/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" style="height: 50px;">

                    <p>{{ $message }}</p>
                </div>
               @endif
               @if ($message = Session::get('warning'))
                <div class="alert alert-danger" style="height: 50px;">

                    <p>{{ $message }}</p>
                </div>
               @endif
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Add User</a>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php $i=1; ?>
                  	@foreach( $data_users as $users )
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email}}</td>
                    <td><a href="{{ route('user.edit',[$users->id]) }}" class="btn btn-warning btn-sm">Edit</a>&nbsp;
					<form action="{{ route('user.destroy',[$users->id])}}" method="post">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<button type="text" onclick="return confirm('Apakah anda yakin ingin menghapus data {{$users->name}}')" class="btn btn-danger btn-sm">Delete</button>
					</form></td>
                  </tr>
                  	@endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- jQuery -->
<script src="{{asset('admin-template/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin-template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('admin-template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin-template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin-template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-template/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin-template/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stop