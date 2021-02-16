<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PositionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\User;

class PositionCrudController extends DefaultCrudController
{

    public function setup()
    {
        parent::setup();
    }

    protected function setupListOperation()
    {
        CRUD::addColumns([
            [
                'name' => 'name',
                'label' => trans('admin.position_name'),
            ],
            [
                'name' => 'users',
                'type' => 'relationship',
                'label' => trans_choice('admin.users', 2),
                'entity' => 'users',
                'attribute' => 'name',
                'model' => User::class,
            ],
        ]);
        parent::setupListOperation();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PositionRequest::class);

        CRUD::addFields([
            [
                'name' => 'name',
                'label' => trans('admin.position_name'),
            ],
            // [
            //     'name' => 'users',
            //     'type' => 'select2_multiple',
            //     'label' => trans_choice('admin.users', 2),
            //     'entity' => 'users',
            //     'attribute' => 'name',
            //     'model' => User::class,
            // ],
        ]);
    }
}
