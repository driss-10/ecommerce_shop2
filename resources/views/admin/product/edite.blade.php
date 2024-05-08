@extends('admin.layouts.app')
@section('style')
    
@endsection
@section('content')



        <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1>EditProduct</h1>
                        </div>
                        
                    </div>
                    </div>
                </section>
                <section class="content">
                    <div class="container-fluid">
                    <div class="row"> 
                        <div class="col-md-12">
                            @include('admin.layouts.messages')

                            <div class="card card-primary">
                            <form action="" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Title<span style="color:red">*</span></label>
                                            <input type="text" class="form-control"  name="title" required value="{{old('title',$product->title)}}"  placeholder="Enter Category">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label >Sku<span style="color:red">*</span></label>
                                                <input type="text" class="form-control"  name="sku"  value="{{old('sku',$product->sku)}}"  placeholder="Enter sku">
                                        </div>
                                    </div>

                                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label >Category<span style="color:red">*</span></label><br>
                                                    <select class="from-control" required  id="changecategory" name="category_id" >
                                                        <option value="">Select</option>
                                                        @foreach ($getCategory as $category)
                                                        <option {{($product->category_id == $category->id) ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>                                        
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <label >SubCategory<span style="color:red">*</span></label><br>
                                                    <select class="from-control" required  id="getSubCategory" name="sub_category_id" >
                                                        <option value="">Select</option>
                                                        @foreach ($getSubCategory as $subcategory)
                                                            <option {{($product->sub_category_id == $subcategory->id) ? 'selected' : ''}} value="{{$subcategory->id}}">
                                                            {{$subcategory->name}}</option>
                                                        @endforeach 
                                                    </select>                                        
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <label >Brand<span style="color:red">*</span></label><br>
                                                <select required class="from-control" name="brand_id" >
                                                    <option value="">Select</option>
                                                    @foreach ($getBrand as $brand)
                                                    <option {{($product->brand_id == $brand->id) ? 'selected' : '' }}  value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>                                        
                                         </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                               <label >Color<span style="color:red">*</span></label>
                                               @foreach ($getColor as $color)
                                                    @php
                                                        $checked = '';
                                                    @endphp
                                                    @foreach ($product->getColor as $pcolor)
                                                        @if ($pcolor->color_id == $color->id) 
                                                            @php
                                                                $checked = 'checked';
                                                            @endphp
                                                        @endif     
                                                    @endforeach
                                                    <div>
                                                        <label><input {{$checked}} type="checkbox"  name="color_id[]" value="{{$color->id}}">{{$color->name}}</label>
                                                    </div>
                                                @endforeach
         
                                        </div>    
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Size<span style="color:red">*</span></label>
                                           <div>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Price ($)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="AppendSize">
                                                        @php
                                                            $i_s = 1;
                                                        @endphp
                                                        @foreach ($product->getSize as $size)
                                                            <tr id="DeleteSize{{$i_s}}">
                                                            <td>
                                                                <input value="{{$size->name}}" type="text"  name="size[{{$i_s}}][name]" placeholder="Name">
                                                            </td>
                                                            <td>
                                                                <input value="{{$size->price}}" type="text" name="size[{{$i_s}}][price]" placeholder="Price">
                                                            </td>
                                                            <td>
                                                                <button type="button" id="{{$i_s}}" class="btn btn-danger btn-sm DeleteSize">delete</button>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $i_s++;
                                                        @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="size[100][name]" placeholder="Name">
                                                            </td>
                                                            <td>
                                                                <input  type="text" name="size[100][price]" placeholder="Price">
                                                            </td>
                                                            <td>
                                                                <button   style="width: 55px" type="button" name="" class="btn btn-primary btn-sm AddSize">Add</button>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                                
                                            
                                            
                                           </div> 
                                            
                                        </div>
                                    </div>
                                </div>
                                </hr>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Price ($)<span style="color:red">*</span></label>
                                            <input type="text" class="form-control"  name="price" required value="{{$product->price}}"  placeholder="Enter price">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Old Price ($)<span style="color:red">*</span></label>
                                            <input type="text" class="form-control"  name="old_price" required value="{{$product->old_price}}"  placeholder="Enter old price">
                                        </div>
                                    </div>
                                

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Image<span style="color:red">*</span></label><br>
                                            <input type="file" name="image[]" class="form-control" style="padding:  5px;" multiple accept="image/*">    
                                        </div>    
                                    </div>
                                </div>
                                @if(!empty($product->getImage->count()))
                                    
                                    <div class="row">
                                        @foreach ($product->getImage as $image)
                                            @if (!empty($image->getLogo()))
                                                <div class="col-md-2">
                                                    <img style="width: 100%; height:100px;" src="{{ $image->getLogo() }}">
                                                    <a href="{{url('admin/product/image_delete/'.$image->id)}}" style="margin-top: 10px; margin-left:30px;" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Description<span style="color:red">*</span></label><br>
                                            <textarea name="description" class="form-control editor" cols="143" rows="3" placeholder="Description">
                                                {{$product->description}}

                                            </textarea>
                                        </div>    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Additional information<span style="color:red">*</span></label><br>
                                            <textarea name="additional_information" class="form-control editor" cols="143" rows="3" placeholder="additional information">
                                                {{$product->additional_information}}
                                            </textarea>
                                        </div>    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >shipping returns<span style="color:red">*</span></label><br>
                                            <textarea name="shipping_returns" class="form-control editor" cols="143" rows="3" placeholder="shipping returns">
                                                {{$product->shipping_returns}}

                                            </textarea>
                                        </div>    
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label >status<span style="color:red">*</span></label>
                                        <select class="form-control" name="status">
                                        <option {{($product->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                        <option {{($product->status== 1) ? 'selected' : ''}} value="1">Inactive</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">update</button>
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

<script type="text/javascript" >

var i = 101; 
$('body').delegate('.AddSize','click',function(){ 
    var html =' <tr id="DeleteSize'+i+'">\n\
                    <td>\n\
                        <input type="text" name="size['+i+'][name]" placeholder="Name" form="class-control">\n\
                    </td>\n\
                    <td>\n\
                        <input type="text" name="size['+i+'][price]" placeholder="Price" form="class-control">\n\
                    </td>\n\
                    <td>\n\
                        <button type="button" id="'+i+'" class="btn btn-danger btn-sm DeleteSize">delete</button>\n\
                    </td>\n\
                </tr>';
    i++;          
    $('#AppendSize').append(html);
});

$('body').delegate('.DeleteSize','click',function(){
    var id=$(this).attr('id');
    $('#DeleteSize'+id).remove();
})
$('body').delegate('#changecategory','change',function(e){
    var id = $(this).val();
    $.ajax({
        type :"POST",
        url :"{{ url('admin/get_sub_category') }}",  
        data : {
          "id" : id,
           "_token":" {{ csrf_token() }}"
         },
        dataType : "json",
        success: function(data) { 
            $('#getSubCategory').html(data.html);
        },
        error: function(data) {
            console.log("Error:", data);
        }
    });
});
</script>
@endsection
