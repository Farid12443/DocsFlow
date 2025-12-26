<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentVersionsModel extends Model
{
    public function document()
    {
        return $this->belongsTo(DocumentsModel::class, 'document_id');
    }
}
