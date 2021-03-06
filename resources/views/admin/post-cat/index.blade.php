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
    <h6 class="card-body-title">Post Category List
      <a href="" class="btn btn-sm btn-primary ml-3" data-toggle="modal" data-target="#modalcat">Add New</a>

    </h6>
    
    <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table.</p>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-15p">ID</th>
            <th class="wd-15p">Category Name English</th>
            <th class="wd-15p">Category Name Indonesia</th>
            <th class="wd-20p">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($post_cat as $key => $cat)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $cat->category_name_en }}</td>
            <td>{{ $cat->category_name_id }}</td>
            <td>
              <a href="{{ route('admin.post-cat.edit',$cat->id) }}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{ route('admin.post-cat.destroy', $cat->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!-- table-wrapper -->
  </div><!-- card -->

  <div id="modalcat" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Post Category</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.post-cat.store') }}" method="POST">
        <div class="modal-body pd-20">
          @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Category Name English</label>
              <input type="text" name="category_name_en" class="form-control" placeholder="Category Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Category Name Indonesia</label>
              <input type="text" name="category_name_id" class="form-control" placeholder="Category Name">
            </div>
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Submit</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div><!-- modal-dialog -->
  </div>
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