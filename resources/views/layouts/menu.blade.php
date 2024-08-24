





<li class="nav-item">
    <a href="{{ route('stockIns.index') }}"
       class="nav-link {{ Request::is('stockIns*') ? 'active' : '' }}">
        <p>Stock In</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('stockOuts.index') }}"
       class="nav-link {{ Request::is('stockOuts*') ? 'active' : '' }}">
        <p>Stock Out</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('borrows.index') }}"
       class="nav-link {{ Request::is('borrows*') ? 'active' : '' }}">
        <p>Borrow</p>
    </a>
</li>


@if($role == 'Admin')
<li class="nav-header">MASTER DATA</li>
<li class="nav-item">
    <a href="{{ route('suppliers.index') }}"
       class="nav-link {{ Request::is('suppliers*') ? 'active' : '' }}">
        <p>Supplier</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('items.index') }}"
       class="nav-link {{ Request::is('items*') ? 'active' : '' }}">
        <p>Item</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('userDetails.index') }}"
       class="nav-link {{ Request::is('userDetails*') ? 'active' : '' }}">
        <p>User</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('roles.index') }}"
       class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <p>Roles</p>
    </a>
</li>

<li class="nav-item d-none">
    <a href="{{ url('report') }}"
       class="nav-link {{ Request::is('report*') ? 'active' : '' }}">
        <p>Report</p>
    </a>
</li>
@endif


