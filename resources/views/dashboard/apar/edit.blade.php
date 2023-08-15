@extends('dashboard.app')
@section('title', 'Data Apar')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2 pb-2 mb-3 border-bottom col-lg-12">
        <h1>Edit Data Apar</h1>
    </div>
    <form action="{{ route('data_apar.update', $apar->id) }}" method="POST" class="mb-5 col-lg-12" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="location_id" class="form-label">Location</label>
                <select name="location_id" id="location_id" class="form-control @error('location_id') is-invalid @enderror">
                    <option selected disabled>Pilih Location</option>
                    @foreach ($apars as $apar)
                        <option value="{{ $apars->location }}" {{ old('location_id') ?? $apar->location_id == $location->id ? 'selected' : '' }}>
                            {{ $location->location_name }}</option>
                    @endforeach
                </select>
                @error('location_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="expired">Expired </label>
                <select name="expired" id="expired" class="form-control @error('expired') is-invalid @enderror">
                    <option selected disabled>Pilih Tahun Expired</option>
                    @php
                        $currentYear = date('Y');
                        $startYear = $currentYear - 10;
                        $endYear = $currentYear + 10;
                    @endphp
                    @for ($year = $startYear; $year <= $endYear; $year++)
                        <option value="{{ $year }}" {{ old('expired') ?? $apar->expired == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endfor
                </select>

                @error('expired')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label for="post" class="form-label">Post</label>
                <input type="text" name="post" id="post" placeholder="Masukkan Post"
                    class="form-control @error('post') is-invalid @enderror" value="{{ old('post') }}">
                @error('post')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label" for="type">Type</label>
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                    <option selected disabled>Pilih Type</option>
                    <option value="powder" {{ old('type') == 'powder' ? 'selected' : '' }}>Powder</option>
                    <option value="co2" {{ old('type') == 'co2' ? 'selected' : '' }}>CO2</option>
                    <option value="af11e" {{ old('type') == 'af11e' ? 'selected' : '' }}>AF11E</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Tambah</button>
    </form>

@endsection