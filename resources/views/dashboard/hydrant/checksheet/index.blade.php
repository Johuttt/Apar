@extends('dashboard.app')
@section('title', 'Data Check Sheet Hydrant')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2 pb-2 mb-3 border-bottom col-lg-12">
        <h3>Data Check Sheet Hydrant Indoor</h3>
        {{-- <form action="{{ route('export.checksheetsco2') }}" method="POST">
            @method('POST')
            @csrf
            <button type="submit" class="btn btn-primary">Export to Excel</button>
        </form> --}}
        <form action="{{ route('hydrant.checksheet.index') }}" method="GET">
            <label for="tanggal_filter">Filter Tanggal:</label>
            <div class="input-group">
                <input type="date" name="tanggal_filter" class="form-control" id="tanggal_filter">
                <button class="btn btn-success" id="filterButton">Filter</button>
            </div>
        </form>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive col-lg-12">
                <table class="table table-striped table-sm" id="dtBasicExample1">
                    <thead>
                        <tr class="text-center align-middle">
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Pengecekan</th>
                            {{-- <th scope="col">Terakhir Update</th> --}}
                            <th scope="col">NPK</th>
                            <th scope="col">No Hydrant</th>
                            <th scope="col">Location Hydrant</th>
                            <th scope="col">Pintu</th>
                            <th scope="col">Emergency</th>
                            <th scope="col">Nozzle</th>
                            <th scope="col">Selang</th>
                            <th scope="col">Valve</th>
                            <th scope="col">Coupling</th>
                            <th scope="col">Pressure</th>
                            <th scope="col">Kupla</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checksheetindoor as $checksheet)
                            <tr class="text-center align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ strftime('%e %B %Y', strtotime($checksheet->tanggal_pengecekan)) }}</td>
                                {{-- <td>{{ strftime('%e %B %Y', strtotime($checksheet->updated_at)) }}</td> --}}
                                <td>{{ $checksheet->npk }}</td>
                                <td>{{ $checksheet->hydrant_number }}</td>
                                <td>{{ $checksheet->hydrants->locations->location_name }}</td>
                                <td>{{ $checksheet->pintu }}</td>
                                <td>{{ $checksheet->emergency }}</td>
                                <td>{{ $checksheet->nozzle }}</td>
                                <td>{{ $checksheet->selang }}</td>
                                <td>{{ $checksheet->valve }}</td>
                                <td>{{ $checksheet->coupling }}</td>
                                <td>{{ $checksheet->pressure }}</td>
                                <td>{{ $checksheet->kupla }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="{{ route('hydrant.checksheetindoor.show', $checksheet->id) }}"
                                            class="badge bg-info me-2">Info</a>
                                        <a href="{{ route('hydrant.checksheetindoor.edit', $checksheet->id) }}"
                                            class="badge bg-warning me-2">Edit</a>
                                        <form action="{{ route('hydrant.checksheetindoor.destroy', $checksheet->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge bg-danger border-0"
                                                onclick="return confirm('Ingin menghapus Data Check Sheet Hydrant Indoor?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="13">Tidak ada data...</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-5 pb-2 mb-3 border-bottom col-lg-12">
        <h3>Data Check Sheet Hydrant Outdoor</h3>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive col-lg-12">
                <table class="table table-striped table-sm" id="dtBasicExample2">
                    <thead>
                        <tr class="text-center align-middle">
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Pengecekan</th>
                            {{-- <th scope="col">Terakhir Update</th> --}}
                            <th scope="col">NPK</th>
                            <th scope="col">No Hydrant</th>
                            <th scope="col">Location Hydrant</th>
                            <th scope="col">Pintu</th>
                            <th scope="col">Nozzle</th>
                            <th scope="col">Selang</th>
                            <th scope="col">Tuas</th>
                            <th scope="col">Pilar</th>
                            <th scope="col">Penutup</th>
                            <th scope="col">Rantai</th>
                            <th scope="col">Kupla</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checksheetoutdoor as $checksheet)
                            <tr class="text-center align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ strftime('%e %B %Y', strtotime($checksheet->tanggal_pengecekan)) }}</td>
                                {{-- <td>{{ strftime('%e %B %Y', strtotime($checksheet->updated_at)) }}</td> --}}
                                <td>{{ $checksheet->npk }}</td>
                                <td>{{ $checksheet->hydrant_number }}</td>
                                <td>{{ $checksheet->hydrants->locations->location_name }}</td>
                                <td>{{ $checksheet->pintu }}</td>
                                <td>{{ $checksheet->nozzle }}</td>
                                <td>{{ $checksheet->selang }}</td>
                                <td>{{ $checksheet->tuas }}</td>
                                <td>{{ $checksheet->pilar }}</td>
                                <td>{{ $checksheet->penutup }}</td>
                                <td>{{ $checksheet->rantai }}</td>
                                <td>{{ $checksheet->kupla }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="{{ route('hydrant.checksheetoutdoor.show', $checksheet->id) }}"
                                            class="badge bg-info me-2">Info</a>
                                        <a href="{{ route('hydrant.checksheetoutdoor.edit', $checksheet->id) }}"
                                            class="badge bg-warning me-2">Edit</a>
                                        <form action="{{ route('hydrant.checksheetoutdoor.destroy', $checksheet->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge bg-danger border-0"
                                                onclick="return confirm('Ingin menghapus Data Check Sheet Hydrant Outdoor?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="13">Tidak ada data...</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var table1 = $('#dtBasicExample1').DataTable();
            var table2 = $('#dtBasicExample2').DataTable();
        });
    </script>
@endsection
