<?php
echo <<<TEXTO
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Tienda de Articulos</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Gestionar
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
          <li><a class="dropdown-item" href="tags.php">Categoría</a></li>
          <li><a class="dropdown-item" href="#">Posts</a></li>
          <li><a class="dropdown-item" href="#">Usuarios</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>
</nav>
TEXTO;