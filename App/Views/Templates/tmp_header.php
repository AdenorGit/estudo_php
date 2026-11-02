<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo / Marca -->
            <a class="navbar-brand" href="#">
                <i class="bi bi-box"></i> MinhaApp
            </a>

            <!-- Botão hamburguer (mobile) -->
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Itens do menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="bi bi-box-arrow-in-right"></i> Entrar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cadastro">
                            <i class="bi bi-person-plus"></i> Cadastrar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/logout">
                            <i class="bi bi-box-arrow-right"></i> Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>