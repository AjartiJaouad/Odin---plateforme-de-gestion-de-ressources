<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Merci de saisir le code OTP envoyé à votre adresse mail pour activer votre compte.
    </div>

    <form method="POST" action="{{ url('verify-otp') }}">
        @csrf
        <div>
            <x-input-label for="otp" value="Code OTP" />
            <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" required autofocus />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                Vérifier
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
