<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Classroom;
use App\Models\Students;
use Illuminate\Http\Request;

class DataSiswa extends Controller
{
    // Tampilkan Data Siswa
    public function index()
    {
        $siswa = Students::paginate(10);
        return view(
            'Dashboard.Pages.MasterData.DataSiswa.datasiswa',compact('siswa')
        );
    }

    public function Tambah()
    {
        $Classroom = Classroom::all();
        return view('Dashboard.Pages.MasterData.DataSiswa.Tambah', compact('Classroom'));
    }

    public function Create(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'kode_kelas' => 'required|exists:classrooms,kode_kelas'
        ], [
            'nis.required' => 'NIS wajib diisi dan tidak boleh kosong.',
            'nis.unique' => 'NIS sudah terdaftar.',
            'nama.required' => 'Nama siswa harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.max' => 'Nomor telepon tidak boleh lebih dari 13 karakter.',
            'kode_kelas.required' => 'Kode kelas wajib diisi.',
            'kode_kelas.exists' => 'Kode kelas yang dipilih tidak valid atau tidak terdaftar dalam tabel schools.'
        ]);

        $siswa = new Students();
        $siswa->fill($request->all());
        $siswa->save();

        return redirect('/datasiswa');
    }

    public function Edit($nis)
    {
        $siswa = new Students();
        $Classroom = Classroom::all();
        return view(
            'Dashboard.Pages.MasterData.DataSiswa.Edit',
            [
                'Siswa' => $siswa->find($nis)
            ],
            compact('Classroom')
        );
    }

    public function Update(Request $request, $nis)
    {
        $cek = [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'kode_kelas' => 'required|exists:classrooms,kode_kelas'
        ];

        if ($nis == $request->nis) {
            $cek['nis'] = "required"; 
        }else{
            $cek['nis'] = "required | uniqe:students";
        }

        $request->validate(
            $cek,
            [
                'nis.required' => 'NIS wajib diisi dan tidak boleh kosong.',
                'nis.unique' => 'NIS sudah terdaftar.',
                'nama.required' => 'Nama siswa harus diisi.',
                'alamat.required' => 'Alamat harus diisi.',
                'no_telp.required' => 'Nomor telepon wajib diisi.',
                'no_telp.max' => 'Nomor telepon tidak boleh lebih dari 13 karakter.',
                'kode_kelas.required' => 'Kode kelas wajib diisi.',
                'kode_kelas.exists' => 'Kode kelas yang dipilih tidak valid atau tidak terdaftar dalam tabel schools.'
            ]
        );

        $data = $request->except('_token');

        $siswa = Students::find($nis);

        if ($siswa) {
            $siswa->update($data);
            return redirect('/datasiswa')->with('success', 'Data Berhasil DiUpdate');
        } else {
            return redirect('/datasiswa')->with('error', 'Data Siswa Tidak Ditemukan');
        }
    }

    public function Hapus($nis){
        $siswa = Students::find($nis);
        if ($siswa) {
            $siswa->delete();
            return redirect('/datasiswa')->with('success', 'Data Siswa Berhasil Dihapus');
        } else {
            return redirect('/datasiswa')->with('error', 'Data Siswa Tidak Ditemukan');
        }
    }
}
