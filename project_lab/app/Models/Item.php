<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Item extends Model
{
    use HasFactory, Sluggable;
    
    protected $guarded = ['id'];

    protected $with = ['type'];

    //Di controller php jadi ->filter() untuk searching
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('desc', 'like', '%' . $search . '%');
        });

        //query kalau ada filter kategori atau salah, maka jalanin fungsi kirimin query dan kategori
        //isinya dimana query memiliki relationship ke category (belongsTo) maka melakukan pemanggilan $query dan $cateogyr
        //dimana querny mengandung slug yang bernilai $cateogry
        $query->when($filters['type'] ?? false, function($query, $type){
            return $query->whereHas('type', function($query) use ($type){
                $query->where('slug', $type);
            });
        });

    }


    public function type(){
        return $this->belongsTo(Type::class);
    }
    
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function getRouteKeyName():string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
