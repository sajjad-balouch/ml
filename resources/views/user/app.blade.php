<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/user-assets/custom.css')}}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
@include('sweetalert::alert')
    @yield('content')
    <style>
    .bottom-nav-glass {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 70px;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        box-shadow: 0 -8px 20px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-around;
        align-items: center;
        z-index: 999;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

.bottom-nav-glass a {
    color: #333;
    text-align: center;
    font-size: 12px;
    text-decoration: none;
    flex-grow: 1;
    transition: all 0.2s ease-in-out;
    padding: 8px 0;
}

.bottom-nav-glass a i {
    font-size: 20px;
    display: block;
    margin-bottom: 4px;
}

.bottom-nav-glass a.active, 
.bottom-nav-glass a:hover {
    color: #5e17eb;
    transform: translateY(-4px);
}

    </style>
    
    <div class="bottom-nav-glass">
    <a href="{{ route('logout') }}">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
    <a href="{{ route('user.deposit-view') }}">
        <i class="fas fa-plus-circle"></i>
        <span>Deposit</span>
    </a>
    <a href="{{ route('user') }}" class="active">
        <i class="fas fa-home"></i>
        <span>Home</span>
    </a>
    <a href="{{ route('user.withdraw-view') }}">
        <i class="fas fa-heart"></i>
        <span>Withdraw</span>
    </a>
    <a href="{{ route('profile') }}">
        <i class="fas fa-user"></i>
        <span>Profile</span>
    </a>
</div>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('.dial-button').click(function(){
            $("#set_amount").val($(this).text());
            $("#set_plan_id").val($(this).val());
        });

        // open proof modal
        $('.openProofModal').click(function(){
            var id = $(this).attr('id');
            $("#set_proof_id").val(id);
            $('#proofModal').modal('show');
        });
        // end proof modal

    })

    function shareLink(link) {
        const url = link;

        // Use Web Share API if available (works on mobile and some browsers)
        if (navigator.share) {
            navigator.share({
                title: 'Check this out!',
                url: url
            }).then(() => {
                console.log('Link shared successfully!');
            }).catch((error) => {
                console.error('Error sharing:', error);
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(url).then(() => {
                alert('Link copied to clipboard!');
            }).catch(err => {
                alert('Could not copy the link');
            });
        }
    }

</script>

<!-- avatar modal -->
<div id="avatarModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Avatar</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('change-avatar')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Select Avatar</label>
                <input type="file" name="avatar" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Change" class="form-control btn btn-success">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- /end avatar modal -->

<!-- password modal -->
<div id="passModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('change-password')}}">
            @csrf
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="pass" class="form-control" required placeholder="New Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="cpass" class="form-control" required placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <input type="submit" value="Change" class="form-control btn btn-success">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- /end password modal -->

<!-- proof modal -->
<div id="proofModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload Payment Proof</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('user.upload-proof')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="set_proof_id">
            <div class="form-group"> 
                <label>Select Proof</label>
                <input type="file" name="proof" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Upload" class="form-control btn btn-success">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- /end proof modal -->

<!-- name modal -->
<div id="nameModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Name</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('change-name')}}">
            @csrf
            <div class="form-group">
                <label>Your Name</label>
                <input type="text" name="name" class="form-control" required placeholder="Your Name">
            </div>
            <div class="form-group">
                <input type="submit" value="Change" class="form-control btn btn-success">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- /end name modal -->