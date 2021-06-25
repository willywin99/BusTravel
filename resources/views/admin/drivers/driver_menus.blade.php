<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Driver Menus</h2>
    </div>
    <div class="card-body">
        <nav class="nav flex-column">
            <a href="{{ url('admin/drivers/' . $driverID . '/edit') }}" class="nav-link">Driver Detail</a>
            <a href="{{ url('admin/drivers/' . $driverID . '/images') }}" class="nav-link">Driver Images</a>
        </nav>
    </div>
</div>
