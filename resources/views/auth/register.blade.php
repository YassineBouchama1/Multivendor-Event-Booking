<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div id="isOrganizer" class="">
            <x-input-label for="organizerName" :value="__('organizerName')" />
            <x-text-input id="organizerName" class="block mt-1 w-full" type="text" name="organizerName" :value="old('organizerName')" required autofocus autocomplete="organizerName" />
            <x-input-error :messages="$errors->get('organizerName')" class="mt-2" />
        </div>
        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
      <!--  Address -->
      <div class="mt-4">
        <x-input-label for="address" :value="__('address')" />
        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


{{-- selector method accept? --}}

<div class="flex justify-start flex-col md:flex-row md:items-center items-start gap-x-4">
    <label for="reservation_method"
    class="flex flex-col gap-y-1 mt-8">
    Accepte Reservation Method
    <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
        <div>
          <label
            for="Option1"
            class="block w-full cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-black has-[:checked]:border-black has-[:checked]:bg-black has-[:checked]:text-white"
            tabindex="0"
          >
            <input value="is_organizer" class="sr-only" id="Option1" type="radio" tabindex="-1" name="role" />

            <span class="text-sm">Organizer</span>
          </label>
        </div>

        <div>
          <label
            for="Option2"
            class="block w-full cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-black has-[:checked]:border-black has-[:checked]:bg-black has-[:checked]:text-white"
            tabindex="0"
          >
            <input checked value="is_user" class="sr-only" id="Option2" type="radio" tabindex="-1" name="role" />

            <span class="text-sm">Customer</span>
          </label>
        </div>


      </div>

{{-- selector method accept? --}}
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-mainColorhome">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var radios = document.querySelectorAll('input[name="role"]');
            var organizerDiv = document.getElementById('isOrganizer');

            function toggleOrganizerVisibility() {
                var roleValue = document.querySelector('input[name="role"]:checked').value;
                if (roleValue === 'is_user') {
                    organizerDiv.classList.add('hidden');
                } else {
                    organizerDiv.classList.remove('hidden');
                }
            }

            radios.forEach(function (radio) {
                radio.addEventListener('change', toggleOrganizerVisibility);
            });

            // Initial call to set the initial visibility based on the default checked radio
            toggleOrganizerVisibility();
        });
    </script>
</x-guest-layout>
