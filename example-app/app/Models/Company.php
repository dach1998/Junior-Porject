<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    /**
     * Устанавливает значение атрибута "logotype" в модели.
     *
     * Если передано значение типа Illuminate\Http\UploadedFile, то оно сохраняется в хранилище
     * и записывается в атрибуты модели. Иначе, просто записывается переданное значение.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setLogotypeAttribute($value)
    {
        if ($value instanceof UploadedFile) {
            $filename = $value->getClientOriginalName();
            $path = $value->store('companies', 'public');

            $this->attributes['logotype'] = $path;
            $this->attributes['logotype_original_name'] = $filename;
        } else {
            $this->attributes['logotype'] = $value;
            $this->attributes['logotype_original_name'] = null;
        }
    }
}
