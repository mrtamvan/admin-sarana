/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function () {
  $(document).on("click", "#detailModal", function () {
    var nama = $(this).data("nama");
    var email = $(this).data("email");
    var tlp = $(this).data("tlp");
    var tgl_register = $(this).data("registrasi");
    $("#nama").val(nama);
    $("#tlp").val(tlp);
    $("#email").val(email);
    $("#tgl_register").val(tgl_register);
  });
});

$(document).ready(function () {
  $(document).on("click", "#detailDonate", function () {
    var nama = $(this).data("nama");
    var email = $(this).data("email");
    var amount = $(this).data("amount");
    var amount = "Rp " + parseInt(amount).toLocaleString();
    var campaign = $(this).data("campaign");
    var donate_date = $(this).data("datedonate");
    var parts = donate_date.split("-");
    if (parts[1] == "01") {
      var bulan = "Januari";
    }
    if (parts[1] == "02") {
      var bulan = "Februari";
    }
    if (parts[1] == "03") {
      var bulan = "Maret";
    }
    if (parts[1] == "04") {
      var bulan = "April";
    }
    if (parts[1] == "05") {
      var bulan = "Mei";
    }
    if (parts[1] == "06") {
      var bulan = "Juni";
    }
    if (parts[1] == "07") {
      var bulan = "Juli";
    }
    if (parts[1] == "08") {
      var bulan = "Agustus";
    }
    if (parts[1] == "09") {
      var bulan = "September";
    }
    if (parts[1] == "10") {
      var bulan = "Oktober";
    }
    if (parts[1] == "11") {
      var bulan = "Novemver";
    }
    if (parts[1] == "12") {
      var bulan = "Desember";
    }
    var dmyDate = parts[2] + " " + bulan + " " + parts[0];
    // var DateCreated = Date.parse(donate_date).format("MM/dd/yyyy");
    $("#nama").val(nama);
    $("#amount").val(amount);
    $("#email").val(email);
    $("#donate_date").val(dmyDate);
    $("#campaign").val(campaign);
  });
});

// $(document).ready(function () {
//   $("#btnn100").click(function () {
//     $("#baba").val("100");
//     // $("#baba2").val("100");
//     $("#baba").prop("disabled", true);
//   });
//   $("#btnn200").click(function () {
//     $("#baba").val("200");
//     // $("#baba2").val("200");
//     $("#baba").prop("disabled", true);
//   });
//   $("#btnn300").click(function () {
//     $("#baba").val("300");
//     // $("#baba2").val("300");
//     $("#baba").prop("disabled", true);
//   });
//   $("#btnnall").click(function () {
//     $("#baba").val("");
//     $("#baba").removeAttr("disabled");
//     $("#baba2").val("");
//   });
// });

function myfun() {
  $(document).ready(function () {
    $("#baba").val("100");
    $("#baba2").val("100");
    $("#baba").prop("disabled", true);
  });
}
function myfun2() {
  $(document).ready(function () {
    $("#baba").val("200");
    $("#baba2").val("200");
    $("#baba").prop("disabled", true);
  });
}
function myfun3() {
  $(document).ready(function () {
    $("#baba").val("300");
    $("#baba2").val("300");
    $("#baba").prop("disabled", true);
  });
}
function myfun4() {
  $(document).ready(function () {
    $("#baba").val("");
    $("#baba2").val("");
    $("#baba").removeAttr("disabled");
  });
}
