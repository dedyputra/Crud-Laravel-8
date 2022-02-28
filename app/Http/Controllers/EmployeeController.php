<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
// use PDF;
use Illuminate\Support\Facades\Session;


class EmployeeController extends Controller
{
    // routes pertama
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
            // session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Employee::paginate(5);
            // session::put('halaman_url', request()->fullUrl());
        }
        return view('datapegawai', compact('data'));
    }

    // tambah data
    public function tambahpegawai()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:7|max:20',
            'notelpon' => 'required|min:11|max:12',
        ]);

        $data = Employee::create($request->all());
        // upload gambar/foto   
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('Success', 'Data Berhasil Ditambahkan :) ');
    }

    // public function editfoto($id)
    // {
    //     $edit = editfoto::findorF
    // }

    // menampilkan data
    public function tampilkandata($id)
    {
        $data = Employee::find($id);
        return view('editdata', compact('data'));
    }
    // mengupdate data
    public function updatedata(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        // if (session('halaman_url')) {
        //     // return Redirect(session('halaman_url'))->with('toastr', 'Data Berhasil Diubah :) ');
        // }
        return redirect()->route('pegawai')->with('Success', 'Data Berhasil Diubah :) ');
    }

    // menghapus data
    public function delete($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('Success', 'Data Berhasil Dihapus :) ');
    }

    // Export Ppublic function exportpdf()
    // {
    //     $data = Employee::all();
    //     view()->share('data', $data);
    //     $pdf =  PDF::loadView('datapegawai-pdf', $data);
    //     return $pdf->download('data.pdf');
    // }DF
    // 
}
