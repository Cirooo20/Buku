let list_produk = []
document.getElementById("nis").onkeydown = function (evt) {
    if (evt.key == "Enter" || evt.key == "Tab") {
        let nis = document.getElementById("nis").value
        axios.get(`http://127.0.0.1:8000/peminjaman/tambah/${nis}`)
            .then(respon => {
                let p = respon.data
                document.getElementById("nama").value = respon.data.nama
                document.getElementById("kode_kelas").value = respon.data.kode_kelas
                document.getElementById("kode_buku").focus()
            })
            .catch(error => {
                document.getElementById("nama").value = ""
                document.getElementById("kode_kelas").value = ""
                document.getElementById("error-nis").innerText = "NIS tidak ditemukan"
            })
    }
}

document.getElementById("kode_buku").onkeydown = function (e) {
    if (e.key == "Enter" || e.key == "Tab") {
        let kode_buku = document.getElementById("kode_buku").value
        axios.get(`http://127.0.0.1:8000/peminjaman/tambah/Buku/${kode_buku}`)
            .then(respon => {
                let p = respon.data
                document.getElementById("judul").value = p.judul || ''
                document.getElementById("penulis").value = p.penulis || ''
                document.getElementById("penerbit").value = p.penerbit || ''
                document.getElementById("tahun_terbit").value = p.tahun_terbit || ''
                document.getElementById("kode_buku").setCustomValidity("")
                document.getElementById("jumlah").focus()
            })
            .catch(error => {
                document.getElementById("kode_buku").focus()
                document.getElementById("error-kode_buku").innerText = "Kode buku tidak ditemukan"
            })
    }
}

document.getElementById("jumlah").onkeydown = (evt) => {
    if (evt.key == 'Enter' || evt.key == 'Tab') {
        list_produk.push({
            kode_buku: document.getElementById('kode_buku').value,
            judul: document.getElementById('judul').value,
            penulis: document.getElementById('penulis').value,
            penerbit: document.getElementById('penerbit').value,
            tahun_terbit: document.getElementById('tahun_terbit').value,
            jumlah: document.getElementById('jumlah').value,
        })
        Tambah_produk()

        document.getElementById("kode_buku").focus()
        document.getElementById("kode_buku").value = ""
        document.getElementById("judul").value = ""
        document.getElementById("penulis").value = ""
        document.getElementById("penerbit").value = ""
        document.getElementById("tahun_terbit").value = ""
        document.getElementById("jumlah").value = ""
    }
}


function Tambah_produk() {
    let isi = ""
    list_produk.forEach((element, index) => {
        isi += `
        <tr class="align-middle border-b border-white">
            <td class="px-4 py-2 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                <button onclick="batal(${index})" class="text-white font-bold py-1 px-2 rounded flex items-center justify-center">
                    <i class="text-white">&#10005;</i>
                </button>
            </td>
            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                <label for="kode_buku" class="form-label">Kode Buku</label>
                <input type="text" name="kode_buku[]" value="${element.kode_buku}" class="form-input form-input-sm text-black focus:outline-none" readonly>
            </td>
            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                <label for="judul" class="form-label">Judul Buku</label>
                <input type="text" name="judul[]" value="${element.judul}" class="form-input form-input-sm text-black focus:outline-none" readonly>
            </td>
            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" name="penulis[]" value="${element.penulis}" class="form-input form-input-sm text-black focus:outline-none" readonly>
            </td>
            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" name="penerbit[]" value="${element.penerbit}" class="form-input form-input-sm text-black focus:outline-none" readonly>
            </td>
            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" name="tahun_terbit[]" value="${element.tahun_terbit}" class="form-input form-input-sm text-black focus:outline-none" readonly>
            </td>
            <td class="px-4 py-2 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                <label for="jumlah" class="form-label">Jumlah Buku</label>
                <input type="number" name="jumlah[]" value="${element.jumlah}" class="form-input form-input-sm text-black focus:outline-none" readonly>
            </td>
        </tr>
        `
    });
    document.querySelector("table#bookTable tbody").innerHTML = isi
}

function batal(index) {
    list_produk.splice(index, 1);
    Tambah_produk();
}

document.getElementById("kirim").addEventListener("click", function (e) {
    document.forms["form_transaksi"].submit();
});
