<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('contacts')}}">
                        <i class="fe-search"></i>
                        <span class="badge badge-danger badge-pill float-right"></span>
                        <span> Contacts search </span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('contacts/filter?district_id=14') }}">
                        <i class="fe-filter"></i>
                        <span class="badge badge-danger badge-pill float-right"></span>
                        <span> Contacts Filter </span>
                    </a>
                </li>


                <li>
                    <a href="">
                        <i class="fe-mail"></i>
                        <span class="badge badge-danger badge-pill float-right"></span>
                        <span> Messages </span>
                    </a>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);">
                        <i class="fe-briefcase"></i>
                        <span> UI Kit </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="ui-typography.html">Typography</a></li>

                    </ul>
                </li> --}}

               
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->