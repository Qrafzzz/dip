@if(auth('web')->user()->role_id=== 1)
    @include('layout.header')
    @include("profile.worker.worker", ['resumes' => $resumes])

@elseif(auth('web')->user()->role_id === 2)
    @include('layout.headerEmployer')
    @include("profile.employer.employer", ['companies' => $companies])

@elseif(auth('web')->user()->role_id === 3)
    @include('layout.header')
    @include("profile.admin.admin", ['users' => $users])

@endif
