@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-page-title">
    <h5>Edit Product</h5>
  </div><!-- sl-page-title -->

  <div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Products Form</h6>
    <p class="mg-b-20 mg-sm-b-30">Fill in each of the following forms correctly</p>
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-layout">
        <div class="row mg-b-25">
          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="product_name" value="{{ old('product_name') ?? $product->product_name }}">
              @error('product_name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div><!-- col-4 -->
          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="product_code" value="{{ old('product_code') ?? $product->product_code}}">
              @error('product_code')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div><!-- col-4 -->
          <div class="col-md-4">
            <div class="form-group">
              <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="product_qty" value="{{ old('product_qty') ?? $product->product_qty }}">
              @error('product_qty')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose category"
                  name="category_id" id="select_cat">
                      <option label="Choose category"></option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($product->category->id == $category->id) selected @endif>{{ $category->category_name }}</option>
                      @endforeach
                  </select>
                  @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose subcategory" name="subcategory_id" id="select_subcat">
                      
                  </select>
                  @error('subcategory_id')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose brand" name="brand_id">
                      <option label="Choose brand"></option>
                      @foreach ($brands as $brand)
                        <option value="{{$brand->id}}" @if($product->brand->id == $brand->id) selected @endif>{{ $brand->brand_name }}</option>
                      @endforeach
                  </select>
                  @error('brand_id')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
          </div><!-- col-4 -->
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="product_size" data-role="tagsinput" value="{{ old('product_size') ?? $product->product_size }}">
              @error('product_size')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="product_color" data-role="tagsinput" value="{{ old('product_color') ?? $product->product_color }}">
              @error('product_color')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Normal Price: <span class="tx-danger">*</span></label>
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control" name="normal_price" value="{{ old('normal_price') ?? $product->normal_price }}">
              </div>
              @error('normal_price')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
              <textarea class="form-control" id="summernote" name="product_description">{{ old('product_description') ?? $product->product_description  }}</textarea>
              @error('product_description')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Video Link: </label>
              <input class="form-control" type="text" name="video_link" value="{{ old('video_link') ?? $product->video_link  }}">
              @error('video_link')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div><!-- row -->
        <hr>
        <div class="row mg-t-25 mg-b-25">
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="ckbox">
                <input type="checkbox" name="main_slider" value="1" @if($product->main_slider == 1) checked @endif>
                <span>Main Slider</span>
              </label>
              @error('main_slider')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group mg-b-10-force">
              <label class="ckbox">
                <input type="checkbox" name="hot_deal" value="1" @if($product->hot_deal == 1) checked @endif>
                <span>Hot Deal</span>
              </label>
              @error('hot_deal')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
              <label class="ckbox">
                <input type="checkbox" name="best_rated" value="1" @if($product->best_rated == 1) checked @endif>
                <span>Best Rated</span>
              </label>
              @error('best_rated')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group mg-b-10-force">
              <label class="ckbox">
                <input type="checkbox" name="mid_slider" value="1" @if($product->mid_slider == 1) checked @endif>
                <span>Mid Slider</span>
              </label>
              @error('mid_slider')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="ckbox">
                <input type="checkbox" name="hot_new" value="1" @if($product->hot_new == 1) checked @endif>
                <span>Hot New</span>
              </label>
              @error('hot_new')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group mg-b-10-force">
              <label class="ckbox">
                <input type="checkbox" name="trend" value="1" @if($product->trend == 1) checked @endif>
                <span>Trend</span>
              </label>
              @error('trend')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-layout-footer">
          <button class="btn btn-info mg-r-5" type="submit">Edit Product</button>
          <button class="btn btn-secondary">Cancel</button>
        </div><!-- form-layout-footer -->
      </div><!-- form-layout -->
    </form>
  </div>
  <div class="card pd-20 pd-sm-40 mt-2">
    
    <form action="{{ route('admin.product.update.photo', $product->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-layout">
        <div class="row mg-b-25">
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Image One (Main Thumbnail): <span class="tx-danger">*</span></label>
              <label class="custom-file">
                  <input type="file" name="image_one" class="custom-file-input" accept="image/png, image/jpeg, image/jpg" onchange="readURL(this, 'one')">
                  <span class="custom-file-control"></span>
              </label>
              @error('image_one')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <img src="{{ asset('public/media/products/' . $product->image_one) ?? '' }}" id="one" class="img-fluid">
          </div>
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
              <label class="custom-file">
                  <input type="file" name="image_two" class="custom-file-input" accept="image/png, image/jpeg, image/jpg" onchange="readURL(this, 'two')">
                  <span class="custom-file-control"></span>
              </label>
              @error('image_two')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <img src="{{ asset('public/media/products/' . $product->image_two) ?? '' }}" id="two" class="img-fluid">
          </div>
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
              <label class="custom-file">
                  <input type="file" name="image_three" class="custom-file-input" accept="image/png, image/jpeg, image/jpg" onchange="readURL(this, 'three')">
                  <span class="custom-file-control"></span>
              </label>
              @error('image_three')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <img src="{{ asset('public/media/products/' . $product->image_three) ?? '' }}" id="three" class="img-fluid">
          </div>
        </div>
        <div class="form-layout-footer">
          <button class="btn btn-info mg-r-5" type="submit">Edit Product Image</button>
          <button class="btn btn-secondary">Cancel</button>
        </div>
      </div>
  </form>
    
  </div>
@endsection

@push('scripts')
<script>
    $('#summernote').summernote({
      height: 200,
      tooltip: false
    })
</script>
<script>
  $('#select_cat').on('change',function(){
    var category_id = $(this).val();
    if (category_id) {
      $.ajax({
        url: "{{ url('/get/subcategory/') }}/"+category_id,
        type:"GET",
        dataType:"json",
        success: function(data) { 
          var d = $('#select_subcat').empty();
          $.each(data, function(key, value){
            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
          });
        },
      });
    }else{
      $('#select_subcat').empty();
    }
  });
</script>
<script type="text/javascript">
function readURL(input, id){
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#'+id)
      .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush