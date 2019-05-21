@extends('layouts.app')

@section('content')

<style>
    .room {
        float: left;
        display: block;
        margin: 5px;
        background: lightgreen;
        width: 100px;
        height: 50px;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
        line-height: 25px;
    }

    .room-select {
        display: none;
    }

    .room-select:checked+.room {
        background: lightskyblue;
    }

    label.selected {
        background: lightskyblue;
    }

    label.occupied {
        background: lightcoral;
    }
</style>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('reservasi.index') }}">Kembali</a>
            <br><br>
            @if ($title == 'Form Reservasi')
                @include('resepsionis.reservasi.form')
            @else
                @include('resepsionis.reservasi.formregistrasi')
            @endif
        </div>
    </div>

<script>

    // SET TODAY'S DATE AS MINIMUM RESERVATION DATE
    $(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        var curDate = year + '-' + month + '-' + day;
        $('#dateFrom').attr('min', curDate);
    });

    // jika input tanggal checkin diganti, hapus daftar kamar tersedia, kamar dipilih, dan total harga
    // SET INPUT DATE FROM +1 AS MINIMUM INPUT DATE TO
    $("#dateFrom").on('change', function(){
        var setMinDtTo = new Date(this.value);
        var month = setMinDtTo.getMonth() + 1;
        var day = setMinDtTo.getDate() + 1;
        var year = setMinDtTo.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        var minDateTo = year + '-' + month + '-' + day;
        document.getElementById("dateTo").valueAsDate = null; //CLEAR VALUE IF CHANGE CHECKIN DATE
        $("#dateTo").attr("min", minDateTo);

        $("#daftar_kamar").empty();
        $("#total_harga").empty();
        listReservasiKamar = [];
    });

    // jika input tanggal checkin diganti, hapus daftar kamar tersedia, kamar dipilih, dan total harga
    $("#dateTo").on('change', function(){
        $("#daftar_kamar").empty();
        $("#total_harga").empty();
        listReservasiKamar = [];
    })

    // GET KAMAR LIST
    var listKamar = [];
    $.get( "{{ route('ajaxkamar') }}", function(respond){
        var data = JSON.parse(respond);
        for (let i = 0; i < data.length; i++) {
            var kamar = [];
            kamar.push(data[i]['id']);
            kamar.push(data[i]['no_kamar']);
            kamar.push(data[i]['tipe_kamar']);
            kamar.push(data[i]['harga']);
            kamar.push(data[i]['status']);
            window.listKamar.push(kamar);
            console.log("kamar: " + data[i]['no_kamar'] + " added");
        }
    });

    // GET RESERVASI LIST
    var listReservasi = [];
    $.get( "{{ route('ajaxreservasi') }}", function(respond){
        var data = JSON.parse(respond);
        for (let i = 0; i < data.length; i++) {
            var reservasi = [];
            reservasi.push(data[i]['id_reservasi']);
            reservasi.push(data[i]['id_kamar']);
            reservasi.push(data[i]['id_reservasi_kamar']);
            reservasi.push(data[i]['tanggal_checkin']);
            reservasi.push(data[i]['tanggal_checkout']);
            window.listReservasi.push(reservasi);
            console.log("reservasi id: " + data[i]['id_reservasi'] +","+ "resv kamar id: "+data[i]['id_kamar']+" added");
        }
    });

    // GET TAMU LIST
    var listTamuHotel = [];
    $.get( "{{ route('ajaxtamu') }}", function(respond){
        var data = JSON.parse(respond);
        for (let i = 0; i < data.length; i++) {
            var tamuHotel = [];
            tamuHotel.push(data[i]['id_tamu']);
            tamuHotel.push(data[i]['id_kamar']);
            tamuHotel.push(data[i]['id_tagihan_tamu']);
            tamuHotel.push(data[i]['tanggal_checkin']);
            tamuHotel.push(data[i]['tanggal_checkout']);
            window.listTamuHotel.push(tamuHotel);
            console.log("tamu id: "+data[i]['id_tamu']+","+"tamu kamar id : "+data[i]['id_kamar']+" added");
        }
    });

    // FIND KAMAR TERSEDIA
    var dtFrom; //INPUT DATE FROM
    var dtTo; // INPUT DATE TO
    function buatSelector(){
        var dateFrom = document.getElementById("dateFrom").value;
        var dateTo = document.getElementById("dateTo").value;
        window.dtFrom = new Date(dateFrom);
        window.dtTo = new Date(dateTo);

        if (dateFrom != '' && dateTo != '' && dateTo > dateFrom) {
            $("#daftar_kamar").empty();
            for (let i = 0; i < window.listKamar.length; i++) {
                var kamar = window.listKamar[i];
                var idKamar = kamar[0];
                var noKamar = kamar[1];
                var tipeKamar = kamar[2];
                var hargaKamar = kamar[3];
                var statusKamar = kamar[4] == "Dalam Perbaikan" ? "disabled" : "";
                var isOccupied = "";
                if (statusKamar == "disabled") {
                    isOccupied = "occupied";
                }
                if(!cekTersedia(idKamar)){
                    isOccupied = "occupied";
                    statusKamar = "disabled";
                }
                var lamaMenginap = parseInt((window.dtTo-window.dtFrom)/(24*3600*1000)) ;
                var setHTML = '<input id="room-'+idKamar+'" onclick="setTotalHarga('+hargaKamar+','+idKamar+','+lamaMenginap+')" class="room-select" '+statusKamar+' type="checkbox" value="'+idKamar+'" name="room[]" /><label for="room-'+idKamar+'" class="room '+isOccupied+'">'+noKamar+'<br>'+tipeKamar+' Room</label>';
                
                $("#daftar_kamar").append(setHTML);
            }
        }
    }

    function cekTersedia(idKamar){
        var isTersedia = true;
        var listRevs = window.listReservasi;
        var listTamu = window.listTamuHotel;

        console.log("Kamar "+idKamar)
        for (var i = 0; i < listRevs.length; i++) {
            var revIdKamar = listRevs[i][1];
            var checkin = listRevs[i][3];
            var dateCheckin = new Date(checkin);
            var checkout = listRevs[i][4];
            var dateCheckout = new Date(checkout);
            if(idKamar == revIdKamar){
                console.log("idnya sama");
                if(window.dtTo <= dateCheckin){
                    console.log("kamar tersedia");
                } else {
                    if(window.dtFrom >= dateCheckout){
                        console.log("kamar tersedia");
                    } else {
                        console.log("kamar terisi");
                        isTersedia = false;
                    }
                }
            } 
        }

        for (let i = 0; i < listTamu.length; i++) {
            var tamuIdKamar = listTamu[i][1];
            var checkin = listTamu[i][3];
            var checkout = listTamu[i][4];
            var dateCheckin = new Date(checkin);
            var dateCheckout = new Date(checkout);
            if (idKamar == tamuIdKamar) {
                console.log("dapat id yg sama");
                if (window.dtTo <= dateCheckin) {
                    console.log("kamar tersedia input date checkout < tamu checkin");
                } else {
                    if (window.dtFrom >= dateCheckout) {
                        console.log("kamar tersedia input date checkin > tamu checkout");
                    } else {
                        console.log("kamar tidak dapat dipesan")
                        isTersedia = false;
                    }
                }
            }
        }
        console.log("Kamar "+isTersedia)
        return isTersedia;
    }

    // setTotalHarga
    var listReservasiKamar = [];
    function setTotalHarga(hargaKamar, idKamar, lamaMenginap){
        var isReserved = false;
        for (let i = 0; i < window.listReservasiKamar.length; i++) {
            if (idKamar == window.listReservasiKamar[i][0]) {
                isReserved = true;
                window.listReservasiKamar.splice(i, 1); 
                break;
            }
        }
        if (isReserved == false) {
            var pesanan = [];
            hargaKamar *= lamaMenginap;
            pesanan.push(idKamar);
            pesanan.push(hargaKamar);
            window.listReservasiKamar.push(pesanan);
        }
        var totalHarga = 0;
        for (let i = 0; i < window.listReservasiKamar.length; i++) {
            totalHarga += window.listReservasiKamar[i][1];
        }
        $("#total_harga").empty();
        var setHTML = '<div>Rp. '+totalHarga.toLocaleString()+'</div><input name="total_tagihan" type="number" hidden value="'+totalHarga+'">';
        $("#total_harga").append(setHTML);
    }

    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

@endsection