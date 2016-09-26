<body>
    <header>
        <h1 class="headerTitle" id="headerTitle"> Buffet de la Facultad de Informática UNLP</h1>
    </header>
    <nav>
        <ul class="navbar" id="navbar">
            <li class="boton"><a class="botonLink" href="index.php"> Inicio</a></li>
            <li class="loginNavbar">
                <form class="login" id="login" method="post" action="Loader.php?controller=MainController&method=login" name="login">
                    <label class="loginInputText" for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username"  placeholder="nombre de usuario" pattern="^[a-zA-Z]+" required>
                    <label class="loginInputText" for="pass">Contraseña: </label>
                    <input type="password" id="pass" name="pass" placeholder="contraseña" pattern="^[a-zA-Z0-9]+" required>
                    <label for="submit" hidden>Botón de envío</label>
                    <input type="submit" id="submit" name="submit" class="boton" value="acceder">
                </form>
            </li>
        </ul>
    </nav>
    <main>
        <div class="textoIndex">
            <p class="titleComida">Hamburguesa Veggie</p>
            <img class="imageComida" src="images/la-comida-mas-rica-1274458.jpg" alt="Hamburguesa Veggie">
            <p class="textoComida">Aliquam elit sem, scelerisque in bibendum ac, gravida nec lectus. Nunc malesuada purus non risus fermentum dapibus. Sed dapibus feugiat iaculis. Nam eleifend neque at hendrerit auctor. Integer eros dui, tempus sit amet feugiat et, lobortis et ipsum. Donec sed nulla non metus iaculis viverra. Mauris ultrices, lorem vitae dictum aliquet, mi eros viverra dolor, et aliquam ipsum ligula a velit. Ut volutpat euismod mi a tempor. Sed faucibus turpis a odio laoreet ullamcorper. Nunc interdum justo vel massa vestibulum vehicula. In blandit, sapien vel commodo consequat, dui ex fermentum nisi, non tempus libero justo id purus. Curabitur auctor odio in quam lacinia consequat. Mauris a tortor velit. Praesent pellentesque nisl eu leo semper, sed laoreet augue tincidunt. Quisque hendrerit sem vitae auctor vehicula. Morbi sem risus, eleifend sit amet justo et, eleifend rhoncus urna.</p>
        </div>
        <div class="textoIndex">
            <p class="titleComida">Milanesa de vaca Veggie</p>
            <img class="imageComida" src="images/51668.jpeg" alt="milanesa de vaca Veggie">
            <p class="textoComida">Proin id luctus ipsum, quis iaculis lacus. Proin tortor ex, bibendum at vehicula quis, consequat eget quam. Aenean a tincidunt ipsum. Praesent cursus nulla id laoreet commodo. Proin tempus, lacus sed fermentum volutpat, ipsum metus tempus enim, lobortis gravida est urna sit amet sem. Vivamus rutrum tellus urna, id tempor augue molestie ac. Nunc finibus leo vitae ex porta ultricies. Nullam faucibus neque sed turpis pretium, ac venenatis lectus congue. Nam auctor sapien eget massa faucibus venenatis. Vivamus iaculis luctus ligula at tempus. Sed ultricies elit nunc, ut posuere orci vestibulum sed. Fusce ultricies velit eget risus fermentum varius. Vestibulum ut euismod lorem. Aliquam eu dui dictum, bibendum nibh a, dictum purus.</p>
        </div>
    </main>
