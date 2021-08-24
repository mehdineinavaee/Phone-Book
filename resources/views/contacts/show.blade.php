@extends('layouts.app')
@section('content')
@section('title','جزئیات اطلاعات مخاطب')

@push('css')
    
@endpush

@section('content-title','مخاطبین')

@section('breadcrumb')
    <li class="breadcrumb-item">جزئیات</li>
@endsection

<table class="table">
    <tr>
        <th>
            <p>
                نام: 
            </p>
        </th>
        <td>
            <p>
                {{ $contact->name }}
            </p>
        </td>
    </tr>
    <tr>
        <th>
            <p>
                نام خانوادگی: 
            </p>
        </th>
        <td>
            <p>
                {{ $contact->family }}
            </p>
        </td>
    </tr>
    <tr>
        <th>
            <p>
                نام پدر: 
            </p>
        </th>
        <td>
            <p>
                {{ $contact->father_name }}
            </p>
        </td>
    </tr>
    <tr>
        <th>
            <p>
                شماره تلفن:  
            </p>
        </th>
        <td>
            <p>
                <ul>
                    @foreach($contact->phones as $phone)
                        <li>{{ $contact->pivot->phone }}</li>
                    @endforeach
                </ul>
            </p>
        </td>
    </tr>
</table>
@endsection