<?php namespace App\Presenter\Presenters;

use App\BloodSugar;
use App\Carb;
use App\Exercise;
use App\Medication;
use App\Presenter\Presenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class LogPresenter extends Presenter
{
    public function chartDataPoint()
    {
        return [
            "x" => $this->entity->time->timestamp * 1000,
            "y" => $this->entity->bg->bg,
            "url" => route('log.show', $this->entity->id)
        ];
    }

    public function forDashboard()
    {
        $rows = [];
        $humanTime = $this->entity->time->diffForHumans(Carbon::now(), true);
        foreach($this->entity->getRelations() as $relation)
        {
            if($relation === null) continue;
            if(get_class($relation) === Collection::class)
            {
                $result = $this->handleCollection($relation, $humanTime);
                if($result) $rows = array_merge($rows, $result);
            } else {
                $rows[] = $this->toRow($relation, $humanTime);
            }
        }

        return $rows;
    }

    private function handleCollection($collection, $humanTime)
    {
        $rows = [];
        foreach($collection as $object)
        {
            $result = $this->toRow($object, $humanTime);
            if($result) $rows[] = $result;
        }
        return $rows;
    }

    private function toRow($object, $humanTime)
    {
        switch (get_class($object))
        {
            case BloodSugar::class:
                return ['bg', $object->bg . ' mmol/l', $humanTime, 'label-success', 'fa-tint', route('log.show', $this->entity->id)];
                break;
            case Carb::class:
                return ['carb', $object->carbs . 'g', $humanTime, 'label-info', 'fa-cutlery', route('log.show', $this->entity->id)];
                break;
            case Medication::class:
                return ['medication', $object->amount . 'U', $humanTime, 'label-warning', 'fa-medkit', route('log.show', $this->entity->id)];
                break;
            case Exercise::class:
                return ['exercise', $object->minutes . ' min', $humanTime, 'label-danger', 'fa-bicycle', route('log.show', $this->entity->id)];
                break;
            default:
                return null;
                break;
        }
    }
}