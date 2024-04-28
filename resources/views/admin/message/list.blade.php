@extends('admin.layouts.app')
@section('style')
    
@endsection
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>List Messages</h1>
                </div>
                
              </div>
            </div>
          </section>
      
          <section class="content">
            <div class="container-fluid">
              <div class="row">
            
                <div class="col-md-12">

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Message List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th >Message</th>
                          </tr>
                        </thead>
                        @foreach ($messages as $mes)
                        <tbody>
                          <tr>
                            <td>{{$mes->name}}</td>
                            <td>{{$mes->email}}</td>
                            <td>{{$mes->message}}</td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                    </div>
                    
                  </div>
                  
                </div>
              </div>

            </div>
          </section>
        </div>
</div>
 @endsection
@section('script')
<script ></script>

@endsection
