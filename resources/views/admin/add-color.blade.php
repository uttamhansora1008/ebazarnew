@include('admin.head')
@include('admin.sidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Color</h4>
                        <form action="{{ url('add-color')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Color Name</label>
                                <input type="text" name="color" class=" @error('color') is-invalid @enderror form-control">
                                @error('color')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Color code</label>
                                <input type="text" name="color_code" class=" @error('color_code') is-invalid @enderror form-control">
                                @error('color_code')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save Color</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
</div>
