<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
class ArtikelController extends Controller
{
    private function is_login()
    {
        if(Auth::user()) {
            return true;
        }
        else {
            return false;
        }
    }
 
    public function show()
    {
        $articles = DB::table('artikel')->orderby('id', 'desc')->get();
        return view('show', ['articles'=>$articles]);
    }
 
    public function add()
    {
        if($this->is_login())
        {
            return view('add');
        }
 
        else
        {
           return redirect('/login');
        }
    }
 
    public function add_process(Request $article)
    {
        DB::table('artikel')->insert([
            'judul'=>$article->judul,
            'deskripsi'=>$article->deskripsi
        ]);
 
        return redirect()->action('ArtikelController@show');
    }
 
    public function detail($id)
    {
        $article = DB::table('artikel')->where('id', $id)->first();
        return view('detail', ['article'=>$article]);
    }
 
    public function show_by_admin()
    {
        if($this->is_login())
        {
            $articles = DB::table('artikel')->orderby('id', 'desc')->get();
            return view('adminshow', ['articles'=>$articles]);
        }
 
        else
        {
           return redirect('/login');
        }
    }
 
    public function edit($id)
    {
        if($this->is_login())
        {
            $article = DB::table('artikel')->where('id', $id)->first();
            return view('edit', ['article'=>$article]);
        }
 
        else
        {
           return redirect('/login');
        }
    }
 
    public function edit_process(Request $article)
    {
        $id = $article->id;
        $judul = $article->judul;
        $deskripsi = $article->deskripsi;
        DB::table('artikel')->where('id', $id)
                            ->update(['judul' => $judul, 'deskripsi' => $deskripsi]);
        Session::flash('success', 'Artikel berhasil diedit');
        return redirect()->action('ArtikelController@show_by_admin');
    }
 
    public function delete($id)
    {
        if($this->is_login())
        {
             //menghapus artikel dengan ID sesuai pada URL
            DB::table('artikel')->where('id', $id)
            ->delete();
 
            //membuat pesan yang akan ditampilkan ketika artikel berhasil dihapus
            Session::flash('success', 'Artikel berhasil dihapus');
            return redirect()->action('ArtikelController@show_by_admin');
        }
 
        else
        {
           return redirect('/login');
        }
    }
}