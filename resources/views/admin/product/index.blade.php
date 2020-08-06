@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-page-title">
    <h5>Product Table</h5>
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
    <h6 class="card-body-title">Product List
      <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary ml-3">Add New</a>
    </h6>
    
    <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table.</p>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-15p">ID</th>
            <th class="wd-15p">Product Name</th>
            <th class="wd-20p">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $key => $product)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $product->product_name }}</td>
            <td>
              <a href="{{ route('category.edit',$product->id) }}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{ route('category.destroy', $product->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
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