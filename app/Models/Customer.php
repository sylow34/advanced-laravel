<?php

namespace App\Models;

use App\QueryFilters\Active;
use App\QueryFilters\MaxCount;
use App\QueryFilters\Sort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Customer extends Model
{

    protected $guarded = [];

    public static function allCustomers()
    {
        return app(Pipeline::class)
            ->send(Customer::query())
            ->through([Active::class, Sort::class, MaxCount::class])
            ->thenReturn()
            ->paginate(5);
        // ->get();
    }

    public function format()
    {
        return [
            'customer_id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'created_by' => $this->user->email,
            'last_updated' => $this->updated_at->diffForHumans()
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
