<div class="col-lg-3">
    <div class="card border-0 shadow mb-4 p-3">
        <div class="s-body text-center mt-3">
            @if($user->image && file_exists(public_path('uploads/profile_pictures/'.$user->image)))
            <img src="{{ asset('uploads/profile_pictures/'.$user->image) }}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
            @else
            <img src="{{ asset('assets/images/avatar7.png') }}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
            @endif
            <h5 class="mt-3 pb-0">{{ $user->name }}</h5>
            <p class="text-muted mb-1 fs-6">{{ $user->designation }}</p>
            <div class="d-flex justify-content-center mb-2">
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
            </div>
        </div>
    </div>
    <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
        <div class="card-body p-0">
            <ul class="list-group list-group-flush ">
                <li class="list-group-item d-flex justify-content-between p-3 {{ request()->routeIs('frontend.myaccount') ? 'active' : '' }}">
                    <a href="{{ route('frontend.myaccount') }}" class="{{ request()->routeIs('frontend.myaccount') ? 'text-white' : '' }}">Account Settings</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 {{ request()->routeIs('frontend.jobpost') ? 'active' : '' }}">
                    <a href="{{ route('frontend.jobpost') }}" class="{{ request()->routeIs('frontend.jobpost') ? 'text-white' : '' }}">Post a Job</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 {{ request()->routeIs('frontend.myjobs') || request()->routeIs('frontend.myjobedit') ? 'active' : '' }}">
                    <a href="{{ route('frontend.myjobs') }}" class="{{ request()->routeIs('frontend.myjobs') || request()->routeIs('frontend.myjobedit') ? 'text-white' : '' }}">My Jobs</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 {{ request()->routeIs('frontend.jobApplied') ? 'active' : '' }}">
                    <a href="{{ route("frontend.jobApplied") }}" class="{{ request()->routeIs('frontend.jobApplied') ? 'text-white' : '' }}">Jobs Applied</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3 {{ request()->routeIs('frontend.jobsaved') ? 'active' : '' }}">
                    <a href="{{ route('frontend.jobsaved') }}" class="{{ request()->routeIs('frontend.jobsaved') ? 'text-white' : '' }}">Saved Jobs</a>
                </li>  
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('frontend.logout') }}">Logout</a>
                </li>                                                       
            </ul>
        </div>
    </div>
</div>