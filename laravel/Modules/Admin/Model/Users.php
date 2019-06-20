<?php

namespace Modules\Admin\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Users extends Model
{
    protected $table = 'users';

    public function insert ($data)
    {
     return DB::table('user')->insert($data);
    }
}
