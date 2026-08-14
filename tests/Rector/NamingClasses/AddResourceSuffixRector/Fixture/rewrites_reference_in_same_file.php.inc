<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
}

class ArticlePresenterFactory
{
    public function make($article): JsonResource
    {
        return new Article($article);
    }
}

?>
-----
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
}

class ArticlePresenterFactory
{
    public function make($article): JsonResource
    {
        return new \App\Http\Resources\ArticleResource($article);
    }
}

?>
