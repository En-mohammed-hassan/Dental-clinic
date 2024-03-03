<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid d-flex justify-content-between ms-3">

        <form action="/patients">
            @csrf
            <div class="d-flex justify-content-between w-100">
                <button class="btn btn-secondary me-3">search</button>
                <input type="text" id="search"  class="form-control me-3" name="search" placeholder="Search by ....">
                @error("name")
                    {{$message}}
                @enderror
            </div>
        </form>
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @if (session("message"))
      <div x-show="show" x-data="{show:true}" x-init="setTimeout(()=> show=false,3000)"   class="fixed-top position-fixed alert alert-primary  align-items-center text-center" role="alert" >
          <div class=" ">


          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 mt-3" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div class="text-center">
           {{session("message")}}
      </div>
      </div>
      </div>
      @endif

      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dr Dima Hasan</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link @php  if (str_contains(url()->current(),"dashboard")){echo "active";}  @endphp " aria-current="page" href="/dashboard">Dashboard</a>
            </li>

            <li class="nav-item">
              <a class="nav-link @php  if (str_contains(url()->current(),"Appointments")){echo "active";}  @endphp" href="/Appointments">Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @php  if (str_contains(url()->current(),"patients")){echo "active";}  @endphp" href="/patients">Patients</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/"> Web Site</a>
            </li>
            <li class="nav-item">
                    <form action="/admin/logout" method="POST" class=" dropdown-item">
                        <input class="stylesbutton btn  nav-link" type="submit" value="logout">
                    @csrf
                    </form>
            </li>

              </ul>


        </div>
      </div>
    </div>
  </nav>
