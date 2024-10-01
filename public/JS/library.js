class Library {
    constructor() {
        this.peminjaman = {};
        this.pengembalian = {};
    }

    async ambilDataPeminjaman() {
        try {
            const response = await axios.get('/api/detail-peminjaman');
            this.peminjaman = response.data;
        } catch (error) {
            console.error('Gagal mengambil data peminjaman:', error);
        }
    }

    async ambilDataPengembalian() {
        try {
            const response = await axios.get('/api/detail-pengembalian');
            this.pengembalian = response.data;
        } catch (error) {
            console.error('Gagal mengambil data pengembalian:', error);
        }
    }

    async pinjamBuku(idBuku, idSiswa) {
        try {
            const response = await axios.post('/api/peminjaman', {
                id_buku: idBuku,
                id_siswa: idSiswa
            });
            console.log(`Buku dengan ID '${idBuku}' berhasil dipinjam oleh siswa dengan ID '${idSiswa}'.`);
            await this.ambilDataPeminjaman();
        } catch (error) {
            console.error('Gagal meminjam buku:', error);
        }
    }

    async kembalikanBuku(idPeminjaman) {
        try {
            const response = await axios.post('/api/pengembalian', {
                id_peminjaman: idPeminjaman
            });
            console.log(`Peminjaman dengan ID '${idPeminjaman}' berhasil dikembalikan.`);
            await this.ambilDataPengembalian();
        } catch (error) {
            console.error('Gagal mengembalikan buku:', error);
        }
    }
}

const library = new Library();
library.ambilDataPeminjaman();
library.ambilDataPengembalian();
