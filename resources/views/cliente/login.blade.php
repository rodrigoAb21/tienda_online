<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-login">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-12">
                        <form class="form-signin" method="POST" action="{{ route('login') }}" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="email"  class="form-control" name="email" placeholder="Email" required autofocus>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="on" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-lg btn-danger btn-block" type="submit"><i class="fa fa-sign-in"></i><span> Iniciar Sesion</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>