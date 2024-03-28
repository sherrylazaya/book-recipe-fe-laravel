<?php
namespace App\Helper;

use InvalidArgumentException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class APIHelper{
    private $baseUrl;
    private $url;

    public function __construct(){
        $this->baseUrl = env('API_URL');
        $this->url = [
            'login' => $this->baseUrl.'/user-management/users/sign-in',
            'register' => $this->baseUrl.'/user-management/users/sign-up',
            'levels' => $this->baseUrl.'/book-recipe-masters/level-option-lists',
            'categories' => $this->baseUrl.'/book-recipe-masters/category-option-lists',
            'my-recipes' => $this->baseUrl.'/book-recipe/my-recipes',
            'fav-recipes' => $this->baseUrl.'/book-recipe/my-favorite-recipes',
            'recipes' => $this->baseUrl.'/book-recipe/book-recipes',
            'detail-recipe' => $this->baseUrl.'/book-recipe/book-recipes/{id}',
            'add-recipe' => $this->baseUrl.'/book-recipe/book-recipes',
            'edit-recipe' => $this->baseUrl.'/book-recipe/book-recipes/edit',
            'delete-recipe' => $this->baseUrl.'/book-recipe/book-recipes/{id}',
            'tog-favorite' => $this->baseUrl.'/book-recipe/book-recipes/{id}/favorites',
        ];
    }

    public function login($data){
        try {
            if(!is_array($data)){
                throw new InvalidArgumentException('$data must be an array');
            }
            $endpoint = $this->url['login'];
            $response = Http::post($endpoint ,$data);
            return $response->json();
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            throw $error;
        }
    }

    public function register($data){
        try{
            if(!is_array($data)){
                throw new InvalidArgumentException('$data mus be an array');
            }
            $endpoint = $this->url['register'];
            $response =  Http::post($endpoint ,$data);
            return $response->json();
        } catch (\Throwable $error){
            Log::error($error->getMessage());
            throw $error;
        }
    }

   
}
?>