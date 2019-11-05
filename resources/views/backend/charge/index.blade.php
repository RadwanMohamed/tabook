@extends("backend.layouts.app")

@section("title")
الرصيد
@endsection

@section("css")
@endsection


@section("content")
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header no-border-bottom">
                        <h4 class="card-title"> جدول الشحن </h4>
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
                                    <th>اسم المندوب </th>
                                    <th>الصورة</th>
                                    <th>رقم البطاقة</th>
                                    <th>الحالة</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($charges as $key=>$charge)
                                    <tr>
                                    <th>{{$key+1}}</th>
                                        <th scope="row"><a href="{{route("admin.edit",$charge->user_id)}}">{{$users[$charge->user_id]}}</a></th>
                                    <td>
                                        <img src="{{$charge->image}}" class="" width="150px" height="150px">
                                    </td>
                                    <td>{{$charge->ID_number}}</td>
                                    <td>{{$charge->status}}</td>
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
