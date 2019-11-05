@extends("backend.layouts.app")

@section("title")
    الاحصائيات
@endsection

@section("css")
@endsection


@section("content")
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                            <i class="icon-basket-loaded font-large-2 white"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-primary white media-body">
                            <h5>طلبات منتهية</h5>
                            <h5 class="text-bold-400"><i class="ft-plus"></i> {{$completedOrders}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 text-xs-center bg-danger bg-darken-2 media-left media-middle">
                            <i class="icon-wallet font-large-2 white"></i>
                        </div>
                        <div class="p-2 bg-gradient-x-danger white media-body">
                            <h5>طلبات جديدة</h5>
                            <h5 class="text-bold-400"><i class="ft-arrow-up"></i>{{$unCompletedOrders}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                            <i class="icon-user font-large-2 white"></i>

                        </div>
                        <div class="p-2 bg-gradient-x-warning white media-body">
                            <h5>اعضاء مفعلين</h5>
                            <h5 class="text-bold-400"><i class="ft-arrow-down"></i> {{$activatedUsers}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="p-2 text-xs-center bg-success bg-darken-2 media-left media-middle">
                            <i class="icon-user font-large-2 white"></i>

                        </div>
                        <div class="p-2 bg-gradient-x-success white media-body">
                            <h5>اعضاء جدد</h5>
                            <h5 class="text-bold-400"><i class="ft-arrow-up"></i> {{$unactivatedUsers}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header no-border-bottom">
                    <h4 class="card-title"> اخر الاحصائيات </h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                    @if(\Session::has('status'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ \Session::get('status')}}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">

                        <div class="row match-height">
                            <div class="col-xl-8 col-lg-12">
                                <div class="card" style="height: 402px;">
                                    <div class="card-header">
                                        <h4 class="card-title">مؤشر الطلبات خلال السنة</h4>
                                        <a class="heading-elements-toggle"><i
                                                class="fa fa-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="card-body collapse in">
                                        <div class="card-block">
                                            <div id="products-sales" class="height-300"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                                <div class="card" style="height: 402px;">
                                    <div class="card-header">
                                        <h4 class="card-title"> مندوبين جدد </h4>

                                        <a class="heading-elements-toggle"><i
                                                class="fa fa-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="card-body px-1">
                                        <div id="recent-buyers"
                                             class="list-group height-300 position-relative ps-container ps-theme-default ps-active-y"
                                             data-ps-id="c61689f5-b27c-e886-1001-a87cd78d169a">

                                            @foreach($delegates as $user)
                                            <a href="{{route("admin.show",$user->id)}}" class="list-group-item list-group-item-action media no-border">
                                                <div class="media-left">
                            <span class="avatar avatar-md avatar-online">
                                <img class="media-object rounded-circle"
                                                                              src="{{asset("backend/app-assets/images/portrait/small/avatar-s-7.png")}}"
                                                                              alt="Generic placeholder image">
                            <i></i>
                            </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="list-group-item-heading">{{$user->firstName}} </h6>
                                                    <p class="list-group-item-text"><span class="tag tag-primary">{{userStatus($user->status)}}</span><span
                                                            class="tag tag-warning ml-1">{{$user->locationName}}</span></p>
                                                </div>
                                            </a>
                                            @endforeach


                                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                                                <div class="ps-scrollbar-x" tabindex="0"
                                                     style="left: 0px; width: 0px;"></div>
                                            </div>
                                            <div class="ps-scrollbar-y-rail"
                                                 style="top: 0px; height: 300px; right: 275px;">
                                                <div class="ps-scrollbar-y" tabindex="0"
                                                     style="top: 0px; height: 200px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section("js")
    <script>
    $(window).on("load", function () {
    $("#recent-buyers").perfectScrollbar({wheelPropagation: !0});
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    Morris.Area({
    element: "products-sales",
    data: [
        @foreach($orderspermonth as $key =>$order)
        {month: "{{date("Y")}}-0{{$key}}", الطلبات: {{$order}}},
        @endforeach
    ],
    xkey: "month",
    ykeys: ["الطلبات"],
    labels: ["الطلبات"],
    xLabelFormat: function (x) {
    var month = months[x.getMonth()];
    return month
    },
    dateFormat: function (x) {
    var month = months[new Date(x).getMonth()];
    return month
    },
    behaveLikeLine: !0,
    ymax: 300,
    resize: !0,
    pointSize: 0,
    pointStrokeColors: ["#00B5B8", "#FA8E57", "#F25E75"],
    smooth: !0,
    gridLineColor: "#E4E7ED",
    numLines: 6,
    gridtextSize: 14,
    lineWidth: 0,
    fillOpacity: .9,
    hideHover: "auto",
    lineColors: ["#00B5B8", "#FA8E57", "#F25E75"]
    }), Morris.Bar.prototype.fillForSeries = function (i) {
    return "0-#fff-#f00:20-#000"
    }, Morris.Bar({
    element: "monthly-sales",
    data: [{month: "Jan", sales: 1835}, {month: "Feb", sales: 2356}, {month: "Mar", sales: 1459}, {
    month: "Apr",
    sales: 1289
    }, {month: "May", sales: 1647}, {month: "Jun", sales: 2156}, {month: "Jul", sales: 1835}, {
    month: "Aug",
    sales: 2356
    }, {month: "Sep", sales: 1459}, {month: "Oct", sales: 1289}, {month: "Nov", sales: 1647}, {
    month: "Dec",
    sales: 2156
    }],
    xkey: "month",
    ykeys: ["sales"],
    labels: ["Sales"],
    barGap: 4,
    barSizeRatio: .3,
    gridTextColor: "#bfbfbf",
    gridLineColor: "#E4E7ED",
    numLines: 5,
    gridtextSize: 14,
    resize: !0,
    barColors: ["#00B5B8"],
    hideHover: "auto"
    });
    var rtl = !1;
    "rtl" == $("html").data("textdirection") && (rtl = !0), rtl === !0 && $(".tweet-slider").attr("dir", "rtl"), rtl === !0 && $(".fb-post-slider").attr("dir", "rtl"), $(".tweet-slider").unslider({
    autoplay: !0,
    delay: 3500,
    arrows: !1,
    nav: !1,
    infinite: !0
    }), $(".fb-post-slider").unslider({autoplay: !0, delay: 4500, arrows: !1, nav: !1, infinite: !0})
    });
</script>
@endsection
