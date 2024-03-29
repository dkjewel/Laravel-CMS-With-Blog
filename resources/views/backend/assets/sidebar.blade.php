<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img style="margin-left: 20px">
        <span class="brand-text font-weight-light">Laravel CMS & BLOG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel-->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/')}}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Manage Users
                            </p>
                        </a>
                    </li>
                @endif


                <li class="nav-item mt-3">
                    <a href="{{route('category.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-list-ul"></i>
                        <p>
                            Category

                        </p>
                    </a>
                </li>


                <li class="nav-item mt-3">
                    <a href="{{route('tag.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-tag"></i>
                        <p>
                            Tag
                        </p>
                    </a>
                </li>


                <li class="nav-item mt-3">
                    <a href="{{route('post.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Post
                        </p>
                    </a>
                </li>


                <li class="nav-item mt-3">
                    <a href="{{route('post.trash')}}" class="nav-link">
                        <i class="nav-icon fa fa-trash"></i>
                        <p>
                            Trashed Post
                        </p>
                    </a>
                </li>


                <li class="nav-item mt-3">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-user-circle"></i>
                        <p>
                            Update Profile
                        </p>
                    </a>
                </li>


                {{--LogOut--}}

                <li class="nav-item mt-3">

                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                        <i class="nav-icon fa fa-power-off "></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


            </ul>
        </nav>

    </div>

</aside>
