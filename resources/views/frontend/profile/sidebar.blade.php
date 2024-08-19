<div class="col-lg-3">
    <div class="card border-0 shadow mb-4 p-3">
        <div class="s-body text-center mt-3">
            @if($user->image)
            <img src="{{ asset('uploads/profile_pictures/'.$user->image) }}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
            @else
            <img src="{{ asset('assets\images\avatar7.png') }}" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
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
                <li class="list-group-item d-flex justify-content-between p-3">
                    <a href="{{ route('frontend.myaccount') }}">Account Settings</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('frontend.jobpost') }}">Post a Job</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('frontend.myjobs') }}">My Jobs</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route("frontend.jobApplied") }}">Jobs Applied</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('frontend.jobsaved') }}">Saved Jobs</a>
                </li>  
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <a href="{{ route('frontend.logout') }}">Logout</a>
                </li>                                                       
            </ul>
        </div>
    </div>
</div>