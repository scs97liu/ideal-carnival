<?php namespace App\Scopes;

trait SettingsTrait
{
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
            return $this->getAttributeValue($name);
        }

        return $default;
    }
}