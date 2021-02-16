<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-users'></i> {{ trans_choice('admin.users', 2) }}</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('family') }}'><i class='nav-icon la la-home'></i> {{ trans_choice('admin.families', 2) }}</a></li>
