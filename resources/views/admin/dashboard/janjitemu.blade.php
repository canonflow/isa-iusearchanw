<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Janji Temu</title>
    <style>
        h1 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #content1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 5px solid black;
            border-radius: 7px;
            padding: 10px 30px;
            margin: 25px 25px;
            background-color: white;
        }

        #content2 {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 5px solid black;
            border-radius: 7px;
            padding: 10px 10px;
            margin: 25px 25px;
            background-color: white;
        }

        table {
            border: 1px solid;
            border-collapse: collapse;
        }

        th {
            color: white;
            background-color: black;
            border: 1px solid black;
            padding: 5px;
            text-align: center;
            t-weight: bold;
        }

        td {
            border: 1px solid;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Admin Janji Temu</h1>
    <div id="content1">
        <form action="post">
            <label for="inputHead">Pencarian : </label>
            <input type="text" name="inputHead" id="inputHead">
            <label for="inputSearch">Search : </label>
            <input type="text" name="inputSearch" id="inputSearch">
        </form>
    </div>
    <div id="content2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Patient</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Riwayat Pemeriksaan</th>
                    <th scope="col">Tanggal Temu</th>
                    <th scope="col">Recipes_Id</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Anastasya Putri Mulyani</td>
                    <td>Nathan Garzya Santoso</td>
                    <td>Belum ada</td>
                    <td>15 April 2024</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Anastasya Putri Mulyani</td>
                    <td>Amelia Griselda</td>
                    <td>Konsultasi Medis</td>
                    <td>17 April 2024</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
