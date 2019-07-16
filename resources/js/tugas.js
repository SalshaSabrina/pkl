$(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    var tag = "api/tag";
    var artikel = "api/artikel";
    var kategori = "api/kategori";

    //Get Tag
    $.ajax({
        url: tag,
        method: "GET",
        dataType: "json",
        success: function(berhasil) {
            // console.log(berhasil)
            $.each(berhasil.data, function(key, value) {
                $(".data-tag").append(
                    `
                    <li>${
                        value.nama
                    } <button class="btn btn-danger btn-sm hapus-data" data-id="${
                        value.id
                    }">Hapus</button></li>
                    `
                );
            });
        }
    });
});

//Get  Kategori
$.ajax({
    url: kategori,
    method: "GET",
    dataType: "json",
    success: function(berhasil) {
        // console.log(berhasil)
        $.each(berhasil.data, function(key, value) {
            $(".data-kategori").append(
                `
                    <li>${
                        value.nama
                    } <button class="btn btn-danger btn-sm hapus-data" data-id="${
                    value.id
                }">Hapus</button></li>
                    `
            );
        });
    }
});

//Simpan Data Tag
$(".tombol-simpan").click(function(simpan) {
    simpan.preventDefault();
    var variable_isian_nama = $("input[name=namatag]").val();
    // console.log(nama)
    $.ajax({
        url: alamat,
        method: "POST",
        dataType: "json",
        data: {
            namasiswa: variable_isian_nama
        },
        success: function(berhasil) {
            alert(berhasil.message);
            location.reload();
        },
        error: function(gagal) {
            console.log(gagal);
        }
    });
});

//Simpan Data Kategori
$(".tombol-simpan").click(function(simpan) {
    simpan.preventDefault();
    var variable_isian_nama = $("input[name=namakategori]").val();
    // console.log(nama)
    $.ajax({
        url: alamat,
        method: "POST",
        dataType: "json",
        data: {
            namasiswa: variable_isian_nama
        },
        success: function(berhasil) {
            alert(berhasil.message);
            location.reload();
        },
        error: function(gagal) {
            console.log(gagal);
        }
    });
});
