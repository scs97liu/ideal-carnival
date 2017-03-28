<?php namespace App\Presenter\Presenters;

use App\Presenter\Presenter;

class LogPresenter extends Presenter
{
    public function chartDataPoint()
    {
        return [
            "x" => $this->entity->time->addHours(-4)->timestamp * 1000,
            "y" => $this->entity->bg->bg,
            "url" => route('log.show', $this->entity->id)
        ];
    }
}