<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public const DRAFT = 0;
	public const ACTIVE = 1;
	public const INACTIVE = 2;

	public const STATUSES = [
		self::DRAFT => 'draft',
		self::ACTIVE => 'active',
		self::INACTIVE => 'inactive',
    ];
    
    public static function statuses()
	{
		return self::STATUSES;
	}
	
	public function statusLabel()
	{
		$statuses = $this->statuses();
		
		return isset($this->status) ? $statuses[$this->status] : null;
	}

	public function type()
	{
		return $this->belongsTo(Type::class);
	}
}
