@extends('layouts.main')
@section('title', 'Data Penduduk')
@section('content')

    <body>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data penduduk</h6>
                        <button class="btn btn-primary" type="button" onclick="create()">+ Tambah Data </button>
                        <div id="read" class="mt-3">

                        </div>
                    </div>


                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="p-2" id="page"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        read()
                    });



                    function read() {
                        $.get("{{ url('penduduk/read') }}", {}, function(data, status) {
                            $('#read').html(data);

                        });
                    }

                    function create() {
                        $.get("{{ url('penduduk/create') }}", {}, function(data, status) {
                            $('#page').html(data);
                            $('#exampleModalLabel').html('Tambah Penduduk');
                            $('#exampleModal').modal('show');

                        });
                    }

                    function store() {
                        var id_alamat = $("#id_alamat").val();
                        var nama = $("#nama").val();
                        var tanggal_lahir = $("#tanggal_lahir").val();
                        var jenis_kelamin = $("#jenis_kelamin").val();
                        var agama = $("#agama").val();
                        var id_status = $("#id_status").val();
                        var pekerjaan = $("#pekerjaan").val();
                        var kewarganegaraan = $("#kewarganegaraan").val();

                        $.ajax({
                            type: "get",
                            url: "{{ url('penduduk/store') }}",
                            data: {
                                id_alamat: id_alamat,
                                nama: nama,
                                tanggal_lahir: tanggal_lahir,
                                jenis_kelamin: jenis_kelamin,
                                agama: agama,
                                id_status: id_status,
                                pekerjaan: pekerjaan,
                                kewarganegaraan: kewarganegaraan,




                            },

                            success: function(data) {
                                // $("#page").html('');
                                $(".btn-close").click();
                                read()
                            }
                        });


                    }

                    function show(id) {
                        $.get("{{ url('penduduk/show') }}/" + id, {}, function(data, status) {
                            $('#page').html(data);
                            $('#exampleModalLabel').html('Edite Penduduk');
                            $('#exampleModal').modal('show');

                        });

                    }

                    function edit(id) {
                        var id_alamat = $("#id_alamat").val();
                        var nama = $("#nama").val();
                        var tanggal_lahir = $("#tanggal_lahir").val();
                        var jenis_kelamin = $("#jenis_kelamin").val();
                        var agama = $("#agama").val();
                        var id_status = $("#id_status").val();
                        var pekerjaan = $("#pekerjaan").val();
                        var kewarganegaraan = $("#kewarganegaraan").val();

                        $.ajax({
                            type: "get",
                            url: "{{ url('penduduk/update') }}/" + id,
                            data: {
                                id_alamat: id_alamat,
                                nama: nama,
                                tanggal_lahir: tanggal_lahir,
                                jenis_kelamin: jenis_kelamin,
                                agama: agama,
                                id_status: id_status,
                                pekerjaan: pekerjaan,
                                kewarganegaraan: kewarganegaraan,




                            },

                            success: function(data) {
                                // $("#page").html('');
                                $(".btn-close").click();
                                read()
                            }


                        });


                    }

                    function destroy(id) {
                        confirm("Apakah ingin mengapus data ?");

                        $.ajax({
                            type: "get",
                            url: "{{ url('penduduk/destroy') }}/" + id,
                            success: function(data) {
                                // $("#page").html('');
                                $(".btn-close").click();
                                read()
                            }


                        });


                    }
                </script>
            @endsection



            {{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <title>Crud Ajax Laravel 8</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>Data penduduk</h1>

                <button class="btn btn-primary" onclick="create()"> Tambah Data </button>
                <div id="read" class="mt-3">

                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-2" id="page"></div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            read()
        });

        function read() {
            $.get("{{ url('penduduk/read') }}", {}, function(data, status) {
                $('#read').html(data);

            });
        }

        function create() {
            $.get("{{ url('penduduk/create') }}", {}, function(data, status) {
                $('#page').html(data);
                $('#exampleModalLabel').html('Tambah Penduduk');
                $('#exampleModal').modal('show');

            });
        }

        function store() {
            var id_alamat = $("#id_alamat").val();
            var nama = $("#nama").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var jenis_kelamin = $("#jenis_kelamin").val();
            var agama = $("#agama").val();
            var id_status = $("#id_status").val();
            var pekerjaan = $("#pekerjaan").val();
            var kewarganegaraan = $("#kewarganegaraan").val();

            $.ajax({
                type: "get",
                url: "{{ url('penduduk/store') }}",
                data: {
                    id_alamat: id_alamat,
                    nama: nama,
                    tanggal_lahir: tanggal_lahir,
                    jenis_kelamin: jenis_kelamin,
                    agama: agama,
                    id_status: id_status,
                    pekerjaan: pekerjaan,
                    kewarganegaraan: kewarganegaraan,




                },

                success: function(data) {
                    // $("#page").html('');
                    $(".btn-close").click();
                    read()
                }
            });


        }

        function show(id) {
            $.get("{{ url('penduduk/show') }}/" + id, {}, function(data, status) {
                $('#page').html(data);
                $('#exampleModalLabel').html('Edite Penduduk');
                $('#exampleModal').modal('show');

            });

        }

        function edit(id) {
            var id_alamat = $("#id_alamat").val();
            var nama = $("#nama").val();
            var tanggal_lahir = $("#tanggal_lahir").val();
            var jenis_kelamin = $("#jenis_kelamin").val();
            var agama = $("#agama").val();
            var id_status = $("#id_status").val();
            var pekerjaan = $("#pekerjaan").val();
            var kewarganegaraan = $("#kewarganegaraan").val();

            $.ajax({
                type: "get",
                url: "{{ url('penduduk/update') }}/" + id,
                data: {
                    id_alamat: id_alamat,
                    nama: nama,
                    tanggal_lahir: tanggal_lahir,
                    jenis_kelamin: jenis_kelamin,
                    agama: agama,
                    id_status: id_status,
                    pekerjaan: pekerjaan,
                    kewarganegaraan: kewarganegaraan,




                },

                success: function(data) {
                    // $("#page").html('');
                    $(".btn-close").click();
                    read()
                }


            });


        }

        function destroy(id) {
            confirm("Apakah ingin mengapus data ?");

            $.ajax({
                type: "get",
                url: "{{ url('penduduk/destroy') }}/" + id,
                success: function(data) {
                    // $("#page").html('');
                    $(".btn-close").click();
                    read()
                }


            });


        }
    </script>
</body>

</html> --}}
