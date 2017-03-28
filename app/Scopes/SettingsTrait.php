<?php namespace App\Scopes;

trait SettingsTrait
{

    private $converted = [];
    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootSettingsTrait()
    {
        static::addGlobalScope(new SettingsScope);
    }

    /**
     * Add cast to model.
     *
     * @param string $name
     * @param string $type
     */
    public function addCast($name, $type)
    {
        $this->casts[$name] = $type;
    }

    /**
     * Return settings key.
     *
     * @param  string $name
     * @return mixed
     */
    public function getSettingsKey($name)
    {
        return "settings_{$name}";
    }

    /**
     * Check user setting
     *
     * @param  string $name
     * @param  mixed  $default
     * @return mixed
     */
    public function getSetting($name, $default = null)
    {
        $name = $this->getSettingsKey($name);
        if (array_key_exists($name, $this->attributes)) {
            if($name === 'settings_low_target' || $name === 'settings_high_target')
            {
                $this->interceptForTargets($name);
            }
            return $this->getAttributeValue($name);
        }

        return $default;
    }

    private function interceptForTargets($name)
    {
        if($this->attributes['settings_preferred_units'] === 'mg/dl')
        {
            if(!in_array($name, $this->converted))
            {
                $this->attributes[$name] = $this->attributes[$name] * 18;
                $this->converted[] = $name;
            }
        }
    }

}