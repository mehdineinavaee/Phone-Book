@extends('layouts.app')
@section('content')
@section('title','مخاطب جدید')

@push('css')
    
@endpush

@section('content-title','مخاطبین')

@section('breadcrumb')
    <li class="breadcrumb-item">مخاطب جدید</li>
@endsection

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">مخاطب جدید</h3>
    </div>
    <form action="{{route('contacts.store')}}" method="post">
    @csrf
        <div class="card-body" style="padding:1rem;">
            <div class="form-group RightToLeft">
                <label for="name">نام</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="card-body" style="padding:1rem;">
            <div class="form-group RightToLeft">
                <label for="family">نام خانوادگی</label><br>
                <input type="text" class="form-control @error('family') is-invalid @enderror" name="family" id="family" value="{{ old('family') }}">
                @error('family')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="card-body" style="padding:1rem;">
            <div class="form-group RightToLeft">
                <label for="father_name">نام پدر</label><br>
                <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" id="father_name" value="{{ old('father_name') }}">
                @error('father_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" onclick="save()" class="btn btn-primary">ثبت اطلاعات</button>
        </div>
    </form>
</div>
@endsection