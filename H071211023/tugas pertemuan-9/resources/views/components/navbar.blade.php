<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">CRUD LARAVEL 2</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}" aria-current="page" href="/seller">Seller</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == 'product' ? 'active' : '' }}" href="/product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == 'category' ? 'active' : '' }}" href="/category">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == 'permission' ? 'active' : '' }}" href="/permission">Permission</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->segment(1) == 'seller_permission' ? 'active' : '' }}" href="/seller_permission">Seller Permission</a>
          </li>
        </ul>
      </div>
    </div>
</nav>