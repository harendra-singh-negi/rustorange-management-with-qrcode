@php
    use App\Models\User\Language;
    use Illuminate\Support\Facades\Auth;
@endphp
@extends('user.layout')

@php
    $setLang = Language::query()
        ->where([['code', request()->input('language')], ['user_id', Auth::guard('web')->user()->id]])
        ->first();
@endphp
@if (!empty($setLang) && $setLang->rtl == 1)
    @section('styles')
        <style>
            form:not(.modal-form) input,
            form:not(.modal-form) textarea,
            form:not(.modal-form) select,
            select[name='language'] {
                direction: rtl;
            }

            form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
                direction: rtl;
                text-align: right;
            }
        </style>
    @endsection
@endif

@section('content')
    <div class="page-header">
        <h4 class="page-title">Jobs</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('user.dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Career Page</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Jobs</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-title d-inline-block">Jobs</div>
                        </div>
                        <div class="col-lg-3">
                            @if (!empty($userLangs))
                                <select name="language" class="form-control"
                                    onchange="window.location='{{ url()->current() . '?language=' }}'+this.value">
                                    <option value="" selected disabled>Select a Language</option>
                                    @foreach ($userLangs as $lang)
                                        <option value="{{ $lang->code }}"
                                            {{ $lang->code == request()->input('language') ? 'selected' : '' }}>
                                            {{ $lang->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                            <a href="{{ route('user.job.create') . '?language=' . request()->input('language') }}"
                                class="btn btn-primary float-lg-right float-left btn-sm"><i class="fas fa-plus"></i> Post
                                Job</a>
                            <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete"
                                data-href="{{ route('user.job.bulk.delete') }}"><i class="flaticon-interface-5"></i>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($jobs) == 0)
                                <h3 class="text-center">NO JOB FOUND</h3>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3" id="basic-datatables">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <input type="checkbox" class="bulk-check" data-val="all">
                                                </th>
                                                <th scope="col" width="40%">Title</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Vacancy</th>
                                                <th scope="col">Serial Number</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jobs as $key => $job)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="bulk-check"
                                                            data-val="{{ $job->id }}">
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('user.front.career.details', [$tusername, $job->slug, $job->id]) }}"
                                                            target="_blank">
                                                            {{ strlen(convertUtf8($job->title)) > 120 ? convertUtf8(substr($job->title, 0, 120)) . '...' : convertUtf8($job->title) }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @if (!empty($job->jcategory))
                                                            {{ convertUtf8($job->jcategory->name) }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $job->vacancy }}</td>
                                                    <td>{{ $job->serial_number }}</td>
                                                    <td>
                                                        <a class="btn my-2 btn-secondary btn-sm"
                                                            href="{{ route('user.job.edit', $job->id) . '?language=' . request()->input('language') }}">
                                                            <span class="btn-label">
                                                                <i class="fas fa-edit"></i>
                                                            </span>
                                                            
                                                        </a>
                                                        <form class="deleteform d-inline-block"
                                                            action="{{ route('user.job.delete') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="job_id"
                                                                value="{{ $job->id }}">
                                                            <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                                                <span class="btn-label">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
