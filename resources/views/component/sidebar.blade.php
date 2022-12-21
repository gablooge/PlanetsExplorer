<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        Planets Explorer
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('planet_list') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('') }}vendors/@coreui/icons/svg/free.svg#cil-globe-alt"></use>
                </svg> 
                Planets 
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logbook_list') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('') }}vendors/@coreui/icons/svg/free.svg#cil-history"></use>
                </svg> 
                Logbooks 
            </a>
        </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>