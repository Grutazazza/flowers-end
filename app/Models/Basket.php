<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'tovar'
    ];
    protected $casts = [
        'tovar' => 'array'
    ];

    public function tovar(array $revisions, bool $save = true) : self
    {
        $this->tovar = array_merge($this->tovar, $revisions);
        if ($save) {
            $this->save();
        }
        return $this;
    }
    public function repl(array $revisions, bool $save = true) : self
    {
        $this->tovar = array_replace($this->tovar, $revisions);
        if ($save) {
            $this->save();
        }
        return $this;
    }
}
