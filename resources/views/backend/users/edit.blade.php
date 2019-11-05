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
                    <h4 class="card-title">  اضافة مستخدم </h4>
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
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{ \Session::get('status')}}</li>
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form" action="{{route("admin.update",$user->id)}}" method="post">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="eventInput1">الاسم الاول</label>
                                            <input type="text" id="eventInput1" class="form-control" value="{{$user->firstName}}" name="firstName">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput1">الاسم الثانى</label>
                                            <input type="text" id="eventInput1" class="form-control" value="{{$user->secondName}}" name="secondName">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput1">الاسم الاخير</label>
                                            <input type="text" id="eventInput1" class="form-control" value="{{$user->lastName}}" name="lastName">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput4">البريد الالكتروني</label>
                                            <input type="email" id="eventInput4" class="form-control" value="{{$user->email}}" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput4">رقم الجوال</label>
                                            <input type="text" id="eventInput4" class="form-control" value="{{$user->phone}}" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput4">كلمة المرور </label>
                                            <input type="password" id="eventInput4" class="form-control" placeholder=" كلمة المرور" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput4"> تاكيد كلمة المرور</label>
                                            <input type="password" id="eventInput4" class="form-control" placeholder="تاكيد كلمة المرور" name="password_confirmation">
                                        </div>

                                        <div class="form-group">
                                            <label for="eventInput2">المدينة</label>
                                            <input type="text" id="eventInput2" class="form-control" value="{{$user->city}}" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">الصلاحية</label>
                                            <select type="text" id="eventInput2" class="form-control" name="role">
                                                <option value=""></option>
                                                <option value="{{\App\User::DELEGATE}}" @if($user->role ==\App\User::DELEGATE ) selected @endif>مندوب</option>
                                                <option value="{{\App\User::CLIENT}}" @if($user->role ==\App\User::CLIENT ) selected @endif>عميل</option>
                                                <option value="{{\App\User::ADMIN}}" @if($user->role == \App\User::ADMIN) selected @endif>مدير</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput2">الحالة</label>
                                            <select type="text" id="eventInput2" class="form-control" name="status">
                                                <option value=""></option>
                                                <option value="{{\App\User::SUSPENDED}}" @if($user->status == \App\User::SUSPENDED) selected @endif>معلق</option>
                                                <option value="{{\App\User::ACTIVE}}"    @if($user->status ==\App\User::ACTIVE ) selected @endif>مفعل</option>
                                                <option value="{{\App\User::DISACTIVE}}" @if($user->status == \App\User::DISACTIVE) selected @endif>موقوف</option>
                                            </select>
                                        </div>

                                        {{--                                        <div class="form-group">--}}
                                        {{--                                            <label>Existing Customer</label>--}}
                                        {{--                                            <div class="input-group">--}}
                                        {{--                                                <label class="display-inline-block custom-control custom-radio ml-1">--}}
                                        {{--                                                    <input type="radio" name="customer1" class="custom-control-input">--}}
                                        {{--                                                    <span class="custom-control-indicator"></span>--}}
                                        {{--                                                    <span class="custom-control-description ml-0">Yes</span>--}}
                                        {{--                                                </label>--}}
                                        {{--                                                <label class="display-inline-block custom-control custom-radio">--}}
                                        {{--                                                    <input type="radio" name="customer1" checked="" class="custom-control-input">--}}
                                        {{--                                                    <span class="custom-control-indicator"></span>--}}
                                        {{--                                                    <span class="custom-control-description ml-0">No</span>--}}
                                        {{--                                                </label>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        @if($user->role == \App\User::DELEGATE)
                                        <div class="form-group">
                                            <label for="eventInput1">الرصيد</label>
                                            <input type="text" id="eventInput1" class="form-control" value="{{$user->balance}}" name="balance">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventInput1">اقصى عدد للطلبات</label>
                                            <input type="text" id="eventInput1" class="form-control" value="{{$user->max_order_number}}" name="max_order_number">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> حفظ
                                </button>
                                <a href="{{route("admin.create")}}" type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> الغاء
                                </a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section("js")
@endsection
