@extends('dashboard.app')
@section('title', 'Data Check Sheet Hydrant')

@section('content')
    @if ($checksheet->hydrants->type === 'Outdoor')
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2 pb-2 mb-3 border-bottom col-lg-12">
            <h1>Detail Check Sheet Outdoor</h1>
            <a href="{{ route('hydrant.checksheetoutdoor.edit', $checksheet->id) }}" class="btn btn-warning">Edit</a>
        </div>
        <div class="card col-md-12">
            <div class="card-body">
                <div class="table-responsive col-md-12">
                    <table class="table table-striped table-sm">
                        <tr>
                            <th width='40%'>Tanggal Pengecekan</th>
                            <td>{{ strftime('%e %B %Y', strtotime($checksheet->tanggal_pengecekan)) }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diupdate</th>
                            <td>{{ strftime('%e %B %Y', strtotime($checksheet->updated_at)) }}</td>
                        </tr>
                        <tr>
                            <th>NPK</th>
                            <td>{{ $checksheet->npk }}</td>
                        </tr>
                        <tr>
                            <th>Hydrant Number</th>
                            <td>{{ $checksheet->hydrant_number }}</td>
                        </tr>
                        <tr>
                            <th>Location Hydrant</th>
                            <td>{{ $checksheet->hydrants->locations->location_name }}</td>
                        </tr>
                        <tr>
                            <th>Pintu Hydrant</th>
                            <td>{{ $checksheet->pintu }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Pintu Hydrant</th>
                            <td>{{ $checksheet->catatan_pintu }}</td>
                        </tr>
                        <tr>
                            <th>Photo Pintu Hydrant</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_pintu) }}" alt="Photo Pintu Hydrant"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Nozzle</th>
                            <td>{{ $checksheet->nozzle }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Nozzle</th>
                            <td>{{ $checksheet->catatan_nozzle }}</td>
                        </tr>
                        <tr>
                            <th>Photo Nozzle</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_nozzle) }}" alt="Photo Nozzle"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Selang</th>
                            <td>{{ $checksheet->selang }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Selang</th>
                            <td>{{ $checksheet->catatan_selang }}</td>
                        </tr>
                        <tr>
                            <th>Photo Selang</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_selang) }}" alt="Photo Selang"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Tuas Pilar</th>
                            <td>{{ $checksheet->tuas }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Tuas Pilar</th>
                            <td>{{ $checksheet->catatan_tuas }}</td>
                        </tr>
                        <tr>
                            <th>Photo Tuas Pilar</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_tuas) }}" alt="Photo Tuas Pilar"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Pilar</th>
                            <td>{{ $checksheet->pilar }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Pilar</th>
                            <td>{{ $checksheet->catatan_pilar }}</td>
                        </tr>
                        <tr>
                            <th>Photo Pilar</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_pilar) }}" alt="Photo Pilar"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Penutup Pilar</th>
                            <td>{{ $checksheet->penutup }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Penutup Pilar</th>
                            <td>{{ $checksheet->catatan_penutup }}</td>
                        </tr>
                        <tr>
                            <th>Photo Penutup Pilar</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_penutup) }}" alt="Photo Penutup Pilar"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Rantai Penutup Pilar</th>
                            <td>{{ $checksheet->rantai }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Rantai Penutup Pilar</th>
                            <td>{{ $checksheet->catatan_rantai }}</td>
                        </tr>
                        <tr>
                            <th>Photo Rantai Penutup Pilar</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_rantai) }}" alt="Photo Rantai Penutup Pilar"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Kopling/Kupla</th>
                            <td>{{ $checksheet->kupla }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Kopling/Kupla</th>
                            <td>{{ $checksheet->catatan_kupla }}</td>
                        </tr>
                        <tr>
                            <th>Photo Kopling/Kupla</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_kupla) }}" alt="Photo Kopling/Kupla"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    @elseif ($checksheet->hydrants->type === 'Indoor')
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2 pb-2 mb-3 border-bottom col-lg-12">
            <h1>Detail Check Sheet Hydrant Indoor</h1>
            <a href="{{ route('hydrant.checksheetindoor.edit', $checksheet->id) }}" class="btn btn-warning">Edit</a>
        </div>
        <div class="card col-md-12">
            <div class="card-body">
                <div class="table-responsive col-md-12">
                    <table class="table table-striped table-sm">
                        <tr>
                            <th width='40%'>Tanggal Pengecekan</th>
                            <td>{{ strftime('%e %B %Y', strtotime($checksheet->tanggal_pengecekan)) }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diupdate</th>
                            <td>{{ strftime('%e %B %Y', strtotime($checksheet->updated_at)) }}</td>
                        </tr>
                        <tr>
                            <th>NPK</th>
                            <td>{{ $checksheet->npk }}</td>
                        </tr>
                        <tr>
                            <th>Hydrant Number</th>
                            <td>{{ $checksheet->hydrant_number }}</td>
                        </tr>
                        <tr>
                            <th>Location Apar</th>
                            <td>{{ $checksheet->hydrants->locations->location_name }}</td>
                        </tr>
                        <tr>
                            <th>Pintu Hydrant</th>
                            <td>{{ $checksheet->pintu }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Pintu Hydrant</th>
                            <td>{{ $checksheet->catatan_pintu }}</td>
                        </tr>
                        <tr>
                            <th>Photo Pintu Hydrant</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_pintu) }}" alt="Photo Pintu Hydrant"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Lampu</th>
                            <td>{{ $checksheet->lampu }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Lampu</th>
                            <td>{{ $checksheet->catatan_lampu }}</td>
                        </tr>
                        <tr>
                            <th>Photo Lampu</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_lampu) }}" alt="Photo Lampu"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Tombol Emergency</th>
                            <td>{{ $checksheet->emergency }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Tombol Emergency</th>
                            <td>{{ $checksheet->catatan_emergency }}</td>
                        </tr>
                        <tr>
                            <th>Photo Tombol Emergency</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_emergency) }}" alt="Photo Tombol Emergency"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Nozzle</th>
                            <td>{{ $checksheet->nozzle }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Nozzle</th>
                            <td>{{ $checksheet->catatan_nozzle }}</td>
                        </tr>
                        <tr>
                            <th>Photo Nozzle</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_nozzle) }}" alt="Photo Nozzle"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Selang</th>
                            <td>{{ $checksheet->selang }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Selang</th>
                            <td>{{ $checksheet->catatan_selang }}</td>
                        </tr>
                        <tr>
                            <th>Photo Selang</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_selang) }}" alt="Photo Selang"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Valve</th>
                            <td>{{ $checksheet->valve }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Valve</th>
                            <td>{{ $checksheet->catatan_valve }}</td>
                        </tr>
                        <tr>
                            <th>Photo Valve</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_valve) }}" alt="Photo Valve"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Coupling/Sambungan</th>
                            <td>{{ $checksheet->coupling }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Coupling/Sambungan</th>
                            <td>{{ $checksheet->catatan_coupling }}</td>
                        </tr>
                        <tr>
                            <th>Photo Coupling/Sambungan</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_coupling) }}" alt="Photo Coupling/Sambungan"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Pressure</th>
                            <td>{{ $checksheet->pressure }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Pressure</th>
                            <td>{{ $checksheet->catatan_pressure }}</td>
                        </tr>
                        <tr>
                            <th>Photo Pressure</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_pressure) }}" alt="Photo Pressure"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <th>Kopling/Kupla</th>
                            <td>{{ $checksheet->kupla }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Kopling/Kupla</th>
                            <td>{{ $checksheet->catatan_kupla }}</td>
                        </tr>
                        <tr>
                            <th>Photo Kopling/Kupla</th>
                            <td>
                                <img src="{{ asset('storage/' . $checksheet->photo_kupla) }}" alt="Photo Kopling/Kupla"
                                    style="max-width: 250px; max-height: 300px;" class="img-fluid">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
