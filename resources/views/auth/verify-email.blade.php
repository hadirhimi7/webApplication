<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100 px-6 py-12">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-indigo-600">Verify Your Email</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Thanks for signing up! Please verify your email address by clicking on the link we just emailed to you.
                    If you didn't receive the email, we will gladly send you another.
                </p>
            </div>

            <!-- Session Status -->
            @if (session('status') === 'verification-link-sent')
                <div class="text-green-600 text-sm text-center">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}" class="space-y-4">
                @csrf

                <div>
                    <button type="submit"
                        class="w-full flex justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                        Resend Verification Email
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="space-y-4">
                @csrf

                <div>
                    <button type="submit"
                        class="w-full flex justify-center rounded-md bg-gray-300 px-4 py-2 text-sm font-medium text-gray-800 hover:bg-gray-400">
                        Logout
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>