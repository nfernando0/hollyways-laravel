<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/images/logo.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @auth
          @if (auth()->user()->role == 'admin')
          <li class="nav-item dropdown">
            <button class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="/images/user.png" alt="">
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Dashboard</a></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button class="dropdown-item" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item dropdown">
            <button class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="/images/user.png" alt="">
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item align-items-center" href="/profile">
                    <img src="/images/profile-logo.png" width="20" alt="">
                   <span class="mr-4"> Profile</span>
                </a></li>
              <li><a class="dropdown-item" href="/user/fund/{{ auth()->user()->id }}">
                <img src="/images/raisefund.png" width="20" alt="">
                My Fund</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button class="dropdown-item" type="submit">
                    <img src="/images/logout.png" width="20" alt="">
                    Logout
                </button>
                </form>
              </li>
            </ul>
          </li>
          @endif
              @else
              <li class="nav-item">
                <button type="button" class="nav-link login" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Login
                  </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link register" data-bs-toggle="modal" data-bs-target="#register">
                    Register
                  </button>
              </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h4>Login</h4>
          <form action="/login" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="name@example.com">
                <label for="password">Password</label>
              </div>
              <button class="btn w-100 login">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h4>Register</h4>
          <form action="/register" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="name@example.com">
                <label for="username">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" placeholder="name@example.com">
                <label for="fullname">Fullname</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="name@example.com">
                <label for="password">Password</label>
            </div>
            <button class="btn w-100 register">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
