<div class="services-bar-widget">
                                <h3 class="title">User sidebar</h3>
                                <div class="side-bar-categories">
                                <img src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/avatar.png')}}" alt="Image" class="rounded mx-auto d-block" width="110"> 
                                <center>
                                <p>{{ $profileData->name}}</p>
                                <p>{{$profileData->email}}</p>
                                </center>
                                <ul> 
              
            <li>
                <a href="{{ route('dashboard')}}">User Dashboard</a>
            </li>
            <li>
                <a href="{{ route('user.profile')}}">User Profile </a>
            </li>
            <li>
                <a href="#">Change Password</a>
            </li>
            <li>
                <a href="#">Booking Details </a>
            </li>
            <li>
                <a href="#">Logout </a>
            </li>
        </ul>
                                </div>
                            </div>

                           
                        </div>