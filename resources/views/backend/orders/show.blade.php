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
                                <tr>
                                    @foreach($users as $key=>$user)
                                        <th>{{$key}}</th>
                                    <th scope="row">{{$user->firstName}}</th>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->locationName}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>
                                        <div class="form-actions right">

                                            <a href="{{route("admin.update",$user->id)}}"  class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i> Save
                                            </a>

                                            <form action="{{route("admin.delete")}}" method="post">
                                                @csrf
                                                @method("put")
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> delete
                                                </button>

                                            </form>

                                        </div>
                                    </td>
                                    @endforeach
                                </tr>
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
