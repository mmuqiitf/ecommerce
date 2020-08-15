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
            <th class="wd-15p">Product Code</th>
            <th class="wd-15p">Product Name</th>
            <th class="wd-15p">Image</th>
            <th class="wd-15p">Category</th>
            <th class="wd-15p">Brand</th>
            <th class="wd-15p">Qty</th>
            <th class="wd-15p">Status</th>
            <th class="wd-20p">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <td>{{ $product->product_code }}</td>
            <td>{{ $product->product_name }}</td>
            <td> <img src="{{ asset('public/media/products/' . $product->image_one)  }}" alt="img_thumbnail" width="80px" height="80px"> </td>
            <td>{{ $product->category->category_name }}</td>
            <td>{{ $product->brand->brand_name }}</td>
            <td>{{ $product->product_qty }}</td>
            <td>
              @if ($product->status == 1)
                <span class="badge badge-success">Active</span>
                @else
                <span class="badge badge-danger">Inactive</span>
              @endif
            </td>
            <td>
              <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
              <a href="{{ route('admin.product.destroy', $product->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
              <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-sm btn-info" ><i class="fa fa-eye"></i></a>
              @if ($product->status == 1)
                <a href="{{ route('admin.product.inactive', $product->id) }}" class="btn btn-sm btn-warning" title="Inactive?"><i class="fa fa-angle-down"></i></a>
              
              @else
                <a href="{{ route('admin.product.active', $product->id) }}" class="btn btn-sm btn-success" title="Active?"><i class="fa fa-angle-up"></i></a>
                  
              @endif
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
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
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