<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Car_360Model;
use App\Models\DongXeModel;
use App\Models\HangXeModel;
use App\Models\HinhAnhXeModel;
use App\Models\KieuXeModel;
use App\Models\LoaiXeModel;
use App\Models\NgoaiHinhModel;
use App\Models\XeModel;
use App\Models\ThongSoKyThuatModel;
use App\Models\DungTichModel;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class XeController extends Controller
{
public function DanhSachXe(Request $request)
{
    $query = XeModel::query();

    if ($request->filled('hang')) {
        $query->where('ma_hang', $request->hang);
    }

    if ($request->filled('dong')) {
        $query->where('ma_dongxe', $request->dong);
    }

    if ($request->filled('kieu')) {
        $query->where('ma_kieu', $request->kieu);
    }

    if ($request->filled('loai')) {
        $query->where('ma_loai', $request->loai);
    }

    if ($request->filled('nam')) {
        $query->where('nsx', $request->nam);
    }

    $dsXe = $query->paginate(6); // hoặc ->get()

    return view('danhsach', [
        'dsXe' => $dsXe,
        'dsHang' => HangXeModel::all(),
        'dsDong' => DongXeModel::all(),
        'dsKieu' => KieuXeModel::all(),
        'dsLoai' => LoaiXeModel::all(),
        'dsNSX' => XeModel::distinct()->pluck('nsx'),
    ]);
    // $dsXe = XeModel::with('hangXe', 'loaiXe', 'kieuXe', 'hinhanhXe')->paginate(3);

    // $loaixe = LoaiXeModel::all();
    // $dskieuxe = KieuXeModel::all();
    // $dsngoaihinh = NgoaiHinhModel::all();

    // return view('danhsach', compact('dsXe', 'loaixe', 'dskieuxe','dsngoaihinh' ));
}
public function show($ma_xe)
{
    $xe = XeModel::with(['kieuXe', 'loaiXe', 'hangXe', 'thongSoKyThuat', 'hinhanhXe', 'xe360', 'ngoaihinh', 'dungtich'])->find($ma_xe);

    if (!$xe) {
        abort(404, 'Không tìm thấy xe');
    }  
    return view('chitiet', compact('xe'));
}

public function create()
{

    $dsXe = XeModel::with('hangXe', 'loaiXe', 'kieuXe', 'hinhanhXe', 'xe360', 'dungtich', 'thongSoKyThuat')->get();
    $loaixe = LoaiXeModel::all();
    $dskieuxe = KieuXeModel::all();
    $dsngoaihinh = NgoaiHinhModel::all();
    $hangxe = HangXeModel::all();
    $dongxe = DongXeModel::all();
    $xe360 = Car_360Model::all();
    $hinhanhxe = HinhAnhXeModel::all();
    $dungtich = DungTichModel::all();
    $thongsokythuat = ThongSoKyThuatModel::all();

    return view('quanlyxe', compact('dsXe', 'loaixe', 'dskieuxe','dsngoaihinh', 'hangxe', 'dongxe', 'xe360', 'hinhanhxe' ));
}

public function store(Request $request)
{
    $request->validate([
        'ten_xe' => 'required|string|max:255',
        'ma_loai' => 'required|exists:loai_xe,ma_loai',
        'ma_kieu' => 'required|exists:kieu_xe,ma_kieu',
        'ma_hang' => 'required|exists:hang_xe,ma_hang',
        'ma_dongxe' => 'required|exists:dong_xe,ma_dongxe',
        'nsx' => 'required|integer|min:1900|max:' . date('Y'),
        'mo_ta' => 'nullable|string',
        'hinh_anh' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'mat_truoc' => 'image|mimes:jpg,jpeg,png|max:2048', 
        'mat_ben'  => 'image|mimes:jpg,jpeg,png|max:2048', 
        'mat_sau' => 'image|mimes:jpg,jpeg,png|max:2048',
        'view_3D' => 'nullable|file|mimes:glb|max:10240',
        'view' => 'nullable|string|max:10240',
        'tong_chieu_dai' => 'nullable|numeric', 
        'chieu_rong_tong_the' => 'nullable|numeric',
        'chieu_cao_tong_the' => 'nullable|numeric',
        'khoang_sang_gam_xe' => 'nullable|numeric', 
        'ban_kinh' => 'nullable|numeric', 
        'van_toc_toi_da' => 'nullable|numeric', 
        'dong_co' => 'nullable|string', 
        'khoi_luong' => 'nullable|numeric',
        'dung_tich_khoang_hanh_ly' => 'nullable|numeric',
        'dung_tich_nhien_lieu' => 'nullable|numeric',
    ]);
    
    $maXe = now()->format('YmdHis');
    
    
    $ten_thu_muc = Str::slug($request->ten_xe);
    $path = public_path('image/cars'.'/'.$request->ma_hang.'/'.$ten_thu_muc);
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    
    

    $xe = new XeModel();
    $xe->ma_xe = $maXe;
    $xe->ten_xe = $request->ten_xe;
    $xe->ma_loai = $request->ma_loai;
    $xe->ma_kieu = $request->ma_kieu;
    $xe->ma_hang = $request->ma_hang;
    $xe->ma_dongxe = $request->ma_dongxe;
    $xe->nsx = $request->nsx;
    $xe->mo_ta = $request->mo_ta;


    $hinhanhxe = new HinhAnhXeModel();
    $hinhanhxe->ma_xe = $xe->ma_xe;
    if($request->hasFile('hinh_anh')){
        $file = $request->file('hinh_anh');
        $tenFile = $maXe . '.' . $file->getClientOriginalExtension();
        
        $file->move($path, $tenFile);
        $hinhanhxe->hinh_xe = 'image/cars'.'/'.$request->ma_hang.'/'.$ten_thu_muc.'/'. $tenFile;//Lưu ảnh xe
    }
    if($request->hasFile('mat_truoc')){
        $file = $request->file('mat_truoc');
        $tenFile = $maXe . '.' .'mat_truoc'.'.'. $file->getClientOriginalExtension();
        $file->move($path, $tenFile);
        $hinhanhxe->mat_truoc = 'image/cars'.'/'.$request->ma_hang.'/'.$ten_thu_muc.'/'. $tenFile;//Lưu mặt trước của xe

    }
    if($request->hasFile('mat_sau')){
        $file = $request->file('mat_sau');
        $tenFile = $maXe . '.'. 'mat_sau'.'.'. $file->getClientOriginalExtension();
        $file->move($path, $tenFile);
        $hinhanhxe->mat_sau = 'image/cars'.'/'.$request->ma_hang.'/'.$ten_thu_muc. '/'.$tenFile;//Lưu mặt sau của xe

    }
    if($request->hasFile('mat_ban')){
        $file = $request->file('mat_ben');
        $tenFile = $maXe . '.' .'mat_ben'.'.'. $file->getClientOriginalExtension();
        $file->move($path, $tenFile);
        $hinhanhxe->mat_ben = 'image/cars'.'/'.$request->ma_hang.'/'.$ten_thu_muc. '/'.$tenFile;//Lưu mặt bên của xe

    }
    
    
    
    $xe360 = new Car_360Model();
    $xe360->ma_xe = $xe->ma_xe;
    if($request->hasFile('view_3D')){
        $glbFile = $request->file('view_3D');
        $tenFile = $maXe .'.'. $glbFile->getClientOriginalExtension();
        $glbFile->move(public_path('models'), $tenFile);
        $xe360->view_3D ='models/'.$tenFile;
    }
    if($request->hasFile('images')){
        $hangxe = HangXeModel::find($request->ma_hang);
    
        $xe360->view= 'images/car360/' . $xe->hangXe->ten_hang. '/' . $ten_thu_muc;
        $duongdan = public_path('images/car360/' . $hangxe->ten_hang. '/' . $ten_thu_muc);
        if ($request->hasFile('images')) {
            if (!file_exists($duongdan)) {
            mkdir($duongdan, 0755, true);}
            foreach ($request->file('images') as $image) {
                $imagename = $image->getClientOriginalName();
                $image->move($duongdan, $imagename);
            }
        }
    }
    
    
    
    $xe->save();
    $hinhanhxe->save();
    $xe360->save();
    $thongsokythuat = new ThongSoKyThuatModel();
    $thongsokythuat->ma_xe = $maXe;
    if($request->has('tong_chieu_dai')){
        $thongsokythuat->tong_chieu_dai = $request->tong_chieu_dai;
    }
    if($request->has('chieu_rong_tong_the')){
        $thongsokythuat->chieu_rong_tong_the = $request->chieu_rong_tong_the;
    }
    if($request->has('khoang_sang_gam_xe')){
        $thongsokythuat->khoang_sang_gam_xe = $request->khoang_sang_gam_xe;
    }
    if($request->has('ban_kinh')){
        $thongsokythuat->ban_kinh = $request->ban_kinh;
    }
    if($request->has('van_toc_toi_da')){
        $thongsokythuat->van_toc_toi_da = $request->van_toc_toi_da;
    }
    if($request->has('dong_co')){
        $thongsokythuat->dong_co = $request->dong_co;
    }
    if($request->has('khoi_luong')){
        $thongsokythuat->khoi_luong = $request->khoi_luong;
    }
    if($request->has('chieu_cao_tong_the')){
        $thongsokythuat->chieu_cao_tong_the = $request->chieu_cao_tong_the;
    }
    $thongsokythuat->save();

    $dungtich = new DungTichModel();
    $dungtich->ma_xe = $maXe;
    if($request->has('dung_tich_khoang_hanh_ly')){
        $dungtich->dung_tich_khoang_hanh_ly = $request->dung_tich_khoang_hanh_ly;
    }
    if($request->has('dung_tich_nhien_lieu')){
        $dungtich->dung_tich_nhien_lieu = $request->dung_tich_nhien_lieu;
    }
    $dungtich->save();

    return redirect()->route('xe.create')->with('success', 'Thêm xe thành công!');
}
public function DanhSachXeAdmin()
{
    
    $dsXe = XeModel::with('hangXe', 'loaiXe', 'kieuXe', 'hinhanhXe')->get();
    $loaixe = LoaiXeModel::all();
    $dskieuxe = KieuXeModel::all();
    $dsngoaihinh = NgoaiHinhModel::all();
    $hangxe = HangXeModel::all();
    $dongxe = DongXeModel::all();

    return view('quanlyxe', compact('dsXe', 'loaixe', 'dskieuxe','dsngoaihinh', 'hangxe', 'dongxe' ));
}

public function update(Request $request, $ma_xe)
{
    $request->validate([
        'ten_xe' => 'required|string|max:255',
        'ma_loai' => 'required|exists:loai_xe,ma_loai',
        'ma_kieu' => 'required|exists:kieu_xe,ma_kieu',
        'ma_hang' => 'required|exists:hang_xe,ma_hang',
        'ma_dongxe' => 'required|exists:dong_xe,ma_dongxe',
        'nsx' => 'required|integer|min:1900|max:' . date('Y'),
        'mo_ta' => 'nullable|string',
        'hinh_anh' => 'image|mimes:jpg,jpeg,png|max:2048',
        'mat_truoc' => 'image|mimes:jpg,jpeg,png|max:2048', 
        'mat_ben'  => 'image|mimes:jpg,jpeg,png|max:2048', 
        'mat_sau' => 'image|mimes:jpg,jpeg,png|max:2048',
        'view_3D' => 'nullable|file|mimes:glb|max:10240',
        'view' => 'nullable|string|max:10240',
        'tong_chieu_dai' => 'nullable|numeric', 
        'chieu_rong_tong_the' => 'nullable|numeric',
        'chieu_cao_tong_the' => 'nullable|numeric',
        'khoang_sang_gam_xe' => 'nullable|numeric', 
        'ban_kinh' => 'nullable|numeric', 
        'van_toc_toi_da' => 'nullable|numeric', 
        'dong_co' => 'nullable|string', 
        'khoi_luong' => 'nullable|numeric',
        'dung_tich_khoang_hanh_ly' => 'nullable|numeric',
        'dung_tich_nhien_lieu' => 'nullable|numeric',
    ]);

    $xe = XeModel::findOrFail($ma_xe);
    // Cập nhật các trường cơ bản
    $xe->update([
        'ten_xe' => $request->ten_xe,
        'ma_loai' => $request->ma_loai,
        'ma_kieu' => $request->ma_kieu,
        'ma_hang' => $request->ma_hang,
        'ma_dongxe' => $request->ma_dongxe,
        'nsx' => $request->nsx,
        'mo_ta' => $request->mo_ta,
    ]);


    $ten_thu_muc = Str::slug($request->ten_xe);

    $folder = 'image/cars'.'/'.$request->ma_hang.'/'.$ten_thu_muc;
    $path = public_path('image/cars'.'/'.$request->ma_hang.'/'.$ten_thu_muc);
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    $hangxe = HangXeModel::find($request->ma_hang);

    
    

    // Cập nhật ảnh
    if ($request->hasFile('hinh_anh')) {
        $hinhanh = HinhAnhXeModel::findOrFail($ma_xe);
        $file = $request->file('hinh_anh');
        $tenFile = $ma_xe . '.' .'hinh_anh'. $file->getClientOriginalExtension();
        $file->move($path, $tenFile);
        $hinhanh->update(
            [
                'hinh_xe'=> $folder.'/'.$tenFile,
                'updated_at'=>now(),]
        );
    }
    if ($request->hasFile('mat_truoc')) {
        $hinhanh = HinhAnhXeModel::findOrFail($ma_xe);
        $file = $request->file('mat_truoc');
        $tenFile = $ma_xe . '.' .'mat_truoc'.'.'. $file->getClientOriginalExtension();
        $file->move($path, $tenFile);
        $hinhanh->update(
            [
                'mat_truoc'=> $folder.'/'.$tenFile, 
                'updated_at'=>now(),]
        );
    }
    if ($request->hasFile('mat_sau')) {
        $hinhanh = HinhAnhXeModel::findOrFail($ma_xe);
        $file = $request->file('mat_sau');
        $tenFile = $ma_xe . '.' .'mat_sau'.'.'. $file->getClientOriginalExtension();
        $file->move($path, $tenFile);
        $hinhanh->update(
            [
                'mat_sau'=> $folder.'/'.$tenFile, 
                'updated_at'=>now(),]
        );
    }
    if ($request->hasFile('mat_ben')) {
        $hinhanh = HinhAnhXeModel::findOrFail($ma_xe);
        $file = $request->file('mat_ben');
        $tenFile = $ma_xe . '.' .'mat_ben'.'.'. $file->getClientOriginalExtension();
        $file->move($path, $tenFile);
        $hinhanh->update(
            [
                'mat_ben'=> $folder.'/'.$tenFile,
                'updated_at'=>now(),]
        );
    }
    if ($request->hasFile('view_3D')) {
        $file3D = $request->file('view_3D');
        $tenFile3D = $ma_xe . '.' . $file3D->getClientOriginalExtension();

        $thuMuc3D = public_path('models');
        if (!file_exists($thuMuc3D)) {
            mkdir($thuMuc3D, 0755, true);
        }

        $file3D->move($thuMuc3D, $tenFile3D);
        $xe360 = Car_360Model::where('ma_xe', $ma_xe)->first();
        if (!$xe360) {
            $xe360 = new Car_360Model();
            $xe360->ma_xe = $ma_xe;
        }

        $xe360->view_3D = 'models/' . $tenFile3D;
        $xe360->save();
        // Cập nhật đường dẫn file 3D trong bảng xe
        $xe->update(['view3D' => 'models/' . $tenFile3D]);
    }
    $xe = XeModel::with('hangXe')->findOrFail($ma_xe);
    $thu_muc_anh = 'images/car360/' . $xe->hangXe->ten_hang . '/' . $ten_thu_muc;
    $duong_dan = public_path($thu_muc_anh);

    // Tạo thư mục nếu chưa tồn tại
    

    // Xử lý ảnh 360
    if ($request->hasFile('images')) {
        if (!file_exists($duong_dan)) {
            mkdir($duong_dan, 0755, true);
        }

        $xe360 = Car_360Model::where('ma_xe', $ma_xe)->first();
        if (!$xe360) {
            $xe360 = new Car_360Model();
            $xe360->ma_xe = $ma_xe;
        }
        foreach ($request->file('images') as $image) {
            $tenAnh = $image->getClientOriginalName();
            $image->move($duong_dan, $tenAnh);
        }
        $xe360->view = $thu_muc_anh;
        $xe360->updated_at = now();

        $xe360->save();
    }

    // Cập nhật đường dẫn thư mục ảnh
    $thongsokythuat = ThongSoKyThuatModel::findOrFail($ma_xe);
    if($request->has('tong_chieu_dai')){
        $thongsokythuat->tong_chieu_dai = $request->tong_chieu_dai;
    }
    if($request->has('chieu_rong_tong_the')){
        $thongsokythuat->chieu_rong_tong_the = $request->chieu_rong_tong_the;
    }
    if($request->has('khoang_sang_gam_xe')){
        $thongsokythuat->khoang_sang_gam_xe = $request->khoang_sang_gam_xe;
    }
    if($request->has('ban_kinh')){
        $thongsokythuat->ban_kinh = $request->ban_kinh;
    }
    if($request->has('van_toc_toi_da')){
        $thongsokythuat->van_toc_toi_da = $request->van_toc_toi_da;
    }
    if($request->has('dong_co')){
        $thongsokythuat->dong_co = $request->dong_co;
    }
    if($request->has('khoi_luong')){
        $thongsokythuat->khoi_luong = $request->khoi_luong;
    }
    if($request->has('chieu_cao_tong_the')){
        $thongsokythuat->chieu_cao_tong_the = $request->chieu_cao_tong_the;
    }
    $thongsokythuat->save();

    $dungtich = DungTichModel::findOrFail($ma_xe);
    $dungtich->ma_xe = $ma_xe;
    if($request->has('dung_tich_khoang_hanh_ly')){
        $dungtich->dung_tich_khoang_hanh_ly = $request->dung_tich_khoang_hanh_ly;
    }
    if($request->has('dung_tich_nhien_lieu')){
        $dungtich->dung_tich_nhien_lieu = $request->dung_tich_nhien_lieu;
    }
    $dungtich->save();

    
    
    

    return redirect()->route('xe.edit', ['id' => $ma_xe])->with('success', 'Cập nhật xe thành công.');
}

public function edit($id)
{
    $xe = XeModel::with(['kieuXe', 'loaiXe', 'hangXe', 'thongSoKyThuat', 'hinhanhXe', 'xe360', 'ngoaihinh', 'dungtich'])->findOrFail($id);
    $loaixe = LoaiXeModel::all();
    $dskieuxe = KieuXeModel::all();
    $hangxe = HangXeModel::all();
    $dongxe = DongXeModel::all();

    return view('themxe', compact('xe', 'loaixe', 'dskieuxe', 'hangxe', 'dongxe'));
}


public function destroy($ma_xe)
{
    $xe = XeModel::find($ma_xe);

    if (!$xe) {
        return redirect()->back()->with('error', 'Xe không tồn tại.');
    }

    $car360 = Car_360Model::where('ma_xe', $ma_xe)->first();
    if ($car360) {
        $path3D = public_path($car360->view_3D);
        if ($car360->view_3D && file_exists($path3D)) {
            unlink($path3D);
        }

        $folderPath = public_path($car360->view);
        if ($car360->view && is_dir($folderPath)) {
            $files = glob($folderPath . '/*'); 
            foreach ($files as $file) {
                if (is_file($file)) unlink($file);
            }
            rmdir($folderPath); 
        }

        $car360->delete();
    }

    $images = HinhAnhXeModel::where('ma_xe', $ma_xe)->get();
    foreach ($images as $img) {
        $imgPath = public_path($img->duong_dan);
        if ($img->duong_dan && file_exists($imgPath)) {
            unlink($imgPath);
        }
        $img->delete();
    }
    $xe->thongSoKyThuat()?->delete();
    $xe->hinhanhXe()?->delete();
    $xe->xe360()?->delete();
    $xe->ngoaihinh()?->delete();
    $xe->dungtich()?->delete();

    $xe->delete();

    return redirect()->route('quanlyxe')->with('success', 'Xóa xe thành công.');
}

public function hangStore( Request $request){
    $request->validate([
        'ma_hang' => 'required|string',
        'ten_hang' => 'required|string',
        'xuat_xu' => 'required|string',
    ]);

    $hangxe = new HangXeModel();
    $hangxe->ma_hang = $request->ma_hang;
    $hangxe->ten_hang = $request->ten_hang;
    $hangxe->xuat_xu = $request->xuat_xu;

    $hangxe->save();
    return redirect()->route('hang.create')->with('success', 'Thêm hãng thành công!');
}

}
