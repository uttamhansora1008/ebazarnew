@include('admin.head')
@include('admin.sidebar')

<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <h4>Cupons</h4> 
                </div>
                <div class="card-header-right" >
                <a href="add-cupon">
                    <button type="button" class="btn btn-primary mr-4  float-right">
                        Add
                    </button>
                </a>
            </div>
                    <div class="card-body ">
                    <table class="table table-bordered table-striped">
                        <thead >
                            <tr >
                                <th>Index</th>
                                <th>Cupon Name</th>
                                <th>Min Price</th>
                                <th>Percentage</th>
                                <th>Expire Date</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cupon as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->cupon_name }}</td>
                                <td>{{ $item->min_price }}</td>
                                <td>{{ $item->percentage }}</td>
                                <td>{{ $item->expire_date }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a href="{{url('edit-cupon/'.$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ url('delete-cupon/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
</div>
