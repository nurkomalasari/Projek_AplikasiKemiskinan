<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table id="table" class="table">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Surveyor</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                        Nama Penduduk</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Pertanyaan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Jawaban</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Poin Jawaban</th>

                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Tanggal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Longitude</th>

                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Lattitude</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                        Action</th>



                </tr>
            </thead>
            <?php $no = 1; ?>

            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-sm">{{ $no++ }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm font-weight-bold mb-0">
                                {{ $item->surveyor->nama_lengkap }}
                            </p>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold">{{ $item->penduduk->nama }}</span>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold">{{ $item->pertanyaan->Isi_pertanyaan }}</span>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold">{{ $item->opsiJawaban->pilihan_jawaban }}</span>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold">{{ $item->opsiJawaban->poin_jawaban }}</span>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold">{{ $item->tanggal }}</span>
                        </td>


                        <td>
                            <span class="text-xs font-weight-bold">{{ $item->longitude }}</span>
                        </td>
                        <td>
                            <span class="text-xs font-weight-bold">{{ $item->latitude }}</span>
                        </td>

                        <td class="align-middle">
                            <button class="btn btn-warning" onclick="show({{ $item->id }})">Edit</button>
                            <button class="btn btn-danger" onclick="destroy({{ $item->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>




{{-- <div class="card">
    <div class="table-responsive">

        <table class="table" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Alamat</th>
                    <th>Nama</th>
                    <th>Tanggal lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Status</th>
                    <th>Pekerjaan</th>
                    <th>Kewargangeraan</th>
                    <th>Action</th>

                </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->alamat->alamat_lengkap ?? '' }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->agama }}</td>
                        <td>{{ $item->status->status_penduduk ?? '' }}</td>
                        <td>{{ $item->pekerjaan }}</td>
                        <td>{{ $item->kewarganegaran }}</td>



                        <td><button class="btn btn-warning" onclick="show({{ $item->id }})">Edit</button>
                            <button class="btn btn-danger" onclick="destroy({{ $item->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script> --}}
