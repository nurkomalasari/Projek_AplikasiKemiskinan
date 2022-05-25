<h3>Stores</h3>
<div class="row">
    <div class="col">
        {{-- <a class="btn btn-primary" href="{{ route('stores.create') }}">Add</a> --}}
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Province</th>
                    <th scope="col">Regency</th>
                    <th scope="col">District</th>
                    <th scope="col">Village</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>
                        <th>{{ $store->name }}</th>
                        <td>{{ $store->province->name }}</td>
                        <td>{{ $store->regency->name }}</td>
                        <td>{{ $store->district->name }}</td>
                        <td>{{ $store->village->name }}</td>
                        <td>{{ $store->address }}</td>
                        {{-- <td><a class="btn btn-primary" href="{{ route('stores.edit', ['store' => $store]) }}">Edit</a> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
