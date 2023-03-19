<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\File; 

class UploadController extends Controller
{
    public function upload(Request $request){
		$this->validate($request, [
			'file' => 'required|mimes:mp4',
			'name' => 'required',
		]);
 
		$file = $request->file('file');
 
		$file_original_name = str_replace(' ', '_', $file->getClientOriginalName());
      	$file_name = time()."_".$file_original_name;
 
		$upload_dst = 'videos';
		$file->move($upload_dst, $file_name);
 
		Video::create([
			'file' => $file_name,
			'name' => $request->name,
		]);
 
		return redirect()->back();
	}

	public function destroy(Video $video)
	{
		$video->delete();
		$file_path = public_path().'/videos/'.$video->file;
		unlink($file_path);
		return redirect('/')
			->withSuccess(__('Post delete successfully.'));
	}
}
