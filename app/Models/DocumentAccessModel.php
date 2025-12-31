<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentAccessModel extends Model
{
    public function document()
    {
        return $this->belongsTo(DocumentsModel::class, 'document_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $table = 'tb_document_access';

    protected $primaryKey = 'id';

    protected $guarded = [
        'id',
    ];
}
