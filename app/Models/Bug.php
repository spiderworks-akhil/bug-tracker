<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Bug extends Model
{
    use HasFactory,HasApiTokens;

    protected $table = 'bugs';

    public function error_code_class(){
        switch ($this->error_code){
            case 404: return 'badge-warning'; break;
            case 500: return 'badge-danger'; break;
            case 405: return 'badge-dark'; break;
            default: return 'badge-primary'; break;
        }
    }
}
