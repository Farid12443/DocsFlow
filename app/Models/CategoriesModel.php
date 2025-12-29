<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    public function documents()
    {
        return $this->hasMany(DocumentsModel::class, 'kategori_id');
    }

    protected $table = 'tb_categories';

    protected $primaryKey = 'id';

    protected $guarded = [
        'id',
    ];
}
