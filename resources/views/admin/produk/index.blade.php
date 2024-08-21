@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
          <h1 class="text-center" style="font-family:courier new; font-style: initial;">Produk Srikandi Semanggi</h1>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-end">
                    <div class="alert alert-success col-lg-4" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <h4 class="card-title">Data produk</h4>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end" style="padding-right: 30px">
                            <a class="btn btn-primary" style="margin-right: 5px; border-radius: 5px; background-color: rgb(11, 136, 156); padding: 12px 27px 12px 27px" href="/dash-buatproduk"><span style="font-size: 20px; color:rgb(245, 230, 17)">+</span> Tambahkan Produk</a>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah Produk : {{ $all->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">

                            <thead class="text-center">
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama produk </th>
                                    <th> Kategori produk</th>
                                    <th> Harga </th>
                                    <th> Stok Produk </th>
                                    <th> Minimal pembelian </th>
                                    <th> Laku terjual </th>
                                    <th> Status produk </th>
                                    <th> Aksi </th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @if ($produk->count() == 0)

                            </tbody>
                        </table>
                                <div class="text-center mt-3">
                                    <strong style="color: #6C7293; font-family:courier new">Belum ada produk yang terdaftar</strong>
                                </div>
                                @else

                                    @foreach ($produk as $prog)
                                    <tr>
                                        <td>
                                            <strong>
                                                {{ $produk->firstItem() + $loop->index  }}
                                            </strong>
                                        </td>
                                        <td>
                                            <span class="pl-2">{{ ucwords($prog->nama) }}</span>
                                        </td>
                                        <td> {{ ucwords($prog->kategori->nama)  }} </td>
                                        <td> Rp {{ number_format($prog->harga, 2, ',','.') }} </td>
                                        <td>
                                            {{ $prog->stok }} {{ $prog->quantity }}
                                            <button type="button" title="Edit stok produk" style="background: none;" class="mdi mdi-pencil text-primary" data-bs-toggle="modal"
                                            data-bs-target="#{{ $prog->id }}"></button>

                                            <div class="modal fade" id="{{ $prog->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content"
                                                        style="background-color: #191C24; color:white; border-radius: 1rem; width: 1150px;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-1" id="exampleModalLabel">{{ ucwords($prog->nama) }}</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="nama mb-3">
                                                                Ubah jumlah stok produk!
                                                            </div>
                                                            <form action="/dash-updatestok" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $prog->id }}">
                                                            <input type="number" style="width: 50%" class="form-control" name="stok" value="{{ $prog->stok }}" min="1">

                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="submit" class="btn btn-light"
                                                                    style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Simpan</button>
                                                            </form>
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal"
                                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tidak
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> {{ $prog->minim }} {{ $prog->quantity }} </td>
                                        <td> {{ $prog->terjual }} {{ $prog->quantity }} </td>
                                        <td>
                                            @if ($prog->status == 1)
                                                <div class="badge badge-outline-success" style="padding-left: 15px; padding-right: 15px">Aktif</div>
                                            @else
                                                <div class="badge badge-outline-danger" style="padding-left: 18px; padding-right: 18px">Non-Aktif</div>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" style="background-color: #6C7293;" class="btn" data-bs-toggle="modal" data-bs-target="#edit{{ $prog->id }}">Edit</button>

                                            <div class="modal fade" id="edit{{ $prog->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content"
                                                        style="background-color: #191C24; color:white; border-radius: 1rem; width: 1150px;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-1" id="exampleModalLabel">{{ ucwords($prog->nama) }}</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/dash-updateproduk" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id"value="{{ $prog->id }}">
                                                            <div class="form-group">
                                                                <label for="nama">Nama Produk</label>
                                                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                                    id="nama" name="nama" placeholder="Nama Produk" required
                                                                    value="{{ old('nama', $prog->nama) }}">
                                                                @error('nama')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="currency-field">Harga</label>
                                                                <input type="text" class="form-control @error('harga') is-invalid @enderror"
                                                                    name="harga" id="txtExampleBoxOne" onkeypress="return number(event )"
                                                                    onBlur="formatCurrency(this, 'Rp ', 'blur');" onkeyup="formatCurrency(this, 'Rp ');"
                                                                    data-inputmask="'alias': 'numeric', 'autoGroup' :true, 'digitsOptional':false, 'removeMaskOnSubmit' : true, 'autoUnmask' : true"
                                                                    placeholder="Rp 1.000.000,00" required value="Rp {{ old('harga', number_format($prog->harga, 2, ',','.')) }}">
                                                                @error('harga')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="minim">Minimal Pembelian</label>
                                                                <input type="number" class="form-control @error('minim') is-invalid @enderror"
                                                                    id="minim" name="minim" placeholder="minim Produk" required
                                                                    value="{{ old('minim', $prog->minim) }}">
                                                                @error('minim')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="quantity">Jenis Satuan Produk</label>
                                                                <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                                                    id="quantity" name="quantity" placeholder="quantity Produk" required
                                                                    value="{{ old('quantity', $prog->quantity) }}">
                                                                @error('quantity')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="berat">Berat Satuan Produk</label>
                                                                <input type="text" class="form-control @error('berat') is-invalid @enderror"
                                                                id="berat" name="berat" placeholder="berat produk"
                                                                    value="{{ old('berat', $prog->berat) }}">
                                                                @error('berat')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="deskripsi">Deskripsi Produk</label>
                                                                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi program" class="form-control @error('deskripsi') is-invalid @enderror"
                                                                value="{{ old('deskripsi', $prog->deskripsi) }}" cols="10" rows="5">{{ old('deskripsi', $prog->deskripsi) }}</textarea>
                                                                @error('deskripsi')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Gambar</label>
                                                                <input type="hidden" name="oldImage" value="{{ $prog->gambar }}">
                                                                <div class="input-group col-xs-12">
                                                                    <input type="file" name="gambar"
                                                                        class="form-control file-upload-info @error('gambar') is-invalid @enderror"
                                                                        style="background-color: #2A3038; height: 2.875rem; padding: 0.56rem 0.75rem; font-size: 0.875rem;
                                                                font-weight: 400; color: #495057; border-radius: 2px"
                                                                        placeholder="Upload Image" value="{{ old('gambar') }}">
                                                                </div>
                                                                @error('gambar')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="submit" class="btn btn-light"
                                                                    style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Simpan</button>
                                                            </form>
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal"
                                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tidak
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" style="background-color: #750800;" class="btn" data-bs-toggle="modal" data-bs-target="#hapus{{ $prog->id }}">Hapus</button>

                                            <div class="modal fade" id="hapus{{ $prog->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content"
                                                        style="background-color: #191C24; color:white; border-radius: 1rem; width: 1150px;">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-1" id="exampleModalLabel">{{ ucwords($prog->nama) }}</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/dash-deleteproduk" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $prog->id }}">
                                                            Apakah anda yakin untuk menghapus produk ini?

                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="submit" class="btn btn-light"
                                                                    style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Ya</button>
                                                            </form>
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal"
                                                                style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Tidak
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        @endif
                        <br>
                        <div class="erga d-flex justify-content-center">
                            {{ $produk->links() }}
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function formatNumber(n) {
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function formatCurrency(input, currency, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.
            // get input value
            var input_val = input.value;
            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.selectionStart;

            // check for decimal
            if (input_val.indexOf(",") >= 0) {
                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(",");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = currency + left_side + "," + right_side;
            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = currency + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ",00";
                }
            }

            // send updated string to input
            input.value = input_val;

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input.setSelectionRange(caret_pos, caret_pos);

            function number(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        }
    </script>
@endsection
