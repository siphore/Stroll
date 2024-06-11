<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __("Tu as oublié ton mot de passe? Pas de problème. Entre juste ton adresse mail et nous allons t'envoyer par e-mail un lien qui te permettra de créer un nouveau mot de passe.") }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Envoyer') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
