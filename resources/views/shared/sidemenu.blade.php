<script type="text/javascript">
    try {
        ace.settings.loadState('main-container')
    } catch (e) {}
</script>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="">
            <a href="index.html">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        @if( Auth::user()->role->access == 0 )
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text">
                    Users

                </span>
                <!-- <b class="arrow fa fa-angle-down"></b> -->
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="" class="">
                        Create User
                    </a>
                </li>
                <li class="">
                    <a href="" class="">
                        Users List
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if( Auth::user()->role->access == 0 )
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">
                    Role
                </span>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="" class="">
                        Create Role
                    </a>
                </li>
                <li class="">
                    <a href="" class="">
                        Roles List
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if( Auth::user()->role->access == 0 )
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cubes"></i>
                <span class="menu-text">
                    Category
                </span>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="" class="">
                        Create Category
                    </a>
                </li>
                <li class="">
                    <a href="" class="">
                        Category List
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-file-o"></i>
                <span class="menu-text">
                    Posts
                </span>
            </a>
            <ul class="submenu">
                @if( Auth::user()->role->access == 1 )
                <li class="">
                    <a href="" class="">
                        Create Post
                    </a>
                </li>
                @endif
                @if( Auth::user()->role->access == 0 )
                <li class="">
                    <a href="" class="">
                        Posts List
                    </a>
                </li>
                @endif
                @if( Auth::user()->role->access == 1 )
                <li class="">
                    <a href="" class="">
                        My Posts
                    </a>
                </li>
                @endif
            </ul>
        </li>

        @if( Auth::user()->role->access == 0 )
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-tags"></i>
                <span class="menu-text">
                    Tags
                </span>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="" class="">
                        Create Tag
                    </a>
                </li>
                <li class="">
                    <a href="" class="">
                        Tags List
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if( Auth::user()->role->access == 0 || Auth::user()->role->access == 1 )
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-bar-chart"></i>
                <span class="menu-text">
                    Reports
                </span>
            </a>
            <ul class="submenu">
                <li class="">
                    <a href="" class="">
                        Likes
                    </a>
                </li>
                <li class="">
                    <a href="" class="">
                        Comments
                    </a>
                </li>
                <li class="">
                    <a href="" class="">
                        Ratings
                    </a>
                </li>
                <li class="">
                    <a href="" class="">
                        Views
                    </a>
                </li>
                <li class="">
                    <a href="" class="">
                        Posts
                    </a>
                </li>
            </ul>
        </li>
        @endif


        {{-- <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text">
                    Users
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>

                        Three Level Menu
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <a href="#">
                                <i class="menu-icon fa fa-leaf green"></i>
                                Item #1
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>  --}}


    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>