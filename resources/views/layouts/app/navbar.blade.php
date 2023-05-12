<div class="navbar bg-base-100 rounded-lg shadow">
   <div class="navbar-start">
      <div>
         <label for="sidebar-menu" tabindex="0" class="btn btn-ghost btn-circle drawer-button lg:hidden">
            <x-icons.bars class="h-5 w-5" />
         </label>
      </div>
   </div>
   <div class="navbar-center lg:hidden">
      <a class="btn btn-ghost text-xl normal-case">daisyUI</a>
   </div>
   <div class="navbar-end">

      <button class="btn btn-ghost btn-circle">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
               d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
         </svg>
      </button>

      <button class="btn btn-ghost btn-circle">
         <div class="indicator">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
               stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="badge badge-xs badge-primary indicator-item"></span>
         </div>
      </button>

      <div class="dropdown dropdown-end">
         <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
               <img src="{{ request()->user()->avatar() }}" />
            </div>
         </label>
         <ul tabindex="0" class="menu menu-compact dropdown-content bg-base-100 rounded-box mt-3 w-52 p-2 shadow">
            <li><a>Settings</a></li>
            <li>
               <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="w-full text-left" type="submit">Logout</button>
               </form>
            </li>
         </ul>
      </div>
   </div>
</div>
