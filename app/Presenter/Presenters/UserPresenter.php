<?php namespace App\Presenter\Presenters;

use App\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function gravatar($size = 100, $imgTag = false)
    {
        $hash = md5(strtolower(trim($this->entity->email)));
        $url = "http://www.gravatar.com/avatar/$hash/d=mm&s=$size";
        return ($imgTag) ? '<img src="' . $url . '" />' : $url;
    }

    public function fullName()
    {
        return trim($this->entity->first_name . ' ' . $this->entity->last_name);
    }
}