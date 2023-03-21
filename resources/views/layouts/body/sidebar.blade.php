
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="../images/logo-dark.png" alt="">
						  <h3><b>Smartphones</b></h3>
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

        <li class="treeview">
          <a href="{{ route('users.index') }}">
            <i data-feather="users"></i>
            <span>Użytkownicy</span>
          </a>

            <ul class="treeview-menu">
                <li>
                    <a href="{{ route('users.index') }}">
                        <i data-feather="plus-square"></i>
                        <span>Dodaj produkt</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}">
                        <i data-feather="shopping-bag"></i>
                        <span>Przeglądaj produkty</span>
                    </a>
                </li>
            </ul>
        </li>

      </ul>
    </section>


  </aside>
