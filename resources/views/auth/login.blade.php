<x-guest-layout>
   <!-- Session Status -->
   <x-auth-session-status class="mb-4" :status="session('status')" />

   <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div class="form-control mb-2 w-full">
         <label for="email" class="label">
            <span class="label-text">Email</span>
         </label>
         <input type="email" placeholder="user@mail.com" class="input input-bordered w-full" name="email"
            value="{{ old('email') }}" autofocus autocomplete="username" />
         @error('email')
            <label class="label">
               <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
         @enderror
      </div>

      <!-- Password -->
      <div class="form-control mb-2 w-full">
         <label for="password" class="label">
            <span class="label-text">Password</span>
         </label>
         <input type="password" class="input input-bordered w-full" name="password" required
            autocomplete="current-password" />
      </div>

      {{-- <div>
         <x-input-label for="email" :value="__('Email')" />
         <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required
            autofocus autocomplete="username" />
         <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
         <x-input-label for="password" :value="__('Password')" />

         <x-text-input id="password" class="mt-1 block w-full" type="password" name="password" required
            autocomplete="current-password" />

         <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div> --}}

      <!-- Remember Me -->
      {{-- <div class="mt-4 block">
         <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox"
               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
         </label>
      </div> --}}

      <div class="flex items-center">
         <input type="checkbox" checked="checked" class="checkbox checkbox-primary" name="remember" />
         <label class="label cursor-pointer">
            <span class="label-text">Remember me</span>
         </label>
      </div>

      <div class="mt-4 flex items-center justify-end gap-3">
         {{-- @if (Route::has('password.request'))
            <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
               href="{{ route('password.request') }}">
               {{ __('Forgot your password?') }}
            </a>
         @endif --}}

         <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>
   </form>
</x-guest-layout>
