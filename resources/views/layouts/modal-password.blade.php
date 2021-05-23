<div class="modal fade" id="logoutModa3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="{{route('user.change.password')}}">
                @csrf
                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="current-password" class="control-label">Contraseña Actual</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group" id="show_hide_current_new_password">
                                    <input id="current-password" type="password"
                                      class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}" name="current-password" required>
                                     {!! $errors->first('current-password', '<div class="invalid-feedback">:message</div>') !!}
                                    <div class="input-group-addon">
                                      <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label">Nueva Contraseña</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group" id="show_hide_new_password">
                                    <input id="new-password" type="password" class="form-control{{ $errors->has('new-password') ? ' is-invalid' : '' }}" name="new-password" required>
                                    {!! $errors->first('new-password', '<div class="invalid-feedback">:message</div>') !!}
                                    <div class="input-group-addon">
                                      <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label">Confirmar Nueva contraseña</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group" id="show_hide_confirm_new_password">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                    <div class="input-group-addon">
                                      <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Guardar">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
