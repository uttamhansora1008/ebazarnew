@include('admin.head')
@include('admin.sidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Cupons</h4>
                        <form action="{{ url('add-cupon')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Cupon Name</label>
                                <input type="text" name="cupon_name" class=" @error('cupon_name') is-invalid @enderror form-control">
                                @error('cupon_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Min Price</label>
                                <input type="text" name="min_price" class=" @error('min_price') is-invalid @enderror form-control">
                                @error('min_price')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Percentage</label>
                                <input type="text" name="percentage" class=" @error('percentage') is-invalid @enderror form-control">
                                @error('percentage')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Expire Date</label>
                                <input type="text" name="expire_date" class=" @error('expire_date') is-invalid @enderror form-control">
                                @error('expire_date')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Description</label>
                                <input type="text" name="description" class=" @error('description') is-invalid @enderror form-control">
                                @error('description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
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