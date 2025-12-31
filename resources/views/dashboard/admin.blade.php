@extends('layouts.app')
@section('title')
    <title>رُقي | لوحة التحكم – المدير</title>
@endsection

@section('main_content')
    <!-- Main -->
    <main class="main">
        <div class="header">
            <h1>لوحة التحكم – المدير</h1>
        </div>

        <div class="stats">
            <div class="card"><h3>إجمالي الطلاب</h3><div class="value">{{$studentsCount}}</div></div>
            <div class="card"><h3>إجمالي المعلمين</h3><div class="value">{{$teachersCount}}</div></div>
            <div class="card"><h3>أولياء الأمور المسجّلون</h3><div class="value">{{$parentsCount}}</div></div>
            <div class="card"><h3>الفصول النشطة</h3><div class="value">34</div></div>
        </div>

    </main>
</div>
@endsection
