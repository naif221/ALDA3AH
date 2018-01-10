<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\MuslimsCount;

class NewsController extends Controller
{

	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	// intrnal !!
	public function ShowNews(){
		
		$Posts = News::all();
		
		return view('cpac.media.media-news',['posts' => $Posts]);
	}
	


	public function banner() {
		
		
		return view('cpac.media.banner');
	}

	
	public function events() {
		
		
		return view('cpac.media.events');
	}
	

	public function muslims(Request $Request) {
		
		if($Request->isMethod('get')){
			$M = MuslimsCount::find(1);
			
			return view('cpac.media.muslims', ['Count' => $M]);
		}else {
			
			$M = MuslimsCount::find(1);
			$M->count = $Request->input('numberM');
			$M->save();
			return redirect('/media');
		}

		
		
	}
	

	public function Incrase(){
		
		$M = MuslimsCount::find(1);
		$M->count = MuslimsCount::find(1)->count + 1;
		$M->save();
		return redirect('/media');
		
	}
	
	public function Decrase(){
		
		$M = MuslimsCount::find(1);
		$M->count = MuslimsCount::find(1)->count - 1;
		$M->save();
		return redirect('/media');
	}
	

	public function AddNews(Request $Request){
		
		if($Request->isMethod('get')){
			
			return view('cpac.media.new-news');
		}else {
			
			$this->validate($Request, [
					'title' 			=> 'required|max:200',
					'content'			=>'	required',
					'file_path'			=>'	nullable',
			]);
			
			
			$path;
			if($Request->hasFile('file_path')){
				// Get filename with the extension
				$filenameWithExt = $Request->file('file_path')->getClientOriginalName();
				// Get just filename
				$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
				// Get just ext
				$extension = $Request->file('file_path')->getClientOriginalExtension();
				// Filename to store
				$fileNameToStore= $filename.'_'.time().'.'.$extension;
				// Upload Image
// 				 $path = $Request->file('file_path')->storeAs('/imgs', $fileNameToStore);
// 				Storage::put('/public/storage/imgs/', $fileNameToStore);
				$path = Storage::putFile('public/news_logo', new File($Request->file('file_path')) , 'public');
// 				 '/public/storage/imgs/'.$fileNameToStore;
			 	$path = str_replace("public","storage",$path);
			}else {
				$path = 'storage/news_logo/default.png';
			}
			
			
			$post 			= new News();
			$post->title 	= $Request->input('title');
			$post->content 	= $Request->input('content');
			$post->user_id	= Auth::user()->id;
			$post->file_path= asset($path);
			$post->save();
			
			return redirect('/media-news');
		
		}
	}
	
	public function EditPost(Request $Request){
		
		 
		 
		 if($Request->isMethod('get')){
		 	
		 	$posts = News::find($Request->input('id'));
		 	return view('cpac.media.edit-news', ['posts' => $posts]);
		 }else {
		 	
		 	$this->validate($Request, [
		 			'title' 			=> 'required|max:200',
		 			'content'			=>'	required',
		 	]);
		 	
		 	
		 	$post 			= News::find($Request->input('id'));
		 	$post->title	= $Request->input('title');
		 	$post->content 	= $Request->input('content');
		 	$post->user_id	= Auth::user()->id;
		 	$post->save();
		 	
		 	return redirect('/media-news');
		 }
		 
	}
	
	public function DeleteNews(Request $Request){
		
		if($Request->isMethod('get')){
			$post = News::find($Request->input('id'));
			if($post->file_path !== asset('storage/news_logo/default.png')){
				unlink(str_replace(asset(''),"",$post->file_path));
			}
			$post->delete();
			return redirect('media-news');
		}
		
	}
	
	
	
}