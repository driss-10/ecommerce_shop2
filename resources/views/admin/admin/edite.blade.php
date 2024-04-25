@extends('admin.layouts.app')
@section('style')
    
@endsection
@section('content')



        <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1>Edite Admin</h1>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            
                        </div>
                    </div>
                    </div>
                </section>
                <section class="content">
                    <div class="container-fluid">
                    <div class="row"> 
                        <div class="col-md-12">

                            <div class="card card-primary">
                            <form action="" method="POST">
                                {{csrf_field()}}
                                <div class="card-body">
                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" class="form-control" value=" {{$getRecord->name}}" required name="name" id="exampleInputEmail1" >
                                </div>

                                <div class="form-group">
                                    <label >email</label>
                                    <input type="email" class="form-control" value="{{$getRecord->email}}" required name="email" id="exampleInputEmail1" >
                                </div>

                                <div class="form-group">
                                    <label >Password</label>
                                    <input type="text" class="form-control"required name="password" >
                                    <stron> if you want to chang password add</stron>
                                </div>

                                <div class="form-group">
                                    <label >status</label>
                                    <select class="form-control" required name="status">
                                    <option  {{($getRecord->status == 0) ? 'selected' : '' }} value="0">Active</option>
                                    <option  {{($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                    </select>
                                </div>
                                </div>    
                                <div class="card-footer">
                                <button type="submit" class="btn btn-secondary">Update</button>
                                </div>
                            </form>
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
