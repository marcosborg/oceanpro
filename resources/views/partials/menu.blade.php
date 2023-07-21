<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('home_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-home">

                        </i>
                        <span>{{ trans('cruds.home.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('slide_access')
                            <li class="{{ request()->is("admin/slides") || request()->is("admin/slides/*") ? "active" : "" }}">
                                <a href="{{ route("admin.slides.index") }}">
                                    <i class="fa-fw fas fa-images">

                                    </i>
                                    <span>{{ trans('cruds.slide.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('service_list_access')
                            <li class="{{ request()->is("admin/service-lists") || request()->is("admin/service-lists/*") ? "active" : "" }}">
                                <a href="{{ route("admin.service-lists.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.serviceList.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('feature_access')
                            <li class="{{ request()->is("admin/features") || request()->is("admin/features/*") ? "active" : "" }}">
                                <a href="{{ route("admin.features.index") }}">
                                    <i class="fa-fw fas fa-check-double">

                                    </i>
                                    <span>{{ trans('cruds.feature.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('inner_service_access')
                            <li class="{{ request()->is("admin/inner-services") || request()->is("admin/inner-services/*") ? "active" : "" }}">
                                <a href="{{ route("admin.inner-services.index") }}">
                                    <i class="fa-fw fas fa-check">

                                    </i>
                                    <span>{{ trans('cruds.innerService.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('video_access')
                            <li class="{{ request()->is("admin/videos") || request()->is("admin/videos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.videos.index") }}">
                                    <i class="fa-fw fab fa-youtube">

                                    </i>
                                    <span>{{ trans('cruds.video.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('customer_access')
                            <li class="{{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.customers.index") }}">
                                    <i class="fa-fw fas fa-building">

                                    </i>
                                    <span>{{ trans('cruds.customer.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('page_access')
                <li class="{{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "active" : "" }}">
                    <a href="{{ route("admin.pages.index") }}">
                        <i class="fa-fw fas fa-sitemap">

                        </i>
                        <span>{{ trans('cruds.page.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('service_access')
                <li class="{{ request()->is("admin/services") || request()->is("admin/services/*") ? "active" : "" }}">
                    <a href="{{ route("admin.services.index") }}">
                        <i class="fa-fw fas fa-check-double">

                        </i>
                        <span>{{ trans('cruds.service.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('quotation_access')
                <li class="{{ request()->is("admin/quotations") || request()->is("admin/quotations/*") ? "active" : "" }}">
                    <a href="{{ route("admin.quotations.index") }}">
                        <i class="fa-fw fas fa-euro-sign">

                        </i>
                        <span>{{ trans('cruds.quotation.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('contact_access')
                <li class="{{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.contacts.index") }}">
                        <i class="fa-fw fas fa-headset">

                        </i>
                        <span>{{ trans('cruds.contact.title') }}</span>

                    </a>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>