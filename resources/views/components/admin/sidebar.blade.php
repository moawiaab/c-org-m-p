<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <i class="fas fa-chalkboard-teacher"></i>
        <span class="brand-text font-weight-light">{{auth()->user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/logo.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}"
                        class="{{ request()->is('admin') ? 'sidebar-nav-active' : 'sidebar-nav' }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('setting_access')
                    <li class="nav-item has-treeview">
                        <a class="has-sub {{ request()->is('admin/branches*') || request()->is('admin/donors*') || request()->is('admin/fiscal-years*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-sliders-h">
                            </i>
                            {{ trans('cruds.setting.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('branch_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/branches*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.branches.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-code-branch">
                                        </i>
                                        {{ trans('cruds.brabch.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('donor_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/donors*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.donors.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-hand-holding-usd">
                                        </i>
                                        {{ trans('cruds.donor.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('fiscal_year_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/fiscal-years*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.fiscal-years.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.fiscalYear.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('expense_management_access')
                    <li class="nav-item has-treeview">
                        <a class="has-sub {{ request()->is('admin/expenses*') || request()->is('admin/ratifications*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-hand-holding-usd">
                            </i>
                            {{ trans('cruds.expenseManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('expense_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/expenses*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.expenses.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-etsy">
                                        </i>
                                        {{ trans('cruds.expense.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('ratification_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/ratifications*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.ratifications.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-money-bill-alt">
                                        </i>
                                        {{ trans('cruds.ratification.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('budge_list_access')
                    <li class="nav-item">
                        <a class="has-sub {{ request()->is('admin/budget-names*') || request()->is('admin/budgets*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-align-justify">
                            </i>
                            {{ trans('cruds.budgeList.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('budget_name_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/budget-names*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.budget-names.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-credit-card">
                                        </i>
                                        {{ trans('cruds.budgetName.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('budget_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/budgets*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.budgets.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-sort-amount-up">
                                        </i>
                                        {{ trans('cruds.budget.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('project_management_access')
                    <li class="nav-item">
                        <a class="has-sub {{ request()->is('admin/project-departments*') || request()->is('admin/project-branches*') || request()->is('admin/projects*') || request()->is('admin/project-stages*') || request()->is('admin/stage-details*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-project-diagram">
                            </i>
                            {{ trans('cruds.projectManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('project_department_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/project-departments*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.project-departments.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-chalkboard-teacher">
                                        </i>
                                        {{ trans('cruds.projectDepartment.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('project_branch_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/project-branches*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.project-branches.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-code-branch">
                                        </i>
                                        {{ trans('cruds.projectBranch.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('project_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/projects*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.projects.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-chart-pie">
                                        </i>
                                        {{ trans('cruds.project.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('project_stage_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/project-stages*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.project-stages.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-snowflake">
                                        </i>
                                        {{ trans('cruds.projectStage.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('stage_detail_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/stage-details*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.stage-details.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bars">
                                        </i>
                                        {{ trans('cruds.stageDetail.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('financial_window_access')
                    <li class="nav-item">
                        <a class="has-sub {{ request()->is('admin/banks*') || request()->is('admin/bank-amounts*') || request()->is('admin/treasuries*') || request()->is('admin/sheks*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-file-invoice-dollar">
                            </i>
                            {{ trans('cruds.financialWindow.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('bank_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/banks*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.banks.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-university">
                                        </i>
                                        {{ trans('cruds.bank.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('bank_amount_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/bank-amounts*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.bank-amounts.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-exchange-alt">
                                        </i>
                                        {{ trans('cruds.bankAmount.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('treasury_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/treasuries*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.treasuries.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-hdd">
                                        </i>
                                        {{ trans('cruds.treasury.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('shek_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/sheks*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.sheks.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-invoice-dollar">
                                        </i>
                                        {{ trans('cruds.shek.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item">
                        <a class="has-sub {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') || request()->is('admin/user-alerts*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/permissions*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.permissions.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/roles*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.roles.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/users*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.users.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/user-alerts*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.user-alerts.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                                        </i>
                                        {{ trans('cruds.userAlert.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('country_management_access')
                    <li class="nav-item">
                        <a class="has-sub {{ request()->is('admin/countries*') || request()->is('admin/ctiys*') || request()->is('admin/areas*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-globe-americas">
                            </i>
                            {{ trans('cruds.countryManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('country_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/countries*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.countries.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-globe-asia">
                                        </i>
                                        {{ trans('cruds.country.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('ctiy_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/ctiys*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.ctiys.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-university">
                                        </i>
                                        {{ trans('cruds.ctiy.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('area_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/areas*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                                        href="{{ route('admin.areas.index') }}">
                                        <i class="fa-fw c-sidebar-nav-icon fab fa-uniregistry">
                                        </i>
                                        {{ trans('cruds.area.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="{{ request()->is('admin/messages*') ? 'sidebar-nav-active' : 'sidebar-nav' }}"
                        href="{{ route('admin.messages.index') }}">
                        <i class="far fa-fw fa-envelope c-sidebar-nav-icon">
                        </i>
                        {{ __('global.messages') }}
                        @if ($unreadConversations['all'])
                            <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                                {{ $unreadConversations['all'] }}
                            </span>
                        @endif
                    </a>
                </li>


                @if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="nav-item">
                            <a href="{{ route('profile.show') }}"
                                class="{{ request()->is('profile') ? 'sidebar-nav-active' : 'sidebar-nav' }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="nav-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                        class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
