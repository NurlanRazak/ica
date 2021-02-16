<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FamilyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Family;
use App\Models\User;

class FamilyCrudController extends DefaultCrudController
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
                'name' => 'parents',
                'label' => trans('admin.family_members'),
                'type' => 'table',
                'columns' => [
                    'fio' => trans('admin.fio'),
                    'birth_date' => trans('admin.birth_date'),
                    'type_member' => trans('admin.type_member'),
                ],
            ],
            [
                'name' => 'family',
                'label' => trans('admin.children'),
                'type' => 'table',
                'columns' => [
                    'name' => trans('admin.fio'),
                    'gender' => trans('admin.gender'),
                    'birth_date' => trans('admin.birth_date'),
                ],
            ],
        ]);

        parent::setupListOperation();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(FamilyRequest::class);

        CRUD::addFields([
            [
                'name' => 'user_id',
                'label' => trans('admin.user'),
                'type' => 'select2',
                'entity' => 'user',
                'attribute' => 'name',
                'model' => User::class,
            ],
            [
                'name' => 'parents',
                'label' => trans('admin.family_members'),
                'type' => 'repeatable',
                'fields' => [
                    [
                        'name' => 'type_member',
                        'label' => trans('admin.type_member'),
                        'type'        => 'select2_from_array',
                        'options'     => [
                            'Отец' => 'Отец',
                            'Мать' => 'Мать',
                            'Жена' => 'Жена',
                        ],
                        'allows_null' => false,
                        'wrapper' => [
                            'class' => 'form-group col-sm-12'
                        ],
                    ],
                    [
                        'name' => 'fio',
                        'type' => 'text',
                        'label' => trans('admin.fio'),
                        'wrapper' => [
                            'class' => 'form-group col-sm-6',
                        ],
                    ],
                    [
                        'name' => 'birth_date',
                        'type' => 'date',
                        'label' => trans('admin.birth_date'),
                        'wrapper' => [
                            'class' => 'form-group col-sm-6',
                        ],
                    ],
                ],
                'new_item_label'  => trans('admin.add_member'),
                'max_rows' => 3,
            ],
            [
                'name' => 'family',
                'label' => trans('admin.children'),
                'type' => 'repeatable',
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => trans('admin.fio'),
                        'type' => 'text',
                        'wrapper' => [
                            'class' => 'form-group col-sm-6'
                        ],
                    ],
                    [
                        'name' => 'gender',
                        'label' => trans('admin.gender'),
                        'type'        => 'select2_from_array',
                        'options'     => [
                            'man' => 'Сын',
                            'girl' => 'Дочь'
                        ],
                        'allows_null' => false,
                        'wrapper' => [
                            'class' => 'form-group col-sm-6'
                        ],
                    ],
                    [
                        'name' => 'birth_date',
                        'label' => trans('admin.birth_date'),
                        'type' => 'date',
                        'wrapper' => [
                            'class' => 'form-group col-sm-6'
                        ],
                    ],
                    [
                        'name' => 'iin',
                        'label' => trans('admin.iin'),
                        'type' => 'number',
                        'wrapper' => [
                            'class' => 'form-group col-sm-6'
                        ],
                    ],
                    [
                        'name' => 'issued_date_identification',
                        'label' => trans('admin.issued_date_identification'),
                        'type' => 'date',
                        'wrapper' => [
                            'class' => 'form-group col-sm-6'
                        ],
                    ],
                    [
                        'name' => 'number_identification',
                        'label' => trans('admin.number_identification'),
                        'type' => 'number',
                        'prefix' => '№',
                        'wrapper' => [
                            'class' => 'form-group col-sm-6'
                        ],
                    ],
                    [
                        'name' => 'phone',
                        'label' => trans('admin.phone'),
                        'type' => 'text',
                        'wrapper' => [
                            'class' => 'form-group col-sm-6'
                        ],
                    ],
                    [
                        'name' => 'address',
                        'label' => trans('admin.address'),
                        'type' => 'textarea',
                        'wrapper' => [
                            'class' => 'form-group col-sm-6'
                        ],
                    ],
                ],
                'new_item_label'  => trans('admin.add_child'),
            ],
        ]);
    }
}
