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
    <h6 class="card-body-title">Coupon Edit
    </h6>
    
    <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table.</p>

    <div class="table-wrapper">
      <form action="{{ route('coupon.update', $coupon->id) }}" method="POST">
          @csrf
          @method('PUT')
        <div class="form-group">
            <label for="">Coupon Code</label>
            <input type="text" name="coupon" class="form-control" value="{{$coupon->coupon}}">
        </div>
        <div class="form-group">
            <label for="">Discount</label>
            <div class="input-group">
                <span class="input-group-addon">%</span>
                <input type="text" class="form-control" name="discount" value="{{$coupon->discount}}">
              </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{ route('admin.coupons') }}" class="btn btn-secondary">Back</a>
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