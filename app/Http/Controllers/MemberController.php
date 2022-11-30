<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function GetAllMember()
    {
        $dataUser = DB::table('user')->get();
        $dataMember = DB::table('member')->join('user', 'user.id_user', '=', 'member.id_user')->get();
        return view('admin.member', [
            'member' => $dataMember,
            'title' => 'data member'
        ]);
    }
    public function AddMember(Request $request)
    {
        $validation = $request->validate([
            'id_user' => 'required',
            'kode_member' => 'required',
            'nama_member' => 'required',
            'tgl_lhr' => 'required',
            'foto' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required'
        ]);
        if ($validation == true) {
            $data = DB::table('member')->insert([
                'id_user' => $request->id_user,
                'kode_member' => $request->kode_member,
                'nama_member' => $request->nama_member,
                'tgl_lhr' => $request->tgl_lhr,
                'foto' => $request->foto,
                'gender' => $request->gender,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telepon' => $request->telepon
            ]);
            return redirect('member');
        }
    }
    public function UpdateMemberById(Request $request)
    {
        $data = array([
            'id_user' => $request->post('id_user'),
            'kode_member' => $request->post('kode_member'),
            'nama_member' => $request->post('nama_member'),
            'tgl_lhr' => $request->post('tgl_lhr'),
            'foto' => $request->post('foto'),
            'gender' => $request->post('gender'),
            'alamat' => $request->post('alamat'),
            'email' => $request->post('email'),
            'telepon' => $request->post('telepon')
        ]);
        DB::table('member')->where('id_member', '=', $request->post('id_member'))->update($data);
        return redirect('member');
    }
    public function DeleteMemberById($id)
    {
        DB::table('member')->where('id_member', '=', $id)->delete();
        return redirect('member');
    }
}
