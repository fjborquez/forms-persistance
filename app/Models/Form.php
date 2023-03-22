<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kitar\Dynamodb\Model\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ['sec_document', 'cik', 'form', 'date', 'xml'];
    protected $primaryKey = 'sec_document';
    protected $table = 'forms';

    public static function find($id)
    {
        return parent::find([
            'sec_document' => $id
        ]);
    }
}
