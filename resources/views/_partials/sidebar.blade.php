<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                @if(check_authority('use.security'))

                    <li class="text-muted menu-title">{{ trans('sidebar.Security') }}</li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i>
                            <span> {{ trans('sidebar.Permission_Control_System') }} </span> <span
                                class="menu-arrow"></span></a>
                        <ul class="list-unstyled">

                            @if(in_array(auth()->user()->id, config('vars.authorized_users')))
                                <li><a href="{{ route('permission-groups.index') }}"
                                       class="fire-loader-anchor">{{ trans('sidebar.User_Actions') }}</a></li>
                                <li><a href="{{ route('permissions.index') }}"
                                       class="fire-loader-anchor">{{ trans('sidebar.Data_Entry_Screens') }}</a></li>
                            @endif

                            @if(check_authority('list.user_groups'))
                                <li><a href="{{ route('roles.index') }}"
                                       class="fire-loader-anchor">{{ trans('sidebar.Users_Groups') }}</a></li>
                            @endif

                            @if(check_authority('list.users'))
                                <li><a href="{{ route('users.index') }}"
                                       class="fire-loader-anchor">{{ trans('sidebar.Users') }}</a></li>
                            @endif
                        </ul>
                    </li>

                @endif

                @if(check_authority('use.settings'))
                    <li class="text-muted menu-title">{{ trans('sidebar.Settings') }}</li>

                    @if(check_authority('list.settings'))
                        <li class="has_sub">
                            <a href="{{ route('editSettings') }}" class="waves-effect fire-loader-anchor"><i
                                    class="ti-settings"></i> <span> {{ trans('sidebar.general_settings') }} </span></a>
                        </li>
                    @endif
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i>
                            <span> {{ trans('sidebar.home_page') }} </span> <span
                                class="menu-arrow"></span></a>
                        <ul class="list-unstyled">

                            @if(check_authority('list.home_seo'))
                                <li class="has_sub">
                                    <a href="{{ route('editSettingsHomeSeo') }}"
                                       class="waves-effect fire-loader-anchor"><i
                                            class="ti-agenda"></i>
                                        <span> {{ trans('sidebar.home_page_seo') }} </span></a>
                                </li>
                            @endif
                            @if(check_authority('list.slider'))
                                <li class="has_sub">
                                    <a href="{{ route('listSlider') }}" class="waves-effect fire-loader-anchor"><i
                                            class="ti-image"></i> <span> {{ trans('sidebar.slider') }} </span></a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    @if(check_authority('list.social'))
                        <li class="has_sub">
                            <a href="{{ route('social.index') }}" class="waves-effect fire-loader-anchor"><i
                                    class="ti-medall-alt"></i> <span> {{ trans('sidebar.Socials') }} </span></a>
                        </li>
                    @endif
                    @if(check_authority('list.lookups'))
                        <li class="has_sub">
                            <a href="{{ route('lookup.index') }}" class="waves-effect fire-loader-anchor"><i
                                    class="ti-user"></i> <span> {{ trans('sidebar.Lookups') }} </span></a>
                        </li>
                    @endif
                    @if(check_authority('list.lookups'))
                        <li class="has_sub">
                            <a href="{{ url('translations') }}" class="waves-effect fire-loader-anchor"><i
                                    class="ti-flag"></i> <span> {{ trans('sidebar.Translations') }} </span></a>
                        </li>
                    @endif
                @endif

                @if(check_authority('use.resources'))
                    <li class="text-muted menu-title">{{ trans('sidebar.Resources') }}</li>
                    @if(check_authority('list.category'))
                        <li class="has_sub">
                            <a href="{{ route('category.index') }}" class="waves-effect fire-loader-anchor"><i
                                    class="ti-clip"></i> <span> {{ trans('sidebar.Categories') }} </span></a>
                        </li>
                    @endif
                    @if(check_authority('list.page'))
                        <li class="has_sub">
                            <a href="{{ route('page.index') }}" class="waves-effect fire-loader-anchor"><i
                                    class="ti-pencil-alt"></i> <span> {{ trans('sidebar.Pages') }} </span></a>
                        </li>
                    @endif

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-clipboard"></i>
                            <span> {{ trans('sidebar.about_us') }} </span> <span
                                class="menu-arrow"></span></a>
                        <ul class="list-unstyled">

                            @if(check_authority('list.about_us_seo'))
                                <li class="has_sub">
                                    <a href="{{ route('editSettingsAboutSeo') }}"
                                       class="waves-effect fire-loader-anchor"><i
                                            class="ti-agenda"></i>
                                        <span> {{ trans('sidebar.about_us_seo') }} </span></a>
                                </li>
                            @endif
                            @if(check_authority('list.about_us'))
                                <li class="has_sub">
                                    <a href="{{ route('editSettingsAboutUs') }}"
                                       class="waves-effect fire-loader-anchor"><i
                                            class="ti-pin-alt"></i> <span> {{ trans('sidebar.about_us') }} </span></a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="ti-clipboard"></i>
                            <span> {{ trans('sidebar.contact_us') }} </span> <span
                                class="menu-arrow"></span></a>
                        <ul class="list-unstyled">

                            @if(check_authority('list.contact_us_seo'))
                                <li class="has_sub">
                                    <a href="{{ route('editSettingsContactSeo') }}"
                                       class="waves-effect fire-loader-anchor"><i
                                            class="ti-agenda"></i>
                                        <span> {{ trans('sidebar.contact_us_seo') }} </span></a>
                                </li>
                            @endif
                            @if(check_authority('list.contact_us'))
                                <li class="has_sub">
                                    <a href="{{ route('editSettingsContactUs') }}"
                                       class="waves-effect fire-loader-anchor"><i
                                            class="ti-pin-alt"></i> <span> {{ trans('sidebar.contact_us') }} </span></a>
                                </li>
                            @endif
                        </ul>
                    </li>

                @endif

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
