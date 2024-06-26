@php
    use App\Models\User\Language;
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('user.layout')

@php
    $setLang = Language::query()
        ->where([
            ['code', request()->input('language')],
            ['user_id', Auth::guard('web')->user()->id]
        ])->first();
@endphp

@section('styles')
    @if(!empty($setLang) && $setLang->rtl == 1)
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
    @endif
@endsection

@section('content')

  <div class="page-header">
    <h4 class="page-title">Bottom Links</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('user.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Website Pages</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Footer</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Bottom Links</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-title d-inline-block">Bottom Links</div>
                </div>
                <div class="col-lg-3">
                    @if (!empty($userLangs))
                        <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                            <option value="" selected disabled>Select a Language</option>
                            @foreach ($userLangs as $lang)
                                <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                    <a href="#" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#createModalB"><i class="fas fa-plus"></i> Add Bottom Link</a>
                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($bottoms) == 0)
                <h3 class="text-center">NO BOTTOM LINK FOUND</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">URL</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($bottoms as $key => $aulink)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{convertUtf8($aulink->name)}}</td>
                          <td>{{$aulink->url}}</td>
                          <td>
                            <a class="btn btn-secondary btn-sm my-2 editbtn" href="#editModalb" data-toggle="modal" data-ulink_id="{{$aulink->id}}" data-name="{{$aulink->name}}" data-url="{{$aulink->url}}">
                              <span class="btn-label">
                                <i class="fas fa-edit"></i>
                              </span>
                              
                            </a>
                            <form class="deleteform d-inline-block" action="{{route('user.blink.delete')}}" method="post">
                              @csrf
                              <input type="hidden" name="bottom_id" value="{{$aulink->id}}">
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


  <div class="modal fade" id="createModalB" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Bottom Link</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="ajaxForm" class="modal-form create" action="{{route('user.blink.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Language **</label>
                <select name="user_language_id" class="form-control">
                    <option value="" selected disabled>Select a language</option>
                    @foreach ($userLangs as $lang)
                        <option value="{{$lang->id}}">{{$lang->name}}</option>
                    @endforeach
                </select>
                <p id="erruser_language_id" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
              <label for="">Name **</label>
              <input type="text" class="form-control" name="name" value="" placeholder="Enter name">
              <p id="errname" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
              <label for="">URL **</label>
              <input class="form-control ltr" name="url" placeholder="Enter url">
              <p id="errurl" class="mb-0 text-danger em"></p>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="editModalb" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Bottom Link</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="ajaxEditForm" action="{{route('user.blink.update')}}" method="POST">
            @csrf
            <input id="inulink_id" type="hidden" name="link_id" value="">
            <div class="form-group">
              <label for="">Name **</label>
              <input id="inname" type="text" class="form-control" name="name" value="" placeholder="Enter name">
              <p id="eerrname" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
              <label for="">URL **</label>
              <input id="inurl" class="form-control ltr" name="url" placeholder="Enter url">
              <p id="eerrurl" class="mb-0 text-danger em"></p>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="updateBtn" type="button" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

