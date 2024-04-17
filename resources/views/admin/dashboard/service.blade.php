<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service</title>
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
            font-weight: bold;
        }

        td {
            border: 1px solid;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Admin Service</h1>
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
                    <th scope="col">Name</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Konsultasi Medis</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Pemeriksaan Laboratorium</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
