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

    public function toggleFavorite($recipeId){
        try {
            $endpoint = str_replace('{id}', $recipeId, $this->url['tog-favorite']);
            $response = Http::put($endpoint ,[
                'userId' => session()->get('userId')
            ]);
            return $response->json();
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            throw $error;
        }
    }

    // public function getRecipes($userId, $time=null, $recipeName=null, $levelId=null, $categoryId=null, $sortBy=null, $pageSize=8, $pageNumber=1){
    //     try {
    //         $endpoint = $this->url['recipes'];
    //         $endp = $endpoint.'?'.http_build_query([
    //             'userId' => $userId,
    //             'recipeName' => $recipeName,
    //             'time' => $time,
    //             'levelId' => $levelId,
    //             'categoryId' => $categoryId,
    //             'sortBy' => $sortBy,
    //             'pageSize' => $pageSize,
    //             'pageNumber' => $pageNumber
    //         ]); 
    //         $response = Http::get($endp);
    //         return $response->json();
    //     } catch (\Throwable $error) {
    //         Log::error($error->getMessage());
    //         throw $error;
    //     }
    // }

    function getRecipes($userId, $time=null, $recipeName=null, $levelId=null, $categoryId=null, $sortBy=null, $pageSize=8, $pageNumber=1){
        try {
            $fakeApiResponse = [
                "data" => [],
                "links" => [
                    "first" => "http://localhost:8000/api/book-recipe/book-recipes?page=1",
                    "last" => "http://localhost:8000/api/book-recipe/book-recipes?page=66671",
                    "prev" => null,
                    "next" => "http://localhost:8000/api/book-recipe/book-recipes?page=2"
                ],
                "meta" => [
                    "current_page" => 1,
                    "from" => 1,
                    "last_page" => 66671,
                    "links" => [],
                    "path" => "http://localhost:8000/api/book-recipe/book-recipes",
                    "per_page" => 15,
                    "to" => 15,
                    "total" => 1000059
                ],
                "total" => 1000059,
                "message" => "success",
                "statusCode" => 200,
                "status" => "OK"
            ];
    
            // Generate fake recipe data
            for ($i = 0; $i < $pageSize; $i++) {
                $recipe = [
                    "recipeId" => fake()->numberBetween(100000, 999999),
                    "categories" => [
                        "categoryId" => fake()->numberBetween(1, 4),
                        "categoryName" => fake()->randomElement(["Lunch", "Breakfast", "Dinner", "Snack"])
                    ],
                    "levels" => [
                        "levelId" => fake()->numberBetween(1, 4),
                        "levelName" => fake()->randomElement(["Easy", "Medium", "Hard", "Master Chef"])
                    ],
                    "recipeName" => fake()->words(2, true),
                    "imageUrl" => fake()->imageUrl(),
                    "imageFileName" => fake()->word() . '.jpg',
                    "time" => fake()->numberBetween(10, 60),
                    "isFavorite" => fake()->boolean()
                ];
                $fakeApiResponse['data'][] = $recipe;
            }
    
            return $fakeApiResponse;
        } catch (\Throwable $error) {
            return ["error" => $error->getMessage()];
        }
    }
}
?>