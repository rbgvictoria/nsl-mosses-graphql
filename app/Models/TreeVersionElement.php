<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $element_link
 * @property string $parent_id
 * @property integer $tree_element_id
 * @property integer $tree_version_id
 * @property int $depth
 * @property string $name_path
 * @property integer $taxon_id
 * @property string $taxon_link
 * @property string $tree_path
 * @property string $updated_at
 * @property string $updated_by
 * @property boolean $merge_conflict
 * @property TreeVersion $treeVersion
 * @property TreeVersionElement $treeVersionElement
 * @property TreeElement $treeElement
 */
class TreeVersionElement extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tree_version_element';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'element_link';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'tree_element_id', 'tree_version_id', 'depth', 'name_path', 'taxon_id', 'taxon_link', 'tree_path', 'updated_at', 'updated_by', 'merge_conflict'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treeVersion()
    {
        return $this->belongsTo('App\Models\TreeVersion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\TreeVersionElement', 'parent_id', 'element_link');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treeElement()
    {
        return $this->belongsTo('App\Models\TreeElement');
    }
}
