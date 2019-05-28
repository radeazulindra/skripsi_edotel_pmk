<div class="form-group">
    <label for="nama_barang">Nama Barang *</label>
    <datalist id="barangList">
        <select name="nama_barang" id='barangOption'></select>
    </datalist>
    <input name="nama_barang" type="text" id=”nama_barang” class="form-control" list="barangList" required value="{{ isset($bKeluar->barang->nama_barang) ? $bKeluar->barang->nama_barang : ''}}" oninput="getJumlahBarang(value)" autocomplete="off">
</div>
<hr>
<div class="form-group">
    <label for="datePicker">Tanggal Barang Keluar *</label>
    <input name="tanggal_keluar" type="date" id="datePicker" class="form-control" required value="{{ isset($bKeluar->tanggal_keluar) ? $bKeluar->tanggal_keluar : ''}}">
</div>
<div class="form-group">
    <label for="jumlahBKeluar">Jumlah *</label>
    <input name="jumlah" type="number" id="jumlahBKeluar" class="form-control" required value="{{ isset($bKeluar->jumlah) ? $bKeluar->jumlah : ''}}">
    <p id="jumlahStok"></p>
</div>
<div class="form-group">
    <label>Nama Pegawai *</label>
    <input name="nama_pegawai" type="text" class="form-control" required value="{{ isset($bKeluar->nama_pegawai) ? $bKeluar->nama_pegawai : ''}}">
</div>
<div class="form-group">
    <label>Tujuan *</label>
    <input name="tujuan" type="text" class="form-control" required value="{{ isset($bKeluar->tujuan) ? $bKeluar->tujuan : ''}}">
</div>
<hr>
<div class="float-right">
    <input class="btn btn-success" type="submit" value="{{ $formMode === 'edit' ? 'Perbarui' : 'Tambah' }}">
</div>

<script>
    // GET TODAY DATE
    if ($('#datePicker').val() === ''){
        $(function() {
            var now = new Date();
            var month = (now.getMonth() + 1);               
            var day = now.getDate();
            if (month < 10) 
                month = "0" + month;
            if (day < 10) 
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            $('#datePicker').val(today);
        });
    }

    // GET BARANG LIST
    var listBarang = [];
    $.get( "{{ route('ajaxbarang') }}", function(respond){
        var data = JSON.parse(respond);
        for (let i = 0; i < data.length; i++) {
            var barang = [];
            barang.push(data[i]['id']);
            barang.push(data[i]['nama_barang']);
            barang.push(data[i]['jenis_barang']);
            barang.push(data[i]['jumlah']);
            window.listBarang.push(barang);
            console.log("barang: " + data[i]['id'] + " added");
        }
        getBarangOptionData();
    });

    function getBarangOptionData() {
        $("#barangOption").empty();
        for (var i = 0; i < window.listBarang.length; i++) {
            var setHTML = '';
            var barang = window.listBarang[i];
            var namaBarang = barang[1];
            setHTML += '<option value="'+namaBarang+'">'+namaBarang+'</option>';
            $("#barangOption").append(setHTML);
        }
    }

    function getJumlahBarang(value) {
        $("#jumlahStok").empty();
        for (let i = 0; i < window.listBarang.length; i++) {
            var setHTML = '';
            var barang = window.listBarang[i];
            var namaBarang = barang[1];
            if (value === namaBarang) {
                var jumlahBarang = barang[3];
                setHTML = 'Stok barang saat ini = '+jumlahBarang+'';
                $("#jumlahStok").append(setHTML);
                $('input[name="jumlah"]').attr({"max":jumlahBarang})
                console.log('masuk');
            }
            console.log('masuk2');      
        }
        console.log('masuk3');
    }

    // Find all inputs on the DOM which are bound to a datalist via their list attribute.
    var inputs = document.querySelectorAll('input[list]');
    for (var i = 0; i < inputs.length; i++) {
        // When the value of the input changes...
        inputs[i].addEventListener('change', function() {
            var optionFound = false,
            datalist = this.list;
            // Determine whether an option exists with the current value of the input.
            for (var j = 0; j < datalist.options.length; j++) {
                if (this.value == datalist.options[j].value) {
                    optionFound = true;
                    break;
                }
            }
            // use the setCustomValidity function of the Validation API
            // to provide an user feedback if the value does not exist in the datalist
            if (optionFound) {
            this.setCustomValidity('');
            } else {
            this.setCustomValidity('Please select a valid value.');
            }
        });
    }
</script>