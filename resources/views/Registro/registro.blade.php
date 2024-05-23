<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #000000;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card.shadow {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        footer {
            background-color: #8C001A;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        /* Animación de sombreado al pasar el mouse sobre la imagen */
        img:hover {
            transition: box-shadow 0.3s ease-in-out;
            box-shadow: 0 0 10px 3px rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <section class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{('img/logo.png') }}" class="img-fluid" alt="Logo" style="max-width: 500px;">
                </div>
                <div class="col-md-6">
                    <div class="card shadow p-4">
                        <form action={{url('check')}} method ="post">

                            @csrf
       
                            @error ('email')
                            <div class="error">
                               {{$message }}
                            </div>
                            @enderror
       
                               <div class="form-group">
                                   <label>Email </label>
                                   <input type="email" name="email" class="form-control" placeholder="Email" required autofocus value="{{old('email')}}">
                               </div>
                               <div class="form-group">
                                   <label>Contraseña</label>
                                   <input type="password" name="password" class="form-control" placeholder="Contraseña" required autofocus>
                               </div>
                               <div class="checkbox">
                                   <label>
                                       <input type="checkbox"> Remember Me
                                   </label>
                                   <label class="pull-right">
                                       <a href="#">¿Olvidaste tu contraseña?</a>
                                   </label>
       
                               </div>
                               <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"color:blue
                               >Ingresar</button>
                               
                               <div class="register-link m-t-15 text-center">
                                   <p>¿No tienes cuenta? <a href="{{url ('register')}}"> Registrate aquí</a></p>
                               </div>
                           </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p>Derechos de autor &copy; 2024. Todos los derechos reservados. Contacto: <a href="mailto:contacto@softech.com">contacto@softech.com</a></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

