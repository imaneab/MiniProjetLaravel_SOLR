<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminInfos extends Model
{
    protected $fillable = [
        'nb_users', 'nb_documents_admin', 'nb_documents_user', 'poucentage_doc_avril', 'poucentage_doc_mai', 'poucentage_doc_juin', 'actualites_admin', 'nb_evenements_admin'
    ];
}
