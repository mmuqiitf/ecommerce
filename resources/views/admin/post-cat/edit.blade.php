@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-page-title">
    <h5>Post Category Table</h5>
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
    <h6 class="card-body-title">Post Category Edit
    </h6>
    
    <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table.</p>

    <div class="table-wrapper">
      <form action="{{ route('admin.post-cat.update', $post_cat->id) }}" method="POST">
          @csrf
          @method('PUT')
        <div class="form-group">
            <label for="">Category Name English</label>
            <input type="text" name="category_name_en" class="form-control" value="{{$post_cat->category_name_en}}">
        </div>
        <div class="form-group">
            <label for="">Category Name INdonesia</label>
            <input type="text" name="category_name_id" class="form-control" value="{{$post_cat->category_name_id}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{ route('admin.post-cat') }}" class="btn btn-secondary">Back</a>
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