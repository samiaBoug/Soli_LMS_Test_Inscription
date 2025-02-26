
<header class="bg-white shadow">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <!-- Logo ou nom de la marque -->
      <div class="flex-shrink-0">

      </div>


      <!-- Profil avec dropdown -->
      <div class="relative inline-block text-left">
        <div>
          <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50" id="menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown()">
            <!-- Icône de profil avant le nom -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 2a4 4 0 11-4 4 4 4 0 014-4zM2 16a8 8 0 1116 0H2z" clip-rule="evenodd" />
            </svg>
            <span>{{ Auth::user()->name }}</span>
            <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
              <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>

        <!-- Menu dropdown, caché par défaut -->
        <div id="dropdown-menu" class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white ring-1 shadow-lg ring-black/5 focus:outline-hidden hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
          <div class="py-1" role="none">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
              @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<script>
  function toggleDropdown() {
    const dropdown = document.getElementById('dropdown-menu');
    const isVisible = dropdown.classList.contains('hidden');

    // Toggle visibility
    if (isVisible) {
      dropdown.classList.remove('hidden');
    } else {
      dropdown.classList.add('hidden');
    }
  }

  // Fermer le menu si l'utilisateur clique en dehors
  window.addEventListener('click', function(event) {
    const dropdown = document.getElementById('dropdown-menu');
    const button = document.getElementById('menu-button');

    // Si l'utilisateur clique en dehors du bouton et du menu, fermer le dropdown
    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
      dropdown.classList.add('hidden');
    }
  });
</script>


