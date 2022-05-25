<div class="p2">
    <div class="form-group">
        <input type="text" name="rt" placeholder="RT" id="rt" class="form-control" value="{{ $data->rt }}"><br>
        <input type="text" name="rw" placeholder="RW" id="rw" class="form-control" value="{{ $data->rw }}"><br>
        <select class="select id-{{ $provinsi->id }}" id="provinsi" name="provinsi" required>
            <option class="hidden" selected value="{{ $provinsi->seller_id }}">
                {{ $provinsi->name }}
            </option>

            @foreach ($provinsi as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach

        </select>

        <select class="select id-{{ $kota->id }}" id="kota" name="kota" required>
            <option class="hidden" selected value="{{ $kota->id }}">
                {{ $kota->name }}
            </option>

            @foreach ($kota as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach

        </select>

        <select class="select id-{{ $kecamatan->id }}" id="kecamatan" name="kecamatan" required>
            <option class="hidden" selected value="{{ $kecamatan->id }}">
                {{ $kecamatan->name }}
            </option>

            @foreach ($kecamatan as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        <select class="select id-{{ $desa->id }}" id="desa" name="desa" required>
            <option class="hidden" selected value="{{ $desa->id }}">
                {{ $desa->name }}
            </option>

            @foreach ($desa as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        <input type="text" name="kode_pos" placeholder="Kode Pos" id="kode_pos" class="form-control"
            value="{{ $data->kode_pos }}"><br>

        <input type="text" name="alamat_lengkap" placeholder="Alamat Lengkap" id="alamat_lengkap" class="form-control"
            value="{{ $data->alamat_lengkap }}"><br>



        <div class="form-group mt-2">
            <button class="btn btn-success" onclick="edit({{ $data->id }})">Update</button>
        </div>
    </div>
</div>
