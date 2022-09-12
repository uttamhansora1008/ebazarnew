@include('admin.head')
@include('admin.sidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Color</h4>
                        <form action="{{ url('update-color/'.$color->id)}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                            <label for="">Color Name</label>
                            <input type="text" name="color"  value="{{$category->color}}"class="form-control">
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
