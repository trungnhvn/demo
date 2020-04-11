<?php

namespace App;
use App\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $guarded = [];

    protected $primaryKey = 'id';

    public function categories() {
		return $this->belongsTo(Category::class, 'product_cate', 'id');
    }
    public function sluggable()
    {
        return [
            'product_slug' => [
                'source' => 'product_name'
            ]
        ];
    }
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

}
