@extends("backend.layouts.app")

@section("title")
الاعضاء
@endsection

@section("css")
@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header no-border-bottom">
                        <h4 class="card-title"> المستخدم </h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <ul>
                            <li> الاسم الاول : {{$user->firstName}}</li>
                            <li>الاسم الثانى : {{$user->secondName}}</li>
                            <li>الاسم الاخير : {{$user->lastName}}</li>
                            <li>البريد الالكتروني : {{$user->email}}</li>
                            <li>رقم الجوال : {{$user->phone}}
                            </li>
                            <li>المدينة : {{$user->city}}</li>
                            <li>الشارع : {{$user->street}}</li>
                            <li>رقم المنزل : {{$user->house}}</li>
                            <li>الصلاحية{{$user->role}}</li>
                            <li>الحالة{{$user->status}}</li>

                            @if($user->role == \App\User::DELEGATE)
                            <li> العدد الاقصى للطلبات : {{$user->max_order_number}}</li>
                            <li>التقييم : {{$user->rate}}</li>
                            <li> الرصيد : {{$user->balance}}</li>
                            <li>المكان : {{$user->locationName}}</li>
                            <li>الجنسية : {{$user->nationality}}</li>
                            <li>اللغة : {{$user->language}}</li>
                            @endif
                        </ul>
                    </div>

                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>اسم العميل </th>
                                    <th>اسم المندوب</th>
                                    <th>الخدمة</th>
                                    <th>الكمية</th>
                                    <th>الحالة</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(userOrders($user) as $key=>$order)
                                    <tr>
                                        <th>{{$key+1}}</th>
                                        <th scope="row">{{$order->client->firstName}}</th>
                                        <td>{{$order->client->firstName}}</td>
                                        <td>{{$order->service->name}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{orderStatus($order->status)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section("js")
@endsection
