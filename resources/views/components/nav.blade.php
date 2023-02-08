<ul class="menu-inner py-1">
    @if (Auth::user()->isAdmin == 1)
    <!-- Dashboard -->
    <li class="menu-item ">
        <a href="/home" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <!-- Member -->
    <li class="menu-item ">
        <a href="/user" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="User">User</div>
        </a>
    </li>
    
    <!-- book -->
    <li class="menu-item ">
        <a href="/book" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book"></i>
            <div data-i18n="book">Buku</div>
        </a>
    </li>

    <!-- transaction -->
    <li class="menu-item ">
        <a href="/transaction" class="menu-link">
            <i class="menu-icon tf-icons bx bx-transfer"></i>
            <div data-i18n="transaction">Transaksi</div>
        </a>
    </li>
    
    <!-- income -->
    <li class="menu-item ">
        <a href="/income" class="menu-link">
            <i class="menu-icon tf-icons bx bx-money"></i>
            <div data-i18n="income">Denda</div>
        </a>
    </li>

    <!-- Laporan -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Laporan">Laporan</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="/report/users" class="menu-link">
                    <div data-i18n="users">User</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/report/books" class="menu-link">
                    <div data-i18n="books">Buku</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/report/transactions" class="menu-link">
                    <div data-i18n="transactions">Transaksi</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="/report/incomes" class="menu-link">
                    <div data-i18n="incomes">Denda</div>
                </a>
            </li>
            
        </ul>
    </li>
    <!-- letter -->
    <li class="menu-item ">
        <a href="/letter" class="menu-link">
            <i class="menu-icon tf-icons bx bx-envelope"></i>
            <div data-i18n="letter">Surat Keterangan</div>
        </a>
    </li>
    @elseif (Auth::user()->isAdmin == 0)
    <li class="menu-item ">
        <a href="/dashboard" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    
    <!-- myprofile -->
    <li class="menu-item ">
        <a href="/profile/{id}/show" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="myprofile">My Profile</div>
        </a>
    </li>
    
    <!-- history -->
    <li class="menu-item ">
        <a href="/history" class="menu-link">
            <i class="menu-icon tf-icons bx bx-transfer"></i>
            <div data-i18n="myprofile">Transaksi</div>
        </a>
    </li>
    @endif
</ul>
