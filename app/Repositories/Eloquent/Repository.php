<?php
namespace App\Repositories\Eloquent;
use Illuminate\Container\Container as App;

abstract class Repository{
protected $model;
private $app;

function __construct(App $app)
{
    $this->app = $app;
    $this->makeModel();
}
public function makeModel(){
    $model = $this->app->make($this->model());
    return $this->model = $model;
}
    abstract public function model();
    public function create(array $data){
        return $this->model->create($data);

    }


}
