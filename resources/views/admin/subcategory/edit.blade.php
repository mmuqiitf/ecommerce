@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-page-title">
    <h5>Sub Category Table</h5>
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
    <h6 class="card-body-title">Sub Category Edit
    </h6>
    
    <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table.</p>

    <div class="table-wrapper">
      <form action="{{ url('admin/update/subcategory/'. $subcategory->id) }}" method="POST">
          @csrf
          @method('PUT')
        <div class="form-group">
            <label for="">Sub Category Name</label>
            <input type="text" name="subcategory_name" class="form-control" value="{{$subcategory->subcategory_name}}">
        </div>
        <div class="form-group">
            <label for="">Category Name</label>
            <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" @if($category->id == $subcategory->category_id) selected @endif>{{$category->category_name}}</option>    
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{ route('categories') }}" class="btn btn-secondary">Back</a>
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