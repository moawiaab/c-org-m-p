<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <i class="fas fa-chalkboard-teacher"></i>
        <span class="brand-text font-weight-light">{{auth()->user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}"
                        class="{{ request()->is('admin') ? 'active' : ' ' }} nav-link">
                        <i class="nav-icon fas fa-tv"></i>
                        <p>{{ trans('global.dashboard') }}</p>
                    </a>
                </li>
               
                @can('setting_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/branches*') || request()->is('admin/donors*') || request()->is('admin/fiscal-years*') ? 'menu-open' : '' }}">
                        <a class="nav-link {{ request()->is('admin/branches*') || request()->is('admin/donors*') || request()->is('admin/fiscal-years*') ? 'active' : '' }}"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="nav-icon fa-fw fas c-sidebar-nav-icon fa-sliders-h"></i>
                            <p>
                                {{ trans('cruds.setting.title') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('branch_access')
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('admin/branches*') ? 'active' : '' }}"
                                        href="{{ route('admin.branches.index') }}">
                                        <i class="nav-icon  fas fa-code-branch">
                                        </i>
                                        <p>{{ trans('cruds.branch.title') }}</p>
                                        
                                    </a>
                                </li>
                            @endcan
                            @can('donor_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/donors*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.donors.index') }}">
                                        <i class="nav-icon  fas fa-hand-holding-usd">
                                        </i>
                                       <p> {{ trans('cruds.donor.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('fiscal_year_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/fiscal-years*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.fiscal-years.index') }}">
                                        <i class="nav-icon  fas fa-cogs">
                                        </i>
                                       <p> {{ trans('cruds.fiscalYear.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('expense_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/expenses*') || request()->is('admin/ratifications*') ? 'menu-open' : ' ' }}">
                        <a class=" {{ request()->is('admin/expenses*') || request()->is('admin/ratifications*') ? 'active' : ' ' }} nav-link"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="nav-icon fa-fw fas c-sidebar-nav-icon fa-hand-holding-usd">
                            </i>
                            <p>
                            {{ trans('cruds.expenseManagement.title') }}

                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('expense_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/expenses*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.expenses.index') }}">
                                        <i class="nav-icon  fab fa-etsy">
                                        </i>
                                       <p> {{ trans('cruds.expense.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('ratification_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/ratifications*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.ratifications.index') }}">
                                        <i class="nav-icon  far fa-money-bill-alt">
                                        </i>
                                       <p> {{ trans('cruds.ratification.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('budge_list_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/budget-names*') || request()->is('admin/budgets*') ? 'menu-open' : ' ' }}">
                        <a class=" {{ request()->is('admin/budget-names*') || request()->is('admin/budgets*') ? 'active' : ' ' }} nav-link"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="nav-icon fa-fw fas c-sidebar-nav-icon fa-align-justify">
                            </i>
                            <p>
                            {{ trans('cruds.budgeList.title') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('budget_name_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/budget-names*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.budget-names.index') }}">
                                        <i class="nav-icon  fas fa-credit-card">
                                        </i>
                                      <p>  {{ trans('cruds.budgetName.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('budget_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/budgets*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.budgets.index') }}">
                                        <i class="nav-icon  fas fa-sort-amount-up">
                                        </i>
                                        <p>{{ trans('cruds.budget.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('project_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/project-departments*') || request()->is('admin/project-branches*') || request()->is('admin/projects*') || request()->is('admin/project-stages*') || request()->is('admin/stage-details*') ? 'menu-open' : ' ' }}">
                        <a class=" {{ request()->is('admin/project-departments*') || request()->is('admin/project-branches*') || request()->is('admin/projects*') || request()->is('admin/project-stages*') || request()->is('admin/stage-details*') ? 'active' : ' ' }} nav-link"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="nav-icon fa-fw fas c-sidebar-nav-icon fa-project-diagram">
                            </i>
                            <p>
                            {{ trans('cruds.projectManagement.title') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('project_department_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/project-departments*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.project-departments.index') }}">
                                        <i class="nav-icon  fas fa-chalkboard-teacher">
                                        </i>
                                        <p>{{ trans('cruds.projectDepartment.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_branch_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/project-branches*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.project-branches.index') }}">
                                        <i class="nav-icon  fas fa-code-branch">
                                        </i>
                                       <p> {{ trans('cruds.projectBranch.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/projects*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.projects.index') }}">
                                        <i class="nav-icon  fas fa-chart-pie">
                                        </i>
                                        <p>{{ trans('cruds.project.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_stage_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/project-stages*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.project-stages.index') }}">
                                        <i class="nav-icon  far fa-snowflake">
                                        </i>
                                        <p>{{ trans('cruds.projectStage.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('stage_detail_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/stage-details*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.stage-details.index') }}">
                                        <i class="nav-icon  fas fa-bars">
                                        </i>
                                        <p>{{ trans('cruds.stageDetail.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('financial_window_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/banks*') || request()->is('admin/bank-amounts*') || request()->is('admin/treasuries*') || request()->is('admin/sheks*') ? 'menu-open' : ' ' }}">
                        <a class=" {{ request()->is('admin/banks*') || request()->is('admin/bank-amounts*') || request()->is('admin/treasuries*') || request()->is('admin/sheks*') ? 'active' : ' ' }} nav-link"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="nav-icon fa-fw fas c-sidebar-nav-icon fa-file-invoice-dollar">
                            </i>
                            <p>
                                {{ trans('cruds.financialWindow.title') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('bank_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/banks*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.banks.index') }}">
                                        <i class="nav-icon  fas fa-university">
                                        </i>
                                       <p> {{ trans('cruds.bank.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bank_amount_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/bank-amounts*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.bank-amounts.index') }}">
                                        <i class="nav-icon  fas fa-exchange-alt">
                                        </i>
                                        <p>{{ trans('cruds.bankAmount.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('treasury_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/treasuries*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.treasuries.index') }}">
                                        <i class="nav-icon  far fa-hdd">
                                        </i>
                                       <p> {{ trans('cruds.treasury.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('shek_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/sheks*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.sheks.index') }}">
                                        <i class="nav-icon  fas fa-file-invoice-dollar">
                                        </i>
                                       <p> {{ trans('cruds.shek.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') || request()->is('admin/user-alerts*') ? 'menu-open' : ' ' }}">
                        <a class=" {{ request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') || request()->is('admin/user-alerts*') ? 'active' : ' ' }} nav-link"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="nav-icon fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            <p>
                            {{ trans('cruds.userManagement.title') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/permissions*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.permissions.index') }}">
                                        <i class="nav-icon  fas fa-unlock-alt">
                                        </i>
                                       <p> {{ trans('cruds.permission.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/roles*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.roles.index') }}">
                                        <i class="nav-icon  fas fa-briefcase">
                                        </i>
                                       <p> {{ trans('cruds.role.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/users*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.users.index') }}">
                                        <i class="nav-icon  fas fa-user">
                                        </i>
                                      <p>  {{ trans('cruds.user.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/user-alerts*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.user-alerts.index') }}">
                                        <i class="nav-icon  fas fa-bell">
                                        </i>
                                        <p>{{ trans('cruds.userAlert.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('country_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/countries*') || request()->is('admin/ctiys*') || request()->is('admin/areas*') ? 'menu-open' : ' ' }}">
                        <a class=" {{ request()->is('admin/countries*') || request()->is('admin/ctiys*') || request()->is('admin/areas*') ? 'active' : ' ' }} nav-link"
                            href="#" onclick="window.openSubNav(this)">
                            <i class="nav-icon fa-fw fas c-sidebar-nav-icon fa-globe-americas">
                            </i>
                            <p>
                            {{ trans('cruds.countryManagement.title') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('country_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/countries*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.countries.index') }}">
                                        <i class="nav-icon  fas fa-globe-asia">
                                        </i>
                                        <p>{{ trans('cruds.country.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('ctiy_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/ctiys*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.ctiys.index') }}">
                                        <i class="nav-icon  fas fa-university">
                                        </i>
                                       <p> {{ trans('cruds.ctiy.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                            @can('area_access')
                                <li class="nav-item">
                                    <a class="{{ request()->is('admin/areas*') ? 'active' : ' ' }} nav-link"
                                        href="{{ route('admin.areas.index') }}">
                                        <i class="nav-icon  fab fa-uniregistry">
                                        </i>
                                       <p> {{ trans('cruds.area.title') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item ">
                    <a class="{{ request()->is('admin/messages*') ? 'active' : ' ' }} nav-link"
                        href="{{ route('admin.messages.index') }}">
                        <i class="nav-icon far fa-fw fa-envelope c-sidebar-nav-icon">
                        </i>
                        <p>{{ __('global.messages') }}</p>
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
                                class="{{ request()->is('profile') ? 'active' : ' ' }} nav-link">
                                <i class="nav-icon  fas fa-user-circle"></i>
                                <p>{{ trans('global.my_profile') }}</p>
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="nav-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                        class="sidebar-nav nav-link">
                        <i class="nav-icon fa-fw fas fa-sign-out-alt"></i>
                       <p> {{ trans('global.logout') }}</p>
                    </a>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
