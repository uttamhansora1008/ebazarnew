@include('admin.head')
@include('admin.sidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Cupon</h4>
                        <form action="{{ url('update-cupon/'.$cupon->id)}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                            <label for="">Cupon Name</label>
                            <input type="text" name="cupon_name"  value="{{$cupon->cupon_name}}"class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Min Price</label>
                            <input type="text" name="min_price"  value="{{$cupon->min_price}}"class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Percentage</label>
                            <input type="text" name="percentage"  value="{{$cupon->percentage}}"class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Expire Date</label>
                            <input type="text" name="expire_date"  value="{{$cupon->expire_date}}"class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description"  value="{{$cupon->description}}"class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Cupon</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
</div>
