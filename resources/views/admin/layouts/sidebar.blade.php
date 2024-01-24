<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('theme/admin/assets/img/icons/brands/icon-admin.jpg')}}" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Admin</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.product.index')}}" class="menu-link">
                        <div data-i18n="CRM">Sản phẩm</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.category.index')}}"  class="menu-link">
                        <div data-i18n="eCommerce">Danh mục</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.trademark.index')}}"  class="menu-link">
                        <div data-i18n="Logistics">Nhãn hiệu</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.color.index')}}"  class="menu-link">
                        <div data-i18n="Academy">Color</div>
                    </a>
                </li>
                @if(Auth::guard('admin')->user()->id == 1)
                <li class="menu-item">
                    <a href="{{ route('admin.admin.index')}}"  class="menu-link">
                        <div data-i18n="Academy">Admin</div>
                    </a>
                </li>
                @endif
            </ul>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Layouts</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Without menu">Without menu</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Without navbar">Without navbar</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Container">Container</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Fluid">Fluid</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Blank">Blank</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Front Pages -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Front Pages">Front Pages</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href=""
                        class="menu-link" >
                        <div data-i18n="Landing">Landing</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href=""
                        class="menu-link" >
                        <div data-i18n="Pricing">Pricing</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href=""
                        class="menu-link" >
                        <div data-i18n="Payment">Payment</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href=""
                        class="menu-link" >
                        <div data-i18n="Checkout">Checkout</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href=""
                        class="menu-link" >
                        <div data-i18n="Help Center">Help Center</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
