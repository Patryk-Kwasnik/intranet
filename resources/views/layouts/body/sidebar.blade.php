
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="../images/logo-dark.png" alt="">
						  <h3><b>Intranet</b></h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li >
          <a href="{{ url('admin/dashboard')}}">
            <i data-feather="home"></i>
			<span>Strona główna</span>
          </a>
        </li>

        <li class="header nav-small-cap">System</li>
          {{--Nowości--}}
          <li class="treeview">
              <a href="{{ route('newsCategory.index') }}">
                  <i data-feather="news"></i>
                  <span>{{ __('system.nav_news') }}</span>
              </a>
              <ul class="treeview-menu">
                  <li>
                      <a href="{{ route('newsCategory.index') }}">
                          <i class="fa fa-cogs" ></i>
                          <span>{{ __('system.nav_news_categories') }}</span>
                      </a>
                  </li>
{{--                  <li>--}}
{{--                      <a href="{{ route('news.index') }}">--}}
{{--                          <i class="fa fa-cogs"></i>--}}
{{--                          <span>{{ __('system.news') }}</span>--}}
{{--                      </a>--}}
{{--                  </li>--}}
              </ul>
          </li>
        {{--Użytkownicy--}}
        <li class="treeview">
          <a href="{{ route('users.index') }}">
            <i data-feather="users"></i>
            <span>{{ __('users.all_users') }}</span>
          </a>
            <ul class="treeview-menu">
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-cogs" ></i>
                        <span>{{ __('system.nav_users_settings') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}">
                        <i class="fa fa-cogs"></i>
                        <span>{{ __('system.nav_roles_settings') }}</span>
                    </a>
                </li>
            </ul>
        </li>

      </ul>
    </section>


  </aside>
