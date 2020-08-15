@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-page-title">
    <h5>Detail Product</h5>
  </div><!-- sl-page-title -->

  <div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">Product : {{ $product->product_name }}</h6>
    <p class="mg-b-20 mg-sm-b-30">This page is detail of product.</p>

    <div class="form-layout">
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Name:</label>
            <p class="text-dark font-weight-bold">{{ $product->product_name }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Code:</label>
            <p class="text-dark font-weight-bold">{{ $product->product_code }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Quantity:</label>
            <p class="text-dark font-weight-bold">{{ $product->product_qty }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Size:</label>
            <p class="text-dark font-weight-bold">{{ $product->product_size }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Color:</label>
            <p class="text-dark font-weight-bold">{{ $product->product_color }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Price:</label>
            <p class="text-dark font-weight-bold">$ {{ $product->normal_price }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Category:</label>
            <p class="text-dark font-weight-bold">{{ $product->category->category_name }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Sub Category:</label>
            <p class="text-dark font-weight-bold">{{ $product->subcategory->subcategory_name }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Product Brand:</label>
            <p class="text-dark font-weight-bold">{{ $product->brand->brand_name }}</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Product Description:</label>
            <div class="text-dark font-weight-bold">
                {!!$product->product_description !!}
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Video Link:</label>
            <p class="text-dark font-weight-bold">{{ $product->video_link ?? 'NULL'}}</p>
          </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Image One (Main Thumbnail): </label><br>
              <img src="{{ asset('public/media/products/' . $product->image_one) }}" alt="img-thumbnail" height="100px" width="100px">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Image Two: </label><br>
              <img src="{{ asset('public/media/products/' . $product->image_two) }}" alt="img-two" height="100px" width="100px">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Image Three: </label><br>
              <img src="{{ asset('public/media/products/' . $product->image_three) }}" alt="img-three" height="100px" width="100px">
            </div>
          </div>
      </div><!-- row -->
      <hr>
      <div class="form-layout-footer">
        <div class="row mg-t-25 mg-b-25">
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="ckbox">
                  <input type="checkbox" name="main_slider" value="1" @if($product->main_slider == 1) checked @endif disabled>
                  <span>Main Slider</span>
                </label>
              </div>
              <div class="form-group mg-b-10-force">
                <label class="ckbox">
                  <input type="checkbox" name="hot_deal" value="1" @if($product->hot_deal == 1) checked @endif disabled>
                  <span>Hot Deal</span>
                </label>
              </div>
            </div>
            <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
                <label class="ckbox">
                  <input type="checkbox" name="best_rated" value="1" @if($product->hot_deal == 1) checked @endif disabled>
                  <span>Best Rated</span>
                </label>
              </div>
              <div class="form-group mg-b-10-force">
                <label class="ckbox">
                  <input type="checkbox" name="mid_slider" value="1" @if($product->mid_slider == 1) checked @endif disabled>
                  <span>Mid Slider</span>
                </label>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="ckbox">
                  <input type="checkbox" name="hot_new" value="1" @if($product->hot_new == 1) checked @endif disabled>
                  <span>Hot New</span>
                </label>
              </div>
              <div class="form-group mg-b-10-force">
                <label class="ckbox">
                  <input type="checkbox" name="trend" value="1" @if($product->trend == 1) checked @endif disabled>
                  <span>Trend</span>
                </label>
              </div>
            </div>
          </div>
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
  </div>
@endsection
