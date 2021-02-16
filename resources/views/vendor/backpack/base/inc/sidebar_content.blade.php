<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('position') }}'><i class='nav-icon la la-id-badge'></i> {{ trans_choice('admin.positions', 2) }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-users'></i> {{ trans_choice('admin.users', 2) }}</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('family') }}'><i class='nav-icon la la-home'></i> {{ trans_choice('admin.families', 2) }}</a></li>

{{--<li class="nav-title"> Проверка знание по ПБ (ПРОМЫШЛЕННОЙ БЕЗОПАСНОСТИ)</li>--}}
<li class="nav-title"> ПРОМЫШЛЕННАЯ БЕЗОПАСНОСТЬ</li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pressurevessel') }}'><i class='nav-icon la la-expand'></i> {{ trans_choice('admin.pressurevessels', 2) }}</a></li>

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('cran') }}'><i class='nav-icon la la-tools'></i> {{ trans_choice('admin.crans', 2) }}</a></li>

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('firehazard') }}'><i class='nav-icon la la-fire-alt'></i> {{ trans_choice('admin.firehazards', 2) }}</a></li>

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('methanol') }}'><i class='nav-icon la la-medium'></i> {{ trans_choice('admin.methanols', 2) }}</a></li>

<li class="nav-title"> ПОЖАРНО-ТЕХНИЧЕСКИЙ МИНИМУМ</li>
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('techminimum') }}'><i class='nav-icon la la-water'></i> {{ trans_choice('admin.techminimums', 2)}} </a></li>

<li class="nav-title"> ЭЛЕКТРОУСТАНОВКИ</li>
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('electric') }}'><i class='nav-icon la la-plug'></i> {{ trans_choice('admin.electrics', 2) }} </a></li>

<li class="nav-title"> ПОЖАРНАЯ БЕЗОПАСНОСТЬ</li>
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('firesafe') }}'><i class='nav-icon la la-bus-alt'></i> {{ trans_choice('admin.firesaves', 2) }} </a></li>
