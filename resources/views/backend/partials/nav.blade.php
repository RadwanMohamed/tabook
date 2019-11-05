<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
    <li class=" navigation-header"><span>لوحة التحكم </span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
    </li>

    <li class=" nav-item"><a href="index-2.html"><i class="ft-home"></i><span data-i18n="" class="menu-title">الرئيسية</span><span class="tag tag tag-primary tag-pill float-xs-right mr-2">3</span></a>
        <ul class="menu-content">
            <li><a href="{{url('dash')}}" class="menu-item">عرض الاحصائيات</a>
            </li>

        </ul>
    </li>
    <li class=" nav-item"><a href="index-2.html"><i class="ft-users"></i><span data-i18n="" class="menu-title"> المستخدمين </span></a>
        <ul class="menu-content">
            <li><a href="{{route("admin.index")}}" class="menu-item">عرض</a>
            </li>
            <li class="active"><a href="{{route("admin.create")}}" class="menu-item">اضافة</a>
            </li>

        </ul>
    </li>
    <li class=" nav-item"><a href="index-2.html"><i class="ft-shopping-cart"></i><span data-i18n="" class="menu-title"> الطلبات </span></a>
        <ul class="menu-content">
            <li><a href="{{url("orders")}}" class="menu-item">عرض</a>
            </li>
        </ul>
    </li>
    <li class=" nav-item"><a href="index-2.html"><i class="ft-zap"></i><span data-i18n="" class="menu-title"> الشحن </span></a>
        <ul class="menu-content">
            <li><a href="{{url("charge")}}" class="menu-item">عرض</a>
            </li>
        </ul>
    </li>

    <li class=" nav-item"><a href="index-2.html"><i class="ft-settings"></i><span data-i18n="" class="menu-title"> اعدادات التطبيق </span></a>
        <ul class="menu-content">
            <li><a href="{{route("application.index")}}" class="menu-item">عرض وتعديل</a>
            </li>
            <li class="active"><a href="{{route("application.create")}}" class="menu-item">اضافة</a>
            </li>

        </ul>
    </li>





</ul>
