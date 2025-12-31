@extends('layouts.app')
@section('title')
    <title>رُقي | إضافة وليّ أمر</title>
@endsection


  <!-- Main -->

@section('main_content')
    <main class="main">
        <div class="hero">
            <div>
                <h1 class="section-title"><span style="font-size:24px">👨‍👩‍👧</span> إضافة وليّ أمر</h1>
                <div>أدخل بيانات وليّ الأمر واحفظ المعلومات.</div>
            </div>
        </div>

        <form action="{{ route('admin.parents.store') }}" method="POST" class="card">
            @csrf

            <div class="form-grid">

                {{-- رقم المستخدم --}}
                <div class="input">
                    <label for="user_number">رقم المستخدم (تلقائي)</label>
                    <input type="text" id="user_number" name="user_number"
                           value="{{ $nextNumber }}" readonly style="background:#f3f4f6;cursor:not-allowed;">
                </div>

                {{-- الاسم --}}
                <div class="input">
                    <label for="name">الاسم الكامل</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name') <small style="color:red">{{ $message }}</small> @enderror
                </div>

                {{-- البريد الإلكتروني --}}
                <div class="input">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <small style="color:red">{{ $message }}</small> @enderror
                </div>

                {{-- الهاتف --}}
                <div class="input">
                    <label for="phone">رقم الهاتف</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                    @error('phone') <small style="color:red">{{ $message }}</small> @enderror
                </div>

                {{-- العلاقة --}}
                <div class="input">
                    <label for="relation">العلاقة بالطالب</label>
                    <select id="relation" name="relation" required>
                        <option value="">-- اختر العلاقة --</option>
                        <option value="أب" {{ old('relation')=='أب' ? 'selected' : '' }}>أب</option>
                        <option value="أم" {{ old('relation')=='أم' ? 'selected' : '' }}>أم</option>
                        <option value="أخ" {{ old('relation')=='أخ' ? 'selected' : '' }}>أخ</option>
                        <option value="أخت" {{ old('relation')=='أخت' ? 'selected' : '' }}>أخت</option>
                        <option value="وصي" {{ old('relation')=='وصي' ? 'selected' : '' }}>وصي</option>
                    </select>
                    @error('relation') <small style="color:red">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="actions">
                <button type="submit" class="btn">حفظ ولي الأمر</button>
            </div>
        </form>    </main>
@endsection
