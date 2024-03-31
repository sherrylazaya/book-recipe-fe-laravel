<?php
namespace App\Helper;

use Exception;
use Throwable;
use InvalidArgumentException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class APIHelper{
    private $baseUrl;
    private $url;

    public function __construct(){
        $this->baseUrl = env('API_URL');
        $this->url = [
            'login' => $this->baseUrl.'/user-management/users/signin',
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
            Log::info($endpoint);
            Log::info($response);
            return $response->json();
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            throw $error;
        }
    }

    public function toggleFavorite($recipeId){
        try {
            $endpoint = str_replace('{id}', $recipeId, $this->url['tog-favorite']);
            $response = Http::put($endpoint ,[
                'userId' => session()->get('userId')
            ]);
            Log::info($response);
            return $response->json();
        } catch (\Throwable $error){
            Log::error($error->getMessage());
            throw $error;
        }
    }

    public function register($data){
        try{
            if(!is_array($data)){
                throw new InvalidArgumentException('$data must be an array');
            }
            $endpoint = $this->url['register'];
            $response =  Http::post($endpoint ,$data);
            return $response->json();
        } catch (\Throwable $error){
            Log::error($error->getMessage());
            throw $error;
        }
    }

    public function getRecipes($userId, $time=null, $recipeName=null, $levelId=null, $categoryId=null, $sortBy=null, $pageSize=8, $pageNumber=1){
        try {
            $endpoint = $this->url['recipes'];
            $endp = $endpoint.'?'.http_build_query([
                'userId' => $userId,
                'recipeName' => $recipeName,
                'time' => $time,
                'levelId' => $levelId,
                'categoryId' => $categoryId,
                'sortBy' => $sortBy,
                'pageSize' => $pageSize,
                'pageNumber' => $pageNumber
            ]);
            $response = Http::get($endp);
            Log::info($response);
            return $response->json();
        } catch (Throwable $error) {
            Log::error($error->getMessage());
            throw $error;
        }
    }

    function getDetailRecipe($id){
        try {
            $endpoint = str_replace('{id}', $id, $this->url['detail-recipe']);
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . session('token')
            ])->get($endpoint);
            return $response->json();
        } catch (Throwable $error) {
            Log::error($error->getMessage());
            throw $error;
        }
    }
    
    public function getLevels(){
        try {
            $endpoint = $this->url['levels'];
            $response = Http::get($endpoint);

            return $response->json();
        } catch (Throwable $error) {
            Log::error($error->getMessage());
            throw $error;
        }
    }
    public function getCategories(){
     try {
            $endpoint = $this->url['categories'];
            $response = Http::get($endpoint);

            return $response->json();
        } catch (Throwable $error) {
            Log::error($error->getMessage());
            throw $error;
        }}

        public function getMyRecipes($userId, $time=null, $recipeName=null, $levelId=null, $categoryId=null, $sortBy=null, $pageSize=8, $pageNumber=1){
            try {
                // define data" yang mau ada nantinya
                $endpoint = $this->url['my-recipes'];
                $endp = $endpoint.'?'.http_build_query([
                    'userId' => $userId,
                    'recipeName' => $recipeName,
                    'time' => $time,
                    'levelId' => $levelId,
                    'categoryId' => $categoryId,
                    'sortBy' => $sortBy,
                    'pageSize' => $pageSize,
                    'pageNumber' => $pageNumber
                ]);
    
                // Mengirim permintaan HTTP GET ke URL yang dibangun
                $response = Http::get($endp);
    
                // Mencatat URL akhir dan respons yang diterima
                Log::info($endp);
                Log::info($response);
    
                // Mengembalikan data dalam bentuk JSON
                return $response->json();
            } catch (\Throwable $error) {
                // Menangani kesalahan yang terjadi, mencatat pesan kesalahan, dan melemparkannya kembali
                Log::error($error->getMessage());
                throw $error;
            }
        }
    
        public function deleteRecipe($id, $userId){
            try {
                // Mengganti placeholder '{id}' di URL dengan nilai $id yang diberikan
                $endpoint = str_replace('{id}', $id, $this->url['delete-recipe']);
    
                // Membangun URL akhir dengan parameter userId (buat yang baru)
                $endp =  $endpoint.'?'.http_build_query([
                    'userId' => $userId
                ]);
    
                // Mengirim permintaan HTTP PUT untuk menghapus resep
                $response = Http::put($endp);
    
                // Mengembalikan respons dalam bentuk JSON
                return $response->json();
    
            } catch (\Throwable $error) {
                // Menangani kesalahan yang terjadi, mencatat pesan kesalahan, dan melemparkannya kembali
                Log::error($error->getMessage());
                throw $error;
            }
        }
}
?>
