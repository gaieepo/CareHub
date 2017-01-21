<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

<ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ (Request::is('/') ? 'active' : '') }}"><a href="{{ url('/') }}"><span>Dashboard</span></a></li>
            <li><a href="#"><span>Task</span></a></li>
            <li class="{{ (Request::is('patient') ? 'active' : '') }}"><a href="{{ url('patient') }}"><span>Patients</span></a></li>
            <li class="treeview">
                <a href="#"><span>Forms</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/patient_summary')}}">Patient Summary</a></li>
                    <li><a href="{{ url('/patient_profile')}}">Patient Profile</a></li>
                    <li><a href="{{ url('/call_log')}}">Call Log</a></li>
                    <li class="treeview">
                        <a href="#"><span>Protocol List</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('/protocol_1')}}">Chest Pain</a></li>
                            <li><a href="{{ url('/protocol_2')}}">Congestive Heart Failure</a></li>
                            <li><a href="{{ url('/protocol_3')}}">Diuretic Titration</a></li>
                            <li><a href="{{ url('/protocol_4')}}">Breathing Problem</a></li>
                            <li><a href="{{ url('/protocol_5')}}">Dizziness</a></li>
                            <li><a href="{{ url('/protocol_6')}}">Escalation</a></li>
                            <li><a href="{{ url('/protocol_7')}}">Heart Rate problem</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Adherence</a></li>
                </ul>
            </li>
            <li class="{{ (Request::is('calendar') ? 'active' : '') }}"><a href="{{ url('calendar') }}"><span>Calendar</span></a></li>
            <li class="{{ (Request::is('messages') ? 'active' : '') }}"><a href="{{ url('messages') }}"><span>Message</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>