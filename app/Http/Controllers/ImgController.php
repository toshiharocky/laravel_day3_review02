<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Str;
use App\Models\UploadImage;

class ImgController extends Controller
{
    //画像アップローダー表示
    public function index(){
        // ログインユーザー取得
        $user = Auth::user();
        
        return view('img_upload',[
            'user'=>$user
            ]);
    }
    
    // 画像アップロード処理
    public function upload(Request $request){
        // バリデーション
        $validator = $request->validate([
            'img' => 'required | file | image | max:2048'
            ]);
            
        // 画像ファイル取得
        $file = $request->img;
        
        // ログインユーザー取得
        $user = Auth::user();
        
        if(!empty($file)){
            // ファイルの拡張子取得
            $ext = $file->guessExtension();
            
            // ファイル名を生成
            $fileName = Str::random(32).'.'.$ext;
            
            // 画像のファイル名を任意のDBに保存
            $user->imgurl = $fileName;
            $user->save();
            
            // public/uploadフォルダを作成
            $target_path = public_path('/uploads/');
            
            // ファイルをpublic/uploadフォルダに移動
            $file->move($target_path,$fileName);
            
        } else {
            return redirect('/home');
        }
        
        return redirect('/img');
    }
}
