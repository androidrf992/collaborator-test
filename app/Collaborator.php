<?php


namespace App;

use Baum\Node;


class Collaborator extends Node
{
    protected $table = 'collaborator';

    public $timestamps = false;

    /**
     * Column name which stores reference to parent's node.
     *
     * @var string
     */
    protected $parentColumn = 'parent_id';

    /**
     * Column name for the left index.
     *
     * @var string
     */
    protected $leftColumn = 'lft';

    /**
     * Column name for the right index.
     *
     * @var string
     */
    protected $rightColumn = 'rgt';

    /**
     * Column name for the depth field.
     *
     * @var string
     */
    protected $depthColumn = 'depth';

    /**
     * Column to perform the default sorting
     *
     * @var string
     */
    protected $orderColumn = null;

    /**
     * With Baum, all NestedSet-related fields are guarded from mass-assignment
     * by default.
     *
     * @var array
     */
    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');

    protected $fillable = ['full_name', 'post', 'salary' , 'photo', 'create_at'];

    public function scopeSort($query, $column, $type)
    {
        return $query->orderBy($column, $type);
    }

    public function scopeSearch($query, $column, $value)
    {
        return $query->where($column, 'like', "{$value}%");
    }

    public function getTree($id = null)
    {
        $tree = $this->orderBy('lft')->where('parent_id', $id)->get();

        $jsonString = '[';
        foreach ($tree as $key => $item) {
            if($key)
                $jsonString .= ',';

            $jsonString .= "{'label': \"{$item->full_name} ({$item->post})\", 'id': {$item->id}";
            if($item->rgt - $item->lft > 1)
                $jsonString .= ", 'load_on_demand': true";
            $jsonString .= "}";
        }
        $jsonString .= ']';

        return $jsonString;

    }

}