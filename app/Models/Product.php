<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'qty',
        'tax',
        'status',
        'tranding',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'image',


    ];
    public function category()
    {
        return $this->belongsTo(category::class, 'cate_id','id');
    }
	/**
	 *
	 * @return mixed
	 */
	function getFillable() {
		return $this->fillable;
	}

	/**
	 *
	 * @param mixed $fillable
	 * @return Product
	 */
	function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
}
