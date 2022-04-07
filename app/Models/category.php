<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_descrip',
        'meta_keywords',
    ];
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
	 * @return category
	 */
	function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
}
