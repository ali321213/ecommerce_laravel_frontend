{{-- resources\views\livewire\auth\register-page.blade.php --}}
<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex h-full items-center">
        <main class="w-full max-w-md mx-auto p-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign up</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Already have an account?
                            <a wire:navigate
                                class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                href="/login">
                                Sign in here
                            </a>
                        </p>
                    </div>
                    <hr class="my-5 border-slate-300">
                    <!-- Form -->
                    <form wire:submit.prevent="register">
                        <input type="text" wire:model.defer="name">
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <input type="email" wire:model.defer="email">
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <input type="password" wire:model.defer="password">
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <button type="submit">Sign up</button>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
    </div>
</div>
