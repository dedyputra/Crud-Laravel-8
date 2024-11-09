<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    // Menampilkan daftar pegawai
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Employee::paginate(5);
        }
        return view('datapegawai', compact('data'));
    }

    // Form tambah data pegawai
    public function tambahpegawai()
    {
        return view('tambahdata');
    }

    // Menyimpan data pegawai
    public function insertdata(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|min:7|max:10',
            'notelpon' => 'required|min:11|max:12',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        // Menyimpan data pegawai
        $data = Employee::create($request->all());

        // Upload foto pegawai
        if ($request->hasFile('foto')) {
            $fotoName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('fotopegawai'), $fotoName);
            $data->foto = $fotoName;
            $data->save();
        }

        return redirect()->route('pegawai')->with('success', 'Data Berhasil Ditambahkan :)');
    }

    // Menampilkan form edit data pegawai
    public function tampilkandata($id)
    {
        $data = Employee::find($id);
        return view('editdata', compact('data'));
    }

    // Mengupdate data pegawai
    public function updatedata(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:7|max:10',
            'notelpon' => 'required|min:11|max:12',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = Employee::find($id);
        $data->update($request->all());

        // Jika ada foto baru, upload dan ganti foto lama
        if ($request->hasFile('foto')) {
            $fotoName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('fotopegawai'), $fotoName);
            $data->foto = $fotoName;
            $data->save();
        }

        return redirect()->route('pegawai')->with('success', 'Data Berhasil Diubah :)');
    }

    // Menghapus data pegawai
    public function delete($id)
    {
        $data = Employee::find($id);
        if ($data->foto && file_exists(public_path('fotopegawai/' . $data->foto))) {
            unlink(public_path('fotopegawai/' . $data->foto));
        }
        $data->delete();

        return redirect()->route('pegawai')->with('success', 'Data Berhasil Dihapus :)');
    }

    // Export PDF
    // public function exportpdf()
    // {
    //     $data = Employee::all();
    //     $pdf = Pdf::loadView('datapegawai-pdf', compact('data'))->setPaper('a4', 'landscape');
    //     return $pdf->download('data_pegawai.pdf');
    // }
}
