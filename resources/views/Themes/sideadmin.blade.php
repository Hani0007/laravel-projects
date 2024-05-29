  <aside id="sidebar" class="sidebar ">

    <ul class="sidebar-nav " id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-lock text-black" ></i>
          <span class="text-black">MD5 Encrypt/Decrypt</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{route('sha1.encrypt')}}">
          <i class="bi bi-lock text-black"></i><span class="text-black">SHA1 Encrypt/Decrypt</span>
        </a>
        
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('sha224.encrypt')}}">
          <i class=" text-black bi bi-lock"></i><span class="text-black">SHA224 Encrypt/Decrypt</span>

        </a>
        
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav"  href="{{route('sha256.encrypt')}}">
          <i class="bi bi-lock text-black"></i><span class="text-black ">SHA256 Encrypt/Decrypt</span>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav"                href="{{route('sha384.encrypt')}}">
          <i class="bi bi-lock text-black"></i><span class="text-black">SHA384 Encrypt/Decrypt</span>
        </a>
        
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav"  href="{{route('sha512.encrypt')}}">
          <i class="bi bi-lock text-black"></i><span class="text-black">SHA512 Encrypt/Decrypt</span>
        </a>
        
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" href="{{route('steg.login')}}">
          <i class="bi bi-lock text-black"></i><span class="text-black">Stegnography</span>
        </a>
        
      </li><!-- End Icons Nav -->

      

  </aside>