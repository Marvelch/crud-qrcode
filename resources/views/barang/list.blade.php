@extends('layouts.tamplate')

@section('content')

<div class="col-12 gy-5">
    <div class="position-relative m-4 pb-4">
        <div class="progress" style="height: 1px;">
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
        <button type="button"
            class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill"
            style="width: 2rem; height:2rem;">1</button>
        <button type="button"
            class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill"
            style="width: 2rem; height:2rem;">2</button>
        <button type="button"
            class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-primary rounded-pill"
            style="width: 2rem; height:2rem;">3</button>
    </div>
    <div class="card">
        <div class="card-body small m-3">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Bercode</th>
                            <th>Nama</th>
                            <th>Jenis Barang</th>
                            <th>Jumlah Minimum</th>
                            <th>Jumlah Order</th>
                            <th>Satuan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($items as $item)
                            <td>{{$item->kode_brg}}</td>
                            <td>{{$item->kode_barcode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jenis->nama}}</td>
                            <td>{{$item->jum_min}}</td>
                            <td>{{$item->jum_order}}</td>
                            <td>{{$item->satuan}}</td>
                            <th>
                                <form action="{{URL('/barang/'.$item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="" class="btn btn-primary btn-sm"><i class="ri-delete-bin-7-fill"></i></button>
                                </form>
                                <a href=""><i class="ri-file-edit-fill"></i></a></th>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="form-group">
                <button class="btn-primary btn-sm" title="Export To Excel"><i class="ri-file-excel-2-line"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
