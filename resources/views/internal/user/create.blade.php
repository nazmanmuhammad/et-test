@extends('layouts.master')
@section('content')
	<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('user.store') }}" method="post">
              {{csrf_field()}}
                <div class="card-body">
                	<div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Name @error('name') {{ $message }} @enderror" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email @error('email') {{ $message }} @enderror" name="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password @error('password') {{ $message}} @enderror" name="password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password Confirmation</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword2" placeholder="Password Konfirmasi @error('password_confirmation') {{ $message }} @enderror" name="password_confirmation">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add User</button>
                </div>
              </form>
            </div>
          </div>
         </div>
     </div>

@stop