<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nota</title>
    <style>
    div{
       /* padding-top :10px; */
       padding-bottom: 20px;
    }
    </style>
</head>
<body>
<form>
    <h1>Tambah Nota</h1>
    <div class="input-group mb-3">
        <div>
            <label for="patientName">Nama Pasien :</label>
            <input type="text" id="patientName" name="patientName" placeholder="Input Patient Name"><br>
        </div>
        <div>
            <label for="janji_temu_id">Pilih Id Janji Temu:</label>
            <select id="janji_temu_id" name="janji_temu_id">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select><br>
        </div>
        <div>
            <label for="price">Grand Total : Rp.</label>
            <input type="number" id="price" name="price" step="1000" min="1000" max="1000000">
        </div>
        <input type="submit">
    </div>
</form>
</body>
</html>