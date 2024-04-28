<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <style>
        table {
            width: 100%;
            border-spacing: 0;
        }
    </style>
</head>
<body class="p-10">
<div class="flex flex-col items-center">
    <div class="container mt-5">
        <h1 class="text-center text-3xl mb-8">
            <span class="font-medium text-teal-800">Rumah Sakit UBAYA</span>
        </h1>
        <div class="grid grid-cols-2">
            <p class="text-md">Admin: <span class="font-medium">{{ auth()->user()->admin->name }}</span></p>
            <p class="text-md font-medium text-end">
                {{ $janjiTemu->patient->name }}/{{ date("YmdHis", strtotime($janjiTemu->tgl_temu)) }}
            </p>
        </div>
        <table class="table mt-5">
            <thead>
            <tr class="bg-gray-200">
                <th width="25%">Dokter</th>
                <th width="25%">Pasien</th>
                <th width="25%">Tanggal Temu</th>
                <th width="25%">Total</th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-gray-100 text-md text-center">
                <td width="25%" class="py-2">{{ $janjiTemu->doctor->name }}</td>
                <td width="25%">{{ $janjiTemu->patient->name }}</td>
                <td width="25%">{{ $janjiTemu->tgl_temu }}</td>
                <td width="25%">Rp. {{ number_format($janjiTemu->nota->grand_total) }}</td>
            </tr>
            <tr class="text-center bg-gray-700 text-white">
{{--                <td width="25%"></td>--}}
{{--                <td width="25%"></td>--}}
                <td class="text-lg" width="25%" colspan="3">Status</td>
                <td width="25%" class="font-bold text-success text-lg text-emerald-500">LUNAS</td>
            </tr>
            </tbody>
        </table>
        <p class="pt-4">Dicetak pada tanggal: <span class="font-semibold">{{ now() }}</span></p>
        <p class="pt-8">Terima Kasih <br /><span class="font-medium">&copy; {{ date('Y', strtotime(now())) }}, IUseArchANW Information System</span></p>
    </div>
</div>
</body>
</html>
