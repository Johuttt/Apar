@extends('dashboard.app')
@section('title', 'Check Sheet Eyewasher')

@section('content')

    <div class="container">
        <h1>Check Sheet Eyewasher</h1>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-success col-lg-12">
                {{ session()->get('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('process.checksheet.eyewasher', ['eyewasherNumber' => $eyewasherNumber]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal_pengecekan" class="form-label">Tanggal Pengecekan</label>
                        <input type="date" class="form-control" id="tanggal_pengecekan" name="tanggal_pengecekan"
                            required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="npk" class="form-label">NPK</label>
                        <input type="text" class="form-control" id="npk" name="npk"
                            value="{{ auth()->user()->npk }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="eyewasher_number" class="form-label">Nomor eyewasher</label>
                        <input type="text" class="form-control" id="eyewasher_number" value="{{ $eyewasherNumber }}"
                            name="eyewasher_number" required autofocus readonly>
                    </div>
            </div>
            <div class="col-md-6">


                <div class="mb-3">
                    <label for="pijakan" class="form-label">Pijakan</label>
                    <div class="input-group">
                        <select class="form-select" id="pijakan" name="pijakan" required>
                            <option value="" selected disabled>Select</option>
                            <option value="OK" {{ old('pijakan') == 'OK' ? 'selected' : '' }}>OK</option>
                            <option value="NG" {{ old('pijakan') == 'NG' ? 'selected' : '' }}>NG</option>
                        </select>
                        <button type="button" class="btn btn-success" id="tambahCatatan_pijakan"><i class="bi bi-bookmark-plus"></i></button>
                    </div>
                </div>
                <div class="mb-3 mt-3" id="catatanField_pijakan" style="display:none;">
                    <label for="catatan_pijakan" class="form-label">Catatan Pijakan</label>
                    <textarea class="form-control" name="catatan_pijakan" id="catatan_pijakan" cols="30" rows="5">{{ old('catatan_pijakan') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="photo_pijakan" class="form-label">Foto Pijakan</label>
                    <img class="photo-pijakan-preview img-fluid mb-3" style="max-height: 300px">
                    <input type="file" class="form-control" id="photo_pijakan" name="photo_pijakan" required
                        onchange="previewImage('photo_pijakan', 'photo-pijakan-preview')">
                </div>


                <div class="mb-3">
                    <label for="pipa_saluran_air" class="form-label">Pipa Saluran Air</label>
                    <div class="input-group">
                        <select class="form-select" id="pipa_saluran_air" name="pipa_saluran_air" required>
                            <option value="" selected disabled>Select</option>
                            <option value="OK" {{ old('pipa_saluran_air') == 'OK' ? 'selected' : '' }}>OK</option>
                            <option value="NG" {{ old('pipa_saluran_air') == 'NG' ? 'selected' : '' }}>NG</option>
                        </select>
                        <button type="button" class="btn btn-success" id="tambahCatatan_pipa_saluran_air"><i class="bi bi-bookmark-plus"></i></button>
                    </div>
                </div>
                <div class="mb-3 mt-3" id="catatanField_pipa_saluran_air" style="display:none;">
                    <label for="catatan_pipa_saluran_air" class="form-label">Catatan Pipa saluran Air</label>
                    <textarea class="form-control" name="catatan_pipa_saluran_air" id="catatan_pipa_saluran_air" cols="30" rows="5">{{ old('catatan_pipa_saluran_air') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="photo_pipa_saluran_air" class="form-label">Foto Pipa Saluran Air</label>
                    <img class="photo-pipa_saluran_air-preview img-fluid mb-3" style="max-height: 300px">
                    <input type="file" class="form-control" id="photo_pipa_saluran_air" name="photo_pipa_saluran_air" required
                        onchange="previewImage('photo_pipa_saluran_air', 'photo-pipa_saluran_air-preview')">
                </div>


                <div class="mb-3">
                    <label for="wastafel" class="form-label">Wastafel</label>
                    <div class="input-group">
                        <select class="form-select" id="wastafel" name="wastafel" required>
                            <option value="" selected disabled>Select</option>
                            <option value="OK" {{ old('wastafel') == 'OK' ? 'selected' : '' }}>OK</option>
                            <option value="NG" {{ old('wastafel') == 'NG' ? 'selected' : '' }}>NG</option>
                        </select>
                        <button type="button" class="btn btn-success" id="tambahCatatan_wastafel"><i class="bi bi-bookmark-plus"></i></button>
                    </div>
                </div>
                <div class="mb-3 mt-3" id="catatanField_wastafel" style="display:none;">
                    <label for="catatan_wastafel" class="form-label">Catatan Wastafel</label>
                    <textarea class="form-control" name="catatan_wastafel" id="catatan_wastafel" cols="30" rows="5">{{ old('catatan_wastafel') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="photo_wastafel" class="form-label">Foto Wastafel</label>
                    <img class="photo-wastafel-preview img-fluid mb-3" style="max-height: 300px">
                    <input type="file" class="form-control" id="photo_wastafel" name="photo_wastafel" required
                        onchange="previewImage('photo_wastafel', 'photo-wastafel-preview')">
                </div>


                <div class="mb-3">
                    <label for="kran_air" class="form-label">Kran Air</label>
                    <div class="input-group">
                        <select class="form-select" id="kran_air" name="kran_air" required>
                            <option value="" selected disabled>Select</option>
                            <option value="OK" {{ old('kran_air') == 'OK' ? 'selected' : '' }}>OK</option>
                            <option value="NG" {{ old('kran_air') == 'NG' ? 'selected' : '' }}>NG</option>
                        </select>
                        <button type="button" class="btn btn-success" id="tambahCatatan_kran_air"><i class="bi bi-bookmark-plus"></i></button>
                    </div>
                </div>
                <div class="mb-3 mt-3" id="catatanField_kran_air" style="display:none;">
                    <label for="catatan_kran_air" class="form-label">Catatan Kran Air</label>
                    <textarea class="form-control" name="catatan_kran_air" id="catatan_kran_air" cols="30" rows="5">{{ old('catatan_kran_air') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="photo_kran_air" class="form-label">Foto Kran Air</label>
                    <img class="photo-kran_air-preview img-fluid mb-3" style="max-height: 300px">
                    <input type="file" class="form-control" id="photo_kran_air" name="photo_kran_air" required
                        onchange="previewImage('photo_kran_air', 'photo-kran_air-preview')">
                </div>


                <div class="mb-3">
                    <label for="tuas" class="form-label">Tuas</label>
                    <div class="input-group">
                        <select class="form-select" id="tuas" name="tuas" required>
                            <option value="" selected disabled>Select</option>
                            <option value="OK" {{ old('tuas') == 'OK' ? 'selected' : '' }}>OK</option>
                            <option value="NG" {{ old('tuas') == 'NG' ? 'selected' : '' }}>NG</option>
                        </select>
                        <button type="button" class="btn btn-success" id="tambahCatatan_tuas"><i class="bi bi-bookmark-plus"></i></button>
                    </div>
                </div>
                <div class="mb-3 mt-3" id="catatanField_tuas" style="display:none;">
                    <label for="catatan_tuas" class="form-label">Catatan Tuas</label>
                    <textarea class="form-control" name="catatan_tuas" id="catatan_tuas" cols="30" rows="5">{{ old('catatan_tuas') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="photo_tuas" class="form-label">Foto Tuas</label>
                    <img class="photo-tuas-preview img-fluid mb-3" style="max-height: 300px">
                    <input type="file" class="form-control" id="photo_tuas" name="photo_tuas" required
                        onchange="previewImage('photo_tuas', 'photo-tuas-preview')">
                </div>


            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <p><strong>Catatan:</strong> Jika ada abnormal yang ditemukan segera laporkan ke atasan.</p>
        </div>
    </div>
    <div class="row mt-2 mb-5">
        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </div>
    </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen-elemen yang dibutuhkan
            const tambahCatatanButtonPijakan = document.getElementById('tambahCatatan_pijakan');
            const tambahCatatanButtonPipa_saluran_air = document.getElementById('tambahCatatan_pipa_saluran_air');
            const tambahCatatanButtonWastafel = document.getElementById('tambahCatatan_wastafel');
            const tambahCatatanButtonKran_air = document.getElementById('tambahCatatan_kran_air');
            const tambahCatatanButtonTuas = document.getElementById('tambahCatatan_tuas');


            const catatanFieldPijakan = document.getElementById('catatanField_pijakan');
            const catatanFieldPipa_saluran_air = document.getElementById('catatanField_pipa_saluran_air');
            const catatanFieldWastafel = document.getElementById('catatanField_wastafel');
            const catatanFieldKran_air = document.getElementById('catatanField_kran_air');
            const catatanFieldTuas = document.getElementById('catatanField_tuas');


            // Tambahkan event listener untuk button "Tambah Catatan Pijakan"
            tambahCatatanButtonPijakan.addEventListener('click', function() {
                // Toggle tampilan field catatan ketika tombol diklik
                if (catatanFieldPijakan.style.display === 'none') {
                    catatanFieldPijakan.style.display = 'block';
                    tambahCatatanButtonPijakan.innerHTML = '<i class="bi bi-bookmark-x"></i>';
                    tambahCatatanButtonPijakan.classList.remove('btn-success');
                    tambahCatatanButtonPijakan.classList.add('btn-danger');
                } else {
                    catatanFieldPijakan.style.display = 'none';
                    tambahCatatanButtonPijakan.innerHTML = '<i class="bi bi-bookmark-plus"></i>';
                    tambahCatatanButtonPijakan.classList.remove('btn-danger');
                    tambahCatatanButtonPijakan.classList.add('btn-success');
                }
            });

            // ... Tambahkan event listener untuk tombol-tombol tambah catatan lainnya di sini ...
            tambahCatatanButtonPipa_saluran_air.addEventListener('click', function() {
                // Toggle tampilan field catatan ketika tombol diklik
                if (catatanFieldPipa_saluran_air.style.display === 'none') {
                    catatanFieldPipa_saluran_air.style.display = 'block';
                    tambahCatatanButtonPipa_saluran_air.innerHTML = '<i class="bi bi-bookmark-x"></i>';
                    tambahCatatanButtonPipa_saluran_air.classList.remove('btn-success');
                    tambahCatatanButtonPipa_saluran_air.classList.add('btn-danger');
                } else {
                    catatanFieldPipa_saluran_air.style.display = 'none';
                    tambahCatatanButtonPipa_saluran_air.innerHTML = '<i class="bi bi-bookmark-plus"></i>';
                    tambahCatatanButtonPipa_saluran_air.classList.remove('btn-danger');
                    tambahCatatanButtonPipa_saluran_air.classList.add('btn-success');
                }
            });

            tambahCatatanButtonWastafel.addEventListener('click', function() {
                // Toggle tampilan field catatan ketika tombol diklik
                if (catatanFieldWastafel.style.display === 'none') {
                    catatanFieldWastafel.style.display = 'block';
                    tambahCatatanButtonWastafel.innerHTML = '<i class="bi bi-bookmark-x"></i>';
                    tambahCatatanButtonWastafel.classList.remove('btn-success');
                    tambahCatatanButtonWastafel.classList.add('btn-danger');
                } else {
                    catatanFieldWastafel.style.display = 'none';
                    tambahCatatanButtonWastafel.innerHTML = '<i class="bi bi-bookmark-plus"></i>';
                    tambahCatatanButtonWastafel.classList.remove('btn-danger');
                    tambahCatatanButtonWastafel.classList.add('btn-success');
                }
            });

            tambahCatatanButtonKran_air.addEventListener('click', function() {
                // Toggle tampilan field catatan ketika tombol diklik
                if (catatanFieldKran_air.style.display === 'none') {
                    catatanFieldKran_air.style.display = 'block';
                    tambahCatatanButtonKran_air.innerHTML = '<i class="bi bi-bookmark-x"></i>';
                    tambahCatatanButtonKran_air.classList.remove('btn-success');
                    tambahCatatanButtonKran_air.classList.add('btn-danger');
                } else {
                    catatanFieldKran_air.style.display = 'none';
                    tambahCatatanButtonKran_air.innerHTML = '<i class="bi bi-bookmark-plus"></i>';
                    tambahCatatanButtonKran_air.classList.remove('btn-danger');
                    tambahCatatanButtonKran_air.classList.add('btn-success');
                }
            });

            tambahCatatanButtonTuas.addEventListener('click', function() {
                // Toggle tampilan field catatan ketika tombol diklik
                if (catatanFieldTuas.style.display === 'none') {
                    catatanFieldTuas.style.display = 'block';
                    tambahCatatanButtonTuas.innerHTML = '<i class="bi bi-bookmark-x"></i>';
                    tambahCatatanButtonTuas.classList.remove('btn-success');
                    tambahCatatanButtonTuas.classList.add('btn-danger');
                } else {
                    catatanFieldTuas.style.display = 'none';
                    tambahCatatanButtonTuas.innerHTML = '<i class="bi bi-bookmark-plus"></i>';
                    tambahCatatanButtonTuas.classList.remove('btn-danger');
                    tambahCatatanButtonTuas.classList.add('btn-success');
                }
            });
        });
    </script>



@endsection
