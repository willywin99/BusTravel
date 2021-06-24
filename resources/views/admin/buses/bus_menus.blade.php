<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Bus Menus</h2>
    </div>
    <div class="card-body">
        <nav class="nav flex-column">
            <a href="{{ url('admin/buses/' . $busID . '/edit') }}" class="nav-link">Bus Detail</a>
            <a href="{{ url('admin/buses/' . $busID . '/images') }}" class="nav-link">Bus Images</a>
        </nav>
    </div>
</div>
