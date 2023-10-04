<?php

namespace App\Http\Controllers\FrontEnd;

use Countable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogValidationRequest;

class BlogController extends Controller
{
	public function saveBlogDetails(BlogValidationRequest $request)
	{
		
		$images = [];
		$userData = [];
		// Define the files you want to process and their corresponding paths
		$fileInputs = [
				// for wedding & hairStylist
				'image-gallery' => '/images/blog',
		];
		
		foreach ($fileInputs as $reg_image => $path) {
			if ($request->hasFile($reg_image)) {
		
				$uploadedFiles = $request->file($reg_image);
		
				// single files were uploaded for this input
				$savedImage = saveSingleImage($uploadedFiles, $path);
				$images[$reg_image] = $savedImage;
		
			}
		}
		
		$blog = new Blog();
		$blog->user_id = Auth::user()->id;
		$blog->blog_title = $request->blog_title;
		$blog->description = $request->description;
		$blog->blog_image = isset($images['image-gallery']) ? $images['image-gallery'] : null;
		$blog->date = date('Y-m-d');
		
		$blog->status = 'active';
		
		$blog->save();
		
		return response()->json(['status' => 200, 'message' => 'Blog details submitted succsessfully!', 'data' => '']);
	}
	
}
