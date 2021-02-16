<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TechminimumRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Techminimum;
use App\Models\User;

class TechminimumCrudController extends DefaultCrudController
{

    public function setup()
    {
        parent::setup();
    }

    protected function setupListOperation()
    {
        CRUD::addColumns([
            [
                'name' => 'user_id',
                'label' => trans('admin.user'),
                'type' => 'select',
                'entity' => 'user',
                'attribute' => 'name',
                'model' => User::class,
            ],
            [
                'name' => 'protocol_number',
                'label' => trans('admin.protocol_number'),
            ],
            [
                'name' => 'checked_date',
                'label' => trans('admin.checked_date'),
            ],
            [
                'name' => 'next_check_date',
                'label' => trans('admin.next_check_date'),
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(TechminimumRequest::class);

        CRUD::addFields([
            [
                'name' => 'user_id',
                'label' => trans('admin.user'),
                'type' => 'select2',
                'entity' => 'user',
                'attribute' => 'name',
                'model' => User::class,
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'protocol_number',
                'label' => trans('admin.protocol_number'),
                'prefix' => '№',
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'checked_date',
                'label' => trans('admin.checked_date'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'next_check_date',
                'label' => trans('admin.next_check_date'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
        ]);
    }
}
