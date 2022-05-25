<div class="p-2">
    <div class="form-group">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">
                Province
            </label>
            <select id="select_province" name="province" data-placeholder="Select" class="custom-select w-100">

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">
                Regency
            </label>
            <select id="select_regency" name="regency" data-placeholder="Select" class="custom-select w-100">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">
                District
            </label>
            <select id="select_district" name="district" data-placeholder="Select" class="custom-select w-100">

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">
                Village
            </label>
            <select id="select_village" name="village" data-placeholder="Select" class="custom-select w-100">
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">
                Address
            </label>
            <textarea name="address" class="form-control" rows="3"></textarea>
        </div>


        <div class="form-group mt-2">
            <button class="btn btn-success" onclick="store()">Create</button>
        </div>


    </div>
</div>
<script>
    $(document).ready(function() {

        //  select province:start
        $('#select_province').select2({
            allowClear: true,
            ajax: {
                url: "{{ '/provinces' }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    //console.log(data)
                    return {
                        results: data.map(e => {
                            return {
                                text: e.name,
                                id: e.id
                            }
                        })

                    };
                }
            }
        });
        //  select province:end

        //  Event on change select province:start
        $('#select_province').change(function() {
            //clear select
            $('#select_regency').empty();
            $("#select_district").empty();
            $("#select_village").empty();
            //set id
            let provinceID = $(this).val();
            if (provinceID) {
                $('#select_regency').select2({
                    allowClear: true,
                    ajax: {
                        url: "{{ route('regencies.select') }}?provinceID=" + provinceID,
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.name,
                                        id: item.id
                                    }
                                })
                            };
                        }
                    }
                });
            } else {
                $('#select_regency').empty();
                $("#select_district").empty();
                $("#select_village").empty();
            }
        });
        //  Event on change select province:end

        //  Event on change select regency:start
        $('#select_regency').change(function() {
            //clear select
            $("#select_district").empty();
            $("#select_village").empty();
            //set id
            let regencyID = $(this).val();
            if (regencyID) {
                $('#select_district').select2({
                    allowClear: true,
                    ajax: {
                        url: "{{ route('districts.select') }}?regencyID=" + regencyID,
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.name,
                                        id: item.id
                                    }
                                })
                            };
                        }
                    }
                });
            } else {
                $("#select_district").empty();
                $("#select_village").empty();
            }
        });
        //  Event on change select regency:end

        //  Event on change select district:Start
        $('#select_district').change(function() {
            //clear select
            $("#select_village").empty();
            //set id
            let districtID = $(this).val();
            if (districtID) {
                $('#select_village').select2({
                    allowClear: true,
                    ajax: {
                        url: "{{ route('villages.select') }}?districtID=" + districtID,
                        dataType: 'json',
                        delay: 250,
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.name,
                                        id: item.id
                                    }
                                })
                            };
                        }
                    }
                });
            }
        });
        //  Event on change select district:End

        // EVENT ON CLEAR
        $('#select_province').on('select2:clear', function(e) {
            $("#select_regency").select2();
            $("#select_district").select2();
            $("#select_village").select2();
        });

        $('#select_regency').on('select2:clear', function(e) {
            $("#select_district").select2();
            $("#select_village").select2();
        });

        $('#select_district').on('select2:clear', function(e) {
            $("#select_village").select2();
        });
    });
</script>
