<div class="p2">
    <div class="form-group">
        <input type="text" name="id_alamat" placeholder="Alamat" id="alamat" class="form-control"
            value="{{ $data->id_alamat }}"><br>
        <input type="text" name="nama" placeholder="Nama" id="nama" class="form-control"
            value="{{ $data->nama }}"><br>
        <input type="date" name="tanggal_lahir" placeholder="Tanggal lahir" id="tanggal_lahir" class="form-control"
            value="{{ $data->tanggal_lahir }}"><br>
        <input type="text" name="jenis_kelamin" placeholder="Jenis kelamin" id="jenis_kelamin" class="form-control"
            value="{{ $data->jenis_kelamin }}"><br>
        <input type="text" name="agama" placeholder="Agama" id="agama" class="form-control"
            value="{{ $data->agama }}"><br>
        <input type="text" name="id_status" placeholder="Status" id="id_status" class="form-control"
            value="{{ $data->id_status }}"><br>
        <input type="text" name="pekerjaan" placeholder="Pekerjaan" id="pekerjaan" class="form-control"
            value="{{ $data->pekerjaan }}"><br>
        <input type="text" name="kewarganegaraan" placeholder="Kewarganegaraan" id="kewarganegaraan"
            class="form-control" value="{{ $data->kewarganegaraan }}"><br>
        <div class="form-group mt-2">
            <button class="btn btn-success" onclick="edit({{ $data->id }})">Update</button>
        </div>
    </div>
</div>
