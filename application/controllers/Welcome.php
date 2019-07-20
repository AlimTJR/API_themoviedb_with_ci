<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
	parent::__construct();		
	$this->load->model('panggildb');
	$this->load->helper('url');
	}
//==========================================FUNGSI HALAMAN CARI====================================================================
public function cari(){  
	$judul= $_GET['q'];
	$apikey= '7fe404c49d485e74e57949e1a52628e6';
	$language = 'en-US';
	$content = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key='.$apikey.'&language='.$language.'&query='.$judul);
	$result  = json_decode($content);
	$output= '';
	  foreach($result->results as $film){
	    $output .='
				<div class="col-lg-2 col-sm-6 portfolio-item">
					<div class="card w-51" style="box-shadow: 10px 10px 10px black;">
					<a href="'.base_url().'welcome/Detail?id='.$film->id.'">
						<img class="card-img-top" src="http://image.tmdb.org/t/p/w185'.$film->poster_path.'">
					</a>
					<div class="judul">'.$film->original_title.'</div>
					<a class="btn btn-success btn-sm btn-block" href="'.base_url().'welcome/tambah_movie?id='.$film->id.'"><b>+ Favorite</b>
					</a>
					</div>
			  	</div>';
	     }
	$data['cari']=$judul;
	$data['hasil'] = $output; 
	$data['title'] = 'TMDB';
	$this->load->view('tmdbsearch', $data);
	}
//==============================================FUNGSI HALAMAN HOME================================================================
public function index(){  
	$apikey= '7fe404c49d485e74e57949e1a52628e6';
	$language = 'en-US';
	$content = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key='.$apikey.'&language='.$language);
	$result  = json_decode($content);
	$output='';
	  foreach($result->results as $film){
	    $output .=  '
				<div class="col-lg-2 col-sm-6 portfolio-item">
					<div class="card w-51" style="box-shadow: 0px 0px 20px 1px #212529;">
					<a href="'.base_url().'welcome/Detail?id='.$film->id.'">
						<img class="card-img-top rounded" src="http://image.tmdb.org/t/p/w185'.$film->poster_path.'" alt="">
					</a>
					<div class="judul">'.$film->original_title.'</div>
					<a class="btn btn-success btn-sm btn-block" href="'.base_url().'welcome/tambah_movie?id='.$film->id.'"><b>+ Favorite</b></a>
					</div>
			  	</div>';
	     }
	$data['hasil'] = $output; 
	$data['title'] = 'TMDB';
	$this->load->view('tmdbhome', $data);
	}
//==============================================FUNGSI HALAMAN NOW PLAYING=========================================================
public function Nowplaying(){  
	$apikey= '7fe404c49d485e74e57949e1a52628e6';
	$language = 'en-US';
	$content = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key='.$apikey.'&language='.$language);
	$result  = json_decode($content);
	$output='';
	  foreach($result->results as $film){
	    $output .=  '
	    		<div class="col-lg-2 col-sm-6 portfolio-item">
					<div class="card w-51" style="box-shadow: 10px 10px 10px black;">
					<a href="'.base_url().'welcome/Detail?id='.$film->id.'">
						<img class="card-img-top rounded" src="http://image.tmdb.org/t/p/w185'.$film->poster_path.'" alt="'.$film->original_title.'">
					</a>
					<div class="judul">'.$film->original_title.'</div>
					<a class="btn btn-success btn-sm btn-block" href="'.base_url().'welcome/tambah_movie?id='.$film->id.'"><b>+ Favorite</b></a>
					</div>
			  	</div>';}
	$data['hasil'] = $output; 
	$data['title'] = 'TMDB'; 
    $this->load->view('tmdbnowplay', $data); 
	}
//==============================================FUNGSI HALAMAN UPCOMING============================================================
public function Upcome(){  
	$apikey= '7fe404c49d485e74e57949e1a52628e6';
	$language = 'en-US';
	$content = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key='.$apikey.'&language='.$language);
	$result  = json_decode($content);
	$output='';
	  foreach($result->results as $film){
	    $output .=  '
	    		<div class="col-lg-2 col-sm-6 portfolio-item">
				<div class="card w-51" style="box-shadow: 10px 10px 10px black;">
					<a href="'.base_url().'welcome/Detail?id='.$film->id.'">
						<img class="card-img-top rounded" src="http://image.tmdb.org/t/p/w185'.$film->poster_path.'" alt="'.$film->original_title.'">
					</a>
					<div class="judul">'.$film->original_title.'</div>
					<a class="btn btn-success btn-sm btn-block" href="'.base_url().'welcome/tambah_movie?id='.$film->id.'"><b>+ Favorite</b></a>
				</div>
			  	</div>';}
	$data['hasil'] = $output; 
	$data['title'] = 'TMDB'; 
    $this->load->view('tmdbupcom', $data); 
	}
//==============================================FUNGSI HALAMAN DETAIL==============================================================
public function Detail(){
	$movieid= $_GET['id'];
	$apikey= '7fe404c49d485e74e57949e1a52628e6';
	$language = 'en-US';
	$content = file_get_contents('https://api.themoviedb.org/3/movie/'.$movieid.'?api_key='.$apikey.'&language='.$language);
	$result  = json_decode($content);
	    $output = '	    
	    	<img src="http://image.tmdb.org/t/p/w185'.$result->poster_path.'" name="'.$result->id.'" style="box-shadow: 10px 10px 10px black;">
	    	<font style="padding-left:10px;font-weight:bold;font-size:30px;position:fixed;">'.$result->original_title.'</font>
	    	<div style="margin-top:;font-weight:bold;">
				<br>RATED : 
				<button type="button" class="btn btn-danger btn-sm"><b>*'.$result->vote_average.'</b></button>
				<a class="btn btn-success btn-sm" href="'.base_url().'welcome/tambah_movie?id='.$result->id.'"><b>+ Favorite</b></a>
			</div>
			<hr color="#06d06b">'.$result->overview.'<hr color="#06d06b">
	    	Budget : '.$result->budget.'<br>
	    	Release date : '.$result->release_date.'<br>
	    	Visit Page : <a class="btn btn-primary btn-sm" href="'.$result->homepage.'" target="blank">'.$result->homepage.'</a>
	    	<a class="btn btn-danger btn-sm" href="https://www.youtube.com/results?search_query='.$result->original_title.' trailer" target="blank">WATCH TRAILER</a>
	    	';


	$data['bg']=$result->backdrop_path;
	$data['judfil']= $result->original_title;
	$data['hasil'] = $output; 
	$data['title'] = 'TMDB';
    $this->load->view('tmdbdetail', $data); 
	}
//===========================================FUNGSI HALAMAN FAVORITE DARI DATABASE=================================================
public function Favorite(){
	$data['isi']=$this->panggildb->movie('');
    $this->load->view('tmdbfavorite', $data);
	}
//===========================================FUNGSI TAMBAH MOVIE KEDALAM DATABASE==================================================
function tambah_movie(){
	$movieid= $_GET['id'];
	$data = array('movie_id' => $movieid);
	$this->panggildb->input_data($data,'movie');
	redirect('../welcome/index');
	}
//===========================================FUNGSI HAPUS MOVIE FAVORITE DARI DATABASE=============================================
function hapus($movie_id){
	$where = array('movie_id' => $movie_id);
	$this->panggildb->hapus_data($where,'movie');
	redirect('../Welcome/Favorite');
	}
}
