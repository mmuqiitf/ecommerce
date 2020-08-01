@extends('admin.admin_layouts')

@section('admin_content')
  <div class="sl-page-title">
    <h5>Coupon Table</h5>
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
    <h6 class="card-body-title">Coupon List
      <a href="" class="btn btn-sm btn-primary ml-3" data-toggle="modal" data-target="#modalcat">Add New</a>

    </h6>
    
    <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table.</p>

    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-15p">ID</th>
            <th class="wd-15p">Coupon Code</th>
            <th class="wd-15p">Discount (%)</th>
            <th class="wd-20p">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($coupons as $key => $coupon)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $coupon->coupon }}</td>
            <td>{{ $coupon->discount }}</td>
            <td>
              <a href="{{ route('coupon.edit',$coupon->id) }}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{ route('coupon.destroy', $coupon->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Coupon</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('coupon.store') }}" method="POST">
        <div class="modal-body pd-20">
          @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Coupon Code</label>
              <input type="text" name="coupon" class="form-control" placeholder="Coupon Code">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Discount (%)</label>
              <input type="text" name="discount" class="form-control" placeholder="Discount (%)">
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