<header class="page-header">
  <nav>
    <div class="logo">
      <img src="assets/starfilms-logo.svg" alt="Logo StarFilms">
    </div>

    <ul class="navigation-menu nav-text">
      <li><a href="index.php">Início</a></li>
    </ul>

    <div class="menu">
      <form action="pesquisar.php" method="get">
        <label class="search-input">
          <input class="input-text" type="text" name="search" placeholder="Procurar filme">
          <button>
            <i class="ph-bold ph-magnifying-glass"></i>
          </button>
        </label>
      </form>

      <a href="" class="icon-button icon-button">
        <i class="ph-bold ph-user"></i>
      </a>
      <a href="api/user/signout.php" class="icon-button icon-button">
        <i class="ph-bold ph-sign-out"></i>
      </a>
      <!-- <a href="users.php">ACESSAR USUÁRIOS</a> -->
    </div>
  </nav>
</header>