@extends('admin.layouts.app')
@section('style')
    
@endsection
@section('content')



        <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1>Edit Sub Category</h1>
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
                                            <label >Category Name<span style="color:red">*</span></label>
                                            <select  class="form-control" name="category_id">
                                            <option value="">select</option>
                                                @foreach ($getCategory as $value)
                                                    <option {{($value->id == $getRecord->category_id) ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                <div class="form-group">
                                    <label >SubCategory Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control"  name="name"  value="{{old('name',$getRecord->name)}}"  placeholder="Enter Subcategory ">
                                </div>
                                

                                <div class="form-group">
                                    <label >Slug<span style="color:red">*</span></label>
                                    <input type="text" class="form-control"  name="slug"  value="{{old('slug',$getRecord->slug)}}"  placeholder="Enter Slug Ex. URL">
                                    <div style="color:red">{{$errors->first('slug')}}</div>

                                </div>

                                <div class="form-group">
                                    <label >statuts<span style="color:red">*</span></label>
                                    <select class="form-control" name="status">
                                    <option {{(old('status' , $getRecord->status) == 0) ? 'selected' : '' }} value="0" >Active</option>
                                    <option {{(old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                                    </select>
                                </div>
                                <hr>
                                    <div class="form-group">
                                        <label >Meta title</label>
                                        <input type="text" class="form-control"  name="meta_title"  value="{{old('meta_title',$getRecord->meta_title)}}" 
                                         placeholder="Meta title" >
                                    </div>


                                    <div class="form-group">
                                        <label >Meta Keywords </label>
                                        <input type="text" class="form-control"  name="meta_title"  value="{{old('meta_title',$getRecord->meta_title)}}" 
                                        placeholder="Meta_title" >
                                    </div>


                                </hr>
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
