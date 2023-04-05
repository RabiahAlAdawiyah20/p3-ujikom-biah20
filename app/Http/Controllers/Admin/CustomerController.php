<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use ErrorException;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\AddCustomerRequest;
use Illuminate\Support\Facades\Hash;
use App\Jobs\RegisterCustomerJob;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class CustomerController extends Controller
{


    public function index()
    {
      $customer = User::where('auth','Customer')->get();
      return view('modul_admin.customer.index', compact('customer'));
    }

    public function show($id)
    {
      $customer = User::with('transaksiCustomer')->where('id',$id)->first();
      return view('modul_admin.customer.infoCustomer', compact('customer'));
    }

    //create
    public function create()
    {
        return view('modul_admin.customer.create-add');
    }
   // Store
    public function store(Request $request)
    {

      try {
        DB::beginTransaction();


        $phone_number = preg_replace('/^0/','62',$request->no_telp);
        $password = str::random(8);

        $addCustomer = User::create([
          'karyawan_id' => Auth::id(),
          'name'        => $request->name,
          'email'       => $request->email,
          'auth'        => 'Customer',
          'status'      => 'Active',
          'no_telp'     => $phone_number,
          'alamat'      => $request->alamat,
          'password'    => Hash::make($password)
        ]);

        $addCustomer->assignRole($addCustomer->auth);

        if ($addCustomer) {
          // Menyiapkan data Email
          $data = array(
              'name'            => $addCustomer->name,
              'email'           => $addCustomer->email,
              'password'        => $password,
              'url_login'       => url('/login'),
              'nama_laundry'    => Auth::user()->nama_cabang,
              'alamat_laundry'  => Auth::user()->alamat_cabang,
          );
          // Kirim email
           if (setNotificationEmail(1) == 1) {
            dispatch(new RegisterCustomerJob($data));
           }
        }
        DB::commit();
        Session::flash('success','Customer Berhasil Ditambah !');
        return redirect('customer');
      } catch (ErrorException $e) {
        DB::rollback();
        throw new ErrorException($e->getMessage());
      }
    }

    //edit
    public function update(Request $request, $id)
{
    $customer = User::findOrFail($id);
    $customer->name = $request->name;
    $customer->alamat = $request->alamat;
    $customer->no_telp = $request->no_telp;
    $customer->email = $request->email;
    $customer->save();

    return redirect()->back()->with('success', 'Data customer berhasil diubah!');
}


    // Proses edit data
    public function dataedit(Request $request)
{
    $editdata = User::find($request->id_data);
    $editdata->update([
        'name' => $request->name,
        'alamat' => $request->alamat,
        'no_telp' => $request->no_telp,
        'email' => $request->email,
    ]);
    Session::flash('success', 'Edit Data Berhasil');
    return $editdata;
}

public function destroy($id)
{
    $customer = user::find($id);
    if (!$customer) {
        return redirect()->back()->with('error', 'Pelanggan tidak ada');
    }

    $customer->delete();

    return redirect()->back()->with('Berhasil', 'Pelanggan berhasil dihapus');
}

}
