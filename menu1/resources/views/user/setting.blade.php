@extends('user/layout')
@section('page_title','User - Dashboard')
@section('dashboard_select','mm-active')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body px-3">
                    <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                        <a href="javascript:void(0);" class="nav-link active setting-bx d-flex" id="pills-account-tab"
                            data-bs-toggle="tab" data-bs-target="#pills-account" role="tab"
                            aria-controls="pills-account" aria-selected="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 6C13.2426 6 14.25 4.99264 14.25 3.75C14.25 2.50736 13.2426 1.5 12 1.5C10.7574 1.5 9.75 2.50736 9.75 3.75C9.75 4.99264 10.7574 6 12 6Z"
                                    fill="#3D4152" />
                                <path
                                    d="M13.5 6.75H10.5C9.50544 6.75 8.55161 7.14509 7.84835 7.84835C7.14509 8.55161 6.75 9.50544 6.75 10.5V14.25C6.75 14.4489 6.82902 14.6397 6.96967 14.7803C7.11032 14.921 7.30109 15 7.5 15C7.69891 15 7.88968 14.921 8.03033 14.7803C8.17098 14.6397 8.25 14.4489 8.25 14.25V10.5C8.2513 10.0358 8.39616 9.58335 8.6647 9.2047C8.93325 8.82605 9.31234 8.53974 9.75 8.385V21.75C9.75 21.9489 9.82902 22.1397 9.96967 22.2803C10.1103 22.421 10.3011 22.5 10.5 22.5C10.6989 22.5 10.8897 22.421 11.0303 22.2803C11.171 22.1397 11.25 21.9489 11.25 21.75V15.615C11.7331 15.799 12.2669 15.799 12.75 15.615V21.75C12.75 21.9489 12.829 22.1397 12.9697 22.2803C13.1103 22.421 13.3011 22.5 13.5 22.5C13.6989 22.5 13.8897 22.421 14.0303 22.2803C14.171 22.1397 14.25 21.9489 14.25 21.75V8.385C14.6877 8.53974 15.0668 8.82605 15.3353 9.2047C15.6038 9.58335 15.7487 10.0358 15.75 10.5V14.25C15.75 14.4489 15.829 14.6397 15.9697 14.7803C16.1103 14.921 16.3011 15 16.5 15C16.6989 15 16.8897 14.921 17.0303 14.7803C17.171 14.6397 17.25 14.4489 17.25 14.25V10.5C17.25 10.0075 17.153 9.51991 16.9645 9.06494C16.7761 8.60997 16.4999 8.19657 16.1517 7.84835C15.8034 7.50013 15.39 7.22391 14.9351 7.03545C14.4801 6.847 13.9925 6.75 13.5 6.75Z"
                                    fill="#3D4152" />
                            </svg>
                            <div class="setting-info">
                                <h6>Account</h6>
                                <p class="mb-0">You can change username,password and etc...</p>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="nav-link setting-bx d-flex" id="pills-notification-tab"
                            data-bs-toggle="tab" data-bs-target="#pills-notification" role="tab"
                            aria-controls="pills-notification" aria-selected="false">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18 12C20.4853 12 22.5 9.98528 22.5 7.5C22.5 5.01472 20.4853 3 18 3C15.5147 3 13.5 5.01472 13.5 7.5C13.5 9.98528 15.5147 12 18 12Z"
                                    fill="#3D4152" />
                                <path
                                    d="M21.75 21H2.25C2.05109 21 1.86032 20.921 1.71967 20.7803C1.57902 20.6397 1.5 20.4489 1.5 20.25V7.5C1.5 7.30109 1.57902 7.11032 1.71967 6.96967C1.86032 6.82902 2.05109 6.75 2.25 6.75H11.25C11.4489 6.75 11.6397 6.82902 11.7803 6.96967C11.921 7.11032 12 7.30109 12 7.5C12 7.69891 11.921 7.88968 11.7803 8.03033C11.6397 8.17098 11.4489 8.25 11.25 8.25H3V19.5H21V12.75C21 12.5511 21.079 12.3603 21.2197 12.2197C21.3603 12.079 21.5511 12 21.75 12C21.9489 12 22.1397 12.079 22.2803 12.2197C22.421 12.3603 22.5 12.5511 22.5 12.75V20.25C22.5 20.4489 22.421 20.6397 22.2803 20.7803C22.1397 20.921 21.9489 21 21.75 21Z"
                                    fill="#3D4152" />
                            </svg>
                            <div class="setting-info">
                                <h6>Setting</h6>
                                 <p class="mb-0">You can change username,password and etc...</p>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-account" role="tabpanel" tabindex="0"
                    aria-labelledby="pills-account-tab">
                    <div class="setting-right">
                        <livewire:user.setting.account />

                    </div>
                </div>
                <div class="tab-pane fade" id="pills-notification" role="tabpanel" tabindex="0"
                    aria-labelledby="pills-notification-tab">
                    <div class="setting-right">
                        <div class="card">  <livewire:user.setting.discount />

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@section('extra-js')

@endsection

@endsection