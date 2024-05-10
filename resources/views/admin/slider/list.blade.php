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
                  <h1>List Slider</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{url('admin/slider/add')}}" class="btn btn-primary">Add New Slider</a>
                </div>
              </div>
            </div>
          </section>
      
          <section class="content">
            <div class="container-fluid">
              <div class="row">
            
                <div class="col-md-12">
                    @include('admin.layouts.messages')

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Slider List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th >Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Button Name</th>
                            <th>Button Link</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($getRecord as $value)
                          <tr>
                            <td>{{($value->id)}}</td>
                            <td>
                              @if (!empty($value->getImage()))
                                <img src="{{ $value->getImage() }}" style="height: 100px" >
                               @endif
                            </td>
                            <td>{{$value->title}}</td>
                            <td>{{($value->button_name)}}</td>
                            <td>{{($value->button_link)}}</td>
                            <td>{{($value->status == 0) ? 'active' : 'Inactive'}}</td>
                            <td>{{ date('d-m-y', strtotime($value->created_at))}}</td>
                            <td>
                              <a href="{{url('admin/slider/edite/'.$value->id)}}" class="btn btn-primary">Edite</a>
                              <a href="{{url('admin/slider/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
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
          </section>
        </div>
</div>
 @endsection
@section('script')
<script ></script>

@endsection
