  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('admin.index') }}" class="nav-link">Home</a>
          </li>
          <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown language-switch">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"
                  role="button">
                  @if ($currentLang->image)
                      <img src="{{ $currentLang->image }}" class="img-flag mr-2"
                          alt="{{ $currentLang->code . '-' . $currentLang->country }}">
                  @endif
                  {{ Str::upper($currentLang->code) }}
              </a>
              <div class="dropdown-menu">
                  @foreach ($langs as $lang)
                      @if ($currentLang->code !== $lang->code)
                          <a rel="alternate" hreflang="{{ $lang->code }}"
                              href="{{ LaravelLocalization::getLocalizedURL($lang->code, null, [], true) }}"
                              class="dropdown-item english">
                              @if ($lang->image)
                                  <img src="{{ $lang->image }}" class="img-flag mr-2"
                                      alt="{{ $lang->code . '-' . $lang->country }}">
                              @endif
                              {{ Str::upper($lang->code) }}

                          </a>
                      @endif
                  @endforeach
              </div>
          </li>
          <li class="nav-item">
              <!-- <form action="" method="post">
                @csrf
                <button class="nav-link" type="submit">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form> -->
              <a href="{{ route('admin.logout') }}" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
              </a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->
