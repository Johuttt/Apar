@extends('dashboard.app')
@section('title', 'Data Nitrogen')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2 pb-2 mb-3 border-bottom col-lg-12">
        <h1>Edit Data Eye Washer</h1>
    </div>
    <form action="{{ route('eye-washer.update', $eyewasher->id) }}" method="POST" class="mb-5 col-lg-12" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="no_eyewasher" class="form-label">No Eye Washer</label>
                <input type="text" name="no_eyewasher" id="no_eyewasher" placeholder="Masukkan No Eye Washer"
                    class="form-control @error('no_eyewasher') is-invalid @enderror" value="{{ old('no_eyewasher') ?? $eyewasher->no_eyewasher}}" readonly>
                @error('no_eyewasher')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="type" class="form-label">Type</label>
                <input type="text" name="type" id="type" placeholder="Masukkan Type Eye Washer"
                    class="form-control @error('type') is-invalid @enderror" value="{{ old('type') ?? $eyewasher->type}}" readonly>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="location_id" class="form-label">Area</label>
                <select name="location_id" id="location_id" class="form-control @error('location_id') is-invalid @enderror">
                    <option selected disabled>Pilih Area</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location_id') ?? $eyewasher->location_id == $location->id ? 'selected' : '' }}>
                            {{ $location->location_name }}</option>
                    @endforeach
                </select>
                @error('location_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Edit</button>
    </form>

@endsection
