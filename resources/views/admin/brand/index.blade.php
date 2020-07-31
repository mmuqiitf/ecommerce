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
    <h6 class="card-body-title">Brand List
      <a href="" class="btn btn-sm btn-primary ml-3" data-toggle="modal" data-target="#modalbrand">Add New</a>

    </h6>
    
    <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table.</p>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-15p">ID</th>
            <th class="wd-15p">Brand name</th>
            <th class="wd-15p">Brand logo</th>
            <th class="wd-20p">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($brands as $key => $brand)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $brand->brand_name }}</td>
            <td>
                <img src="{{ URL::to($brand->brand_logo)}}" alt="logo" width="70px" height="70px">
            </td>
            <td>
              <a href="{{ route('brands.edit',$brand->id) }}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{ route('brands.destroy', $brand->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!-- table-wrapper -->
  </div><!-- card -->

  <div id="modalbrand" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Brand</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body pd-20">
          @csrf
            <div class="form-group" >
              <label for="">Brand Name</label>
              <input type="text" name="brand_name" class="form-control" placeholder="Brand Name">
            </div>
            <div class="form-group">
              <label for="">Brand Logo</label>
              <input type="file" name="brand_logo" class="form-control" placeholder="Brand Logo">
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