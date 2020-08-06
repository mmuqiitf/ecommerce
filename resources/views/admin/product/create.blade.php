@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-page-title">
    <h5>Create Product</h5>
  </div><!-- sl-page-title -->

  <div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Top Label Layout</h6>
    <p class="mg-b-20 mg-sm-b-30">A form with a label on top of each form control.</p>

    <div class="form-layout">
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="product_name">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="product_code">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="product_qty">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose category"
                name="category_id" id="select_cat">
                    <option label="Choose category"></option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
                <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose subcategory" name="subcategory_id" id="select_subcat">
                    
                </select>
            </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose brand" name="brand_id">
                    <option label="Choose brand"></option>
                    @foreach ($brands as $brand)
                      <option value="{{$brand->id}}">{{ $brand->brand_name }}</option>
                    @endforeach
                </select>
            </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="product_size" data-role="tagsinput">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="product_color" data-role="tagsinput">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Normal Price: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="normal_price">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
            <input type="text" id="summernote" name="product_description">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Video Link: </label>
            <input class="form-control" type="text" name="video_link">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Image One (Main Thumbnail): <span class="tx-danger">*</span></label>
            <label class="custom-file">
                <input type="file" name="image_one" class="custom-file-input" onchange="readURL(this, 'one')">
                <span class="custom-file-control"></span>
            </label>
          </div>
          <img src="" id="one" class="img-fluid">
        </div>
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
            <label class="custom-file">
                <input type="file" name="image_two" class="custom-file-input" onchange="readURL(this, 'two')">
                <span class="custom-file-control"></span>
            </label>
          </div>
          <img src="" id="two" class="img-fluid">
        </div>
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
            <label class="custom-file">
                <input type="file" name="image_three" class="custom-file-input" onchange="readURL(this, 'three')">
                <span class="custom-file-control"></span>
            </label>
          </div>
          <img src="" id="three" class="img-fluid">
        </div>
      </div><!-- row -->
      <hr>
      <div class="row mg-t-25 mg-b-25">
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="ckbox">
              <input type="checkbox" name="main_slider">
              <span>Main Slider</span>
            </label>
          </div>
          <div class="form-group mg-b-10-force">
            <label class="ckbox">
              <input type="checkbox" name="hot_deal">
              <span>Hot Deal</span>
            </label>
          </div>
        </div>
        <div class="col-lg-4">
        <div class="form-group mg-b-10-force">
            <label class="ckbox">
              <input type="checkbox" name="best_rated">
              <span>Best Rated</span>
            </label>
          </div>
          <div class="form-group mg-b-10-force">
            <label class="ckbox">
              <input type="checkbox" name="mid_slider">
              <span>Mid Slider</span>
            </label>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="ckbox">
              <input type="checkbox" name="hot_new">
              <span>Hot New</span>
            </label>
          </div>
          <div class="form-group mg-b-10-force">
            <label class="ckbox">
              <input type="checkbox" name="trend">
              <span>Trend</span>
            </label>
          </div>
        </div>
      </div>
      <div class="form-layout-footer">
        <button class="btn btn-info mg-r-5">Create Product</button>
        <button class="btn btn-secondary">Cancel</button>
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
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