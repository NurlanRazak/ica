<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Post;

class PostCrudController extends DefaultCrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;

    public function setup()
    {
        parent::setup();
    }

    protected function setupListOperation()
    {
        CRUD::addColumns([
            [
                'name' => 'name',
                'label' => trans('admin.title'),
				'limit' => 50,
            ],
            [
                'name' => 'description',
                'label' => trans('admin.description'),
                'limit' => 50,
            ],
            [
                'name' => 'image',
                'label' => trans('admin.image'),
                'type' => 'image',
                'prefix' => 'uploads/',
                'width' => '150px',
                'height' => '150px',
            ],
            [
                'name' => 'status',
                'label' => trans('admin.status'),
                'type' => 'select_from_array',
                'options' => Post::getStatusOptions(),
            ],
        ]);

        parent::setupListOperation();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostRequest::class);

        CRUD::addFields([
            [
                'name' => 'name',
                'label' => trans('admin.title'),
                'type' => 'text',
            ],
            [
                'name' => 'image',
                'label' => trans('admin.image'),
                'type' => 'image',
                'disk' => 'uploads',
                'crop' => true,
                'acpect_ratio' => 0,
            ],
            [
                'name' => 'description',
                'label' => trans('admin.description'),
                'type' => 'ckeditor',
            ],
            [
                'name' => 'status',
                'label' => trans('admin.status'),
                'type' => 'select2_from_array',
                'options' => Post::getStatusOptions(),
            ],
        ]);
    }

    protected function setupReorderOperation()
    {
        // define which model attribute will be shown on draggable elements
        $this->crud->set('reorder.label', 'name');
        // define how deep the admin is allowed to nest the items
        // for infinite levels, set it to 0
        $this->crud->set('reorder.max_level', 1);
    }
}
