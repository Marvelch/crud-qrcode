@extends('layouts.tamplate')

@section('content')

<div class="col-12 gy-5">
    <div class="position-relative m-4 pb-4">
        <div class="progress" style="height: 1px;">
            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
        <button type="button"
            class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill"
            style="width: 2rem; height:2rem;">1</button>
        <button type="button"
            class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill"
            style="width: 2rem; height:2rem;">2</button>
        <button type="button"
            class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill"
            style="width: 2rem; height:2rem;">3</button>
    </div>
    <div class="card">
        <div class="card-body small m-3">
            <form action="{{URL('/barang')}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <?php
                            $random = rand(1,99);
                        ?>
                        <label for="">Kode Barang</label>
                        <input type="text" name="kode_brg" class="form-control form-control-sm mb-2" value="VL-TKS-{{$random}}T" readonly>
                    </div>
                    
                    <div class="col">
                        <label for="">Kategori / Jenis</label>
                        <select name="jenis_id" id="" class="form-control form-control-sm ">
                            @foreach ($jnsbarang as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2">
                        <label for="">Nama Barang</label>
                        <input type="text" name="nama" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-3 mt-2">
                        <label for="">Kode Barcode</label>
                        <div class="input-group input-group-sm mb-3">
                            <button type="button" class="input-group-text" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" id="startButton"><i class="ri-qr-scan-fill"></i></button>
                            <input type="text" name="kode_barcode" class="form-control qrcode_result" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    {{-- Modal Camera --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close" id="resetButton"></button> --}}
                                </div>
                                {{-- Display Video --}}

                                {{-- Detail device --}}

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                                        id="resetButton">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <label for="">Satuan</label>
                        <select class="form-select form-select-sm mb-3" name="satuan" aria-label=".form-select-lg example">
                            <option selected>Pilih</option>
                            <option value="pcs">PCS</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Jumlah Min</label>
                        <input type="text" name="jum_min" class="form-control form-control-sm mb-3" required>
                    </div>
                    <div class="col-md-3">
                        <label for="">Order</label>
                        <input type="text" name="jum_order" class="form-control form-control-sm mb-3" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-2">
                        <label for="">No Rak</label>
                        <input type="text" name="rak" class="form-control form-control-sm mb-3" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-2">
                        <label for="">Rek GL</label>
                        <input type="text" class="form-control form-control-sm mb-3">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Harga</label>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text " id="inputGroup-sizing-sm">Rp</span>
                            <input type="text" class="form-control " aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Diskon Beli</label>
                        <input type="text" class="form-control form-control-sm mb-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">PPN Pembelian</label>
                        <input type="text" class="form-control form-control-sm mb-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Pemasok</label>
                        <input type="text" class="form-control form-control-sm mb-3">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Harga-1</label>
                        <input type="text" class="form-control form-control-sm mb-3mt-1">
                    </div>
                    <div class="col-md-4">
                        <label for="">Harga-2</label>
                        <input type="text" class="form-control form-control-sm mb-3 mt-1">
                    </div>
                    <div class="col-md-4">
                        <label for="">Harga-3</label>
                        <input type="text" class="form-control form-control-sm mb-3 mt-1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-1">
                        <label for="">Disc Jual</label>
                        <input type="text" class="form-control form-control-sm mb-3 mt-1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-1">
                        <label for="">PPN Jual</label>
                        <input type="text" class="form-control form-control-sm mb-3 mt-1">
                    </div>
                    <div class="row">
                        <div class="col-md-6  mt-1">
                            <label for="">Keterangan</label>
                            <textarea name="ket" id="" cols="10" rows="5"
                                class="form-control form-control-sm mb-3 mt-1"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-end mt-5">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <button class="btn btn-secondary btn-sm">Ulangi</button>
                    </div>
                </div>

                {{-- scanner --}}
            </form>
        </div>
    </div>
</div>
@endsection
