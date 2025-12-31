@extends('layouts.app')
@section('title')
    <title>رُقي | عرض أولياء الأمور</title>
    @endsection
@section('main_content')
    <main class="main">
        <div class="header"><h1>عرض أولياء الأمور</h1><a class="btn" href="{{route('admin.parents.create')}}">+ وليّ أمر جديد</a></div>
        <div class="card">
            @if (session('success'))
                <div style="background:#d1fae5;color:#065f46;padding:10px 14px;border-radius:10px;margin-bottom:15px;">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>هاتف</th>
                    <th>عدد الأبناء</th>
                    <th>إجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($parents as $parent)
                    <tr>
                        <td>{{$parent->user_number}}</td>
                        <td>{{$parent->name}}</td>
                        <td>{{$parent->phone}}</td>
                        <td>{{$parent->students_count}}</td>
                        <td><a class="link" href="#">تفاصيل</a> • <a class="link" href="#">تعديل</a> • <a class="link" href="#">حذف</a></td>

                    </tr>
                @endforeach
                {{--                <tr>--}}
                {{--                    <td>1</td>--}}
                {{--                    <td>خالد أ.</td>--}}
                {{--                    <td>0599-555666</td>--}}
                {{--                    <td>2</td>--}}
                {{--                    <td><a class="link" href="#">تفاصيل</a> • <a class="link" href="#">تعديل</a> • <a class="link"--}}
                {{--                                                                                                      href="#">حذف</a>--}}
                {{--                    </td>--}}
                {{--                </tr>--}}
                {{--                <tr>--}}
                {{--                    <td>2</td>--}}
                {{--                    <td>منى ر.</td>--}}
                {{--                    <td>0599-777888</td>--}}
                {{--                    <td>1</td>--}}
                {{--                    <td><a class="link" href="#">تفاصيل</a> • <a class="link" href="#">تعديل</a> • <a class="link"--}}
                {{--                                                                                                      href="#">حذف</a>--}}
                {{--                    </td>--}}
                {{--                </tr>--}}
                </tbody>
            </table>
        </div>
    </main>
@endsection
</div>
</body>
</html>
