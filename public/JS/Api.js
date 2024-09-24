let list_produk = []

document.getElementById("nis").onkeydown = function (e) {
    if (e.key == "Tab") {
        let nis = document.getElementById("nis").value
        axios.get(`http://127.0.0.1:8000/peminjaman/tambah/${nis}`)
            .then(respon => {
                console.log(respon.data)
                if (respon.data && respon.data.nama && respon.data.kode_kelas) {
                    document.getElementById("nama").value = respon.data.nama
                    document.getElementById("kode_kelas").value = respon.data.kode_kelas
                    document.getElementById("kode_buku").focus()
                } else {
                    alert("Data siswa tidak lengkap atau tidak tersedia")
                    document.getElementById("nis").focus()
                    document.getElementById("nis").setCustomValidity("Data siswa tidak lengkap")
                }
            })
            .catch(error => {
                console.error(error);
                document.getElementById("nis").focus()
                document.getElementById("nis").setCustomValidity("NIS tidak terdaftar atau terjadi kesalahan")
            });
    }
};

document.getElementById("kode_buku").onkeydown = function (e) {
    if (e.key == "Tab") {
        let kode_buku = document.getElementById("kode_buku").value
        axios.get(`http://127.0.0.1:8000/peminjaman/tambah/Buku/${kode_buku}`)
            .then(respon => {
                console.log(respon.data)
                if (respon.data && respon.data.judul) {
                    document.getElementById("judul").value = respon.data.judul
                    document.getElementById("penulis").value = respon.data.penulis || ''
                    document.getElementById("penerbit").value = respon.data.penerbit || ''
                    document.getElementById("tahun_terbit").value = respon.data.tahun_terbit || ''
                    document.getElementById("kode_buku").setCustomValidity("")
                    document.getElementById("jumlah_buku").focus()
                } else {
                    throw new Error("Data buku tidak lengkap")
                }
            })
            .catch(error => {
                console.error(error);
                document.getElementById("kode_buku").focus()
                document.getElementById("kode_buku").setCustomValidity("Kode buku tidak terdaftar atau data tidak lengkap")
                document.getElementById("kode_buku").reportValidity()
            });
    }
};

document.getElementById("jumlah_buku").onkeydown = function (e) {
    if (e.key == "Tab") {
        e.preventDefault();
        tambahProduk();
    }
};

function tambahProduk() {
    let kode_buku = document.getElementById("kode_buku").value;
    let judul = document.getElementById("judul").value;
    let penulis = document.getElementById("penulis").value;
    let penerbit = document.getElementById("penerbit").value;
    let tahun_terbit = document.getElementById("tahun_terbit").value;
    let jumlah_buku = document.getElementById("jumlah_buku").value;

    if (kode_buku && judul && penulis && penerbit && tahun_terbit && jumlah_buku) {
        list_produk.push({
            kode_buku: kode_buku,
            judul: judul,
            penulis: penulis,
            penerbit: penerbit,
            tahun_terbit: tahun_terbit,
            jumlah_buku: jumlah_buku
        });
        Tambah_produk();

        document.getElementById("kode_buku").value = "";
        document.getElementById("judul").value = "";
        document.getElementById("penulis").value = "";
        document.getElementById("penerbit").value = "";
        document.getElementById("tahun_terbit").value = "";
        document.getElementById("jumlah_buku").value = "";
        document.getElementById("kode_buku").focus();
    } else {
        alert("Semua field harus diisi!");
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
                            <td
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="kode_buku" class="form-label">Kode Buku</label>
                                <input type="text" name="kode_buku[]"
                                    class="form-input form-input-sm text-black focus:outline-none @error('kode_buku') border-red-500 @enderror"
                                    value="${element.kode_buku}" readonly>
                            </td>
                            <td
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <input type="text" name="judul[]"
                                    class="form-input form-input-sm text-black focus:outline-none" readonly
                                    value="${element.judul}">
                            </td>
                            <td
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" name="penulis[]"
                                    class="form-input form-input-sm text-black focus:outline-none" readonly
                                    value="${element.penulis}">
                            </td>
                            <td
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" name="penerbit[]"
                                    class="form-input form-input-sm text-black focus:outline-none" readonly
                                    value="${element.penerbit}">
                            </td>
                            <td
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                <input type="text" name="tahun_terbit[]"
                                    class="form-input form-input-sm text-black focus:outline-none" readonly
                                    value="${element.tahun_terbit}">
                            </td>
                            <td
                                class="px-4 py-2 text-left text-xs font-medium uppercase tracking-wider border-r border-white">
                                <label for="jumlah_buku" class="form-label">Jumlah Buku</label>
                                <input type="number" name="jumlah_buku[]" class="form-input form-input-sm text-black focus:outline-none @error('jumlah_buku') border-red-500 @enderror" value="${element.jumlah_buku}" readonly>
                            </td>
                        </tr>
        `
    });
    document.getElementById("bookTableBody").innerHTML = isi
}

function batal(index) {
    list_produk.splice(index, 1);
    Tambah_produk();
}

document.getElementById("kirim").onclick = function (e) {
    document.forms["form"].submit();
}
