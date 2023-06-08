<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PesanController;
use App\Models\Admin;
use App\Models\Destinasi;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index(Request $request) 
    {
      
        if ($this->user->getRoleNames()[0] == 'superadmin') {
            $total_roles = count(Role::select('id')->get());
        $total_admins = count(Admin::select('id')->get());
        $total_permissions = count(Permission::select('id')->get());

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $no_tiket = $request->no_tiket;
        $totalBelumLunas = Pesan::where('status','!=','Paid')->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->get()->count();
        $totalLunas = Pesan::where('status','Paid')->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->get()->count();

        $sumBelumLunas = Pesan::where('status','!=','Paid')->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->sum('jumlah_bayar');
        $sumLunas = Pesan::where('status','Paid')->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->sum('jumlah_bayar');

        $dataTiket = Pesan::where(function ($query) use ($start_date,$end_date,$no_tiket) {
            $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            $query->where('no_tiket', 'like', '%' . $no_tiket. '%');
        })->orderBy('id_destinasi','asc')->get();

        $destinasi = Destinasi::get();


        return view('backend.pages.dashboard.index', compact('destinasi','total_admins', 'total_roles', 'total_permissions','totalBelumLunas','totalLunas','sumBelumLunas','sumLunas','dataTiket'));
        }elseif ($this->user->getRoleNames()[0] == 'Role Pengelola Destinasi') {
            return Redirect::to('/admin/dashboard-pengelola');
        }elseif ($this->user->getRoleNames()[0] == 'Role Pengunjung') {
            return Redirect::to('/admin/dashboard-pengunjung');
        }

        
    }

    public function print(Request $request) 
    {
      
        if ($this->user->getRoleNames()[0] == 'superadmin') {
            $total_roles = count(Role::select('id')->get());
        $total_admins = count(Admin::select('id')->get());
        $total_permissions = count(Permission::select('id')->get());

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $no_tiket = $request->no_tiket;
        $totalBelumLunas = Pesan::where('status','!=','Paid')->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->get()->count();
        $totalLunas = Pesan::where('status','Paid')->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->get()->count();

        $sumBelumLunas = Pesan::where('status','!=','Paid')->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->sum('jumlah_bayar');
        $sumLunas = Pesan::where('status','Paid')->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->sum('jumlah_bayar');

        $dataTiket = Pesan::where(function ($query) use ($start_date,$end_date,$no_tiket) {
            $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            $query->where('no_tiket', 'like', '%' . $no_tiket. '%');
            $query->where('status', 'Paid');
        })->get();

        $destinasi = Destinasi::get();


        return view('backend.pages.dashboard.print', compact('destinasi','total_admins', 'total_roles', 'total_permissions','totalBelumLunas','totalLunas','sumBelumLunas','sumLunas','dataTiket'));
        }elseif ($this->user->getRoleNames()[0] == 'Role Pengelola Destinasi') {
            return Redirect::to('/admin/dashboard-pengelola');
        }elseif ($this->user->getRoleNames()[0] == 'Role Pengunjung') {
            return Redirect::to('/admin/dashboard-pengunjung');
        }    
    }

    public function printPengelola(Request $request) 
    {
        // dd($this->user);
        if (!$this->user->can('Dashboard Pengelola view')) {
            return Redirect::to('/');
        }   

        $destinasi = $this->user->id_destinasi;

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $no_tiket = $request->no_tiket;
        $totalBelumLunas = Pesan::where('status','!=','Paid')->where('id_destinasi',$destinasi)->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->get()->count();
        $totalLunas = Pesan::where('status','Paid')->where('id_destinasi',$destinasi)->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->get()->count();

        $sumBelumLunas = Pesan::where('status','!=','Paid')->where('id_destinasi',$destinasi)->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->sum('jumlah_bayar');
        $sumLunas = Pesan::where('status','Paid')->where('id_destinasi',$destinasi)->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->sum('jumlah_bayar');    

        // dd($totalBelumLunas);
        $dataTiket = Pesan::where('id_destinasi',$destinasi)
            ->where(function ($query) use ($start_date,$end_date,$no_tiket) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            $query->where('no_tiket', 'like', '%' . $no_tiket. '%');
            $query->where('status', 'Paid');
            })->get();

        $destinasi = Destinasi::get();


        return view('backend.pages.dashboard.print', compact('totalBelumLunas','totalLunas','sumBelumLunas','sumLunas','dataTiket'));
    }

    public function indexPengunjung(Request $request) 
    {
        // dd($this->user);
        if (!$this->user->can('Dashboard Pengunjung view')) {
            return Redirect::to('/');
        }   

        $data['pesananBelumSelesai'] = Pesan::where('id_user',$this->user->id)->where('status','!=','Paid')->get()->count();
        $data['pesananSelesai'] = Pesan::where('id_user',$this->user->id)->where('status','Paid')->get()->count();
        return view('backend.pages.dashboard.indexPengunjung',$data);
    }

    public function indexPengelola(Request $request) 
    {
        // dd($this->user);
        if (!$this->user->can('Dashboard Pengelola view')) {
            return Redirect::to('/');
        }   

        $destinasi = $this->user->id_destinasi;

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $no_tiket = $request->no_tiket;
        $totalBelumLunas = Pesan::where('status','!=','Paid')->where('id_destinasi',$destinasi)->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->get()->count();
        $totalLunas = Pesan::where('status','Paid')->where('id_destinasi',$destinasi)->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->get()->count();

        $sumBelumLunas = Pesan::where('status','!=','Paid')->where('id_destinasi',$destinasi)->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->sum('jumlah_bayar');
        $sumLunas = Pesan::where('status','Paid')->where('id_destinasi',$destinasi)->where(function ($query) use ($start_date,$end_date) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
            })->sum('jumlah_bayar');    

        // dd($totalBelumLunas);
        $dataTiket = Pesan::where('id_destinasi',$destinasi)
            ->where(function ($query) use ($start_date,$end_date,$no_tiket) {
                $query->whereBetween(\DB::raw('DATE(created_at)'), [$start_date,$end_date]);
                $query->where('no_tiket', 'like', '%' . $no_tiket. '%');
            })->get();


        return view('backend.pages.dashboard.indexPengelola', compact('totalBelumLunas','totalLunas','sumBelumLunas','sumLunas','dataTiket'));
    }


    public function profile(){
        $data['user'] = Admin::find($this->user->id);
        return view('backend.pages.dashboard.profile', $data);
    }

    public function updateProfile(Request $request,$id)
    {
        $admin = Admin::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            // 'email' => 'required|max:100|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        session()->flash('success', 'Profile has been updated !!');
        return back();
    }
}
