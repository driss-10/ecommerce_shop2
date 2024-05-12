@extends('admin.layouts.app')
@section('style')
    
@endsection
@section('content')



        <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1>Add New Admin</h1>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <a href="{{url('admin/admin/add')}}" class="btn btn-primary">Admin List</a>
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
                                    <input type="text" class="form-control" required name="name"  value="{{old('name')}}" id="exampleInputEmail1" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label >email</label>
                                    <input type="email" class="form-control" required  name="email" value="{{old('name')}}" id="exampleInputEmail1" placeholder="Enter Email">
                                    <div style="color:red">{{$errors->first('email')}}</div>
                                </div>
                                <div class="form-group">
                                    <label >Password</label>
                                    <input type="password" class="form-control" required name="password"  placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label >status</label>
                                    <select class="form-control" required name="status">
                                    <option {{(old('status') == 0)}} value="0">Active</option>
                                    <option {{(old('status') == 1)}} value="1">Inactive</option>
                                    </select>
                                </div>
                                </div>    
                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
