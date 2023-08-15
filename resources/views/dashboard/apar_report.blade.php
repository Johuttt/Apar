@extends('dashboard.app')
@section('title', 'APAR Report')

@section('content')
<div class="container">
    <div>
        <form class="form-inline" method="GET" action="{{ route('apar.report') }}">
            <div class="input-group mb-3 w-25">
                <label class="input-group-text" for="selected_year">Pilih Tahun:</label>
                <select class="form-select" name="selected_year" id="selected_year">
                    <option value="select" selected disabled>Select</option>
                    @php
                    $currentYear = date('Y');
                    for ($year = $currentYear - 5; $year <= $currentYear; $year++) { echo "<option value=\" $year\">$year</option>";
                        }
                        @endphp
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </form>
        @if(request()->has('selected_year'))
        <p class="mt-2">Data untuk tahun {{ request('selected_year') }}</p>
        @endif
    </div>

    <br>
    <hr>
    <h3>APAR CO2 Report</h3>
    <table class="text-center table table-striped">
        <thead class="align-middle">
            <tr>
                <th rowspan="2">Tag Number</th>
                <th rowspan="2">Location</th>
                <th colspan="12">Month</th>
            </tr>
            <tr>
                @for ($month = 1; $month <= 12; $month++) <th>{{ $month }}</th>
                    @endfor
            </tr>
        </thead>
        <tbody>
            @foreach ($co2IssueCodes as $aparNumber => $issueCode)
            <tr>
                <td>{{ $aparNumber }}</td>
                <td></td>
                @for ($month = 1; $month <= 12; $month++) <td>
                    @php
                    $issueCodeValue = $issueCode['months'][$month] ?? ''; // Get issue code for this month
                    if (is_array($issueCodeValue)) {
                    echo implode('+', $issueCodeValue);
                    } else {
                    echo $issueCodeValue;
                    }
                    @endphp
                    </td>
                    @endfor
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <hr>

    <h3>APAR Powder Report</h3>
    <table class="text-center table table-striped">
        <thead class="align-middle">
            <tr>
                <th rowspan="2">Tag Number</th>
                <th rowspan="2">Location</th>
                <th colspan="12">Month</th>
            </tr>
            <tr>
                @for ($month = 1; $month <= 12; $month++) <th>{{ $month }}</th>
                    @endfor
            </tr>
        </thead>
        <tbody>
            @foreach ($powderIssueCodes as $aparNumber => $issueCode)
            <tr>
                <td>{{ $aparNumber }}</td>
                <td></td>
                @for ($month = 1; $month <= 12; $month++) <td>
                    @php
                    $issueCodeValue = $issueCode['months'][$month] ?? ''; // Get issue code for this month
                    if (is_array($issueCodeValue)) {
                    echo implode('+', $issueCodeValue);
                    } else {
                    echo $issueCodeValue;
                    }
                    @endphp
                    </td>
                    @endfor
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <hr>
    <div>
        <h4>Catatan:</h4>
        <ul class="list-unstyled d-flex">
            <li><strong>'a':</strong> Pressure </li>
            <li class="mx-4"><strong>'b':</strong> Lock Pin</li>
            <li><strong>'c':</strong> Regulator</li>
            <li class="mx-4"><strong>'d':</strong> Tabung</li>
            <li><strong>'e':</strong> Corong</li>
            <li class="mx-4"><strong>'f':</strong> Hose</li>
            <li><strong>'g':</strong> Kadar Konsentrat</li>
            <li class="mx-4"><strong>'h':</strong> Berat</li>
            <li><strong>'a+b':</strong> Isi Ulang</li>
        </ul>
    </div>
</div>
@endsection