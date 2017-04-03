<?php namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;

class SettingsScope implements Scope
{

    private $names = [
        'low_target' => 'double',
        'high_target' => 'double',
        'insulin_to_carb' => 'double',
        'insulin_sensitivity' => 'double',
        'preferred_units' => 'string',
        'notes' => 'string'
    ];

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $selects = [
            'users.*'
        ];

        foreach ($this->names as $setting=>$cast)
        {
            $name = $model->getSettingsKey($setting);
            $selects[] = "preferences.{$setting} as {$name}";
            $model->addCast($name, $cast);
        }

        $builder
            ->join('preferences', 'users.id', '=', 'preferences.user_id')
            ->select($selects);
    }
}