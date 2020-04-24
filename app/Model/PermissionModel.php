<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 */
class PermissionModel extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_permissiones';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'http_methods',
        'http_path',
        'level_path',
        'pid',
        'note',
    ];

    public function getHttpMethodsAttribute($key)
    {
        $http_mothods =  array_filter(explode(',', $key));
        $http_mothods = array_map(function($el) {
            return strtoupper($el);
        }, $http_mothods);
        return $http_mothods;
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
