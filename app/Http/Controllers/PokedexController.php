<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    public function index() {
        $pokedexs = Pokedex::all();
        return view('pokedexs.index', compact('pokedexs'));
    }

    public function create() {
        return view('pokedexs.create');
    }

  public function store(Request $request) 
{
    // 1. ตรวจสอบข้อมูลก่อนบันทึก (Validation)
    // ป้องกันกรณีผู้ใช้ลืมกรอกชื่อ หรือกรอกข้อมูลผิดประเภท
    $request->validate([
        'name'      => 'required|max:255',
        'type'      => 'required',
        'hp'        => 'nullable|numeric',
        'attack'    => 'nullable|numeric',
        'defense'   => 'nullable|numeric',
        'image_url' => 'nullable', 
    ]);

    // 2. บันทึกข้อมูล
    // ต้องมั่นใจว่าใน Model Pokedex.php ได้เติม image_url ใน $fillable แล้ว
    Pokedex::create($request->all());

    // 3. ส่งกลับหน้า Index พร้อมข้อความแจ้งเตือน
    return redirect()->route('pokedexs.index')->with('success', 'บันทึกข้อมูล Pokemon สำเร็จ!');
}

    public function edit($id) {
        $pokedex = Pokedex::findOrFail($id);
        return view('pokedexs.edit', compact('pokedex'));
    }

    public function update(Request $request, $id) {
        $pokedex = Pokedex::findOrFail($id);
        $pokedex->update($request->all());
        return redirect()->route('pokedexs.index')->with('success', 'แก้ไขเรียบร้อย');
    }

    public function destroy($id) {
        Pokedex::findOrFail($id)->delete();
        return redirect()->route('pokedexs.index')->with('success', 'ลบข้อมูลสำเร็จ');
    }
}