<nav class="navbar navbar-expand-lg navbar-light fixed-top py-5 d-block"
    data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand" href="/"><img
                src="assets/img/wisata.in.png" height="34" alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation"><span class="navbar-toggler-icon">
            </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0"
            id="navbarSupportedContent">
            <ul
                class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
                <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium"
                        aria-current="page" href="/admin-wisata">Data Wisata</a>
                </li>
                <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium"
                        aria-current="page" href="/admin-customer">Data
                        Customer</a>
                </li>
                <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium"
                        aria-current="page" href="/admin-datatransaksi">Data Transaksi</a>
                </li>
                <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium"
                        aria-current="page" href="/dataAdmin">Hallo,{{auth()->user()->name}}</a>
                </li>

                <li class="nav-item px-3 px-xl-4">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="nav-link fw-medium"
                            style="background-color:white; border-color: transparent;"
                            aria-current="page">Logout <svg
                                xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor"
                                class="bi bi-arrow-right-circle"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                            </svg>
                </li></button>
                </form>
                <!-- <a
                            class="nav-link fw-medium" aria-current="page"
                            href="/admin-customer">Logout <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg></a></li> -->

                <!-- <li class="nav-item dropdown px-3 px-lg-0"> <a
                        class="d-inline-block ps-0 py-2 pe-3 text-decoration-none dropdown-toggle fw-medium"
                        href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Hallo,{{auth()->user()->name}}</a>
                      <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg"
                        style="border-radius:0.3rem;" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/">Logout</a></li>
                      </ul>
                    </li> -->
            </ul>
        </div>
    </div>
</nav>
<section style="padding-top: 5rem;">
    <div class="bg-holder"
        style="background-image:url(assets/img/hero/bg.svg);">
    </div>
