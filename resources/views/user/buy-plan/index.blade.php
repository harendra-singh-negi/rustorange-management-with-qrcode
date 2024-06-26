@php
    use App\Http\Helpers\UserPermissionHelper;use App\Models\Membership;use App\Models\Package;
@endphp

@extends('user.layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/admin/css/buy_plan.css')}}">
@endsection

@php
    $userId = getRootUser()->id;
    $package = UserPermissionHelper::currentPackage($userId);
@endphp

@section('content')

    @if (is_null($package))

        @php
            $pendingMemb = Membership::query()->where([
                ['user_id', '=', $userId],
                ['status',0]
            ])->whereYear('start_date', '<>', '9999')->orderBy('id', 'DESC')->first();
            $pendingPackage = isset($pendingMemb) ? Package::query()->findOrFail($pendingMemb->package_id):null;
        @endphp

        @if ($pendingPackage)
            <div class="alert alert-warning">
                You have requested a package which needs an action (Approval / Rejection) by Admin. You will be notified
                via mail once an action is taken.
            </div>
            <div class="alert alert-warning">
                <strong>Pending Package: </strong> {{$pendingPackage->title}}
                <span class="badge badge-secondary">{{$pendingPackage->term}}</span>
                <span class="badge badge-warning">Decision Pending</span>
            </div>
        @else
            <div class="alert alert-warning">
                Your membership is expired. Please purchase a new package / extend the current package.
            </div>
        @endif
    @else
        <div class="row justify-content-center align-items-center mb-1">
            <div class="col-12">
                <div class="alert border-left border-primary text-dark">
                    @if($package_count >= 2)
                        @if ($next_membership->status == 0)
                            <strong class="text-danger">You have requested a package which needs an action (Approval /
                                Rejection) by Admin. You will be notified via mail once an action is taken.</strong><br>
                        @elseif ($next_membership->status == 1)
                            <strong class="text-danger">You have another package to activate after the current package
                                expires. You cannot purchase / extend any package, until the next package is
                                activated</strong><br>
                        @endif
                    @endif

                    <strong>Current Package: </strong> {{$current_package->title}}
                    <span class="badge badge-secondary">{{$current_package->term}}</span>
                    @if ($current_membership->is_trial == 1)
                        (Expire Date: {{Carbon\Carbon::parse($current_membership->expire_date)->format('M-d-Y')}})
                        <span class="badge badge-primary">Trial</span>
                    @else
                        (Expire Date: {{$current_package->term === 'lifetime' ? "Lifetime" : Carbon\Carbon::parse($current_membership->expire_date)->format('M-d-Y')}})
                    @endif

                    @if($package_count >= 2)
                        <div>
                            <strong>Next Package To Activate: </strong> {{$next_package->title}} <span
                                class="badge badge-secondary">{{$next_package->term}}</span>
                            @if ($current_package->term != 'lifetime' && $current_membership->is_trial != 1)
                                (
                                Activation Date:
                                {{Carbon\Carbon::parse($next_membership->start_date)->format('M-d-Y')}},
                                Expire
                                Date: {{$next_package->term === 'lifetime' ?  "Lifetime" : Carbon\Carbon::parse($next_membership->expire_date)->format('M-d-Y')}}
                                )
                            @endif
                            @if ($next_membership->status == 0)
                                <span class="badge badge-warning">Decision Pending</span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div class="row mb-5 justify-content-center">
        @foreach($packages as $key => $package)
            <div class="col-md-3 pr-md-0 mb-5">
                <div
                    class="card-pricing2 @if(isset($current_package->id) && $current_package->id === $package->id) card-success @else card-primary @endif">
                    <div class="pricing-header">
                        <h3 class="fw-bold d-inline-block">
                            {{$package->title}}
                        </h3>
                        @if(isset($current_package->id) && $current_package->id === $package->id)
                            <h3 class="badge badge-danger d-inline-block float-right ml-2">Current</h3>
                        @endif
                        @if($package_count >= 2 && $next_package->id == $package->id)
                            @if ($next_membership->status == 1)
                                <h3 class="badge badge-warning d-inline-block float-right ml-2">Next</h3>
                            @endif
                        @endif
                        <span class="sub-title"></span>
                    </div>
                    <div class="price-value">
                        <div class="value">
                            <span
                                class="amount">{{$package->price== 0 ? "Free" :format_price($package->price)}}</span>
                            <span class="month">/{{$package->term}}</span>
                        </div>
                    </div>
                    <ul class="pricing-content">
                        <li>
                            {{ __('Categories') }}
                            {{ $package->categories_limit == 999999 ?  '('. __('Unlimited') .')' : ' (' . $package->categories_limit . ')' }}
                        </li>
                        <li>
                            {{ __('Subcategories') }}
                            {{ $package->subcategories_limit == 999999 ?  '('. __('Unlimited') .')' : ' (' . $package->subcategories_limit . ')' }}
                        </li>
                        <li>
                            {{ __('Items') }}
                            {{ $package->items_limit == 999999 ? '('. __('Unlimited') .')' : ' (' . $package->items_limit . ')' }}
                        </li>
                            <li>
                            {{ __('Languages') }}
                            {{ $package->language_limit == 999999 ? '('. __('Unlimited') .')' : ' (' . $package->language_limit . ')' }}
                        </li>
                        @foreach(json_decode($package->features) as $feature)
                            <li>
                                 @if ($feature == 'Storage Limit')
                                  @if($package->storage_limit == 999999)
                                   {{ __("$feature") .' ' .'('. __('Unlimited') .')'}} 
                                  @elseif ($package->storage_limit == 0 || $package->storage_limit == 999999)
                                    {{ __("$feature") }}
                                  @elseif($package->storage_limit < 1024)
                                    {{ __("$feature") . ' ( ' . $package->storage_limit . 'MB )' }}
                                  @else
                                    {{ __("$feature") . ' ( ' . ceil($package->storage_limit / 1024) . 'GB )' }}
                                  @endif
                                @elseif($feature == 'Staffs')
                                  {{ __("$feature") }}
                                  {{ $package->staff_limit == 999999 ?  '('. __('Unlimited') .')' : ' (' . $package->staff_limit . ')' }}
                                @elseif($feature == 'Table Reservation')
                                  {{ __("$feature").'s' }}
                                  {{ $package->table_reservation_limit == 999999 ?  '('. __('Unlimited') .')' : ' (' . $package->table_reservation_limit . ')' }}
                                @elseif($feature == 'Online Order')
                                  {{ __("$feature") }}
                                
                                @elseif($feature == 'Live Orders')
                                  {{ __("Realtime Order Refresh & Notification") }}
                                 
                                @else
                                  {{ __("$feature") }}
                                @endif
                            </li>
                            @if($feature == 'Online Order')
                                 <li>
                                    {{ __("Orders") }}
                                     {{ $package->order_limit == 999999 ? '('. __('Unlimited') .')': ' (' . $package->order_limit . ')' }}
                                   
                                 </li>
                            @endif  
                        @endforeach
                    </ul>

                    @php
                        $hasPendingMemb = UserPermissionHelper::hasPendingMembership(Auth::id());
                    @endphp
                    @if($package_count < 2 && !$hasPendingMemb)
                        <div class="px-4">
                            @if(isset($current_package->id) && $current_package->id === $package->id)
                                @if ($package->term != 'lifetime' || $current_membership->is_trial == 1)
                                    <a href="{{route('user.plan.extend.checkout',$package->id)}}"
                                       class="btn btn-success btn-lg w-75 fw-bold mb-3">{{__('Extend')}}</a>
                                @endif
                            @else
                                <a href="{{route('user.plan.extend.checkout',$package->id)}}"
                                   class="btn btn-primary btn-block btn-lg fw-bold mb-3">{{__('Buy Now')}}</a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
