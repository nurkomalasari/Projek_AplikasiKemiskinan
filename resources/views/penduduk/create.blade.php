<div class="p-2">
    <div class="form-group">
        <select class="select" id="id_alamat" name="id_alamat" required>
            <option value="">Pilih Alamat</option>

            @foreach ($alamat as $item)
                <option value="{{ $item->id }}" {{ old('id_alamat') == $item->id ? 'selected' : '' }}>
                    {{ $item->alamat_lengkap }}</option>
            @endforeach

        </select>
        {{-- <input type="text" name="id_alamat" placeholder="Alamat" id="alamat" class="form-control"><br> --}}
        <input type="text" name="nama" placeholder="Nama" id="nama" class="form-control"><br>
        <input type="date" name="tanggal_lahir" placeholder="Tanggal lahir" id="tanggal_lahir"
            class="form-control"><br>
        <input type="text" name="jenis_kelamin" placeholder="Jenis kelamin" id="jenis_kelamin"
            class="form-control"><br>
        <input type="text" name="agama" placeholder="Agama" id="agama" class="form-control"><br>
        {{-- <input type="text" name="id_status" placeholder="Status" id="id_status" class="form-control"><br> --}}
        <select class="select" id="id_status" name="id_status" required>
            <option value="">Pilih Status</option>

            @foreach ($status as $item)
                <option value="{{ $item->id }}" {{ old('id_status') == $item->id ? 'selected' : '' }}>
                    {{ $item->status_penduduk }}</option>
            @endforeach

        </select>
        <input type="text" name="pekerjaan" placeholder="Pekerjaan" id="pekerjaan" class="form-control"><br>
        <input type="text" name="kewarganegaraan" placeholder="Kewarganegaraan" id="kewarganegaraan"
            class="form-control"><br>






        <div class="form-group mt-2">
            <button class="btn btn-success" onclick="store()">Create</button>
        </div>


    </div>
</div>
