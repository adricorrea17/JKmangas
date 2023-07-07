<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="my-2 col-12 rounded bg-dark p-5 text-light container mx-auto">
                    <h1 class="mb-3 font">Modifica tus datos</h1>

                    <form action="{{ route('auth.perfil.accion') }}" method="post" class="d-flex flex-column justify-content-center" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fs-5 font">Email</label>
                            <input type="email" name="email" id="email" value="{{ $usuario->email }}" class="form-control @error('email') border border-danger @enderror">
                        </div>
                        @error('email')
                        <div class="mb-3 text-dark font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="nombre_usuario" class="form-label fs-5 font">Nombre de usuario</label>
                            <input type="text" value="{{ $usuario->nombre_usuario }}" name="nombre_usuario" id="nombre_usuario" class="form-control @error('password') border border-danger @enderror" value="{{ old('nombre_usuario', '') }}" @error('nombre_usuario') aria-describedby="nombre_usuario-error" @enderror>
                        </div>
                        @error('nombre_usuario')
                        <div class="mb-3 text-dark font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="imagen" class="form-label w-100 mt-3 font fs-5">Foto de perfil:</label>
                            @if($usuario -> imagen == null)
                            <p class="fw-bold">No tiene foto de perfil</p>
                            @else
                            <img class="rounded mt-3 w-25" src="img/perfil/{{$usuario -> imagen}}" alt="Imagen de perfil de {{$usuario->nombre_usuario}}">
                            @endif
                            <input class="form-control mt-3" type="file" name="imagen" id="imagen" />
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="changePassCheck">
                            <label class="form-check-label" for="changePassCheck">
                                ¿Deseas cambiar tu constraseña?
                            </label>
                        </div>

                        <div class="d-none" id="hidePasswd">

                            <div class="mb-3">
                                <label for="password" class="form-label fs-5 font">Tu contraseña actual</label>
                                <input type="password" placeholder="Escribe tu contraseña" name="oldpassword" id="password" class="form-control @error('password') border border-danger @enderror">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fs-5 font">Tu nueva contraseña</label>
                                <input type="password" placeholder="Escribe tu nueva contraseña" name="newpassword" id="password" class="form-control @error('password') border border-danger @enderror">
                            </div>
                        </div>
                        @error('password')
                        <div class="mb-3 text-dark font"><span class="visually-hidden">Error:</span> {{ $message }}</div>
                        @enderror

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="w-50 btn btn-primary radius">Guardar cambios</button>
                        </div>
                    </form>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
