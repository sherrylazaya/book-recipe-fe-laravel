<?php
namespace App\Helper;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class APIHelper{
    private $baseurl;
    private $url;

    public function __construct(){
        $this->baseurl = env('API_URL');
        $this->url = [
            'login' => $this->baseurl.'/user-management/users/sign-in',
            'register' => $this->baseurl.'/user-management/users/sign-up',
            'levels' => $this->baseurl.'/book-recipe-masters/level-option-lists',
            'categories' => $this->baseurl.'/book-recipe-masters/category-option-lists',
            'my-recipes' => $this->baseurl.'/book-recipe/my-recipes',
            'fav-recipes' => $this->baseurl.'/book-recipe/my-favorite-recipes',
            'recipes' => $this->baseurl.'/book-recipe/book-recipes',
            'detail-recipe' => $this->baseurl.'/book-recipe/book-recipes/{id}',
            'add-recipe' => $this->baseurl.'/book-recipe/book-recipes',
            'edit-recipe' => $this->baseurl.'/book-recipe/book-recipes/edit',
            'delete-recipe' => $this->baseurl.'/book-recipe/book-recipes/{id}',
            'tog-favorite' => $this->baseurl.'/book-recipe/book-recipes/{id}/favorites',
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
}
?>