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
                        <h4 class="card-title"> جدول الاعضاء </h4>
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>الاسم الاول</th>
                                    <th>رقم الجوال</th>
                                    <th>العنوان</th>
                                    <th>الصلاحية</th>
                                    <th>الحالة</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key=>$user)
                                    <tr>
                                        <th>{{$key+1}}</th>
                                    <th scope="row"><a href="{{route("admin.show",$user->id)}}">{{$user->firstName}}</a></th>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->locationName}}</td>
                                    <td>{{userRole($user->role)}}</td>
                                    <td>{{userStatus($user->status)}}</td>
                                    <td>
                                        <div class="form-actions right">

                                            <a href="{{route("admin.edit",$user->id)}}"  class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i> تعديل
                                            </a>

                                            <form action="{{route("admin.destroy",$user->id)}}" method="post">
                                                @csrf
                                                @method("delete")
                                                <button  class="btn btn-warning mr-1" >
                                                    <i class="ft-x"></i> حذف
                                                </button>

                                            </form>

                                        </div>
                                    </td>
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
