var data =[
    "Rekayasa Perangkat Lunak",
    "Teknologi Penyempurnaan Tekstil",
    "Teknik Konsturksi"
];

function tampil ( ) {
    var tabel = document.getElementById('tabel');
    // tabel.innerHTML = "<tr><th>NO</th><th>Nama Mobil</th><th>Action</th></tr>";
    tabel.innerHTML = "<tr><th>NO</th></tr>";
    tabel.innerHTML = "<tr><th>Nama Mobil</th></tr>";
    tabel.innerHTML = "<tr><th>Warna</th></tr>";
    tabel.innerHTML = "<tr><th>Harga</th></tr>";
    for (let i = 0; i < data.length; i++) {
        var btnEdit = "<button class='btn-edit' onclick='edit("+i+")'  type='button' >Edit</button>";
        var btnHapus = "<button class='btn-hapus' onclick='hapus("+i+")'  type='button' >Hapus</button>";
        j = i + 1;
        tabel.innerHTML += "<tr><td>"+j+"</td><tr>";
        tabel.innerHTML += "<tr><td>"+data[i]+"</td><tr>";
        tabel.innerHTML += "<tr><td>"+j+"</td><td>"+data[i]+"</td><td>"+btnEdit+" "+btnHapus+"</td><tr>";
    }

}
function tambah ( ) {
 var input =document.querySelector("input[name =jurusan]");
 data.push(input.value);
 tampil();
}

function edit (id) {
var baru = prompt("Edit", data[id]);
data [id] = baru;
tampil();
}

function hapus (id) {
data.pop(id);
tampil();
}

tampil();