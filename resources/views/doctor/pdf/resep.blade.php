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
        <h1 class="text-center mb-8 font-medium text-teal-800">
            <span class="text-3xl">Resep Obat</span>
            <br />
            <span class="text-lg text-gray-800">Tanggal: {{ date("d M Y", strtotime($janjiTemu->tgl_temu)) }}</span>
        </h1>
        <table>
            <tr>
                <td width="5%">Dokter</td>
                <td>:</td>
                <td><p class="text-md font-medium">Dr. {{ $janjiTemu->doctor->name }}</p></td>
            </tr>
            <tr>
                <td width="5%">Pasien</td>
                <td>:</td>
                <td><p class="text-md font-medium">{{ $janjiTemu->patient->name }}</p></td>
            </tr>
        </table>
        <table class="table mt-5">
            <thead>
            <tr class="bg-gray-200 text-lg">
                <th>Note</th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-gray-100 text-md text-justify">
                <td class="py-4 px-3">{!! $janjiTemu->recipe->note !!}</td>
            </tr>
            </tbody>
        </table>
        <p class="pt-5">Dicetak pada tanggal: <span class="font-semibold">{{ now() }}</span></p>
        <p class="pt-8">Terima Kasih <br /><span class="font-medium">&copy; {{ date('Y', strtotime(now())) }}, IUseArchANW Information System</span></p>
    </div>
</div>
</body>
</html>
