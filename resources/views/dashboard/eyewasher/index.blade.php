@extends('dashboard.app')
@section('title', 'Data Eye Washer')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2 pb-2 mb-3 border-bottom col-lg-12">
        <h1>Data Eye Washers</h1>
        <a href="/dashboard/eyewasher/data-eyewasher/create" class="btn btn-success"><span data-feather="file-plus"></span> Tambah</a>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Eye Washer</th>
                    <th scope="col">Area</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($eyewashers as $eyewasher)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $eyewasher->no_eyewasher }}</td>
                        <td>{{ $eyewasher->locations->location_name }}</td>
                        <td>
                            <form action="{{ route('data-eyewasher.destroy', $eyewasher->id) }}" method="POST">
                                <a href="{{ route('data-eyewasher.edit', $eyewasher->id) }}" class="badge bg-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger border-0"
                                    onclick="return confirm('Ingin menghapus Data Eye Washer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="12">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection