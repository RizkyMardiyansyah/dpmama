<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use illuminate\Database\Eloquent\Relations\HasMany;

class template extends Model
{
    use HasFactory;

    protected $guarded = [];
        protected static function boot()
    {
        parent::boot();
    
        static::updating(function ($model) {
         
            if ($model->isDirty('image') && $model->getOriginal('image') !== null) {
                Storage::disk('public')->delete($model->getOriginal('image'));
            }        
        });
    }
        public function orders(): HasMany
        {
            return $this->hasMany(order::class, 'template_id');
        }
        

        // Atribut total pembelian (dinamis)
        public function getTotalPembelianAttribute(): int
        {
            return order::where('template', $this->id)->count();
        }
}
