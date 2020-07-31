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
    <h6 class="card-body-title">Sub Category List
      <a href="" class="btn btn-sm btn-primary ml-3" data-toggle="modal" data-target="#modalsub">Add New</a>

    </h6>
    
    <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table.</p>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-15p">ID</th>
            <th class="wd-15p">Sub Category Name</th>
            <th class="wd-15p">Category Name</th>
            <th class="wd-20p">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($subcategories as $key => $sub)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $sub->subcategory_name }}</td>
            <td>{{ $sub->category->category_name }}</td>
            <td>
              <a href="{{ route('subcategory.edit',$sub->id) }}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{ route('subcategory.destroy', $sub->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!-- table-wrapper -->
  </div><!-- card -->

  <div id="modalsub" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Sub Category</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('subcategory.store') }}" method="POST">
        <div class="modal-body pd-20">
          @csrf
            <div class="form-group">
              <label for="">Sub Category Name</label>
              <input type="text" name="subcategory_name" class="form-control" placeholder="Category Name">
            </div>
            <div class="form-group">
              <label for="">Category Name</label>
              <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{$category->category_name}}</option>    
                  @endforeach
              </select>
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