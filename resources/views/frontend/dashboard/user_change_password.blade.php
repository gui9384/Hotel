@extends('frontend.main_master')
@section('main')
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
 <!-- Inner Banner -->
 <div class="inner-banner inner-bg6">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>User Change Password </li>
                    </ul>
                    <h3>User Change Password </h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- Service Details Area -->
        <div class="service-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                     <div class="col-lg-3">                           
                     <div class="service-side-bar">
                            

                        @include('frontend.dashboard.user_menu')
                    </div>



                    <div class="col-lg-9">
                        <div class="service-article">
                            
 
            <section class="checkout-area pb-70">
            <div class="container">
            <form action="{{ route('password.change.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="billing-details">
                                <h3 class="title">User Profile   </h3>

                                <div class="row">
                                   
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Old password <span class="required">*</span></label>
                                            <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" >
                                            @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                                        </div>
                                    </div>
                                   
                            
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>New password <span class="required">*</span></label>
                                            <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" >
                                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                                        </div>
                                    </div>              <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Confirm new password <span class="required">*</span></label>
                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" >
                                          
                                        </div>
                                    </div>

                               
                                    </div>


 
 
 
 <button type="submit" class="btn btn-danger">Save Changes </button>
</div>
</div>
</div>
</div>
</form>      
                
            </div>
        </section>
                            
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
        <script type="text/javascript">
			$(document).ready(function(){
				$('#image').change(function(e){
					var reader = new FileReader();
					reader.onload = function(e){
						$('#showImage').attr('src',e.target.result);

					}
					reader.readAsDataURL(e.target.files['0']);
				});
			});
			</script>
        <!-- Service Details Area End -->
@endsection