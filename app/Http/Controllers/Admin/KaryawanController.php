<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddKaryawanRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kry = User::where('auth','Karyawan')->get();
      return view('modul_admin.pengguna.kry', compact('kry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('modul_admin.pengguna.addkry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddKaryawanRequest $request)
    {
        $phone_number = preg_replace('/^0/','62',$request->no_telp);
        $adduser = New User();
        $adduser->name          = $request->name;
        $adduser->email         = $request->email;
        $adduser->nama_cabang   = $request->nama_cabang;
        $adduser->alamat        = $request->alamat;
        $adduser->alamat_cabang = $request->alamat_cabang;
        $adduser->no_telp       = $phone_number;
        $adduser->status        = 'Active';
        $adduser->auth          = 'Karyawan';
        $adduser->password      = Hash::make($request->password);
        $adduser->save();

      $adduser->assignRole($adduser->auth);

      Session::flash('success','Karyawan Berhasil Dibuat.');
      return redirect('karyawan');
    }

    // Update Status Karyawan
    public function updateKaryawan(Request $request)
    {
      $karyawan = User::find($request->id);
      $karyawan->update([
        'status'  => $karyawan->status == 'Active' ? 'Not Active' : 'Active'
      ]);

      Session::flash('success','Status Karyawan Berhasil Diupdate.');
    }


    public function edit($id)
{
    $karyawan = user::find($id);
    return view('modul_admin.pengguna.edit', compact('karyawan'));
}

    public function destroy($id)
{
    $customer = user::find($id);
    if (!$customer) {
        return redirect()->back()->with('error', 'Kasir tidak ada');
    }

    $customer->delete();

    return redirect()->back()->with('Berhasil', 'Kasir berhasil dihapus');
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'alamat_cabang' => 'required|string|max:255',
        'nama_cabang' => 'required|string|max:255',
        'no_telp' => 'required|string|max:255',
        'status' => 'required|string|in:Active,Inactive',
    ]);

    $karyawan = User::findOrFail($id);
    $karyawan->name = $validatedData['name'];
    $karyawan->email = $validatedData['email'];
    $karyawan->alamat_cabang = $validatedData['alamat_cabang'];
    $karyawan->nama_cabang = $validatedData['nama_cabang'];
    $karyawan->no_telp = $validatedData['no_telp'];
    $karyawan->status = $validatedData['status'];
    $karyawan->save();

    return redirect()->route('karyawan.index')
                     ->with('success','Kasir berhasil diperbarui.');
}

}
