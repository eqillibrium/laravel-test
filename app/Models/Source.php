<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = "sources";

    public function getSource()
    {
        return \DB::table($this->table)->get();
    }

    public function getSourceById($id)
    {
        return \DB::table($this->table)->find($id);
    }
}
