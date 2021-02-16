<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Position;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings(trans_choice('admin.users', 1), trans_choice('admin.users', 2));
    }

    protected function setupListOperation()
    {
        CRUD::addColumns([
            [
                'name' => 'name',
                'label' => trans('admin.name'),
            ],
            [
                'name' => 'phone',
                'label' => trans('admin.phone'),
            ],
            [
                'name' => 'iin',
                'label' => trans('admin.iin'),
            ],
            [
                'name' => 'number_identification',
                'label' => trans('admin.number_identification'),
            ],
            [
                'name' => 'issued_date_identification',
                'label' => trans('admin.issued_date_identification'),
            ],
            [
                'name' => 'expiring_date_identification',
                'label' => trans('admin.expiring_date_identification'),
            ],
            [
                'name' => 'number_order',
                'label' => trans('admin.number_order'),
            ],
            [
                'name' => 'recruitment_date',
                'label' => trans('admin.recruitment_date'),
            ],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::addFields([
            [
                'name' => 'name',
                'label' => trans('admin.name'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'position_id',
                'label' => trans('admin.position_name'),
                'type' => 'select2',
                'entity' => 'position',
                'attribute' => 'name',
                'model' => Position::class,
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'phone',
                'label' => trans('admin.phone'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'iin',
                'label' => trans('admin.iin'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'issued_organization',
                'label' => trans('admin.issued_organization'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'number_identification',
                'label' => trans('admin.number_identification'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'issued_date_identification',
                'label' => trans('admin.issued_date_identification'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'expiring_date_identification',
                'label' => trans('admin.expiring_date_identification'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'number_order',
                'label' => trans('admin.number_order'),
                'type' => 'number',
                'prefix' => '№',
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
            [
                'name' => 'recruitment_date',
                'label' => trans('admin.recruitment_date'),
                'wrapper' => [
                    'class' => 'form-group col-sm-6',
                ],
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
