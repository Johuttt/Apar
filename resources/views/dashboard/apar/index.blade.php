@extends('dashboard.app')
@section('title', 'Data Apar')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2 pb-2 mb-3 border-bottom col-lg-12">
        <h1>Data Apar</h1>
        <a href="/dashboard/apar/data_apar/create" class="btn btn-success"><span data-feather="file-plus"></span> Tambah</a>
    </div>
    <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tag Number</th>
              <th scope="col">Location</th>
              <th scope="col">Expired</th>
              <th scope="col">Post</th>
              <th scope="col">Type</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($apars as $apar)
            <tr class="align-middle">
              <td>{{ $loop->iteration }}</td>
              <td>{{ $apar->tag_number }}</td>
              <td>{{ $apar->location }}</td>
              <td>{{ $apar->expired }}</td>
              <td>{{ $apar->post }}</td>
              <td>{{ $apar->type }}</td>
              <td>
                <form action="/" method="POST">
                    <a href="/" class="badge bg-warning"><span data-feather="edit"></span></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Ingin menghapus Data UKT Mahasiswa?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @empty
                <td colspan="8">Tidak ada data...</td>
            @endforelse
          </tbody>
        </table>
      </div>
@endsection