<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentsModel extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoriesModel::class, 'kategori_id');
    }

    public function versions()
    {
        return $this->hasMany(DocumentVersionsModel::class, 'document_id');
    }

    public function activeVersion()
    {
        return $this->hasOne(DocumentVersionsModel::class, 'document_id')
            ->where('is_active', true);
    }

    public function accesses()
    {
        return $this->hasMany(DocumentAccessModel::class, 'document_id');
    }

    protected $table = 'tb_documents';

    protected $primaryKey = 'id';

    protected $guarded = [
        'id',
    ];
}
