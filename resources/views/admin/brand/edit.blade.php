@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-page-title">
    <h5>Brand Table</h5>
  </div><!-- sl-page-title -->

  <div class="card pd-20 pd-sm-40">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h6 class="card-body-title">Brand Edit
    </h6>
    
    <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table.</p>

    <div class="table-wrapper">
      <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="form-group">
            <label for="">Brand Name</label>
            <input type="text" name="brand_name" class="form-control" value="{{$brand->brand_name}}">
        </div>
        <div class="form-group">
            <label for="">Brand Logo</label>
            <input type="file" name="brand_logo" class="form-control" value="{{$brand->brand_logo}}">
        </div>
        <div class="form-group">
            <label for="">Current Brand Logo</label><br>
            <img src="{{ URL::to($brand->brand_logo) }}" alt="" class="img-responsive">
            <input type="hidden" name="current_logo" class="form-control" value="{{$brand->brand_logo}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{ route('brands') }}" class="btn btn-secondary">Back</a>
        </div>
      </form>
        
    </div><!-- table-wrapper -->
  </div><!-- card -->

@endsection    
@push('scripts')
    <script>
        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
    </script>
@endpush