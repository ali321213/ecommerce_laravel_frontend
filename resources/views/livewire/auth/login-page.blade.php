{{-- resources\views\livewire\auth\login-page.blade.php --}}
<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex h-full items-center">
        <main class="w-full max-w-md mx-auto p-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Don't have an account yet?
                            <a wire:navigate
                                class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                href="/register">
                                Sign up here
                            </a>
                        </p>
                        <hr class="my-5 border-slate-300">
                    </div>
                    <!-- Form -->
                    <form wire:submit.prevent="login">
    <div class="grid gap-y-4">
        <div>
            <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
            <input type="email" wire:model="email" id="email"
                class="py-3 px-4 block w-full border rounded-lg text-sm focus:ring-blue-500 dark:bg-slate-900"
                required>
            @error('email') <span class="text-red-600 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
            <input type="password" wire:model="password" id="password"
                class="py-3 px-4 block w-full border rounded-lg text-sm focus:ring-blue-500 dark:bg-slate-900"
                required>
            @error('password') <span class="text-red-600 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>
                <input type="checkbox" wire:model="remember"> Remember Me
            </label>
        </div>

        <button type="submit"
            class="w-full py-3 px-4 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700">
            Sign in
        </button>
    </div>
</form>

                    <!-- End Form -->
                </div>
            </div>
    </div>
</div>
