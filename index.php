<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Javascript by MED Programming</title>
    <script src="js/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="text-center mt-3">Data Buku MED Programming</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-10 mt-4">
                <div id="action"></div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Judul Buku</th>
                        <th scope="col" class="text-center">Pengarang</th>
                        <th scope="col" class="text-center">Tahun Terbit</th>
                        <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="barisData"></tbody>
                </table>
            </div>
        </div>
        <h4 class="text-center mt-3">Tambah Data</h4>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 mb-3">
                <div id="pesan"></div>
                <input type="hidden" name="id" disabled>
                <div class="input-group flex-nowrap mb-3">
                    <input type="text" class="form-control" placeholder="Judul Buku" name="judul_buku">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <input type="text" class="form-control" placeholder="Pengarang" name="pengarang">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <input type="text" class="form-control" placeholder="Tahun Terbit" name="tahun_terbit">
                </div>
                <button id="tombolAdd" class="btn btn-success" onclick="tambahData()">Tambah</button>
                <button id="tombolUpdate" class="btn btn-success" onclick="updateData()">Update</button>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script type="text/javascript">
    onLoad();
    function onLoad() {
        var dataHandler = $('#barisData');
        dataHandler.html("");
        $.ajax({
            type : "GET",
            data : "",
            url : "ambilData.php",
            success : function(result) {
                var objResult = JSON.parse(result)
                var nomor = 1
                $.each(objResult, function(key, val) {
                    var barisBaru = $("<tr>");
                    barisBaru.html("<td>"+ nomor +"</td><td>"+ val.judul_buku +"</td><td>"+ val.pengarang +"</td><td>"+ val.tahun_terbit +"</td><td class='text-center d-flex justify-content-evenly'><button class='badge text-bg-danger' onclick='hapus("+ val.id +")'>Hapus</button><button onclick='pilihData("+ val.id +")' class='badge text-bg-info'>Update</button></td>");
                    dataHandler.append(barisBaru);
                    nomor++;
                    $('#tombolUpdate').hide();
                    $('#tombolAdd').show();
                })
            }
        })
    }

    // function tambah data
    function tambahData() {
        var judulBuku = $("[name='judul_buku']").val();
        var pengarang = $("[name='pengarang']").val();
        var tahun_terbit = $("[name='tahun_terbit']").val();

        $.ajax({
            type: "POST",
            data: "judul_buku="+ judulBuku +"&pengarang="+ pengarang +"&tahun_terbit="+tahun_terbit,
            url: "tambahData.php",
            success: function(result) {
                var pesan = JSON.parse(result);
                $('#pesan').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'+ pesan +'.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
                onLoad();
            }
        })
    }

    // function hapus data
    function hapus(id) {
        $.ajax({
            type: "POST",
            data: "id="+id,
            url: "hapus.php",
            success: function(result) {
                var pesan = JSON.parse(result);
                $('#action').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>'+ pesan +'.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
                onLoad();
            }
        })
    }

    // update data
    function pilihData(id) {
        $.ajax({
            type: "POST",
            data: "id="+id,
            url: "pilihData.php",
            success: function(result) {
                var dataId = JSON.parse(result);
                $("[name='judul_buku']").val(dataId.judul_buku);
                $("[name='pengarang']").val(dataId.pengarang);
                $("[name='tahun_terbit']").val(dataId.tahun_terbit);
                $("[name='id']").val(dataId.id);
                $('#tombolAdd').hide();
                $('#tombolUpdate').show();
            }
        })
    }

    function updateData() {
        var id = $("[name='id']").val();
        var judul_buku = $("[name='judul_buku']").val();
        var pengarang = $("[name='pengarang']").val();
        var tahun_terbit = $("[name='tahun_terbit']").val();

        $.ajax({
            type: "POST",
            data: "id="+id+"&judul_buku="+ judul_buku +"&pengarang="+ pengarang +"&tahun_terbit="+tahun_terbit,
            url: 'updateData.php',
            success: function(result) {
                var pesan = JSON.parse(result);
                $('#pesan').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>'+ pesan +'.</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
                onLoad();
            }
        })
    }
</script>
</body>
</html>