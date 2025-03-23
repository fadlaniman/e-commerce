@extends('index')

@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>
    <p class="mb-4">Here is the list of available products. You can add, edit, or delete products as needed. Use the table below to easily manage product data.</p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center  justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Of Products</h6>
            <a class="btn btn-sm btn-primary">Add Product</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sku</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products)
                        @foreach ($products as $index => $product)
                        <tr>
                            <td>{{$index+=1}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{'Rp ' . number_format($product->price , 0, ',', '.') }}</td>
                            <td>
                                <button type="button" id="button" class="btn" data-toggle="modal" data-target="#modal-default{{ $product->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" id="button" class="btn" data-toggle="modal" data-target="#modal-delete{{ $product->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($products as $index => $product)
    <!-- Modals -->
    <x-modals.delete id="{{ $product->id }}">Are u sure want to delete " {{ $product->name }} " ?</x-modals.delete>
    @endforeach

</div>
<!-- /.container-fluid -->
@endsection