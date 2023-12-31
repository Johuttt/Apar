@extends('dashboard.app')
@section('title', 'Data Check Sheet Nitrogen')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2 pb-2 mb-3 border-bottom col-lg-12">
        <h3>Data Check Sheet Nitrogen</h3>
        <form action="{{ route('nitrogen.checksheet.index') }}" method="GET">
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
                            <th scope="col">NPK</th>
                            <th scope="col">No Tabung</th>
                            <th scope="col">Location Nitrogen</th>
                            <th scope="col">Sistem Operasional</th>
                            <th scope="col">Selector Mode</th>
                            <th scope="col">Pintu Tabung</th>
                            <th scope="col">Pressure Tabung Pilot Nitrogen</th>
                            <th scope="col">Pressure Tabung Nitrogen No 1</th>
                            <th scope="col">Pressure Tabung Nitrogen No 2</th>
                            <th scope="col">Pressure Tabung Nitrogen No 3</th>
                            <th scope="col">Pressure Tabung Nitrogen No 4</th>
                            <th scope="col">Pressure Tabung Nitrogen No 5</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checksheetnitrogen as $checksheet)
                            <tr class="text-center align-middle">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ strftime('%e %B %Y', strtotime($checksheet->tanggal_pengecekan)) }}</td>
                                {{-- <td>{{ strftime('%e %B %Y', strtotime($checksheet->updated_at)) }}</td> --}}
                                <td>{{ $checksheet->npk }}</td>
                                <td>{{ $checksheet->tabung_number }}</td>
                                <td>{{ $checksheet->nitrogens->locations->location_name }}</td>
                                <td>{{ $checksheet->operasional }}</td>
                                <td>{{ $checksheet->selector_mode }}</td>
                                <td>{{ $checksheet->pintu_tabung }}</td>
                                <td>{{ $checksheet->pressure_pilot }}</td>
                                <td>{{ $checksheet->pressure_no1 }}</td>
                                <td>{{ $checksheet->pressure_no2 }}</td>
                                <td>{{ $checksheet->pressure_no3 }}</td>
                                <td>{{ $checksheet->pressure_no4 }}</td>
                                <td>{{ $checksheet->pressure_no5 }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="{{ route('nitrogen.checksheetnitrogen.show', $checksheet->id) }}"
                                            class="badge bg-info me-2">Info</a>
                                        <a href="{{ route('nitrogen.checksheetnitrogen.edit', $checksheet->id) }}"
                                            class="badge bg-warning me-2">Edit</a>
                                        <form action="{{ route('nitrogen.checksheetnitrogen.destroy', $checksheet->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge bg-danger border-0"
                                                onclick="return confirm('Ingin menghapus Data Check Sheet Nitrogen?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td colspan="15">Tidak ada data...</td>
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
