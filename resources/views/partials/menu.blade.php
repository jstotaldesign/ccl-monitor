<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('monitor_project_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/statuses*") ? "menu-open" : "" }} {{ request()->is("admin/job-types*") ? "menu-open" : "" }} {{ request()->is("admin/ctergorize-priorities*") ? "menu-open" : "" }} {{ request()->is("admin/responsibilities*") ? "menu-open" : "" }} {{ request()->is("admin/status-types*") ? "menu-open" : "" }} {{ request()->is("admin/dynamics-nav-menus*") ? "menu-open" : "" }} {{ request()->is("admin/dynamics-nav-object-types*") ? "menu-open" : "" }} {{ request()->is("admin/dynamics-nav-ojbect-ids*") ? "menu-open" : "" }} {{ request()->is("admin/requesters*") ? "menu-open" : "" }} {{ request()->is("admin/departments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/statuses*") ? "active" : "" }} {{ request()->is("admin/job-types*") ? "active" : "" }} {{ request()->is("admin/ctergorize-priorities*") ? "active" : "" }} {{ request()->is("admin/responsibilities*") ? "active" : "" }} {{ request()->is("admin/status-types*") ? "active" : "" }} {{ request()->is("admin/dynamics-nav-menus*") ? "active" : "" }} {{ request()->is("admin/dynamics-nav-object-types*") ? "active" : "" }} {{ request()->is("admin/dynamics-nav-ojbect-ids*") ? "active" : "" }} {{ request()->is("admin/requesters*") ? "active" : "" }} {{ request()->is("admin/departments*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-desktop">

                            </i>
                            <p>
                                {{ trans('cruds.monitorProject.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.statuses.index") }}" class="nav-link {{ request()->is("admin/statuses") || request()->is("admin/statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.status.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('job_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.job-types.index") }}" class="nav-link {{ request()->is("admin/job-types") || request()->is("admin/job-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-bity">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jobType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ctergorize_priority_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ctergorize-priorities.index") }}" class="nav-link {{ request()->is("admin/ctergorize-priorities") || request()->is("admin/ctergorize-priorities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-object-group">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ctergorizePriority.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('responsibility_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.responsibilities.index") }}" class="nav-link {{ request()->is("admin/responsibilities") || request()->is("admin/responsibilities/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.responsibility.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('status_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.status-types.index") }}" class="nav-link {{ request()->is("admin/status-types") || request()->is("admin/status-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-check">

                                        </i>
                                        <p>
                                            {{ trans('cruds.statusType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('dynamics_nav_menu_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dynamics-nav-menus.index") }}" class="nav-link {{ request()->is("admin/dynamics-nav-menus") || request()->is("admin/dynamics-nav-menus/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-braille">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dynamicsNavMenu.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('dynamics_nav_object_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dynamics-nav-object-types.index") }}" class="nav-link {{ request()->is("admin/dynamics-nav-object-types") || request()->is("admin/dynamics-nav-object-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sliders-h">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dynamicsNavObjectType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('dynamics_nav_ojbect_id_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dynamics-nav-ojbect-ids.index") }}" class="nav-link {{ request()->is("admin/dynamics-nav-ojbect-ids") || request()->is("admin/dynamics-nav-ojbect-ids/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-folder-open">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dynamicsNavOjbectId.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('requester_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.requesters.index") }}" class="nav-link {{ request()->is("admin/requesters") || request()->is("admin/requesters/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.requester.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('department_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.departments.index") }}" class="nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-caret-square-down">

                                        </i>
                                        <p>
                                            {{ trans('cruds.department.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('project_issue_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/issues*") ? "menu-open" : "" }} {{ request()->is("admin/detail-of-subjects*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/issues*") ? "active" : "" }} {{ request()->is("admin/detail-of-subjects*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.projectIssue.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('issue_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.issues.index") }}" class="nav-link {{ request()->is("admin/issues") || request()->is("admin/issues/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-buromobelexperte">

                                        </i>
                                        <p>
                                            {{ trans('cruds.issue.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('detail_of_subject_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.detail-of-subjects.index") }}" class="nav-link {{ request()->is("admin/detail-of-subjects") || request()->is("admin/detail-of-subjects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-book">

                                        </i>
                                        <p>
                                            {{ trans('cruds.detailOfSubject.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>