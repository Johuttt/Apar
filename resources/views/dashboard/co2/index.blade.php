@extends('dashboard.app')
@section('title', 'Data Co2')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2 pb-2 mb-3 border-bottom col-lg-12">
        <h1>Data Co2</h1>
        <a href="/dashboard/co2/data-co2/create" class="btn btn-success"><span data-feather="file-plus"></span> Tambah</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr class="text-center align-middle">
                    <th scope="col">#</th>
                    <th scope="col">No Tabung</th>
                    <th scope="col">Location</th>
                    <th scope="col">Plant</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($co2s as $co2)
                    <tr class="text-center align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $co2->no_tabung }}</td>
                        <td>{{ $co2->locations->location_name }}</td>
                        <td>{{ $co2->plant }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                            <form action="{{ route('data-co2.destroy', $co2->id) }}" method="POST">
                                <a href="{{ route('data-co2.edit', $co2->id) }}" class="badge bg-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirm('Ingin menghapus Data Co2?')">Delete</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="12">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
