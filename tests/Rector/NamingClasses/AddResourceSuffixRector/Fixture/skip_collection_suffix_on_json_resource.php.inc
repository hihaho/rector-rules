<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// "*Collection" name on a JsonResource subclass is probably a mistake;
// don't blindly append "Resource" to it (would yield "VideoCollectionResource").
class VideoCollection extends JsonResource
{
}
